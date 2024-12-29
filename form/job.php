<?php
// import database 


include("../edoc-doctor-appointment-system-main/connection.php");

if ($_POST) {
    $name = $_POST["name"];
    $email = $_POST["email"];
    $phone = $_POST["phone"];
    $date = $_POST["date"];
    $message = $_POST["message"];


    $sql = "INSERT INTO job 
    (name,email,phone,date,message) values 
('$name','$email','$phone','$date','$message')";

    $job = $database->query($sql);
    
        
}
header("location: ../index.html");


?>