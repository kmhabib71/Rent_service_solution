<?php
 include 'class/login.php';
include 'core/init.php';




$showTimeline=False;
if(login::isLoggedIn()){
     $userid =login::isLoggedIn();
    
     $showTimeline=True;
//    echo 'User find';
    
}else{
//   header('Location: login/login.php?page=editProfile');
}
$userid =login::isLoggedIn();

$userInfo = $getFromPo->userData($userid);
$advInfo = $getFromPo->advInfo($userid);

$editConfirm = [];
if(isset($_GET['updat'])){
    $catID = $_GET['updat'];
 
    if($catID == 'yes'){
        
    $editConfirm = 'আপনার  প্রোফাইল সফলভাবে আপডেট হয়েছে। ধন্যবাদ সাথে  থাকার জন্য।';
        }else{
 
    }
}else{
      
    }


$catID = '';
if(isset($_GET['cat'])){
    $catID = $_GET['cat'];
   
}

$i=0;

if($userid !== ''){
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

        </style>

    </head>

    <body>


        <div data-role="page" id="sign_up">
            <?php include'include/panel.php'; ?>
            <?php include'include/headerDownPart.php'; ?>
            <?php include'include/placeSearch.php'; ?>


            <div data-role="main" class="ui-content contentt " style="height:100vh;">

                <div data-role="content" class="ui-content contentt" style="padding:0;" role="main">

                    <div class="post_det_container">
                        <h5 style="text-align: center;background: #ebdaa6;margin: 0 0 0 0;padding: 0.9rem;">প্রোফাইল এডিট করুন </h5>
                    </div>
                    <div class="mainWrap">

                        <div class="post" style="background-color: #ebdaa6ba;    margin-top: 0.355rem; padding-right:0;">
                            <div class="container" style="margin-top: 1rem;width: 95%;">

                                <?php if(!empty($editConfirm)){?>
                                <div class="editConf" style=" color: #005a04;text-shadow: 1px 1px 5px #ddffde;padding: 5px;border: 1px solid;text-align: center;border-radius: 5px;">

                                    <?php
    echo $editConfirm;
 ?>
                                </div>
                                <?php }
                                if($showTimeline){
                                
                                ?>
                                
                                <div class="user_profile">
                                    <div class="user_pro">
                                        <a href="#upload_pro_pic" data-rel="popup">
                                            <div class="user_pro_pic">
                                                <?php  if($userInfo->profileImage != ''){ echo  "<img src='".$userInfo->profileImage."' id='existImg'>"; }else{ echo '<a href="editProfile.php"><div style="font-size:1.5rem;width: 2.986rem;height: 2.986rem;border: 2px solid #158a8f;text-align:center;">✍</div></a>'; } ?>
                                            </div>
                                        </a>
                                        <div data-role="popup" id="upload_pro_pic" class="ui-content" style="max-width:280px">
                                            <input type="file" name="upProPic" id="upProPic" style="font-size: 0.482rem;">
                                            <a href="#" data-rel="back" class="ui-btn ui-corner-all ui-shadow ui-btn-a ui-icon-delete ui-btn-icon-notext ui-btn-right">Close</a>

                                        </div>



                                        <div class="user_pro_name">
                                            <input type="text" name="editName" id="editName" value="<?php echo $userInfo->username; ?>" style="max-height:10px; font-size:0.6rem;background: #ebdaa6;">

                                        </div>
                                    </div>
                                    <div class="user_pro_info" style="flex-basis: 60%; color: gray;font-size:0.698rem">
                                        <table>



                                            <tr>
                                                <td width="30%" style="color:black;">Mobile:</td>
                                                <td width="70%">
                                                    <input disabled type="text" name="editMobile" id="editMobile" value="<?php echo $userInfo->mobile; ?>" style="max-height:10px; font-size:0.6rem;background: #ebdaa6;">

                                                </td>

                                            </tr>


                                            <tr>
                                                <td width="30%" style="color:black;">Email:</td>
                                                <td width="70%">
                                                    <input type="text" name="editEmail" id="editEmail" value="<?php echo $userInfo->email; ?>" style="max-height:10px;font-size:0.6rem;background: #ebdaa6;" placeholder="Enter your email">

                                                </td>

                                            </tr>



                                            <tr>
                                                <td width="30%" style="color:black;">Address:</td>
                                                <td width="70%" placeholder="Enter your email">
                                                    <input type="text" name="editAddress" id="editAddress" value="<?php echo $userInfo->address; ?>" style="max-height:10px;font-size:0.6rem;background: #ebdaa6;" placeholder="Enter your email">

                                                </td>

                                            </tr>


                                        </table>


                                    </div>

                                </div>
                                <div class="sub_wrap_cont" style="display:none;">
                                    <div class="sub_wrap" style="display: flex; justify-content: center;">
                                        <div class="info_submit" data-id="<?php echo $userid ?>" style="color: #4caf50;height: 2rem;width: 2rem;border: 1px solid #4caf50;border-radius: 50%;text-align: center;vertical-align: middle;display: flex;justify-content: center;align-items: center;cursor:pointer;">✔</div>
                                        <div class="info_submit_cancel" data-id="<?php echo $userid ?>" style="color: #ee6e73;height:2rem;width: 2rem;border: 1px solid #ee6e73;border-radius: 50%;text-align: center;vertical-align: middle;display: flex;justify-content: center;align-items: center;margin-left:0.694rem;cursor:pointer;">X</div>
                                    </div>
                                </div>
                                <h6>প্রকাশিত বিজ্ঞাপন সমূহ:</h6>


                                <div class="user_adv_info" id="user_adv">
                                    <?php
                    
                    $host = $getFromPo->advDataEdit($userid);
                    
//                    if( $host != '') { $host; } else {echo 'আপনি এখনো কোনো বিজ্ঞাপন প্রকাশ করেন নি।'; }
                    
                    
                 

                
                
                
                ?>

                                </div>
                                <?php }else{?> 
                                
                                 <div class="newLogUp" style="border: 1px solid gray;box-shadow:0px 0px 1.233rem #75d321;border-radius:5px; margin: 1rem 0 ; background-color:#ffffff; padding: 5px; height:100%; width:100%;"><div style="font-size: 0.8rem;margin-bottom: 0.694rem;color: #e2574c;">অনুগ্রহ পূর্বক লগইন অথবা সাইনআপ করুন:</div><div style="font-size: 0.8rem;">মোবাইল:</div><input type="text" name="logUp" style="border-bottom: none;background-color:white !important;font-size: 0.694rem;height: 1.9rem;" placeholder="Mobile Number" id="logText"><div style="font-size: 0.8rem;">পাসওয়ার্ড:</div><input type="password" name="passLogUp" style="font-size: 0.694rem;height: 1.9rem;border-bottom: none;" placeholder="Password" id="logPass"><button style=" box-shadow: none;border-radius: 5px;text-shadow: none;border: 1px solid gray;background-color: #f9c430;cursor: pointer;" class="logUpSubmit" data-advid="'+advID+'" data-advuserid="'+advUserID+'">সাবমিট</button><div class="mobile_error" style="display:none;color:red;font-size:0.694rem;"></div></div>
                                  
                                    <?php } ?>

                            </div>


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
        <script src="assets/js/inde.js" async></script>
        <script src="assets/js/message.js" async></script>
        <script src='https://api.tiles.mapbox.com/mapbox-gl-js/v0.48.0/mapbox-gl.js'></script>
        <link href='https://api.tiles.mapbox.com/mapbox-gl-js/v0.48.0/mapbox-gl.css' rel='stylesheet' />
        <style>


        </style>

        <script src='https://api.mapbox.com/mapbox-gl-js/plugins/mapbox-gl-geocoder/v2.3.0/mapbox-gl-geocoder.min.js'></script>
        <link rel='stylesheet' href='https://api.mapbox.com/mapbox-gl-js/plugins/mapbox-gl-geocoder/v2.3.0/mapbox-gl-geocoder.css' type='text/css' />

        <script>
            $(document).ready(function() {

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
                window.location.href = 'http://localhost/bhara/editProfile.php';
                }
            })
}
               }


           } else {
               $(".mobile_error").show().html("Charackter  must be under 14. Ex: 01815 123456");
           }
           
     
       });


                $(document).on("click", "#editName, .user_pro_pic, #editEmail, #editAddress", function() {
                    $('.sub_wrap_cont').show(500);



                });

                setTimeout(function() {
                    $(".editConf").hide(500);
                    //                    $.param('editProfile.php?updat=no');
                    //                    .$param("http://localhost/bhara/editProfile.php?updat=no")
                }, 5000);



                $(".info_submit_cancel").on("click", function() {
                    $('.sub_wrap_cont').hide(500);
                })
<?php  if($showTimeline){?> 
                $(document).on("click", ".editAdv", function() {
                    var delePost = confirm("আপনি কি বিজ্ঞাপনটি ডিলিট করতে চাচ্ছেন?")
                    if (delePost == true) {
                        var advId = $(this).data("advid");
                        var userId = $(this).data("userid");
                        var userID = <?php echo $userid;  ?>;
                        if (userId == userID) {
                            $.post('http://localhost/bhara/core/ajax/editProfile.php', {
                                advId: advId,
                                userId: userId,
                                userID: userID
                            }, function(data) {

                                $("#user_adv").load(location.href + " #user_adv");
                            });
                        };
                    }
                });
<?php }?>
                $("#existImg").load(function() {
                    console.log($(this).val());
                });


                $(".info_submit").on("click", function() {





                    var userId = $(this).data("id");
                    var editName = $("#editName").val();
                    var existImg = $("#existImg").attr('src');
                    var editMobile = $("#editMobile").val();
                    var editEmail = $("#editEmail").val();
                    var editAddress = $("#editAddress").val();
                    var name = $('#upProPic').val().split('\\').pop();

                    var imgName = 'userImg/' + name + ''
                    console.log(userId, editName, editMobile, editEmail, editAddress, imgName);



                    var file_data = $('#upProPic').prop('files')[0];
                    var form_data = new FormData();
                    form_data.append('file', file_data);
                    //                alert(form_data);
                    //                alert(name); // alert(existImg);
                    if (name != '') {
                        $.post('http://localhost/bhara/core/ajax/editProfile.php', {
                            editName: editName,
                            editMobile: editMobile,
                            editEmail: editEmail,
                            editAddress: editAddress,
                            imgName: imgName,
                            userId: userId
                        }, function(data) {
                            location.reload();
                        });

                        $.ajax({
                            url: 'http://localhost/bhara/core/ajax/editProfile.php', // point to server-side PHP script
                            dataType: 'text', // what to expect back from the PHP script, if anything
                            cache: false,
                            contentType: false,
                            processData: false,
                            data: form_data,
                            type: 'post',
                            success: function(data) {
                                //                            location.reload();
                            }
                        });

                        window.location.href = 'editProfile.php?updat=yes';
                    } else {
                        $.post('http://localhost/bhara/core/ajax/editProfile.php', {
                            editName: editName,
                            editMobile: editMobile,
                            editEmail: editEmail,
                            editAddress: editAddress,
                            imgName: existImg,
                            userId: userId
                        }, function(data) {
                            //                        location.reload();
                        });

                        window.location.href = 'editProfile.php?updat=yes';
                    }

                });


                //      post.............

            });

        </script>
    </body>

    </html>
