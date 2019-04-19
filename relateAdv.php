<?php
include 'class/login.php';
include 'core/init.php';
$showTimeline=False;
if(login::isLoggedIn()){
     $userid =login::isLoggedIn();
    
     $showTimeline=True;
//    echo 'User find';
    
}
$user_id =login::isLoggedIn();

$userInfo = $getFromPo->userData($user_id);




        if(isset($_GET['adId'])){

    $advID = $getFromPo->checkInput($_GET['adId']);
            
                
                
        $ad_details= $getFromPo->postDetails($advID);
foreach($ad_details as $post_det){
     $image = $post_det->img;
//    $complex = array('more', 'complex', 'object', array('foo', 'bar'));

      


$character = json_decode($image);

 ?>
    <!DOCTYPE html>
    <html lang="en">

    <head>
        <meta charset="UTF-8">
        <title>
            ভাড়া.বাংলা</title>
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
        <div class="post_de"></div>



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



                var userID = '<?php echo $user_id; ?>';
                //            $(".post_de").remove().slideToggle(500);
                //            $(this).after("<div class='post_de'></div>");
                var har = <?php echo $advID; ?>;

                var post_head = '<?php echo $post_det->headline; ?>';

                var postI = '<?php echo $character[0]->imageName; ?>';
                var postImage = 'files/' + postI + '';
                //            var har = $(this).data('advid');

                //            var har = 'how';
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
                    //                 $( "p" ).after( "<b>Hello</b>" );
                    console.log(jsonn[0].userid, userID)
                    if (jsonn[0].userid == userID) {
                        $(".det_chat_wr").after("<div class='chatBox' style='display:none; padding-top: 1rem; overflow-y: scroll;    background-color: white;position:relative;' data-advUserId=" + jsonn[0].userid + " data-userID=" + userID + " data-advId=" + jsonn[0].adv_id + "><div class='mainChat'style='border: 1px solid gray;border-radius: 5px; margin: 0 1rem 0rem 1rem;height: auto;overflow-y: scroll;position: relative;min-height: 300px; '><div class='bothMsg'></div></div><div class='closeChat'><div class='closeBtn' style='cursor:pointer;'>close</div></div>");
                    } else {
                        $(".det_chat_wr").after("<div class='chatBox' style='display:none;max-height:300px;overflow-y: scroll;padding-top: 1rem;background-color: white;' data-advUserId=" + jsonn[0].userid + " data-userID=" + userID + " data-advId=" + jsonn[0].adv_id + "><div class='mainChat'style='border: 1px solid gray;border-radius: 5px;margin: 0 1rem 0rem 1rem; box-shadow: -1px -1px 3px black;'><div class='bothMsgg'><div class='leftMsgText'><div class='leftMsg'>Hi</div><div class='leftMsgTime'></div></div></div><div class='bothMsg'></div><div class='sendBox'><div class='writeMsg' style='border: 1px solid darkseagreen;'><input type='text'class='text' style='flex-basis: 80%; border: none;margin-bottom: 0;height: 20px; font-size: 0.8rem;Background:white;'id='msgInput'></div><div class='sendMsg' data-userid=" + userID + " data-advid=" + jsonn[0].adv_id + " data-advuserid=" + jsonn[0].userid + ">send</div></div></div></div><div class='closeChat'><div class='closeBtn' style='cursor:pointer;'>close</div></div>");
                    }


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
                    if (jsonn[0].nego == 'true') {
                        $(".negot").html("আলোচনা সাপেক্ষে");

                    }
                    $(".det_img_cent").html("ভাড়া মূল্য:" + jsonn[0].price + "");
                    $(".det_s_mo").html("+880" + jsonn[0].mobile + "");
                    $(".det_user").html("বিজ্ঞাপন দাতা:" + jsonn[0].userName + "");
                    $(".det_details").html(jsonn[0].details);
                    if (jsonn[0].lat != '0.000000') {
                        $(".mapClick").html("<img src='assets/img/goodfit.png' alt='' style='height: 300px;width: 100vw;margin-top: -46px;' onclick='showMapp(" + jsonn[0].lat + "," + jsonn[0].lng + ")' />");


                    }



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
                    $(".mapClick").on("click", function() {
                        $(this).slideUp(500);
                        $("#map").css({
                            "height": "300px"
                        });
                    });

                });

                $(".post_de").html("<div class='fullScr'><div class='det_post'><div class='mainPart'></div> <div class='header_wrapper' style='    width: 100%; position:fixed; z-index:99; height: 2.986rem;'><div class='logo'><div class='back_arrow' style='font-size:42px; text-shadow:none; color:white;'><img src='https://img.icons8.com/metro/50/ffffff/undo.png'></div><a href='http://bhara.com' style='display:none;'><img src='assets/img/logo.svg' alt=''></a></div><a style='text-decoration:none;' href='http://bhara.com'><div class='brandName' style='margin-top: 0.482rem;'>ভাড়া.কম</div></a><a href='#adv' style='display:none;'><div class='post_adv'>Post Adv</div></a><div class='account_icon' style='    visibility: hidden;'><img src='assets/img/account.svg' alt=''></div></div><div class='ad_heading'style='margin-top: 3.8rem;'>" + post_head + "</div><div class='det_area desktop' style=''><div class='det_add' style='margin-left:10px;'> ,</div><div class='det_ps' style='margin-left:10px;'> ,</div><div class='det_dis' style='margin-left:10px;'></div></div><div class='img_det_cont'><div class='store_img' style='display:none;'></div><input type='hidden' id='step' value=''><div class='featured-image-preview'><img src='' class='big-img'><button id='next-img'><div class='next_pic' >❯</div></button><button id='prev-img'><div class='prev_pic'>❮</div></button></div><div class='featured-image-list'></div></div><div class='det_area mob_view' style=''><div class='det_add' style='margin-left:10px;'> ,</div><div class='det_ps' style='margin-left:10px;'> ,</div><div class='det_dis' style='margin-left:10px;'></div></div> <div class='det_feat' style='display:flex;'><div class='det_feat_1' style='margin-left:10px;'></div><div class='det_feat_2' style='margin-left:10px;'></div><div class='det_feat_3' style='margin-left:10px;'></div><div class='det_feat_4' style='margin-left:10px;'></div></div><div class='priceWrap'><div class='det_img_cont'><div class='det_img_cent'></div><div class='negot' style='color:gray;'></div></div></div><div class='part_div' style='margin-bottom:1.2rem;'></div><div class='conWrap'><div class='det_cont_wrap' style='background-color: #158a8f17; width: 100%;'><div class='det_contact'><div class='det_mob'><div class='mob_sym'><img src='../../assets/img/icons8-outgoing-call-36.png' style='vertical-align: middle;margin-top: 0.482rem;' alt=' style='color: white;width: 32px;'> </div><div class='det_s_mo'></div><div class='det_s_tex' style='cursor:pointer;'>ফোন নাম্বার দেখতে ক্লিক করুন</div></div></div><div class='det_chat_wr' id='unseenMsg'><div class='det_chat'><img src='../../assets/img/icons8-communication-36.png' style='vertical-align: middle;margin-top: -0.233rem;' alt=' style='color: white;width: 32px;opacity: 0.5;'> </div><div class='det_chat_tex' style='cursor:pointer;'>চ্যাট</div></div><div class='det_mob'><div class='mob_sym'> <img src='../../assets/img/icons8-customer-36.png' alt=' style='color: white;width: 32px;opacity: 0.5;'></div><div class='det_user' style='font-size:0.81rem;'></div></div></div></div><br ><div class='descWrap'><div class='part_div'></div><span style='margin-right: auto;margin-left: 1rem;color: black;font-size: 0.9rem;margin-top: 0.694rem;margin-bottom: 0.694rem;'>বর্ণনা:</span><div class='det_details' style='padding: 0px 1rem;color: black;margin-bottom: 2rem;font-size: 0.8rem;'></div><div class='geocoder'><div id='geocoder'></div></div><div class='mapWrap' style='position:relative;' ><div class='mapClick' style='background-color: white;z-index: 99;overflow:hidden;'></div><div id='map' style=''></div></div><span style='margin-right: auto;margin-left: 1rem;color: black;font-size: 0.9rem;margin-top: 0.694rem;'> বিজ্ঞাপনটি শেয়ার করুন: </span><div class='adv_shb'></div><span style='    margin-right: auto;margin-left: 1rem;color: black;font-size: 0.9rem;margin-top: 0.694rem;margin-bottom: 0.694rem;'>অনুরূপ বিজ্ঞাপন:</span><div class='relAdvWrap'><span class='rel_adv'></span></div><div class = 'json_store' style = 'display:none;'></div ></div></div></div>");
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
                    window.history.back();
                });
                $(".det_mob").on("click", function() {
                    $(".det_s_tex").hide();
                    $(".det_s_mo").show();


                });
            });

        </script>





    </body>
    <?php }
        } ?>

    </html>
