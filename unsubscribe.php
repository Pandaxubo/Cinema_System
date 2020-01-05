<?php
session_start();

function updateSubscription(){
    if(isset($_SESSION["useremail"])) {
        $email = $_SESSION["useremail"];
        $host="127.0.0.1";
        $port=3306;
        $dbusername="root";
        $dbpassword="password";
        $dbname="cinemabooking";
        $conn = new mysqli ($host, $dbusername, $dbpassword, $dbname,$port);

        $sql_1 = "SELECT * FROM user WHERE emailAddress = '$email'";
        //$result = mysqli_query($sql_1,$conn);
        $result = $conn->query($sql_1);
        if ($result->num_rows>0) {
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
    if ($subscribe == 0) {
        $sql_1 = "UPDATE user SET subscribe = 1 WHERE userID = '$uid'";
        if ($conn->query($sql_1) === TRUE) {
            echo "<script> alert('Update Success！'); </script>";
            header("Location: profilehome.php");
        } else {
            echo "<script> alert('Update failed！'); </script>";
        }
    }

else {
    $sql_2 = "UPDATE user SET subscribe = 0 WHERE userID = '$uid'";

    if ($conn->query($sql_2) === TRUE) {
// if($result){

        echo "<script> alert('Update Success！'); </script>";
        header("Location: profilehome.php");
    } else {
        echo "<script> alert('Update failed！'); </script>";
    }
}
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

    <title>Registration Confirmation</title>
</head>
<body>
<div class="loginform">
    <aside class="col-12 d-flex justify-content-center" >
        <div class="card">
            <article class="card-body">
                <h2 class="card-title text-center mb-4 mt-1">Are you sure you want to subscribe/unsubscribe?</h2>
                <button type="button" class="btn btn-success btn-block">Yes</button>
                <p></p>
                <script type="text/javascript">
                    $(document).ready(updateSubscription(){
                        $("button").click(updateSubscription(){
                            $.ajax({
                                type: 'POST',
                                url: 'unsubscribe.php',
                                success: updateSubscription(data) {
                                    alert(data);
                                    $("p").text(data);
                                }
                            });
                        });
                    });
                </script>
                <button type="button" class="btn btn-danger btn-block" onclick="window.location.href='profilehome.php'">No</button>
            </article>
        </div>
    </aside>
</div>

</body>
</html>
