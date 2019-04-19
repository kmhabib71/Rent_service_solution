<?php
include '../init.php';
include '../../class/login.php';
//include('database_connection.php');
if(isset($_POST['indMsg']) && !empty($_POST['indMsg'])){
    $msgto = $getFromPo->checkInput($_POST['msgto']);
    $indMsg = $getFromPo->checkInput($_POST['indMsg']);
    $userid = $getFromPo->checkInput($_POST['userid']);
    $advid = $getFromPo->checkInput($_POST['advid']);
  $messages = $getFromM->msgTo($msgto,$userid,$advid);
    foreach($messages as $msg){
        ?>

    <?php if($msg->messageFrom == $msgto) {  ?>
    <div class="leftMsgText">
        <div class="leftMsg" style="background: lightgray;">
            <?php echo $msg->message; ?>
        </div>
        <div class="leftMsgTime">
            <?php echo $getFromPo->timeAgo($msg->messageOn); ?>
        </div>
    </div>
    <?php  } ?>
    <?php if($msg->messageFrom == $userid) {  ?>
    <div class="rightMsgText">
        <div class="rightMsg" style="">
            <?php echo $msg->message; ?>
        </div>
        <div class="leftMsgTime">
            <?php echo $getFromPo->timeAgo($msg->messageOn); ?>
        </div>
    </div>
    <?php } ?>




    <?php    
        
    }  
    
}
    if(isset($_POST['msgto']) && !empty($_POST['msgto'])){
    $msgto = $getFromPo->checkInput($_POST['msgto']);
    $indMsg = $getFromPo->checkInput($_POST['indMsg']);
    $userid = $getFromPo->checkInput($_POST['userid']);
    $advid = $getFromPo->checkInput($_POST['advid']); 
    
    
     $getFromPo->create('messages', array('message' => $indMsg, 'messageTo' => $msgto, 'messageFrom'=> $userid, 'advId' => $advid, 'messageOn' => date('Y-m-d H:i:s'), 'status' => '0'));

}
    if(isset($_POST['openChat']) && !empty($_POST['openChat'])){
    $openChat = $getFromPo->checkInput($_POST['openChat']);
    $userid = $getFromPo->checkInput($_POST['userid']);
    $advid = $getFromPo->checkInput($_POST['advid']); 
    $messages = $getFromM->openchat($openChat,$userid,$advid);
     $getFromM->singleChatViewed($userid,$openChat,$advid)  ;      
//        echo $userID,$advUserID,$advID;   
        
    ?>


    <?php
    foreach($messages as $msg){
        ?>

        <?php if($msg->messageFrom == $openChat) {  ?>
        <div class="leftMsgText">
            <div class="leftMsg" style="background: lightgray;">
                <?php echo $msg->message; ?>
            </div>
            <div class="leftMsgTime">
                <?php echo $getFromPo->timeAgo($msg->messageOn); ?>
            </div>
        </div>
        <?php  } ?>
        <?php if($msg->messageFrom == $userid) {  ?>
        <div class="rightMsgText">
            <div class="rightMsg" style="background-color: deepskyblue;color:white;">
                <?php echo $msg->message; ?>
            </div>
            <div class="leftMsgTime">
                <?php echo $getFromPo->timeAgo($msg->messageOn); ?>
            </div>
        </div>
        <?php } ?>




        <?php    
        
    }
    ?>





        <?php
}
    
    
    if(isset($_POST['advID']) && !empty($_POST['advID'])){
  
$advID = $getFromPo->checkInput($_POST['advID']);
$advUserID = $getFromPo->checkInput($_POST['advUserID']);
$userID = $getFromPo->checkInput($_POST['userID']);
//if($userID != ''){}else{}    
$getFromM->singleChatViewed($userID,$advUserID,$advID)  ;      
//        echo $userID,$advUserID,$advID;
        
if($advUserID != $userID){    
$messages = $getFromM->advMessage($advID,$advUserID,$userID);

foreach($messages as $msg){
    ?>

            <?php if($msg->messageFrom == $advUserID) {  ?>
            <div class="leftMsgText">
                <div class="leftMsg" style="background-color:lightgray;">

                    <?php echo $msg->message; ?>
                </div>
                <div class="leftMsgTime">
                    <?php echo $getFromPo->timeAgo($msg->messageOn); ?>
                </div>
            </div>
            <?php  } ?>
            <?php if($msg->messageFrom == $userID) {  ?>
            <div class="rightMsgText">
                <div class="rightMsg" style="background-color: deepskyblue;">
                    <?php echo $msg->message; ?>
                </div>
                <div class="leftMsgTime">
                    <?php echo $getFromPo->timeAgo($msg->messageOn); ?>
                </div>
            </div>
            <?php } ?>




            <?php
    
}   
 }elseif($advUserID == $userID){
    $messages = $getFromM->userAllMsgs($advID,$advUserID,$userID);
    foreach($messages as $msg){ ?>
                <div class="chatList" data-msgFrom="<?php echo $msg->messageFrom; ?>" data-userid="<?php echo $userID; ?>" data-advid="<?php echo $advID; ?>" data-advuserid="<?php echo $advUserID; ?>" style="display: flex;    background-color: #0b4548;padding: 5px;     border-top-left-radius: 5px;border-bottom-right-radius: 5px; border-top-right-radius: 5px;width: 100%; margin-top:1rem;box-shadow: 1px 1px 5px grey;cursor:pointer;">
                    <div class="chatImgBox"><img src="assets/images/defaultProfileImage.png" alt="" style="height: 30px; width: 30px; border-radius: 50%;"></div>
                    <div class="chatNameBox" style="font-size: 0.698rem;display: flex;flex-direction: column;justify-content: flex-end; padding: 0 0 0 10px;">
                        <div class="senderName" style="font-weight: 600;color:white;">
                            <?php echo $msg->username;  ?>
                        </div>
                        <div class="senderLastMsg" style="color: gray;font-size: 0.482rem;color:lightblue;">
                            <?php echo $msg->message;  ?> <span>. <?php echo $getFromPo->timeAgo($msg->messageOn); ?></span></div>
                    </div>
                </div>
                <div class="persChat">
                    <div class="mainChatt" style="background-color: #0b4548;border-bottom-left-radius: 5px;border-bottom-right-radius: 5px; border-top-right-radius: 5px;">

                        <div class="bothMsgg">



                        </div>



                    </div>

                </div>
                <?php
}
}else{echo 'Not fount'; }
 ?>


                    <?php 
}





   


if(isset($_POST['adv']) && !empty($_POST['adv'])){
  $adv = $getFromPo->checkInput($_POST['adv']);   
  $userid = $getFromPo->checkInput($_POST['userid']);   
  $msgfrom = $getFromPo->checkInput($_POST['msgfrom']); 
$getFromM->msgsViewed($msgfrom, $adv, $userid); 
    
}
        
        if(isset($_POST['inputVal']) && !empty($_POST['inputVal'])){
  $inputVal = $getFromPo->checkInput($_POST['inputVal']);  
  $advID = $getFromPo->checkInput($_POST['advID']);  
  $advUserID = $getFromPo->checkInput($_POST['advUserID']);  
  $userID = $getFromPo->checkInput($_POST['userID']);  
  
  $getFromPo->create('messages', array('message' => $inputVal, 'messageTo' => $advUserID, 'messageFrom'=> $userID, 'advId' => $advID, 'messageOn' => date('Y-m-d H:i:s'), 'status' => '0', 'notification' => '0'));
     
} 

if(isset($_POST['msgFrom']) && !empty($_POST['msgFrom'])){
  $advUserID = $getFromPo->checkInput($_POST['msgFrom']);  
  $userID = $getFromPo->checkInput($_POST['userid']);  
  $advID = $getFromPo->checkInput($_POST['advid']);  
  
//  $exa= $getFromM->indMsgDet($msgFrom,$userid,$advid);
//  $getFromM->indMsgDet($msgFrom,$userid,$advid);
//    foreach($exa as $ex){
//        echo $ex->advId;
//    }
    
$getFromM->msgsViewed($advUserID, $advID, $userID);
    
if($advUserID != $userID){    
$messages = $getFromM->indMsgDet($advUserID,$userID,$advID);
echo 'msg Found';
foreach($messages as $msg){
    ?>

                    <!--
                        <?php if($msg->messageFrom == $advUserID) {  ?>
                        <div class="leftMsgText">
                            <div class="leftMsg" style="background-color:lightgray;">

                                <?php echo $msg->message; ?>
                            </div>
                            <div class="leftMsgTime">
                                <?php echo $getFromPo->timeAgo($msg->messageOn); ?>
                            </div>
                        </div>
                        <?php  } ?>
                        <?php if($msg->messageFrom == $userID) {  ?>
                        <div class="rightMsgText">
                            <div class="rightMsg" style="background-color: deepskyblue;">
                                <?php echo $msg->message; ?>
                            </div>
                            <div class="leftMsgTime">
                                <?php echo $getFromPo->timeAgo($msg->messageOn); ?>
                            </div>
                        </div>
                        <?php } ?>
-->










                    <?php if($msg->messageFrom == $advUserID) {  ?>




                    <div class="leftMsgText" style="display:flex; margin-bottom:0.694rem; flex-direction: column; ">
                        <div class="leftMsg" style="display:flex;justify-content: center;align-items: center;">
                            <div class="imgBox" style="height:35px;width:35px; border-radius:50% ;   background-color: blueviolet;">
                                <?php echo '<img src="'.$msg->profileImage.'" alt="" style="height:35px;width:35px; border-radius:50% background-color:pink; border:2px solid white;" id="'.$msg->user_id.'">' ?> </div>
                            <div class="msgBo" style="
                                 display:flex; justify-content:center;align-items:center; background-color: lightgray;padding: 0.694rem 1rem;border-radius: 0.694rem; margin-bottom:1.5rem;">
                                <?php echo $msg->message; ?>
                            </div>

                        </div>
                        <div class="leftMsgTime" style="display:flex; justify-content:flex-start;margin-left:2.5rem;margin-top:-1.5rem;">
                            <?php echo $getFromPo->timeAgo($msg->messageOn); ?>
                        </div>
                    </div>
                    <?php  } ?>
                    <?php if($msg->messageFrom == $userID) {  ?>
                    <div class="rightMsgText" style="display:flex; margin-bottom:1rem; flex-direction: column; ">
                        <div class="rightMsg" style="display: flex;justify-content: center;align-items: center;">
                            <div class="msgBo" style="display:flex; justify-content:center;align-items:center; background-color: deepskyblue;padding: 0.694rem 1rem;border-radius: 0.694rem; margin-bottom:1.5rem;">
                                <?php echo $msg->message; ?>
                            </div>
                            <div class="imgBox" style="height:35px;width:35px; border-radius:50% ;   background-color: blueviolet;">
                                <?php echo '<img src="'.$msg->profileImage.'" alt="" style="height:35px;width:35px; border-radius:50%; border:2px solid white;" id="'.$msg->user_id.'">' ?> </div>

                        </div>
                        <div class="leftMsgTime" style="display:flex; justify-content:flex-end;margin-right:2.5rem;margin-top:-1.5rem;">
                            <?php echo $getFromPo->timeAgo($msg->messageOn); ?>

                        </div>
                    </div>

                    <?php } ?>




                    <?php
    
}    
 }elseif($advUserID == $userID){
    $messages = $getFromM->userAllMsgs($advID,$advUserID,$userID);
    foreach($messages as $msg){ ?>
                        <div class="chatList" data-msgFrom="<?php echo $msg->messageFrom; ?>" data-userid="<?php echo $userID; ?>" data-advid="<?php echo $advID; ?>" data-advuserid="<?php echo $advUserID; ?>" style="display: flex;    background-color: #0b4548;padding: 5px;     border-top-left-radius: 5px;border-bottom-right-radius: 5px; border-top-right-radius: 5px;width: 100%; margin-top:1rem;box-shadow: 1px 1px 5px grey;cursor:pointer;">
                            <div class="chatImgBox"><img src="assets/images/defaultProfileImage.png" alt="" style="height: 30px; width: 30px; border-radius: 50%;"></div>
                            <div class="chatNameBox" style="font-size: 0.698rem;display: flex;flex-direction: column;justify-content: flex-end; padding: 0 0 0 10px;">
                                <div class="senderName" style="font-weight: 600; color:white;">
                                    <?php echo $msg->username;  ?>
                                </div>
                                <div class="senderLastMsg" style="color: gray;font-size: 0.482rem;color:lightblue;">
                                    <?php echo $msg->message;  ?> <span>. <?php echo $getFromPo->timeAgo($msg->messageOn); ?></span></div>
                            </div>
                        </div>
                        <div class="persChat">
                            <div class="mainChatt" style="background-color: #0b4548;border-bottom-left-radius: 5px;border-bottom-right-radius: 5px; border-top-right-radius: 5px;">

                                <div class="bothMsgg">



                                </div>



                            </div>

                        </div>
                        <?php
}
}else{echo 'Not fount'; }    
    
    
    
    
}

?>
