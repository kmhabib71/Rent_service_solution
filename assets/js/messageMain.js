 $(document).ready(function () {



     function getMsg() {
         var advID = $(".chatBox").data("advid");
         var advUserID = $(".chatBox").data("advuserid");
         var userID = $(".chatBox").data("userid");

         $.post('http://www.bhara.com/core/ajax/message.php', {
             advID: advID,
             advUserID: advUserID,
             userID: userID,

         }, function (data) {
             $(".bothMsg").html(data);

         });

     }

     $(document).on("click", "li.notiClear", function () {
         var adv = $(this).data('adv');
         var userid = $(this).data('userid');
         var msgfrom = $(this).data('msgfrom');
         console.log(adv, userid, msgfrom);
         $.post('http://www.bhara.com/core/ajax/message.php', {
             adv: adv,
             userid: userid,
             msgfrom: msgfrom

         }, function (data) {


         });


     });



     $(document).on("click", ".det_chat_wr", function () {
         $(".chatBox").show('slow');
         var advID = $(".chatBox").data("advid");
         var advUserID = $(".chatBox").data("advuserid");
         var userID = $(".chatBox").data("userid");
   
         $(".closeChat").show().css({
             "visibility": "visible",
             "margin-top": "-20px",
             "padding-top": "20px"
         });
         getMessages = function () {
             $.post('http://www.bhara.com/core/ajax/message.php', {
                 advID: advID,
                 advUserID: advUserID,
                 userID: userID,

             }, function (data) {
                 $(".bothMsg").html(data);

                 $('.chatBox').on('scroll', function () {
                     var ho = $(this).scrollTop()
                     console.log(ho);
                     if ($(this).scrollTop() < this.scrollHeight - $(this).height()) {
                         autoscroll = false;
                     } else {
                         autoscroll = true;
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
           

             });
         }
         console.log('hello'+userID+'');
         if(userID != ''){
         if (advUserID != userID) {
             var timer = setInterval(getMsg, 1000);
         }

         getMessages();


         $(this).hide();
         $(document).on("click", ".closeChat", function () {
             clearInterval(timer);
             clearInterval(getMsg);
             $(".chatBox").hide('slow');
             $(this).hide();
             $(".det_chat_wr").show();
         });
         $(document).on("click", ".back_arrow", function () {
             clearInterval(timer);
           
             clearInterval(getMsg);
             $(".fullScr").remove();
             $(".single_post").show();
             $("#persIndChat").empty();
         });

}else{window.location.href = 'http://www.bhara.com/login/login.php'}
     });


     $(document).on("click", ".sendMsg", function () {
         var inputVal = $("input#msgInput").val();
         var advID = $(this).data("advid");
         var advUserID = $(this).data("advuserid");
         var userID = $(this).data("userid");

         console.log(inputVal, advID, advUserID, userID);
         $.post('http://www.bhara.com/core/ajax/message.php', {
             inputVal: inputVal,
             advID: advID,
             advUserID: advUserID,
             userID: userID
         }, function (data) {
        
             $("input#msgInput").val('');
             getMsg();


         });
     });


     $(document).on("click", ".chatList", function () {
       
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

             "padding": "2rem 1rem 1rem 1rem"


         });
         $(mainChatt).after('<div class="chatBack" style="color: white;position: absolute;top: 5px;"><img src="../../assets/img/icons8-back-to-27.png" style="cursor:pointer;"></div>');
         $(bothMsgg).attr('id', 'bothIndMsg');

         $("#bothIndMsg").after("<div class='sendBox'><div class='writeMsg' style='border: 1px solid darkseagreen;'><input type='text' class='indMsg' style='flex-basis: 80%; border: none;margin-bottom: 0;height: 1.5rem;    font-size: 0.8rem;background-color:white;'></div><div class='sendIndMsg' data-msgto=" + openChat + " data-userid=" + userid + " data-advid=" + advid + ">send</div></div>");
         var sendBut = $(persChat).find(".sendBox");
         $(sendBut).attr('id', 'sendBoxRemove');
     
         userMessages = function () {
             $.post('http://www.bhara.com/core/ajax/message.php', {
                 openChat: openChat,
                 userid: userid,
                 advid: advid

             }, function (data) {
                 $("div#bothIndMsg").html(data);


             });
         }
     

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

         $.post('http://www.bhara.com/core/ajax/message.php', {
             msgto: msgto,
             indMsg: indMsg,
             userid: userid,
             advid: advid
         }, function (data) {
             $.post('http://www.bhara.com/core/ajax/message.php', {
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
