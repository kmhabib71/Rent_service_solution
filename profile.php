<?php
 include 'class/login.php';
include 'core/init.php';


$userid ='';

$showTimeline=False;
if(login::isLoggedIn()){
     $userid =login::isLoggedIn();
    
     $showTimeline=True;
    
}else{
//   header('Location: login/login.php');
}
$user_id =login::isLoggedIn();
$userInfo = $getFromPo->userData($userid);
$catID = '';
if(isset($_GET['cat'])){
    $catID = $_GET['cat'];
   
}

$i=0;


$allMsg = $getFromM->userAllMsg($userid);
foreach($allMsg as $msg){
    
    $msgFrom =  $msg->messageFrom;
    $useridd =  $msg->messageTo;
    $advid =  $msg->advId;
    $msgCount = $getFromM->msgsViewCount($msgFrom, $advid, $useridd);
        if(!empty($msgCount)){
           $i++;   
        }              
    }

?>

    <!DOCTYPE html>
    <html lang="en">

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




        <style>
            a.ui-collapsible-heading-toggle.ui-btn.ui-btn-icon-left.ui-btn-e.ui-icon-plus {
                background-color: white;
                border: none;
                box-shadow: none;
            }
            
            .single_post {
                padding: 0.482rem 0;
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
            
            table {
                border-collapse: collapse;
                width: 100%;
            }
            
            th,
            td {
                text-align: left;
                padding: 4px;
                height: 10px
            }
            
            tr {
                border: none;
            }
            
            mainn:after {
                content: '✍';
            }

        </style>

    </head>

    <body>


        <div data-role="page" id="sign_up">
            <?php include'include/panel.php'; ?>
            <?php include'include/headerDownPart.php'; ?>
            <?php include'include/placeSearch.php'; ?>

            <div data-role="main" class="ui-content mainn editProfileMain" style="background:#ebdaa6;height:100vh;">


                <div data-role="content" class="ui-content contentt" style="padding:0;" role="main">

                    <div class="post_det_container">
                        <h5 style="text-align: center;">আপনার প্রোফাইল</h5>
                    </div>
                    <div class="mainWrap">

                        <div class="post" style="background-color: #ebdaa6ba;    margin-top: 0.355rem;">
                            <div class="container" style="margin-top: 1rem;width:100%;position: relative;">
                                <a href="editProfile.php" id="editPr" data-ajax="false"><img src="assets/img/icons8-pencil-filled-36.png" alt="" style="width: 20px;height: 20px;"></a>
                                  <?php 
                                if($showTimeline){
                                
                                ?>
                                <div class="user_profile">

 
                                    <div class="user_pro">
                                        <div class="user_pro_pic">
                                            <?php  if($userInfo->profileImage != ''){ echo  "<img src='".$userInfo->profileImage."' id='existImg'>"; }else{ echo '<a href="editProfile.php"><div style="font-size:1.5rem;width: 2.986rem;height: 2.986rem;border: 2px solid #158a8f;text-align:center;">✍</div></a>'; } ?>
                                        </div>
                                        <div class="user_pro_name">
                                            <?php  if($userInfo->username != ''){ echo $userInfo->username; }else{?> <a href="editProfile.php">Enter your name</a>
                                            <?php } ?>
                                        </div>
                                    </div>
                                    <div class="user_pro_info" style="flex-basis: 60%; color: gray;font-size:0.698rem">
                                        <table>


                                            <?php  if($userInfo->mobile != ''){  ?>
                                            <tr>
                                                <td width="30%" style="color:black;">Mobile:</td>
                                                <td width="70%">
                                                    <?php echo $userInfo->mobile; ?>
                                                </td>

                                            </tr>
                                            <?php } ?>

                                            <?php  if($userInfo->email != ''){  ?>
                                            <tr>
                                                <td width="30%" style="color:black;">Email:</td>
                                                <td width="70%">
                                                    <?php echo $userInfo->email; ?>
                                                </td>

                                            </tr>
                                            <?php }else{?>
                                            <tr>
                                                <td width="30%" style="color:black;">Email:</td>
                                                <td width="70%">
                                                    <a href="editProfile.php">
                                        Enter your Email
                                        </a>
                                                </td>

                                            </tr>
                                            <?php } ?>
                                            <?php  if($userInfo->email != ''){  ?>
                                            <tr>
                                                <td width="30%" style="color:black;">Address:</td>
                                                <td width="70%">
                                                    <?php echo $userInfo->address; ?>
                                                </td>

                                            </tr>
                                            <?php }else{?>

                                            <tr>

                                                <td width="30%" style="color:black;">Address:</td>
                                                <td width="70%">
                                                    <a href="editProfile.php">
                                        Enter your Address
                                        </a>
                                                </td>

                                            </tr>

                                            <?php } ?>

                                        </table>


                                    </div>
                                </div>
                                <h6 style="margin:1.5rem 0;">প্রকাশিত বিজ্ঞাপন সমূহ:</h6>


                                <div class="user_adv_info">
                                    <?php
                    
                    $host = $getFromPo->advData($user_id);
                    
//                    if( $host != '') { $host; } else {echo 'আপনি এখনো কোনো বিজ্ঞাপন প্রকাশ করেন নি।'; }
                    
                    
                 

                
                
                
                ?>

                                </div>
                                  <?php }else{?> 
                                  
                                   <div class="newLogUp" style="border: 1px solid gray;box-shadow:0px 0px 1.233rem #75d321;border-radius:5px; margin: 1rem 0 ; background-color:#ffffff; padding: 5px; height:100%; width:100%;"><div style="font-size: 0.8rem;margin-bottom: 0.694rem;color: #e2574c;">অনুগ্রহ পূর্বক লগইন অথবা সাইনআপ করুন:</div><div style="font-size: 0.8rem;">মোবাইল:</div><input type="text" name="logUp" style="border-bottom: none;background-color:white !important;font-size: 0.694rem;height: 1.9rem;" placeholder="Mobile Number" id="logText"><div style="font-size: 0.8rem;">পাসওয়ার্ড:</div><input type="password" name="passLogUp" style="font-size: 0.694rem;height: 1.9rem;border-bottom: none;" placeholder="Password" id="logPass"><button style=" box-shadow: none;border-radius: 5px;text-shadow: none;border: 1px solid gray;background-color: #f9c430;cursor: pointer;" class="logUpSubmit" data-advid="'+advID+'" data-advuserid="'+advUserID+'">সাবমিট</button><div class="mobile_error" style="display:none;color:red;font-size:0.694rem;"></div></div>
                                     <?php }
                                ?>
                            </div>
                        </div>
                    <?php  if($showTimeline){
      include 'include/desktopMenu.php';           
                    
}else{?>
        <div id="desktopMenu" style="background: #29af7d;width: 16.5rem;">
    <!--            <h2>Menu Details</h2>-->
    <div class="menuWrap" style=" margin:0.694rem;">
        <ul style="color:#158a8f;">
            <li>

                <div class="pro_container">
                    <a href="editProfile.php" class="panel_link_style" data-ajax="false">
                        <div class="pro_pic"><img src="assets/images/defaultProfileImage.png" alt="">
                        </div>
                    </a>
                    <div class="pro_details">
                        <a href="editProfile.php" data-ajax="false" style="color: #ebdaa6; text-shadow:none;">
                            <div class="pro_name">
                               Name
                            </div>
                        </a>
                        <a href="editProfile.php" data-ajax="false" style="color: #ebdaa6; text-shadow:none;">
                            <div class="pro_mob">Mobile
                            </div>
                        </a>
                    </div>

                    <div class="notiFicIcon" style="margin-left:1rem; position:relative;">
                        <div class="notiCountt" style="    position: absolute;display: flex;background-color: blueviolet;border-radius: 50%;height: 25px;width: 25px;justify-content: center;box-shadow: 1px 1px 5px #427060;align-items: center;display:none;">0</div>

                        <img src="https://img.icons8.com/ios/50/000000/appointment-reminders.png" style="height:40px; width:40px;">

                    </div>
                    <div class="msgNotificIcon" style="margin-left:0.482rem; position:relative;display:none;" data-userid="">
                        <div class="notiCount" style="    position: absolute;display: flex;background-color: blueviolet;border-radius: 50%;height: 25px;width: 25px;justify-content: center;box-shadow: 1px 1px 5px #427060;align-items: center;color: white;text-shadow: none;">
                            
                        </div>

                        <a href="message.php" data-ajax="false">
                            <img src="https://img.icons8.com/ios/50/000000/speech-bubble.png" style="height:40px; width:40px;right: 0;">
                        </a>
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
       
            <li class="pro_li">
                <a href="profile.php" data-ajax="false" class="panel_link_style"><span class="pro_icon"><img src="assets/img/icons8-name-tag-36.png" alt="" style="vertical-align:middle;"></span>প্রোফাইল</a>
            </li>
            <li class="pro_li">
                <a href="message.php" data-ajax="false" class="panel_link_style"><span class="pro_icon"><img src="assets/img/icons8-speech-bubble-36.png" alt="" style="vertical-align:middle;"></span>চ্যাট</a>
            </li>
            <li class="pro_li">
                <a href="rentAccount.php" style='display:none;' class="panel_link_style" data-ajax="false"><span class="pro_icon"><img src="assets/img/icons8-estimate-36.png" alt="" style="vertical-align:middle;"></span>ভাড়া হিসাব</a>
            </li>
          
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
       
               <?php } ?>
                    </div>

                </div>






            </div>



        </div>
        <?php include'include/footerAll.php'; ?>
<script>    
        
     $(document).on("click", ".logUpSubmit", function () {
           var mob = $("#logText").val();
           var pass = $("#logPass").val();
           var exadvid = $(this).data("advid");
           var exadvuserid = $(this).data("advuserid");
           
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
                 exadvid: exadvid,
                 exadvuserid: exadvuserid

             }, function (data) {
                if (!$.trim(data)){   
    
                }else{   
                window.location.href = 'http://localhost/bhara/profile.php';
                }
            })
}
               }


           } else {
               $(".mobile_error").show().html("Charackter  must be under 14. Ex: 01815 123456");
           }
           
     
       });   
        
        </script>