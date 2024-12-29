<?php

session_start();

if (isset($_SESSION["user"])) {
    if (($_SESSION["user"]) == "" or $_SESSION['usertype'] != 'd') {
        header("location: ../login.php");
    }
} else {
    header("location: ../login.php");
}



if ($_POST) {
    //import database
    include("../connection.php");
   
    $pid = $_POST["pid"];

   
    
    $dateV = $_POST["dateV"];
    
  
    $observation= $_POST["observation"];
    $id = $_POST["fid"];
    
     $infoPA= $_POST["infoPA"];
    

    $result = $database->query("select file.fid from file inner join patient on file.pid=patient.pid where file.fid='$id';");

    if ($result->num_rows == 1) {
        $pid = $result->fetch_assoc()["pid"];
       
  
     

        $sql1 = "update file set dateV='$dateV',observation='$observation',infoPA='$infoPA' where fid=$id ;";
        $result=mysqli_query($database,$sql1);
$error ='4';

       
        //header("location: file-patient.php?action=session-added&title=$title");
        header("location: file-patient.php?action=edit&error=" . $error . "&id=" . $id);

        
    }
   
    
   
}
