<?php
session_start();
if (isset($_SESSION["islogin"])) {
    if (isset($_SESSION["useremail"])) {
        $email = $_SESSION["useremail"];
        $host = "127.0.0.1";
        $port = 3306;
        $dbusername = "root";
        $dbpassword = "password";
        $dbname = "cinemabooking";
        $conn = new mysqli ($host, $dbusername, $dbpassword, $dbname, $port);
        $sql_1 = "SELECT * FROM user WHERE emailAddress = '$email'";
        //$result = mysqli_query($sql_1,$conn);
        $result = $conn->query($sql_1);
        if ($result->num_rows > 0) {
            $rows = $result->fetch_array();
            $firstname = $rows['firstName'];
            $uid = $rows['userID'];
            $_SESSION["uid"] = $uid;
            $lastname = $rows['lastName'];
            $phonenum = $rows['phoneNum'];
            $age = $rows['age'];
            $emailaddress = $rows['emailAddress'];
            $subscribe = $rows['subscribe'];
        }
    }
} else {
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

    <title>User Profile</title>
</head>

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
          <a class="dropdown-item" href="orderhistory.php">View Order History</a>
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
<!--  <script type="text/javascript" src="editprofile.php"></script>-->
<div class="profile">
    <div class="container">
        <div class="row">
<!--            <h1><div class="col-sm-10" type = "text" value ="--><?php //echo $id?><!--" ></div></h1>-->

        </div>
        <div class="row">
            <div class="col-sm-3">
                <div class="text-center">
                    <img src="http://ssl.gstatic.com/accounts/ui/avatar_2x.png" class="avatar img-circle img-thumbnail" alt="avatar">
                    <h6>Upload a photo</h6>
                    <input type="file" class="text-center center-block file-upload">
                </div><hr><br>

            </div>

            <div class="col-sm-9">
                <div class="btn-group btn-group-toggle" data-toggle="buttons">
                    <label class="btn btn-secondary active" onclick="window.location.href='profilehome.php'">
                        <input type="radio" name="options" id="option1" autocomplete="off" checked> Home
                    </label>
                    <label class="btn btn-secondary" onclick="window.location.href='editpayinfo.php'">
                        <input type="radio" name="options" id="option2" autocomplete="off" > Payment info
                    </label>
                    <label class="btn btn-secondary" onclick="window.location.href='cAccount_Mypromotion.html'">
                        <input type="radio" name="options" id="option3" autocomplete="off">My Promotion
                    </label>
                    <label class="btn btn-secondary" onclick="window.location.href='orderhistory.php'">
                        <input type="radio" name="options" id="option3" autocomplete="off">Order History
                    </label>
                </div>


                <div class="tab-content">
                    <div class="tab-pane active" id="home">
                        <hr>
                        <form class="form" method="post" action= "submiteditprofile.php" id="registrationForm">

                            <div class="col">
                                <button type="button" class="btn btn-outline-danger float-right" onclick="window.location.href='unsubscribe.php'">Subscribe/Unsubscribe</button>
                                <button type="button" class="btn btn-outline-warning float-right" onclick="window.location.href='resetPword-oldpword.html'">Reset My Password</button>
                            </div>
                            <br>
                            <br>
                            <div class="containter">
                                <div class="row">
                                    <div class="col">
                                        <div class="col form-group required">
                                            <label class="control-label"for="first_name"><h4>First name</h4></label>
                                            <input type="text" class="form-control" name="first_name" id="first_name" value="<?php echo $firstname?>" placeholder="First name" required>

                                        </div>
                                    </div>

                                    <div class="col">
                                        <div class="col form-group required">
                                            <label class="control-label" for="last_name"><h4>Last name</h4></label>
                                            <input type="text" class="form-control" name="last_name" id="last_name"  value="<?php echo $lastname?>" placeholder="Last name" title="enter your last name if any.">
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col">
                                        <div class="col form-group">
                                            <label class="control-label" for="age"><h4>Age</h4></label>
                                            <input type="text" class="form-control" name="age" id="age" placeholder=""  value="<?php echo $age?>"  title="enter your last name if any.">
                                        </div>
                                    </div>
                                    <div class="col">
                                        <div class="col form-group">
                                            <label class="control-label" for="phone"><h4>Phone</h4></label>
                                            <input type="text" class="form-control" name="phone" id="phone" placeholder="enter phone"  value="<?php echo $phonenum?>"   title="enter your phone number if any.">
                                        </div>
                                    </div>
                                </div>


                                <!--should display user's email as a placeholder
                                    if user try to use another email for their account,
                                    they should recieve a email to confirm the change,
                                    then the system will ask use to enter in a new email,
                                    and confirm the new email address, if faill to confirm,
                                    user's stat should be "inactivate".-->
                                <div class="col form-group">
                                    <label  for="email"><h4>Email</h4></label>
                                    <input disabled type="email" class="form-control" name="email" id="email" value="<?php echo $emailaddress?>" placeholder="you@email.com" title="your email.">
                                </div>

                                <!--                      <div class="col form-group">-->
                                <!--                              <label class="control-class" class="control-label" for="address"><h4>Address</h4></label>-->
                                <!--                              <input type="text" class="form-control" id="location" placeholder="You Address" title="your Address">-->
                                <!--                          -->
                                <!--
                                                    </div>-->
                                <div class="form-group">
                                    <div class="col-xs-12">
                                        <br>
                                        <button class="btn btn-lg btn-success" name="update" type="submit"><i class="glyphicon glyphicon-ok-sign"></i> Confirm</button>


                                        <button class="btn btn-lg btn-outline-secondary" type="reset"><i class="glyphicon glyphicon-repeat"></i>Cancel</button>
                                    </div>
                                </div>
                            </div>
                        </form>

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