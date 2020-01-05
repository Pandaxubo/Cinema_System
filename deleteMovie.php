<?php

session_start();

$movieid = uniqid('movie');
// $movieid = mt_rand(); // Generate a random integer as a movie id; might change later
$movietitle = filter_input(INPUT_POST, 'deleteMovieName');
$category = filter_input(INPUT_POST, 'category');
$cast = filter_input(INPUT_POST, 'cast');
$director = filter_input(INPUT_POST, 'director');
$producer = filter_input(INPUT_POST, 'producer');
$mpaarating = filter_input(INPUT_POST, 'mpaa-rating');
$synopsis = filter_input(INPUT_POST, 'synopsis');
$trailervid = filter_input(INPUT_POST, 'trailer-vid');
$trailerpic = filter_input(INPUT_POST, 'trailer-picture');
// $startdate = filter_input(INPUT_POST, 'startdate');
// $enddate = filter_input(INPUT_POST, 'enddate');
// $cinemano = filter_input(INPUT_POST, 'cienmano');
// $availseats = filter_input(INPUT_POST, 'availseats');
// $movietime = filter_input(INPUT_POST, 'movietime');

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
    // if not, then add the movie to the system
    $sql = "SELECT * FROM movie WHERE (`title` = '$movietitle')";
    $result = mysqli_query($conn, $sql);
    $rows = mysqli_num_rows($result);
    $row = mysqli_fetch_array($result);

    if($rows) { // Check if the movie already exists
        $sql = "DELETE FROM movie WHERE (`title` = '$movietitle')";
        if ($conn->query($sql)) {
            echo "<script>alert('Movie has been successfully deleted!')</script>";
            header("Location: admin-addmovie.html");
        } else {
            echo "Error: " . $sql . "" . $conn->error;
        }
    } else { // The movie already exists in the DB
        // $message = "Movie already exists in the database!";
        // echo "<script type='text/javascript'>alert('$message');</script>";
        header("Location: admin-addmovie.html");
        echo "Movie does not exist exists.";
    }
    // End connection
    $conn->close();
    session_unset();
    session_destroy();

}

?>