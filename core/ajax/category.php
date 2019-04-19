<?php

include '../init.php';
include '../../class/login.php';


if(isset($_POST['home_val'])){
    
  $homeFetch = $getFromPo->home_adv();
//    echo $homeFetch;
   
}
if(isset($_POST['vehicle'])){
    
  $homeFetch = $getFromPo->vehicle();
//    echo $homeFetch;
   
}
if(isset($_POST['constr'])){
    
  $homeFetch = $getFromPo->constr();
//    echo $homeFetch;
   
}
if(isset($_POST['personal'])){
    
  $homeFetch = $getFromPo->personal();
//    echo $homeFetch;
   
}
if(isset($_POST['mea'])){
    $location = $_POST['mea'];
//    $location = "";
      $catID = $_POST['nameCat'];
//    $getFromPo->Posts($nameCat, $location);
    
    $getFromPo->Posts($catID, $location);
//    echo $catID, $location ;
  
};
//if(isset($_POST['mea'])){
//    $dis_data = $_POST['mea'];
//    $getFromPo->getPostBaseLocation($dis_data);
//};




?>
