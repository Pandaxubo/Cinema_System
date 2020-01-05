<?php
session_start();
$showdate = $_POST['showdate'];
$showtime = $_POST['showtime'];
$showroom = $_POST['showroom'];
$_SESSION['showdate'] = $showdate[0];
$_SESSION['showtime'] = $showtime[0];
$_SESSION['showroom'] = $showroom[0];
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
                <img src="<?php echo $_SESSION['posterpath'];?>" width="310" height="465">
            </div>
            <form method = "post" action = "orderpreview.php"  >
                <div class="col" id="bookinfo">
                    <h3>Your Order</h3>
                    <p>Room:<?php echo $showroom[0];?></p>
                    <p>Date:<?php echo $showdate[0];?></p>
                    <p>Time:<?php echo $showtime[0];?></p><hr>
                    <h3>Ticket Type</h3>
                    <p>Please enter ticket types</p>
                    <div class="form-row">
                        <div class="form-group col-md-6">
                            <label>Senior</label>
                            <select name="senior[]">
                                <option value="0">0</option>
                                <option value="1">1</option>
                                <option value="2">2</option>
                                <option value="3">3</option>
                                <option value="4">4</option>
                                <option value="5">5</option>
                            </select>
                            <label>Children</label>
                            <select name="children[]">
                                <option value="0">0</option>
                                <option value="1">1</option>
                                <option value="2">2</option>
                                <option value="3">3</option>
                                <option value="4">4</option>
                                <option value="5">5</option>
                            </select>
                            <label>Adult</label>
                            <select name="adult[]">
                                <option value="0">0</option>
                                <option value="1">1</option>
                                <option value="2">2</option>
                                <option value="3">3</option>
                                <option value="4">4</option>
                                <option value="5">5</option>
                            </select>
                        </div>
                    </div>
                    <hr>
                    <h3>Seat Selection</h3>
                    <div class="text-center">
                        <input type="checkbox" name="seats[]" value="1" class="btn btn-warning"><b>1</b></input>
                        <input type="checkbox" name="seats[]" value="2" class="btn btn-warning"><b>2</b></input>
                        <input type="checkbox" name="seats[]" value="3" class="btn btn-warning"><b>3</b></input>
                        <input type="checkbox" name="seats[]" value="4" class="btn btn-warning"><b>4</b></input>
                        <input type="checkbox" name="seats[]" value="5" class="btn btn-warning"><b>5</b></input>
                        <br>
                        <input type="checkbox" name="seats[]" value="6" class="btn btn-warning"><b>6</b></input>
                        <input type="checkbox" name="seats[]" value="7" class="btn btn-warning"><b>7</b></input>
                        <input type="checkbox" name="seats[]" value="8" class="btn btn-warning"><b>8</b></input>
                        <input type="checkbox" name="seats[]" value="9" class="btn btn-warning"><b>9</b></input>
                        <input type="checkbox" name="seats[]" value="10" class="btn btn-warning"><b>10</b></input>
                        <br>
                        <input type="checkbox" name="seats[]" value="11" class="btn btn-warning"><b>11</b></input>
                        <input type="checkbox" name="seats[]" value="12" class="btn btn-warning"><b>12</b></input>
                        <input type="checkbox" name="seats[]" value="13" class="btn btn-warning"><b>13</b></input>
                        <input type="checkbox" name="seats[]" value="14" class="btn btn-warning"><b>14</b></input>
                        <input type="checkbox" name="seats[]" value="15" class="btn btn-warning"><b>15</b></input>
                        <br>
                        <input type="checkbox" name="seats[]" value="16" class="btn btn-warning"><b>16</b></input>
                        <input type="checkbox" name="seats[]" value="17" class="btn btn-warning"><b>17</b></input>
                        <input type="checkbox" name="seats[]" value="18" class="btn btn-warning"><b>18</b></input>
                        <input type="checkbox" name="seats[]" value="19" class="btn btn-warning"><b>19</b></input>
                        <input type="checkbox" name="seats[]" value="20" class="btn btn-warning"><b>20</b></input>
                        <br>
                        <hr>
                    </div>
                    <label class="control-label" data-toggle="tooltip" title="" data-original-title="3 digits code on back side of the card"><h3>Promotion Code</h3><i class="fa fa-question-circle"></i></label>
                    <input type="text" name="promo" class="form-control">
                    <br>
                </div>
        </div>
    </div>
</div>
<hr>
<button type="button" onclick="window.location.href = 'homepage.html'"class="btn btn-secondary">Cancel Order</button>
<button type="submit" name="submit" onclick="window.location.href = 'orderpreview.php'"class="btn btn-outline-success float-right">Next -></button>
</form>
</body>
</html>