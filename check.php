
<?php
session_start();

if (isset($_SESSION['islogin'])) {
    print("logged\n");
    echo $_SESSION['useremail'];
}
else {
    print("logged out.");
}
?>