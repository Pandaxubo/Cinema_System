<?php

$verificationcode = filter_input(INPUT_POST, 'verify');

$host = "127.0.0.1";
$port = 3306;
$socket = "";
$dbusername = "root";
$dbpassword = "password";
$dbname = "cinemabooking";

$conn = new mysqli ($host, $dbusername, $dbpassword, $dbname, $port);

if (mysqli_connect_error()) {
    die('Connect Error (' . mysqli_connect_errno() . ') '
        . mysqli_connect_error());
} else {
        $query = "UPDATE user set userType_userTypeID = 2 WHERE lastName = '$verificationcode'";
        if ($conn->query($query)) {
            if (!empty($result)) {
                echo "<script> alert('Your account is activated.'); </script>";
            } else {
                echo "<script> alert('Your account is activated.'); </script>";
            }
        } else {
            echo "Error: " . $query . "" . $conn->error;
        }
    echo "<script>window.location.replace('login.html')</script>";
    $conn->close();
}

?>
