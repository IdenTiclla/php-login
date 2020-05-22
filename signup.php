<?php
    require("database.php");
    $message = '';
    if(isset($_POST['btn_signup'])){
        if (!empty($_POST['email']) && !empty($_POST['password'])) {
            $email = $_POST['email'];
            $password = password_hash($_POST['password'], PASSWORD_BCRYPT);
            $sql = "INSERT INTO users (email, password) VALUES ('$email','$password')";
            $result = mysqli_query($conn, $sql);
            if ($result) {
                $message = "Successfully created new user";
            }
            else{
                $message = "Sorry there must have been an issue creating your account";
            }
        }
    }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Signup</title>
    <!-- Google fonts  -->
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@300&display=swap" rel="stylesheet">
    <!-- css -->
    <link rel="stylesheet" href="static/css/main.css">
</head>
<body>
    <?php require('partials/header.php');?>
    <?php if (!empty($message)): ?>
        <p><?= $message?></p>
    <?php endif; ?>
    <h1>Signup</h1>
    <span>or <a href="login.php">Login</a></span>
    
    <form action="signup.php" method="post">
        <input type="text" name="email" id="email" placeholder="Enter your email.">
        <input type="password" name="password" id="password" placeholder="Enter your password.">
        <input type="password" name="password_again" id="password_again" placeholder="Enter your password again.">
        <input type="submit" value="Signup" name="btn_signup" id="btn_login">
    </form>
</body>
</html>