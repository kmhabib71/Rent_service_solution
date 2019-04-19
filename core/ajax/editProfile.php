<?php
include '../init.php';
include '../../class/login.php';



if(isset($_POST['advId'])){
     $advId = $getFromPo->checkInput($_POST['advId']);
     $userId = $getFromPo->checkInput($_POST['userId']);
     $userID = $getFromPo->checkInput($_POST['userID']);
    $getFromPo->deletePost($userId, $advId, $userID);
       
}
    
    
    
    if(isset($_POST['editName'])){
   
  $editName = $getFromPo->checkInput($_POST['editName']);  
  $editMobile = $getFromPo->checkInput($_POST['editMobile']);  
  $editEmail = $getFromPo->checkInput($_POST['editEmail']);  
  $editAddress = $getFromPo->checkInput($_POST['editAddress']);  
  $profileImage = $getFromPo->checkInput($_POST['imgName']);  
  $userId = $getFromPo->checkInput($_POST['userId']);  
 
 $getFromPo->editProfile($editName, $editMobile, $editEmail, $editAddress, $profileImage, $userId);   
 
$userInfo = $getFromPo->userData($userId);        
?>
    <div class="user_profile">
        <div class="user_pro">
            <a href="#upload_pro_pic" data-rel="popup">
                <div class="user_pro_pic">
                    <?php  if($userInfo->profileImage != ''){ echo  "<img src='".$userInfo->profileImage."' id='existImg'>"; }else{ echo '<a href="editProfile.php"><div style="font-size:1.5rem;width: 2.986rem;height: 2.986rem;border: 2px solid #158a8f;text-align:center;">✍</div></a>'; } ?>
                </div>
            </a>
            <div data-role="popup" id="upload_pro_pic" class="ui-content" style="max-width:280px">
                <input type="file" name="upProPic" id="upProPic" style="font-size: 0.482rem;">
                <a href="#" data-rel="back" class="ui-btn ui-corner-all ui-shadow ui-btn-a ui-icon-delete ui-btn-icon-notext ui-btn-right">Close</a>

            </div>



            <div class="user_pro_name">
                <input type="text" name="editName" id="editName" value="<?php echo $userInfo->username; ?>" style="max-height:10px; font-size:0.6rem;background: #ebdaa6;">

            </div>
        </div>
        <div class="user_pro_info" style="flex-basis: 60%; color: gray;font-size:0.698rem">
            <table>



                <tr>
                    <td width="30%" style="color:black;">Mobile:</td>
                    <td width="70%">
                        <input disabled type="text" name="editMobile" id="editMobile" value="<?php echo $userInfo->mobile; ?>" style="max-height:10px; font-size:0.6rem;background: #ebdaa6;">

                    </td>

                </tr>


                <tr>
                    <td width="30%" style="color:black;">Email:</td>
                    <td width="70%">
                        <input type="text" name="editEmail" id="editEmail" value="<?php echo $userInfo->email; ?>" style="max-height:10px;font-size:0.6rem;background: #ebdaa6;" placeholder="Enter your email">

                    </td>

                </tr>



                <tr>
                    <td width="30%" style="color:black;">Address:</td>
                    <td width="70%" placeholder="Enter your email">
                        <input type="text" name="editAddress" id="editAddress" value="<?php echo $userInfo->address; ?>" style="max-height:10px;font-size:0.6rem;background: #ebdaa6;" placeholder="Enter your email">

                    </td>

                </tr>


            </table>


        </div>

    </div>

    <?php    
    
}
 if ( 0 < $_FILES['file']['error'] ) {
        echo 'Error: ' . $_FILES['file']['error'] . '<br>';
    }
    else {
        move_uploaded_file($_FILES['file']['tmp_name'], $_SERVER['DOCUMENT_ROOT']."/bhar/userImg/".$_FILES['file']['name']);
    }
if(isset($_POST['editName'])){
    
    
    
   
}
    
?>
