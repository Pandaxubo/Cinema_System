<?php
session_start();
$uinputPword = filter_input(INPUT_POST,'oldpword');
$oldpassword = md5($uinputPword);
$uemail = filter_input(INPUT_POST,'uemail');

$host="127.0.0.1";
$port=3306;
$socket="";
$dbusername="root";
$dbpassword="password";
$dbname="cinemabooking";

//Create connection

$conn = new mysqli ($host,$dbusername,$dbpassword,$dbname,$port);
if (mysqli_connect_error()) {
    die('Connect Error ('. mysqli_connect_errno() .') '
        . mysqli_connect_error());
}
else {
    $sql="select password from user where emailAddress='$uemail'";
    $result= $conn->query($sql);

 if($result->num_rows>0){
     while($row=$result->fetch_assoc()){
         $dbupword = $row["password"];
     }
    if($oldpassword == $dbupword){
      $_SESSION['useremail']=$uemail;
      $_SESSION['islogin']='1';
      header("Location:resetPword-pwordReset.html");
     }
    else{
        header('refresh:3;resetPword-oldpword.html');
        echo "Oops....we cannot confirm your identity <br> Invalid Email or password.";
     }
 }
    else{
        echo "Error: ".$sql."".$conn->error;
}
 $conn->close();
}

?>