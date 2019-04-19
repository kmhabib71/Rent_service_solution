<?php
include '../init.php';
include '../../class/login.php';


if(isset($_POST['search_value'])){
    $search_data = $getFromPo->checkInput($_POST['search_value']);
    $location = $getFromPo->checkInput($_POST['loctext']);
   
//    $search_data = $_POST['search_value'];
    $getFromPo->getPostBySearch($search_data, $location);
    
};




?>
