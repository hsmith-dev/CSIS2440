<?php
session_start();
unset($_SESSION['badPass']);
// username and password sent from form
$firstName = $_SESSION['FirstName'];
$lastName = $_SESSION['LastName'];
$email = $_SESSION['EMail'];
$phone = $_SESSION['Phone'];
$birthdate = $_SESSION['Birthdate'];
$type = $_SESSION['Type'];


echo "The user: " . $firstName . " " . $lastName . " has been ". $type." <br>"
    . "Information as follows:<br>"
    . "E-Mail: " . $email . "<br>"
    . "Phone: " . $phone . "<br>"
    . "Birthdate: " . $birthdate . "<br>"
    . "Password is hidden.";
?>