<?php
    session_start();
    require("database.php");
    
    $message = "";
    if(isset($_POST['btn_login'])){
        
        if (!empty($_POST['email'] && !empty($_POST['password']))) {
            $email = $_POST['email'];
            $password = $_POST['password'];
            $sql = "SELECT * FROM users where email='$email'";
            $result = mysqli_query($conn, $sql);
            
            if (mysqli_num_rows($result) == 1) {
                $row = mysqli_fetch_array($result);
                if(password_verify($password, $row['password'])){
                    $_SESSION['user_id'] = $row['id'];
                    header('Location: /php-login');
                }
                else{
                    $message = "Sorry, those credentials dont match";
                }   
            }
        }
    }

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <!-- Google fonts  -->
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@300&display=swap" rel="stylesheet">
    <!-- css -->
    <link rel="stylesheet" href="static/css/main.css">
</head>
<body>
    <?php require('partials/header.php');?>
    
    <h1>Login</h1>
    <span>or <a href="signup.php">Signup</a></span>
    
    <?php if (!empty($message)) : ?>
        <p><?= $message ?></p>
    <?php endif; ?>

    <form action="login.php" method="post">
        <input type="text" name="email" id="email" placeholder="Enter your email.">
        <input type="password" name="password" id="password" placeholder="Enter your password.">
        <input type="submit" value="Login" name="btn_login" id="btn_login">
    </form>
</body>
</html>