<?php
include '../init.php';
include '../../class/login.php';
if(isset($_POST['har'])){
$advID = $_POST['har'];
//            echo $advID;
$ad_details= $getFromPo->postDetails($advID);
    
$json = json_encode($ad_details);   
   
    
foreach($ad_details as $post_det){
     $image = $post_det->img;
//    $complex = array('more', 'complex', 'object', array('foo', 'bar'));

      


$character = json_decode($image);
    
 
?>
    <style>
        /*
 .det_img_cent { position: absolute; top: 50%; left: 70%; transform: translate(-50%, -50%); font-weight: 300; font-size: 110%; } .det_img_cont { margin-left: -80px; height: 100px; width: 260px; position: relative; text-align: center; color: white; }
*/
        
        .det_img_cont img {
            height: 100%;
            width: 100%;
        }
        
        .back_arrow img {
            height: 30px;
            width: 30px;
            vertical-align: middle;
            text-align: center;
            margin-left: 0.233rem;
            margin-top: 0.345rem;
            opacity: 0.93;
        }

    </style>
    <div class="fullScr">
        <div class="det_post">
            <div class="header_wrapper" style="    width: 100%; position:fixed; z-index:9; height: 2.986rem;">
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
                <div class="account_icon" style="    visibility: hidden;">
                    <img src="assets/img/account.svg" alt="">
                </div>

            </div>
            <div class="ad_heading" style="    margin-top: 3.8rem;">
                <?php echo $post_det->headline; ?>
            </div>
            <div class="img_det_cont">
                <div class="store_img" style="display:none;">
                    <?php echo $post_det->img; ?>



                </div>
                <input type="hidden" id="step" value="<?php echo count($character); ?>">
                <div class="featured-image-preview">
                    <img src="files/<?php echo $character[1]->imageName; ?>" class="big-img">

                    <!-- Image count -->
                    <button id="next-img">
            <div class="next_pic" style="
    position: relative;
    right: -1rem;
    padding: 1rem 0.694rem;
    background-color: white;
    /* text-align: center; */
    margin-left: 30px;
    border-radius: 10px;
    font-size: 1rem;" >❯</div>
</button>
                    <button id="prev-img">
<div class="prev_pic" style="position: relative;
    left: -20px;
    /* right: -20px; */
    padding: 20px 0;
    background-color: white;
    /* text-align: center; */
    margin-right: 30px;
    border-radius: 10px;
    font-size: 1rem;">❮</div>
</button>
                </div>
                <div class="featured-image-list">

                </div>
            </div>
            <div class="det_area" style="display:flex;">
                <div class="det_add" style="margin-left:10px;">
                    <?php echo $post_det->address2; ?>,
                </div>
                <div class="det_ps" style="margin-left:10px;">
                    <?php echo $post_det->address1; ?>,
                </div>
                <div class="det_dis" style="margin-left:10px;">
                    <?php echo $post_det->address; ?>
                </div>
            </div>
            <div class="det_feat" style="display:flex;">
                <div class="det_feat_1" style="margin-left:10px;">
                    বেড:
                    <?php echo $post_det->feat_1; ?>
                </div>
                <div class="det_feat_2" style="margin-left:10px;"> বাথ:
                    <?php echo $post_det->feat_2; ?>
                </div>
                <div class="det_feat_3" style="margin-left:10px;">
                    <?php if($post_det->feat_3){
                
                echo 'আয়তন:'.$post_det->feat_3.'';} ?>
                </div>
                <div class="det_feat_4" style="margin-left:10px;">
                    <?php echo $post_det->feat_4; ?>
                </div>
            </div>

            <div class="det_img_cont">
                <!--             <img src="files/pricetag.jpg" alt="Snow" style="width:100%;">-->

                <div class="det_img_cent">ভাড়া মূল্য:
                    <?php echo $post_det->price; ?>
                </div>
            </div>
            <div class="part_div" style="margin-bottom:1.2rem;"></div>
            <!--
            <hr class="hr_div" style="
 
    width: 90%;
    color: lightgray;
    

">
-->
            <div class="det_cont_wrap" style="    background-color: #158a8f17; width: 100%;">
                <div class="det_contact">

                    <div class="det_mob">
                        <div class="mob_sym"> ☎</div>
                        <div class="det_s_mo">
                            +880
                            <?php echo $post_det->mobile; ?>
                        </div>
                        <div class="det_s_tex">ফোন নাম্বার দেখতে ক্লিক করুন</div>
                    </div>


                </div>
                <div class="det_chat_wr">
                    <div class="det_chat"> &#128172;</div>

                    <div class="det_chat_tex">চ্যাট</div>
                </div>
                <div class="det_mob">
                    <div class="mob_sym"> <img src="../../assets/img/userIcon.svg" alt="" style="color: white;
    width: 32px;
    opacity: 0.5;"></div>

                    <div class="det_user" style="    font-size:0.81rem;">বিজ্ঞাপন দাতা:
                        <?php echo $post_det->username; ?>
                    </div>
                </div>

            </div>


            <!--

            <hr class="hr_div" style="
   
    width: 90%;
    color: lightgray;
    
">
-->


            <br>
            <div class="part_div"></div> <span style="    margin-right: auto;
    margin-left: 1rem;
    color: black;
    font-size: 0.9rem;
    margin-top: 0.694rem;
    margin-bottom: 0.694rem;">বর্ণনা:</span>
            <div class="det_details" style="padding: 0px 1rem;
    color: black;
    margin-bottom: 2rem;font-size: 0.8rem;
">
                <?php echo $post_det->details; ?>
            </div>
            <span style="    margin-right: auto;
    margin-left: 1rem;
    color: black;
    font-size: 0.9rem;
    margin-top: 0.694rem;
    margin-bottom: 0.694rem;"> বিজ্ঞাপনটি শেয়ার করুন: </span>
            <ul class="share-buttons" style="list-style: none;
    display: flex;
    margin-right: auto;
    margin-left: 1rem;">
                <li>
                    <a href="https://www.facebook.com/sharer/sharer.php?u=&quote=" title="Share on Facebook" target="_blank" onclick="window.open('https://www.facebook.com/sharer/sharer.php?u=' + encodeURIComponent(document.URL) + '&quote=' + encodeURIComponent(document.URL)); return false;"><img alt="Share on Facebook" src="http://localhost/bhara/assets/img/color/Facebook.png" /></a>
                </li>
                <li>
                    <a href="https://twitter.com/intent/tweet?source=&text=:%20" target="_blank" title="Tweet" onclick="window.open('https://twitter.com/intent/tweet?text=' + encodeURIComponent(document.title) + ':%20'  + encodeURIComponent(document.URL)); return false;"><img alt="Tweet" src="http://localhost/bhara/assets/img/color/Twitter.png" /></a>
                </li>
                <li>
                    <a href="https://plus.google.com/share?url=" target="_blank" title="Share on Google+" onclick="window.open('https://plus.google.com/share?url=' + encodeURIComponent(document.URL)); return false;"><img alt="Share on Google+" src="http://localhost/bhara/assets/img/color/Google+.png" /></a>
                </li>
                <li>
                    <a href="http://pinterest.com/pin/create/button/?url=&description=" target="_blank" title="Pin it" onclick="window.open('http://pinterest.com/pin/create/button/?url=' + encodeURIComponent(document.URL) + '&description=' +  encodeURIComponent(document.title)); return false;"><img alt="Pin it" src="http://localhost/bhara/assets/img/color/Pinterest.png" /></a>
                </li>
                <li>
                    <a href="http://www.reddit.com/submit?url=&title=" target="_blank" title="Submit to Reddit" onclick="window.open('http://www.reddit.com/submit?url=' + encodeURIComponent(document.URL) + '&title=' +  encodeURIComponent(document.title)); return false;"><img alt="Submit to Reddit" src="http://localhost/bhara/assets/img/color/Reddit.png" /></a>
                </li>
                <li>
                    <a href="http://www.linkedin.com/shareArticle?mini=true&url=&title=&summary=&source=" target="_blank" title="Share on LinkedIn" onclick="window.open('http://www.linkedin.com/shareArticle?mini=true&url=' + encodeURIComponent(document.URL) + '&title=' +  encodeURIComponent(document.title)); return false;"><img alt="Share on LinkedIn" src="http://localhost/bhara/assets/img/color/LinkedIn.png" /></a>
                </li>
                <li>
                    <a href="http://wordpress.com/press-this.php?u=&quote=&s=" target="_blank" title="Publish on WordPress" onclick="window.open('http://wordpress.com/press-this.php?u=' + encodeURIComponent(document.URL) + '&quote=' +  encodeURIComponent(document.title)); return false;"><img alt="Publish on WordPress" src="http://localhost/bhara/assets/img/color/Wordpress.png" /></a>
                </li>
                <li>
                    <a href="https://pinboard.in/popup_login/?url=&title=&description=" target="_blank" title="Save to Pinboard" onclick="window.open('https://pinboard.in/popup_login/?url=' + encodeURIComponent(document.URL) + '&title=' +  encodeURIComponent(document.title)); return false;"><img alt="Save to Pinboard" src="http://localhost/bhara/assets/img/color/Pinboard.png" /></a>
                </li>
                <li>
                    <a href="mailto:?subject=&body=:%20" target="_blank" title="Send email" onclick="window.open('mailto:?subject=' + encodeURIComponent(document.title) + '&body=' +  encodeURIComponent(document.URL)); return false;"><img alt="Send email" src="http://localhost/bhara/assets/img/color/Email.png" /></a>
                </li>
            </ul>
            <span style="    margin-right: auto;
    margin-left: 1rem;
    color: black;
    font-size: 0.9rem;
    margin-top: 0.694rem;
    margin-bottom: 0.694rem;">অনুরূপ বিজ্ঞাপন:</span>
            <?php $getFromPo->relatedAdv($post_det->headline);    ?>


            <div class="json_data">
                <?php  echo $json; ?>
            </div>
        </div>
    </div>
    <?php 
    
};

}


        
        
        ?>


    <!--
    <div class="img_det_cont">
        <div class="store_img" style="display:none;">
            '.$post_det->img.'
           

        </div>
        <input type="hidden" id="step" value="3">
        <div class="featured-image-preview">
            <img src="files/'.$character[1]->imageName.'">

             Image count 
            <button id="next-img"><img src="https://www.bharaa.com/assets/img/next.svg" alt="next svg icon"></button>
            <button id="prev-img"><img src="https://www.bharaa.com/assets/img/back.svg" alt="previous svg icon"></button>
        </div>
        <div class="featured-image-list">

        </div>
    </div>
-->





    <!--
<div class="det_post">
    <button class="go_back_but">Back</button>
                    <div class="ad_heading">'.$post_det->headline.'</div>
                    <div class="store_img" style="display:none;">'.$post_det->img.'</div>
                    <div class="imge_box" style="height:400px; width: 400px;">
                    <div class="imge" style="height:400px; width: 400px; text-align: center; vertical-align: middle; position: relative;">
            <img src="files/'.$character[1]->imageName.'"  class="imge_box" id="slide_img" alt="" style="width: 100%; height: 100%;">
            <div class="right_arrow" style="width: 50px; height: 50px; background-color:black;color:white; position: absolute; top: 45%; right:0;">Next</div>
            <div class="left_arrow" style="width: 50px; height: 50px; background-color:black; position: absolute; top: 45%;left:0; color:white;" >Prev</div>
        </div></div>
                    <div class="address_mob">
                        <div class="ad_amount">
                            <h4 style="color:darkgreen; height: 20px; width: 100%; border: 1px solid darkgreen;
                                border-radius: 10px; padding: 10px; text-align: center;">ভাড়া মূল্য: '.$post_det->price.' টাকা </h4>
                        </div>

                        <div class="ad_address" style="font-weight: 300">'.$post_det->address.','.$post_det->address1.','.$post_det->address2.'</div>
                        <hr>
                        <div class="ad_button">
                            <div class="ad_mob">
                                <div class="mobBox" style="color:white; height: 20px; width: 100px; border: 1px solid darkgreen;
                                border-radius: 10px; padding: 10px; text-align: center; background-color:chocolate; ">Call</div>
                            </div>
                            <div class="ad_email">
                                <div class="mobBox" style="color:white; height: 20px; width: 100px; border: 1px solid darkgreen;
                                border-radius: 10px; padding: 10px; text-align: center; background-color: darkcyan;">Email</div>
                            </div>
                        </div>


                    </div>


                    <div class="ad_feat">
                        <div class="ad_overview">Overview</div>|
                        <div class="ad_map">Map</div>
                    </div>
                    <hr>
                    <div class="adv_details">
                        Details Fully Furnished 1 Kanal Brand New House Is Available On Rent
                        <div class="rent_type">Type: House</div>
                        <div class="rent_type">Price: BDT 12,000</div>
                        <div class="rent_type">Location: DHA Defence, Lahore, Punjab </div>
                        <div class="rent_type">Bath(s): 6</div>
                        <div class="rent_type">Area: 20 Marla</div>
                        <div class="rent_type">Purpose For Rent</div>
                        <div class="rent_type">Bedroom(s) 5</div>
                        <div class="rent_type">Added 2 days ago</div>

                    </div>
                    <div class="share_this">facebook.comyoutube.com</div>
                    <div class="recomend">This is recomendation</div>
                </div>
-->
