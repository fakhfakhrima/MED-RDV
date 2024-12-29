<?php
include("db.php");

if (isset($_POST['save'])) {


  $sqlmain = "select * from job";
      $result = $database->query($sqlmain);
      $id = $row["id"];
   $name = $row  ['name'];
   $email = $row ['email'];
   $phone = $row ['phone'];
    $date = $row  ['date'];
   $message= $row['message'];

 
  

}

/*if ($action == 'del') {
  $id = $_GET['id'];
  $del_sql = "DELETE FROM job WHERE id = $id";
  $res_del = mysqli_query($con, $del_sql);
}
if (isset($_GET['action']) && $_GET['action'] == 'del') {
  $id = $_GET['id'];
  $del_sql = "DELETE FROM job WHERE id = $id";
  $res_del = mysqli_query($con, $del_sql);
  if (!$res_del) {
    die(mysqli_error($con));

  } else {
    $action = 'del';
  }
}*/
$users_sql = "SELECT * FROM job";
$all_user = mysqli_query($con, $users_sql);


?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="css/bootstrap.min.css">
  <link rel="stylesheet" href="css/toster.css">
  <title>job sec</title>
  
</head>

<body >
  <div class="container">
    <div class="wrapper p-5 m-5">
      <div  class="d-flex p-2 justify-content-between mb-2">
       <h2>job sec</h2>
      

      </div>
      <hr>
      <table class="table table-striped">
        <thead>
          <tr>
            <th scope="col">id</th>
            <th scope="col">name</th>
            <th scope="col">email</th>
            <th scope="col">phone</th>
            <th scope="col">date</th>
            <th scope="col">message</th>
          </tr>
        </thead>
        <tbody>
          <?php

          while ($user = $all_user->fetch_assoc()) { ?>

            <tr>

              <td>
                <?php echo $user['id']; ?>
              </td>
              <td>
                <?php echo $user['name']; ?>
              </td>
              <td>
                <?php echo $user['email']; ?>
              </td>
              <td>
                <?php echo $user['phone']; ?> 
              </td>
              <td>
                <?php echo $user['date']; ?> 
              </td>
              <td>
                <?php echo $user['message']; ?> 
              </td>
              <td>
                <div class="d-flex p-2 justify-content-evenly mb-2">

                 <!-- <i style="cursor: pointer;" onclick="confirm_delete(<?php echo $user['id']; ?>);" class="text-danger" data-feather="trash-2"></i>-->

                </div>
              </td>
            </tr>
          <?php }

          ?>

        </tbody>
      </table>
    </div>

  </div>

  <div class="button-container">
    <a href="../index.php" class="button-link" >Back</a>
  </div>
  <style>
    .button-container{
      display: flex;
      justify-content: center;
      align-items: center;
      
    }
    .button-link{
      background-color: blue;
      color: white;
      padding: 15px 32px;
      text-align: center;
      text-decoration: none;
      display: inline-block;
      font-size: 16px;
      margin: 4px 2px;
      cursor: pointer;
      border: none;
      border-radius: 4px;
    }
  </style>
  <script src="js/jq.js"></script>
  <script src="js/bootstrap.min.js"></script>
  <script src="js/icons.js"></script>
  <script src="js/toster.js"></script>
  <script src="js/main.js"></script>
  
  <script>
    feather.replace();
  </script>
</body>

</html>