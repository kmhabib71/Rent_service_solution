<div data-role="header" style="background-color:aliceblue; " id="header">


    <div class="header_wrapper">
        <div class="logo" id="my_logo">
            <a href="#"><img src="assets/img/logo.svg" alt=""></a>

        </div>
        <a style="text-decoration:none;" href="index.php" data-ajax="false">
            <div class="brandName">ভাড়া.কম</div>
        </a>
        <a href="adv.php" data-ajax="false">
            <div class="post_adv">ফ্রি বিজ্ঞাপন দিন</div>
        </a>

    </div>
    <div class="header_down_part">
        <div class="main_category mob_view" style="">

            <a href="#myPanel1">
                <div class="nav_bar_click">
                    <img src="assets/img/nav-click-hori.svg" class="nav_hori" alt="" style="z-index:99;"><br>

                </div>
            </a>
            <a href="homeCat.php" class="houseLocation" data-ajax="false" style="cursor:pointer;">
                <div class="nav nav_home">
                    <img src="assets/img/home.png" alt="">

                </div>
            </a>


            <a href="vehCat.php" class="vehLocation" data-ajax="false" style="cursor:pointer;">
                <div class="nav nav_car">
                    <img src="assets/img/carNav.png" alt="">

                </div>
            </a>

            <a href="comCat.php" class="comLocation" data-ajax="false" style="cursor:pointer;">
                <div class="nav nav_bank"><img src="assets/img/shop.png" alt="" style="margin-top: 2px;"></div>
            </a>
            <a href="conCat.php" data-ajax="false" style="cursor:pointer;">
                <div class="nav nav_crane"><img src="assets/img/crane.png" alt=""></div>
            </a>
            <a href="perCat.php" data-ajax="false" style="cursor:pointer;">
                <div class="nav nav_employee"><img src="assets/img/personel.png" alt=""></div>
            </a>
            <a href="comCat.php" data-ajax="false" style="cursor:pointer;">
                <div class="nav nav_shop"><img src="assets/img/bank.png" style="height: 35px; width: 35px;" alt=""></div>
            </a>

        </div>
        <div class="main_category desktop" style="">
            <a href="#myPanel1" class="bigNav">
                <div class="nav_bar_click">
                    <img src="assets/img/nav-click-hori.svg" class="nav_hori" alt="" style="z-index:99;">
                </div>
                <div class="notiCount" style="    position: absolute;display: flex;background-color: blueviolet;border-radius: 50%;height: 25px;width: 25px;justify-content: center;box-shadow: 1px 1px 5px #427060;align-items: center;color: white;text-shadow: none;font-weight: 300;margin-left: 22px;margin-top: 10px;z-index: 99;display: none;">5</div>
            </a>
            <a href="homeCat.php" class="houseLocation" data-ajax="false" style="cursor:pointer;">
                <div class="nav nav_home">
                    <img src="assets/img/home.png" alt="">
                </div>
            </a>
            <a href="vehCat.php" class="vehLocation" data-ajax="false" style="cursor:pointer;">
                <div class="nav nav_car">
                    <img src="assets/img/carNav.png" alt="">
                </div>
            </a>
            <a href="comCat.php" class="comLocation" data-ajax="false" style="cursor:pointer;">
                <div class="nav nav_bank"><img src="assets/img/shop.png" alt="" style="margin-top: 2px;"></div>
            </a>
            <a href="conCat.php" data-ajax="false" style="cursor:pointer;">
                <div class="nav nav_crane"><img src="assets/img/crane.png" alt=""></div>
            </a>
            <a href="perCat.php" data-ajax="false" style="cursor:pointer;">
                <div class="nav nav_employee"><img src="assets/img/personel.png" alt=""></div>
            </a>
            <!--
            <a href="comCat.php" data-ajax="false" style="cursor:pointer;">
                <div class="nav nav_shop"><img src="assets/img/bank.png" style="height: 35px; width: 35px;" alt=""></div>
            </a>
-->

        </div>



        <div class="search_option" style="    display: flex;flex-direction: row;justify-content: flex-end;padding-right: 0.22rem;">
            <a href="message.php" data-ajax="false">
                        <div class="msgNotificIconn" style="margin-left: 0.482rem;position: relative;margin-right: 65px;cursor:pointer" data-userid="<?php echo $userid; ?>">
                            <div class="notiCount" style="    position: absolute;display: flex;background-color: blueviolet;border-radius: 50%;height: 25px;width: 25px;justify-content: center;box-shadow: 1px 1px 5px #427060;align-items: center;color: white;text-shadow: none;">
                                <?php echo $i; ?>
                            </div>


                            <img src="https://img.icons8.com/ios/50/000000/speech-bubble.png" style="height:40px; width:40px;right: 0;">
                            <div class="allChat" style="display:none;">

                            </div>
                        </div>
                        </a>
            <a href="#" data-transition="slide" id="area_search">অবস্থান নির্বাচন </a>
            <div class="ui-btn ui-icon-search ui-btn-icon-right ui-shadow ui-corner-all" id="post_search_subb" style="border: none;background: none;box-shadow: none; margin-top: 1px;"></div>


        </div>

    </div>

    <div class="search_rent" style="margin-top:0; display:none;">
        <div class="" style="width: 100%;">
            <div class=""><input type="text" class="search_box" placeholder="ভাড়া প্রোপার্টি অনুসন্ধান করুন" name="post_search" id="post_search" style="height: 32px;font-size: 0.698rem;border: 1px solid #80808045;margin-bottom: 0.455rem;border-radius: 0.355rem;"></div>
        </div>
        <div class="ui-btn ui-icon-search ui-btn-icon-right ui-shadow ui-corner-all" id="post_search_su" style="border: none;background: none;box-shadow: none;margin-left: -40px;margin-top: 1px;">
        </div>


    </div>

</div>
