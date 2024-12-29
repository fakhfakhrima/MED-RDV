<?php



//import database
include("../connection.php");



if ($_POST) {
    //print_r($_POST);
    $result = $database->query("select * from webuser");
    $name = $_POST['name'];
    $nic = $_POST['nic'];
    $oldemail = $_POST["oldemail"];
    $email = $_POST['email'];
    $tele = $_POST['Tele'];
    $password = $_POST['password'];
    $cpassword = $_POST['cpassword'];
    $id = $_POST['id00'];
    $dob = $_POST['dob'];
    $address = $_POST['address'];
    $region = $_POST['region'];
    $cnss = $_POST['cnss'];

    if ($password == $cpassword) {
        $error = '3';
        $result = $database->query("select patient.pid from patient inner join webuser on patient.pemail=webuser.email where webuser.email='$email';");

        if ($result->num_rows == 1) {
            $id2 = $result->fetch_assoc()["pid"];
        } else {
            $id2 = $id;
        }

        echo $id2 . "jdfjdfdh";
        if ($id2 != $id) {
            $error = '1';
           

        } else {

            $sql1 = "update patient set pemail='$email',pname='$name',ppassword='$password',pnic='$nic',ptel='$tele',pdob='$dob',paddress='$address',region='$region',cnss='$cnss' where pid=$id ;";
            $database->query($sql1);

            $sql1 = "update webuser set email='$email' where email='$oldemail' ;";
            $database->query($sql1);
            
            $error = '4';
        }
    } else {
        $error = '2';
    }
} else {
    //header('location: signup.php');
    $error = '3';
}


header("location: patient.php?action=edit&error=" . $error . "&id=" . $id);
?>



</body>

</html>