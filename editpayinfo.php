<?php
session_start();

$useremail = $_SESSION['useremail'];
$host = "127.0.0.1";
$port = 3306;
$dbusername = "root";
$dbpassword = "password";
$dbname = "cinemabooking";
$conn = new mysqli ($host, $dbusername, $dbpassword, $dbname, $port);

$sql = "SELECT `lastfour` FROM paymentinfo WHERE user_emailAddress = '$useremail'";
$result = mysqli_query($conn, $sql);
$rowtitle = mysqli_fetch_array($result,MYSQLI_NUM);
$lastfour = $rowtitle[0];

$sql = "SELECT `ccfName` FROM paymentinfo WHERE user_emailAddress = '$useremail'";
$result = mysqli_query($conn, $sql);
$rowtitle = mysqli_fetch_array($result,MYSQLI_NUM);
$firstname = $rowtitle[0];

$sql = "SELECT `cclName` FROM paymentinfo WHERE user_emailAddress = '$useremail'";
$result = mysqli_query($conn, $sql);
$rowtitle = mysqli_fetch_array($result,MYSQLI_NUM);
$lastname = $rowtitle[0];

$sql = "SELECT `billingAddress` FROM paymentinfo WHERE user_emailAddress = '$useremail'";
$result = mysqli_query($conn, $sql);
$rowtitle = mysqli_fetch_array($result,MYSQLI_NUM);
$billingAddress = $rowtitle[0];

$sql = "SELECT `exp` FROM paymentinfo WHERE user_emailAddress = '$useremail'";
$result = mysqli_query($conn, $sql);
$rowtitle = mysqli_fetch_array($result,MYSQLI_NUM);
$exp = $rowtitle[0];
?>

<!doctype html>
<html lang="en">
<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css"
          integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <link rel="stylesheet" type="text/css" href="style-self.css">

    <title>User Profile</title>
</head>

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
                <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown"
                   aria-haspopup="true" aria-expanded="false">
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
        <form class="form-inline my-2 my-lg-0">
            <input class="form-control mr-sm-2" type="search" placeholder="Enter a movie name" aria-label="Search">
            <button class="btn btn-outline-success my-2 my-sm-0" type="submit">Search</button>
        </form>
    </div>
</nav>
<!-- Navbar ends here -->

<body>

<div class="profile">
    <div class="container">
        <div class="row">
            <div class="col-sm-10"><h1>User name</h1></div>

        </div>
        <div class="row">
            <div class="col-sm-3">
                <div class="text-center">
                    <img src="http://ssl.gstatic.com/accounts/ui/avatar_2x.png" class="avatar img-circle img-thumbnail"
                         alt="avatar">
                    <h6>Upload a photo</h6>
                    <div id="light"><input type="file" class="text-center center-block file-upload"></div>
                </div>
                <hr>
                <br>
            </div>
            <div class="col-sm-9">
                <div class="btn-group btn-group-toggle" data-toggle="buttons">
                    <label class="btn btn-secondary" onclick="window.location.href='profilehome.php'">
                        <input type="radio" name="options" id="option1" autocomplete="off" checked> Home
                    </label>
                    <label class="btn btn-secondary active" onclick="window.location.href='editpayinfo.php'">
                        <input type="radio" name="options" id="option2" autocomplete="off"> Payment info
                    </label>
                    <label class="btn btn-secondary" onclick="window.location.href='cAccount_Mypromotion.html'">
                        <input type="radio" name="options" id="option3" autocomplete="off">My Promotion
                    </label>
                    <label class="btn btn-secondary" onclick="window.location.href='orderhistory.php'">
                        <input type="radio" name="options" id="option3" autocomplete="off">Order History
                    </label>
                </div>
                <hr>
                <!---show user saved payment info here -->
                <div id="savedPayInfo">
                    <h4>My Payment Information</h4>
                    <div id="infoCard">
                        <div class="card" id="action">
                            <div class="card-body">
                                <p>
                                    Name on Card: <?php echo $firstname . " " . $lastname?><br>
                                    Credit Card#: <?php echo "xxxx-xxxx-xxxx-" . $lastfour?><br>
                                    EXP: <?php echo substr($exp,0,2) . "/" . substr($exp,2,2)?><br>
                                    Billing Address: <?php echo $billingAddress?><br>
                                </p>
                                <form method="post" action="deletePaymentInfo.php">
                                    <div id="deletebutton" align="right">
                                        <button type="submit" class="btn btn-danger" style="margin-left:10px;" type="button">Delete</button>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="tab-content">
                    <div class="tab-pane active" id="home">
                        <hr>
                        <h4>Add Credit Card</h4>
                        <button type="button" class="btn btn-outline-success" onclick="openForm();">+ Add</button>
                        <div class="form-popup" id="payinfo">
                            <form class="form-containder" action="updateCreditCard.php" method="post">
                                <div class="col form-group required">
                                    <div class="col form-group required">
                                        <label class="control-label" for="first_name"><h5>Credit Card Number</h5>
                                        </label>
                                        <input type="text" class="form-control" name="ccNum" id="ccNum"
                                               placeholder="Your Credit Card Number" size=16>
                                    </div>
                                    <div class="col">
                                        <div class="row">
                                            <div class="col form-group required">
                                                <label class="control-label" for="fast_name"><h5>First name</h5></label>
                                                <input type="text" class="form-control" name="first_name" id="pfname"
                                                       placeholder="First name" title="enter your first name if any.">
                                            </div>
                                            <div class="col form-group required">
                                                <label class="control-label" for="last_name"><h5>Last name</h5></label>
                                                <input type="text" class="form-control" name="last_name" id="plname"
                                                       placeholder="Last name" title="enter your last name if any.">
                                            </div>
                                        </div>
                                    </div>

                                    <div class="col">
                                        <div class="row">
                                            <div class="col form-group required">
                                                <label class="control-label" for="Expiration Date"><h5>Expired Date</h5>
                                                </label>
                                                <input type="text" class="form-control" name="expdate" id="exp"
                                                       placeholder="MM/YY" size=5>
                                            </div>
                                            <div class="col form-group required">
<!--                                                <label class="control-label" for="cvv">-->
<!--                                                    <h5>CVV</h5></label>-->
<!--                                                <input type="text" class="form-control" name="cvv" id="cvv"-->
<!--                                                       placeholder="###">-->
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col form-group required">
                                        <label class="control-label" for="billadd">
                                            <h5>Billing Address</h5></label>
                                        <input type="text" class="form-control" name="badd" id="badd"
                                               placeholder="Street, City, State, Zip Code">
                                    </div>
                                    <script>
                                        //declare the variable for creditcard info
                                        var ccnumb = document.getElementById('ccNum')
                                        var cFname = document.getElementById('pfname');
                                        var cLname = document.getElementById('plname');
                                        var cexp = document.getElementById('exp');
                                        var ccvv = document.getElementById('cvv');
                                        var cadd = document.getElementById('badd');

                                        //check if user filled all the requriement form
                                        function ccinfoVali() {
                                            if (ccnumb.value == "") {
                                                alert("Please eneter your Credit Card Number")
                                                return false;
                                            } else if (cFname.value == "") {
                                                alert("Please eneter your First name")
                                                return false;
                                            } else if (cLname.value == "") {
                                                alert("Please enter you Last name")
                                                return false;
                                            } else if (cexp.value == "") {
                                                alert("Please enter your card expire date")
                                                return false;
                                            } else if (cadd.value == "") {
                                                alert("Please enter your billing address")
                                                return false;
                                            } else {
                                                return ture;
                                            }
                                        }
                                    </script>
                                    <div class="form-group">
                                        <div class="col-xs-12">
                                            <br>
                                            <button class="btn btn-lg btn-success" type="submit" name="confirm"
                                                    onmouseover="ccinfoVali();"><i
                                                        class="glyphicon glyphicon-ok-sign"></i> Confirm
                                            </button>
                                            <button class="btn btn-lg btn-outline-secondary" type="reset"
                                                    onclick="closeForm();"><i class="glyphicon glyphicon-repeat"></i>Cancel
                                            </button>
                                        </div>
                                    </div>
                                </div>
                            </form>
                        </div>
                        <script>
                            function openForm() {
                                document.getElementById("payinfo").style.display = "block";
                            }

                            function closeForm() {
                                document.getElementById("payinfo").style.display = "none";
                            }
                        </script>

                        <hr>
                        <div class="form-group">
                            <div class="col-xs-12">
                                <br>
                                <button class="btn btn-lg btn-success" type="submit"><i
                                            class="glyphicon glyphicon-ok-sign"></i> Confirm
                                </button>
                                <button class="btn btn-lg btn-outline-secondary" type="reset"><i
                                            class="glyphicon glyphicon-repeat"></i>Cancel
                                </button>
                            </div>
                        </div>
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
