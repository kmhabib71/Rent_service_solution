<?php include 'include/header.php'; ?>


<body>


    <div data-role="page" id="homepage">

        <style>
            a.ui-collapsible-heading-toggle.ui-btn.ui-btn-icon-left.ui-btn-e.ui-icon-plus {
                background-color: white;
                border: none;
                box-shadow: none;
            }
            
            a.ui-collapsible-heading-toggle.ui-btn.ui-btn-icon-left.ui-btn-e.ui-icon-minus {
                box-shadow: none;
            }

        </style>

        <?php include'include/panel.php'; ?>
        <?php include'include/headerDownPart.php'; ?>
        <?php include'include/placeSearch.php'; ?>


        <div data-role="content" class="ui-content contentt" role="main">
            <!--        <div data-role="content" class="ui-content" role="main">-->
            <div class="msg_det_container">

            </div>
            <div class="mainWrap" style="flex-direction: inherit;">
                <?php include 'include/desktopMenu.php'  ?>

                <div class="messengerWrap" style="display: flex;flex-direction: column;width: 100%;position:relative;">

                    <div class="userMsg" style="display: flex; justify-content: space-between;    padding: 0.233rem 0.694rem;border-bottom: 1px solid #ddd;">
                        <div class="userPar" style="display: flex;">
                            <div class="userFace" style=" display: flex;justify-content: center;align-items: center;">
                                <div class="pro_pic" style=" width: 40px;height: 40px;border-radius: 50%;    border: 1px solid;background-color: gray;"><img src="<?php
                                    if($userid != ''){
                                    echo $userInfo->profileImage; }else{
                                        echo 'assets/images/defaultProfileImage.png';
                                    } ?>" alt="">
                                </div>
                            </div>

                            <div class="messa" style="display: flex; justify-content: center; align-items: center;margin-left: 0.694rem;font-size: .9rem;font-weight: 600;">Messages</div>
                        </div>
                        <div class="composeMsg" style="font-size:1rem;text-align: center; display: flex;justify-content: center; align-items: center;"><img src="assets/img/icons8-pencil-27.png" alt=""></div>
                    </div>


                    <div class="part_di" style="height: 1rem;"></div>
                    <?php
                        
                        
   
                
                        
                        

                     

        if($userid !== ''){
                        $allMsg = $getFromM->userAllMsg($userid);
                    
                    foreach($allMsg as $msg){
                        $msgFrom =  $msg->messageFrom;
                        $useridd =  $msg->messageTo;
                        $advid =  $msg->advId;
                        $msgCount = $getFromM->msgsViewCount($msgFrom, $advid, $useridd);
                        
                        $senderUserInfo = $getFromPo->userData($msg->messageFrom);
                        ?>
                        <?php
                        
                        
                        ?>
                            <div class="userAllMsg" style="padding: 0.233rem 0.694rem; display: flex; cursor: pointer;border-bottom: 1px solid lightgray;" data-msgfrom="<?php echo $msg->messageFrom; ?>" data-userid="<?php echo $userid; ?>" data-advid="<?php echo $msg->advId; ?>">

                                <div class="userMsgWr" style="display: flex;flex-basis: 90%;">
                                    <div class="userMsgPic" style=" width: 40px;height: 40px; background-color: lightcoral; border-radius: 50%;display: flex;justify-content: center;align-items: center;">
                                        <?php
                         $header = $senderUserInfo->username;
                     
//                            $firstLetter = $header[0];
                        if($senderUserInfo->profileImage != ''){echo '<img src="'.$senderUserInfo->profileImage.'" style=" width: 40px;height: 40px;border-radius: 50%;" alt=""> '; }else{echo $firstLetter;} ?>



                                    </div>
                                    <div class="userMsgText" style="display: flex; flex-direction: column;margin-left: 0.694rem;width: 30%;height: 40px;overflow: hidden;">

                                        <div class="msgName" style="font-size: 0.694rem;font-weight: 600;">
                                            <?php
                         if($msg->username === ''){
                          echo $senderUserInfo->mobile;
                      }else{echo $msg->username ;}
                        
                        
                        ?>

                                        </div>
                                        <div class="msgText" style="color: gray; font-size: 0.5rem;">
                                            <?php echo $msg->message; ?>........ <span style=""><?php echo $getFromPo->timeAgo($msg->messageOn); ?></span>
                                        </div>
                                    </div>
                                    <div class="advInfo" style="border: 1px solid gray;border-radius: 5px;display: flex;padding: 1px 10px;width: 50%;box-shadow: 0px 0px 1px grey;">
                                        <div class="advImag" style="display: flex;align-items:center; justify-content:center;">
                                            <?php  $image = $msg->img;
$character = json_decode($image);
$imagee = $character[0]->imageName;
                        echo '<img src="files/'.$imagee.'" style="height:35px;width:35px;" class="getImg">';
                                   ?>
                                        </div>
                                        <div class="advheadi" style="font-size: 0.694rem;display: flex;margin-left: 1rem;">
                                            <?php echo $msg->headline; ?>
                                        </div>
                                        <div class="timeAg" style="font-size: 0.482rem;color:gray;margin-left:1rem;">
                                            <?php echo $getFromPo->timeAgo($msg->date_time); ?>
                                        </div>

                                    </div>
                                </div>
                                <div class="userMsgSeen" style="font-size: 0.694rem;display: flex; justify-content: center; align-items: center;">


                                    <?php
                        if(!empty($msgCount)){
            echo '<div class="seen" style="color: #8a2be2;">Unseen</div>';}else{echo '<div class="seen">Seen</div>';
        } 
                         ?>
                                </div>
                            </div>




                            <?php
                    }
            }else{
            ?>
             <div class="newLogUp" style=" border: 1px solid gray;box-shadow:0px 0px 1.233rem #75d321;border-radius:5px; margin:1rem; background-color:#ffffff; padding: 5px; height:100%; width: 92%;"><div style="font-size: 0.8rem;margin-bottom: 0.694rem;color: #e2574c;">অনুগ্রহ পূর্বক লগইন অথবা সাইনআপ করুন:</div><div style="font-size: 0.8rem;">মোবাইল:</div><input type="text" name="logUp" style="border-bottom: none;background-color:white !important;font-size: 0.694rem;height: 1.9rem;" placeholder="Mobile Number" id="logText"><div style="font-size: 0.8rem;">পাসওয়ার্ড:</div><input type="password" name="passLogUp" style="font-size: 0.694rem;height: 1.9rem;border-bottom: none;" placeholder="Password" id="logPass"><button style=" box-shadow: none;border-radius: 5px;text-shadow: none;border: 1px solid gray;background-color: #f9c430;cursor: pointer;" class="logUpSubmit" data-advid="'+advID+'" data-advuserid="'+advUserID+'">সাবমিট</button><div class="mobile_error" style="display:none;color:red;font-size:0.694rem;"></div></div>   
          <?php      
        }
                    ?>

                </div>

            </div>
            <?php echo '<div class="nameCat" style="display:none;">'.$catID.'</div>'; ?>
            <div class="userID" data-userid="<?php echo $userid; ?>"></div>
            <a href="index.php" id="hrefIdentify" style="display:none;"></a>
            <div class="shareBu" style="display:none;">
                <?php echo $shareBut; ?>
            </div>
        </div>








    </div>
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
                window.location.href = 'http://localhost/bhara/message.php';
                }
            })
}
               }


           } else {
               $(".mobile_error").show().html("Charackter  must be under 14. Ex: 01815 123456");
           }
           
     
       });


            $(".userAllMsg").on("click", function() {

                $('.seen').html('Seen');
                $('.seen').css({
                    "color": "black"
                });



                var msgFrom = $(this).data("msgfrom");
                var userid = $(this).data("userid");
                var advid = $(this).data("advid");
                var imgVal = $(this).find('.getImg').attr('src');
                var headVal = $(this).find('.advheadi').text();
                //                console.log(advHeadVal);
                //                var advHeadVal = $(advheadi).attr(src);
                //                    $(".post_de").remove().slideToggle(500);
                var msgShowDiv = $(this).closest(".messengerWrap");
                $(msgShowDiv).prepend("<div class='post_de' style='position: absolute;right: 0;left: 0;bottom: 0;top: 0;'></div>");


                //                    $(".userAllMsg").css({
                //                        opacity: "none"
                //                    });
                console.log(msgFrom, userid, advid);
                var post_head = 'Found';

                getMsg = function() {

                    $.post('http://localhost/bhara/core/ajax/message.php', {
                        msgFrom: msgFrom,
                        userid: userid,
                        advid: advid
                    }, function(data) {

                        $(".bothMsg").html(data);
                    });



                }




                var userMsg = setInterval(getMsg, 1000);
                $(document).on("click", ".back_arrow", function() {
                    clearInterval(userMsg);
                    $(".fullScr").remove();
                    $(".post_de").remove();

                });

                $.post('http://localhost/bhara/core/ajax/message.php', {
                    msgFrom: msgFrom,
                    userid: userid,
                    advid: advid
                }, function(data) {

                    $(".bothMsg").html(data);
                    var autoscroll = true;
                    $('.chatBox').on('scroll', function() {
                        //                     alert("false");
                        var ho = $(this).scrollTop()
                        console.log(ho);
                        if ($(this).scrollTop() < this.scrollHeight - $(this).height()) {
                            var autoscroll = false;
                            //                         alert("false");
                        } else {
                            var autoscroll = true;
                            //                         alert("true");
                        }
                    });

                    scrolldown = function() {
                        $('.mainChat').scrollTop($('.mainChat')[0].scrollHeight);
                    }
                    //                        autoscroll = true;
                    if (autoscroll) {
                        scrolldown();
                    }
                    //                        autoscroll = true;
                    //                        scrolldown = function() {
                    //                            $('.chatBox').scrollTop($('.bothMsg')[0].scrollHeight);
                    //                        }
                    //                        $('.chatBox').scrollTop($('.bothMsg')[0].scrollHeight);
                    $(".sendBox").html("<div class='writeMsg' style='border: 1px solid darkseagreen;'><input type='text' class='indMsg' style='flex-basis: 80%; border: none;margin-bottom: 0;height: 1.5rem;    font-size: 0.8rem;background-color:white;'></div><div class='sendIndMsgg' style='flex-basis: 22%;display: flex;justify-content: center;align-items: center;background-color: darkseagreen;color: white;font-size: 0.8rem;cursor: pointer;' data-msgto=" + msgFrom + " data-userid=" + userid + " data-advid=" + advid + ">send</div>");
                    $('.getImgg').attr('src', imgVal);
                    $('.advheadii').html(headVal);

                    //                        $('html, body').animate({ // 'scrollTop': $(".sendBox").position().top // });

                });
                $(".post_de").html("<div class='fullScr' style='background-color: rgba(255, 255, 255);z-index: 99;position:initial; overflow-y: unset;'><div class='det_post' style='background-color: #ffffff;    position: relative;'><div class='mainPart'></div><div class='advInfo' style='    background-color: #004359;    justify-content: start;border: 1px solid gray;border-radius: 5px;display: flex;padding: 9px 10px;width: 100%;box-shadow: 0px 0px 1px grey;position:absolute;z-index:99;    '><div class='back_arrow' style='display: flex;align-items: center;'><img src='assets/img/icons8-back-to-27.png' style='margin-top:0;cursor:pointer;'></div><div class='advPorda' style='    margin-left: 20%;border: 1px solid gray;border-radius: 5px;display: flex;padding: 9px 10px;width: 50%;box-shadow: 0px 0px 1px grey;z-index:99;    background-color: white;'><div class='advImag' style='display: flex;align-items:center; justify-content:center;'><img src='' style='height:35px;width:35px;' class='getImgg'></div><div class='advheadii' style='font-size: 0.694rem;display: flex;margin-left:0.695rem;'></div></div></div><div class='chatBox' style=' width:100%;position:relative;' data-advuserid='82' data-userid='82' data-advid='65'><div class='mainChat' style='    background-color: white;overflow-y: scroll;position: relative;height: 70vh;'><div class='bothMsg' style='display:flex;flex-direction:column; margin-top: 4rem;'></div></div></div><div class='json_store' style='display:none;'></div></div><div class='sendBox' style='padding: 0 10px;'></div></div>");




            });

            $(document).on("click", ".sendIndMsgg", function() {
                var msgto = $(this).data("msgto");
                var userid = $(this).data("userid");
                var advid = $(this).data("advid");
                var inpPre = $(this).prev(".writeMsg");
                var prevInp = $(inpPre).find(".indMsg");
                var indMsg = $(prevInp).val();
                console.log(msgto, userid, advid, inpPre, prevInp, indMsg);
                $.post('http://localhost/bhara/core/ajax/message.php', {
                    msgto: msgto,
                    indMsg: indMsg,
                    userid: userid,
                    advid: advid
                }, function(data) {
                    $.post('http://localhost/bhara/core/ajax/message.php', {
                        openChat: msgto,
                        userid: userid,
                        advid: advid

                    }, function(data) {
                        $(".bothMsg").html(data);
                        $(".indMsg").val('');

                    });








                });

            });


        });

    </script>
    <script src="assets/js/inde.js" async></script>
    <script src="assets/js/message.js" async></script>




</body>

</html>
