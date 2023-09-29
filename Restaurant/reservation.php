<?php
$r_days = $_POST["days"];
$r_hours = $_POST["hours"];
$r_fullname = $_POST["fullname"];
$r_phonenumber = $_POST["phonenumber"];
$r_persons = $_POST["persons"];



//database connection
$conn = mysqli_connect('localhost','root','','restaurant');

if($conn->connect_error){
    die("Connection failed".$conn->connect_error);
}else{
    $query = $conn->prepare("insert into reservation(days,hours,fullname,phonenumber,persons) values(?,?,?,?,?)");
    $query->bind_param("sssss",$r_days,$r_hours,$r_fullname,$r_phonenumber,$r_persons);
    $query->execute();

    echo '<script>alert("Reservation Successful")</script>';

    $query->close();
    $conn->close();
}



?>