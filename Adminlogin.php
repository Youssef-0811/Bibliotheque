<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<link rel="stylesheet" type="text/css" href="loginstyles.css">
<title>Login Form</title>

</head>
<body>
<div class="container">
    <h2>Admin Login</h2>
    <form action="login.php" method="post">
        <label for="username">Username or Email</label>
        <input type="text" id="username" name="username" required>
        <label for="password">Password</label>
        <input type="password" id="password" name="password" required>
        <input type="submit" value="Login">
    </form>
    <p>User? <a href="userLogin.php">Click here</a> to login as an User</p>

</div>
</body>
</html>