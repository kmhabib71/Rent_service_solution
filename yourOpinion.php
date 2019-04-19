<!-- screen size samsung 320px/360px iphone 414px ipad 768px laptop 1224px large screen 1824-->
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
$catID = '';
if(isset($_GET['cat'])){
    $catID = $_GET['cat'];
   
}
if(isset($_POST['opeSub'])){
    $opeSub = $getFromPo->checkInput($_POST['opeSub']);
    $opeEmail = $getFromPo->checkInput($_POST['opeEmail']);
    $bharaOpenion = $getFromPo->checkInput($_POST['bharaOpenion']);
    if($bharaOpenion != ''){
         $getFromPo->create('opinion', array('opSub' => $opeSub, 'opDetails' => $bharaOpenion, 'dateTime' => date('Y-m-d H:i:s'), 'userid' => $userid,'usermail' => $opeEmail ));
        echo ' ধন্যবাদ আপনার মতামতের জন্য।'; 
    }else{
       echo 'আপনার মতামতটি লিখুন'; 
    }
   
}
//$allMsgNot = $getFromM->allMsgNotif($userid);
$indAllMsg = $getFromM->indiMsgGroup($userid);   
$i=0;
    foreach($indAllMsg as $msg){
$advIndMsg = $getFromM->advIndMsg($msg->messageFrom,$userid);
        foreach($advIndMsg as $msgCount)
 $i++;
    }

//You have to build your confidence that whole world would nothing to do with your face.
//Sabse suno apni karo
//Smart boy falls with talent rather than having good looks but less confident.


//girls.. be like sara ali khan.



?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>ভাড়া.বাংলা</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="assets/css/materialize.min.css">
    <link rel="stylesheet" href="assets/css/jquery_mobile.min.css">
    <script src="assets/js/jquery.js"></script>
    <script src="assets/js/jquery_mobile.min.js"></script>
    <link rel="stylesheet" href="assets/css/mobileCustomSmall.css" media="screen and (max-width: 329px)">

    <link rel="stylesheet" href="assets/css/mobileCustom.css" media="screen and (min-width: 330px) and (max-width: 767px)">

    <link rel="stylesheet" href="assets/css/desktop.css" media="screen and (min-width: 768px) and (max-width : 1224px)">

    <link rel="stylesheet" href="assets/css/desktopLarge.css" media="screen and (min-width : 1225px) and (max-width : 1824px)">



    <style>
        a.ui-collapsible-heading-toggle.ui-btn.ui-btn-icon-left.ui-btn-e.ui-icon-plus {
            background-color: white;
            border: none;
            box-shadow: none;
        }
        
        a.ui-collapsible-heading-toggle.ui-btn.ui-btn-icon-left.ui-btn-e.ui-icon-minus {
            box-shadow: none;
        }
        
        .mainCatArea {
            padding: 0.482rem 0rem;
            font-size: 1rem;
            border-bottom: 1px solid white;
            text-align: left;
        }
        
        .cat:hover {
            /*            border: 1px solid white;*/
            /*            display: inline-block;*/
            padding: 0.233rem;
            /*            font-size: 1rem;*/
            box-shadow: 1px 1px 5px white;
            transition: padding 0.3s ease-out;
        }
        
        .cat:active {
            /*            border: 1px solid white;*/
            /*            display: inline-block;*/
            padding: 0.233rem;
            /*            font-size: 1rem;*/
            box-shadow: 1px 1px 5px white;
            transition: padding 0.3s ease-out;
        }
        
        .catImg {
            vertical-align: middle;
            margin-right: 0.455rem;
        }

    </style>

</head>


<body>


    <div data-role="page" id="homepage" style=" background: #ebdaa6;">
        <!--
        <div class="action" style="position:relative;">
            <div class="actionIcon" style="position: absolute;right: 10%;height: 3rem;width: 3rem;background: #ffdd75;;font-size: 2rem;z-index: 9;border-radius: 50%;display: flex;justify-content: center;align-items: center;top: 81vh;box-shadow: 1px 1px 5px #000000bf;text-shadow: none;font-weight: 300;">+</div>
            <ul style="position: absolute;right: 1%;z-index: 9;display:flex-direction: column;justify-content: center;align-items: center;top: 64.5vh;text-shadow: none;font-weight: 300;padding: 5px;border-radius: 5px;">

                <li class="acBut">বুকিং</li>
                <li class="acBut">বিজ্ঞাপন প্রচার</li>
                <li class="acBut">ফোন কল</li>

            </ul>
        </div>
-->

        <div data-role="panel" id="myPanel1" data-display="overlay" data-position="left" style="background: #29af7d;">
            <!--            <h2>Menu Details</h2>-->
            <ul style="color:#158a8f;">
                <li>

                    <div class="pro_container">
                        <a href="editProfile.php" class="panel_link_style">
                            <div class="pro_pic"><img src="<?php
                                    if($userid != ''){
                                    echo $userInfo->profileImage; }else{
                                        echo 'assets/images/defaultProfileImage.png';
                                    } ?>" alt="">
                            </div>
                        </a>
                        <div class="pro_details">
                            <div class="pro_name">
                                <?php if($userid != ''){ echo $userInfo->username; }else{echo'Your Name';} ?>
                            </div>
                            <div class="pro_mob">
                                <?php if($userid != ''){ echo $userInfo->mobile; }else{echo 'Your mobile'; }  ?>
                            </div>

                        </div>

                        <div class="notiFicIcon" style="margin-left:2rem; position:relative; visibility:hidden;">
                            <div class="notiCount" style="    position: absolute;display: flex;background-color: blueviolet;border-radius: 50%;height: 25px;width: 25px;justify-content: center;box-shadow: 1px 1px 5px #427060;align-items: center; display:none;">0</div>

                            <img src="https://img.icons8.com/ios/50/000000/appointment-reminders.png" style="height:40px; width:40px;">
                            <!--                                <img src="https://img.icons8.com/ios/50/000000/speech-bubble.png" style="height:40px; width:40px;right: 0;">-->
                        </div>
                        <div class="msgNotificIcon" style="margin-left:0.482rem; position:relative;" data-userid="<?php echo $userid; ?>">
                            <div class="notiCount" style="    position: absolute;display: flex;background-color: blueviolet;border-radius: 50%;height: 25px;width: 25px;justify-content: center;box-shadow: 1px 1px 5px #427060;align-items: center;color: white;text-shadow: none;">
                                <?php echo $i; ?>
                            </div>


                            <img src="https://img.icons8.com/ios/50/000000/speech-bubble.png" style="height:40px; width:40px;right: 0;">
                        </div>


                    </div>
                    <div class="notiChat" style="height: auto;padding: 5px;background-color: white;color: #000000b8; display:none;">

                    </div>

                </li>
                <li class="pro_li">
                    <a href="" class="panel_link_style"><span class="pro_icon"><img src="assets/img/icons8-sorting-36.png" alt="" style="vertical-align:middle;"></span>ক্যাটাগরি</a>
                    <div class="cat_det">
                        <h6 class="mainCatArea">বাসা</h6>
                        <a href="homeCat.php?cat=3" data-ajax="false">
                            <div class="cat"><img src="assets/img/icons8-room-27.png" alt="" class="catImg">রুম/সিট</div>
                        </a>

                        <a href="homeCat.php?cat=2" data-ajax="false">
                            <div class="cat"><img src="assets/img/icons8-interior-27.png" alt="" class="catImg">বাসা</div>
                        </a>
                        <a href="homeCat.php?cat=1" data-ajax="false">
                            <div class="cat"><img src="assets/img/icons8-city-filled-27.png" alt="" class="catImg">ফ্ল্যাট/অ্যাপার্টমেন্ট</div>
                        </a>
                        <h6 class="mainCatArea">গাড়ি</h6>
                        <a href="vehCat.php" data-ajax="false">
                            <div class="cat"><img src="assets/img/icons8-car-filled-27.png" alt="" class="catImg">কার</div>
                        </a>

                        <div class="cat-arrow"></div>


                        <div class="cat_down">
                            <a href="vehCat.php?cat=7" data-ajax="false">
                                <div class="cat"><img src="assets/img/icons8-semi-truck-filled-27.png" alt="" class="catImg">ট্রাক</div>
                            </a>
                            <a href="vehCat.php?cat=8" data-ajax="false">
                                <div class="cat"><img src="assets/img/icons8-trolleybus-filled-27.png" alt="" class="catImg">বাস</div>
                            </a>
                            <a href="vehCat.php?cat=5" data-ajax="false">
                                <div class="cat"><img src="assets/img/icons8-bus-27.png" alt="" class="catImg">মাইক্রো</div>
                            </a>
                            <h6 class="mainCatArea">কমার্শিয়াল স্পেইস</h6>
                            <a href="comCat.php" data-ajax="false">
                                <div class="cat"><img src="assets/img/icons8-car-dealership-building-27.png" alt="" class="catImg">শোরুম</div>
                            </a>
                            <a href="comCat.php?cat=9" data-ajax="false">
                                <div class="cat"><img src="assets/img/icons8-museum-27.png" alt="" class="catImg">ব্যাংক/বীমা</div>
                            </a>
                            <a href="comCat.php?cat=19" data-ajax="false">
                                <div class="cat"><img src="assets/img/icons8-small-business-27.png" alt="" class="catImg">স্টোর</div>
                            </a>
                            <a href="comCat.php?cat=20" data-ajax="false">
                                <div class="cat"><img src="assets/img/icons8-manufacturing-27.png" alt="" class="catImg">ফ্যাক্টরি</div>
                            </a>
                            <a href="comCat.php?cat=21" data-ajax="false">
                                <div class="cat"><img src="assets/img/icons8-hotel-27.png" alt="" class="catImg">হোটেল</div>
                            </a>
                            <a href="comCat.php?cat=22" data-ajax="false">
                                <div class="cat"><img src="assets/img/icons8-organization-27.png" alt="" class="catImg">অফিস</div>
                            </a>
                            <a href="comCat.php?cat=23" data-ajax="false">
                                <div class="cat"><img src="assets/img/icons8-restaurant-table-27.png" alt="" class="catImg">রেস্ট্যুরেন্ট</div>
                            </a>
                            <a href="comCat.php?cat=11" data-ajax="false">
                                <div class="cat"><img src="assets/img/icons8-shop-27.png" alt="" class="catImg">দোকান</div>
                            </a>

                            <a href="othCat.php" data-ajax="false">
                                <div class="cat"><img src="assets/img/icons8-christmas-star-27.png" alt="" class="catImg">অন্যান্য</div>
                            </a>
                        </div>
                    </div>
                </li>
                <?php  if($userid == ''){ ?>
                <li class="pro_li"><a href="login/login.php" class="panel_link_style" data-ajax="false"><span class="pro_icon"><img src="assets/img/icons8-password-36.png" alt="" style="vertical-align:middle;"></span>লগিন করুন</a></li>
                <li class="pro_li">
                    <a href="login/signUp.php" data-ajax="false" class="panel_link_style"><span class="pro_icon"><img src="assets/img/icons8-add-user-male-36%20(1).png" alt="" style="vertical-align:middle;"></span>এ্যাকাউন্ট খুলুন</a>
                </li>
                <?php } ?>
                <li class="pro_li">
                    <a href="profile.php" data-ajax="false" class="panel_link_style"><span class="pro_icon"><img src="assets/img/icons8-name-tag-36.png" alt="" style="vertical-align:middle;"></span>প্রোফাইল</a>
                </li>

                <li class="pro_li">
                    <a href="rentAccount.php" class="panel_link_style" data-ajax="false"><span class="pro_icon"><img src="assets/img/icons8-estimate-36.png" alt="" style="vertical-align:middle;"></span>ভাড়া হিসাব</a>
                </li>
                <?php  if($userid != ''){ ?>
                <li class="pro_li">
                    <a href="logout.php" class="panel_link_style"><span class="pro_icon"><img src="assets/img/icons8-shutdown-36.png" alt="" style="vertical-align:middle;"></span>লগআউট</a>
                </li>
                <?php } ?>
                <li class="pro_li">
                    <a href="yourOpinion.php" class="panel_link_style" data-ajax="false"><span class="pro_icon"><img src="assets/img/icons8-elections-36.png" alt="" style="vertical-align:middle;"></span>অভিযোগ,মতামত</a>
                </li>
                <li class="pro_li">
                    <a href="aboutBharaCom.php" class="panel_link_style" data-ajax="false"><span class="pro_icon"><img src="assets/img/icons8-info-36.png" alt="" style="vertical-align:middle;"></span>ভাড়া.কম</a>
                </li>


                <li class="pro_li">
                    <a href="" class="panel_link_style"></a>
                </li>
                <li class="pro_li">
                    <a href="" class="panel_link_style"></a>
                </li>
            </ul>
        </div>

        <div data-role="header" style="background-color:aliceblue; " id="header">


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

            </div>
            <div class="header_down_part">
                <div class="main_category mob_view" style="">

                    <a href="#myPanel1">
                        <div class="nav_bar_click">
                            <img src="assets/img/nav-click-hori.svg" class="nav_hori" alt="" style="z-index:99;"><br>

                        </div>
                    </a>
                    <a href="homeCat.php" class="houseLocation" data-ajax="false" style="cursor:pointer;">
                        <div class="nav nav_home">
                            <img src="assets/img/home.png" alt="">

                        </div>
                    </a>


                    <a href="vehCat.php" class="vehLocation" data-ajax="false" style="cursor:pointer;">
                        <div class="nav nav_car">
                            <img src="assets/img/carNav.png" alt="">

                        </div>
                    </a>
                    <!--
                    <a href="vehCat.php" class="vehLocation" data-ajax="false" style="cursor:pointer;">
                        <div class="nav nav_car">
                            <img src="assets/img/truck3.png" alt="">
                        </div>
                    </a>
                    <a href="vehCat.php" class="vehLocation" data-ajax="false" style="cursor:pointer;">
                        <div class="nav nav_car">
                            <img src="assets/img/bus3.png" alt="">
                        </div>
                    </a>
-->
                    <a href="comCat.php" class="comLocation" data-ajax="false" style="cursor:pointer;">
                        <div class="nav nav_bank"><img src="assets/img/shop.png" alt="" style="margin-top: 2px;"></div>
                    </a>
                    <a href="conCat.php" data-ajax="false" style="cursor:pointer;">
                        <div class="nav nav_crane"><img src="assets/img/crane.png" alt=""></div>
                    </a>
                    <a href="perCat.php" data-ajax="false" style="cursor:pointer;">
                        <div class="nav nav_employee"><img src="assets/img/personel.png" alt=""></div>
                    </a>
                    <a href="comCat.php" data-ajax="false" style="cursor:pointer;">
                        <div class="nav nav_shop"><img src="assets/img/bank.png" style="height: 35px; width: 35px;" alt=""></div>
                    </a>




                    <!--
                    <div style="visibility:hidden;">
                        <a href="homeCat.php?cat=2" data-ajax="false" style="cursor:pointer;">
                            <div class="nav nav_carr">
                                <img src="assets/img/house-2.png" alt="" style="padding:0;">
                            </div>
                            <div class="rbf">বাসা</div>
                        </a>
                    </div>
-->
                    <!--
                    <a href="homeCat.php?cat=1" data-ajax="false" style="cursor:pointer;">
                        <div class="nav nav_carr">
                            <img src="assets/img/flat-2.png" alt="" style="padding:0;">
                        </div>
                        <div class="rbf">ফ্ল্যাট</div>
                    </a>
                    <a href="homeCat.php?cat=2" data-ajax="false" style="cursor:pointer;">
                        <div class="nav nav_carr">
                            <img src="assets/img/house-2.png" alt="" style="padding:0;">
                        </div>
                        <div class="rbf">বাসা</div>
                    </a>
                    <a href="homeCat.php?cat=1" data-ajax="false" style="cursor:pointer;">
                        <div class="nav nav_carr">
                            <img src="assets/img/flat-2.png" alt="" style="padding:0;">
                        </div>
                        <div class="rbf">ফ্ল্যাট</div>
                    </a>
-->

                </div>
                <div class="main_category desktop" style="">
                    <a href="#myPanel1" class="bigNav">
                        <div class="nav_bar_click">
                            <img src="assets/img/nav-click-hori.svg" class="nav_hori" alt="" style="z-index:99;">
                        </div>
                        <div class="notiCount" style="    position: absolute;display: flex;background-color: blueviolet;border-radius: 50%;height: 25px;width: 25px;justify-content: center;box-shadow: 1px 1px 5px #427060;align-items: center;color: white;text-shadow: none;font-weight: 300;margin-left: 22px;margin-top: 10px;z-index: 99;display: none;">5</div>
                    </a>
                    <a href="homeCat.php" class="houseLocation" data-ajax="false" style="cursor:pointer;">
                        <div class="nav nav_home">
                            <img src="assets/img/home.png" alt="">
                        </div>
                    </a>
                    <a href="vehCat.php" class="vehLocation" data-ajax="false" style="cursor:pointer;">
                        <div class="nav nav_car">
                            <img src="assets/img/carNav.png" alt="">
                        </div>
                    </a>
                    <a href="comCat.php" class="comLocation" data-ajax="false" style="cursor:pointer;">
                        <div class="nav nav_bank"><img src="assets/img/shop.png" alt="" style="margin-top: 2px;"></div>
                    </a>
                    <a href="conCat.php" data-ajax="false" style="cursor:pointer;">
                        <div class="nav nav_crane"><img src="assets/img/crane.png" alt=""></div>
                    </a>
                    <a href="perCat.php" data-ajax="false" style="cursor:pointer;">
                        <div class="nav nav_employee"><img src="assets/img/personel.png" alt=""></div>
                    </a>
                    <a href="comCat.php" data-ajax="false" style="cursor:pointer;">
                        <div class="nav nav_shop"><img src="assets/img/bank.png" style="height: 35px; width: 35px;" alt=""></div>
                    </a>




                    <!--
                    <div style="visibility:hidden;">
                        <a href="homeCat.php?cat=2" data-ajax="false" style="cursor:pointer;">
                            <div class="nav nav_carr">
                                <img src="assets/img/house-2.png" alt="" style="padding:0;">
                            </div>
                            <div class="rbf">বাসা</div>
                        </a>
                    </div>
-->
                    <!--
                    <a href="homeCat.php?cat=1" data-ajax="false" style="cursor:pointer;">
                        <div class="nav nav_carr">
                            <img src="assets/img/flat-2.png" alt="" style="padding:0;">
                        </div>
                        <div class="rbf">ফ্ল্যাট</div>
                    </a>
                    <a href="homeCat.php?cat=2" data-ajax="false" style="cursor:pointer;">
                        <div class="nav nav_carr">
                            <img src="assets/img/house-2.png" alt="" style="padding:0;">
                        </div>
                        <div class="rbf">বাসা</div>
                    </a>
                    <a href="homeCat.php?cat=1" data-ajax="false" style="cursor:pointer;">
                        <div class="nav nav_carr">
                            <img src="assets/img/flat-2.png" alt="" style="padding:0;">
                        </div>
                        <div class="rbf">ফ্ল্যাট</div>
                    </a>
-->

                </div>



                <div class="search_option" style="    display: flex;flex-direction: row;justify-content: flex-end;padding-right: 0.22rem;;    
<!--                    flex-basis: 65%;-->
                    ">
                    <div class="msgNotificIconn" style="margin-left: 0.482rem;position: relative;margin-right: 65px;cursor:pointer" data-userid="<?php echo $userid; ?>">
                        <div class="notiCount" style="    position: absolute;display: flex;background-color: blueviolet;border-radius: 50%;height: 25px;width: 25px;justify-content: center;box-shadow: 1px 1px 5px #427060;align-items: center;color: white;text-shadow: none;">
                            <?php echo $i; ?>
                        </div>


                        <img src="https://img.icons8.com/ios/50/000000/speech-bubble.png" style="height:40px; width:40px;right: 0;">
                        <div class="allChat" style="display:none;">

                        </div>
                    </div>
                    <a href="#" data-transition="slide" id="area_search">অবস্থান নির্বাচন </a>
                    <div class="ui-btn ui-icon-search ui-btn-icon-right ui-shadow ui-corner-all" id="post_search_subb" style="border: none;background: none;box-shadow: none; margin-top: 1px;"></div>


                </div>

            </div>

            <div class="search_rent" style="margin-top:0; display:none;">
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
                <div class="ui-btn ui-icon-search ui-btn-icon-right ui-shadow ui-corner-all" id="post_search_su" style="
    border: none;
    background: none;
    box-shadow: none;
    /* vertical-align: middle; */
    margin-left: -40px;
   margin-top: 1px;
">



                </div>


            </div>
            <div class="notiFicIcon" style="margin-left:0.482rem; position:relative; display:none;">
                <div class="notiCount" style="    position: absolute;display: flex;background-color: blueviolet;border-radius: 50%;height: 25px;width: 25px;justify-content: center;box-shadow: 1px 1px 5px #427060;align-items: center;color: white;text-shadow: none;font-weight: 300;">15</div>


                <img src="https://img.icons8.com/ios/50/000000/speech-bubble.png" style="height:40px; width:40px;right: 0;">
            </div>
        </div>
        <div data-role="collapsible-set" data-content-theme="c" class="locationShow" style=" margin-top: -12px;z-index: 99; background-color: aliceblue;
    padding-bottom: 0.694rem; display:none;">

            <div data-role="collapsible" data-theme="e" data-content-theme="d">
                <h6>ঢাকা</h6>
                <ul>

                    <li><a href="#" value="1" class="dis_design">ঢাকা</a></li>
                    <li><a href="#" value="2" class="dis_design">ফরিদপুর</a></li>
                    <li><a href="#" value="3" class="dis_design">গাজীপুর</a></li>
                    <li><a href="#" value="4" class="dis_design">গোপালগঞ্জ</a></li>
                    <li><a href="#" value="6" class="dis_design">কিশোরগঞ্জ</a></li>
                    <li><a href="#" value="7" class="dis_design">মাদারীপুর</a></li>
                    <li><a href="#" value="8" class="dis_design">মানিকগঞ্জ</a></li>
                    <li><a href="#" value="9" class="dis_design">মুন্সিগঞ্জ</a></li>
                    <li><a href="#" value="11" class="dis_design">নারায়াণগঞ্জ</a></li>
                    <li><a href="#" value="12" class="dis_design">নরসিংদী</a></li>
                    <li><a href="#" value="14" class="dis_design">রাজবাড়ি</a></li>
                    <li><a href="#" value="15" class="dis_design">শরীয়তপুর</a></li>
                    <li><a href="#" value="17" class="dis_design">টাঙ্গাইল</a></li>
                </ul>
            </div>
            <div data-role="collapsible" data-theme="e" data-content-theme="d">
                <h3>চট্টগ্রাম</h3>
                <ul>

                    <li><a href="#" value="40" class="dis_design">বান্দরবান</a></li>
                    <li><a href="#" value="41" class="dis_design">ব্রাহ্মণবাড়িয়া</a></li>
                    <li><a href="#" value="42" class="dis_design">চাঁদপুর</a></li>
                    <li><a href="#" value="43" class="dis_design">চট্টগ্রাম</a></li>
                    <li><a href="#" value="44" class="dis_design">কুমিল্লা</a></li>
                    <li><a href="#" value="45" class="dis_design">কক্স বাজার</a></li>
                    <li><a href="#" value="46" class="dis_design">ফেনী</a></li>
                    <li><a href="#" value="47" class="dis_design">খাগড়াছড়ি</a></li>
                    <li><a href="#" value="48" class="dis_design">লক্ষ্মীপুর</a></li>
                    <li><a href="#" value="49" class="dis_design">নোয়াখালী</a></li>
                    <li><a href="#" value="50" class="dis_design">রাঙ্গামাটি</a></li>
                </ul>
            </div>
            <div data-role="collapsible" data-theme="e" data-content-theme="d">
                <h3>সিলেট</h3>
                <ul>

                    <li><a href="#" value="51" class="dis_design">হবিগঞ্জ</a></li>
                    <li><a href="#" value="52" class="dis_design">মৌলভীবাজার</a></li>
                    <li><a href="#" value="53" class="dis_design">সুনামগঞ্জ</a></li>
                    <li><a href="#" value="54" class="dis_design">সিলেট</a></li>
                </ul>
            </div>
            <div data-role="collapsible" data-theme="e" data-content-theme="d">
                <h3>খুলনা</h3>
                <ul>

                    <li><a href="#" value="55" class="dis_design">বাগেরহাট</a></li>
                    <li><a href="#" value="56" class="dis_design">চুয়াডাঙ্গা</a></li>
                    <li><a href="#" value="57" class="dis_design">যশোর</a></li>
                    <li><a href="#" value="58" class="dis_design">ঝিনাইদহ</a></li>
                    <li><a href="#" value="59" class="dis_design">খুলনা</a></li>
                    <li><a href="#" value="60" class="dis_design">কুষ্টিয়া</a></li>
                    <li><a href="#" value="61" class="dis_design">মাগুরা</a></li>
                    <li><a href="#" value="62" class="dis_design">মেহেরপুর</a></li>
                    <li><a href="#" value="63" class="dis_design">নড়াইল</a></li>
                    <li><a href="#" value="64" class="dis_design">সাতক্ষীরা</a></li>
                </ul>
            </div>
            <div data-role="collapsible" data-theme="e" data-content-theme="d">
                <h3>রাজশাহি</h3>


                <ul>

                    <li><a href="#" value="18" class="dis_design">বগুড়া</a></li>
                    <li><a href="#" value="19" class="dis_design">জয়পুরহাট</a></li>
                    <li><a href="#" value="20" class="dis_design">নওগাঁ</a></li>
                    <li><a href="#" value="21" class="dis_design">নাটোর</a></li>
                    <li><a href="#" value="22" class="dis_design">নবাবগঞ্জ</a></li>
                    <li><a href="#" value="23" class="dis_design">পাবনা</a></li>
                    <li><a href="#" value="24" class="dis_design">রাজশাহী</a></li>
                    <li><a href="#" value="25" class="dis_design">সিরাজগঞ্জ</a></li>
                </ul>
            </div>
            <div data-role="collapsible" data-theme="e" data-content-theme="d">
                <h3>বরিশাল</h3>


                <ul>

                    <li><a href="#" value="34" class="dis_design">বরগুনা</a></li>
                    <li><a href="#" value="35" class="dis_design">বরিশাল</a></li>
                    <li><a href="#" value="36" class="dis_design">ভোলা</a></li>
                    <li><a href="#" value="37" class="dis_design">ঝালকাঠি</a></li>
                    <li><a href="#" value="38" class="dis_design">পটুয়াখালী</a></li>
                    <li><a href="#" value="39" class="dis_design">পিরোজপুর</a></li>
                </ul>
            </div>
            <div data-role="collapsible" data-theme="e" data-content-theme="d">
                <h3>রংপুর</h3>


                <ul>

                    <li><a href="#" value="26" class="dis_design">দিনাজপুর</a></li>
                    <li><a href="#" value="27" class="dis_design">গাইবান্ধা</a></li>
                    <li><a href="#" value="28" class="dis_design">কুড়িগ্রাম</a></li>
                    <li><a href="#" value="29" class="dis_design">লালমনিরহাট</a></li>
                    <li><a href="#" value="30" class="dis_design">নীলফামারী</a></li>
                    <li><a href="#" value="31" class="dis_design">পঞ্চগড়</a></li>
                    <li><a href="#" value="32" class="dis_design">রংপুর</a></li>
                    <li><a href="#" value="33" class="dis_design">ঠাকুরগাঁও</a></li>
                </ul>
            </div>

        </div>

        <div data-role="content" class="ui-content contentt" role="main">
            <!--        <div data-role="content" class="ui-content" role="main">-->
            <div class="post_det_container">

            </div>
            <div class="opHead" style="margin:1rem; font-size:0.694rem;"> আপনার মতামত বা অভিযোগটি বলুন। <br> আপনার মতামত বা অভিযোগ আমাদের কাছে গুরুত্বপূর্ণ।</div>
            <div class="mainWrap">
                <div class="connectWithUs">

                    <div class="opeForm" style="margin:1rem;">
                        <input type="text" style="font-size: 0.698rem; border-bottom:none;    height: 1rem;" name="opeSub" placeholder="বিষয় লিখুন" id="opeSub">
                        <textarea name="bharaOpenion" style="font-size: 0.698rem;    height:200px;" placeholder="মতামত বা অভিযোগটি লিখুন..." rows="20" id="bharaOpenion"></textarea>
                        <input type="text" style="font-size: 0.698rem; border-bottom:none;    height: 1rem;" name="opeEmail" placeholder=" আপনার ইমেইল লিখুন" id="opeEmail">

                        <div id="opeSubmit" style="display: flex;justify-content: center;align-items: center; padding: 0.482rem 0.694rem; border: 1px solid gray;background: #26a69a;border-radius: 5px;color: white;"> সাবমিট </div>

                        <div id="opeError" style="display:flex; justify-content:center; align-items:center; margin-top: 1rem;">

                        </div>
                    </div>
                </div>
                <div id="desktopMenu" style="background: #29af7d; margin-top:0;">
                    <!--            <h2>Menu Details</h2>-->
                    <div class="menuWrap" style=" margin:0.694rem;">
                        <ul style="color:#158a8f;">
                            <li>

                                <div class="pro_container">
                                    <a href="editProfile.php" class="panel_link_style">
                                        <div class="pro_pic"><img src="<?php
                                    if($userid != ''){
                                    echo $userInfo->profileImage; }else{
                                        echo 'assets/images/defaultProfileImage.png';
                                    } ?>" alt="">
                                        </div>
                                    </a>
                                    <div class="pro_details">
                                        <div class="pro_name">
                                            <?php if($userid != ''){ echo $userInfo->username; }else{echo'Your Name';} ?>
                                        </div>
                                        <div class="pro_mob">
                                            <?php if($userid != ''){ echo $userInfo->mobile; }else{echo 'Your mobile'; }  ?>
                                        </div>

                                    </div>

                                    <div class="notiFicIcon" style="margin-left:1rem; position:relative;">
                                        <div class="notiCountt" style="    position: absolute;display: flex;background-color: blueviolet;border-radius: 50%;height: 25px;width: 25px;justify-content: center;box-shadow: 1px 1px 5px #427060;align-items: center;display:none;">0</div>

                                        <img src="https://img.icons8.com/ios/50/000000/appointment-reminders.png" style="height:40px; width:40px;">
                                        <!--                                <img src="https://img.icons8.com/ios/50/000000/speech-bubble.png" style="height:40px; width:40px;right: 0;">-->
                                    </div>
                                    <div class="msgNotificIcon" style="margin-left:0.482rem; position:relative;display:none;" data-userid="<?php echo $userid; ?>">
                                        <div class="notiCount" style="    position: absolute;display: flex;background-color: blueviolet;border-radius: 50%;height: 25px;width: 25px;justify-content: center;box-shadow: 1px 1px 5px #427060;align-items: center;color: white;text-shadow: none;">
                                            <?php echo $i; ?>
                                        </div>


                                        <img src="https://img.icons8.com/ios/50/000000/speech-bubble.png" style="height:40px; width:40px;right: 0;">
                                    </div>


                                </div>
                                <div class="notiChat" style="height: auto;padding: 5px;background-color: white;color: #000000b8; display:none;">

                                </div>

                            </li>
                            <li class="pro_li">
                                <a href="" class="panel_link_style"><span class="pro_icon"><img src="assets/img/icons8-sorting-36.png" alt="" style="vertical-align:middle;"></span>ক্যাটাগরি</a>
                                <div class="cat_det" style="margin-left: 20%;">
                                    <h6 class="mainCatArea">বাসা</h6>
                                    <a href="homeCat.php?cat=3" data-ajax="false">
                                        <div class="cat"><img src="assets/img/icons8-room-27.png" alt="" class="catImg">রুম/সিট</div>
                                    </a>

                                    <a href="homeCat.php?cat=2" data-ajax="false">
                                        <div class="cat"><img src="assets/img/icons8-interior-27.png" alt="" class="catImg">বাসা</div>
                                    </a>
                                    <a href="homeCat.php?cat=1" data-ajax="false">
                                        <div class="cat"><img src="assets/img/icons8-city-filled-27.png" alt="" class="catImg">ফ্ল্যাট/অ্যাপার্টমেন্ট</div>
                                    </a>
                                    <h6 class="mainCatArea">গাড়ি</h6>
                                    <a href="vehCat.php" data-ajax="false">
                                        <div class="cat"><img src="assets/img/icons8-car-filled-27.png" alt="" class="catImg">কার</div>
                                    </a>

                                    <div class="cat-arrow"></div>


                                    <div class="cat_down">
                                        <a href="vehCat.php?cat=7" data-ajax="false">
                                            <div class="cat"><img src="assets/img/icons8-semi-truck-filled-27.png" alt="" class="catImg">ট্রাক</div>
                                        </a>
                                        <a href="vehCat.php?cat=8" data-ajax="false">
                                            <div class="cat"><img src="assets/img/icons8-trolleybus-filled-27.png" alt="" class="catImg">বাস</div>
                                        </a>
                                        <a href="vehCat.php?cat=5" data-ajax="false">
                                            <div class="cat"><img src="assets/img/icons8-bus-27.png" alt="" class="catImg">মাইক্রো</div>
                                        </a>
                                        <h6 class="mainCatArea">কমার্শিয়াল স্পেইস</h6>
                                        <a href="comCat.php" data-ajax="false">
                                            <div class="cat"><img src="assets/img/icons8-car-dealership-building-27.png" alt="" class="catImg">শোরুম</div>
                                        </a>
                                        <a href="comCat.php?cat=9" data-ajax="false">
                                            <div class="cat"><img src="assets/img/icons8-museum-27.png" alt="" class="catImg">ব্যাংক/বীমা</div>
                                        </a>
                                        <a href="comCat.php?cat=19" data-ajax="false">
                                            <div class="cat"><img src="assets/img/icons8-small-business-27.png" alt="" class="catImg">স্টোর</div>
                                        </a>
                                        <a href="comCat.php?cat=20" data-ajax="false">
                                            <div class="cat"><img src="assets/img/icons8-manufacturing-27.png" alt="" class="catImg">ফ্যাক্টরি</div>
                                        </a>
                                        <a href="comCat.php?cat=21" data-ajax="false">
                                            <div class="cat"><img src="assets/img/icons8-hotel-27.png" alt="" class="catImg">হোটেল</div>
                                        </a>
                                        <a href="comCat.php?cat=22" data-ajax="false">
                                            <div class="cat"><img src="assets/img/icons8-organization-27.png" alt="" class="catImg">অফিস</div>
                                        </a>
                                        <a href="comCat.php?cat=23" data-ajax="false">
                                            <div class="cat"><img src="assets/img/icons8-restaurant-table-27.png" alt="" class="catImg">রেস্ট্যুরেন্ট</div>
                                        </a>
                                        <a href="comCat.php?cat=11" data-ajax="false">
                                            <div class="cat"><img src="assets/img/icons8-shop-27.png" alt="" class="catImg">দোকান</div>
                                        </a>

                                        <a href="othCat.php" data-ajax="false">
                                            <div class="cat"><img src="assets/img/icons8-christmas-star-27.png" alt="" class="catImg">অন্যান্য</div>
                                        </a>
                                    </div>
                                </div>
                            </li>
                            <?php  if($userid == ''){ ?>
                            <li class="pro_li"><a href="login/login.php" class="panel_link_style" data-ajax="false"><span class="pro_icon"><img src="assets/img/icons8-password-36.png" alt="" style="vertical-align:middle;"></span>লগিন করুন</a></li>
                            <li class="pro_li">
                                <a href="login/signUp.php" data-ajax="false" class="panel_link_style"><span class="pro_icon"><img src="assets/img/icons8-add-user-male-36%20(1).png" alt="" style="vertical-align:middle;"></span>এ্যাকাউন্ট খুলুন</a>
                            </li>
                            <?php } ?>
                            <li class="pro_li">
                                <a href="profile.php" data-ajax="false" class="panel_link_style"><span class="pro_icon"><img src="assets/img/icons8-name-tag-36.png" alt="" style="vertical-align:middle;"></span>প্রোফাইল</a>
                            </li>

                            <li class="pro_li">
                                <a href="rentAccount.php" class="panel_link_style" data-ajax="false"><span class="pro_icon"><img src="assets/img/icons8-estimate-36.png" alt="" style="vertical-align:middle;"></span>ভাড়া হিসাব</a>
                            </li>
                            <?php  if($userid != ''){ ?>
                            <li class="pro_li">
                                <a href="logout.php" class="panel_link_style"><span class="pro_icon"><img src="assets/img/icons8-shutdown-36.png" alt="" style="vertical-align:middle;"></span>লগআউট</a>
                            </li>
                            <?php } ?>
                            <li class="pro_li">
                                <a href="yourOpinion.php" class="panel_link_style" data-ajax="false"><span class="pro_icon"><img src="assets/img/icons8-elections-36.png" alt="" style="vertical-align:middle;"></span>অভিযোগ,মতামত</a>
                            </li>
                            <li class="pro_li">
                                <a href="aboutBharaCom.php" class="panel_link_style" data-ajax="false"><span class="pro_icon"><img src="assets/img/icons8-info-36.png" alt="" style="vertical-align:middle;"></span>ভাড়া.কম</a>
                            </li>



                            <li class="pro_li">
                                <a href="" class="panel_link_style"></a>
                            </li>
                            <li class="pro_li">
                                <a href="" class="panel_link_style"></a>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
            <?php echo '<div class="nameCat" style="display:none;">'.$catID.'</div>'; ?>
            <div class="userID" data-userid="<?php echo $userid; ?>"></div>
            <a href="index.php" id="hrefIdentify" style="display:none;"></a>
            <div class="shareBu" style="display:none;">
                <?php echo $shareBut; ?>
            </div>
        </div>

        <!--
        <div data-role="footer" data-position="fixed" class="footer_area" style="background: #158a8f;
    text-shadow: none;
    color: white;
    height: 2.986rem;">
            <h1>Footer Text</h1>
        </div>
-->

    </div>

    <script>
        $(document).ready(function() {
            $("#bharaOpenion").css({
                "height": "200px"
            });
            $("#bharaOpenion").on("click change focus ", function() {
                $(this).css({
                    "height": "200px"
                });
            });
            $("#opeSubmit").on('click', function(e) {
                e.preventDefault;
                var opeSub = $("#opeSub").val();
                var bharaOpenion = $("#bharaOpenion").val();
                var opeEmail = $("#opeEmail").val();
                $.post('http://www.bhara.com/yourOpinion.php', {
                    opeSub: opeSub,
                    bharaOpenion: bharaOpenion,
                    opeEmail: opeEmail
                }, function(data) {
                    $("#opeError").html(data);
                    $("#bharaOpenion").val('');
                    $("#opeSub").val('');
                    $("#opeEmail").val('');



                })



            });


        });

    </script>
    <script src="assets/js/inde.js" async></script>
    <!--    <script src="assets/js/message.js" async></script>-->
    <script src='https://api.tiles.mapbox.com/mapbox-gl-js/v0.48.0/mapbox-gl.js'></script>
    <link href='https://api.tiles.mapbox.com/mapbox-gl-js/v0.48.0/mapbox-gl.css' rel='stylesheet' />
    <style>


    </style>

    <script src='https://api.mapbox.com/mapbox-gl-js/plugins/mapbox-gl-geocoder/v2.3.0/mapbox-gl-geocoder.min.js'></script>
    <link rel='stylesheet' href='https://api.mapbox.com/mapbox-gl-js/plugins/mapbox-gl-geocoder/v2.3.0/mapbox-gl-geocoder.css' type='text/css' />




</body>

</html>
