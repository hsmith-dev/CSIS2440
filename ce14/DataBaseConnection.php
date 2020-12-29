<?php
$host = "localhost";
$user = "root";
$password = "DBAdmin";
$dbname = "CSIS2440";
$con = new mysqli($host, $user, $password, $dbname) or die ('Could not connect to the database server.' . mysqli_connection_error($con));

function mysql_fix_string($conn, $string) {
    if (get_magic_quotes_gpc()) {
        $string = stripslashes($string);
    }
    $string = htmlentities($string);
    return $conn->real_escape_string($string);
}