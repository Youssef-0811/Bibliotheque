<?php
// Include the Database.php file
include("../../DataBase.php");

session_start(); // Start the session

$error = ""; // Variable to store error message

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Fetch username and password from form submission
    $username = $_POST['username'];
    $password = $_POST['password'];

    // Prepare SQL statement to fetch admin from database
    $sql = "SELECT * FROM `admin` WHERE `Nom` = '$username' AND `Password` = '$password'";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        // Admin found, set admin ID, name, and image URL in session
        $admin = $result->fetch_assoc();
        $_SESSION['admin_id'] = $admin['Id']; // Assuming 'Id' is the column name for admin ID
        $_SESSION['admin_name'] = $admin['Nom']; // Assuming 'Nom' is the column name for admin name
        $_SESSION['admin_image'] = $admin['Image']; // Assuming 'Image' is the column name for admin image URL

        // Redirect to admin panel
        header("Location: ../../Admin/AdminDash.php");
        exit(); // Terminate script to ensure redirection happens
    } else {
        // No admin found, set error message
        $error = "Invalid username or password";
    }
}
?>





<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="../../loginstyles.css">
    <title>Admin Login Form</title>
</head>

<body>
    <div class="container" style="margin-right:0px;">
        <h2>Admin Login</h2>
        <!-- Display error message if any -->
        <?php if (!empty($error)) : ?>
            <p style="color: red;"><?php echo $error; ?></p>
        <?php endif; ?>
        <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post">
            <label for="username">Username</label>
            <input type="text" id="username" name="username" required>
            <label for="password">Password</label>
            <input type="password" id="password" name="password" required>
            <input type="submit" value="Login">
        </form>
        <p>User? <a href="../User/userLogin.php">Click here</a> to login as a User</p>
        <p>Back to home ?<a href="../../accueil.php">Click here</a></p>
    </div>
</body>

</html>