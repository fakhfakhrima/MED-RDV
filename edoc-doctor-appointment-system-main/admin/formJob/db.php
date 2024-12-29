<?php
$con=new mysqli('localhost','root','','edoc');
if(!$con){
    die(mysqli_error($con));
}