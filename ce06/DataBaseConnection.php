<?php
$host = "localhost";
$user = "root";
$password = "DBAdmin";
$dbname = "CSIS2440";
$con = new mysqli($host, $user, $password, $dbname) or die ('Could not connect to the database server.' . mysqli_connection_error($con));

if($con -> connection_error == FALSE){
    echo "<h2>We are Connected</h2>";
} else {
    echo $con->connect_error;
}
print_r($con);
?>

