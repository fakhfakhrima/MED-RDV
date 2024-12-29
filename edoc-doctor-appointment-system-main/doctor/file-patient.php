<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../css/animations.css">
    <link rel="stylesheet" href="../css/main.css">
    <link rel="stylesheet" href="../css/admin.css">

    <title>Appointments</title>
    <style>
        .popup {
            animation: transitionIn-Y-bottom 0.5s;
        }

        .sub-table {
            animation: transitionIn-Y-bottom 0.5s;
        }
    </style>
</head>

<body>
<?php

    //learn from w3schools.com

    session_start();

    if(isset($_SESSION["user"])){
        if(($_SESSION["user"])=="" or $_SESSION['usertype']!='d'){
            header("location: ../login.php");
        }else{
            $useremail=$_SESSION["user"];
        }

    }else{
        header("location: ../login.php");
    }
    

    //import database
    include("../connection.php");
    $userrow = $database->query("select * from doctor where docemail='$useremail'");
    $userfetch=$userrow->fetch_assoc();
    $userid= $userfetch["docid"];
    $username=$userfetch["docname"];
?>
    <div class="container">
        <div class="menu">
            <table class="menu-container" border="0">
                <tr>
                    <td style="padding:10px" colspan="2">
                        <table border="0" class="profile-container">
                            <tr>
                                <td width="30%" style="padding-left:20px">
                                    <img src="../img/user.png" alt="" width="100%" style="border-radius:50%">
                                </td>
                                <td style="padding:0px;margin:0px;">
                                    <p class="profile-title"><?php echo substr($username, 0, 13)  ?></p>
                                    <p class="profile-subtitle"><?php echo substr($useremail, 0, 22)  ?></p>
                                </td>
                            </tr>
                            <tr>
                                <td colspan="2">
                                    <a href="../logout.php" ><input type="button" value="Log out" class="logout-btn btn-primary-soft btn"></a>
                                </td>
                            </tr>
                    </table>
                    </td>
                </tr>
                <tr class="menu-row" >
                    <td class="menu-btn menu-icon-dashbord " >
                        <a href="index.php" class="non-style-link-menu "><div><p class="menu-text">Dashboard</p></a></div></a>
                    </td>
                </tr>
                <tr class="menu-row">
                    <td class="menu-btn menu-icon-appoinment ">
                        <a href="appointment.php" class="non-style-link-menu"><div><p class="menu-text">My Appointments</p></a></div>
                    </td>
                </tr>

                <tr class="menu-row">
                    <td class="menu-btn menu-icon-appoinment  ">
                        <a href="appointment-sec.php" class="non-style-link-menu "><div><p class="menu-text">Appointments Sec</p></a></div>
                    </td>
                </tr>
                
                <tr class="menu-row" >
                    <td class="menu-btn menu-icon-session">
                        <a href="schedule.php" class="non-style-link-menu"><div><p class="menu-text">My Sessions</p></div></a>
                    </td>
                </tr>
                <tr class="menu-row" >
                    <td class="menu-btn menu-icon-patient">
                        <a href="patient.php" class="non-style-link-menu"><div><p class="menu-text">My Patients</p></a></div>
                    </td>
                </tr>

                <tr class="menu-row" >
                    <td class="menu-btn menu-icon-patient menu-active menu-icon-patient-active">
                        <a href="file-patient.php" class="non-style-link-menu non-style-link-menu-active"><div><p class="menu-text">Patients File</p></a></div>
                    </td>
                </tr>


                <tr class="menu-row" >
                    <td class="menu-btn menu-icon-session">
                        <a href="ordonance.php" class="non-style-link-menu "><div><p class="menu-text">ordonance</p></div></a>
                    </td>
                </tr>


                <tr class="menu-row" >
                    <td class="menu-btn menu-icon-settings">
                        <a href="settings.php" class="non-style-link-menu"><div><p class="menu-text">Settings</p></a></div>
                    </td>
                </tr>
                
            </table>
    </div>
    <div class="dash-body">
        <table border="0" width="100%" style=" border-spacing: 0;margin:0;padding:0;margin-top:25px; ">
            <tr>
                <td width="13%">
                    <a href="ordonance.php"><button class="login-btn btn-primary-soft btn btn-icon-back" style="padding-top:11px;padding-bottom:11px;margin-left:20px;width:125px">
                            <font class="tn-in-text">Back</font>
                        </button></a>
                </td>
                <td>
                    <p style="font-size: 23px;padding-left:12px;font-weight: 600;">Files Manager</p>

                </td>
                <td width="15%">
                    <p style="font-size: 14px;color: rgb(119, 119, 119);padding: 0;margin: 0;text-align: right;">
                        Today's Date
                    </p>
                    <p class="heading-sub12" style="padding: 0;margin: 0;">
                        <?php

                        date_default_timezone_set('Africa/Tunis');

                        $today = date('Y-m-d');
                        echo $today;

                        $list110 = $database->query("select  * from  file;");

                        ?>
                    </p>
                </td>
                <td width="10%">
                    <button class="btn-label" style="display: flex;justify-content: center;align-items: center;"><img src="../img/calendar.svg" width="100%"></button>
                </td>


            </tr>

            <!-- <tr>
                    <td colspan="4" >
                        <div style="display: flex;margin-top: 40px;">
                        <div class="heading-main12" style="margin-left: 45px;font-size:20px;color:rgb(49, 49, 49);margin-top: 5px;">Schedule a Session</div>
                        <a href="?action=add-session&id=none&error=0" class="non-style-link"><button  class="login-btn btn-primary btn button-icon"  style="margin-left:25px;background-image: url('../img/icons/add.svg');">Add a Session</font></button>
                        </a>
                        </div>
                    </td>
                </tr> -->
            <tr>
                <td colspan="4">
                    <div style="display: flex;margin-top: 40px;">
                        <div class="heading-main12" style="margin-left: 45px;font-size:20px;color:rgb(49, 49, 49);margin-top: 5px;">File Patient</div>
                        <a href="?action=add-file&id=none&error=0" class="non-style-link"><button class="login-btn btn-primary btn button-icon" style="margin-left:25px;background-image: url('../img/icons/add.svg');">Add New File</font></button>
                        </a>
                    </div>
                </td>
            </tr>
            <tr>
                <td colspan="4" style="padding-top:10px;width: 100%;">

                    <p class="heading-main12" style="margin-left: 45px;font-size:18px;color:rgb(49, 49, 49)">All Files (<?php echo $list110->num_rows; ?>)</p>
                </td>

            </tr>
            <tr>
                <td colspan="4" style="padding-top:0px;width: 100%;">
                    <center>
                        <table class="filter-container" border="0">
                            <tr>

                                <td width="5%" style="text-align: center; ">
                                    Date:
                                </td>
                                <td width="30%">
                                    <form action="" method="post">

                                        <input type="date" name="sheduledate" id="date" class="input-text filter-container-items" style="margin: 0;width: 95%; ">

                                </td>
                                
                                <td width="5%" style="text-align: center;">
                                    Patient:
                                </td>
                                <td width="30%">
                                    <select name="docid" id="" class="box filter-container-items" style="width:90% ;height: 37px;margin: 0;">
                                        <option value="" disabled selected hidden>Choose Patient Name from the list</option><br />

                                        <?php

                                        $list11 = $database->query("select  * from  patient order by pname asc;");

                                        for ($y = 0; $y < $list11->num_rows; $y++) {
                                            $row00 = $list11->fetch_assoc();
                                            $sn = $row00["pname"];
                                            $id00 = $row00["pid"];
                                            echo "<option value=" . $id00 . ">$sn</option><br/>";
                                        };


                                        ?>

                                    </select>
                                </td>
                                <td width="12%">
                                    <input type="submit" name="filter" value=" Filter" class=" btn-primary-soft btn button-icon btn-filter" style="margin-right: 35px;padding: 15px; width:100%;">
                                    </form>
                                </td>

                            </tr>
                        </table>

                    </center>
                </td>

            </tr>

            <?php
            if ($_POST) {
                //print_r($_POST);
                $sqlpt1 = "";
                if (!empty($_POST["dateV"])) {
                    $date = $_POST["dateV"];
                    $sqlpt1 = " file.dateV='$date' ";
                }


                $sqlpt2 = "";
                if (!empty($_POST["pid"])) {
                    $pid = $_POST["pid"];
                    $sqlpt2 = " patient.pid=$pid ";
                }
                //echo $sqlpt2;
                //echo $sqlpt1;
                $sqlmain = "select file.fid,file.dateV,file.observation,file.infoPA,patient.pname 
                            from file INNER JOIN patient ON file.pid=patient.pid;";
                $sqllist = array($sqlpt1, $sqlpt2);
                $sqlkeywords = array(" where ", " and ");
                $key2 = 0;
                foreach ($sqllist as $key) {

                    if (!empty($key)) {
                        $sqlmain .= $sqlkeywords[$key2] . $key;
                        $key2++;
                    };
                };
                //echo $sqlmain;



                //
            } else {
                $sqlmain = "select file.fid,file.dateV,file.observation,file.infoPA,patient.pname 
                            from file INNER JOIN patient ON file.pid=patient.pid ORDER by fid ASC";
            }



            ?>

            <tr>
                <td colspan="4">
                    <center>
                        <div class="abc scroll">
                            <table width="93%" class="sub-table scrolldown" border="0">
                                <thead>
                                    <tr>
                                        <th class="table-headin">
                                            Patient name
                                        </th>
                                        <th class="table-headin">

                                            File number

                                        </th>


                                        <th class="table-headin">
                                           Date Visite
                                        </th>
                                        

                                        <th class="table-headin">

                                            Observation

                                        </th>

                                        <th class="table-headin">

                                            Events

                                    </tr>
                                </thead>
                                <tbody>

                                    <?php


                                    $result = $database->query($sqlmain);

                                    if ($result->num_rows == 0) {
                                        echo '<tr>
                                    <td colspan="7">
                                    <br><br><br><br>
                                    <center>
                                    <img src="../img/notfound.svg" width="25%">
                                    
                                    <br>
                                    <p class="heading-main12" style="margin-left: 45px;font-size:20px;color:rgb(49, 49, 49)">We  couldnt find anything related to your keywords !</p>
                                    <a class="non-style-link" href="appointment.php"><button  class="login-btn btn-primary-soft btn"  style="display: flex;justify-content: center;align-items: center;margin-left:20px;">&nbsp; Show all Appointments &nbsp;</font></button>
                                    </a>
                                    </center>
                                    <br><br><br><br>
                                    </td>
                                    </tr>';
                                    } else {
                                        for ($x = 0; $x < $result->num_rows; $x++) {
                                            $row = $result->fetch_assoc();
                                            $fid = $row["fid"];
                                            //$scheduleid = $row["scheduleid"];
                                            $observation = $row["observation"];
                                            $infoPA = $row["infoPA"];
                                            $pname = $row["pname"];
                                            //$apponum = $row["apponum"];
                                            $dateV = $row["dateV"];
                                            echo '<tr >
                                        <td style="font-weight:600;"> &nbsp;' .

                                                substr($pname, 0, 25)
                                                . '</td >
                                        <td style="text-align:center;font-size:23px;font-weight:500; color: var(--btnnicetext);">
                                        ' . $fid . '
                                        
                                        </td>
                                        <td>
                                        ' . substr($dateV, 0, 15) . '
                                        </td>
                                        <td style="text-align:center;font-size:12px;">
                                            ' . substr($observation, 0, 10)  . '
                                        </td>
                                        

                                        <td>
                                        <div style="display:flex;justify-content: center;">
                                        <a href="?action=edit&id=' . $fid . '&error=0" class="non-style-link"><button  class="btn-primary-soft btn button-icon btn-edit"  style="padding-left: 40px;padding-top: 12px;padding-bottom: 12px;margin-top: 10px;"><font class="tn-in-text">Edit</font></button></a>
                                        <a href="?action=view&id=' . $fid . '" class="non-style-link"><button  class="btn-primary-soft btn button-icon btn-view"  style="padding-left: 40px;padding-top: 12px;padding-bottom: 12px;margin-top: 10px; margin-left:10px;"><font class="tn-in-text">View</font></button></a>
                                       &nbsp;&nbsp;&nbsp;
                                       <a href="?action=drop&id=' . $fid . '&name=' . $pname .  ' " class="non-style-link"><button  class="btn-primary-soft btn button-icon btn-delete"  style="padding-left: 40px;padding-top: 12px;padding-bottom: 12px;margin-top: 10px;"><font class="tn-in-text">Remove</font></button></a>
                                       &nbsp;&nbsp;&nbsp;</div>
                                        </td>
                                    </tr>';
                                        }
                                    }

                                    ?>

                                </tbody>

                            </table>
                        </div>
                    </center>
                </td>
            </tr>



        </table>
    </div>
    </div>
    <?php

    if ($_GET) {
        $id = $_GET["id"];
        $action = $_GET["action"];
        if ($action == 'add-file') {

            echo '
            <div id="popup1" class="overlay">
                    <div class="popup">
                    <center>
                    
                    
                        <a class="close" href="file-patient.php">&times;</a> 
                        <div style="display: flex;justify-content: center;">
                        <div class="abc">
                        <table width="80%" class="sub-table scrolldown add-doc-form-container" border="0">
                        <tr>
                                <td class="label-td" colspan="2">' .
                ""

                . '</td>
                            </tr>

                            <tr>
                                <td>
                                    <p style="padding: 0;margin: 0;text-align: left;font-size: 25px;font-weight: 500;">Add New File.</p><br>
                                </td>
                            </tr>
                            <tr>
                                <td class="label-td" colspan="2">
                                <form action="add-file-patient.php" method="POST" class="add-new-form">
                            </tr>       
                           
                            <tr>
                                <td class="label-td" colspan="2">
                                    <select name="pid" id="" class="box" >
                                    <option value="" disabled selected hidden>Choose Patient Name from the list</option><br/>';


            $list11 = $database->query("select  * from  patient;");

            for ($y = 0; $y < $list11->num_rows; $y++) {
                $row00 = $list11->fetch_assoc();
                $sn = $row00["pname"];
                $id00 = $row00["pid"];
                echo "<option value=" . $id00 . ">$sn</option><br/>";
            };




            echo     '       </select><br><br>
                                </td>
                            </tr>
                            <tr>
                                <td class="label-td" colspan="2">
                                    <label for="dateV" class="form-label">Session Date: </label>
                                </td>
                            </tr>
                            <tr>
                                <td class="label-td" colspan="2">
                                    <input type="date" name="dateV" class="input-text" min="' . date('Y-m-d') . '" required><br>
                                </td>
                            </tr>

                            <tr>
                                <td class="label-td" colspan="2">
                                    <label for="observation" class="form-label">Observation: </label>
                                </td>
                            </tr>
                            <tr>
                                <td class="label-td" colspan="2">
                                <input type="text"  name="observation" class="input-text" placeholder="Observation du patient" required><br>
                                </td>
                            </tr>

                            <tr>
                                <td class="label-td" colspan="2">
                                    <label for="infoPA" class="form-label">Information Particuliere: </label>
                                </td>
                            </tr>
                            <tr>
                                <td class="label-td" colspan="2">
                                <input type="text" style="height: 60px;" name="infoPA" class="input-text" placeholder="Information Particuliere du patient" required><br>
                                </td>
                            </tr>
                           
                            <tr>
                                <td colspan="2">
                                    <input type="reset" value="Reset" class="login-btn btn-primary-soft btn" >&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                                
                                    <input type="submit" value="Place this File" class="login-btn btn-primary btn" name="shedulesubmit">
                                </td>
                
                            </tr>
                           
                            </form>
                            </tr>
                        </table>
                        </div>
                        </div>
                    </center>
                    <br><br>
            </div>
            </div>
            ';
        } elseif ($action == 'session-added') {
            $titleget = $_GET["title"];
            echo '
            <div id="popup1" class="overlay">
                    <div class="popup">
                    <center>
                    <br><br>
                        <h2>File Added.</h2>
                        <a class="close" href="file.patient.php">&times;</a>
                        <div class="content">
                        ' . substr($titleget, 0, 40) . ' was added.<br><br>
                            
                        </div>
                        <div style="display: flex;justify-content: center;">
                        
                        <a href="file-patient.php" class="non-style-link"><button  class="btn-primary btn"  style="display: flex;justify-content: center;align-items: center;margin:10px;padding:10px;"><font class="tn-in-text">&nbsp;&nbsp;OK&nbsp;&nbsp;</font></button></a>
                        <br><br><br><br>
                        </div>
                    </center>
            </div>
            </div>
            ';
        } elseif ($action == 'drop') {
            $nameget = $_GET["name"];
           
            $id = $_GET["id"];
            echo '
            <div id="popup1" class="overlay">
                    <div class="popup">
                    <center>
                        <h2>Are you sure?</h2>
                        <a class="close" href="file-patient.php">&times;</a>
                        <div class="content">
                            You want to delete this file<br><br>
                            Patient Name: &nbsp;<b>' . substr($nameget, 0, 40) . '</b><br>
                            file number &nbsp; : <b>' . substr($id, 0, 40) . '</b><br><br>
                            
                        </div>
                        <div style="display: flex;justify-content: center;">
                        <a href="delete-file-patient.php?id=' . $id . '" class="non-style-link"><button  class="btn-primary btn"  style="display: flex;justify-content: center;align-items: center;margin:10px;padding:10px;"<font class="tn-in-text">&nbsp;Yes&nbsp;</font></button></a>&nbsp;&nbsp;&nbsp;
                        <a href="file-patient.php" class="non-style-link"><button  class="btn-primary btn"  style="display: flex;justify-content: center;align-items: center;margin:10px;padding:10px;"><font class="tn-in-text">&nbsp;&nbsp;No&nbsp;&nbsp;</font></button></a>

                        </div>
                    </center>
            </div>
            </div>
            ';
        } elseif ($action == 'view') {
            $sqlmain = "select file.fid,file.dateV,file.observation,file.infoPA from file inner join patient on file.pid=patient.pid  where file.fid=$id";
            $result = $database->query($sqlmain);
            $row = $result->fetch_assoc();
            $fid = $row["fid"];
            $dateV = $row["dateV"];
            $observation = $row["observation"];
            $infoPA = $row["infoPA"];
            $sqlmain12 = "select * from file inner join patient on patient.pid=file.pid where file.fid=$id;";
            $result12 = $database->query($sqlmain12);

            echo '
            <div id="popup1" class="overlay">
                    <div class="popup" style="width: 70%;">
                    <center>
                        <h2></h2>
                        <a class="close" href="file-patient.php">&times;</a>
                        <div class="content">
                            
                            
                        </div>
                        <div class="abc scroll" style="display: flex;justify-content: center;">
                        <table width="80%" class="sub-table scrolldown add-doc-form-container" border="0">
                        
                            <tr>
                                <td>
                                    <p style="padding: 0;margin: 0;text-align: left;font-size: 25px;font-weight: 500;">File Details.</p><br><br>
                                </td>
                            </tr>
                            
                             
                            <tr>
                            <td class="label-td" colspan="2">
                                <label for="nic" class="form-label">file number: ' . $fid . '</label>
                            </td>
                        </tr>
                        <tr>
                            <td class="label-td" colspan="2">
                            <br><br>
                            </td>
                        </tr>


                        <tr>
                        <td class="label-td" colspan="2">
                            <label for="nic" class="form-label">Observation: </label>
                        </td>
                    </tr>
                    <tr>
                        <td class="label-td" colspan="2">
                        ' . $observation . '<br><br>
                        </td>
                    </tr>

                            <tr>
                                <td class="label-td" colspan="2">
                                    <label for="nic" class="form-label">Date Visite: </label>
                                </td>
                            </tr>
                            <tr>
                                <td class="label-td" colspan="2">
                                ' . $dateV . '<br><br>
                                </td>
                            </tr>

                            <tr>
                            <td class="label-td" colspan="2">
                                <label for="infoPA" class="form-label">Informations particulières: </label>
                            </td>
                        </tr>
                        <tr>
                            <td class="label-td" colspan="2">
                            ' . $infoPA . '<br><br>
                            </td>
                        </tr>

                            <tr>
                                <td class="label-td" colspan="2">
                                    <label for="spec" class="form-label"><b>Patient that related of this file:</b> (' . $result12->num_rows . "/" . $nop . ')</label>
                                    <br><br>
                                </td>
                            </tr>

                            
                            <tr>
                            <td colspan="4">
                                <center>
                                 <div class="abc scroll">
                                 <table width="100%" class="sub-table scrolldown" border="0">
                                 <thead>
                                 <tr>   
                                        <th class="table-headin">
                                             Patient ID
                                         </th>
                                         <th class="table-headin">
                                             Patient name
                                         </th>
                                         
                                         
                                         <th class="table-headin">
                                             Patient Telephone
                                         </th>

                                         <th class="table-headin">
                                            Code CNSS
                                         </th>
                                         
                                 </thead>
                                 <tbody>';




            $result = $database->query($sqlmain12);

            if ($result->num_rows == 0) {
                echo '<tr>
                                             <td colspan="7">
                                             <br><br><br><br>
                                             <center>
                                             <img src="../img/notfound.svg" width="25%">
                                             
                                             <br>
                                             <p class="heading-main12" style="margin-left: 45px;font-size:20px;color:rgb(49, 49, 49)">We  couldnt find anything related to your keywords !</p>
                                             <a class="non-style-link" href="fle-patient.php"><button  class="login-btn btn-primary-soft btn"  style="display: flex;justify-content: center;align-items: center;margin-left:20px;">&nbsp; Show all files &nbsp;</font></button>
                                             </a>
                                             </center>
                                             <br><br><br><br>
                                             </td>
                                             </tr>';
            } else {
                for ($x = 0; $x < $result->num_rows; $x++) {
                    $row = $result->fetch_assoc();
                    $pid = $row["pid"];
                    $pname = $row["pname"];
                    $ptel = $row["ptel"];
                    $cnss = $row["cnss"];

                    echo '<tr style="text-align:center;">
                                                <td>
                                                ' . substr($pid, 0, 15) . '
                                                </td>
                                                 <td style="font-weight:600;padding:25px">' .

                        substr($pname, 0, 25)
                        . '</td >
                                                 
                                                 <td>
                                                 ' . substr($ptel, 0, 25) . '
                                                 </td>
                                                 <td>
                                                 ' . substr($cnss, 0, 25) . '
                                                 </td>
                                                 
                                                 
                
                                                 
                                             </tr>';
                }
            }


           



            echo '</tbody>
                
                                 </table>
                                 </div>
                                 </center>
                            </td> 
                         </tr>

                        </table>
                        </div>
                    </center>
                    <br><br>
            </div>
            </div>
            ';
        }

        else if ($action == 'edit'){
            $sqlmain = "select * from file where fid='$id'";
            $result = $database->query($sqlmain);
            $row = $result->fetch_assoc();
            $fid = $row["fid"];
            $observation = $row["observation"];
            $dateV = $row["dateV"];
            $infoPA = $row["infoPA"];
            $pid = $row["pid"];

            $error_1 = $_GET["error"];
            $errorlist = array(

                '4' => "",
                '0' => '',
    
            );
    
            if ($error_1 != '4') {
                echo '
                    <div id="popup1" class="overlay">
                            <div class="popup">
                            <center>
                            
                                <a class="close" href="file-patient.php">&times;</a> 
                                <div style="display: flex;justify-content: center;">
                                <div class="abc">
                                <table width="80%" class="sub-table scrolldown add-doc-form-container" border="0">
                                <tr>
                                        <td class="label-td" colspan="2">' .
                    $errorlist[$error_1]
                    . '</td>
                                    </tr>
                                    <tr>
                                        <td>
                                            <p style="padding: 0;margin: 0;text-align: left;font-size: 25px;font-weight: 500;">Edit file Details.</p>
                                        file ID : ' . $id . ' (Auto Generated)<br><br>
                                        </td>
                                    </tr>
                                   
                                    <tr>
                                    <td class="label-td" colspan="2">
                                        <form action="edit-file-patient.php" method="POST" class="add-new-form">
                                        <label for="patient" class="form-label">Change Patient: </label>
                                        <input type="hidden" value="' . $id . '" name="fid">
                                        
                                    </td>
                                </tr>


                                    <tr>
                                    <td class="label-td" colspan="2">
                                        <select name="pid" id="" class="box" >
                                        <option value= " " disabled selected hidden>Change Patient Name from the list</option><br/>';
    
    
                $list11 = $database->query("select  * from  patient inner join file on patient.pid=file.pid where fid=$id;");
    
                for ($y = 0; $y < $list11->num_rows; $y++) {
                    $row00 = $list11->fetch_assoc();
                    $sn = $row00["pname"];
                    $id00 = $row00["pid"];
                    echo "<option value=" . $id00 . " selected>$sn</option><br/>";
                };
    
    
    
    
                echo     '       </select><br><br>
                                    </td>
                                </tr>
                                <tr>
                                <td class="label-td" colspan="2">
                                    <label for="datev" class="form-label">Date Visite: </label>
                                </td>
                            </tr>
                                 
                                <tr>
                                    <td class="label-td" colspan="2">
                                        <input type="date" name="dateV" class="input-text" placeholder="Date Of Brith" value="' . $dateV . '" required><br>
                                    </td>
                                </tr>
    
                                <tr>
                                <td class="label-td" colspan="2">
                                    <label for="observation:" class="form-label">Observation: </label>
                                </td>
                            </tr>
                            <tr>
                                <td class="label-td" colspan="2">
                                    <input type="text" name="observation" class="input-text" placeholder="observation" value="' . $observation . '" required><br>
                                </td>
                            </tr>

                            <tr>
                            <td class="label-td" colspan="2">
                                <label for="infoPA:" class="form-label">Informations particulières: </label>
                            </td>
                        </tr>
                        <tr>
                            <td class="label-td" colspan="2">
                                <input type="text" style="height: 60px;" name="infoPA" class="input-text" placeholder="Adress" value="' . $infoPA . '" required><br>
                            </td>
                        </tr>
    
                           
                                    <tr>
                                        <td colspan="2">
                                            <input type="reset" value="Reset" class="login-btn btn-primary-soft btn" >&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                                        
                                            <input type="submit"  value="Save" class="login-btn btn-primary btn">
                                        </td>
                        
                                    </tr>
                                
                                    </form>
                                    </tr>
                                </table>
                                </div>
                                </div>
                            </center>
                            <br><br>
                    </div>
                    </div>
                    ';
            } else {
                echo '
                <div id="popup1" class="overlay">
                        <div class="popup">
                        <center>
                        <br><br><br><br>
                            <h2>Edit Successfully!</h2>
                            <a class="close" href="file-patient.php">&times;</a>
                            <div class="content">
                                
                                
                            </div>
                            <div style="display: flex;justify-content: center;">
                            
                            <a href="file-patient.php" class="non-style-link"><button  class="btn-primary btn"  style="display: flex;justify-content: center;align-items: center;margin:10px;padding:10px;"><font class="tn-in-text">&nbsp;&nbsp;OK&nbsp;&nbsp;</font></button></a>
    
                            </div>
                            <br><br>
                        </center>
                </div>
                </div>
    ';
            };
        };

        }
       
    

    ?>
    </div>

</body>

</html>