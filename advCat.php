<?php

include 'class/login.php';
include 'core/init.php';
$showTimeline=False;
if(login::isLoggedIn()){
     $userid =login::isLoggedIn();
    
     $showTimeline=True;
//    echo 'User find';
    
}else{
   // header('Location: sign_out.php'); 
}
$user_id =login::isLoggedIn();

$userInfo = $getFromPo->userData($user_id);
//echo $user_id;
//
//$mas = $getFromPo->savedLocation(); 
//                
//                echo $mas;
 ?>






    <!DOCTYPE html>
    <html lang="en">

    <head>
        <meta charset="UTF-8">
        <title>ভাড়া.কম</title>
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <!--        <link rel="stylesheet" href="assets/css/materialize.min.css">-->
        <link rel="stylesheet" href="assets/css/jquery_mobile.min.css">
        <script src="assets/js/jquery.js"></script>
        <script src="assets/js/jquery_mobile.min.js"></script>
        <link rel="stylesheet" href="assets/css/mobileCustomSmall.css" media="screen and (max-width: 329px)">

        <link rel="stylesheet" href="assets/css/mobileCustom.css" media="screen and (min-width: 330px) and (max-width: 767px)">

        <link rel="stylesheet" href="assets/css/desktop.css" media="screen and (min-width: 768px) and (max-width : 1224px)">

        <link rel="stylesheet" href="assets/css/desktopLarge.css" media="screen and (min-width : 1225px) and (max-width : 1824px)">

        <style>
            .ui-input-text input {
                border-bottom: 1px solid black;
                background: white;
                font-size: 0.8rem;
                border: none;
            }
            
            div#sel_divi-button {
                background: white;
                font-size: 0.8rem;
            }
            
            div#distr-button {
                background: white;
                font-size: 0.8rem;
            }
            
            div#upaz-button {
                background: white;
                font-size: 0.8rem;
            }
            
            .ui-input-text input:focus {
                border-bottom: 1px solid black;
                background: white;
            }
            
            textarea#adv_det {
                border-bottom: 1px solid black;
                background: white;
                border: none;
                font-size: 0.8rem;
            }
            
            textarea#adv_det:focus {
                border-bottom: 1px solid black;
                background: white;
            }
            
            #map {
                height: 302px;
                /*                width: 402px;*/
            }
            
            div#select-native-14-button {
                background-color: #9a8c64;
                text-shadow: none;
                color: white;
            }

        </style>


    </head>

    <body>
        <div data-role="page" id="adv">
            <div data-role="panel" id="myPanel3" data-display="overlay" data-position="left">
                <h2>Panel Header..</h2>
                <p>Some text in the panel..</p>
            </div>

            <div data-role="header">
                <!--
                <div class="header_top">

                </div>
-->

                <div class="header_wrapper">
                    <div class="logo">
                        <div class="back_arrow" style="font-size:42px; text-shadow:none; color:white;"><img src="https://img.icons8.com/metro/50/ffffff/undo.png"></div>
                        <a href="http://bhara.com" style="display:none;"><img src="assets/img/logo.svg" alt=""></a>
                    </div>
                    <a style="text-decoration:none;" href="http://bhara.com">
                        <div class="brandName" style="margin-top: 0.482rem;">ভাড়া.কম</div>
                    </a>
                    <a href="#adv" style="display:none;">
                        <div class="post_adv">Post Adv</div>
                    </a>
                    <div class="account_icon" style="    visibility: hidden;"><img src="assets/img/account.svg" alt=""></div>

                </div>
                <input type="hidden" name="" value="" id="latt">
                <input type="hidden" name="" value="" id="lngg">
                <p id="lato" style="display:none;"></p>
                <p id="lngo" style="display:none;"></p>


                <div class="header_down_part" style="display:none;">
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
            <div class="adv_step wel" style="    margin-right: 10px;">


                <div class="adv_item adv_cont">
                    <div class="prop_headi"><span class="right_sign">✔</span>ভাড়া প্রোপার্টি প্রস্থাব করুন:</div>
                    <div class="prop_list" style=" padding:0;  margin: 0;">




                        <div class="ui-field-contain">

                            <?php
                            if(isset($_GET['catVal'])){
    $cat_val = $getFromPo->checkInput($_GET['catVal']);
                            
                            
                            if($cat_val == "1"){ echo '<a href="adv.php"><button class="prop" style="background-color:white; font-size:0.8rem;" value="'.$cat_val.'">ফ্ল্যাট/ অ্যাপার্টমেন্ট</button></a>'; }else if($cat_val == "2"){ echo '<a href="adv.php"><button class="prop" style="background-color:white; font-size:0.8rem;" value="'.$cat_val.'">বাসা</button></a>'; }else if($cat_val == "3"){ echo '<a href="adv.php"><button class="prop" style="background-color:white; font-size:0.8rem;" value="'.$cat_val.'">রুম</button></a>'; }else if($cat_val == "4"){ echo '<a href="adv.php"><button class="prop" style="background-color:white; font-size:0.8rem;" value="'.$cat_val.'">বাড়ি</button></a>'; }else if($cat_val == "5"){ echo '<a href="adv.php"><button class="prop" style="background-color:white; font-size:0.8rem;" value="'.$cat_val.'">মাইক্রো</button></a>'; }else if($cat_val == "6"){ echo '<a href="adv.php"><button class="prop" style="background-color:white; font-size:0.8rem;" value="'.$cat_val.'">কার</button></a>'; }else if($cat_val == "7"){ echo '<a href="adv.php"><button class="prop" style="background-color:white; font-size:0.8rem;" value="'.$cat_val.'">বাস</button></a>'; }else if($cat_val == "8"){ echo '<a href="adv.php"><button class="prop" style="background-color:white; font-size:0.8rem;" value="'.$cat_val.'">ট্রাক</button></a>'; }else if($cat_val == "9"){ echo '<a href="adv.php"><button class="prop" style="background-color:white; font-size:0.8rem;" value="'.$cat_val.'">ব্যাংক/বীমা</button></a>'; }else if($cat_val == "10"){ echo '<a href="adv.php"><button class="prop" style="background-color:white; font-size:0.8rem;" value="'.$cat_val.'">শোরুম</button></a>'; }else if($cat_val == "11"){ echo '<a href="adv.php"><button class="prop" style="background-color:white; font-size:0.8rem;" value="'.$cat_val.'">দোকান</button></a>'; }else if($cat_val == "12"){ echo '<a href="adv.php"><button class="prop" style="background-color:white; font-size:0.8rem;" value="'.$cat_val.'">গ্যারেজ</button></a>'; }else if($cat_val == "13"){ echo '<a href="adv.php"><button class="prop" style="background-color:white; font-size:0.8rem;" value="'.$cat_val.'">ক্রেইন</button></a>'; }else if($cat_val == "14"){ echo '<a href="adv.php"><button class="prop" style="background-color:white; font-size:0.8rem;" value="'.$cat_val.'">স্কাবেটর</button></a>'; }else if($cat_val == "15"){ echo '<a href="adv.php"><button class="prop" style="background-color:white; font-size:0.8rem;" value="'.$cat_val.'">চাকরি</button></a>'; }else if($cat_val == "16"){ echo '<a href="adv.php"><button class="prop" style="background-color:white; font-size:0.8rem;" value="'.$cat_val.'">কন্ট্রাক্</button></a>'; }
                                else if($cat_val == "19"){ echo '<a href="adv.php"><button class="prop" style="background-color:white; font-size:0.8rem;" value="'.$cat_val.'">স্টোর হাউস</button></a>'; }  else if($cat_val == "20"){ echo '<a href="adv.php"><button class="prop" style="background-color:white; font-size:0.8rem;" value="'.$cat_val.'">ফ্যাক্টরি</button></a>'; } else if($cat_val == "21"){ echo '<a href="adv.php"><button class="prop" style="background-color:white; font-size:0.8rem;" value="'.$cat_val.'">হোটেল</button></a>'; } else if($cat_val == "22"){ echo '<a href="adv.php"><button class="prop" style="background-color:white; font-size:0.8rem;" value="'.$cat_val.'">অফিস</button></a>'; } else if($cat_val == "23"){ echo '<a href="adv.php"><button class="prop" style="background-color:white; font-size:0.8rem;" value="'.$cat_val.'">রেস্ট্রুরেন্ট</button></a>'; }
                                else if($cat_val == "25"){ echo '<a href="adv.php"><button class="prop" style="background-color:white; font-size:0.8rem;" value="'.$cat_val.'">এক্সকাভেটর</button></a>'; }
                                else if($cat_val == "26"){ echo '<a href="adv.php"><button class="prop" style="background-color:white; font-size:0.8rem;" value="'.$cat_val.'">ডোজার</button></a>'; }
                                else if($cat_val == "27"){ echo '<a href="adv.php"><button class="prop" style="background-color:white; font-size:0.8rem;" value="'.$cat_val.'">লোডার</button></a>'; }
                                else if($cat_val == "28"){ echo '<a href="adv.php"><button class="prop" style="background-color:white; font-size:0.8rem;" value="'.$cat_val.'">ডাম্পার</button></a>'; }
                                else if($cat_val == "29"){ echo '<a href="adv.php"><button class="prop" style="background-color:white; font-size:0.8rem;" value="'.$cat_val.'">চুক্তিভিত্তিক নিয়োগ</button></a>'; }
                                else if($cat_val == "30"){ echo '<a href="adv.php"><button class="prop" style="background-color:white; font-size:0.8rem;" value="'.$cat_val.'">অন্যান্য</button></a>'; }
                                else{ echo 'I haven\'t fount'; }
                            
                            }
                            ?>




                        </div>


                    </div>
                    <div class="cat_error" style=" color:red;"></div>


                </div>


                <div id="adv_area" style="background-color: white;">
                    <div class="adv_cont ">
                        <span class="prop_headi"><span class="right_sign_area">✔</span>ভাড়ার অবস্থান উল্লেখ করুন<sup style="color:red;">*</sup></span>

                        <div class="rent_area" style=" padding: 5px; margin: 3px;">
                            <div class="divi">
                                <select name="divis" id="sel_divi" style="background: white;">
                        <option value="" > বিভাগ নির্বাচন করুন</option>

<?php include 'include/division.php';?>
 
</select>

                            </div>
                            <div class="div_error" style="color:red;"></div>
                            <div id="dist">
                                <select name="dis" id="distr">
                            <option value=""> জেলা নির্বাচন করুন</option>
                            
                       
                            </select>
                                <div id="latLon" style="display:none;">

                                </div>
                            </div>
                            <div class="dist_error" style="color:red;"></div>
                            <div id="area">
                                <select name="upaz" id="upaz">
<option value="volvo">এলাকা নির্বচন করুন</option>
                       

                            
                            </select>

                            </div>
                            <div class="area_error" style="color:red;"></div>
                        </div>

                    </div>
                </div>
                <div id="adv_con" style="background-color: white;">

                    <div class="adv_publish adv_cont" style="background-color: #ebdaa6;">
                        <span class="prop_headi" id="pro_de">ভাড়া বিবরণ দিন ও বিজ্ঞাপন প্রচার করুন</span>
                        <div class="pub_adv_wrapper">
                            <div class="adv_head ">
                                <label for="adv_head" style="font-size:0.694rem;margin: 0 0 -0.694rem 0;">বিজ্ঞাপন শিরোনাম:<sup style="color:red;">*</sup></label>

                                <input type="text" name="adv_head" id="adv_head" placeholder="বিজ্ঞাপনের শিরোনাম লিখুন">
                                <div class="adv_head_error" style="color:red;"></div>
                            </div>

                            <div class="adv_price">
                                <div class="ad_pri">
                                    <label for="adv_price" style="font-size:0.694rem;margin: 1.5rem 0 -0.694rem 0;">ভাড়া মূল্য:<sup style="color:red;">*</sup> 
                                   <div class="daMon" style="margin-left: 4rem;margin-top: -1.7rem;"> 
                                    <fieldset data-role="controlgroup" data-type="horizontal" data-mini="true" >

                                <label for="select-native-14">Select A</label>
                                    <select name="select-native-14" id="select-native-14">
                                <option value="মাসিক">মাসিক</option>
                                <option value="সাপ্তাহিক">সাপ্তাহিক</option>
                                <option value="দৈনিক">দৈনিক</option>
                                </select>

                                    </fieldset>
                                </div>
                                </label>

                                <input type="text" name="adv_price" id="adv_price" placeholder="ভাড়া মূল্য লিখুন" />
                                <div class="adv_price_error" style="color:red;"></div>
                            </div>

                            <!--                                    অথবা-->
                            <div class="alochona" style="">
                                <label>
        <input type="checkbox" name="checkbox-0 " id="negot">আলোচনা সাপেক্ষে
    </label>



                            </div>
                        </div>

                        <!--
                            <fieldset data-role="controlgroup" data-type="horizontal">
                                <legend style="font-size:0.694rem;">বেড</legend>
                                <input type="radio" name="radio-choice-p" id="radio-choice-f" value="1" checked="checked">
                                <label for="radio-choice-f">১</label>
                                <input type="radio" name="radio-choice-p" id="radio-choice-g" value="2">
                                <label for="radio-choice-g">২</label>
                                <input type="radio" name="radio-choice-p" id="radio-choice-h" value="3">
                                <label for="radio-choice-h">৩</label>
                            </fieldset>
-->
                        <div class="localAddr">
                            <label for="localAdd" style="font-size:0.694rem;margin: 1.5rem 0 -0.694rem 0;">ঠিকানা</label>
                            <input type="text" name="localAdd" id="localAdd" placeholder="ঠিকানা ( রোড নং/হোল্ডিং নং/ বাড়ি নং)" />
                        </div>
                        <br>
                        <div class="file-upload">
                            <label for="upload" class="file-upload__label" style="margin: 0;
    border-bottom: none;"><img src="assets/img/icons8-xlarge-icons-36.png" alt="" style="vertical-align: middle;
    margin-right: 1rem;">ছবি যোগ করুন (সর্বোচ্চ ৫ টি)</label>
                            <input id="multiple_files" class="file-upload__input" type="file" name="file-upload" multiple>
                        </div>
                        <div>
                            <ul id="sortable" style="position:relative;">
                            </ul>

                        </div>
                        <div class="image_error" style="color:red;"></div>
                        <?php
     if(isset($_GET['catVal'])){
    $cat_val = $getFromPo->checkInput($_GET['catVal']);
  if($cat_val == "1"){ ?>
                            <!--                                <div class="bed_no"><label for="feat_1">বেড</label>-->

                            <fieldset data-role="controlgroup" data-type="horizontal">
                                <legend style="font-size:0.694rem;">বেড</legend>
                                <input type="radio" name="radio-choice-b" id="radio-choice-c" value="1" checked="checked">
                                <label for="radio-choice-c">১</label>
                                <input type="radio" name="radio-choice-b" id="radio-choice-d" value="2">
                                <label for="radio-choice-d">২</label>
                                <input type="radio" name="radio-choice-b" id="radio-choice-e" value="3">
                                <label for="radio-choice-e">৩</label><input type="radio" name="radio-choice-b" id="radio-choice-f" value="4">
                                <label for="radio-choice-f">৪</label><input type="radio" name="radio-choice-b" id="radio-choice-g" value="5">
                                <label for="radio-choice-g">৫</label><input type="radio" name="radio-choice-b" id="radio-choice-h" value="6">
                                <label for="radio-choice-h">৬</label><input type="radio" name="radio-choice-b" id="radio-choice-i" value="7">
                                <label for="radio-choice-i">৭+</label>
                            </fieldset>
                            <fieldset data-role="controlgroup" data-type="horizontal">

                                <legend style="font-size:0.694rem;margin: 1rem 0 0 0;">বাথ</legend>
                                <input type="radio" name="radio-choice-t" id="radio-choice-j" value="1" checked="checked">
                                <label for="radio-choice-j">১</label>
                                <input type="radio" name="radio-choice-t" id="radio-choice-k" value="2">
                                <label for="radio-choice-k">২</label>
                                <input type="radio" name="radio-choice-t" id="radio-choice-l" value="3">
                                <label for="radio-choice-l">৩</label><input type="radio" name="radio-choice-t" id="radio-choice-m" value="4">
                                <label for="radio-choice-m">৪</label><input type="radio" name="radio-choice-t" id="radio-choice-n" value="5">
                                <label for="radio-choice-n">৫</label><input type="radio" name="radio-choice-t" id="radio-choice-o" value="6">
                                <label for="radio-choice-o">৬</label><input type="radio" name="radio-choice-t" id="radio-choice-p" value="7">
                                <label for="radio-choice-p">৭+</label>
                            </fieldset>
                            <div class="bed_no"><label for="feat_3" style="font-size:0.694rem;margin: 1.5rem 0 -0.694rem 0;">আয়তন</label>
                                <input type="text" name="feat_3" id="feat_3" placeholder="আয়তন" />
                                <div class="feat_3_error" style="color:red;"></div>
                            </div>

                            <?php }else if($cat_val == "2"){ ?>
                            <fieldset data-role="controlgroup" data-type="horizontal">

                                <legend style="font-size:0.694rem;">বেড</legend>
                                <input type="radio" name="radio-choice-b" id="radio-choice-c" value="1" checked="checked">
                                <label for="radio-choice-c">১</label>
                                <input type="radio" name="radio-choice-b" id="radio-choice-d" value="2">
                                <label for="radio-choice-d">২</label>
                                <input type="radio" name="radio-choice-b" id="radio-choice-e" value="3">
                                <label for="radio-choice-e">৩</label><input type="radio" name="radio-choice-b" id="radio-choice-f" value="4">
                                <label for="radio-choice-f">৪</label><input type="radio" name="radio-choice-b" id="radio-choice-g" value="5">
                                <label for="radio-choice-g">৫</label><input type="radio" name="radio-choice-b" id="radio-choice-h" value="6">
                                <label for="radio-choice-h">৬</label><input type="radio" name="radio-choice-b" id="radio-choice-i" value="7">
                                <label for="radio-choice-i">৭+</label>
                            </fieldset>
                            <fieldset data-role="controlgroup" data-type="horizontal">

                                <legend style="font-size:0.694rem;margin: 1rem 0 0 0;">বাথ</legend>
                                <input type="radio" name="radio-choice-t" id="radio-choice-j" value="1" checked="checked">
                                <label for="radio-choice-j">১</label>
                                <input type="radio" name="radio-choice-t" id="radio-choice-k" value="2">
                                <label for="radio-choice-k">২</label>
                                <input type="radio" name="radio-choice-t" id="radio-choice-l" value="3">
                                <label for="radio-choice-l">৩</label><input type="radio" name="radio-choice-t" id="radio-choice-m" value="4">
                                <label for="radio-choice-m">৪</label><input type="radio" name="radio-choice-t" id="radio-choice-n" value="5">
                                <label for="radio-choice-n">৫</label><input type="radio" name="radio-choice-t" id="radio-choice-o" value="6">
                                <label for="radio-choice-o">৬</label><input type="radio" name="radio-choice-t" id="radio-choice-p" value="7">
                                <label for="radio-choice-p">৭+</label>
                            </fieldset>


                            <?php }else if($cat_val == "3"){?>
                            <input type="text" name="feat_1" style="display:none;" id="feat_1" />
                            <fieldset data-role="controlgroup" data-type="horizontal">

                                <legend style="font-size:0.694rem;margin: 1rem 0 0 0;">রুম ভাড়া প্রোপার্টি ধরণ</legend>
                                <input type="radio" name="radio-choice-t" id="radio-choice-j" value="1" checked="checked">
                                <label for="radio-choice-j">মেস</label>
                                <input type="radio" name="radio-choice-t" id="radio-choice-k" value="2">
                                <label for="radio-choice-k">হোস্টেল</label>
                                <input type="radio" name="radio-choice-t" id="radio-choice-l" value="3">
                                <label for="radio-choice-l">বাসা</label><input type="radio" name="radio-choice-t" id="radio-choice-m" value="4">
                                <label for="radio-choice-m"> অ্যাপার্টমেন্ট</label><input type="radio" name="radio-choice-t" id="radio-choice-n" value="5">
                                <label for="radio-choice-n">বাড়ি</label>
                            </fieldset>


                            <?php }else if($cat_val == "4"){ ?>

                            <?php }else if($cat_val == "5"){?>

                            <div class="bed_no"><label for="feat_1" placeholder="সিট সংখ্যা" style="font-size:0.694rem;margin: 1.5rem 0 -0.694rem 0;">সিট সংখ্যা</label><input type="text" name="feat_1" id="feat_1" /></div>
                            <input type="text" name="feat_2" id="feat_2" style="display:none;" />

                            <?php
  }else if($cat_val == "6"){?>

                                <div class="car_model">
                                    <label for="feat_1" style="font-size:0.694rem;margin: 1.5rem 0 -0.694rem 0;">কার মডেল</label>
                                    <input type="text" name="feat_1" id="feat_1" placeholder="কার মডেল" /></div>
                                <div class="car_color">
                                    <label for="feat_2" style="font-size:0.694rem;margin: 1.5rem 0 -0.694rem 0;">কার কালার</label>
                                    <input type="text" name="feat_2" id="feat_2" placeholder="কার কালার" /></div>

                                <label for="feat_3" style="font-size:0.694rem;margin: 1.5rem 0 -0.694rem 0;">সিট সংখ্যা</label>
                                <input type="text" name="feat_3" id="feat_3" placeholder="সিট সংখ্যা" />


                                <?php }else if($cat_val == "7"){?>

                                <div class="car_model">
                                    <label for="feat_1" style="font-size:0.694rem;margin: 1.5rem 0 -0.694rem 0;">বাস কোম্পানি</label>
                                    <input type="text" name="feat_1" id="feat_1" placeholder="বাস মডেল" /></div>
                                <div class="car_color">
                                    <label for="feat_2" style="font-size:0.694rem;margin: 1.5rem 0 -0.694rem 0;">বাস কালার</label>
                                    <input type="text" name="feat_2" id="feat_2" placeholder="বাস কালার" /></div>

                                <label for="feat_3" style="font-size:0.694rem;margin: 1.5rem 0 -0.694rem 0;">সিট সংখ্যা</label>
                                <input type="text" name="feat_3" id="feat_3" placeholder="সিট সংখ্যা" />


                                <?php }else if($cat_val == "8"){ ?>
                                <div class="car_model">
                                    <label for="feat_1" style="font-size:0.694rem;margin: 1.5rem 0 -0.694rem 0;">ট্রাক ব্রান্ড</label>
                                    <input type="text" name="feat_1" id="feat_1" placeholder="ট্রাক ব্রান্ড" /></div>
                                <div class="car_color">
                                    <label for="feat_2" style="font-size:0.694rem;margin: 1.5rem 0 -0.694rem 0;">ধারণ ক্ষমতা</label>
                                    <input type="text" name="feat_2" id="feat_2" placeholder="ধারণ ক্ষমতা: টন" /></div>
                                <?php }else if($cat_val == "9"){ ?>
                                <div class="bed_no"><label for="feat_1" style="font-size:0.694rem;margin: 1.5rem 0 -0.694rem 0;">আয়তন</label>
                                    <input type="text" name="feat_1" id="feat_1" placeholder="আয়তন" />
                                    <input type="text" name="feat_2" id="feat_2" placeholder="আয়তন" style="display:none;" />
                                    <div class="feat_3_error" style="color:red;"></div>
                                </div>

                                <?php }else if($cat_val == "10"){ ?>
                                <div class="bed_no"><label for="feat_1" style="font-size:0.694rem;margin: 1.5rem 0 -0.694rem 0;">আয়তন</label>
                                    <input type="text" name="feat_1" id="feat_1" placeholder="আয়তন" />
                                    <input type="text" name="feat_2" id="feat_2" placeholder="আয়তন" style="display:none;" />
                                    <div class="feat_3_error" style="color:red;"></div>
                                </div>
                                <?php }
         else if($cat_val == "10"){ ?>
                                <div class="bed_no"><label for="feat_1" style="font-size:0.694rem;margin: 1.5rem 0 -0.694rem 0;">আয়তন</label>
                                    <input type="text" name="feat_1" id="feat_1" placeholder="আয়তন" />
                                    <input type="text" name="feat_2" id="feat_2" placeholder="আয়তন" style="display:none;" />
                                    <div class="feat_3_error" style="color:red;"></div>
                                </div>
                                <?php }
         else if($cat_val == "11"){ ?>
                                <div class="bed_no"><label for="feat_1" style="font-size:0.694rem;margin: 1.5rem 0 -0.694rem 0;">আয়তন</label>
                                    <input type="text" name="feat_1" id="feat_1" placeholder="আয়তন" />
                                    <input type="text" name="feat_2" id="feat_2" placeholder="আয়তন" style="display:none;" />
                                    <div class="feat_3_error" style="color:red;"></div>
                                </div>
                                <?php }else if($cat_val == "12"){ ?>
                                <div class="bed_no"><label for="feat_1" style="font-size:0.694rem;margin: 1.5rem 0 -0.694rem 0;">আয়তন</label>
                                    <input type="text" name="feat_1" id="feat_1" placeholder="আয়তন" />
                                    <input type="text" name="feat_2" id="feat_2" placeholder="আয়তন" style="display:none;" />
                                    <div class="feat_3_error" style="color:red;"></div>
                                </div>
                                <?php }else if($cat_val == "13"){ ?>
                                <div class="bed_no"><label for="feat_1" style="font-size:0.694rem;margin: 1.5rem 0 -0.694rem 0;">ধারণ ক্ষমতা</label>
                                    <input type="text" name="feat_1" id="feat_1" placeholder="ধারণ ক্ষমতা: টন" />
                                    <input type="text" name="feat_2" id="feat_2" placeholder="আয়তন" style="display:none;" />
                                    <div class="feat_3_error" style="color:red;"></div>
                                </div>
                                <?php }else if($cat_val == "14"){ ?>
                                <div class="bed_no"><label for="feat_1" style="font-size:0.694rem;margin: 1.5rem 0 -0.694rem 0;">ধারণ ক্ষমতা</label>
                                    <input type="text" name="feat_1" id="feat_1" placeholder="ধারণ ক্ষমতা: টন" />
                                    <input type="text" name="feat_2" id="feat_2" placeholder="আয়তন" style="display:none;" />
                                    <div class="feat_3_error" style="color:red;"></div>
                                </div>
                                <?php }else if($cat_val == "19"){ ?>
                                <div class="bed_no"><label for="feat_1" style="font-size:0.694rem;margin: 1.5rem 0 -0.694rem 0;">আয়তন</label>
                                    <input type="text" name="feat_1" id="feat_1" placeholder="আয়তন" />
                                    <input type="text" name="feat_2" id="feat_2" placeholder="আয়তন" style="display:none;" />
                                    <div class="feat_3_error" style="color:red;"></div>
                                </div>
                                <?php }else if($cat_val == "20"){ ?>
                                <div class="bed_no"><label for="feat_1" style="font-size:0.694rem;margin: 1.5rem 0 -0.694rem 0;">আয়তন</label>
                                    <input type="text" name="feat_1" id="feat_1" placeholder="আয়তন" />
                                    <input type="text" name="feat_2" id="feat_2" placeholder="আয়তন" style="display:none;" />
                                    <div class="feat_3_error" style="color:red;"></div>
                                </div>
                                <?php }else if($cat_val == "21"){ ?>
                                <div class="bed_no"><label for="feat_1" style="font-size:0.694rem;margin: 1.5rem 0 -0.694rem 0;">আয়তন</label>
                                    <input type="text" name="feat_1" id="feat_1" placeholder="আয়তন" />
                                    <input type="text" name="feat_2" id="feat_2" placeholder="আয়তন" style="display:none;" />
                                    <div class="feat_3_error" style="color:red;"></div>
                                </div>
                                <?php }else if($cat_val == "22"){ ?>
                                <div class="bed_no"><label for="feat_1" style="font-size:0.694rem;margin: 1.5rem 0 -0.694rem 0;">আয়তন</label>
                                    <input type="text" name="feat_1" id="feat_1" placeholder="আয়তন" />
                                    <input type="text" name="feat_2" id="feat_2" placeholder="আয়তন" style="display:none;" />
                                    <div class="feat_3_error" style="color:red;"></div>
                                </div>
                                <?php }else if($cat_val == "23"){ ?>
                                <div class="bed_no"><label for="feat_1" style="font-size:0.694rem;margin: 1.5rem 0 -0.694rem 0;">আয়তন</label>
                                    <input type="text" name="feat_1" id="feat_1" placeholder="আয়তন" />
                                    <input type="text" name="feat_2" id="feat_2" placeholder="আয়তন" style="display:none;" />
                                    <div class="feat_3_error" style="color:red;"></div>
                                </div>
                                <?php }else if($cat_val == "25"){ ?>
                                <div class="bed_no"><label for="feat_1" style="font-size:0.694rem;margin: 1.5rem 0 -0.694rem 0;">ধারণ ক্ষমতা</label>
                                    <input type="text" name="feat_1" id="feat_1" placeholder="ধারণ ক্ষমতা: টন" />
                                    <input type="text" name="feat_2" id="feat_2" placeholder="আয়তন" style="display:none;" />
                                    <div class="feat_3_error" style="color:red;"></div>
                                </div>
                                <?php }else if($cat_val == "26"){ ?>
                                <div class="bed_no"><label for="feat_1" style="font-size:0.694rem;margin: 1.5rem 0 -0.694rem 0;">ধারণ ক্ষমতা</label>
                                    <input type="text" name="feat_1" id="feat_1" placeholder="ধারণ ক্ষমতা: টন" />
                                    <input type="text" name="feat_2" id="feat_2" placeholder="আয়তন" style="display:none;" />
                                    <div class="feat_3_error" style="color:red;"></div>
                                </div>
                                <?php }else if($cat_val == "27"){ ?>
                                <div class="bed_no"><label for="feat_1" style="font-size:0.694rem;margin: 1.5rem 0 -0.694rem 0;">ধারণ ক্ষমতা</label>
                                    <input type="text" name="feat_1" id="feat_1" placeholder="ধারণ ক্ষমতা: টন" />
                                    <input type="text" name="feat_2" id="feat_2" placeholder="আয়তন" style="display:none;" />
                                    <div class="feat_3_error" style="color:red;"></div>
                                </div>
                                <?php }else if($cat_val == "28"){ ?>
                                <div class="bed_no"><label for="feat_1" style="font-size:0.694rem;margin: 1.5rem 0 -0.694rem 0;">ধারণ ক্ষমতা</label>
                                    <input type="text" name="feat_1" id="feat_1" placeholder="ধারণ ক্ষমতা: টন" />
                                    <input type="text" name="feat_2" id="feat_2" placeholder="আয়তন" style="display:none;" />
                                    <div class="feat_3_error" style="color:red;"></div>
                                </div>
                                <?php }
         else if($cat_val == "100"){ echo 'I got seven'; }else if($cat_val == "10"){
      
      
      
      echo 'I got seven'; }else if($cat_val == "10"){ echo 'I got seven'; }else{ } }; ?>

                                <div class="adv_det">
                                    <label for="adv_det" style="font-size:0.694rem;margin: 1.5rem 0 -0.694rem 0;">বিজ্ঞাপন বিবরণ:</label>

                                    <textarea name="adv_det" id="adv_det" cols="40" rows="10" placeholder="বিজ্ঞাপনের বিবরণ লিখুন"></textarea>
                                    <div class="adv_det_error" style="color:red;"></div>
                                </div>

                                <div class="sendGeoCode" style="display:none;">
                                    <input type="text" id="lat" name="lat" placeholder="Your lat..">

                                    <input type="text" id="lng" name="lng" placeholder="Your lng..">
                                </div>

                                <div class="geocoder">
                                    <div id="geocoder"></div>
                                </div>
                                <div class="mapWrap" style="position:relative;">
                                    <div class="mapClick" style="position: absolute;background-color: white;height: 100%;width: 100%;z-index: 99;overflow:hidden;">
                                        <img src="assets/img/mapPlace.jpg" alt="" style="position: absolute;height: 409px;width: 100%;margin-top: -46px;" onclick="showMap()">
                                    </div>
                                    <div id="map">

                                    </div>
                                </div>
                                <div class="about_me">
                                    <!--                                   <br> আপনার নাম: <br>-->
                                    <input type="text" name="" id="user_id" value="<?php echo $user_id; ?>" style="display:none;">
                                    <!--mayeder shomporke onek kichu janlam. 
  future a kaje dibe.
  Pre paration.
 Kartik deserve a oscar.   
                                   A point of                                                                
                                    -->
                                    <label for="edit_name" style="font-size:0.694rem;margin: 1.5rem 0 -0.694rem 0;">আপানার নাম:</label>
                                    <input type="text" name="edit_name" id="edit_name_text" placeholder="আপানার নাম যুক্ত করুন" value="<?php echo $userInfo->username; ?>">
                                    <div class="name_error" style="color:red;"></div>
                                    <!--                                    <br> আপনার মোবাইল নাম্বার: <br>-->
                                    <label for="edit_mob" style="font-size:0.694rem;margin: 1.5rem 0 -0.694rem 0;">আপানার মোবাইল নাম্বার:<sup style="color:red;">*</sup></label>
                                    <input type="text" name="edit_mob" id="edit_mob_text" placeholder="  আপানার মোবাইল নাম্বার যুক্ত করুন" value="<?php echo $userInfo->mobile; ?>">
                                    <div class="mobile_error" style="color:red;"></div>
                                    <!--                                    আপানার ইমেইল: <br>-->
                                    <label for="edit_email" style="font-size:0.694rem;margin: 1.5rem 0 -0.694rem 0;">আপানার ইমেইল:</label>
                                    <input type="text" name="edit_email" id="edit_email_text" placeholder="আপানার ইমেইল যুক্ত করুন" value="<?php echo $userInfo->email; ?>">
                                    <div class="email_error" style="color:red;"></div>
                                </div>
                    </div>
                    <button id="adv_sub" data-theme="b">বিজ্ঞাপন প্রচার করুন</button>
                    <div id="adv_dem"></div>
                    <div id="adv_demo"></div>
                    <div id="error_multiple_files"> </div>
                </div>






            </div>

            <!--            </form>-->
            <div id="disi"></div>
        </div>

        </div>
        <script src='https://api.tiles.mapbox.com/mapbox-gl-js/v0.48.0/mapbox-gl.js'></script>
        <link href='https://api.tiles.mapbox.com/mapbox-gl-js/v0.48.0/mapbox-gl.css' rel='stylesheet' />
        <style>


        </style>

        <script src='https://api.mapbox.com/mapbox-gl-js/plugins/mapbox-gl-geocoder/v2.3.0/mapbox-gl-geocoder.min.js'></script>
        <link rel='stylesheet' href='https://api.mapbox.com/mapbox-gl-js/plugins/mapbox-gl-geocoder/v2.3.0/mapbox-gl-geocoder.css' type='text/css' />
        <script>
            function showMap() {
                var l = document.getElementById("lato");
                var g = document.getElementById("lngo");
                var ltext = l.textContent;
                //            var ll = document.getElementById("latt");
                //            var gg = document.getElementById("lngg");
                console.log(ltext);
                if (ltext == '') {

                    var lattValo = document.getElementById("distlat").value;
                    var lnggValo = document.getElementById("distlon").value;

                    var lattao = Number(lattValo);
                    var lannao = Number(lnggValo);
                    console.log(lattao);
                    var user_location = [lannao, lattao];
                    mapboxgl.accessToken = 'pk.eyJ1IjoiZmFraHJhd3kiLCJhIjoiY2pscWs4OTNrMmd5ZTNra21iZmRvdTFkOCJ9.15TZ2NtGk_AtUvLd27-8xA';
                    var map = new mapboxgl.Map({
                        container: 'map',
                        style: 'mapbox://styles/mapbox/streets-v9',
                        center: user_location,
                        zoom: 16
                    });




                    var marker;

                    // After the map style has loaded on the page, add a source layer and default
                    // styling for a single point.
                    map.on('load', function() {
                        addMarker(user_location, 'load');
                        //                    add_markers(saved_markers);

                        // Listen for the `result` event from the MapboxGeocoder that is triggered when a user
                        // makes a selection and add a symbol that matches the result.
                        geocoder.on('result', function(ev) {
                            alert("aaaaa");
                            console.log(ev.result.center);

                        });
                    });

                    map.on('click', function(e) {
                        marker.remove();
                        addMarker(e.lngLat, 'click');
                        //console.log(e.lngLat.lat);
                        document.getElementById("lat").value = e.lngLat.lat;
                        document.getElementById("lng").value = e.lngLat.lng;

                    });

                    function addMarker(ltlng, event) {

                        if (event === 'click') {
                            user_location = ltlng;
                        }
                        marker = new mapboxgl.Marker({
                                draggable: true,
                                color: "#d02922"
                            })
                            .setLngLat(user_location)
                            .addTo(map)
                            .on('dragend', onDragEnd);
                    }

                    function add_markers(coordinates) {

                        var geojson = (saved_markers == coordinates ? saved_markers : '');

                        console.log(geojson);
                        // add markers to map
                        geojson.forEach(function(marker) {
                            console.log(marker);
                            // make a marker for each feature and add to the map
                            new mapboxgl.Marker()
                                .setLngLat(marker)
                                .addTo(map);
                        });

                    }

                    function onDragEnd() {
                        var lngLat = marker.getLngLat();
                        document.getElementById("lat").value = lngLat.lat;
                        document.getElementById("lng").value = lngLat.lng;
                        console.log('lng: ' + lngLat.lng + '<br />lat: ' + lngLat.lat);
                    }



                };
                var saved_markers = <?php echo $getFromPo->savedLocation(); ?>;




                var showPos = 'true';
                console.log(saved_markers);
                if (navigator.geolocation) {
                    navigator.geolocation.getCurrentPosition(showPosition);
                    var showPos = 'false';
                } else {}




                function showPosition(position) {
                    l.innerHTML = position.coords.latitude;
                    g.innerHTML = position.coords.longitude;

                    document.getElementById("latt").value = position.coords.latitude;
                    document.getElementById("lngg").value = position.coords.longitude;


                    var lattVal = document.getElementById("latt").value;
                    var lnggVal = document.getElementById("lngg").value;

                    var latta = Number(lattVal);
                    var lanna = Number(lnggVal);

                    var user_location = [lanna, latta];
                    mapboxgl.accessToken = 'pk.eyJ1IjoiZmFraHJhd3kiLCJhIjoiY2pscWs4OTNrMmd5ZTNra21iZmRvdTFkOCJ9.15TZ2NtGk_AtUvLd27-8xA';
                    var map = new mapboxgl.Map({
                        container: 'map',
                        style: 'mapbox://styles/mapbox/streets-v9',
                        center: user_location,
                        zoom: 16
                    });



                    var marker;

                    // After the map style has loaded on the page, add a source layer and default
                    // styling for a single point.
                    map.on('load', function() {
                        addMarker(user_location, 'load');
                        //                    add_markers(saved_markers);

                        // Listen for the `result` event from the MapboxGeocoder that is triggered when a user
                        // makes a selection and add a symbol that matches the result.
                        //                           geocoder.on('result', function(ev) { // alert("aaaaa"); // console.log(ev.result.center); // // });
                    });

                    map.on('click', function(e) {
                        marker.remove();
                        addMarker(e.lngLat, 'click');
                        //console.log(e.lngLat.lat);
                        document.getElementById("lat").value = e.lngLat.lat;
                        document.getElementById("lng").value = e.lngLat.lng;

                    });

                    function addMarker(ltlng, event) {

                        if (event === 'click') {
                            user_location = ltlng;
                        }
                        marker = new mapboxgl.Marker({
                                draggable: true,
                                color: "#d02922"
                            })
                            .setLngLat(user_location)
                            .addTo(map)
                            .on('dragend', onDragEnd);
                    }

                    function add_markers(coordinates) {

                        var geojson = (saved_markers == coordinates ? saved_markers : '');

                        console.log(geojson);
                        // add markers to map
                        geojson.forEach(function(marker) {
                            console.log(marker);
                            // make a marker for each feature and add to the map
                            new mapboxgl.Marker()
                                .setLngLat(marker)
                                .addTo(map);
                        });

                    }

                    function onDragEnd() {
                        var lngLat = marker.getLngLat();
                        document.getElementById("lat").value = lngLat.lat;
                        document.getElementById("lng").value = lngLat.lng;
                        console.log('lng: ' + lngLat.lng + '<br />lat: ' + lngLat.lat);
                    }







                }

            }


            $(function() {


                //                alert(bedValue);
                $(".back_arrow").on("click", function() {
                    window.history.back();
                });

                var topFixed = $('.adv_container').offset();
                $(window).scroll(function() {
                    if ($(window).scrollTop() > topFixed.top) {
                        $('.adv_container').css('position', 'fixed').css('top', '0');
                    } else {
                        $('.adv_container').css('position', 'static');
                    }
                });


                $(".mapClick").on("click", function() {
                    $(this).fadeOut(500);
                });
            });

        </script>
        <script type='text/javascript' src="assets/js/inde.js"></script>
        <script src="assets/js/message.js" async></script>
    </body>



    </html>
