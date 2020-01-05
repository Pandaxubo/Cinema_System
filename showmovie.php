<?php
session_start();
include_once "displayshow.php";
$host = "127.0.0.1";
$port = 3306;
$dbusername = "root";
$dbpassword = "password";
$dbname = "cinemabooking";
$conn = new mysqli ($host, $dbusername, $dbpassword, $dbname, $port);
$sql_1 = "SELECT * FROM movie";
$result = $conn->query($sql_1);
while ($row = $result->fetch_array())  {
    $moviename = $row['title'];
    $movienum = $row['movieID'];
    $posterpath = $row['posterpath'];
    //$_SESSION['movietitle'] = $moviename;
    //$_SESSION['movieID'] = $movienum;
    //$_SESSION['posterpath'] = $posterpath;
}
$conn->close();
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
    <title>Cinema E-booking</title>
</head>
<body>
<div class="fullbody">
    <!-- Navigation bar -->
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark fixed-top">
        <a class="navbar-brand" href="#">Cinema E-booking</a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav mr-auto">
                <li class="nav-item active">
                    <a class="nav-link" href="homepage.html">Home <span class="sr-only">(current)</span></a>
                </li>
                <li class="nav-item active">
                    <a class="nav-link" href="#">About</a>
                </li>

                <li class="nav-item">
                    <a class="nav-link active" href="createAccount.html" tabindex="-1" aria-disabled="true">Create Account</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link active" href="login.html" tabindex="-1" aria-disabled="true">Log in</a>
                </li>
            </ul>
            <!--    <form class="form-inline my-2 my-lg-0">-->
            <!--      <input class="form-control mr-sm-2" type="search" placeholder="Enter a movie name" aria-label="Search">-->
            <button class="btn btn-outline-success my-2 my-sm-0" onclick="window.location.href='movieSearchResult.html'">
                SearchPage
            </button>
            <!--    </form>-->
        </div>
    </nav>
    <!-- Navbar ends here -->

    <!--New movie trending slides -->
    <div class="hpbody">
        <div class="newMovies">
            <div id="carouselExampleIndicators" class="carousel slide d-flex justify-content-center w-" data-ride="carousel">
                <ol class="carousel-indicators">
                    <li data-target="#carouselExampleIndicators" data-slide-to="0" class="active"></li>
                    <li data-target="#carouselExampleIndicators" data-slide-to="1"></li>
                    <li data-target="#carouselExampleIndicators" data-slide-to="2"></li>
                </ol>
                <div class="carousel-inner">
                    <div class="carousel-item active">
                        <img src="m1.jpg" class="d-block w-100" id="hotmovie" alt="...">
                    </div>
                    <div class="carousel-item">
                        <img src="m2.jpg" class="d-block w-100" id="hotmovie" alt="...">
                    </div>
                    <div class="carousel-item">
                        <img src="m3.jpg" class="d-block w-100" id="hotmovie" alt="...">
                    </div>
                </div>
                <a class="carousel-control-prev" href="#carouselExampleIndicators" role="button" data-slide="prev">
                    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                    <span class="sr-only">Previous</span>
                </a>
                <a class="carousel-control-next" href="#carouselExampleIndicators" role="button" data-slide="next">
                    <span class="carousel-control-next-icon" aria-hidden="true"></span>
                    <span class="sr-only">Next</span>
                </a>
            </div>
        </div>
        <!-- New movie slides ends here -->

        <!-- All movies and categories -->

        <div class="container">
            <div class="row">
                <div class="col col-2">
                    <ul class="list-group">
                        <li class="list-group-item d-flex justify-content-between align-items-center">
                            Action
                            <span class="badge badge-primary badge-pill">202</span>
                        </li>
                        <li class="list-group-item d-flex justify-content-between align-items-center">
                            Sci Fi
                            <span class="badge badge-primary badge-pill">50</span>
                        </li>
                        <li class="list-group-item d-flex justify-content-between align-items-center">
                            Horror
                            <span class="badge badge-primary badge-pill">1</span>
                        </li>
                        <li class="list-group-item d-flex justify-content-between align-items-center">
                            Romance
                            <span class="badge badge-primary badge-pill">50</span>
                        </li>
                        <li class="list-group-item d-flex justify-content-between align-items-center">
                            Mistery
                            <span class="badge badge-primary badge-pill">20</span>
                        </li>
                        <li class="list-group-item d-flex justify-content-between align-items-center">
                            Crime
                            <span class="badge badge-primary badge-pill">5</span>
                        </li>
                    </ul>
                </div>
                <div class ="col">
                    <table class="table">
                        <thead>
                        <tr>
                            <th scope="col">Movie Date</th>
                        </tr>
                        </thead>
                        <tbody>
                        <tr>
                            <th></th>
                            <td>9-1</td>
                            <td>9-2</td>
                            <td>9-3</td>
                            <td>9-4</td>
                            <td>9-5</td>
                            <td>9-6</td>
                            <td>9-7</td>
                        </tr>
                        </tbody>
                    </table>
                    <table class="table">
                        <thead>
                        <tr>
                            <th scope="col">Show Times</th>
                        </tr>
                        </thead>
                        <tbody>
                        <tr>
                            <th></th>
                            <td>9:00</td>
                            <td>9:30</td>
                            <td>10:00</td>
                            <td>10:30</td>
                            <td>11:30</td>
                            <td>12:00</td>
                            <td>12:30</td>
                            <td>13:00</td>
                            <td>13:30</td>
                        </tr>
                        <tr>
                            <th></th>
                            <td>14:00</td>
                            <td>14:30</td>
                            <td>15:00</td>
                            <td>15:30</td>
                            <td>16:00</td>
                            <td>16:30</td>
                            <td>17:00</td>
                            <td>17:30</td>
                            <td>18:00</td>
                        </tr>
                        <tr>
                            <th></th>
                            <td>18:30</td>
                            <td>19:00</td>
                            <td>19:30</td>
                            <td>20:00</td>
                            <td>20:30</td>
                            <td>21:00</td>
                            <td>21:30</td>
                            <td>22:00</td>
                            <td>22:30</td>
                        </tr>
                        </tbody>
                    </table>

                    <div class="movieG">
                        <div class="row">
                            <div class="col">
                                <div class="card">
                                                <img src="<?php echo $posterpath;?>" alt="..." class="img-thumbnail "  width="310" height="465">
                                    <?php getShow($movienum); ?>
                                    <div class="card-body">
                                        <button type="button" class="btn btn-success">Book</button>
                                        <button type="button" class="btn btn-info">Detail</button>
                                    </div>
                                </div>
                            </div>
                            <div class="col">
                                <div class="card">
                                    <img src="m2.jpg" alt="..." class="img-thumbnail ">
                                    <div class="card-body">
                                        <button type="button" class="btn btn-success">Book</button>
                                        <button type="button" class="btn btn-info">Detail</button>
                                    </div>
                                </div>
                            </div>
                            <div class="col">
                                <div class="card">
                                    <img src="m3.jpg" alt="..." class="img-thumbnail">
                                    <div class="card-body">
                                        <button type="button" class="btn btn-success">Book</button>
                                        <button type="button" class="btn btn-info">Detail</button>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <br>
                        <!-- Page nav -->
                        <nav aria-label="Page navigation">
                            <ul class="pagination justify-content-end">
                                <li class="page-item disabled">
                                    <a class="page-link" href="#" tabindex="-1" aria-disabled="true">Previous</a>
                                </li>
                                <li class="page-item"><a class="page-link" href="#">1</a></li>
                                <li class="page-item"><a class="page-link" href="#">2</a></li>
                                <li class="page-item"><a class="page-link" href="#">3</a></li>
                                <li class="page-item">
                                    <a class="page-link" href="#">Next</a>
                                </li>
                            </ul>
                        </nav>
                    </div>

                    <!--        <hr>-->
                    <!--        <h4><b>Coming Soon</b></h4>-->
                    <!--        <div class="comingSoon">-->
                    <!--            <div class="row">-->
                    <!--            <div class="col">-->
                    <!--                <div class="card" style="width: 18rem;">-->
                    <!--                    <img src="csM1.jpg" class="card-img-top" alt="Coming Soon...">-->
                    <!--                <div class="card-body">-->
                    <!--                <h5>Deadpool 2</h5>-->
                    <!--                <p class="card-text">Release date：</p>-->
                    <!--                </div>-->
                    <!--                </div>-->
                    <!--            </div>-->
                    <!--            <div class="col">-->
                    <!--                <div class="card" style="width: 18rem;">-->
                    <!--                    <img src="csM2.jpg" class="card-img-top" alt="Coming Soon...">-->
                    <!--                <div class="card-body">-->
                    <!--                <h5>Joker</h5>-->
                    <!--                <p class="card-text">Release date: </p>-->
                    <!--                </div>-->
                    <!--                </div>-->
                    <!--            </div>-->
                    <!--            </div>-->


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

