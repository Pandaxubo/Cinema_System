<?php
session_start();
$bookingid = rand(0,2555);
$total = $_SESSION['total'];
$userid = $_SESSION['useremail'];
echo $total;
echo $userid;
echo $bookingid;
$host = "127.0.0.1";
$port = 3306;
$dbusername = "root";
$dbpassword = "password";
$dbname = "cinemabooking";
$conn = new mysqli ($host, $dbusername, $dbpassword, $dbname, $port);
if (mysqli_connect_error()) {
    die('Connect Error (' . mysqli_connect_errno() . ') '
        . mysqli_connect_error());
} else {
$sql = "INSERT INTO `booking` (`bookingID`, `total`, `promoCode`, `emailAddress`) values ('$bookingid','$total','code','$userid')";
mysqli_query($conn,$sql);}
//include_once "storebooking.php";
//storeBooking();
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
    <title>Order Complete</title>
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
<!-- Navbar ends here -->
<div class="checkout">
    <h3>Thank You, your order is complete!</h3>

    <div class="book">
        <div class="container">
            <div class="row">
                <div class="col-sm-4" id="selectedMovie">
                    <img src="<?php echo $_SESSION['posterpath'];?>" width="310" height="465">
                </div>
                <div class="col" id="orderinfo">
                    <h5>Your order detail</h5>
                    <hr>
                    <p>
                        Movie: <?php echo $_SESSION['moviename'];?><br>
                        Date:  <?php echo $_SESSION['showdate'];?><br>
                        Show Time:  <?php echo $_SESSION['showtime'];?><br>
                        Seats: <?php echo $_SESSION['totalseats'] ;?><br>
                        Total: <?php echo $_SESSION['total'];?><br>
                    </p>
                    <hr>
                    <button type="button" onclick="window.location.href = 'sendorder.php'" class="btn btn-success">Confirm</button>
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
