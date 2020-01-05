<?php

session_start();

$movieid = uniqid('movie');
// $movieid = mt_rand(); // Generate a random integer as a movie id; might change later
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
    $sql = "SELECT * FROM movie WHERE title = '$movietitle' AND director = '$director'";
    $result = mysqli_query($conn, $sql);
    $rows = mysqli_num_rows($result);
    $row = mysqli_fetch_array($result);

    if(!$rows) { // Check if the movie already exists
        $sql = "INSERT INTO movie (movieID, title, category, cast, director, producer, synopsis, 
                                    ratingCode, moviecost, trailer,imagepath1, imagepath2,imagepath3, posterpath) 
                        VALUES ('$movieid','$movietitle','$category','$cast','$director', '$producer',
                                '$synopsis', '$mpaarating', 8, '$trailervid','$trailerpic1','$trailerpic2','$trailerpic3','$posterpic')";
        if ($conn->query($sql)) {
            echo "<script>alert('Movie has been successfully added!')</script>";
            echo "<script>window.location.replace('admin-addmovie.html')</script>";
            // header("Location: admin-addmovie.html");
        } else {
            echo "Error: " . $sql . "" . $conn->error;
        }
    } else { // The movie already exists in the DB
        // $message = "Movie already exists in the database!";
        // echo "<script type='text/javascript'>alert('$message');</script>";
        // header("Location: admin-addmovie.html");
        echo "<script>window.location.replace('admin-addmovie.html')</script>";
        echo "<script>alert('Movie already exists.')</script>";
        // echo "Movie already exists.";
    }
    // End connection
    $conn->close();
    session_unset();
    session_destroy();

}

?>
