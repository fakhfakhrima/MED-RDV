<?php

session_start();

if (isset($_SESSION["user"])) {
    if (($_SESSION["user"]) == "" or $_SESSION['usertype'] != 's') {
        header("location: ../login.php");
    }
} else {
    header("location: ../login.php");
}


if ($_POST) {
    //import database
    include("../connection.php");
    if (isset($_POST["title"])) {
        $title = $_POST["title"];
    }
    if (isset($_POST["docid"])) {
        $docid = $_POST["docid"];
    }
    if (isset($_POST["pid"])) {
        $pid = $_POST["pid"];
    }
    if (isset($_POST["date"])) {
        $date = $_POST["date"];
    }
    if (isset($_POST["time"])) {
        $time = $_POST["time"];
    }

   

   
    $sql = "insert into appointment (pid,docid,appodate,appotime,appotitle) values ($pid,$docid,'$date','$time','$title');";
    $result = $database->query($sql);
    header("location: appointment.php?action=session-added&title=$title");
}
