<?php
    $firstName = $_POST['FirstName'];
    $lastName = $_POST['LastName'];
    $email = $_POST['EMail'];
    $dob = $_POST['DOB'];
    $pass = hash("ripemd128", $_POST['Pass']);

    $hashed = hash("ripemd128", $pass);
    $update = "UPDATE CSIS2440.Players Set FirstName = '$firstName', LastName = '$lastName', Birthdate = '$dob' WHERE(EMail = '$email' AND ThePass = '$hashed')";
    $result = $con->query($update);

    if(!$result){
        $failmess = "Whole query: " . $udpdate . "<br>";
        echo $failmess;
        print('Invalid query: ' . mysqli_error($con) . "<br>");
    } else {
        session_start();
        $_SESSION['FirstName'] = $firstName;
        $_SESSION['LastName'] = $lastName;
        $_SESSION['EMail'] = $email;
        $_SESSION['Birthdate'] = $dob;
        $_SESSION['Type'] = "updated";
        header("Location:ResultPage.php");
    }
