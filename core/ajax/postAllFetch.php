<?php
include '../init.php';
include '../../class/login.php';
if(isset($_POST['har'])){
$advID = $_POST['har'];

//$advID = $_POST['har'];
//            echo $advID;
$ad_details= $getFromPo->postDetails($advID);
  
//echo gettype($ad_details);

$json = json_encode($ad_details);   
//   
      echo $json;
}
if(isset($_POST['shareButton'])){


$ad_details= $getFromPo->shareButton();
  
  
      echo $ad_details;
}

if(isset($_POST['rel_adv'])){
$advID = $_POST['rel_adv'];
$ad_details= $getFromPo->postDetails($advID);
    

   
    
foreach($ad_details as $post_det){
 $ad_detail = $getFromPo->relatedAdv($post_det->headline, $post_det->adv_id);
     echo $ad_detail;
 
}
  
  
  
     
}

?>
