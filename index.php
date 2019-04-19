<!--
        <div class="action" style="position:relative;">
            <div class="actionIcon" style="position: absolute;right: 10%;height: 3rem;width: 3rem;background: #ffdd75;;font-size: 2rem;z-index: 9;border-radius: 50%;display: flex;justify-content: center;align-items: center;top: 81vh;box-shadow: 1px 1px 5px #000000bf;text-shadow: none;font-weight: 300;">+</div>
            <ul style="position: absolute;right: 1%;z-index: 9;display:flex-direction: column;justify-content: center;align-items: center;top: 64.5vh;text-shadow: none;font-weight: 300;padding: 5px;border-radius: 5px;">

                <li class="acBut">বুকিং</li>
                <li class="acBut">বিজ্ঞাপন প্রচার</li>
                <li class="acBut">ফোন কল</li>

            </ul>
        </div>
-->



<?php include 'include/header.php'; 


?>


<body>


    <div data-role="page" id="homepage">

        <?php             if(isset($_GET['loc'])){
                $location = $getFromPo->checkInput($_GET['loc']);
                }else{
                    $location = '';
} ?>
        <?php include'include/panel.php'; ?>
        <?php include'include/headerDownPart.php'; ?>



        <?php include'include/placeSearch.php'; ?>



        <div data-role="content" class="ui-content contentt" role="main">

            <div class="post_det_container">

            </div>
            <div class="mainWrap">
                <div class="post">
                    <?php
    
                if($catID != ''){ $getFromPo->Posts($catID,$location); }else{
                $catID = 'main';
                
                $getFromPo->Posts($catID,$location); } ?>


                </div>
                <?php include 'include/desktopMenu.php'  ?>
            </div>
            <?php echo '<div class="nameCat" style="display:none;">'.$catID.'</div>'; ?>
            <div class="userID" data-userid="<?php echo $userid; ?>"></div>
            <a href="index.php" id="hrefIdentify" style="display:none;"></a>
            <div class="shareBu" style="display:none;">
                <?php echo $shareBut; ?>
            </div>
        </div>

    </div>
    <?php include 'include/footerAll.php'  ?>
