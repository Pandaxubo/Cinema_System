<?php
session_start();

$useremail = $_SESSION['useremail'];
$host="127.0.0.1";
$port=3306;
$dbusername="root";
$dbpassword="password";
$dbname="cinemabooking";

// Create connection
$conn = new mysqli ($host, $dbusername, $dbpassword, $dbname, $port);
if (mysqli_connect_error()) {
    die('Connect Error (' . mysqli_connect_errno() . ') '
        . mysqli_connect_error());
} else {
    $sql = "SELECT lastfour FROM paymentinfo WHERE user_emailAddress = '$useremail'";
    $result = mysqli_query($conn, $sql);
    $rowtitle = mysqli_fetch_array($result,MYSQLI_NUM);
    $lastfour = $rowtitle[0];
    echo "<script>alert('$lastfour')</script>";
    
    $sql = "SELECT * FROM paymentinfo WHERE (lastfour = '$lastfour')";
    $result = mysqli_query($conn, $sql);
    $rows = mysqli_num_rows($result);
    $row = mysqli_fetch_array($result);

    if ($rows) { // Check if the payment info already exists
        $sql = "DELETE FROM paymentinfo WHERE (lastfour = '$lastfour')";
        if ($conn->query($sql)) {
            echo "<script>alert('Payment information has been successfully deleted!')</script>";
            echo "<script>window.location.replace('editpayinfo.php')</script>";
        } else {
            echo "Error: " . $sql . "" . $conn->error;
        }
    } else { // The payment info already exists in the DB
        echo "<script>alert('Payment information does not exist')</script>";
        echo "<script>window.location.replace('editpayinfo.php')</script>";
    }
    // End connection
    $conn->close();
//    session_unset();
//    session_destroy();
}
?>