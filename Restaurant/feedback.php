<?php
$name = $_POST["full_name"];

$email = $_POST["email"];

$message = $_POST["message"];



//database connection
$conn = mysqli_connect("localhost","root","","restaurant");

if($conn->connect_error){
    die("Connection failed".$conn->connect_error);
}else{
    $query = $conn->prepare("insert into feedback(full_name,email,message) values(?,?,?)");
    $query->bind_param("sss",$name,$email,$message);
    $query->execute();

    echo '<script>alert("Feedback successfully submitted !")</script>';

    $query->close();
    $conn->close();
}
?>
