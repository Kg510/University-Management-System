<?php
if (!isset($pageTitle)) {
    $pageTitle = "Admin";
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title><?php echo $pageTitle; ?> | University Management System</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    
    <!-- CSS Links -->
    <link rel="stylesheet" href="../../assets/css/normalize.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="../../assets/css/main.css">
</head>
<body>

    <header class="header_area fix">
        <div id="sticker">
            <div class="head">
                <a href="#">
                    <div class="logo fix">
                        <img src="../../assets/images/university_logo.png" alt="University Logo">
                    </div>
                </a>
                <div class="uniname fix">
                    <h2>University Management System</h2>
                </div>
            </div>
            <div class="menu fix">
                <div class="dateshow fix">
                    <p><?php echo "Date : " . date("d M Y"); ?></p>
                </div>
            </div>
        </div>
    </header>

    <div class="maincontent container fix">
