<?php 
 include 'class/login.php';
include 'core/init.php';

$userid ='';

$showTimeline=False;
if(login::isLoggedIn()){
     $userid =login::isLoggedIn();
    
     $showTimeline=True;
//    echo 'User find';
    
}

$userInfo = $getFromPo->userData($userid);



?>




<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>ভাড়া.বাংলা</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!--    <link rel="stylesheet" href="http://code.jquery.com/mobile/1.4.5/jquery.mobile-1.4.5.min.css">-->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/css/materialize.min.css">
    <link rel="stylesheet" href="assets/css/jquery_mobile.min.css">
    <!--    <link rel="stylesheet" href="assets/css/jqueryMobile.css">-->
    <script src="assets/js/jquery.js"></script>
    <script src="assets/js/jquery_mobile.min.js"></script>
    <!--    <script src="http://code.jquery.com/jquery-1.11.3.min.js"></script>-->
    <!--    <script src="assets/js/jquery.js"></script>-->
    <!--    <script src="http://code.jquery.com/mobile/1.4.5/jquery.mobile-1.4.5.min.js"></script>-->
    <!--    <script src="assets/js/jqueryMobile.js"></script>-->
    <!--    <meta name="viewport" content="width=device-width, user-scalable=yes, maximum-scale=1, initial-scale=1">-->
    <!--    <link rel="icon" href="/assets/img/loading.svg">-->
    <!--    <link rel="icon" href="/assets/img/hut.png" type="image/x-icon">-->
    <!--    <link href="https://fonts.maateen.me/mukti/font.css" rel="stylesheet">-->

    <link rel="stylesheet" href="assets/css/mobileCustom.css" media="screen and (max-width: 600px)">
    <link rel="stylesheet" href="assets/css/desktop.css" media="screen and (min-width: 1200px)">




</head>


<body>


    <div data-role="page" id="homepage">
        <div data-role="panel" id="myPanel1" data-display="overlay" data-position="left" style="background: #29af7d;">
            <!--            <h2>Menu Details</h2>-->
            <ul style="color:#158a8f;">
                <li>
                    <a href="" class="panel_link_style">
                        <div class="pro_container">
                            <div class="pro_pic"><img src="<?php echo $userInfo->profileImage;  ?>" alt="">
                            </div>
                            <div class="pro_details">
                                <div class="pro_name">
                                    <?php echo $userInfo->username;  ?>
                                </div>
                                <div class="pro_mob">
                                    <?php echo $userInfo->mobile;  ?>
                                </div>
                            </div>
                        </div>
                    </a>
                </li>
                <li class="pro_li">
                    <a href="" class="panel_link_style"><span class="pro_icon">&#x2636;</span>ক্যাটাগরি</a>
                    <div class="cat_det">
                        <div class="cat">রুম/সিট</div>
                        <div class="cat">বাসা</div>
                        <div class="cat">ফ্ল্যাট/অ্যাপার্টমেন্ট</div>
                        <div class="cat">কার</div>
                        <div class="cat-arrow"></div>
                        <div class="cat_down">
                            <div class="cat">ট্রাক</div>
                            <div class="cat">বাস</div>
                            <div class="cat">মাইক্রো</div>
                            <div class="cat">শোরুম</div>
                            <div class="cat">ব্যাংক/বীমা</div>
                            <div class="cat">স্টোর</div>
                            <div class="cat">ফ্যাক্টরি</div>
                            <div class="cat">হোটেল</div>
                            <div class="cat">অফিস</div>
                            <div class="cat">রেস্ট্যুরেন্ট</div>
                            <div class="cat">দোকান</div>
                            <div class="cat">অন্যান্য</div>
                        </div>
                    </div>
                </li>
                <?php  if($userid == ''){ ?>
                <li class="pro_li"><a href="login/login.php" class="panel_link_style" data-ajax="false"><span class="pro_icon">&#x269E;</span>লগিন করুন</a></li>
                <li class="pro_li">
                    <a href="login/signUp.php" data-ajax="false" class="panel_link_style"><span class="pro_icon">&#x270D;</span>এ্যাকাউন্ট খুলুন</a>
                </li>
                <?php } ?>
                <li class="pro_li">
                    <a href="profile.php" data-ajax="false" class="panel_link_style"><span class="pro_icon">&#x263B;</span>প্রোফাইল</a>
                </li>

                <li class="pro_li">
                    <a href="rentAccount.php" class="panel_link_style" data-ajax="false"><span class="pro_icon">&#x270D;</span>ভাড়া হিসাব</a>
                </li>
                <?php  if($userid != ''){ ?>
                <li class="pro_li">
                    <a href="logout.php" class="panel_link_style"><span class="pro_icon">&#x269F;</span>লগআউট</a>
                </li>
                <?php } ?>
                <li class="pro_li">
                    <a href="aboutBharaCom" class="panel_link_style" data-ajax="false"><span class="pro_icon">&#x261E;</span>ভাড়া.কম</a>
                </li>

                <li class="pro_li">
                    <a href="" class="panel_link_style"></a>
                </li>
                <li class="pro_li">
                    <a href="" class="panel_link_style"></a>
                </li>
            </ul>
        </div>

        <div data-role="header" style="background-color:aliceblue; ">


            <div class="header_wrapper">
                <div class="logo" id="my_logo">
                    <a href="#"><img src="assets/img/logo.svg" alt=""></a>

                </div>
                <a style="text-decoration:none;" href="#">
                    <div class="brandName">ভাড়া.কম</div>
                </a>
                <a href="adv.php" data-ajax="false">
                    <div class="post_adv">ফ্রি বিজ্ঞাপন দিন</div>
                </a>
                <!--
                <div class="account_icon">
                    <a href="login/login.php" data-ajax="false">
                        <img src="assets/img/account.svg" alt=""></a>
                </div>
-->

            </div>
            <div class="header_down_part">
                <div class="main_category">
                    <a href="#myPanel1">
                        <div class="nav_bar_click">
                            <img src="assets/img/nav-click-hori.svg" class="nav_hori" alt="" style="z-index:99;">
                        </div>
                    </a>
                    <a href="homeCat.php" data-ajax="false" style="cursor:pointer;">
                        <div class="nav nav_home">
                            <img src="assets/img/home.png" alt="">
                        </div>
                    </a>
                    <div class="nav nav_car">
                        <img src="assets/img/carNav.png" alt="">
                    </div>
                    <div class="nav nav_crane"><img src="assets/img/crane.png" alt=""></div>
                    <div class="nav nav_employee"><img src="assets/img/personel.png" alt=""></div>
                    <div class="nav nav_shop"><img src="assets/img/shop.png" alt=""></div>
                    <div class="nav nav_bank"><img src="assets/img/bank.png" alt=""></div>
                </div>
                <div class="search_option">

                    <a href="#popupNested" data-rel="popup" class="ui-btn ui-corner-all ui-shadow ui-btn-inline ui-icon-bars " data-transition="slide" id="area_search">অবস্থান নির্বাচন করুন</a>
                    <div data-role="popup" id="popupNested" data- data-theme="none">

                        <div data-role="collapsibleset" data-theme="b" data-content-theme="a" data-collapsed-icon="arrow-r" data-expanded-icon="arrow-d" style="margin:0; width:250px;" id="dist_hit">

                            <div data-role="collapsible" data-inset="false">

                                <h2>ঢাকা</h2>

                                <ul data-role="listview">

                                    <li><a href="#" data-rel="dialog" value="1" class="dis_design">ঢাকা</a></li>
                                    <li><a href="#" data-rel="dialog" value="2" class="dis_design">ফরিদপুর</a></li>
                                    <li><a href="#" data-rel="dialog" value="3" class="dis_design">গাজীপুর</a></li>
                                    <li><a href="#" data-rel="dialog" value="4" class="dis_design">গোপালগঞ্জ</a></li>
                                    <li><a href="#" data-rel="dialog" value="6" class="dis_design">কিশোরগঞ্জ</a></li>
                                    <li><a href="#" data-rel="dialog" value="7" class="dis_design">মাদারীপুর</a></li>
                                    <li><a href="#" data-rel="dialog" value="8" class="dis_design">মানিকগঞ্জ</a></li>
                                    <li><a href="#" data-rel="dialog" value="9" class="dis_design">মুন্সিগঞ্জ</a></li>
                                    <li><a href="#" data-rel="dialog" value="11" class="dis_design">নারায়াণগঞ্জ</a></li>
                                    <li><a href="#" data-rel="dialog" value="12" class="dis_design">নরসিংদী</a></li>
                                    <li><a href="#" data-rel="dialog" value="14" class="dis_design">রাজবাড়ি</a></li>
                                    <li><a href="#" data-rel="dialog" value="15" class="dis_design">শরীয়তপুর</a></li>
                                    <li><a href="#" data-rel="dialog" value="17" class="dis_design">টাঙ্গাইল</a></li>
                                </ul>
                            </div>
                            <!-- /collapsible -->

                            <div data-role="collapsible" data-inset="false">

                                <h2>চট্টগ্রাম</h2>

                                <ul data-role="listview">

                                    <li><a href="#" data-rel="dialog" value="40" class="dis_design">বান্দরবান</a></li>
                                    <li><a href="#" data-rel="dialog" value="41" class="dis_design">ব্রাহ্মণবাড়িয়া</a></li>
                                    <li><a href="#" data-rel="dialog" value="42" class="dis_design">চাঁদপুর</a></li>
                                    <li><a href="#" data-rel="dialog" value="43" class="dis_design">চট্টগ্রাম</a></li>
                                    <li><a href="#" data-rel="dialog" value="44" class="dis_design">কুমিল্লা</a></li>
                                    <li><a href="#" data-rel="dialog" value="45" class="dis_design">কক্স বাজার</a></li>
                                    <li><a href="#" data-rel="dialog" value="46" class="dis_design">ফেনী</a></li>
                                    <li><a href="#" data-rel="dialog" value="47" class="dis_design">খাগড়াছড়ি</a></li>
                                    <li><a href="#" data-rel="dialog" value="48" class="dis_design">লক্ষ্মীপুর</a></li>
                                    <li><a href="#" data-rel="dialog" value="49" class="dis_design">নোয়াখালী</a></li>
                                    <li><a href="#" data-rel="dialog" value="50" class="dis_design">রাঙ্গামাটি</a></li>
                                </ul>
                            </div>
                            <!-- /collapsible -->

                            <div data-role="collapsible" data-inset="false">

                                <h2>রাজশাহি</h2>

                                <ul data-role="listview">

                                    <li><a href="#" data-rel="dialog" value="18" class="dis_design">বগুড়া</a></li>
                                    <li><a href="#" data-rel="dialog" value="19" class="dis_design">জয়পুরহাট</a></li>
                                    <li><a href="#" data-rel="dialog" value="20" class="dis_design">নওগাঁ</a></li>
                                    <li><a href="#" data-rel="dialog" value="21" class="dis_design">নাটোর</a></li>
                                    <li><a href="#" data-rel="dialog" value="22" class="dis_design">নবাবগঞ্জ</a></li>
                                    <li><a href="#" data-rel="dialog" value="23" class="dis_design">পাবনা</a></li>
                                    <li><a href="#" data-rel="dialog" value="24" class="dis_design">রাজশাহী</a></li>
                                    <li><a href="#" data-rel="dialog" value="25" class="dis_design">সিরাজগঞ্জ</a></li>
                                </ul>
                            </div>
                            <!-- /collapsible -->

                            <div data-role="collapsible" data-inset="false">

                                <h2>খুলনা</h2>

                                <ul data-role="listview">

                                    <li><a href="#" data-rel="dialog" value="55" class="dis_design">বাগেরহাট</a></li>
                                    <li><a href="#" data-rel="dialog" value="56" class="dis_design">চুয়াডাঙ্গা</a></li>
                                    <li><a href="#" data-rel="dialog" value="57" class="dis_design">যশোর</a></li>
                                    <li><a href="#" data-rel="dialog" value="58" class="dis_design">ঝিনাইদহ</a></li>
                                    <li><a href="#" data-rel="dialog" value="59" class="dis_design">খুলনা</a></li>
                                    <li><a href="#" data-rel="dialog" value="60" class="dis_design">কুষ্টিয়া</a></li>
                                    <li><a href="#" data-rel="dialog" value="61" class="dis_design">মাগুরা</a></li>
                                    <li><a href="#" data-rel="dialog" value="62" class="dis_design">মেহেরপুর</a></li>
                                    <li><a href="#" data-rel="dialog" value="63" class="dis_design">নড়াইল</a></li>
                                    <li><a href="#" data-rel="dialog" value="64" class="dis_design">সাতক্ষীরা</a></li>
                                </ul>
                            </div>

                            <div data-role="collapsible" data-inset="false">

                                <h2>বরিশাল</h2>

                                <ul data-role="listview">

                                    <li><a href="#" data-rel="dialog" value="34" class="dis_design">বরগুনা</a></li>
                                    <li><a href="#" data-rel="dialog" value="35" class="dis_design">বরিশাল</a></li>
                                    <li><a href="#" data-rel="dialog" value="36" class="dis_design">ভোলা</a></li>
                                    <li><a href="#" data-rel="dialog" value="37" class="dis_design">ঝালকাঠি</a></li>
                                    <li><a href="#" data-rel="dialog" value="38" class="dis_design">পটুয়াখালী</a></li>
                                    <li><a href="#" data-rel="dialog" value="39" class="dis_design">পিরোজপুর</a></li>
                                </ul>
                            </div>

                            <div data-role="collapsible" data-inset="false">

                                <h2>সিলেট</h2>

                                <ul data-role="listview">

                                    <li><a href="#" data-rel="dialog" value="51" class="dis_design">হবিগঞ্জ</a></li>
                                    <li><a href="#" data-rel="dialog" value="52" class="dis_design">মৌলভীবাজার</a></li>
                                    <li><a href="#" data-rel="dialog" value="53" class="dis_design">সুনামগঞ্জ</a></li>
                                    <li><a href="#" data-rel="dialog" value="54" class="dis_design">সিলেট</a></li>
                                </ul>
                            </div>

                            <div data-role="collapsible" data-inset="false">

                                <h2>রংপুর</h2>

                                <ul data-role="listview">

                                    <li><a href="#" data-rel="dialog" value="26" class="dis_design">দিনাজপুর</a></li>
                                    <li><a href="#" data-rel="dialog" value="27" class="dis_design">গাইবান্ধা</a></li>
                                    <li><a href="#" data-rel="dialog" value="28" class="dis_design">কুড়িগ্রাম</a></li>
                                    <li><a href="#" data-rel="dialog" value="29" class="dis_design">লালমনিরহাট</a></li>
                                    <li><a href="#" data-rel="dialog" value="30" class="dis_design">নীলফামারী</a></li>
                                    <li><a href="#" data-rel="dialog" value="31" class="dis_design">পঞ্চগড়</a></li>
                                    <li><a href="#" data-rel="dialog" value="32" class="dis_design">রংপুর</a></li>
                                    <li><a href="#" data-rel="dialog" value="33" class="dis_design">ঠাকুরগাঁও</a></li>
                                </ul>
                            </div>
                            <!-- /collapsible -->
                        </div>
                        <!-- /collapsible set -->
                    </div>

                </div>

            </div>
            <!--
<div class="search_rent">
    <input type="text" class="search_box" placeholder="খুজুন" name="post_search" id="post_search">
    <div class="ui-btn ui-icon-search ui-btn-icon-right ui-shadow ui-corner-all" id="post_search_sub">


    </div>

</div>
-->
            <div class="search_rent">
                <div class="" style="
    /* height: 100%; */
    width: 100%;
    /* border: 1px solid gray; */
    /* text-align: center; */
">
                    <div class=""><input type="text" class="search_box" placeholder="ভাড়া প্রোপার্টি অনুসন্ধান করুন" name="post_search" id="post_search" style="
    height: 32px;
    font-size: 0.698rem;
    border: 1px solid #80808045;
    margin-bottom: 0.455rem;
    border-radius: 0.355rem;
"></div>
                </div>
                <div class="ui-btn ui-icon-search ui-btn-icon-right ui-shadow ui-corner-all" id="post_search_sub" style="
    border: none;
    background: none;
    box-shadow: none;
    /* vertical-align: middle; */
    margin-left: -40px;
   margin-top: 1px;
">


                </div>

            </div>
        </div>

        <div data-role="main" class="ui-content">
            <div class="post_det_container">

            </div>

            <div class="post">
                <?php $nameCat = 'othCat';
                
                $getFromPo->Posts($nameCat); ?>


            </div>
            <div class="shareBu" style="display:none;">
                <?php echo $shareBut; ?>
            </div>
        </div>










        <div data-role="footer" data-position="fixed" style="background: #158a8f;
    text-shadow: none;
    color: white;
    height: 2.986rem;">
            <h1>Footer Text</h1>
        </div>

    </div>

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
                        <a href="homeCat.php" data-ajax="false" style="cursor:pointer;"><img src="assets/img/home_icon.svg" alt=""></a>
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

        <div class="sign_in_wrap">
            <div class="sign_in_form">
                <form method="POST" name="form3" data-ajax="false" action="sign_in.php">
                    <div class="mobile">
                        <div class="mob_text"> Mobile: </div>
                        <div class="mob_input">

                            <input type="tel" name="mobile" class="mobile_input" placeholder="01815 667719" required></div>
                    </div>
                    <div class="password">
                        <div class="mob_text"> Password: </div>
                        <div class="mob_input">

                            <input type="password" class="mobile_input" placeholder="******" name="password"></div>
                    </div>
                    <input type="submit" value="Sign in" name="signin" id="login" onclick="phonenumber1(document.form3.mobile)">
                    <div class="register">Or <span class="registerr"><a href="#sign_up">Register</a>  </span></div>
                </form>
                <?php
                    if(isset($errorb)){
                        echo '<div class="error">
                        '.$errorb.'
                        </div>';
                    }
                    ?>
            </div>
        </div>

        <script>
            function phonenumber1(inputtxt) {
                var phoneno1 = /^\d{11}$/;
                if (inputtxt.value.match(phoneno1)) {
                    return true;
                    $(location).attr('href', 'http://localhost/bhara')
                } else {
                    alert("eti valid number noi");
                    return false;
                }
            }

        </script>

    </div>
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
        <div class="sign_up_wrap">
            <div class="sign_up_form">
                <form method="POST" name="form2" data-ajax="false" action="register.php">
                    <div class="mobile">
                        <div class="mob_text"> Mobile: </div>
                        <div class="mob_input">

                            <input type="tel" name="mobile" class="mobile_input" placeholder="01815 667719" required></div>
                    </div>
                    <div class="password">
                        <div class="mob_text"> Password: </div>
                        <div class="mob_input">

                            <input type="password" class="mobile_input" placeholder="******" name="password" required></div>
                    </div>
                    <input type="submit" name="signup" value="Sign Up" onclick="phonenumber(document.form2.mobile)" id="signup">

                </form>
                <?php
                    if(isset($errorb)){
                        echo '<div class="error">
                        '.$errorb.'
                        </div>';
                    }
                    ?>
            </div>

        </div>

        <script>
            function phonenumber(inputtxt) {
                var phoneno = /^\d{11}$/;
                if (inputtxt.value.match(phoneno)) {
                    alert("You've registered successfully");
                    return true;
                } else {
                    alert("Not a valid Phone Number");
                    return false;
                }
            }

        </script>


    </div>

    <div data-role="page" id="adv">
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

        <!-- multistep form -->
        <div class="adv_container">
            <ul class="progressbar">
                <li class="active">ভাড়া প্রোপার্টি</li>
                <li>ভাড়া এলাকা</li>
                <li>বিবরণ ও প্রচার</li>
            </ul>

        </div>
        <div class="adv_step">
            <!--            <form action="#">-->
            <div class="adv_item adv_cont">
                <div class="prop_headi">ভাড়া প্রোপার্টি প্রস্থাব করুন:</div>
                <div class="prop_list">




                    <div class="ui-field-contain">
                        <label for="select-native-4">ভাড়া প্রোপার্টি ক্যাটাগরি</label>
                        <select name="select-native-4" id="select-native-4">
        <option>নির্বাচন করুন: </option>
        <optgroup label="রুম/ বাসা/ আপার্টমেন্ট">
            <option value="1"><img src="assets/img/home_icon.svg" alt="">ফ্ল্যাট/ অ্যাপার্টমেন্ট</option>
            <option value="2">বাসা</option>
            <option value="3">রুম</option>
            <option value="4">বাড়ি</option>
        </optgroup>
        <optgroup label="গাড়ি">
            <option value="5">সিএনজি</option>
            <option value="6">কার</option>
            <option value="7">বাস</option>
            <option value="8">ট্রাক</option>
        </optgroup>
        <optgroup label="কমার্শিয়াল স্পেস">
            <option value="9">ব্যাংক/বীমা</option>
            <option value="10">শোরুম</option>
            <option value="11">দোকান</option>
            <option value="12">গ্যারেজ</option>
        </optgroup>
        <optgroup label="কনস্ট্রাকশন মেশিন">
            <option value="13">ক্রেইন</option>
            <option value="14">স্কাবেটর</option>
        </optgroup>
        <optgroup label="পার্সোনেল রিক্রুটমেন্ট">
            <option value="15">চাকরি</option>
            <option value="16">কন্ট্রাক্ট</option>
        </optgroup>
        <optgroup label="অন্যান্য">
            <option value="17">অন্যান্য</option>
        </optgroup>
    </select>
                    </div>


                </div>



            </div>
            <div id="adv_area">
                <div class="adv_cont ">
                    <span class="prop_headi">ভাড়ার অবস্থান উল্লেখ করুন</span>

                    <div class="rent_area">
                        <div class="divi">
                            <select name="divis" id="sel_divi">
                        <option value=""> বিভাগ নির্বাচন করুন</option>

<?php include 'include/division.php';?>
 
</select>

                        </div>
                        <div id="dist">
                            <select name="dis" id="distr">
                            <option value=""> জেলা নির্বাচন করুন</option>
                       
                            </select>
                        </div>
                        <div id="area">
                            <select name="upaz" id="upaz">
                        <option value="volvo">এলাকা নির্বচন করুন</option>

                            
                            </select>

                        </div>
                    </div>

                </div>
            </div>
            <div id="adv_con">
                <div class="adv_publish adv_cont">
                    <span class="prop_headi" id="pro_de">ভাড়া বিবরণ দিন ও বিজ্ঞাপন প্রচার করুন</span>
                    <div class="pub_adv_wrapper">
                        <div class="adv_head"><span>বিজ্ঞাপন শিরোনাম:</span>
                            <input type="text" name="adv_head" id="adv_head" placeholder="বিজ্ঞাপনের শিরোনাম লিখুন">


                        </div>
                        <div class="adv_price">
                            <span>ভাড়া মূল্য:</span>
                            <input type="text" name="adv_price" id="adv_price" placeholder="ভাড়া মূল্য লিখুন">
                        </div>



                        <div class="file-upload">
                            <label for="upload" class="file-upload__label">ছবি যোগ করুন (সর্বোচ্চ ৫ টি)</label>
                            <input id="multiple_files" class="file-upload__input" type="file" name="file-upload" multiple>
                        </div>
                        <div id="sortable">
                            <ul>

                            </ul>
                        </div>


                        <div class="adv_det">
                            <span>বিজ্ঞাপন বিবরণ:</span>
                            <textarea name="adv_det" id="adv_det" cols="40" rows="10" placeholder="বিজ্ঞাপনের বিবরণ লিখুন"></textarea>


                        </div>
                        <div class="about_me">
                            <div class="my_name"><span>আপনার নাম:</span><br>Km Habib</div>
                            <div class="my_mobile"><span>মোবাইল নাম্বার</span><br>01815667719</div>
                            <div class="my_email"><span>ইমেইল </span><br>km.habibs@gmail.com</div>
                        </div>
                    </div>
                    <button id="adv_sub">বিজ্ঞাপন প্রচার করুন</button>
                    <div id="adv_dem"></div>
                    <div id="adv_demo">


                    </div>
                    <div id="error_multiple_files">

                    </div>
                    <!--                        <input type="submit" data-theme="b" class="pub_ad" value="বিজ্ঞাপন প্রচার করুন">-->
                </div>

            </div>

            <!--            </form>-->
            <div id="disi"></div>
        </div>

    </div>






    <!--

    লেখাটা একটু বড়,আশাকরি পড়ার সময় হবে.... You know, যখন তুমি চলে গিয়েছিল কেমন জানি হয়ে গিয়েছিলাম, রাস্তায় রাস্তায় হাঠতাম। তোমার মত বোরকা পরা কাউকে দেখে বড়পায়ে হেটে যেতাম, হতাশ হয়ে আবার ফিরে আসতাম। মনে হচ্ছিল সব শেষ। কখনো খোলা আকাশে খন্ড মেঘে তোমার চেহেরা খুজেঁ বেড়াতাম আবার কখনো মাঠির দিকে তাকিয়ে আগের কাটানো সময় গুলো মনে করতাম। অফিসে গিয়ে তুমি যেখানে বসতে সেখানে তাকিয়ে থাকতাম,আবার কখনো দরজার দিকে তাকিয়ে মনে হতো এই তুমি দৌড়ে আসছো। ক্লাসরুমে বার বার ফিরে তাকাতাম, মনে হতো এই তুমি এসে বসে আছো। সব সময় ইচ্ছে করত একটি বার দেখে আসি। সেই নয় নাম্বার গলি। কখনো সাহস হয়নি তা করার।দিন যায় রাত যায়, তোমাকে দেখার আকুলতা কুড়ে খাচ্ছিলো যা বলে বুঝার ভাষা নেই, যেখানে তোমাকে একটিবার দেখার আশায় নির্ঘুম রাত কেটে সকালে সমুদ্র সৈকতে যাওয়া, জানা ছিলোনা এ দেখা হবে তোমাকে নিয়ে ভবিষ্যত পাড়ি দেওয়ার সপ্নে শেষ দেখা। একবছর আগের সেই নিজেকে ভাবলে কিছুটা অপরিপক্বই মনে হয়। আমাদের মাঝে ছিলো বয়সে ১০ বছর আর আর্থিক সামর্থের পার্থক্য। যখন তোমাকে প্রথম দেখি তখন মনে হয়েছিলো আমার মত ফ্যামিলিরই একজন। এর পর কথা বলা আর তোমার সরলতায় ভরা হাসি আর সুন্দর ঐ মনের মাঝে হারিয়ে তোমাকে ভিন্নভাবে আবিষ্কার করা। আমার বড় আপু ছোট আপু দুজনেরি বিয়ে হয়েছিলো এই বয়স পার্থক্যে আর যখন তুমি বললে 'age doesn't matter' তখন থেকে ধিরে ধিরে কথা বলার সময় আপন ভাবা আর তা থেকে সামনে একসাথে হাটার কথা বলা । তার কিছুদিন পর তোমার সম্পর্কে তোমার কাছ থেকে অনেক কিছু জানতে পারি। ততক্ষণে তোমাকে যতটা আপন ভাবার ততটুকু ভাবা হয়ে গিয়েছে। তোমাকে ছেড়ে দেওয়ার মত অত সাহস আমার ছিলো না। আত্মবিশ্বাস ছিলো, পরিশ্রমের সাথে কাজ করলে দুই বছরের মধ্যে তোমার বাবার কাছে প্রস্তাব নিয়ে যাওয়ার মত সামর্থ্য হবে।..... সামর্থ্য হচ্ছে বটে কিন্তু তুমি অনেক দূরে। এখন আমি বিশ্বের সবচেয়ে বড় কোম্পানির সার্টিফায়েট ডাটা বিজ্ঞানী আর চট্টগ্রামের একমাত্র। পরিচিতদের মধ্যে জীবনে যারা কখনো কথা বলেনি তারাও ফোন আর টেক্সট করে উইশ করল। আর এ সবের পেছনে যার অনুপ্রেরণায় সবথেকে বেশি, সে হলো....। চাইলে ৩ লক্ষ টাকা বেতনের জব দিয়ে ক্যারিয়ার শুরু করতে পারি। কিন্তু সপ্ন পুরণে হাল না ছাড়ার সাহসটা দিন দিন বড়ই হচ্ছে । এতটুকু আমার জন্য একসময় আকাশের তারার মত ছিলো। যাক সামান্য মানুষ আমি। যখনি দেখছি তোমাকে নিয়ে আমার ভাবানা তোমাকে কষ্ট দিচ্ছে তখন নিজেকেও বুঝিয়ে নিলাম। তোমাকে নিয়ে এখন আর ভাবি না। কাজের মাঝে ডুবে থাকি।আর অবসর সময়টা নিজের জন্য ব্যায় করি। তোমার প্রোফাইল ঘুরে ঘুমাতে যাওয়ার মত পুরোনো কিছু অভ্যাস হয়তো যেতে কিছুটা সময় লাগবে। তাই ব্লক করো না। এখন আর আগের মত আইডি খোলা যায়না। ভালো বাবার মেয়ে তুমি। আশা করি লড়াই করে হলেও নিজের সপ্নগুলো পূরন করতে পারবে।একটা কথা, নিজেকে খুজে পাওয়ার সব থেকে ভালো মাধ্যম হলো 'নামাজ'। নামাজ ও মসজিদ গত একবছরে আমার অনেক কিছু পরিবর্তন করেছে। তোমার ভবিষ্যত পথচলা আরো সুন্দর আর হাস্যজ্জোল হবে এ আশা রাখি। শুভকামনা- আল্লাহ হাফেজ।
-->
    <!--
<option value="1">ফ্ল্যাট/ অ্যাপার্টমেন্ট</option>
<option value="2">বাসা</option>
<option value="3">রুম</option>
<option value="4">বাড়ি</option>
<option value="5">সিএনজি</option>
<option value="6">কার</option>
<option value="7">বাস</option>
<option value="8">ট্রাক</option>
<option value="9">ব্যাংক/বীমা</option>
<option value="10">শোরুম</option>
<option value="11">দোকান</option>
<option value="12">গ্যারেজ</option>
-->

    <script src="assets/js/inde.js" async></script>


    <script>
        //        var sharee = $(".share-buttons").html();
        //
        //        console.log(sharee);
        $(".single_post").on("click", function() {


            $(".post_de").remove().slideToggle(500);
            $(this).after("<div class='post_de'></div>");
            var har = $(this).data('advid');

            var post_head = $(this).find(".post_heading").text();

            var postImage = $(this).find(".post_image img").attr('src');

            var har = $(this).data('advid');

            $(".single_post").css({
                opacity: "none"
            });
            $(this).slideUp(500);

            $.post('http://localhost/bhara/core/ajax/postAllFetch.php', {
                har: har
            }, function(data) {

                $(".json_store").html(data);
                var jsn = $(".json_store").text();

                var jsonn = JSON.parse(jsn);


                var imgJson = JSON.parse(jsonn[0].img);
                var first_img = imgJson[0].imageName;
                //                console.log(imgJson[0].imageName);




                //                $(".big-img").attr("src", "files/" + first_img + "");
                $(".big-img").attr("src", postImage);

                $(".store_img").html(jsonn[0].img);
                $("#step").val(imgJson.length);
                $(".det_add").html(jsonn[0].address2);
                $(".det_ps").html(jsonn[0].address1);
                $(".det_dis").html(jsonn[0].address);
                if (jsonn[0].category == '1' || '2' || '3' || '4') {

                    (jsonn[0].feat_1 != '') ? $(".det_feat_1").html("বেড:" + jsonn[0].feat_1 + " "): '';
                    (jsonn[0].feat_2 != '') ? $(".det_feat_2").html("বাথ:" + jsonn[0].feat_2 + " "): '';
                    (jsonn[0].feat_3 != '') ? $(".det_feat_3").html("আয়তন:" + jsonn[0].feat_3 + " "): '';

                } else if (jsonn[0].category == '5' || '6' || '7' || '8') {
                    $(".det_feat_1").html("বেড:" + jsonn[0].feat_1 + " ");

                } else {
                    $(".det_feat_1").html("বেড:" + jsonn[0].feat_1 + " ");
                    $(".det_feat_2").html("বাথ:" + jsonn[0].feat_2 + " ");

                }

                $(".det_img_cent").html("ভাড়া মূল্য:" + jsonn[0].price + "");
                $(".det_s_mo").html("+880" + jsonn[0].mobile + "");
                $(".det_user").html("বিজ্ঞাপন দাতা:" + jsonn[0].username + "");
                $(".det_details").html(jsonn[0].details);


                var imgText = jsonn[0].img;
                var imgParseText = JSON.parse(imgText);
                var mana = imgParseText.length;
                var taskList = document.querySelector('.featured-image-list');
                for (var key in imgParseText) {
                    var html = "<div class='single-fi left'><img src='files/" + imgParseText[key].imageName + "' alt='Grand Beach Resort Cox's Bazar' style='opacity: 1;'></div>";
                    taskList.innerHTML += html;
                }
                $("#next-img").click(function(e) {
                    e.preventDefault();
                    step = $("#step").val();
                    imgs = $(".single-fi").length;
                    if (step == imgs) {
                        step = 0;
                    }
                    var imgNum = parseInt(step) + 1;
                    $("#step").val(imgNum);
                    imgSrc = $(".single-fi:nth-child(" + imgNum + ") img").attr('src');
                    $(".single-fi img").css('opacity', '1');
                    $(".single-fi:nth-child(" + imgNum + ") img").css('opacity', '0.5');
                    $(".big-img").attr('src', imgSrc);
                });
                $("#prev-img").click(function(e) {
                    e.preventDefault();
                    step = $("#step").val();
                    imgs = $(".single-fi").length;
                    if (step == 1) {
                        step = mana + 1;
                    }
                    var imgNum = parseInt(step) - 1;
                    $("#step").val(imgNum);
                    imgSrc = $(".single-fi:nth-child(" + imgNum + ") img").attr('src');
                    $(".single-fi img").css('opacity', '1');
                    $(".single-fi:nth-child(" + imgNum + ") img").css('opacity', '0.5');
                    $(".big-img").attr('src', imgSrc);
                });
                $(".single-fi").click(function() {
                    var elem = $(this);
                    $("#step").val($(".single-fi").index(elem) + 1);
                    imgSrc = $(this).find("img").attr('src');
                    $(".single-fi img").css('opacity', '1');
                    $(this).find("img").css('opacity', '0.5');
                    $(".big-img").attr('src', imgSrc);
                });
                $(".big-img").on("swipe", function(e) {
                    e.preventDefault();
                    step = $("#step").val();
                    imgs = $(".single-fi").length;
                    if (step == imgs) {
                        step = 0;
                    }
                    var imgNum = parseInt(step) + 1;
                    $("#step").val(imgNum);
                    imgSrc = $(".single-fi:nth-child(" + imgNum + ") img").attr('src');
                    $(".single-fi img").css('opacity', '1');
                    $(".single-fi:nth-child(" + imgNum + ") img").css('opacity', '0.5');
                    $(".big-img").attr('src', imgSrc);
                });







            });






            $(".post_de").html("<div class='fullScr'><div class='det_post'> <div class='header_wrapper' style='    width: 100%; position:fixed; z-index:9; height: 2.986rem;'><div class='logo'><div class='back_arrow' style='font-size:42px; text-shadow:none; color:white;'><img src='https://img.icons8.com/metro/50/ffffff/undo.png'></div><a href='http://bhara.com' style='display:none;'><img src='assets/img/logo.svg' alt=''></a></div><a style='text-decoration:none;' href='http://bhara.com'><div class='brandName' style='margin-top: 0.482rem;'>ভাড়া.কম</div></a><a href='#adv' style='display:none;'><div class='post_adv'>Post Adv</div></a><div class='account_icon' style='    visibility: hidden;'><img src='assets/img/account.svg' alt=''></div></div><div class='ad_heading'style='margin-top: 3.8rem;'>" + post_head + "</div>  <div class='img_det_cont'><div class='store_img' style='display:none;'></div><input type='hidden' id='step' value=''><div class='featured-image-preview'><img src='' class='big-img'><button id='next-img'><div class='next_pic' >❯</div></button><button id='prev-img'><div class='prev_pic'>❮</div></button></div><div class='featured-image-list'></div></div><div class='det_area' style='display:flex;'><div class='det_add' style='margin-left:10px;'> ,</div><div class='det_ps' style='margin-left:10px;'> ,</div><div class='det_dis' style='margin-left:10px;'></div></div> <div class='det_feat' style='display:flex;'><div class='det_feat_1' style='margin-left:10px;'></div><div class='det_feat_2' style='margin-left:10px;'></div><div class='det_feat_3' style='margin-left:10px;'></div><div class='det_feat_4' style='margin-left:10px;'></div></div><div class='det_img_cont'><div class='det_img_cent'></div></div><div class='part_div' style='margin-bottom:1.2rem;'></div><div class='det_cont_wrap' style='background-color: #158a8f17; width: 100%;'><div class='det_contact'><div class='det_mob'><div class='mob_sym'> ☎</div><div class='det_s_mo'></div><div class='det_s_tex'>ফোন নাম্বার দেখতে ক্লিক করুন</div></div></div><div class='det_chat_wr'><div class='det_chat'> &#128172;</div><div class='det_chat_tex'>চ্যাট</div></div><div class='det_mob'><div class='mob_sym'> <img src='../../assets/img/userIcon.svg' alt=' style='color: white;width: 32px;opacity: 0.5;'></div><div class='det_user' style='font-size:0.81rem;'></div></div></div><br><div class='part_div'></div><span style='margin-right: auto;margin-left: 1rem;color: black;font-size: 0.9rem;margin-top: 0.694rem;margin-bottom: 0.694rem;'>বর্ণনা:</span><div class='det_details' style='padding: 0px 1rem;color: black;margin-bottom: 2rem;font-size: 0.8rem;'></div><span style='margin-right: auto;margin-left: 1rem;color: black;font-size: 0.9rem;margin-top: 0.694rem;'> বিজ্ঞাপনটি শেয়ার করুন: </span><div class='adv_shb'></div><span style='    margin-right: auto;margin-left: 1rem;color: black;font-size: 0.9rem;margin-top: 0.694rem;margin-bottom: 0.694rem;'>অনুরূপ বিজ্ঞাপন:</span><span class='rel_adv'></span><div class = 'json_store' style = 'display:none;'></div ></div></div>");
            var shareButton = '';

            $.post('http://localhost/bhara/core/ajax/postAllFetch.php', {
                shareButton: shareButton
            }, function(data) {
                $('.adv_shb').html(data);

            });
            $.post('http://localhost/bhara/core/ajax/postAllFetch.php', {
                rel_adv: har
            }, function(data) {
                $('.rel_adv').html(data);

            });

            $(".back_arrow").on("click", function() {
                //                  window.history.back();
                $(".fullScr").remove();
                $(".single_post").show();
            });
            $(".det_mob").on("click", function() {
                $(".det_s_tex").hide();
                $(".det_s_mo").show();


            });

        });
        $(".back_arrow").on("click", function() {
            //                  window.history.back();
            $(".fullScr").remove();
            $(".single_post").show();
        });



        $(".single_postt").on("click", function() {
            $(".post_de").remove().slideToggle(500);
            $(this).after("<div class='post_de'></div>");
            var har = $(this).data('advid');

            //          $(this).css({
            //              display: "none"
            //          });
            //          $(".single_post").css({
            //              display: "none"
            //          });\
            $(".single_post").css({
                opacity: "none"
            });
            $(this).slideUp(500);
            //          alert(har);

            $.post('http://localhost/bhara/core/ajax/postDetails.php', {
                har: har
            }, function(data) {

                $(".post_de").html(data);




                var imgText = $(".store_img").text();
                var imgParseText = JSON.parse(imgText);
                var mana = imgParseText.length;
                var taskList = document.querySelector('.featured-image-list');
                for (var key in imgParseText) {
                    var html = "<div class='single-fi left'><img src='files/" + imgParseText[key].imageName + "' alt='Grand Beach Resort Cox's Bazar' style='opacity: 1;'></div>";
                    taskList.innerHTML += html;
                }
                $("#next-img").click(function(e) {
                    e.preventDefault();
                    step = $("#step").val();
                    imgs = $(".single-fi").length;
                    if (step == imgs) {
                        step = 0;
                    }
                    var imgNum = parseInt(step) + 1;
                    $("#step").val(imgNum);
                    imgSrc = $(".single-fi:nth-child(" + imgNum + ") img").attr('src');
                    $(".single-fi img").css('opacity', '1');
                    $(".single-fi:nth-child(" + imgNum + ") img").css('opacity', '0.5');
                    $(".big-img").attr('src', imgSrc);
                });
                $("#prev-img").click(function(e) {
                    e.preventDefault();
                    step = $("#step").val();
                    imgs = $(".single-fi").length;
                    if (step == 1) {
                        step = mana + 1;
                    }
                    var imgNum = parseInt(step) - 1;
                    $("#step").val(imgNum);
                    imgSrc = $(".single-fi:nth-child(" + imgNum + ") img").attr('src');
                    $(".single-fi img").css('opacity', '1');
                    $(".single-fi:nth-child(" + imgNum + ") img").css('opacity', '0.5');
                    $(".big-img").attr('src', imgSrc);
                });
                $(".single-fi").click(function() {
                    var elem = $(this);
                    $("#step").val($(".single-fi").index(elem) + 1);
                    imgSrc = $(this).find("img").attr('src');
                    $(".single-fi img").css('opacity', '1');
                    $(this).find("img").css('opacity', '0.5');
                    $(".big-img").attr('src', imgSrc);
                });
                $(".big-img").on("swipe", function(e) {
                    e.preventDefault();
                    step = $("#step").val();
                    imgs = $(".single-fi").length;
                    if (step == imgs) {
                        step = 0;
                    }
                    var imgNum = parseInt(step) + 1;
                    $("#step").val(imgNum);
                    imgSrc = $(".single-fi:nth-child(" + imgNum + ") img").attr('src');
                    $(".single-fi img").css('opacity', '1');
                    $(".single-fi:nth-child(" + imgNum + ") img").css('opacity', '0.5');
                    $(".big-img").attr('src', imgSrc);
                });

                var jsonDat = $(".json_data").text();
                console.log(jsonDat);


                $("button.go_back_but").on("click", function() {
                    $(".det_post").remove();
                    $(".post_de").remove();
                    $(".post").css({
                        display: "block"
                    });
                });









                //            for (var key in imgParseText) {
                //                console.log(key, imgParseText[key].imageName);

                //                slideImage.innerHTML += '<img src="http://localhost/bhara/files/' + imgParseText[key].imageName + '" style="height:300px; width:300px;">'
                //                slideImage.setAttribute("src", 'http://localhost/bhara/files/' + imgParseText["1"].imageName + '');
                //            }

                $(".back_arrow").on("click", function() {
                    //                  window.history.back();
                    $(".fullScr").remove();
                    $(".single_post").show();
                });


                $("button.go_back_but").on("click", function() {
                    $(".det_post").remove();
                    $(".single_post").show();

                });


                $(".det_mob").on("click", function() {
                    $(".det_s_tex").hide();
                    $(".det_s_mo").show();


                });

                $(".det_email").on("click", function() {
                    $(".det_s_emtex").hide();
                    $(".det_s_em").show();



                });
            });


            //          $(".single_post").fadeOut(100);
        });

    </script>

</body>

</html>
