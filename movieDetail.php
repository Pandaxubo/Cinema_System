<?php
session_start();
include_once "displayshow.php";
if (isset($_SESSION['moviename'])) {
    $title = $_SESSION['moviename'];
    $host = "127.0.0.1";
    $port = 3306;
    $dbusername = "root";
    $dbpassword = "password";
    $dbname = "cinemabooking";

    $conn = new mysqli ($host, $dbusername, $dbpassword, $dbname, $port);
    $sql_1 = "SELECT * FROM movie WHERE title = '$title'";
    $result = $conn->query($sql_1);
    if ($result->num_rows > 0) {
        $rows = $result->fetch_array();
        echo $_SESSION["moviename"];
        $category = $rows['category'];
        $moviename = $rows['title'];
        $producer = $rows['producer'];
        $director = $rows['director'];
        $cast = $rows['cast'];
        $trailer = $rows['trailer'];
        $synopsis = $rows['synopsis'];
        $imagepath1 = $rows['imagepath1'];
        $imagepath2 = $rows['imagepath2'];
        $imagepath3 = $rows['imagepath3'];
        $posterpath = $rows['posterpath'];
        $_SESSION['posterpath'] = $posterpath;
        $movieID = $rows['movieID'];

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
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <link rel="stylesheet" type="text/css" href="style-self.css">
    <title>Cinema E-booking</title>
  </head>
  <body>
      <!-- Navigation bar -->
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark fixed-top">
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
     
     <div class="movieDetail">
         <div class="container">
             <div class="row">
             <div class="col-sm-4" id="infoSelectMovie" >
                 <img src="<?php echo $posterpath;?>" width="310" height="465">
                 <br><br>
                   <button type="button" onclick="window.location.href = 'bookmovie.php'" class="btn btn-success">Book</button>
               
                <br><br>
                 <div>
                     <?php getShow($movieID);?>
                     <h4>Show Date</h4>
                     <h6>From</h6>
                     <?php echo $_SESSION['startdate'];?><br>
                     <h6>To</h6>
                     <?php echo $_SESSION['enddate'];?>
                     <hr><br>
                     <h4>Show Room</h4>
                     <?php echo $_SESSION['showroomID'];?>
                     <hr><br>
               <h4>Show Time</h4>
                     <h6>From</h6>
                     <?php echo $_SESSION['starttime'];?><br>
                     <h6>To</h6>
                     <?php echo $_SESSION['endtime'];?>
                     <hr>
                 </div>
             </div>
             <div class="col">
                 <h1><?php echo $moviename; ?></h1>
                 <span class="badge badge-secondary">PG</span><br>
                <span class="badge badge-dark"><?php echo $category;?></span>
<!--                 <span class="badge badge-dark">Fantasy</span>-->
                 <br><br>
                 <p><?php echo $synopsis?></p>
                 <hr>
                 <b>Producer</b><p><?php echo $producer;?>	</p>
                 <b>Director</b><p><?php echo $director;?></p>
                 
                 <b>Cast</b><p><?php echo $cast;?>
                 </p>
                 <hr>
                 <div class="trailer">
                 <iframe width="560" height="315" src="<?php echo $trailer?>" frameborder="0" allow="accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
                 </div>
                 <div class="trailer-Pic">
                     <div class="row">
                        <div class="col">
                     <img src="<?php echo $imagepath1;?>" alt="..." class="img-thumbnail">
                         </div>
                         <div class="col">
                     <img src="<?php echo $imagepath2;?>" alt="..." class="img-thumbnail">
                         </div>
                         <div class="col">
                     <img src="<?php echo $imagepath3;?>" alt="..." class="img-thumbnail">
                         </div>
                     </div>
                 </div>
                <hr>
                 <h4>Review</h4>
                 <form>
                    <div class="form-group">
                        <textarea class="form-control" id="exampleFormControlTextarea1" rows="5"></textarea>
                    </div>
                     <button type="button" class="btn btn-success float-right">Post</button>
                     <button type="button" class="btn btn-outline-secondary float-right" style="margin-right:10px;">Save</button>
                </form>
                 <br><br><br>
                 <div class="reviews">
                     <h7><b>User 1</b></h7><br>
                     <small>Review Date: 6-10-2019</small><br>
                     <p>
                         " It's fine... A very straightforward, big spectacle musical."</p>
                     <small>Like(4) Dislike(0)</small><br>
                        <button type="button" class="btn btn-outline-success float-left rounded-pill">⇧</button>
                        <button type="button" class="btn btn-outline-danger float-left rounded-pill" style="margin-left:10px;">⇩</button>
                     <br>
                     <br>
                     <hr>
                     <h7><b>User 2</b></h7><br>
                     <small>Review Date: 7-3-2019</small><br>
                     <p>
                         " 
                         There are efforts made, whether through good faith or just market savvy, to update Princess Jasmine into a people's champion who might prefer ruling to romance. Enough to make you wish the Disney people had gone whole hog and just called it Jasmine."</p>
                     <small>Like(1) Dislike(0)</small><br>
                        <button type="button" class="btn btn-outline-success float-left rounded-pill">⇧</button>
                        <button type="button" class="btn btn-outline-danger float-left rounded-pill" style="margin-left:10px;">⇩</button>
                     
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