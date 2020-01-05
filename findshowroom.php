<?php
include_once "addseats.php";
function findshowroom($showroom,$showID,$startdate,$enddate)
{
    $host="127.0.0.1";
    $port=3306;
    $dbusername="root";
    $dbpassword="password";
    $dbname="cinemabooking";

// Create connection
    $conn = new mysqli ($host, $dbusername, $dbpassword, $dbname, $port);
    $sql2 = "SELECT * FROM cinemabooking.showroom WHERE showroomID = '$showroom' ";
    $result2 = mysqli_query($conn, $sql2);
    $row2 = mysqli_fetch_array($result2);
    $totalseats = $row2['totalSeats'];
    //addseats($totalseats,$showID,$startdate,$enddate);
}
?>