<?php
session_start();
if (isset($_SESSION["islogin"])) {
   echo isset($_SESSION["user_info"]);
    if(isset($_SESSION['userid']))
{
    $info=isset($_SESSION['user_info'])?$_SESSION['user_info']:array();
    $password=isset($_POST['password'])?$_POST['password']:"";
    $firstname=isset($_POST['firstname'])?$_POST['firstname']:"";
    $lastname=isset($_POST['lastname'])?$_POST['lastname']:"";
    $phonenum=isset($_POST['phonenum'])?$_POST['phonenum']:"";
    $age=isset($_POST['age'])?$_POST['age']:"";
    $subscribe=isset($_POST['subscribe'])?$_POST['subscribe']:"";
    $id=$info['userID'];
    $host="127.0.0.1";
    $port=3306;
    $dbusername="root";
    $dbpassword="password";
    $dbname="cinemabooking";
    $conn = new mysqli ($host, $dbusername, $dbpassword, $dbname,$port);
//        $sql1="select * from user where userID = {$id}";
//        $result1 = mysqli_query($conn,$sql1);
        $sql="update user set firstName='{$firstname}', lastName='{$lastname}', phoneNum='{$phonenum}', age='{$age}', subscribe='{$subscribe}',  where userID={$id}";
        $result = mysqli_query($conn,$sql);
        //$rows=mysqli_num_rows($result);
        if($result)
        {
            $msg="edit info success";//修改成功
        }else
        {
            $msg="edit info failed";//修改失败
        }
       // echo '<script>alert("'.$msg.'");window.location.href="editprofile.php";</script>';
    }
}
//else  if(isset($_SESSION['useremail']))
//{
////edit info
//    $password=isset($_POST['password'])?$_POST['password']:"";
//    $firstname=isset($_POST['firstname'])?$_POST['firstname']:"";
//    $lastname=isset($_POST['lastname'])?$_POST['lastname']:"";
//    $phonenum=isset($_POST['phonenum'])?$_POST['phonenum']:"";
//    $age=isset($_POST['age'])?$_POST['age']:"";
//    $subscribe=isset($_POST['subscribe'])?$_POST['subscribe']:"";
//
//    $host="localhost";
//    $port=3306;
//    $dbusername="root";
//    $dbpassword="password";
//    $dbname="cinemabooking";
//    $conn = new mysqli ($host, $dbusername, $dbpassword, $dbname,$port);
//    if (mysqli_connect_error()){
//        die('Connect Error ('. mysqli_connect_errno() .') '
//            . mysqli_connect_error());
//    }
//    //$user1 = $_SESSION['useremail1'];
//    else{
//        $sql1="select * from user where emailAddress = '$useremail'";
//        $result1 = mysqli_query($conn,$sql1);
//        $sql2="update user set password='{$password}', firstName='{$firstname}', lastName='{$lastname}', phoneNum='{$phonenum}', phoneNum='{$phonenum}', age='{$age}', subscribe='{$subscribe}' where emailAddress={$useremail}";
//        $result2 = mysqli_query($conn,$sql2);
//        $rows=mysqli_num_rows($result2);
//        if($rows)
//        {
//            $msg="edit info success";//修改成功
//            $_SESSION['userpassword2']=$userpassword;
//        }else
//        {
//            $msg="edit info failed";//修改失败
//        }
//        echo '<script>alert("'.$msg.'");window.location.href="editprofile.php";</script>';
//    }
//}}
else {
   header("Location: login.html");
}

?>