<?php
//upload.php
include '../init.php';
include '../../class/login.php';
//include('database_connection.php');
if(isset($_POST['distCord'])){
 $distCord = $_POST['distCord'];  
   
    $getDisVal = $getFromPo->distCord($distCord);
    
    foreach($getDisVal as $getDis){
            
    echo '<input type="hidden" name="" value="'.$getDis->lat.'" id="distlat"><input type="hidden" name="" value="'.$getDis->lon.'" id="distlon">';
    }

}
    
    
    if(isset($_POST['get_ad_cat'])){
    
   $get_ad_cat = $_POST['get_ad_cat'];
   $get_ad_cat_text = $_POST['get_ad_cat_text'];
    $get_ad_userId = $_POST['get_ad_userId'];
    $get_adv_divi = $_POST['get_adv_divi'];
    $get_adv_dist = $_POST['get_adv_dist'];
    $get_adv_upaz = $_POST['get_adv_upaz'];
    $get_adv_head = $_POST['get_adv_head'];
    $get_adv_price = $_POST['get_adv_price'];
    $get_price_time = $_POST['get_price_time'];
    $localAdd = $_POST['localAdd'];
    $get_adv_det = $_POST['get_adv_det'];
    $stIm = $_POST['stIm'];
    $edit_name_text = $_POST['edit_name_text'];
    $edit_mob_text = $_POST['edit_mob_text'];
    $edit_email_text = $_POST['edit_email_text'];
   
    $feat_1 = $getFromPo->checkInput($_POST['feat_1']);
    $feat_2 = $getFromPo->checkInput($_POST['feat_2']);
    $feat_3 = $getFromPo->checkInput($_POST['feat_3']);
    $feat_4 = $getFromPo->checkInput($_POST['feat_4']);
    $nego = $_POST['nego'];
    $latSend = $_POST['latSend'];
    $lngoSend = $_POST['lngoSend'];
    
    
    
    
                                
                                
//    echo $get_ad_cat,$get_adv_divi,$get_adv_dist,$get_adv_upaz,$get_adv_head,$get_adv_price,$get_adv_det,$stIm,$edit_name_text,$edit_mob_text,$edit_email_text,$get_ad_userId;
    
    $getFromPo->create('adv', array('headline' => $get_adv_head, 'address' => $get_adv_divi, 'address1'=> $get_adv_dist, 'address2' => $get_adv_upaz, 'localAdd' => $localAdd, 'category'=> $get_ad_cat,'sub_cat'=> $get_ad_cat_text, 'feat_1'=>$feat_1,'feat_2'=>$feat_2,'feat_3'=>$feat_3,'feat_4'=>$feat_4, 'price' => $get_adv_price,'pricePeriod' => $get_price_time, 'details' => $get_adv_det,'img' => $stIm, 'date_time' => date('Y-m-d H:i:s'),'username' => $edit_name_text,'userid' => $get_ad_userId,'email'=> $edit_email_text,'mobile'=>$edit_mob_text, 'nego'=>$nego,'lat'=>$latSend,'lng'=>$lngoSend, 'publish' => '0'));
};



?>
