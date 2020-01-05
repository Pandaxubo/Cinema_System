<?php
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;
$userfname = filter_input(INPUT_POST, 'ufname');
$userlname = filter_input(INPUT_POST,'ulname');
$userid = $userlname;
$pword = filter_input(INPUT_POST, 'upword');
$password = md5($pword);
$useremail= filter_input(INPUT_POST,'uemail');
$uphone= filter_input(INPUT_POST,'uphone');
$subscribe = isset($_POST['subscribe']) ? 1 : 0;

$host = "127.0.0.1";
$port = 3306;
$socket = "";
$dbusername = "root";
$dbpassword = "password";
$dbname = "cinemabooking";

// Create connection
$conn = new mysqli ($host, $dbusername, $dbpassword, $dbname, $port);
if (mysqli_connect_error()) {
    die('Connect Error (' . mysqli_connect_errno() . ') '
        . mysqli_connect_error());
} else {
    $sql = "INSERT INTO user (firstName, lastName, password, emailAddress, userType_userTypeID, subscribe, phoneNum)
values ('$userfname','$userlname','$password','$useremail',3, '$subscribe', '$uphone')";

    if ($conn->query($sql)) {
        //$to = "$useremail";
        //$header = '';
        require 'vendor/autoload.php';
        $actual_link = "http://localhost/cinema_system/verifycode.html";
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
            $mail->Subject = 'User Registration Activation Email';
            $mail->Body    = "<h1>Please click on the link below and enter the verification code to activate your account: </h1> <a href='$actual_link'>" . $actual_link . "</a><br>Verification Code: $userid";
            //$mail->AltBody = '如果邮件客户端不支持HTML则显示此内容';
            $mail->send();
            echo 'Message sent successfully...\r\n';
        } catch (Exception $e) {
            echo 'Message could not be sent...\r\n', $mail->ErrorInfo;
        }

        //$subject = "User Registration Activation Email";
        //$message = "<h1>Please click on the link below and enter the verification code to activate your account: </h1> <a href='" . $actual_link . "'>" . $actual_link . "</a><br>Verification Code: $userid ";
        //$header = "MIME-Version: 1.0\r\n";
        //$header .= "Content-type: text/html\r\n";
        //$retval = mail($to, $subject, $message, $header);

//        if ($retval == true) {
//            echo "Message sent successfully...\r\n";
//            echo "1";
//        } else {
//            echo "Message could not be sent...\r\n";
//        }
        echo "<script>alert('Please check your email inbox!')</script>";
        echo "<script>window.location.replace('login.html')</script>";
        //header("Location: homepage.html");
    } else {
        echo "Error: " . $sql . "" . $conn->error;
    }
    $conn->close();
}

?>
