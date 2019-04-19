<?php
 include './class/login.php';
include './core/init.php';

$userid ='';

$showTimeline=False;
if(login::isLoggedIn()){
     $userid =login::isLoggedIn();
    
     $showTimeline=True;
    
}

$userInfo = $getFromPo->userData($userid);
$catID = '';
if(isset($_GET['cat'])){
    $catID = $_GET['cat'];
   
}

$i=0;


$allMsg = $getFromM->userAllMsg($userid);
foreach($allMsg as $msg){
    
    $msgFrom =  $msg->messageFrom;
    $useridd =  $msg->messageTo;
    $advid =  $msg->advId;
    $msgCount = $getFromM->msgsViewCount($msgFrom, $advid, $useridd);
        if(!empty($msgCount)){
           $i++;   
        }              
    }

?>

    <!DOCTYPE html>
    <html lang="en">

    <head>
        <meta charset="UTF-8">
        <title>ভাড়া.কম</title>
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="stylesheet" href="assets/css/materialize.min.css">
        <link rel="stylesheet" href="assets/css/jquery_mobile.min.css">
        <link rel="apple-touch-icon" sizes="57x57" href="/apple-icon-57x57.png">
        <link rel="apple-touch-icon" sizes="60x60" href="/apple-icon-60x60.png">
        <link rel="apple-touch-icon" sizes="72x72" href="/apple-icon-72x72.png">
        <link rel="apple-touch-icon" sizes="76x76" href="/apple-icon-76x76.png">
        <link rel="apple-touch-icon" sizes="114x114" href="/apple-icon-114x114.png">
        <link rel="apple-touch-icon" sizes="120x120" href="/apple-icon-120x120.png">
        <link rel="apple-touch-icon" sizes="144x144" href="/apple-icon-144x144.png">
        <link rel="apple-touch-icon" sizes="152x152" href="/apple-icon-152x152.png">
        <link rel="apple-touch-icon" sizes="180x180" href="/apple-icon-180x180.png">
        <link rel="icon" type="image/png" sizes="192x192" href="/android-icon-192x192.png">
        <link rel="icon" type="image/png" sizes="32x32" href="/favicon-32x32.png">
        <link rel="icon" type="image/png" sizes="96x96" href="/favicon-96x96.png">
        <link rel="icon" type="image/png" sizes="16x16" href="/favicon-16x16.png">
        <link rel="manifest" href="/manifest.json">
        <meta name="msapplication-TileColor" content="#ffffff">
        <meta name="msapplication-TileImage" content="/ms-icon-144x144.png">
        <meta name="theme-color" content="#ffffff">
        <script src="assets/js/jquery.js"></script>
        <script src="assets/js/jquery_mobile.min.js"></script>
        <link rel="stylesheet" href="assets/css/mobileCustomSmall.css" media="screen and (max-width: 329px)">

        <link rel="stylesheet" href="assets/css/mobileCustom.css" media="screen and (min-width: 330px) and (max-width: 767px)">

        <link rel="stylesheet" href="assets/css/desktop.css" media="screen and (min-width: 768px) and (max-width : 1224px)">

        <link rel="stylesheet" href="assets/css/desktopLarge.css" media="screen and (min-width : 1225px) and (max-width : 1824px)">



        <style>
            a.ui-collapsible-heading-toggle.ui-btn.ui-btn-icon-left.ui-btn-e.ui-icon-plus {
                background-color: white;
                border: none;
                box-shadow: none;
            }
            
            a.ui-collapsible-heading-toggle.ui-btn.ui-btn-icon-left.ui-btn-e.ui-icon-minus {
                box-shadow: none;
            }
            
            .mainCatArea {
                padding: 0.694rem 0rem;
                font-size: 1rem;
                border-bottom: 1px solid white;
                text-align: left;
            }
            
            .cat:hover {
                /*            border: 1px solid white;*/
                /*            display: inline-block;*/
                /*                padding: 0.233rem;*/
                /*            font-size: 1rem;*/
                box-shadow: 1px 1px 5px white;
                /*                transition: padding 0.3s ease-out;*/
            }
            
            .cat:active {
                /*            border: 1px solid white;*/
                /*            display: inline-block;*/
                /*                padding: 0.233rem;*/
                /*            font-size: 1rem;*/
                box-shadow: 1px 1px 5px white;
                /*                transition: padding 0.3s ease-out;*/
            }
            
            .catImg {
                vertical-align: middle;
                margin-right: 0.455rem;
            }
            
            #loading {
                position: fixed;
                width: 100%;
                height: 100vh;
                background: #fff url('assets/images/ajax-loader.gif') no-repeat center center;
                z-index: 99999;
            }

        </style>

    </head>
