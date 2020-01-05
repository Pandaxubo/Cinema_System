<?php
function storeTicket(){
    $host = "127.0.0.1";
    $port = 3306;
    $dbusername = "root";
    $dbpassword = "password";
    $dbname = "cinemabooking";
    $conn = new mysqli ($host, $dbusername, $dbpassword, $dbname, $port);
    $sql = "INSERT INTO cinemabooking.ticket(ticketID, booking_bookingID, seat_seatNo)";
    mysqli_query($conn,$sql);
}
?>