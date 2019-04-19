   function showMapp(lat, lng) {
       var latta = lat;
       var lanna = lng;

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
       map.on('load', function () {
           addMarker(user_location, 'load');
           //                    add_markers(saved_markers);

           // Listen for the `result` event from the MapboxGeocoder that is triggered when a user
           // makes a selection and add a symbol that matches the result.
           //           geocoder.on('result', function (ev) {
           //               alert("aaaaa");
           //               console.log(ev.result.center);
           //
           //           });
       });

       function addMarker(ltlng, event) {

           if (event === 'click') {
               user_location = ltlng;
           }
           marker = new mapboxgl.Marker({
                   draggable: true,
                   color: "#3f9794"
               })
               .setLngLat(user_location)
               .addTo(map)
               .on('dragend', '');
       }
   }


   $(document).ready(function () {

       //...........................homeCat.......................................

       var loctext = $(".locFind").text();
       console.log(loctext);
       var href = $("#hrefIdentify").attr('href');
       if (href == 'homeCat.php') {
           if (loctext != '') {
               $("a.roomLocation").attr("href", "http://www.bhara.com/homeCat.php?cat=3&loc=" + loctext + "");
               $("a.houseLocation").attr("href", "http://www.bhara.com/homeCat.php?cat=2&loc=" + loctext + "");
               $("a.flatLocation").attr("href", "http://www.bhara.com/homeCat.php?cat=1&loc=" + loctext + "");

           }
       } else if (href == 'vehCat.php') {

           if (loctext != '') {
               $("a.carLocation").attr("href", "/vehCat.php?cat=6&loc=" + loctext + "");
               $("a.truckLocation").attr("href", "http://www.bhara.com/vehCat.php?cat=8&loc=" + loctext + "");
               $("a.busLocation").attr("href", "http://www.bhara.com/vehCat.php?cat=7&loc=" + loctext + "");

           }

       } else if (href == 'index.php') {



           if (loctext != '') {
               $("a.houseLocation").attr("href", "http://www.bhara.com/homeCat.php?loc=" + loctext + "");
               $("a.vehLocation").attr("href", "http://www.bhara.com/vehCat.php?loc=" + loctext + "");
               $("a.comLocation").attr("href", "http://www.bhara.com/comCat.php?loc=" + loctext + "");

           }

       } else if (href == 'comCat.php') {
           if (loctext != '') {
               $("a.showRoomLocation").attr("href", "http://www.bhara.com/vehCat.php?cat=10&loc=" + loctext + "");
               $("a.bankLocation").attr("href", "http://www.bhara.com/vehCat.php?cat=9&loc=" + loctext + "");
               $("a.storeLocation").attr("href", "http://www.bhara.com/vehCat.php?cat=19&loc=" + loctext + "");
               $("a.factoryLocation").attr("href", "http://www.bhara.com/vehCat.php?cat=20&loc=" + loctext + "");
               $("a.hotelLocation").attr("href", "http://www.bhara.com/vehCat.php?cat=21&loc=" + loctext + "");
               $("a.officeLocation").attr("href", "http://www.bhara.com/vehCat.php?cat=22&loc=" + loctext + "");
               $("a.restaurentLocation").attr("href", "http://www.bhara.com/vehCat.php?cat=23&loc=" + loctext + "");
               $("a.shopLocation").attr("href", "http://www.bhara.com/vehCat.php?cat=11&loc=" + loctext + "");
           }
       };

       function singlePostDe() {
           $(".single_post").on("click", function () {

               var userID = $(".userID").data("userid");
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


               $.post('http://www.bhara.com/core/ajax/postAllFetch.php', {
                   har: har
               }, function (data) {

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
                       $(".det_chat_wr").after("<div class='chatBox' style='display:none;max-height:300px;overflow-y: scroll;padding-top: 1rem;background-color: white;' data-advUserId=" + jsonn[0].userid + " data-userID=" + userID + " data-advId=" + jsonn[0].adv_id + "><div class='mainChat'style='border: 1px solid gray;border-radius: 5px;margin: 0 1rem 0rem 1rem; box-shadow: -1px -1px 3px black;'><div class='bothMsgg'><div class='leftMsgText'><div class='leftMsg' style='background-color:lightgray;'>Hi</div><div class='leftMsgTime'></div></div></div><div class='bothMsg'></div><div class='sendBox'><div class='writeMsg' style='border: 1px solid darkseagreen;'><input type='text'class='text' style='flex-basis: 80%; border: none;margin-bottom: 0;height: 20px; font-size: 0.8rem;Background:white;'id='msgInput'></div><div class='sendMsg' data-userid=" + userID + " data-advid=" + jsonn[0].adv_id + " data-advuserid=" + jsonn[0].userid + ">send</div></div></div></div><div class='closeChat'><div class='closeBtn' style='cursor:pointer;'>close</div></div>");
                   }


                   if (jsonn[0].category == '1') {

                       (jsonn[0].feat_1 != '') ? $(".det_feat_1").html("বেড:" + jsonn[0].feat_1 + " "): '';
                       (jsonn[0].feat_2 != '') ? $(".det_feat_2").html("বাথ:" + jsonn[0].feat_2 + " "): '';
                       (jsonn[0].feat_3 != '') ? $(".det_feat_3").html("আয়তন:" + jsonn[0].feat_3 + " "): '';

                   }
                   if (jsonn[0].category == '2') {

                       (jsonn[0].feat_1 != '') ? $(".det_feat_1").html("বেড:" + jsonn[0].feat_1 + " "): '';
                       (jsonn[0].feat_2 != '') ? $(".det_feat_2").html("বাথ:" + jsonn[0].feat_2 + " "): '';
                       (jsonn[0].feat_3 != '') ? $(".det_feat_3").html("আয়তন:" + jsonn[0].feat_3 + " "): '';

                   } else if (jsonn[0].category == '3') {


                       if (jsonn[0].feat_2 == '1') {
                           $(".det_feat_1").html("ভাড়া প্রোপার্টি ধরণ: মেস ");
                       } else if (jsonn[0].feat_2 == '2') {
                           $(".det_feat_1").html("ভাড়া প্রোপার্টি ধরণ: হোস্টেল ");
                       } else if (jsonn[0].feat_2 == '3') {
                           $(".det_feat_1").html("ভাড়া প্রোপার্টি ধরণ: বাসা ");
                       } else if (jsonn[0].feat_2 == '4') {
                           $(".det_feat_1").html("ভাড়া প্রোপার্টি ধরণ: অ্যাপার্টমেন্ট ");
                       } else if (jsonn[0].feat_2 == '5') {
                           $(".det_feat_1").html("ভাড়া প্রোপার্টি ধরণ: বাড়ি ");
                       } else {}


                   } else if (jsonn[0].category == '5') {
                       $(".det_feat_1").html("সিট সংখ্যা:" + jsonn[0].feat_1 + " ");

                   } else if (jsonn[0].category == '6') {
                       (jsonn[0].feat_1 != '') ? $(".det_feat_1").html("কার মডেল:" + jsonn[0].feat_1 + " "): '';
                       (jsonn[0].feat_2 != '') ? $(".det_feat_2").html("কার কালার:" + jsonn[0].feat_2 + " "): '';
                       (jsonn[0].feat_3 != '') ? $(".det_feat_3").html("সিট সংখ্যা:" + jsonn[0].feat_3 + " "): '';

                   } else if (jsonn[0].category == '7') {
                       (jsonn[0].feat_1 != '') ? $(".det_feat_1").html("বাস ব্রান্ড:" + jsonn[0].feat_1 + " "): '';
                       (jsonn[0].feat_2 != '') ? $(".det_feat_2").html("বাস কালার:" + jsonn[0].feat_2 + " "): '';
                       (jsonn[0].feat_3 != '') ? $(".det_feat_3").html("সিট সংখ্যা:" + jsonn[0].feat_3 + " "): '';

                   } else if (jsonn[0].category == '8') {
                       (jsonn[0].feat_1 != '') ? $(".det_feat_1").html("ট্রাক ব্রান্ড:" + jsonn[0].feat_1 + " "): '';
                       (jsonn[0].feat_2 != '') ? $(".det_feat_2").html("ধারণ ক্ষমতা:" + jsonn[0].feat_2 + " টন "): '';


                   } else if (jsonn[0].category == '9') {
                       (jsonn[0].feat_1 != '') ? $(".det_feat_1").html("আয়তন:" + jsonn[0].feat_1 + " "): '';

                   } else if (jsonn[0].category == '10') {
                       (jsonn[0].feat_1 != '') ? $(".det_feat_1").html("আয়তন:" + jsonn[0].feat_1 + " "): '';

                   } else if (jsonn[0].category == '11') {
                       (jsonn[0].feat_1 != '') ? $(".det_feat_1").html("আয়তন:" + jsonn[0].feat_1 + " "): '';

                   } else if (jsonn[0].category == '12') {
                       (jsonn[0].feat_1 != '') ? $(".det_feat_1").html("আয়তন:" + jsonn[0].feat_1 + " "): '';

                   } else if (jsonn[0].category == '13') {
                       (jsonn[0].feat_1 != '') ? $(".det_feat_1").html("ধারণ ক্ষমতা:" + jsonn[0].feat_1 + " টন"): '';

                   } else if (jsonn[0].category == '14') {
                       (jsonn[0].feat_1 != '') ? $(".det_feat_1").html("ধারণ ক্ষমতা:" + jsonn[0].feat_1 + " টন"): '';

                   } else if (jsonn[0].category == '15') {
                       (jsonn[0].feat_1 != '') ? $(".det_feat_1").html("ধারণ ক্ষমতা:" + jsonn[0].feat_1 + " টন"): '';

                   } else if (jsonn[0].category == '19') {
                       (jsonn[0].feat_1 != '') ? $(".det_feat_1").html("আয়তন:" + jsonn[0].feat_1 + " "): '';

                   } else if (jsonn[0].category == '20') {
                       (jsonn[0].feat_1 != '') ? $(".det_feat_1").html("আয়তন:" + jsonn[0].feat_1 + " "): '';

                   } else if (jsonn[0].category == '21') {
                       (jsonn[0].feat_1 != '') ? $(".det_feat_1").html("আয়তন:" + jsonn[0].feat_1 + " "): '';

                   } else if (jsonn[0].category == '22') {
                       (jsonn[0].feat_1 != '') ? $(".det_feat_1").html("আয়তন:" + jsonn[0].feat_1 + " "): '';

                   } else if (jsonn[0].category == '23') {
                       (jsonn[0].feat_1 != '') ? $(".det_feat_1").html("আয়তন:" + jsonn[0].feat_1 + " "): '';

                   } else if (jsonn[0].category == '25') {
                       (jsonn[0].feat_1 != '') ? $(".det_feat_1").html("ধারণ ক্ষমতা:" + jsonn[0].feat_1 + " টন"): '';

                   } else if (jsonn[0].category == '26') {
                       (jsonn[0].feat_1 != '') ? $(".det_feat_1").html("ধারণ ক্ষমতা:" + jsonn[0].feat_1 + " টন"): '';

                   } else if (jsonn[0].category == '27') {
                       (jsonn[0].feat_1 != '') ? $(".det_feat_1").html("ধারণ ক্ষমতা:" + jsonn[0].feat_1 + " টন"): '';

                   } else if (jsonn[0].category == '28') {
                       (jsonn[0].feat_1 != '') ? $(".det_feat_1").html("ধারণ ক্ষমতা:" + jsonn[0].feat_1 + " টন"): '';

                   } else if (jsonn[0].category == '29') {


                   } else if (jsonn[0].category == '30') {


                   } else if (jsonn[0].category == '100') {
                       $(".det_feat_1").html("বেড:" + jsonn[0].feat_1 + " ");

                   } else {
                       //                       first_img$(".det_feat_1").html("বেড:" + jsonn[0].feat_1 + " ");
                       //                       $(".det_feat_2").html("বাথ:" + jsonn[0].feat_2 + " ");

                   }
                   if (jsonn[0].nego == 'true') {
                       $(".negot").html("আলোচনা সাপেক্ষে");

                   }
                   $(".det_img_cent").html("ভাড়া মূল্য: " + jsonn[0].price + " টাকা (" + jsonn[0].pricePeriod + ")");
                   $(".cate").html("ক্যাটাগরী:" + jsonn[0].sub_cat + "");
                   $(".det_s_mo").html("+880" + jsonn[0].mobile + "");
                   $(".det_user").html("বিজ্ঞাপন দাতা: " + jsonn[0].userName + "");
                   $(".det_details").html(jsonn[0].details);
                   if (jsonn[0].lat != '0.000000') {
                       $(".mapClick").html("<img src='assets/img/showMap.jpg' alt='' class='mapImage' onclick='showMapp(" + jsonn[0].lat + "," + jsonn[0].lng + ")' />");


                   }



                   var imgText = jsonn[0].img;
                   var imgParseText = JSON.parse(imgText);
                   var mana = imgParseText.length;
                   var taskList = document.querySelector('.featured-image-list');
                   for (var key in imgParseText) {
                       var html = "<div class='single-fi left'><img src='files/" + imgParseText[key].imageName + "' alt='Grand Beach Resort Cox's Bazar' style='opacity: 1;'></div>";
                       taskList.innerHTML += html;
                   }
                   $("#next-img").click(function (e) {
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
                   $("#prev-img").click(function (e) {
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
                   $(".single-fi").click(function () {
                       var elem = $(this);
                       $("#step").val($(".single-fi").index(elem) + 1);
                       imgSrc = $(this).find("img").attr('src');
                       $(".single-fi img").css('opacity', '1');
                       $(this).find("img").css('opacity', '0.5');
                       $(".big-img").attr('src', imgSrc);
                   });
                   $(".big-img").on("swipe", function (e) {
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
                   $(".mapClick").on("click", function () {
                       $(this).fadeOut(500);
                       $("#map").css({
                           "height": "300px"
                       });
                   });
                   var onuAd = $(".rel_adv");
                   if (onuAd != '') {
                       $(".onuAdv").css({
                           "display": "inline"
                       })
                   }

               });

               $(".post_de").html("<div class='fullScr'><div class='det_post'><div class='mainPart'></div> <div class='header_wrapper' style='    width: 100%; position:fixed; z-index:99; height: 2.986rem;'><div class='logo'><div class='back_arrow' style='font-size:42px; text-shadow:none; color:white;'><img src='https://img.icons8.com/metro/50/ffffff/undo.png'></div><a href='http://www.bhara.com' style='display:none;'><img src='assets/img/logo.svg' alt=''></a></div><a style='text-decoration:none;' href='http://www.bhara.com'><div class='brandName' style='margin-top: 0.482rem;'>ভাড়া.কম</div></a><a href='#adv' style='display:none;'><div class='post_adv'>Post Adv</div></a><div class='account_icon' style='    visibility: hidden;'><img src='assets/img/account.svg' alt=''></div></div><div class='ad_heading'style='margin-top: 3.8rem;'>" + post_head + "</div><div class='cate'></div><div class='det_area desktop' style=''><div class='det_add' style='margin-left:10px;'> ,</div><div class='det_ps' style='margin-left:10px;'> ,</div><div class='det_dis' style='margin-left:10px;'></div></div><div class='img_det_cont'><div class='store_img' style='display:none;'></div><input type='hidden' id='step' value=''><div class='featured-image-preview'><img src='' class='big-img'><button id='next-img'><div class='next_pic' >❯</div></button><button id='prev-img'><div class='prev_pic'>❮</div></button></div><div class='featured-image-list'></div></div><div class='det_area mob_view' style=''><div class='det_add' style='margin-left:10px;'> ,</div><div class='det_ps' style='margin-left:10px;'> ,</div><div class='det_dis' style='margin-left:10px;'></div></div> <div class='det_feat' style='display:flex;'><div class='det_feat_1' style='margin-left:10px;'></div><div class='det_feat_2' style='margin-left:10px;'></div><div class='det_feat_3' style='margin-left:10px;'></div><div class='det_feat_4' style='margin-left:10px;'></div></div><div class='priceWrap'><div class='det_img_cont'><div class='det_img_cent'></div><div class='negot' style='color:gray;'></div></div></div><div class='part_div' style='margin-bottom:1.2rem;'></div><div class='conWrap'><div class='det_cont_wrap' style='background-color: #158a8f17; width: 100%;'><div class='det_contact'><div class='det_mob'><div class='mob_sym'><img src='../../assets/img/icons8-outgoing-call-36.png' style='vertical-align: middle;margin-top: 0.482rem;' alt=' style='color: white;width: 32px;'> </div><div class='det_s_mo'></div><div class='det_s_tex' style='cursor:pointer;'>ফোন নাম্বার দেখতে ক্লিক করুন</div></div></div><div class='det_chat_wr' id='unseenMsg'><div class='det_chat'><img src='../../assets/img/icons8-communication-36.png' style='vertical-align: middle;margin-top: -0.233rem;' alt=' style='color: white;width: 32px;opacity: 0.5;'> </div><div class='det_chat_tex' style='cursor:pointer;'>চ্যাট</div></div><div class='det_mob'><div class='mob_sym'> <img src='../../assets/img/icons8-customer-36.png' alt=' style='color: white;width: 32px;opacity: 0.5;'></div><div class='det_user' style='font-size:0.81rem;'></div></div></div></div><br ><div class='descWrap' style='width: 100%;: 58%;'><div class='part_div'></div><span style='margin-right: auto;margin-left: 1rem;color: black;font-size: 0.9rem;margin-top: 0.694rem;margin-bottom: 0.694rem;'>বর্ণনা:</span><div class='det_details' style='    padding: 0.482rem 1rem;color: #808080;margin-bottom: 1rem;font-size: 0.694rem;'></div><div class='geocoder'><div id='geocoder'></div></div><div class='mapWrap' style='position:relative; margin-bottom: 1rem;' ><div class='mapClick' style='background-color: white;z-index: 99;overflow:hidden;'></div><div id='map' style=''></div></div><span style='margin-right: auto;margin-left: 1rem;color: black;font-size: 0.9rem;margin-top: 0.694rem;margin-left: 1rem;'> বিজ্ঞাপনটি শেয়ার করুন: </span><div class='adv_shb'></div><span class='onuAdv' style='    margin-right: auto;margin-left: 1rem;color: black;font-size: 0.9rem;margin-top: 0.694rem;margin-bottom: 0.694rem; display:none;'>অনুরূপ বিজ্ঞাপন:</span><div class='relAdvWrap'><span class='rel_adv'></span></div><div class = 'json_store' style = 'display:none;'></div ></div></div></div>");
               var shareButton = '';

               $.post('http://www.bhara.com/core/ajax/postAllFetch.php', {
                   shareButton: shareButton
               }, function (data) {
                   $('.adv_shb').html(data);

               });
               $.post('http://www.bhara.com/core/ajax/postAllFetch.php', {
                   rel_adv: har
               }, function (data) {
                   $('.rel_adv').html(data);

               });

               $(".back_arrow").on("click", function () {
                   //                  window.history.back();
                   $(".fullScr").remove();
                   $(".single_post").show();
               });
               $(".det_mob").on("click", function () {
                   $(".det_s_tex").hide();
                   $(".det_s_mo").show();


               });

           });
       }
       $('a.dis_design.ui-link').on('click', function () {
           var mea = $(this).text();

           var nameCat = $(".nameCat").text();
           console.log(mea, nameCat);

           //         $(this).hide();
           $.post('http://www.bhara.com/core/ajax/category.php', {
               mea: mea,
               nameCat: nameCat
           }, function (data) {
               $('.post').empty();
               $(".post").html(data);

               $(".locationShow").hide();
               singlePostDe();
               var loctext = $(".locFind").text();
               console.log(loctext);
               if (href == 'homeCat.php') {
                   if (loctext != '') {
                       $("a.roomLocation").attr("href", "http://www.bhara.com/homeCat.php?cat=3&loc=" + loctext + "");
                       $("a.houseLocation").attr("href", "http://www.bhara.com/homeCat.php?cat=2&loc=" + loctext + "");
                       $("a.flatLocation").attr("href", "http://www.bhara.com/homeCat.php?cat=1&loc=" + loctext + "");

                   }
               } else if (href == 'index.php') {



                   if (loctext != '') {
                       $("a.houseLocation").attr("href", "http://www.bhara.com/homeCat.php?loc=" + loctext + "");
                       $("a.vehLocation").attr("href", "http://www.bhara.com/vehCat.php?loc=" + loctext + "");
                       $("a.comLocation").attr("href", "http://www.bhara.com/comCat.php?loc=" + loctext + "");

                   }

               } else if (href == 'vehCat.php') {

                   if (loctext != '') {
                       $("a.carLocation").attr("href", "http://www.bhara.com/vehCat.php?cat=6&loc=" + loctext + "");
                       $("a.truckLocation").attr("href", "http://www.bhara.com/vehCat.php?cat=8&loc=" + loctext + "");
                       $("a.busLocation").attr("href", "http://www.bhara.com/vehCat.php?cat=7&loc=" + loctext + "");

                   }
               } else if (href == 'comCat.php') {
                   if (loctext != '') {
                       $("a.showRoomLocation").attr("href", "http://www.bhara.com/vehCat.php?cat=10&loc=" + loctext + "");
                       $("a.bankLocation").attr("href", "http://www.bhara.com/vehCat.php?cat=9&loc=" + loctext + "");
                       $("a.storeLocation").attr("href", "http://www.bhara.com/vehCat.php?cat=19&loc=" + loctext + "");
                       $("a.factoryLocation").attr("href", "http://www.bhara.com/vehCat.php?cat=20&loc=" + loctext + "");
                       $("a.hotelLocation").attr("href", "http://www.bhara.com/vehCat.php?cat=21&loc=" + loctext + "");
                       $("a.officeLocation").attr("href", "http://www.bhara.com/vehCat.php?cat=22&loc=" + loctext + "");
                       $("a.restaurentLocation").attr("href", "http://www.bhara.com/vehCat.php?cat=23&loc=" + loctext + "");
                       $("a.shopLocation").attr("href", "http://www.bhara.com/vehCat.php?cat=11&loc=" + loctext + "");
                   }
               };

           });
           //console.log(mea);
       });

       singlePostDe();
       $('li').css({
           //            "border-bottom": "1px solid lightgray",
           "margin-bottom": "5px"
       });
       $('ul').css({
           "margin": "0",
           "padding": "0"
       });
       $('a.dis_design.ui-link').css({
           "font-size": "0.698rem"
       });

       $('a.ui-collapsible-heading-toggle.ui-btn.ui-btn-icon-left.ui-btn-e.ui-icon-minus').css({
           "box-shadow": "none"
       });
       $("a#area_search").on("click", function () {
           $(".locationShow").slideToggle();
       });
       $("#post_search_su").on("click", function () {
               var search_value = $("#post_search").val();
               //                var catID = <?php  echo $catID;  ?>;

               var loctext = $(".locFind").text();
               $.post('http://www.bhara.com/core/ajax/search.php', {
                   search_value: search_value,
                   loctext: loctext
               }, function (data) {
                   $('.post').empty();
                   $(".post").html(data);
                   singlePostDe();
                   $(".search_rent").slideUp();
                   $("#post_search_subb").css({
                       "opacity": "1"
                   });
               });
           }

       );

       $("#post_search_subb").on("click", function () {
           $(".search_rent").slideToggle();
           $(this).css({
               "opacity": "0.2"
           });
       })

       $(".back_arrow").on("click", function () {
           //                  window.history.back();
           $(".fullScr").remove();
           $(".single_post").show();
       });


       //...........................homeCat.......................................






       $(".back_arrow").on("click", function () {
           //                  window.history.back();
           $(".fullScr").remove();
           $(".single_post").show();
       });




       $('.cat-arrow').on('click', function () {
           $(this).hide();
           $('.cat_down').show();
       });



       if ($(".nav_hori")[0]) {
           var topFixed = $('.nav_hori').offset();
       } else {
           var topFixed = '';
       }

       if (topFixed != '') {
           $(window).scroll(function () {
               if ($(window).scrollTop() > topFixed.top) {
                   $('.nav_hori').css({
                       'border-radius': '50%',
                       'border': '2px solid yellow',

                       'box-shadow': 'none',
                       'transition': 'border-radius 0.5s ease 0s',
                       'position': 'fixed'
                   }).css('top', '0');
               } else {
                   $('.nav_hori').css({
                       'border': '1px solid gray',
                       'border-radius': '0',
                       'position': 'static'
                   });
               }
           });
       }

       function myFunction(x) {
           if (x.matches) { // If media query matches
               $('.contentt').on('scroll', function () {
                   //                     alert("false");
                   var ho = $(this).scrollTop()
                   console.log(ho);
                   //                     if ($(this).scrollTop() < this.scrollHeight - $(this).height()) {
                   if ($(this).scrollTop() > 10) {
                       $("#header").slideUp("300");
                       //                    $(".header_wrapper").css({
                       //                        "display": "none",
                       //
                       //                    })
                       $("#desktopMenu").css({
                           //                         "position": "fixed",
                           //                         "top": "0px",
                           //                         "transition": "top 0.3s ease-in-out"
                       })
                       $(".header_down_part").css({
                           "box-shadow": "0px 1px 5px grey",
                           "margin-top": "-3px",
                           "height": "61px",
                           "transition": "height 0.3s "

                       })

                       //                    $("#header").slideUp("1000");
                       //                         alert("false");
                   } else {
                       $("#header").slideDown("300");
                       //                    $(".header_wrapper").css({
                       //                        "display": "flex"
                       //                    });
                       $("#desktopMenu").css({
                           //                         "position": "fixed",
                           //                         "top": "140px",
                           //                         "transition": "top  ease-in-out "
                       })

                   }
               });
           }
       }

       var x = window.matchMedia("(min-width : 1224px)")
       myFunction(x) // Call listener function at run time
       x.addListener(myFunction) // Attach listener function on state changes     








       $('.single_post').first().css({
           "box-shadow": '0px 0px 5px gray'
       });

       //      $("button.go_back_but").on("click", function () {
       //          $(".post_det_container").remove();
       //          $(".post").css({
       //              display: "block"
       //          });
       //      });


       $(".single_post").oncontextmenu = function () {
           return false;
       };

       $(".single_post").on("mousedown taphold", function (e) {
           if (e.button == 2) {
               alert('Right mouse button!');
               return false;
           }
           return true;
       });



       var step, imgs, imgSrc;






       $("#post_search_sub").on("click", function () {
           var search_value = $("#post_search").val();
           //        $( "#popupNested" ).popup( "close" )
           $.post('http://www.bhara.com/core/ajax/search.php', {
               search_value: search_value
           }, function (data) {
               $('.post').empty();
               $(".post").html(data);
               //             singlePostDetails();
               //             $("##popupNested").hide();

           });

       });


       $(".nav_car").on("click", function () {
           var vehicle = 'vehicle';

           $.post('http://www.bhara.com/core/ajax/category.php', {
               vehicle: vehicle
           }, function (data) {
               $('.post').empty();
               $(".post").html(data);
               $(".single_post").on("click", function () {
                   $(this).hide(500);
                   //          $(".single_post").fadeOut(100);
               });

           });
       });


       var fileCollection = new Array();


       $(document).on("click", "#multiple_files", function (e) {
           $("#sortable").remove();
           var foSor = $(this).closest(".file-upload");

           $(foSor).after('<div id="sortable" style="position:relative;"></div>');
       });
       $(document).on("change", "#multiple_files", function (e) {

           var count = 0;
           var files = e.target.files;

           $(this).removeData()
           var text = "";


           $.each(files, function (i, file) {
               //                    if (count++ > 4 && count++ > !13) {

               fileCollection.push(file);

               var reader = new FileReader();
               reader.readAsDataURL(file);
               //The readAsDataURL method is used to read the contents of the specified Blob or File. //
               reader.onload = function (e) {
                   var name = document.getElementById("multiple_files").files[i].name;
                   var template = '<li class="ui-state-default del" style="position:relative;"><span class="ui-icon ui-icon-arrowthick-2-n-s"></span>' +
                       '<img id="' + name + '" style="width:60px; height:60px" src="' + e.target.result + '" alt=""> ' +
                       '</li>';
                   $("#sortable").append(template);
                   //                            alert(template);
               }
               //<div class="remImg" style="position:absolute; top:0; right:0;cursor:pointer;  display:flex; justify-content:center; align-items: center; background:white; border-radius:50%; height:1rem; width:1rem; font-size: 0.694rem;">X</div>


           });
           $("#sortable").append('<div class="remImg" style="position:absolute; top:0; right:0;cursor:pointer;  display:flex; justify-content:center; align-items: center; background:white; border-radius:50%; height:1rem; width:1rem; font-size: 0.694rem;">X</div>');

       });
       $(document).on("click", ".remImg", function () {
           $("#sortable").remove();
           $(".file-upload").empty();
           $(".file-upload").html('<label for="upload" class="file-upload__label" style="margin: 0;border-bottom: none;"><img src="assets/img/icons8-xlarge-icons-36.png" alt="" style="vertical-align: middle;margin-right: 1rem;">ছবি যোগ করুন (সর্বোচ্চ ৫ টি)</label><input id="multiple_files" class="file-upload__input" type="file" name="file-upload" multiple style="width: 100%;">');

       });
       var get_ad_userId = $("#user_id").val();
       //     alert(get_ad_userId);
       $("#adv_head").on("blur", function () {
           $("#error_multiple_files").hide();
           $("#adv_head").css({
               "border": "none"
           });
           if ($(this).val() != '') {
               var heading_count = $(this).val().match(/./g).length;
               var head_cha_count = $(this).val().match(/\S+/g).length;
               if (head_cha_count > 60 || head_cha_count < 2 || heading_count > 500) {
                   $(".adv_head_error").show().html("Word must be between 2 to 60");
                   var adv_heading = 'true';

               } else {
                   $(".adv_head_error").hide();
               }
           } else {
               $(".adv_head_error").show().html("Word must be between 2 to 60");
           }
       });
       $("#adv_price").on("blur", function () {
           $("#error_multiple_files").hide();
           $("#adv_price").css({
               "border": "none"
           });

           const adv_price = $(this).val();
           if (adv_price != '') {
               const re = /^([০-৯,?\.?]{1,15})|([0-9,?\.?]{1,15})$/;

               if (!re.test(adv_price)) {
                   $(".adv_price_error").show().html("Price must be 1-10 charackter in number.");

               } else {
                   $(".adv_price_error").hide();
                   var adv_price_con = 'true';
               }
           } else {
               $(".adv_price_error").show().html("Price must be 1-10 charackter in number.");
           }


       });

       $("#feat_3").on("blur", function () {

           const feat_3 = $(this).val();
           if (feat_3 != '') {
               var heading_count = feat_3.match(/[a-zA-Z0-9]/giu).length;
               if (heading_count > 150) {
                   $(".feat_3_error").show().html("Charackter  must be under 150.");
               } else {
                   $(".feat_3_error").hide();
                   var feat_3_con = 'true';
               }

           }
       });
       $("#adv_det").on("blur", function () {

           const adv_det = $(this).val();
           if (adv_det != '') {
               var heading_count = adv_det.match(/[a-zA-Z0-9]/giu).length;
               if (heading_count > 500) {
                   $(".adv_det_error").show().html("Charackter  must be under 500.");
               } else {
                   $(".adv_det_error").hide();
                   var adv_det_con = 'true';
               }
           }
       });
       $("#edit_name_text").on("blur", function () {

           const edit_name_text = $(this).val();
           if (edit_name_text != '') {
               var heading_count = edit_name_text.match(/[a-zA-Z0-9]/giu).length;
               if (heading_count > 150) {
                   $(".name_error").show().html("Charackter  must be under 150.");
               } else {
                   $(".name_error").hide();
                   var edit_name_text_con = 'true';
               }
           }
       });
       $("#edit_mob_text").on("blur", function () {
           $("#edit_mob_text").css({
               "border": "none"
           });
           const edit_mob_text = $(this).val();

           if (edit_mob_text != '') {

               const re = /^([০-৯]{5})[-. ]?([০-৯]{6})[ক-ঢ়অ-ঐ]?|([\d]{5})[-. ]?([\d]{6})$/;

               if (!re.test(edit_mob_text)) {
                   $(".mobile_error").show().html("Charackter  must be under 14. Ex: 01815 123456");

               } else {

                   $(".mobile_error").hide();
                   var edit_mob_text_con = 'true';
               }


           } else {
               $(".mobile_error").show().html("Charackter  must be under 14. Ex: 01815 123456");
           }
       });
       $("#edit_email_text").on("blur", function () {

           const edit_email_text = $(this).val();

           if (edit_email_text != '') {

               const re = /^([a-zA-Z0-9_\-\.]+)@([a-zA-Z0-9_\-\.]+)\.([a-zA-Z]{2,5})$/iu;

               if (!re.test(edit_email_text)) {
                   $(".email_error").show().html("Ex: abc@gmail.com");

               } else {

                   $(".email_error").hide();
                   var edit_email_text_con = 'true';
               }


           } else {
               $(".email_error").show().html("Ex: abc@gmail.com");
           }
       });


       //       $("body").on("click", function () {
       //           var geoLat = $("#lat").val();
       //           var geoLng = $("#lng").val();
       //           if (geoLat != '') {
       //               alert(geoLng);
       //           } else {
       //               alert("empty");
       //           }
       //       });
       $("#adv_sub").on("click", function () {
           //                var formData = new FormData($('#upload_form')[0]);

           var get_ad_cat = $(".prop").val();
           var get_ad_cat_text = $(".prop").text();
           var get_adv_divi = $("#sel_divi option:selected").text();
           var get_adv_divVal = $("#sel_divi option:selected").val();
           var get_adv_dist = $("#distr option:selected").text();
           var get_adv_distVal = $("#distr option:selected").val();
           var get_adv_upaz = $("#upaz option:selected").text();
           var get_adv_upazVal = $("#upaz option:selected").val();

           var geoLat = $("#lat").val();
           var geoLng = $("#lng").val();
           if (geoLat == '') {

               var latoVal = $("#latt").val();
               if (latoVal == '') {
                   var latSend = '';

               } else {
                   var latSend = $("#latt").val();
               }


           } else {
               var latSend = $("#lat").val();
           }

           if (geoLng == '') {

               var lngoVal = $("#lngg").val();
               if (lngoVal == '') {
                   var lngoSend = '';

               } else {
                   var lngoSend = $("#lngg").val();
               }
           } else {
               var lngoSend = $("#lng").val();
           }
           var get_adv_head = $("#adv_head").val();

           var get_adv_price = $("#adv_price").val();
           var localAdd = $("#localAdd").val();

           var get_adv_det = $("#adv_det").val();
           var feat_one = $("#feat_1").val();
           var feat_two = $("#feat_2").val();
           var feat_three = $("#feat_3").val();
           var feat_four = $("#feat_4").val();

           if (typeof feat_one !== "undefined") {
               var feat_1 = feat_one;
           } else if (feat_one != '') {
               var feat_1 = $('input[name=radio-choice-b]:checked').val();
           } else {
               var feat_1 = '';
           }
           if (typeof feat_two !== "undefined") {
               var feat_2 = feat_two;
           } else if (feat_two != '') {
               var feat_2 = $('input[name=radio-choice-t]:checked').val();
           } else {
               var feat_2 = '';
           }
           if (typeof feat_three === "undefined") {
               var feat_3 = '';
           } else {
               var feat_3 = feat_three;
           }
           if (typeof feat_four === "undefined") {
               var feat_4 = '';
           } else {
               var feat_4 = feat_four;

           }
           var nego = $('#negot').is(":checked");

           var get_price_time = $("#select-native-14 option:selected").text();



           var edit_name = $("#edit_name_text").val();
           if (edit_name != '') {
               var edit_name_text = $("#edit_name_text").val();
           } else {
               var edit_name_text = ("#edit_name_bo").text();
           }

           var edit_mobile = $("#edit_mob_text").val();
           if (edit_mobile != '') {
               var edit_mob_text = $("#edit_mob_text").val();
           } else {
               var edit_mob_text = $("#edit_mobile_bo").val();
           }

           var edit_email = $("#edit_email_text").val();
           if (edit_email != '') {
               var edit_email_text = $("#edit_email_text").val();
           } else {
               var edit_email_text = ("#edit_email_bo").text();
           }




           var error_images = '';


           if (get_adv_divVal == '' || get_adv_distVal == '' || get_adv_upazVal == '') {
               error_images += ' ভাড়ার অবস্থান নির্বাচন করুন';
               //               $('html, body').animate({
               //                   'scrollTop': $("#adv_area").position().top
               //               });


               $('html, body').animate({
                   'scrollTop': $("#adv_area").position().top - 60
               });
               $(".rent_area").css({
                   "border": "3px solid red",
                   "border-radius": "10px"
               });
               $('.adv_container').hide();

           } else {
               if (get_adv_head == '') {
                   error_images += ' বিজ্ঞাপনের শিরোনাম লিখুন';
                   $('html, body').animate({
                       'scrollTop': $("#adv_head").position().top - 160
                   });
                   $("#adv_head").css({
                       "border": "2px solid red",
                       "border-radius": "5px"
                   });

               } else {
                   if (get_adv_price == '') {
                       error_images += ' বিজ্ঞাপনের মূল্য নির্ধারণ করুন';
                       $('html, body').animate({
                           'scrollTop': $("#adv_price").position().top - 160
                       });
                       $("#adv_price").css({
                           "border": "2px solid red",
                           "border-radius": "5px"
                       });

                   } else {
                       if (edit_mob_text == '') {
                           error_images += 'আপনার মোবাইল নাম্বার অন্তর্ভূক্ত করুন।';
                           $('html, body').animate({
                               'scrollTop': $("#edit_mob_text").position().top - 160
                           });
                           $("#edit_mob_text").css({
                               "border": "2px solid red",
                               "border-radius": "5px"
                           });

                       } else {


                           var form_data = new FormData("#multiple_files");

                           var storeImage = [];


                           var files = $('#multiple_files')[0].files;
                           //                alert(files.length);
                           //           if (files.length < 1) {
                           //               error_images += 'Please Select Image';
                           //           } else {
                           console.log(files.length);
                           if (files.length != 0) {
                               if (files.length > 10) {
                                   error_images += 'You can not select more than 10 files';
                               } else {
                                   for (var i = 0; i < files.length; i++) {
                                       var name = document.getElementById("multiple_files").files[i].name;
                                       storeImage += "{\"imageName\":\"" + name + "\"},";
                                       var ext = name.split('.').pop().toLowerCase();
                                       if (jQuery.inArray(ext, ['gif', 'png', 'jpg', 'jpeg', 'PNG']) == -1) {
                                           error_images += '<p>Invalid ' + i + ' File</p>';
                                       }
                                       var oFReader = new FileReader();
                                       oFReader.readAsDataURL(document.getElementById("multiple_files").files[i]);
                                       var f = document.getElementById("multiple_files").files[i];
                                       var fsize = f.size || f.fileSize;
                                       if (fsize > 2000000) {
                                           error_images += '<p>' + i + ' File Size is very big</p>';
                                       } else {
                                           form_data.append("file[]", document.getElementById('multiple_files').files[i]);
                                       }
                                   }
                               }
                               //           }
                               //           console.log(form_data);
                               //  
                               if (files.length < 1) {



                               } else {
                                   str = storeImage.replace(/,\s*$/, "");
                                   //                $(this).html($(this).html().replace(/,/g , ''));
                                   var stIm = '[' + str + ']';
                                   //                 var stImage = JSON.stringify(stIm);
                                   //                parImag = JSON.parse(stIm);
                                   //                alert(parImag["0"].imageName);
                                   //                console.log(stIm);

                                   //                alert(get_ad_cat);

                               }
                               console.log(stIm);
                               if (error_images == '') {
                                   $.ajax({
                                       url: "upload.php",
                                       method: "POST",
                                       data: form_data,
                                       contentType: false,
                                       cache: false,
                                       processData: false,
                                       beforeSend: function () {
                                           $('#error_multiple_files').html('<br /><label class="text-primary">Uploading...</label>');
                                       },
                                       success: function (data) {
                                           $('#error_multiple_files').html(data);

                                       }
                                   });
                               } else {
                                   $('#multiple_files').val('');
                                   $('#error_multiple_files').html("<span class='text-danger'>" + error_images + "</span>");
                                   return false;
                               };

                           } else {

                               var stIm = '[{"imageName":"defaultAdvImg.png"}]';

                           }
                           //          var edit_email_text = $("#edit_email_text").val();


                           //         alert(feat_1, feat_2);


                           $.post('http://www.bhara.com/core/ajax/advSub.php', {
                               get_ad_cat: get_ad_cat,
                               get_ad_cat_text: get_ad_cat_text,
                               get_ad_userId: get_ad_userId,
                               get_adv_divi: get_adv_divi,
                               get_adv_dist: get_adv_dist,
                               get_adv_upaz: get_adv_upaz,
                               get_adv_head: get_adv_head,
                               get_adv_price: get_adv_price,
                               get_price_time: get_price_time,
                               localAdd: localAdd,
                               get_adv_det: get_adv_det,
                               stIm: stIm,
                               edit_name_text: edit_name_text,
                               edit_mob_text: edit_mob_text,
                               edit_email_text: edit_email_text,
                               feat_1: feat_1,
                               feat_2: feat_2,
                               feat_3: feat_3,
                               feat_4: feat_4,
                               nego: nego,
                               latSend: latSend,
                               lngoSend: lngoSend

                           }, function (data) {

                               $("#adv_dem").html(data);


                               //        load_comment();


                           });
                       }
                   }
               }


           }









           $('#error_multiple_files').html("<span class='text-danger' style='color:red'>" + error_images + "</span>");

           window.location.href = 'http://www.bhara.com/profile.php';



       });



       $("#signup").on('vclick', function () {});
       $("#login").on('vclick', function () {});
       $("#login").on('submit', function () {
           return false;
       });
       $("#signup").on('submit', function () {
           return false;
       });
       //            $(".flat").on('click', function() {
       //                $('.flat_ui').slideToggle();
       //            });
       //            $(".vhcl").on('click', function() {
       //                $('.vhcl_ui').slideToggle();
       //            });
       //            $(".machn").on('click', function() {
       //                $('.machn_ui').slideToggle();
       //            });

       function hide_oth_ad() {
           $('.opt').not('#active_ad').remove();
       }
       $(".opt").on("click", function () {
           $(this).attr('id', 'active_ad');
           hide_oth_ad();
           $(".or_menu").show();
       });
       //      $(".prop_headi, .or_menu").on("click", function () {
       //          location.reload();
       //      });


       //      $("select#select-native-4").on("click", function () {
       //
       //
       //      });

       // ক্যাটাগরি ভিত্তিক data নিয়ে আসা......... 
       $("select#select-native-4").on("change", function () {
           //          $("#adv_area").show({
           //              scrollTop: "500px"
           //          }, 2000);
           //          $(".progressbar li:nth-child(2)").addClass(" active");
           //
           //
           var get_cat_val = $("#select-native-4 option:selected").val();
           //          //          $("#adv_con").empty();
           //          $.post('http://www.bhara.com/core/ajax/advDetails.php', {
           //              get_cat_val: get_cat_val,
           //
           //          }, function (data) {
           //              $("#disi").html(data);
           //          });
           window.location.href = 'http://www.bhara.com/advCat.php?catVal=' + get_cat_val + '';
       });

       $(".cat_click").on("click", function () {

           var get_cat_val = $(this).data("cat");

           window.location.href = 'http://www.bhara.com/advCat.php?catVal=' + get_cat_val + '';
       });



       $("#sel_divi").change(function () {

           var get_ad_cat = $(".prop").val();

           if (get_ad_cat != '') {
               //             $(".right_sign").hide();
               //             $(".cat_error").html("Please Select A Category");
           } else {
               $(".right_sign").hide();
               $(".cat_error").html("Please Select A Category");

           }

           var selectedOption = $('#sel_divi option:selected');
           var sel_resu = selectedOption.val();
           $("#dist").show({
               scrollTop: "500px"
           }, 2000);

           $.post('http://www.bhara.com/core/ajax/divi.php', {
               sel_res: sel_resu,

           }, function (data) {
               $("#distr").html(data);
               //                    $("#disi").html(data);


               //        load_comment();


           });

       });



       $("#distr").change(function () {
           var get_adv_divi = $("#sel_divi option:selected").text();
           if (get_adv_divi != '') {
               var selectedOption = $('#distr option:selected');
               var sel_upaz = selectedOption.val();
               $("#area").show({
                   scrollTop: "500px"
               }, 2000);





               $.post('http://www.bhara.com/core/ajax/divi.php', {
                   sel_upaz: sel_upaz,

               }, function (data) {
                   $("#upaz").html(data);





                   //        load_comment();


               });

               $.post('http://www.bhara.com/core/ajax/advSub.php', {
                   distCord: sel_upaz,

               }, function (data) {
                   $("#latLon").html(data);
               });


           } else {
               $(".div_error").html("Please Select A Category");
           }


       });

       $("#upaz").change(function () {
           $(".rent_area").css({
               "border": "none"
           });
           $("#error_multiple_files").hide();;
           var get_adv_dist = $("#distr option:selected").text();
           if (get_adv_dist != '') {


               $("#adv_con").show({
                   scrollTop: "5px"
               }, 2000);
               //          $("#adv_con").animate({
               //              scrollTop: "0px"
               //          }, 2000);

               $(".progressbar li:nth-child(2)").addClass(" active");
               $(".right_sign_area").show();
           } else {
               $(".dist_error").html("Please Select District.");
           }
       });



   });
