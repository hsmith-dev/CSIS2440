<?php

session_start();
unset($_SESSION['badPass']);
// username and password sent from form
$myusername = $_POST['myusername'];
$mypassword = $_POST['mypassword'];
// Connect to server and select database
require_once 'DataBaseConnection.php';
// To protect MySQL Injection
$myusername = mysql_fix_string($con, $myusername);
$mypassword = mysql_fix_string($con, $mypassword);
// Hashing
$Hashed = hash("ripemd128", $mypassword);

$sql = "SELECT * FROM CSIS2440.Captains where Email = '$myusername' AND ThePass = '$Hashed'";
$result = $con->query($sql);

if(!$result) {
    $message = "Whole query " . $sql;
    echo $message;
    die('Invalid query: ' . mysqli_error());
}
// Mysql_num_row is counting table row
$count = $result->num_rows;

// If result matched $myusername and password, table row must be 1 row
if ($count == 1) {
    $row = $result->fetch_assoc();
    $_SESSION['user'] = $myusername;
    $_SESSION['password'] = $mypassword;
    $_SESSION['Captain'] = $row['CaptainName'];
    $_SESSION['Command'] = $row['Command'];
    $_SESSION['Combat'] = $row['Combat'];
    $_SESSION['Commerce'] = $row['Commerce'];
    $_SESSION['Cunning'] = $row['Cunning'];

    header("Location:Dashboard.php");
} else {
    header("Location:LoginPage.php");
    $_SESSION['badPass'] ++;
}