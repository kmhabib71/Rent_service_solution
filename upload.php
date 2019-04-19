<?php
//upload.php
include('database_connection.php');
//if(isset($_POST['get_ad_cat']) ){die('we got it');}else{
//    die('No fai');
//}
if(count($_FILES["file"]["name"]) > 0)
{
 //$output = '';
 sleep(3);
 for($count=0; $count<count($_FILES["file"]["name"]); $count++)
 {
  $file_name = $_FILES["file"]["name"][$count];
  $tmp_name = $_FILES["file"]['tmp_name'][$count];
  $file_array = explode(".", $file_name);
  $file_extension = end($file_array);
//  if(file_already_uploaded($file_name, $connect))
//  {
//   $file_name = $file_array[0] . '-'. rand() . '.' . $file_extension;
//  }
  $location = 'files/' . $file_name;
  move_uploaded_file($tmp_name, $location);
//  if(move_uploaded_file($tmp_name, $location))
//  { echo 'Image has not stored in database';
//   $query = "
//   INSERT INTO tbl_image (image_name, image_description) 
//   VALUES ('".$file_name."', '')
//   ";
//   $statement = $connect->prepare($query);
//   $statement->execute();
//    
//  }
 }
    echo 'Image uploaded';
}

//function file_already_uploaded($file_name, $connect)
//{
// 
// $query = "SELECT * FROM tbl_image WHERE image_name = '".$file_name."'";
// $statement = $connect->prepare($query);
// $statement->execute();
// $number_of_rows = $statement->rowCount();
// if($number_of_rows > 0)
// {
//  return true;
// }
// else
// {
//  return false;
// }
//}

?>
