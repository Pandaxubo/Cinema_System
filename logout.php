<?php
session_start();//启动会话
if(!isset($_SESSION["islogin"])){
    echo '<script language="JavaScript">;alert("wrong way");</script>;';
}
session_unset();//删除会话
session_destroy();//结束会话
echo "<script>alert('You are logged out.');</script>";
//echo "<br><br><p>Logged out</p>";
//echo"<button type=\"button\" class=\"btn btn-success\"><a href='homepage.html'>Back to Homepage</a></button>";
header("location: homepage.html");
?>