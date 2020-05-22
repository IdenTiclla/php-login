<?php
    session_start();
    require("database.php");
    if (isset($_SESSION['user_id'])) {
        $id = $_SESSION['user_id'];
        $query = "SELECT * FROM users WHERE id=$id";
        $result = mysqli_query($conn, $query);
        $user = null;
        if (mysqli_num_rows($result) == 1) {
            $row = mysqli_fetch_array($result);
            #$title = $row['title'];
            #$description = $row['description'];
            $user = $row;
        }
    }


?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Inicio</title>
    <!-- Google fonts  -->
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@300&display=swap" rel="stylesheet">
    <!-- css -->
    <link rel="stylesheet" href="static/css/main.css">
</head>
<body>
    <?php require('partials/header.php');?>
    <?php if(!empty($user)):?>
        <h1>Welcome. <?=$user['email']?></h1><br>
        You are successfully logged In
        <a href="logout.php">Logout</a>
    <?php else:?>
    <h1>Please login or signup</h1>
    <a href="login.php">Login</a> or <a href="signup.php">Signup</a>
    <?php endif; ?>
    
</body>
</html>