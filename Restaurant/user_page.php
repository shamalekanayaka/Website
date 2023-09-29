<?php
@include 'config.php';

session_start();

if(!isset($_SESSION['user_name'])){
    header('location:login_form.php');
}

?>
<!DOCTYPE html>
<html >
<head>
   
    <title>user page</title>

    <script type="text/javascript" src="signature_cuisine.js"></script>
        <link rel="icon" type="image/x-icon" href="icons8-restaurant-64.png">
        <link rel="stylesheet" type="text/css" href="style.css">
        <link rel="stylesheet" href=https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css>

     </head>
<body>
<section class="user">
<div class="container">
    <div class="content">
        <h3>Hello, </h3>
        <h1>Welcome<span><?php echo $_SESSION['user_name']?></span></h1>
        <p>Signature Cuisine</p>
        <a href="login_form.php" class="btn">login</a>
        <a href="register_form.php" class="btn">register</a>
        <a href="logout.php" class="btn">logout</a>
        <a href="Signature_cuisine.html" class="btn">Home</a>
    </div>
</div>
</section>
</body>
</html>