<?php
    $firstName = $_POST['FirstName'];
    $lastName = $_POST['LastName'];
    $email = $_POST['EMail'];
    $dob = $_POST['DOB'];
    $pass = hash("ripemd128", $_POST['Pass']);


$insert = "INSERT INTO CSIS2440.Players (`FirstName`, `LastName`, `EMail`, `Birthdate`, `ThePass`) "
        . "VALUES ('$firstName', '$lastName', '$email', '$dob', '$pass')";
$success = $con->query($insert);

if($success == FALSE) {
    $failmess = "Whole query: " . $insert . "<br>";
    echo $failmess;
    print('Invalid query: ' . mysqli_error($con) . "<br>");
} else {
    session_start();
    $_SESSION['FirstName'] = $firstName;
    $_SESSION['LastName'] = $lastName;
    $_SESSION['EMail'] = $email;
    $_SESSION['Birthdate'] = $dob;
    $_SESSION['Type'] = "created";
    header("Location:ResultPage.php");
}
?>