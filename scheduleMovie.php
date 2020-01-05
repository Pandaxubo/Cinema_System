<?php

session_start();
include_once "findshowroom.php";
// $movietitle = filter_input(INPUT_POST, 'mName');
$showID = mt_rand();
$movieID = filter_input(INPUT_POST, 'movieID');
$starttime = filter_input(INPUT_POST, 'starttime');
$endtime = filter_input(INPUT_POST, 'endtime');
$startdate = filter_input(INPUT_POST, 'startdate');
$enddate = filter_input(INPUT_POST, 'enddate');
$showroom = filter_input(INPUT_POST, 'showroom');
$duration = filter_input(INPUT_POST, 'duration');

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
    $sql = "SELECT * FROM `show` WHERE `movie_movieID` = '$movieID' 
            AND `showroom_showroomID` = '$showroom' 
            AND `starttime` >= '$starttime' 
            AND `endtime` <= '$endtime'
            AND `startdate` >= '$startdate' 
            AND `enddate` <= '$enddate'";
    $result = mysqli_query($conn, $sql);
    $rows = mysqli_num_rows($result);
    $row = mysqli_fetch_array($result);

    if($rows < 1) { // Check if there is a schedule conflict
        $sql = "INSERT INTO `show` (`showID` , `movie_movieID`, `showroom_showroomID`, `startdate`, `enddate`, `starttime`, `endtime`,`duration`) 
                VALUES ('$showID','$movieID','$showroom','$startdate','$enddate','$starttime','$endtime','$duration')";
        if ($conn->query($sql)) {
            findshowroom($showroom,$showID,$startdate,$enddate);
            echo "1";
            echo "<script>alert('Movie has been successfully scheduled!')</script>";
            header("Location: admin-movieShowTime.html");
        } else {
            echo "Error: " . $sql . "" . $conn->error;
        }
    } else { // The schedule already exists in the DB
        // $message = "There is a schedule conflict!";
        // echo "<script type='text/javascript'>alert('$message');</script>";
        header("Location: admin-movieShowTime.html");
        echo "There is a schedule conflict!";
    }
    // End connection
    $conn->close();
    session_unset();
    session_destroy();
}

?>
