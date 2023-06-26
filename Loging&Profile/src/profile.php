<?php
session_start();
if($_SESSION['is_login'] != 'YES'){
    echo "<script>window.location.href = 'login.html';</script>";
    exit;
}
?>

<!DOCTYPE html>
<html lang="en" dir="ltr">

<head>
    <meta charset="utf-8">
    <title>Animated Login Form</title>
    <link rel="stylesheet" href="style.css">
</head>

<body>
    <nav>
        <div class="logos">
            <p>BOOK WORMS</p>
        </div>
        <ul>
            <li><a href="Home.html">Home</a></li>
            <li><a href="#">Shop now</a></li>
            <li><a href="#">Contact Us</a></li>
            <li><a href="#">About Us</a></li>
        </ul>
        <img class="img3" src="pictures/logo.png">
    </nav>

    <!--signup-->
    <div class="container">
        <form action="action.php?action=signupAction" method="POST">
            <h2>My Profile</h2>
            <label for="full-name">Full Name:</label>
            <input type="text" id="full-name" value="<?=$_SESSION['fullName']?>" name="funllName" required>

            <label for="date-of-birth">Date of Birth:</label>
            <input type="date" id="date-of-birth" value="<?=$_SESSION['DOB']?>" name="dob" required>

            <label for="phone-number">Phone Number:</label>
            <input type="tel" id="phone-number" value="<?=$_SESSION['phone']?>"  name="phoneNumber" required>

            <label for="email">Email:</label>
            <input type="email" id="email" value="<?=$_SESSION['email']?>"  name="email" required>

            <label for="address">Address:</label>
            <textarea id="address" name="address" required><?=$_SESSION['address']?></textarea>

            <input type="submit" value="Save">
            <a href="action.php?action=deleteAccount&id=<?=$_SESSION['id']?>" class="btn-danger" onclick="return confirm('Are you sure you want delete this account?');">Delete My ACoount</a>
        </form>
    </div>