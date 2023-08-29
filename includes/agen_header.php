<?php 
    include('./includes/db.php')
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="shortcut icon" href="assets/images/logo.png" type="image/png">
    <title>Car2Go</title>
    <link rel="stylesheet" href="./styles/style.css?<?php echo time() ?>">
    <!-- boxicons -->
    <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
    <!-- fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Roboto:ital,wght@0,400;0,500;0,700;1,400&display=swap"
        rel="stylesheet">
</head>

<body>
    <nav>
        <div class="nav">
            <div class="menuBtn" id="menuBtn">
                <i class='bx bx-menu-alt-left'></i>
            </div>
            <div class="logo">
                <img src="./assets/images/logo.png" alt="logo">
                <a href="./index.php" class="agen_titleDiv">
                    <p class="title">Car<span>2GO</span></p>
                    <p class="text">For Agency</p>
                    <!-- <span class="title">Go</span> -->
                </a>
            </div>
            <div class="links">
                <ul>
                    <li><a href="agencies.php#homeDiv">Home</a></li>
                    <li><a href="agencies.php#serviceDiv">Services</a></li>
                    <li><a href="agencies.php#howItDiv">How it Work</a></li>
                    <li><a href="index.php">Main Site</a></li>
                </ul>
            </div>
            <a href="./agen_login.php" class="btn agen_btn" id="loginBtn">
                <i class='bx bx-user'></i>
                <p>Create Account</p>
            </a>
            <a href="../userdashboard.php" class="userBtn" id="userBtn">
                <img src="./assets/images/photo8.jpg" alt="user">
            </a>
            <a href="../userdashboard.php" class="userBtn" id="empBtn">
                <img src="./assets/images/photo4.jpg" alt="user">
            </a>
        </div>
    </nav>

    <!-- mobNav -->

    <div class="mobNav" id="mobNav">
        <ul>
            <li><a href="agencies.php#homeDiv" onclick="hideNav()">Home</a></li>
            <li><a href="agencies.php#serviceDiv" onclick="hideNav()">Services</a></li>
            <li><a href="agencies.php#howItDiv" onclick="hideNav()">How it Work</a></li>
            <li><a href="index.php" onclick="hideNav()">Main Site</a></li>
        </ul>
    </div>

