<?php 
 include 'class/login.php';
include 'core/init.php';

$showTimeline=False;
if(login::isLoggedIn()){
     $userid =login::isLoggedIn();
    
     $showTimeline=True;
    
    
}else{
   header('Location: index.php'); 
}
$user_id =login::isLoggedIn();
header("Refresh:0");
?>




<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>ভাড়া.বাংলা</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="http://code.jquery.com/mobile/1.4.5/jquery.mobile-1.4.5.min.css">
    <!--    <link rel="stylesheet" href="assets/css/jqueryMobile.css">-->
    <script src="http://code.jquery.com/jquery-1.11.3.min.js"></script>
    <!--    <script src="assets/js/jquery.js"></script>-->
    <script src="http://code.jquery.com/mobile/1.4.5/jquery.mobile-1.4.5.min.js"></script>
    <!--    <script src="assets/js/jqueryMobile.js"></script>-->
    <!--    <meta name="viewport" content="width=device-width, user-scalable=yes, maximum-scale=1, initial-scale=1">-->
    <!--    <link rel="icon" href="/assets/img/loading.svg">-->
    <!--    <link rel="icon" href="/assets/img/hut.png" type="image/x-icon">-->
    <!--    <link href="https://fonts.maateen.me/mukti/font.css" rel="stylesheet">-->

    <link rel="stylesheet" href="assets/css/mobileCustom.css" media="screen and (max-width: 600px)">




</head>

<body>


    <div data-role="page" id="sign_up">
        <div data-role="panel" id="myPanel3" data-display="overlay" data-position="left">
            <h2>Panel Header..</h2>
            <p>Some text in the panel..</p>
        </div>

        <div data-role="header">
            <div class="header_top">

            </div>

            <div class="header_wrapper">
                <div class="logo">
                    <a href="http://bhara.com"><img src="assets/img/logo.svg" alt=""></a>

                </div>
                <a style="text-decoration:none;" href="http://bhara.com">
                    <div class="brandName">ভাড়া.কম</div>
                </a>
                <a href="#adv">
                    <div class="post_adv">Post Adv</div>
                </a>
                <div class="account_icon">
                    <img src="assets/img/account.svg" alt="">
                </div>

            </div>
            <div class="header_down_part">
                <div class="main_category">

                    <div class="nav_bar_click">
                        <a href="#myPanel3"><img src="assets/img/nav-click-hori.svg" alt=""></a>
                    </div>
                    <div class="nav_home">
                        <!--                        <a href="#home_rent_page"><img src="assets/img/home_icon.svg" alt=""></a> -->
                        <a href="#homepage"><img src="assets/img/home_icon.svg" alt=""></a>
                    </div>
                    <div class="nav_car"><img src="assets/img/car_icon.svg" alt=""></div>
                    <div class="nav_crane"><img src="assets/img/cran_icon.svg" alt=""></div>
                    <div class="nav_employee"><img src="assets/img/employee_icon.svg" alt=""></div>
                </div>
                <div class="search_option">
                    <div class="select_area">
                        <input type="text" class="division" name="" placeholder="Division">
                        <input type="text" class="division" placeholder="District" name="">
                        <input type="text" class="division" placeholder="Area" name="">
                    </div>
                    <div class="search_rent">
                        <input type="text" class="search_box" placeholder="Search" name="">
                        <div class="search_icon ">


                        </div>

                    </div>
                </div>

            </div>

        </div>
        <br>
        <br>
        <br>
        <br>
        <br>
        <br>

        <h2>You have already Registered and logged in.</h2>

        <h2><a href="logout.php">
            Logged Out
        </a></h2>
    </div>
</body>

</html>
