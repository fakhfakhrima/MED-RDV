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
    if (isset($_POST["pid"])) {
        $pid = $_POST["pid"];
    }
    if (isset($_POST["date"])) {
        $odate = $_POST["odate"];
    }
    if (isset($_POST["medecament"])) {
        $medecament= $_POST["medecament"];
    }
   

   

    
    $sql = "insert into ordonance (pid,medecament,odate) values ($pid,'$medecament','$odate');";
    $result = $database->query($sql);
    header("location: ordonance.php?action=session-added&title=$title");
}
