<?php
@include 'config.php';

if(isset($_POST['submit'])){

    $name = mysqli_real_escape_string($conn, ($_POST['name']));
    $email = mysqli_real_escape_string($conn, ($_POST['email']));
    $pass = md5($_POST['password']);
    $cpass= md5($_POST['cpassword']);
    $user_type = $_POST['user_type'];

    $select = " SELECT * FROM user_form WHERE email = '$email' && password = '$pass' ";
    $result = mysqli_query($conn, $select);

    if(mysqli_num_rows($result) > 0){
        $error[] = 'user already exist!';
    }else{
        if($pass != $cpass){
            $error[] = 'password not matched!';
        }else{
            $insert = "INSERT INTO user_form(name, email, password, user_type) VALUES('$name','$email','$pass','$user_type')";
            mysqli_query($conn, $insert);
            header('location:login_form.php');
        }
    }
};

?>

<!DOCTYPE html>
<html >
<head>
    
    <title>Register Form</title>

    <link rel="icon" type="image/x-icon" href="icons8-restaurant-64.png">
    <link rel="stylesheet" type="text/css" href="style.css">
    <link rel="stylesheet" href=https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css>

</head>
<body>
    <div class="form-container">
        <form action="" method="post">
            <h3>register now</h3>
            <?php
            if(isset($error)){
                foreach($error as $error){
                echo'<span class="error-msg">'.$error.'</span>';
            };
            };
            ?>

            <input type="text" name="name" required placeholder="Enter your name">
            <input type="email" name="email" required placeholder="Enter your email">
            <input type="password" name="password" required placeholder="Enter your password">
            <input type="password" name="cpassword" required placeholder="Confirm your password">
            <select name="user_type">
                <option value="user">user</option>
                <option value="admin">admin </option>
            </select>
            <input type="submit" name="submit" value="Register now" class="form-btn">
            <p>already have an account?<a href="login_form.php"> login now</p>
        </form>

    </div>
    
</body>
</html>