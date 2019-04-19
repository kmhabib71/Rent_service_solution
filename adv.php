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
if(!$showTimeline){
   echo '<div class="fullScr" style="background-color: #11111175;" ><div class="newLogUp" style="transform: translateX(50%) translateY(50%); border: 1px solid gray;box-shadow:0px 0px 1.233rem #75d321;border-radius:5px; margin:1rem; background-color:#ffffff; padding: 5px; height:50%; width: 46%;"><div style="font-size: 0.8rem;margin-bottom: 0.694rem;color: #e2574c;">অনুগ্রহ পূর্বক লগইন অথবা সাইনআপ করুন:</div><div style="font-size: 0.8rem;">মোবাইল:</div><input type="text" name="logUp" style="border-bottom: none;background-color:white !important;font-size: 0.694rem;height: 1.9rem;" placeholder="Mobile Number" id="logText"><div style="font-size: 0.8rem;">পাসওয়ার্ড:</div><input type="password" name="passLogUp" style="font-size: 0.694rem;height: 1.9rem;border-bottom: none;" placeholder="Password" id="logPass"><button style=" box-shadow: none;border-radius: 5px;text-shadow: none;border: 1px solid gray;background-color: #f9c430;cursor: pointer;" class="logUpSubmit" data-advid="" data-advuserid="">সাবমিট</button><div class="mobile_error" style="display:none;color:red;font-size:0.694rem;"></div></div></div> ';
}else{ }
//header("Refresh:0");

if(isset($_POST['get_cat_val'])){
    
    $cat_val = $_POST['get_cat_val'];
if($cat_val == "1"){ echo '<div class="adv_publish adv_cont">
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



                <br> আপনার নাম: <br>
                <input type="text" name="edit_name" id="edit_name_text" placeholder="আপানার নাম যুক্ত করুন" value="<?php echo $userInfo->username; ?>">

    <br> আপনার মোবাইল নাম্বার: <br>
    <input type="text" name="edit_mob" id="edit_mob_text" placeholder="  আপানার মোবাইল নাম্বার যুক্ত করুন" value="<?php echo $userInfo->mobile; ?>"> আপানার ইমেইল: <br>
    <input type="text" name="edit_email" id="edit_email_text" placeholder="আপানার ইমেইল যুক্ত করুন" value="<?php echo $userInfo->email; ?>">


    </div>
    </div>
    <button id="adv_sub">বিজ্ঞাপন প্রচার করুন</button>
    <div id="adv_dem"></div>
    <div id="adv_demo">


    </div>
    <div id="error_multiple_files">

    </div>







    </div>'; }else if($cat_val == "2"){ echo 'I got two'; }else if($cat_val == "3"){ echo 'I got seven'; }else if($cat_val == "4"){ echo 'I got seven'; }else if($cat_val == "5"){ echo 'I got seven'; }else if($cat_val == "6"){ echo 'I got seven'; }else if($cat_val == "7"){ echo 'I got seven'; }else if($cat_val == "8"){ echo 'I got seven'; }else if($cat_val == "9"){ echo 'I got seven'; }else if($cat_val == "10"){ echo 'I got seven'; }else if($cat_val == "10"){ echo 'I got seven'; }else if($cat_val == "10"){ echo 'I got seven'; }else{ echo 'I haven\'t fount'; } }; ?>






    <!DOCTYPE html>
    <html lang="en">

    <head>
        <meta charset="UTF-8">
        <title>ভাড়া.কম</title>
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="stylesheet" href="assets/css/materialize.min.css">
        <link rel="stylesheet" href="assets/css/jquery_mobile.min.css">
        <script src="assets/js/jquery.js"></script>
        <script src="assets/js/jquery_mobile.min.js"></script>
        <link rel="stylesheet" href="assets/css/mobileCustomSmall.css" media="screen and (max-width: 329px)">

        <link rel="stylesheet" href="assets/css/mobileCustom.css" media="screen and (min-width: 330px) and (max-width: 767px)">

        <link rel="stylesheet" href="assets/css/desktop.css" media="screen and (min-width: 768px) and (max-width : 1224px)">

        <link rel="stylesheet" href="assets/css/desktopLarge.css" media="screen and (min-width : 1225px) and (max-width : 1824px)">


    </head>

    <body>
        <div data-role="page" id="adv">
            <div class="header_wrapper" style="    width: 100%; position:fixed; z-index:9; height: 2.986rem;">
                <div class="logo">
                    <div class="back_arrow backk" style="font-size:42px; text-shadow:none; color:white;"><img src="https://img.icons8.com/metro/50/ffffff/undo.png"></div>
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


            <!-- multistep form -->
            <div class="adv_container">
                <ul class="progressbar">
                    <li>ভাড়া প্রোপার্টি</li>
                    <li>ভাড়া এলাকা</li>
                    <li>বিবরণ ও প্রচার</li>
                </ul>

            </div>
            <div class="adv_step">
                <!--            <form action="#">-->
                <div class="adv_item adv_cont" style="box-shadow:none;padding: 0;    margin-top: -1.5rem;">
                    <div class="prop_headi">ভাড়া প্রোপার্টি প্রস্থাব করুন:</div>


                    <div class="prop_list" style="border: 1px solid #ddd;padding: 5px;margin: 3px;box-shadow: 0px 0x 5px gray;box-shadow: gray;box-shadow: 0px 0px 10px grey;border-radius: 10px;background-color: white;width: 94%;vertical-align: middle;margin: 0 auto;">
                        <label for="select-native-4" style="font-size: 0.694rem;
    margin-top: 0.694rem;">ভাড়া প্রোপার্টি ক্যাটাগরি</label>
                        <div class="cat_sel">
                            <div class="sub_head">রুম/বাসা/ফ্ল্যাট</div>
                            <div class="house_cat" style="display:flex; justify-content: space-between;">
                                <div class="room_sub sub_box cat_click" data-cat="3">
                                    <div class="sub_img"><img src="assets/img/room-2.png" alt="" class="imgSub"></div>
                                    <div class="sub_name"> রুম</div>

                                </div>
                                <div class="house_sub sub_box cat_click" data-cat="2">
                                    <div class="sub_img"><img src="assets/img/house-2.png" alt="" class="imgSub"></div>
                                    <div class="sub_name"> বাসা</div>
                                </div>
                                <div class="flat_sub sub_box cat_click" data-cat="1">
                                    <div class="sub_img"><img src="assets/img/flat-2.png" alt="" class="imgSub"></div>
                                    <div class="sub_name"> ফ্ল্যাট</div>
                                </div>
                            </div>
                            <div class="sub_head">গাড়ি</div>
                            <div class="vehicle_cat" style="display:flex;justify-content: space-between;">
                                <div class="car_sub sub_box cat_click" data-cat="6">
                                    <div class="sub_img"><img src="assets/img/carNav.png" alt="" class="imgSub"></div>
                                    <div class="sub_name"> কার</div>
                                </div>
                                <div class="bus_sub sub_box cat_click" data-cat="8">
                                    <div class="sub_img"><img src="assets/img/truck2.png" alt="" class="imgSub"></div>
                                    <div class="sub_name">ট্রাক</div>
                                </div>
                                <div class="truck_sub sub_box cat_click" data-cat="7">
                                    <div class="sub_img"><img src="assets/img/bus3.png" alt="" class="imgSub"></div>
                                    <div class="sub_name"> বাস</div>
                                </div>
                            </div>
                            <div class="sub_head"> কমার্শিয়াল স্পেইস </div>
                            <div class="comspace_cat" style="    ">
                                <div class="sub_part_2" style="display:flex; justify-content: space-between; margin-bottom: 3.5rem;">
                                    <div class="showrom_sub sub_box cat_click" data-cat="10">
                                        <div class="sub_img"><img src="assets/img/showroom.png" alt="" class="imgSub"></div>
                                        <div class="sub_name"> শো-রুম</div>
                                    </div>
                                    <div class="bank_sub sub_box cat_click" data-cat="9">
                                        <div class="sub_img"><img src="assets/img/bank.png" alt="" class="imgSub"></div>
                                        <div class="sub_name"> ব্যাংক/বীমা</div>
                                    </div>
                                    <div class="storage_sub sub_box cat_click" data-cat="19">
                                        <div class="sub_img"><img src="assets/img/store.png" alt="" class="imgSub"></div>
                                        <div class="sub_name"> স্টোর হাউস</div>
                                    </div>
                                </div>
                                <div class="sub_part_1" style="display:flex; justify-content: space-between;  margin-bottom: 3.5rem;">
                                    <div class="factory_sub sub_box cat_click" data-cat="20">

                                        <div class="sub_img"><img src="assets/img/factory.png" alt="" class="imgSub"></div>
                                        <div class="sub_name"> ফ্যাক্টরি</div>
                                    </div>
                                    <div class="hotel_sub sub_box cat_click" data-cat="21">
                                        <div class="sub_img"><img src="assets/img/hotel.png" alt="" class="imgSub"></div>
                                        <div class="sub_name"> হোটেল</div>
                                    </div>
                                    <div class="office_sub sub_box cat_click" data-cat="22">
                                        <div class="sub_img"><img src="assets/img/office.png" alt="" class="imgSub"></div>
                                        <div class="sub_name"> অফিস</div>
                                    </div>
                                </div>

                                <div class="sub_part_2" style="display:flex; justify-content: space-between;">
                                    <div class="restaurent_sub sub_box cat_click" data-cat="23">
                                        <div class="sub_img"><img src="assets/img/restaurent.png" alt="" class="imgSub"></div>
                                        <div class="sub_name"> রেস্ট্রুরেন্ট</div>
                                    </div>
                                    <div class="shop_sub sub_box cat_click" data-cat="11">
                                        <div class="sub_img"><img src="assets/img/shop.png" alt="" class="imgSub"></div>
                                        <div class="sub_name"> দোকান</div>
                                    </div>
                                    <div class="shop_sub sub_box cat_click" data-cat="11" style="visibility:hidden;">
                                        <div class="sub_img"><img src="assets/img/shop.png" alt="" class="imgSub"></div>
                                        <div class="sub_name"> দোকান</div>
                                    </div>

                                </div>
                            </div>

                            <div class="sub_head"> কন্সট্রাকশন মেশিন </div>
                            <div class="comspace_cat" style="    ">
                                <div class="sub_part_2" style="display:flex; justify-content: space-between; margin-bottom: 3.5rem;">
                                    <div class="showrom_sub sub_box cat_click" data-cat="25">
                                        <div class="sub_img"><img src="assets/img/excavator.png" alt="" class="imgSub"></div>
                                        <div class="sub_name"> এক্সকাভেটর</div>
                                    </div>
                                    <div class="bank_sub sub_box cat_click" data-cat="26">
                                        <div class="sub_img"><img src="assets/img/excavate.png" alt="" class="imgSub"></div>
                                        <div class="sub_name"> ডোজার</div>
                                    </div>
                                    <div class="storage_sub sub_box cat_click" data-cat="27">
                                        <div class="sub_img"><img src="assets/img/loader.png" alt="" class="imgSub"></div>
                                        <div class="sub_name"> লোডার</div>
                                    </div>
                                </div>
                                <div class="sub_part_1" style="display:flex; justify-content: space-between;  margin-bottom: 3.5rem;">
                                    <div class="factory_sub sub_box cat_click" data-cat="28">

                                        <div class="sub_img"><img src="assets/img/dumper.png" alt="" class="imgSub"></div>
                                        <div class="sub_name"> ডাম্পার</div>
                                    </div>


                                </div>
                            </div>
                            <div class="sub_head"> চুক্তিভিত্তিক নিয়োগ </div>
                            <div class="comspace_cat" style="    ">
                                <div class="sub_part_2" style="display:flex; justify-content: space-between; margin-bottom: 3.5rem;">
                                    <div class="showrom_sub sub_box cat_click" data-cat="29">
                                        <div class="sub_img"><img src="assets/img/personel.png" alt="" class="imgSub"></div>
                                        <div class="sub_name"> চুক্তিভিত্তিক নিয়োগ</div>
                                    </div>

                                </div>
                                <div class="sub_head"> অন্যান্য </div>
                                <div class="comspace_cat" style="    ">
                                    <div class="sub_part_2" style="display:flex; justify-content: space-between; margin-bottom: 3.5rem;">
                                        <div class="showrom_sub sub_box cat_click" data-cat="30">
                                            <div class="sub_img"><img src="assets/img/icons8-add-to-favorites-54.png" alt="" class="imgSub"></div>
                                            <div class="sub_name"> অন্যান্য</div>
                                        </div>

                                    </div>
                                    <!--
                            <div class="sub_head"> কন্সটাকশন মেশিন </div>
                            <div class="const_cat" style="display: flex;flex-flow: wrap;flex-wrap: wrap;justify-content: flex-start;">
                                <div class="crane_sub sub_box cat_click">room</div>
                                <div class="buldozer_sub sub_box cat_click">room</div>
                            </div>
                            <div style="font-size: 0.694rem;margin: 0.694rem;"> নিয়োগ </div>
                            <div class="perso_cat sub_box cat_click">room</div>
                            <div style="font-size: 0.694rem;margin: 0.694rem;"> অন্যান্য </div>
                            <div class="other_cat sub_box cat_click">room</div>
-->

                                </div>
                            </div>




                        </div>
                        <script>


                        </script>


                        <!--
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
-->
                        <div id="adv_con">


                        </div>

                        <!--            </form>-->
                        <div id="disi"></div>
                    </div>
                    <script type='text/javascript' src="assets/js/inde.js"></script>
                    <script>
                        $(function() {
                            $(".back_arrow").on("click", function() {
                                window.history.back();
                            });
$(document).on("click", ".logUpSubmit", function () {
           var mob = $("#logText").val();
           var pass = $("#logPass").val();
           // var exadvid = $(this).data("advid");
           // var exadvuserid = $(this).data("advuserid");
           
               if (mob != '') {

               const re = /^([০-৯]{5})[-. ]?([০-৯]{6})[ক-ঢ়অ-ঐ]?|([\d]{5})[-. ]?([\d]{6})$/;

               if (!re.test(mob)) {
                   $(".mobile_error").show().html("Charackter  must be under 14. Ex: 01815 123456");

               } else {
if (pass.length < 6 || pass.length > 60 ) { $(".mobile_error").show().html("password minimun length 6 character."); }else{
                   $(".mobile_error").hide();
                   var edit_mob_text_con = 'true';
                         $.post('http://localhost/bhara/core/ajax/newUser.php', {
                 mob: mob,
                 pass: pass,
                 // exadvid: exadvid,
                 // exadvuserid: exadvuserid

             }, function (data) {
                if (!$.trim(data)){   
    
                }else{   
                window.location.href = 'http://localhost/bhara/adv.php';
                }
            })
}
               }


           } else {
               $(".mobile_error").show().html("Charackter  must be under 14. Ex: 01815 123456");
           }
           
     
       });


                        })

                    </script>
                </div>


    </body>



    </html>
