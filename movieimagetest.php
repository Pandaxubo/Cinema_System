<?php
$host = "127.0.0.1";
$port = 3306;
$dbusername = "root";
$dbpassword = "password";
$dbname = "cinemabooking";
$conn = new mysqli ($host, $dbusername, $dbpassword, $dbname, $port);


$image = addslashes(file_get_contents($_FILES['image']['tmp_name'])); //SQL Injection defence!
$image_name = addslashes($_FILES['image']['name']);
$sql = "INSERT INTO `movie` ( `image`, `imagename`) VALUES ( '{$image}', '{$image_name}')";
$result = $conn->query($sql);

//if (!mysql_query($sql)) { // Error handling
//echo "Something went wrong! :(";
//}
?>