<?php
session_start();
if (isset($_SESSION["islogin"])) {
$host = "127.0.0.1";
$port = 3306;
$dbusername = "root";
$dbpassword = "password";
$dbname = "cinemabooking";
$conn = new mysqli ($host, $dbusername, $dbpassword, $dbname, $port);
$stimestamp = strtotime($_SESSION['startdate']);
$etimestamp = strtotime($_SESSION['enddate']);
$days = ($etimestamp - $stimestamp) / 86400 + 1;
$date = array();
$number = array();
for ($i = 0; $i < $days; $i++) {
    $date[] = date('Y-m-d', $stimestamp + (86400 * $i));
    $number[$i] = $i;
}
$length = sizeof($date);
}
else {
    header("Location: login.html");
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

    <title>Book Ticket</title>
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
<div class="book">
    <div class="container">
        <div class="row">
            <div class="col-sm-4" id="selectedMovie">
                <img src="<?php echo $_SESSION['posterpath'];?>"  width="310" height="465">
            </div>
            <form method = "post" action = "selectseats.php" id = "booking" >
                <hr>
                <h3>Section selection</h3>
                    <h5>Movie Show Room</h5>
                <select name="showroom[]">
                    <option value="1:Harry">1:Harry</option>
<!--                    <option value="2:Hermione">2:Hermione</option>-->
<!--                    <option value="3:Ron">3:Ron</option>-->
<!--                    <option value="4:Draco">4:Draco</option>-->
                </select>
                    <h5>Movie Show Date</h5>
                    <?php foreach($date as $value):?>
                        <p><input type="checkbox" name="showdate[]" value="<?php echo $value;?>" /><?php echo $value;?></p>
                    <?php endforeach;?>

                    <hr>
                    <h5>Show Times</h5>
                    <p><input type="checkbox" name="showtime[]" value="<?php echo $_SESSION['starttime'];?>" /><?php echo $_SESSION['starttime'];?></p>

                <hr>
                <button type="button" onclick="window.location.href = 'homepage.html'" class="btn btn-secondary">Cancel Order</button>
                <button type="submit" name="submit" onclick="window.location.href = 'selectseats.php'"class="btn btn-outline-success float-right">Next -></button>
                </form>
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
