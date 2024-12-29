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
    if (isset($_POST["dateV"])) {
        $dateV = $_POST["dateV"];
    }
    if (isset($_POST["observation"])) {
        $observation= $_POST["observation"];
    }
    if (isset($_POST["infoPA"])) {
        $infoPA= $_POST["infoPA"];
    }

   
    $sql = "insert into file (pid,dateV,observation,infoPA) values ($pid,'$dateV','$observation','$infoPA');";
    $result = $database->query($sql);
    header("location: file-patient.php?action=session-added&title=$title");
}


