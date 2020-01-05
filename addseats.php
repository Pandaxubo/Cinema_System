<?php
function addseats($totalseats,$showID,$startdate,$enddate){
    $host="127.0.0.1";
    $port=3306;
    $dbusername="root";
    $dbpassword="password";
    $dbname="cinemabooking";
// Create connection
    $conn = new mysqli ($host, $dbusername, $dbpassword, $dbname, $port);
    $stimestamp = strtotime($startdate);
    $etimestamp = strtotime($enddate);
    $days = ($etimestamp - $stimestamp) / 86400 + 1;
    $date = array();
    for ($i = 0; $i < $days; $i++) {
        $date[] = date('Y-m-d', $stimestamp + (86400 * $i));
    }
    $length = sizeof($date);

    for ($a = 0; $a < $length; $a ++) {
        for ($x = 1; $x <= $totalseats; $x++) {
            $sql4 = "INSERT INTO cinemabooking.seat (`seatNo`,`status`,`show_showID`,`date`) VALUES ($x,0,'$showID','$date[$a]')";
            mysqli_query($conn, $sql4);
        }
    }
}
?>