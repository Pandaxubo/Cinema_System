<?php

session_start();

// $movieid = uniqid('movie');
// $movieid = mt_rand(); // Generate a random integer as a movie id; might change later
$movieid = filter_input(INPUT_POST, 'movieID');
$movietitle = filter_input(INPUT_POST, 'mName');
$category = filter_input(INPUT_POST, 'category');
$cast = filter_input(INPUT_POST, 'cast');
$director = filter_input(INPUT_POST, 'director');
$producer = filter_input(INPUT_POST, 'producer');
$mpaarating = filter_input(INPUT_POST, 'mpaa-rating');
$synopsis = filter_input(INPUT_POST, 'synopsis');
$trailervid = filter_input(INPUT_POST, 'trailer-vid');
$trailerpic1 = filter_input(INPUT_POST, 'trailer-picture1');
$trailerpic2 = filter_input(INPUT_POST, 'trailer-picture2');
$trailerpic3 = filter_input(INPUT_POST, 'trailer-picture3');
$posterpic = filter_input(INPUT_POST, 'poster-picture');
// $startdate = filter_input(INPUT_POST, 'startdate');
// $enddate = filter_input(INPUT_POST, 'enddate');
// $cinemano = filter_input(INPUT_POST, 'cienmano');
// $availseats = filter_input(INPUT_POST, 'availseats');
// $movietime = filter_input(INPUT_POST, 'movietime');

$host = "127.0.0.1";
$port = 3306;
$dbusername = "root";
$dbpassword = "password";
$dbname = "cinemabooking";

// Create connection
$conn = new mysqli ($host, $dbusername, $dbpassword, $dbname, $port);
if (mysqli_connect_error()) {
    die('Connect Error (' . mysqli_connect_errno() . ') '
        . mysqli_connect_error());
} else {
    $sql = "SELECT * FROM movie WHERE movieID='$movieid'";
    $result = mysqli_query($conn, $sql);
    $rows = mysqli_num_rows($result);
    $row = mysqli_fetch_array($result);

    if ($rows) { // Check if the movie already exists
        if (empty($movietitle)) {
            $sql = "SELECT `title` FROM movie WHERE movieID='$movieid'";
            $result = mysqli_query($conn, $sql);
            $rowtitle = mysqli_fetch_array($result,MYSQLI_NUM);
            $movietitle = $rowtitle[0];
        }
        if (empty($category)) {
            $sql = "SELECT `category` FROM movie WHERE movieID='$movieid'";
            $result = mysqli_query($conn, $sql);
            $rowcategory = mysqli_fetch_array($result,MYSQLI_NUM);
            $category = $rowcategory[0];
        }
        if (empty($cast)) {
            $sql = "SELECT `cast` FROM movie WHERE movieID='$movieid'";
            $result = mysqli_query($conn, $sql);
            $rowcast = mysqli_fetch_array($result,MYSQLI_NUM);
            $cast = $rowcast[0];
        }
        if (empty($director)) {
            $sql = "SELECT  `director` FROM movie WHERE movieID='$movieid'";
            $result = mysqli_query($conn, $sql);
            $rowdirector = mysqli_fetch_array($result,MYSQLI_NUM);
            $director = $rowdirector[0];
        }
        if (empty($producer)) {
            $sql = "SELECT `producer` FROM movie WHERE movieID='$movieid'";
            $result = mysqli_query($conn, $sql);
            $rowproducer = mysqli_fetch_array($result,MYSQLI_NUM);
            $producer = $rowproducer[0];
        }
        if (empty($synopsis)) {
            $sql = "SELECT  `synopsis` FROM movie WHERE movieID='$movieid'";
            $result = mysqli_query($conn, $sql);
            $rowsynopsis = mysqli_fetch_array($result,MYSQLI_NUM);
            $syonpsis = $rowsynopsis[0];
        }
        if (empty($mpaarating)) {
            $sql = "SELECT `ratingCode` FROM movie WHERE movieID='$movieid'";
            $result = mysqli_query($conn, $sql);
            $rowmpaarating = mysqli_fetch_array($result,MYSQLI_NUM);
            $mpaarating = $rowmpaarating[0];
        }
        if (empty($trailervid)) {
            $sql = "SELECT `trailer` FROM movie WHERE movieID='$movieid'";
            $result = mysqli_query($conn, $sql);
            $rowtrailervid = mysqli_fetch_array($result,MYSQLI_NUM);
            $trailervid = $rowtrailervid[0];
        }
        if (empty($trailerpic1)) {
            $sql = "SELECT `imagepath1` FROM movie WHERE movieID='$movieid'";
            $result = mysqli_query($conn, $sql);
            $rowtrailerpic1 = mysqli_fetch_array($result,MYSQLI_NUM);
            $trailerpic1 = $rowtrailerpic1[0];
        }
        if (empty($trailerpic2)) {
            $sql = "SELECT `imagepath2` FROM movie WHERE movieID='$movieid'";
            $result = mysqli_query($conn, $sql);
            $rowtrailerpic2 = mysqli_fetch_array($result,MYSQLI_NUM);
            $trailerpic2 = $rowtrailerpic2[0];
        }
        if (empty($trailerpic3)) {
            $sql = "SELECT `imagepath3` FROM movie WHERE movieID='$movieid'";
            $result = mysqli_query($conn, $sql);
            $rowtrailerpic3 = mysqli_fetch_array($result,MYSQLI_NUM);
            $trailerpic3 = $rowtrailerpic3[0];
        }
        if (empty($posterpic)) {
            $sql = "SELECT `posterpath` FROM movie WHERE movieID='$movieid'";
            $result = mysqli_query($conn, $sql);
            $rowposterpic = mysqli_fetch_array($result,MYSQLI_NUM);
            $posterpic = $rowposterpic[0];
        }
        $sql = "UPDATE movie SET `title`='$movietitle', `category`='$category', `cast`='$cast', 
                                 `director`='$director', `producer`='$producer', `synopsis`='$synopsis', `ratingCode`='$mpaarating', 
                                 `trailer`='$trailervid', `imagepath1`='$trailerpic1', `imagepath2`='$trailerpic2', `imagepath3`='$trailerpic3', 
                                 `posterpath`='$posterpic' WHERE `movieID` = '$movieid'";
        if ($conn->query($sql)) {
            echo "<script>alert('Movie has been successfully modified!')</script>";
            echo "<script>window.location.replace('admin-modifymovie.html')</script>";
            // header("Location: admin-modifymovie.html");
        } else {
            echo "Error: " . $sql . "" . $conn->error;
        }
    } else { // The movie does not exist in the DB
        // $message = "Movie already exists in the database!";
        // echo "<script type='text/javascript'>alert('$message');</script>";
        // echo "Movie does not exists. Cannot modify a movie that does not exist!";
        echo "<script>alert('Movie does not exists. Cannot modify a movie that does not exist!')</script>";
        echo "<script>window.location.replace('admin-modifymovie.html')</script>";
        // header("Location: admin-modifymovie.html");
    }
    // End connection
    $conn->close();
    session_unset();
    session_destroy();
}
?>