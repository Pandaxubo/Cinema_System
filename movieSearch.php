<?php
session_start();

$title_category= filter_input(INPUT_POST, 'title_category');
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
    $sql = "SELECT * FROM movie WHERE title = '$title_category' OR category = '$title_category'";
// OR category = '$title_category'";
    $result = $conn->query($sql);
    $totalrow = mysqli_num_rows($result);
}

function printresult($result) {
    //$rows = $result->fetch_array();
    //   $rows =  mysqli_fetch_all($result,MYSQLI_ASSOC);
    //    if($totalrow){
    //        $category =$rows['category'];
    //        $movietitle = $rows['title'];
    //        echo $movietitle;
    //        echo $category;
    //        echo $totalrow;
    //    }
    //    else {
    //        echo "No results!";
    //        header("Location: movieSearchResult.html");
    //    }
    if ($result->num_rows > 0) {
        while ($row = $result->fetch_array()) {
            $_SESSION['moviename'] = $row['title'];
           // $_SESSION['category'] = $row['category'];
            //$name  =$row['title'];
             // $row['title'];
            //echo $row['title'];
            echo "<a href='movieDetail.php'>" . $row['title'] . "</a>" . $row['category'] . "<br>";

        }
//            foreach($row as $key => $value){
//                echo "{$key} => {$value}<br>";
//            }
//            foreach($row as $x=>$x_value) {
//                echo "title:<a href='$row[0].html'> " . $row[3] . "</a>"." - category: " . $row["category"] . "<br>";
//            }
//            while ($row = $result->fetch_array(MYSQLI_BOTH)) {
//                $_SESSION['moviename'] = $row["title"];
//                while ($row = $result->fetch_assoc()) {
//                    $_SESSION['moviename'] = $row["title"];
//                $count = array(
//                        "title" =>  $row["title"],
//                        "category" => $row["category"],
//
//                );
//                echo "title:<a href='homepage.html'> " . $row[3] . "</a>"." - category: " . $row["category"] . "<br>";    $
//          echo $name;
//            $_SESSION['moviename'] = $name;
//            echo $_SESSION['moviename'];
    } else {
        echo "0 results";
    }

}

?>

<!doctype html>
<script type="text/javascript" src="check.php"></script>
<html lang="en">
<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css"
          integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <link rel="stylesheet" type="text/css" href="style-self.css">
    <title>Cinema E-booking</title>
</head>
<body>

<!-- Navigation bar -->
<nav class="navbar navbar-expand-lg navbar-dark bg-dark fixed-top">
    <a class="navbar-brand" href="#">Cinema E-booking</a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent"
            aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
    </button>

    <div class="collapse navbar-collapse" id="navbarSupportedContent">
        <ul class="navbar-nav mr-auto">
            <li class="nav-item active">
                <a class="nav-link" href="homepage-loggedin.html">Home <span class="sr-only">(current)</span></a>
            </li>
            <li class="nav-item active">
                <a class="nav-link" href="#">About</a>
            </li>
            <li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle" href ="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    My Profile
                </a>
                <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                    <a class="dropdown-item" href="profilehome.php">User Profile</a>
                    <a class="dropdown-item" href="#">View Order History</a>
                    <a class="dropdown-item" href="cAccount_Mypromotion.html">View Promotion</a>
                    <div class="dropdown-divider"></div>
                    <a class="dropdown-item" href="logout.html">Log Out</a>
                </div>
            </li>
        </ul>
        <button class="btn btn-outline-success my-2 my-sm-0"
                onclick="window.location.href='movieSearchResult.html'">
            SearchPage
        </button>


    </div>
</nav>
<!-- Navbar ends here -->
<div class="searchBody">
    <div class="d-block" style="margin-top:80px;">
        <form class="form" method="post" id="search" action="movieSearch.php">
            <input class="form-control shadow p-3" type="search" name="title_category" placeholder="Enter a movie name"
                   aria-label="Search">
            <br>
            <button class="btn btn-success" id="search-btn" type="submit">Search</button>
        </form>
    </div>
    <br>
    <hr>


    <div class="movieResult">
        <div class="container">
            <div class="results">
                <small><span id="resultCount"><?php echo $totalrow ?> Results Found.....</span></small>
            </div>
            <br>
            <div class="row">
                <div class="col">
                    <div class="card" style="width: 18rem;">
                        <?php printresult($result); ?>
                    </div>
                </div>
            </div>

        </div>
    </div>
</div>

<!-- Optional JavaScript -->
<!-- jQuery first, then Popper.js, then Bootstrap JS -->
<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"
        integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo"
        crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"
        integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1"
        crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"
        integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM"
        crossorigin="anonymous"></script>
</body>
</html>

