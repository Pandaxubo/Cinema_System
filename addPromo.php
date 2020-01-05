<?php
$promoid = rand(0,22222);
$promorate = filter_input(INPUT_POST,'promorate');
$promocode = filter_input(INPUT_POST,'promocode');


$host = "127.0.0.1";
$port = 3306;
$dbusername = "root";
$dbpassword = "password";
$dbname = "cinemabooking";
$conn = new mysqli ($host, $dbusername, $dbpassword, $dbname, $port);

if (mysqli_connect_error()) {
    die('Connect Error ('. mysqli_connect_errno() .') '
        . mysqli_connect_error());
}
else{
    $sql= "INSERT INTO promotion(promoID,promoRate,promoCode)
            values('$promoid','$promorate','$promocode')";
    if ($conn->query($sql)) {
//        echo "<script>alert("Promotion Added!")</script>";
        header("Location: promotionpage.php");
    }
    else {
        echo "Error: " . $sql . "" . $conn->error;
    }
}
$conn->close();
?>