<?php

session_start();

// user inputs
$newpword = filter_input(INPUT_POST, 'newPword');
$newpassword = md5($newpword);
$email = $_SESSION["useremail"];

echo $email;

$host = "127.0.0.1";
$port = 3306;
$socket = "";
$dbusername = "root";
$dbpassword = "password";
$dbname = "cinemabooking";

//Create connection

$conn = new mysqli ($host, $dbusername, $dbpassword, $dbname, $port);
if (mysqli_connect_error()) {
    die('Connect Error (' . mysqli_connect_errno() . ') '
        . mysqli_connect_error());
} else {
    $sql = "UPDATE user SET password = '$newpassword' WHERE emailAddress='$email'";
    if ($conn->query($sql)) {
        echo "<script>alert('Update success!')</script>";
        header("Location:resetPword-success.html");
    } else {
        echo "<script>alert('Update Failed!')</script>";
        echo "Error: " . $sql . "" . $conn->error;
    }
    $conn->close();
    session_unset();
    session_destroy();
}

?>