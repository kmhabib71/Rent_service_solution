<?php 
 include 'class/login.php';
include 'core/init.php';

$showTimeline=False;
if(login::isLoggedIn()){
     $userid =login::isLoggedIn();
    
     $showTimeline=True;
    echo 'User find';
    header('Location: profile.php');
}
$user_id =login::isLoggedIn();


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
    <div data-role="page" id="log_in">
        <div data-role="panel" id="myPanel2" data-display="overlay" data-position="left">
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
                        <a href="#myPanel2"><img src="assets/img/nav-click-hori.svg" alt=""></a>
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
                    <select name="area_search" id="area_search" style="font-size: 12px;
    font-weight: 600;
    width: 70%;
    height: 10px;
    background-color: #3f9784;
    color: white;
    text-shadow: none;
    margin-top: -2px;">
                    <Option>অবস্থান</Option>
                </select>
                    <!--
                    <div class="select_area">
                        <input type="text" class="division" name="" placeholder="Division" >
                        <input type="text" class="division" placeholder="District" name="" >
                        <input type="text" class="division" placeholder="Area" name="" >
                    </div>
-->
                    <div class="search_rent">
                        <input type="text" class="search_box" placeholder="Search" name="">
                        <div class="search_icon ">


                        </div>

                    </div>
                </div>

            </div>

        </div>
        <div class="email_wrap">
            <h3 style="text-align:center">Enter your Email </h3>
            <form action="" method="post">
                <input type="email" name="passRes" id=PassRes />

                <input type="submit" name="sub_pass" value="Reset Password" data-theme="b" class="ui-btn-inner ui-btn-corner-all" id="sub_pass" />
            </form>
        </div>

        <div class="sccss_msg" style="display:none;">An link has send to your your email to reset password. <br></div>
        <?php if(isset($_POST["sub_pass"])){
$to = $getFromPo->checkInput($_POST["passRes"]);

$subject = "Password Reset";
ini_set("SMTP","aspmx.l.google.com");
$message = "
<html>
<head>
<title>Password Reset For Bhara.com</title>
</head>
<body>
<p>Click on the link to reset your bhara.com password.</p>
<a href='localhost/bhar'>Click Me</a>
<table>
<tr>
<th>Firstname</th>
<th>Lastname</th>
</tr>
<tr>
<td>John</td>
<td>Doe</td>
</tr>
</table>
</body>
</html>
";

// Always set content-type when sending HTML email
$headers = "MIME-Version: 1.0" . "\r\n";
$headers .= "Content-type:text/html;charset=UTF-8" . "\r\n";

// More headers
$headers .= 'From: <admin@bhara.com>' . "\r\n";
//$headers .= 'Cc: myboss@example.com' . "\r\n";

mail($to,$subject,$message,$headers);
   
}  ?>

    </div>
    <script>


    </script>
</body>

</html>
