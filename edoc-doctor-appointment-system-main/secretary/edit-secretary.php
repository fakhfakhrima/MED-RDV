<?php



//import database
include("../connection.php");



if ($_POST) {
    //print_r($_POST);
    $result = $database->query("select * from webuser");
    $name = $_POST['name'];
    $nic = $_POST['nic'];
    $oldemail = $_POST["oldemail"];
    $spec = $_POST['spec'];
    $email = $_POST['email'];
    $tele = $_POST['Tele'];
    $password = $_POST['password'];
    $cpassword = $_POST['cpassword'];
    $id = $_POST['id00'];

    if ($password == $cpassword) {
        $error = '3';
        $result = $database->query("select secretary.sid from secretary inner join webuser on secretary.semail=webuser.email where webuser.email='$email';");
        if ($result->num_rows == 1) {
            $id2 = $result->fetch_assoc()["sid"];
        } else {
            $id2 = $id;
        }

        echo $id2 . "jdfjdfdh";
        if ($id2 != $id) {
            $error = '1';
            

        } else {

            $sql1 = "update secretary set semail='$email',sname='$name',spassword='$password',snic='$nic',stel='$tele' where sid=$id ;";
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


header("location: secretary.php?action=edit&error=" . $error . "&id=" . $id);
?>



</body>

</html>