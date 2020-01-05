<?php
session_start();
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;
$useremail = $_SESSION['useremail'];
$ccNum = filter_input(INPUT_POST,'ccNum');
$end4 = substr($ccNum,12);
// $ccEnum = md5($ccNum);
$cFname = filter_input(INPUT_POST,'first_name');
$cLname = filter_input(INPUT_POST,'last_name');
$ccExp = filter_input(INPUT_POST,'expdate');
$bAddress = filter_input(INPUT_POST,'badd');
$cvv = filter_input(INPUT_POST,'cvv');

$host = "127.0.0.1";
$port = 3306;
$dbusername = "root";
$dbpassword = "password";
$dbname = "cinemabooking";
$conn = new mysqli ($host, $dbusername, $dbpassword, $dbname, $port);

// Store a string into the variable which
// need to be Encrypted
// $simple_string = "Welcome to GeeksforGeeks\n";

// Display the original string
// echo "Original String: " . $ccNum;

// Store the cipher method
$ciphering = "AES-128-CTR";

// Use OpenSSl Encryption method
$iv_length = openssl_cipher_iv_length($ciphering);
$options = 0;

// Non-NULL Initialization Vector for encryption
$encryption_iv = '1234567891011121';

// Store the encryption key
$encryption_key = "whatever";

// Use openssl_encrypt() function to encrypt the data
$encryption = openssl_encrypt($ccNum, $ciphering,
    $encryption_key, $options, $encryption_iv);

// Display the encrypted string
// echo "<script>alert('Encrypted String: " . $encryption . "')</script>";
// echo "Encrypted String: " . $encryption . "\n";

// Non-NULL Initialization Vector for decryption
// $decryption_iv = '1234567891011121';

// Store the decryption key
//$decryption_key = "whatever";

// Use openssl_decrypt() function to decrypt the data
// $decryption=openssl_decrypt ($encryption, $ciphering,
//    $decryption_key, $options, $decryption_iv);

// Display the decrypted string
// echo "<script>alert('Decrypted String: " . $decryption . "')</script>";
// echo "Decrypted String: " . $decryption;

if (mysqli_connect_error()) {
    die('Connect Error ('. mysqli_connect_errno() .') '
        . mysqli_connect_error());
}
else {
    $sql = "INSERT INTO paymentinfo (`cardNo`,`exp`,`ccfName`,`cclName`,`billingAddress`,`lastfour`,`user_emailAddress`) VALUES 
            ('$encryption','$ccExp','$cFname','$cLname','$bAddress','$end4', '$useremail')";

    if ($conn->query($sql)) {
        //$to = "$useremail";
        //$subject = "[Cinema] Credit Card Information was Updated!";
        //$message = "<h1>Your credit card information was updated!</h1>If this was you, then you can safely ignore this email. <br>If this wasn’t you, your account may have been compromised. <br>Please reset your password immediately by going to Password Reset";
        //$header = "MIME-Version: 1.0\r\n";
        //$header .= "Content-type: text/html\r\n";
        //$retval = mail($to, $subject, $message, $header);

//        if ($retval == true) {
//            echo "Message sent successfully...\r\n";
//        } else {
//            echo "Message could not be sent...\r\n";
//        }
        require 'vendor/autoload.php';
        //$actual_link = "http://localhost/cinema_system/verifycode.html";
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
            $mail->Subject = '[Cinema] Credit Card Information was Updated!';
            $mail->Body    = "<h1>Your credit card information was updated!</h1>If this was you, then you can safely ignore this email. <br>If this wasn’t you, your account may have been compromised. <br>Please reset your password immediately by going to Password Reset";
            //$mail->AltBody = '如果邮件客户端不支持HTML则显示此内容';
            $mail->send();
            echo 'Message sent successfully...\r\n';
            echo "<script>alert('Please check your email inbox!')</script>";
            echo "<script>window.location.replace('editpayinfo.php')</script>";
        } catch (Exception $e) {
            echo 'Message could not be sent...\r\n', $mail->ErrorInfo;
        }
    } else {
        echo "Error: " . $sql . "" . $conn->error;
    }
    $conn->close();
}
?>