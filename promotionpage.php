<?php
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
    $sql = "select * from cinemabooking.promotion";
    $result = mysqli_query($conn, $sql);
    $row = mysqli_fetch_array($result);
    $promocode = $row['promoCode'];
    $promorate = $row['promoRate'];
}
?>
<!doctype html>
<html lang="en">
<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <link rel="stylesheet" type="text/css" href="style-self.css">


    <title>Administrator</title>
</head>
<body>
<!-- Navigation bar -->
<nav class="navbar navbar-expand-lg navbar-light bg-light fixed-top">
    <a class="navbar-brand" href="#">Cinema E-booking</a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
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
                    <a class="dropdown-item" href="orderhistory.php">View Order History</a>
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
<!-- Nav end here -->
<div class="admin">
    <h2 style="margin-left: 30px;margin-bottom: 20px;">Administrator Control Page</h2>
    <div class="container">
        <div class="row">
            <div class="col-3">
                <ul class="list-group">
                    <li class="list-group-item"><a href="admin-hp.html">Home</a></li>
                    <li class="list-group-item"><a href="admin-addmovie.html">Add Movie</a> </li>
                    <li class="list-group-item"><a href="admin-movieShowTime.html">Schedule Movie</a></li>
                    <li class="list-group-item"><a href = "admin-modifymovie.html">Modify Movie</a></li>
                    <li class="list-group-item"><a href="user-manage.html">Manage Users</a></li>
                    <li class="list-group-item"><a href="#">View Reviews</a></li>
                    <li class="list-group-item active">Manage Promotion</li>
                </ul>
            </div>
            <div class="col">
                <h4>Add Promotion</h4>
                <hr>
                <form method = "post" action = "addPromo.php">
                    <label for="promDesc">Promotion Code</label>
                    <textarea class="form-control" name = "promocode" id="promDesc" rows="3"></textarea>
                    <br>
                    <label>Promotion Rate</label>
                    <input type="text" name = "promorate">
                    <button type="submit" name = "submit" class="btn btn-success float-right">+ Add</button>
                </form>
                <br>
                <hr>
                <h4>Available Promotions</h4>
                <hr>
                <div class="proms">
                    <div class="card" id="action">
                        <div class="card-body">

                            <h5><?php echo $promocode;?></h5>
                            <p><?php echo $promorate;?></p>
                            <button type="button" class="btn btn-danger float-right">Delete</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>



<!-- Optional JavaScript -->
<!-- jQuery first, then Popper.js, then Bootstrap JS -->
<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
</body>
</html>
