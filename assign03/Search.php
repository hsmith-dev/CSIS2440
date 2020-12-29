<?php
$search = "SELECT * FROM CSIS2440.Players where (FirstName like '%$firstName%') Order by FirstName";

$return = $con->query($search);
if(!$return) {
    $message = "Whole query: " . $search;
    echo $message;
    die('Invalid query: ' . mysqli_error($con));
}
session_start();
while ($row = $return->fetch_assoc()){
    $_SESSION['FirstName'] = $row['FirstName'];
    $_SESSION['LastName'] = $row['LastName'];
    $_SESSION['EMail'] = $row['EMail'];
    $_SESSION['Birthdate'] = $row['Birthdate'];
    $_SESSION['Phone'] = $row['Phone'];
}
$_SESSION['Type'] = "found";
header("Location:ResultPage.php");

?>