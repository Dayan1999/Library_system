<?php
session_start();
if($_SESSION['is_login'] != 'YES'){
    echo "<script>window.location.href = 'login.html';</script>";
    exit;
}
?>

<a href="profile.php">My profile</a>