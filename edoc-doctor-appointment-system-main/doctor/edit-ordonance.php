<?php



//import database
include("../connection.php");



if ($_POST) {
    
    $id = $_POST["oid"];
    $pid = $_POST['pid'];
    $medecament = $_POST["medecament"];
    $odate = $_POST['odate'];
   
    $result = $database->query("select ordonance.oid from ordonance inner join patient on ordonance.pid=patient.pid where ordonance.oid='$id';");

    if ($result->num_rows == 1) {
        $pid = $result->fetch_assoc()["pid"];

    $sql1 = "update ordonance set medecament='$medecament',odate='$odate' where oid=$id ;";
    
    $result=mysqli_query($database,$sql1);
    $error = '4';

    //header("location: ordonance.php?action=session-added&id=$id");
}

}

header("location: ordonance.php?action=edit&error=" . $error . "&id=" . $id);
?>



</body>

</html>