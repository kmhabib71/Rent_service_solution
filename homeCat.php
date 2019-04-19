<?php include 'include/header.php'; ?>

<body>
    <div data-role="page" id="homepage">
        <?php               if(isset($_GET['loc'])){
                $location = $getFromPo->checkInput($_GET['loc']);
                }else{
                    $location = '';
}
   ?>
        <?php include'include/panel.php'; ?>

        <div data-role="header" style="background-color:aliceblue;" id="header">


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
                            <img src="assets/img/nav-click-hori.svg" class="nav_hori" alt="" style="z-index:99;">
                        </div>
                    </a>
                    <a href="homeCat.php?cat=3" class="roomLocation" data-ajax="false" style="cursor:pointer;">
                        <div class="roomWrap">
                            <div class="nav nav_homee" style="margin-left: 38px; */">
                                <img src="assets/img/room-2.png" alt="" style="padding:0;">
                            </div>
                            <div class="rbf" style="margin-right: 0.355rem;">রুম</div>
                        </div>
                    </a>
                    <a href="homeCat.php?cat=2" class="houseLocation" data-ajax="false" style="cursor:pointer;">
                        <div class="nav nav_carr">
                            <img src="assets/img/house-2.png" alt="" style="padding:0;">
                        </div>
                        <div class="rbf">বাসা</div>
                    </a>
                    <a href="homeCat.php?cat=1" class="flatLocation" data-ajax="false" style="cursor:pointer;">
                        <div class="nav nav_carr">
                            <img src="assets/img/flat-2.png" alt="" style="padding:0;">
                        </div>
                        <div class="rbf">ফ্ল্যাট</div>
                    </a>
                </div>
                <div class="main_category desktop" style="">
                    <a href="#myPanel1" class="bigNav">
                        <div class="nav_bar_click">
                            <img src="assets/img/nav-click-hori.svg" class="nav_hori" alt="" style="z-index:99;">
                        </div>
                        <div class="notiCount" style="    position: absolute;display: flex;background-color: blueviolet;border-radius: 50%;height: 25px;width: 25px;justify-content: center;box-shadow: 1px 1px 5px #427060;align-items: center;color: white;text-shadow: none;font-weight: 300;margin-left: 22px;margin-top: 10px;z-index: 99;display: none;">5</div>
                    </a>
                    <a href="homeCat.php?cat=3" class="roomLocation" data-ajax="false" style="cursor:pointer;">
                        <div class="roomWrap">
                            <div class="nav nav_homee" style="margin-left: 0px; */">
                                <img src="assets/img/room-2.png" alt="" style="padding:0;">
                            </div>
                            <div class="rbf" style="margin-right: 0.355rem;">রুম</div>
                        </div>
                    </a>
                    <a href="homeCat.php?cat=2" class="houseLocation" data-ajax="false" style="cursor:pointer;">
                        <div class="nav nav_carr">
                            <img src="assets/img/house-2.png" alt="" style="padding:0;">
                        </div>
                        <div class="rbf">বাসা</div>
                    </a>
                    <a href="homeCat.php?cat=1" class="flatLocation" data-ajax="false" style="cursor:pointer;">
                        <div class="nav nav_carr">
                            <img src="assets/img/flat-2.png" alt="" style="padding:0;">
                        </div>
                        <div class="rbf">ফ্ল্যাট</div>
                    </a>

                </div>
                <div class="search_option" style="    display: flex;flex-direction: row;justify-content: flex-end;padding-right: -0.22rem;;    
<!--                    flex-basis: 65%;-->
                    ">
                    <div class="msgNotificIconn" style="margin-left: 0.482rem;position: relative;margin-right: 65px;cursor:pointer" data-userid="<?php echo $userid; ?>">
                        <div class="notiCount" style="    position: absolute;display: flex;background-color: blueviolet;border-radius: 50%;height: 25px;width: 25px;justify-content: center;box-shadow: 1px 1px 5px #427060;align-items: center;color: white;text-shadow: none;">
                            <?php echo $i; ?>
                        </div>


                        <img src="https://img.icons8.com/ios/50/000000/speech-bubble.png" style="height:40px; width:40px;right: 0;">
                        <div class="allChat" style="display:none;">

                        </div>
                    </div>
                    <a href="#" data-transition="slide" id="area_search">অবস্থান নির্বাচন </a>
                    <div class="ui-btn ui-icon-search ui-btn-icon-right ui-shadow ui-corner-all" id="post_search_subb" style="border: none;background: none;box-shadow: none; margin-top: 1px;"></div>


                </div>

            </div>

            <?php include'include/searchRent.php'; ?>

        </div>
        <?php include'include/placeSearch.php'; ?>

        <div data-role="content" class="ui-content contentt" role="main">
            <div class="post_det_container">

            </div>
            <div class="mainWrap">
                <div class="post">
                    <?php
                if($catID != ''){ $getFromPo->Posts($catID,$location); }else{
                $catID = 'homeCat';
                
                $getFromPo->Posts($catID,$location); } ?>


                </div>
                <?php include 'include/desktopMenu.php'  ?>
            </div>
            <?php echo '<div class="nameCat" style="display:none;">'.$catID.'</div>'; ?>
            <div class="userID" data-userid="<?php echo $userid; ?>"></div>
            <a href="homeCat.php" id="hrefIdentify" style="display:none;"></a>
            <div class="shareBu" style="display:none;">
                <?php echo $shareBut; ?>
            </div>
        </div>



    </div>

    <?php include'include/footerAll.php'; ?>
