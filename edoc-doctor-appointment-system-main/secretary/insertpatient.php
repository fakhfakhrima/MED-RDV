<?php
// Connexion à la base de données
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "edoc";

// Création de la connexion
$conn = new mysqli($servername, $username, $password, $dbname);

// Vérification de la connexion
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Création de la base de données si elle n'existe pas
if (!mysqli_select_db($conn, $dbname)) {
    $sql = "CREATE DATABASE edoc";
    if ($conn->query($sql) === TRUE) {
        echo "Database created successfully";
    } else {
        echo "Error creating database: " . $conn->error;
    }
}

// Création de la table si elle n'existe pas
$sql = "CREATE TABLE IF NOT EXISTS patient (
    pid int(11) NOT NULL,
   pemail varchar(255) DEFAULT NULL,
   pname varchar(255) DEFAULT NULL,
   ppassword varchar(255) DEFAULT NULL,
   paddress  varchar(255) DEFAULT NULL,
   pnic varchar(15) DEFAULT NULL,
   pdob date DEFAULT NULL,
   ptel varchar(15) DEFAULT NULL,
   region varchar(255) NOT NULL,
   cnss varchar(255) NOT NULL,
   PRIMARY KEY (pid)
)";

if ($conn->query($sql) === TRUE) {
    echo "Table created successfully";
} else {
    echo "Error creating table: " . $conn->error;
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $pid = $_POST["pid"];
    $pemail = $_POST["pemail"];
    $pname = $_POST["pname"];
    $ppassword = $_POST["ppassword"];
    $padress = $_POST["padress"];
    $pnic = $_POST["pnic"];
    $pdob = $_POST["pdob"];
    $ptel = $_POST["ptel"];
    $region = $_POST["region"];
    $cnss = $_POST["cnss"];

    // Check for duplicate primary key error
    $sql = "INSERT INTO patient (pid, pemail, pname, ppassword, paddress, pnic, pdob, ptel, region, cnss) VALUES ('$pid','$pemail', '$pname', '$ppassword','$padress','$pnic','$pdob','$ptel','$region','$cnss')";
    $sql1="INSERT INTO webuser(email,usertype) VALUES ('$pemail','p')";
    if ($conn->query($sql) === TRUE) {
        $b = mysqli_query($conn,$sql1);
        echo "New Patient created successfully";
    } else {
        if ($conn->errno === 1062) {
            echo "Duplicate entry for primary key. Please use a different pid.";
        } else {
            echo "Error: " . $sql . "<br>" . $conn->error;
        }
    }
}
header("location: patient.php?action=add&error=" . $error);
$conn->close();
?>
<!DOCTYPE html>
<html>

<head>
    <title>Formulaire d'ajout de patients </title>
</head>

<body>
    <h1>Ajouter un patient</h1>
    <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post">
        <label for="pid">pid :</label>
        <input type="number" id="pid" name="pid" required maxlength="11"><br>
        <label for="pemail">pemail:</label>
        <input type="email" id="pemail" name="pemail" required><br>
        <label for="pname">pname:</label>
        <input type="text" id="pname" name="pname" required><br>
        <label for="ppassword">ppassword:</label>
        <input type="password" id="ppassword" name="ppassword" required><br>
        <label for="padress">padress:</label>
        <input type="text" id="padress" name="padress" required><br>
        <label for="pnic">pnic:</label>
        <input type="number" id="pnic" name="pnic" required maxlength="15"><br>
        <label for="pdob">pdob:</label>
        <input type="date" id="pdob" name="pdob" required><br>
        <label for="ptel">ptel:</label>
        <input type="tel" id="ptel" name="ptel" required maxlength="15"><br>
        <label for="region">region:</label>
        <input type="text" id="region" name="region" required><br>
        <label for="cnss">cnss:</label>
        <input type="number" id="cnss" name="cnss" required><br>
        <input type="submit" value="Ajouter">
    </form>
</body>

</html>