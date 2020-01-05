<?php
function getShow($movienum)
{
    $host = "127.0.0.1";
    $port = 3306;
    $dbusername = "root";
    $dbpassword = "password";
    $dbname = "cinemabooking";
    $conn = new mysqli ($host, $dbusername, $dbpassword, $dbname, $port);
    //$sql = "SELECT * FROM cinemabooking.show";
    $sql = "SELECT * FROM cinemabooking.show WHERE movie_movieID = '$movienum'";
    $result = $conn->query($sql);
    if ($result) {
        $row = $result->fetch_array();
        $starttime = $row['starttime'];
        $endtime = $row['endtime'];
        $showroomID = $row['showroom_showroomID'];
        $startdate = $row['startdate'];
        $enddate = $row['enddate'];
//        echo $starttime;
//        echo $endtime;
//        echo $startdate;
//        echo $enddate;
        $_SESSION['starttime'] = $starttime;
        $_SESSION['endtime'] = $endtime;
        $_SESSION['startdate'] = $startdate;
        $_SESSION['enddate'] = $enddate;
        $_SESSION['showroomID'] = $showroomID;
    } else {
        echo 'Query error！';
    }
    $conn->close();
}
?>