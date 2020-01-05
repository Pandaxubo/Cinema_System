<?php

session_start();
if (isset($_SESSION['moviename'])) {
    $title = $_SESSION['moviename'];
    $host = "127.0.0.1";
    $port = 3306;
    $dbusername = "root";
    $dbpassword = "password";
    $dbname = "cinemabooking";

    $conn = new mysqli ($host, $dbusername, $dbpassword, $dbname, $port);
    $sql_1 = "SELECT * FROM movie WHERE title = '$title'";
    $result = $conn->query($sql_1);

    if ($result->num_rows > 0) {
        $rows = $result->fetch_array();
        echo $_SESSION["moviename"];
        $category = $rows['category'];
        $moviename = $rows['title'];
        $producer = $rows['producer'];
        $director = $rows['director'];
        $cast = $rows['cast'];
        $trailer = $rows['trailer'];
        $synopsis = $rows['synopsis'];
        $imagepath1 = $rows['imagepath1'];
        $imagepath2 = $rows['imagepath2'];
        $imagepath3 = $rows['imagepath3'];
        $posterpath = $rows['posterpath'];
        $movieID = $rows['movieID'];
    }

    ?>