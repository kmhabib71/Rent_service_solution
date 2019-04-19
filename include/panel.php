<div data-role="panel" id="myPanel1" data-display="overlay" data-position="left" style="background: #29af7d;">
    <!--            <h2>Menu Details</h2>-->
    <ul style="color:#158a8f;">
        <li>

            <div class="pro_container">
                <a href="editProfile.php" class="panel_link_style" data-ajax="false">
                    <div class="pro_pic"><img src="<?php
                                    if($userid != ''){
                                    echo $userInfo->profileImage; }else{
                                        echo 'assets/images/defaultProfileImage.png';
                                    } ?>" alt="">
                    </div>
                </a>
                <div class="pro_details">
                    <a href="editProfile.php" data-ajax="false">
                        <div class="pro_name" style="color: #ebdaa6; text-shadow:none;">
                            <?php if($userid != ''){ echo $userInfo->username; }else{echo'Name';} ?>
                        </div>
                    </a>
                    <a href="editProfile.php" data-ajax="false">
                        <div class="pro_mob" style="color: #ebdaa6; text-shadow:none;">
                            <?php if($userid != ''){ echo $userInfo->mobile; }else{echo 'Mobile'; }  ?>
                        </div>
                    </a>
                </div>

                <div class="notiFicIcon" style="margin-left:2rem; position:relative; visibility:hidden;">
                    <div class="notiCount" style="    position: absolute;display: flex;background-color: blueviolet;border-radius: 50%;height: 25px;width: 25px;justify-content: center;box-shadow: 1px 1px 5px #427060;align-items: center; display:none;">0</div>

                    <img src="https://img.icons8.com/ios/50/000000/appointment-reminders.png" style="height:40px; width:40px;">

                </div>
                <a href="message.php" data-ajax="false">
                            <div class="msgNotificIcon" style="margin-left:0.482rem; position:relative;" data-userid="<?php echo $userid; ?>">
                                <div class="notiCount" style="    position: absolute;display: flex;background-color: blueviolet;border-radius: 50%;height: 25px;width: 25px;justify-content: center;box-shadow: 1px 1px 5px #427060;align-items: center;color: white;text-shadow: none;">
                                    <?php echo $i; ?>
                                </div>

                               
                                    <img src="https://img.icons8.com/ios/50/000000/speech-bubble.png" style="height:40px; width:40px;right: 0;">
                                
                            </div>
</a>

            </div>
            <div class="notiChat" style="height: auto;padding: 5px;background-color: white;color: #000000b8; display:none;">

            </div>

        </li>
        <li class="pro_li">
            <a href="" class="panel_link_style"><span class="pro_icon"><img src="assets/img/icons8-sorting-36.png" alt="" style="vertical-align:middle;"></span>ক্যাটাগরি</a>
            <div class="cat_det">
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
        <?php  if($userid == ''){ ?>
        <li class="pro_li"><a href="login/login.php" class="panel_link_style" data-ajax="false"><span class="pro_icon"><img src="assets/img/icons8-password-36.png" alt="" style="vertical-align:middle;"></span>লগিন করুন</a></li>
        <li class="pro_li">
            <a href="login/signUp.php" data-ajax="false" class="panel_link_style"><span class="pro_icon"><img src="assets/img/icons8-add-user-male-36%20(1).png" alt="" style="vertical-align:middle;"></span>এ্যাকাউন্ট খুলুন</a>
        </li>
        <?php } ?>
        <li class="pro_li">
            <a href="profile.php" data-ajax="false" class="panel_link_style"><span class="pro_icon"><img src="assets/img/icons8-name-tag-36.png" alt="" style="vertical-align:middle;"></span>প্রোফাইল</a>
        </li>
        <li class="pro_li">
            <a href="message.php" data-ajax="false" class="panel_link_style"><span class="pro_icon"><img src="assets/img/icons8-speech-bubble-36.png" alt="" style="vertical-align:middle;"></span>চ্যাট</a>
        </li>

        <li class="pro_li">
            <a href="rentAccount.php" class="panel_link_style" data-ajax="false"><span class="pro_icon"><img src="assets/img/icons8-estimate-36.png" alt="" style="vertical-align:middle;"></span>ভাড়া হিসাব</a>
        </li>
        <?php  if($userid != ''){ ?>
        <li class="pro_li">
            <a href="logout.php" data-ajax="false"  class="panel_link_style"><span class="pro_icon"><img src="assets/img/icons8-shutdown-36.png" alt="" style="vertical-align:middle;"></span>লগআউট</a>
        </li>
        <?php } ?>
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
