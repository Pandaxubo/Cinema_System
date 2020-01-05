<?php
function storeBooking(){
    $bookingid = uniqid('booking');
    $total = $_SESSION['total'];
    $userid = $_SESSION['useremail'];
    $host = "127.0.0.1";
    $port = 3306;
    $dbusername = "root";
    $dbpassword = "password";
    $dbname = "cinemabooking";
    $conn = new mysqli ($host, $dbusername, $dbpassword, $dbname, $port);
    $sql = "INSERT INTO cinemabooking.booking (bookingID, total, promotion_promoID, user_userID) values (1,'$total','code','$userid')";
    mysqli_query($conn,$sql);
}
?>
