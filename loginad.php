
<?php
session_start();
$userpword = filter_input(INPUT_POST, 'userpassword1');
$useremail= filter_input(INPUT_POST,'useremail1');
$userpassword = md5($userpword);
$host="127.0.0.1";
$port=3306;
$dbusername="root";
$dbpassword="password";
$dbname="cinemabooking";
// Create connection
$conn = new mysqli ($host, $dbusername, $dbpassword, $dbname,$port);
if (mysqli_connect_error()){
    die('Connect Error ('. mysqli_connect_errno() .') '
        . mysqli_connect_error());
}
else{
    $sql="select * from user where emailAddress = '$useremail' and password = '$userpassword'";
    $result = $conn->query($sql);
    $row=mysqli_num_rows($result);
    $rows = $result->fetch_array();
    $usertype =$rows['userType_userTypeID'];
            if($row && $usertype == "1"){
                $_SESSION['useremail']=$useremail;
                $_SESSION['userpassword']=$userpassword;
                $_SESSION['islogin']='1';
                header("Location: admin-hp.html");
    } else if ($row){
                $_SESSION['useremail']=$useremail;
                $_SESSION['userpassword']=$userpassword;
                $_SESSION['islogin']='1';
                header("Location: homepage-loggedin.html");
            }
        else{   echo $usertype;
            header('refresh:3;login.html');
            echo "Invalid user email or password, you will return to login page in 3 seconds.";
            $conn->close();
        }
 }
?>

