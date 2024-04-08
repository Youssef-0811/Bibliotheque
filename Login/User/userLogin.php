<?php
// Include the Database.php file
include("../../DataBase.php");

$error = ""; // Variable to store error message

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Fetch username and password from form submission
    $username = $_POST['username'];
    $password = $_POST['password'];

    // Prepare SQL statement to fetch user from database using prepared statements
    $sql = "SELECT * FROM `user` WHERE (`Email` = ? OR `Nom` = ?) AND `Password` = ?";
    $stmt = $conn->prepare($sql);

    // Bind parameters
    $stmt->bind_param("sss", $username, $username, $password);

    // Execute query
    $stmt->execute();

    // Get result
    $result = $stmt->get_result();

    if ($result->num_rows > 0) {
        // Start session and store user ID
        session_start();
        if ($row = mysqli_fetch_assoc($result)) {
            $_SESSION['ID'] = $row['ID'];

            $_SESSION['user_id'] = $username;
            // Store username or any unique identifier for the user

            // Redirect to accueil.php
            header("Location: ../../accueil.php");
            exit(); // Terminate script to ensure redirection happens
        }
    } else {
        // No user found, set error message
        $error = "Invalid username or password";
    }

    // Close statement
    $stmt->close();
}
?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="../../loginstyles.css">
    <title>Login Form</title>
</head>

<body>
    <div class="container">
        <h2>User Login</h2>
        <!-- Display error message if any -->
        <?php if (!empty($error)) : ?>
            <p style="color: red;"><?php echo $error; ?></p>
        <?php endif; ?>
        <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post">
            <label for="username">Username or Email</label>
            <input type="text" id="username" name="username" required>
            <label for="password">Password</label>
            <input type="password" id="password" name="password" required>
            <input type="submit" value="Login">
        </form>
        <p>Admin? <a href="../admin/Adminlogin.php">Click here</a> to login as an administrator.</p>
        <p>Back to home ?<a href="../../accueil.php">Click here</a></p>
    </div>
</body>

</html>