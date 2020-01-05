<?php
session_start();
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;
$moviename = $_SESSION['moviename'];
$showdate = $_SESSION['showdate'];
$showtime = $_SESSION['showtime'];
$seats = $_SESSION['totalseats'];
$total= $_SESSION['total'];
require 'vendor/autoload.php';

$mail = new PHPMailer(true);                              // Passing `true` enables exceptions
try {
    //服务器配置
    $mail->CharSet ="UTF-8";                     //设定邮件编码
    $mail->SMTPDebug = 0;                        // 调试模式输出
    $mail->isSMTP();                             // 使用SMTP
    $mail->Host = 'smtp.gmail.com';                // SMTP服务器
    $mail->SMTPAuth = true;                      // 允许 SMTP 认证
    $mail->Username = 'jiangxubo@gmail.com';                // SMTP 用户名  即邮箱的用户名
    $mail->Password = 'jxb1207609500';             // SMTP 密码  部分邮箱是授权码(例如163邮箱)
    $mail->SMTPSecure = 'ssl';                    // 允许 TLS 或者ssl协议
    $mail->Port = 465;                            // 服务器端口 25 或者465 具体要看邮箱服务器支持

    $mail->setFrom('jiangxubo@gmail.com', 'Admin');  //发件人
    $mail->addAddress('jiangxubo@gmail.com', 'User');  // 收件人
    //$mail->addAddress('ellen@example.com');  // 可添加多个收件人
    //$mail->addReplyTo('xxxx@163.com', 'info'); //回复的时候回复给哪个邮箱 建议和发件人一致
    //$mail->addCC('cc@example.com');                    //抄送
    //$mail->addBCC('bcc@example.com');                    //密送

    //发送附件
    // $mail->addAttachment('../xy.zip');         // 添加附件
    // $mail->addAttachment('../thumb-1.jpg', 'new.jpg');    // 发送附件并且重命名

    //Content
    $mail->isHTML(true);                                  // 是否以HTML文档格式发送  发送后客户端可直接显示对应HTML内容
    $mail->Subject = 'Order Created Email';
    $mail->Body    = "<h1>Here is your order info:</h1><br>
                       Movie: $moviename;<br>
                       Date:  $showdate;<br>
                       Show Time: $showtime;<br>
                       Seats: $seats;<br>
                       Total: $total;<br>";
    //$mail->AltBody = '如果邮件客户端不支持HTML则显示此内容';
    $mail->send();
    echo 'Message sent successfully...\r\n';
    echo "<script>alert('Please check your email inbox!')</script>";
    echo "<script>window.location.replace('homepage-loggedin.html')</script>";
} catch (Exception $e) {
    echo 'Message could not be sent...\r\n ', $mail->ErrorInfo;
}
?>