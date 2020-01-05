<?php
session_start();
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;
$useremail = $_SESSION["useremail"];
$host="127.0.0.1";
$port=3306;
$dbusername="root";
$dbpassword="password";
$dbname="cinemabooking";
$conn = new mysqli ($host, $dbusername, $dbpassword, $dbname,$port);

$uid = $_SESSION["uid"];
$firstname = filter_input(INPUT_POST, 'first_name');
$lastname = filter_input(INPUT_POST, 'last_name');
$age = filter_input(INPUT_POST, 'age');
$phonenum = filter_input(INPUT_POST, 'phone');
//$useremail= filter_input(INPUT_POST,'uemail');

if(isset($_POST['update'])){
    $sql2 = "UPDATE user SET firstName= '$firstname', lastName= '$lastname' , age= '$age' , phoneNum= '$phonenum' WHERE userID = '$uid'";
    $result = $conn->query($sql2);

    if($conn->query($sql2) === TRUE) {
        //$to = "$useremail";
        //$subject = "Your profile has been changed";
        require 'vendor/autoload.php';

        $mail = new PHPMailer(true);                              // Passing `true` enables exceptions
        try {
            //服务器配置
            $mail->CharSet = "UTF-8";                     //设定邮件编码
            $mail->SMTPDebug = 0;                        // 调试模式输出
            $mail->isSMTP();                             // 使用SMTP
            $mail->Host = 'smtp.gmail.com';                // SMTP服务器
            $mail->SMTPAuth = true;                      // 允许 SMTP 认证
            $mail->Username = 'jiangxubo@gmail.com';                // SMTP 用户名  即邮箱的用户名
            $mail->Password = 'jxb1207609500';             // SMTP 密码  部分邮箱是授权码(例如163邮箱)
            $mail->SMTPSecure = 'ssl';                    // 允许 TLS 或者ssl协议
            $mail->Port = 465;                            // 服务器端口 25 或者465 具体要看邮箱服务器支持

            $mail->setFrom('jiangxubo@gmail.com', 'Admin');  //发件人
            $mail->addAddress('jiangxubo@gmail.com', 'user');  // 收件人
            //$mail->addAddress('ellen@example.com');  // 可添加多个收件人
            //$mail->addReplyTo('xxxx@163.com', 'info'); //回复的时候回复给哪个邮箱 建议和发件人一致
            //$mail->addCC('cc@example.com');                    //抄送
            //$mail->addBCC('bcc@example.com');                    //密送

            //发送附件
            // $mail->addAttachment('../xy.zip');         // 添加附件
            // $mail->addAttachment('../thumb-1.jpg', 'new.jpg');    // 发送附件并且重命名

            //Content
            $mail->isHTML(true);                                  // 是否以HTML文档格式发送  发送后客户端可直接显示对应HTML内容
            $mail->Subject = 'Your profile has been changed';
            $mail->Body = '<h1>Profile updated!</h1> 
                    <br>We’ve changed your profile, as you asked. To view or change your account information, visit your account.
                    <br>If you did not ask to change your profile we are here to help secure your account, just contact us.';
            //$mail->AltBody = '如果邮件客户端不支持HTML则显示此内容';

            $mail->send();
            echo '<script> alert(\'Update Success！\'); </script>';
            echo "<script>window.location.replace('profilehome.php')</script>";
        } catch (Exception $e) {
            echo "<script> alert('Update failed！'); </script>", $mail->ErrorInfo;
        }
    }
        //$message = "<h1>Profile updated!</h1>
        //            <br>We’ve changed your profile, as you asked. To view or change your account information, visit your account.
        //            <br>If you did not ask to change your profile we are here to help secure your account, just contact us.";
        //$header = "MIME-Version: 1.0\r\n";
        //$header .= "Content-type: text/html\r\n";
        //$retval = mail($to, $subject, $message, $header);

       // echo "<script> alert('Update Success！'); </script>";
        //header("Location: profilehome.php");
    //}
    //else{
     //   echo "<script> alert('Update failed！'); </script>";
    //}
}

?>