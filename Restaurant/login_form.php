<?php
@include 'config.php';

session_start();

if(isset($_POST['submit'])){

    $email = mysqli_real_escape_string($conn, ($_POST['email']));
    $pass = md5($_POST['password']);
  
    $select = " SELECT * FROM user_form WHERE email = '$email' && password = '$pass' ";
    $result = mysqli_query($conn, $select);

    if(mysqli_num_rows($result) > 0){
        $row = mysqli_fetch_array($result);

        if($row['user_type'] == 'admin'){

            $_SESSION['admin_name'] = $row['name'];
            header('location:admin_page.php');

        }elseif ($row['user_type'] == 'user'){

            $_SESSION['user_name'] = $row['name'];
            header('location:user_page.php');
}
         }else{
        $error[] = 'incorrect email or password!';
    }
};

?>

<!DOCTYPE html>
<html >
<head>
    <title>Login Form</title>
    <link rel="icon" type="image/x-icon" href="icons8-restaurant-64.png">
    <link rel="stylesheet" type="text/css" href="style.css">
    <link rel="stylesheet" href=https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css>
</head>
<body>
   <div class="form-container">
    <form action="" method="post">
         <h3>login now</h3>
             <?php
            if(isset($error)){
                foreach($error as $error){
                echo'<span class="error-msg">'.$error.'</span>';
            };
            };
            ?>
            <input type="email" name="email" required placeholder="Enter your email">
            <input type="password" name="password" required placeholder="Enter your password">
            <input type="submit" name="submit" value="Login now" class="form-btn">
            <p>don't have an account?<a href="register_form.php"> register now</p>
            </form>
        </div>
    
</body>
</html>