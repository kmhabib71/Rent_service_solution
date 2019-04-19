 $(document).ready(function () {



     function getMsg() {
         var advID = $(".chatBox").data("advid");
         var advUserID = $(".chatBox").data("advuserid");
         var userID = $(".chatBox").data("userid");

         $.post('http://localhost/bhara/core/ajax/message.php', {
             advID: advID,
             advUserID: advUserID,
             userID: userID,

         }, function (data) {
             $(".bothMsg").html(data);

         });

     }

     //kake bia korba?
     //    jar nijer upor jotheshto niontron ache.
     //    ja shobar shune kintu nijer kore. 
     //     #smartness#confidence#sincerity#loyalty#trust#love#all_in_two_line

     //    We are here in facebook to present us. Get some warm from other. For ensuring everthing around us is fine. It's all about us, na? yeah, then Who will we be without identity. And Identity is our production or our work. Then go for work it or be pleased to see others.  

     $(document).on("click", "li.notiClear", function () {
         var adv = $(this).data('adv');
         var userid = $(this).data('userid');
         var msgfrom = $(this).data('msgfrom');
         console.log(adv, userid, msgfrom);
         $.post('http://localhost/bhara/core/ajax/message.php', {
             adv: adv,
             userid: userid,
             msgfrom: msgfrom

         }, function (data) {


         });


     });


     //     $(document).on("click", ".msgNotificIcon", function () {
     //         var useid = $(this).data('userid');
     //         $(".notiChat").toggle();
     //         $.post('http://localhost/bhara/core/ajax/message.php', {
     //             useid: useid
     //
     //         }, function (data) {
     //             $(".notiChat").html(data);
     //
     //         });
     //     });
     //     $(document).on("click", ".msgNotificIconn", function (e) {
     //         var addSit = $(".allChat");
     //
     //         addSit.animate({
     //             height: 'toggle'
     //         }, 0);
     //         $('#lnk_add_sit').css('cursor', 'pointer').click(function (e) {
     //             e.preventDefault();
     //             addSit.animate({
     //                 height: 'toggle'
     //             }, 'fast');
     //         });
     //
     //
     //
     //
     //         var useidd = $(this).data('userid');
     //
     //         $.post('http://localhost/bhara/core/ajax/message.php', {
     //             useidd: useidd
     //
     //         }, function (data) {
     //             $(addSit).html(data);
     //
     //         });
     //     });

     $(document).on("click", ".det_chat_wr", function () {
         $(".chatBox").show('slow');
         var advID = $(".chatBox").data("advid");
         var advUserID = $(".chatBox").data("advuserid");
         var userID = $(".chatBox").data("userid");
         //         var precount = $(".precount").data("precount");
         //         console.log(precount);
         $(".closeChat").show().css({
             "visibility": "visible",
             "margin-top": "-20px",
             "padding-top": "20px"
         });
         getMessages = function () {
             $.post('http://localhost/bhara/core/ajax/message.php', {
                 advID: advID,
                 advUserID: advUserID,
                 userID: userID,

             }, function (data) {
                 $(".bothMsg").html(data);

                 $('.chatBox').on('scroll', function () {
                     //                     alert("false");
                     var ho = $(this).scrollTop()
                     console.log(ho);
                     if ($(this).scrollTop() < this.scrollHeight - $(this).height()) {
                         autoscroll = false;
                         //                         alert("false");
                     } else {
                         autoscroll = true;
                         //                         alert("true");
                     }
                 });
                 var sh = $(".chatBox")[0].scrollHeight;
                 var h = $(".chatBox").height();
                 var st = $(".chatBox").scrollTop()
                 console.log(st, sh, h);
                 scrolldown = function () {
                     $('.chatBox').scrollTop($('.chatBox')[0].scrollHeight);
                 }
                 autoscroll = true;
                 if (autoscroll) {
                     scrolldown();
                 }
                 //                 autoscroll = true;
                 //                 scrolldown = function () {
                 //                     $('.chatBox').scrollTop($('.chatBox')[0].scrollHeight);
                 //                 }

             });
         }
   
         if(userID != ''){
         if (advUserID != userID) {
             var timer = setInterval(getMsg, 1000);
         }

         getMessages();


         $(this).hide();
         $(document).on("click", ".closeChat", function () {
             clearInterval(timer);
             clearInterval(getMsg);
             //             clearInterval(userTimer);
             $(".chatBox").hide('slow');
             $(this).hide();
             $(".det_chat_wr").show();
         });
         $(document).on("click", ".back_arrow", function () {
             //                  window.history.back();
             clearInterval(timer);
             //             clearInterval(userTimer);
             clearInterval(getMsg);
             $(".fullScr").remove();
             $(".single_post").show();
             $("#persIndChat").empty();
         });

}else{
    
// $.post('http://localhost/bhara/core/ajax/message.php', {
//                 advID: advID,
//                 advUserID: advUserID,
//                 userID: userID,
//
//             }, function (data) {
//     
//      $(".bothMsg").html(data);
// });

$(".bothMsg").html('<div class="newLogUp" style="border: 1px solid gray;box-shadow:0px 0px 1.233rem #75d321;border-radius:5px; margin: 1rem 0 ; background-color:#ffffff; padding: 5px; height:100%; width:100%;"><div style="font-size: 0.8rem;margin-bottom: 0.694rem;color: #e2574c;">অনুগ্রহ পূর্বক লগইন অথবা সাইনআপ করুন:</div><div style="font-size: 0.8rem;">মোবাইল:</div><input type="text" name="logUp" style="border-bottom: none;background-color:white !important;font-size: 0.694rem;height: 1.9rem;" placeholder="Mobile Number" id="logText"><div style="font-size: 0.8rem;">পাসওয়ার্ড:</div><input type="password" name="passLogUp" style="font-size: 0.694rem;height: 1.9rem;border-bottom: none;" placeholder="Password" id="logPass"><button style=" box-shadow: none;border-radius: 5px;text-shadow: none;border: 1px solid gray;background-color: #f9c430;cursor: pointer;" class="logUpSubmit" data-advid="'+advID+'" data-advuserid="'+advUserID+'">সাবমিট</button><div class="mobile_error" style="display:none;color:red;font-size:0.694rem;"></div></div>');
    

    
    
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
                window.location.href = 'http://localhost/bhara/relateAdv.php?adId='+exadvid+'&newUser=yes';
                }
            })
}
               }


           } else {
               $(".mobile_error").show().html("Charackter  must be under 14. Ex: 01815 123456");
           }
           
     
       });
           
           
           
           $(document).on("click", ".closeChat", function () {
             clearInterval(timer);
             clearInterval(getMsg);
             //             clearInterval(userTimer);
             $(".chatBox").hide('slow');
             $(this).hide();
             $(".det_chat_wr").show();
         });
    $( "#msgInput" ).prop( "disabled", true ); 
          $( "#msgInput" ).attr("placeholder", "Please Login Or signup first.");
    
        $(".closeBtn").css({"display":"none"});
        $(".mainChat").css({"background-color":"#0b4548"});
    
}
         
          
         
         
     });


     $(document).on("click", ".sendMsg", function () {
         var inputVal = $("input#msgInput").val();
         var advID = $(this).data("advid");
         var advUserID = $(this).data("advuserid");
         var userID = $(this).data("userid");

         console.log(inputVal, advID, advUserID, userID);
         $.post('http://localhost/bhara/core/ajax/message.php', {
             inputVal: inputVal,
             advID: advID,
             advUserID: advUserID,
             userID: userID
         }, function (data) {
             //                 $(".chatBox").html(data);
             $("input#msgInput").val('');
             getMsg();


         });
     });


     $(document).on("click", ".chatList", function () {
         //         clearInterval(userTimer);
         //         $("#removeChat").remove();
         $("div#bothIndMsg").empty();
         $('div#bothIndMsg').removeAttr('id');



         $(this).removeAttr('id');
         var openChat = $(this).data("msgfrom");
         var userid = $(this).data("userid");
         var advid = $(this).data("advid");
         var persChat = $(this).next(".persChat");
         var bothMsgg = $(persChat).find(".bothMsgg");
         var mainChatt = $(persChat).find(".mainChatt");

         $(mainChatt).css({
             "position": "absolute",
             "top": "0",
             "right": "0",
             "left": "0",
             //             "bottom": "0",
             "padding": "2rem 1rem 1rem 1rem"


         });
         $(mainChatt).after('<div class="chatBack" style="color: white;position: absolute;top: 5px;"><img src="../../assets/img/icons8-back-to-27.png" style="cursor:pointer;"></div>');
         $(bothMsgg).attr('id', 'bothIndMsg');

         $("#bothIndMsg").after("<div class='sendBox'><div class='writeMsg' style='border: 1px solid darkseagreen;'><input type='text' class='indMsg' style='flex-basis: 80%; border: none;margin-bottom: 0;height: 1.5rem;    font-size: 0.8rem;background-color:white;'></div><div class='sendIndMsg' data-msgto=" + openChat + " data-userid=" + userid + " data-advid=" + advid + ">send</div></div>");
         var sendBut = $(persChat).find(".sendBox");
         $(sendBut).attr('id', 'sendBoxRemove');
         //         $(persChat).attr('id', 'persIndChat');
         //         $(persChat).toggle();
         userMessages = function () {
             $.post('http://localhost/bhara/core/ajax/message.php', {
                 openChat: openChat,
                 userid: userid,
                 advid: advid

             }, function (data) {
                 $("div#bothIndMsg").html(data);


             });
         }
         //         if (advUserID != userID) {
         //             var timer = setInterval(userMessages, 1000);
         //         }

         //         var timer = setInterval(userMessages, 1000);

         var userTimer = setInterval(userMessages, 1000);

         userMessages();


         $(document).on("click", ".chatBack", function () {
             clearInterval(userTimer);
             $("div#bothIndMsg").empty();
             $('div#bothIndMsg').removeAttr('id');
             $(this).remove();
             $("#sendBoxRemove").remove();
             $(mainChatt).css({


                 "padding": "0"


             });
         });


         $(document).on("click", ".back_arrow", function () {
             //                  window.history.back();

             //             clearInterval(userTimer);
             $(".fullScr").remove();
             $(".single_post").show();
             $("#persIndChat").empty();
         });
     });


     $(document).on("click", ".sendIndMsg", function () {
         var msgto = $(this).data("msgto");
         var userid = $(this).data("userid");
         var advid = $(this).data("advid");
         var inpPre = $(this).prev(".writeMsg");
         var prevInp = $(inpPre).find(".indMsg");
         var indMsg = $(prevInp).val();

         $.post('http://localhost/bhara/core/ajax/message.php', {
             msgto: msgto,
             indMsg: indMsg,
             userid: userid,
             advid: advid
         }, function (data) {
             $.post('http://localhost/bhara/core/ajax/message.php', {
                 openChat: msgto,
                 userid: userid,
                 advid: advid

             }, function (data) {
                 $("div#bothIndMsg").html(data);
                 $(".indMsg").val('');

             });

         });

     });




 });
