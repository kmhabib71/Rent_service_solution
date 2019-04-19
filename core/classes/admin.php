<?php
class Admin extends User{
	function __construct($pdo){
		$this->pdo = $pdo;

	}

    
    
    
 public function  openions(){
     $stmt = $this->pdo->prepare("SELECT * FROM opinion"); 
  

//$stmt->bindParam(":userid", $userid, PDO::PARAM_INT);

$stmt->execute();
return $stmt->fetchAll(PDO::FETCH_OBJ); 
 }   
 public function advEditSubmit($adv_id,$headline,$address,$address1,$address2,$localAdd,$category,$sub_cat,$feat_1,$feat_2,$feat_3,$feat_4,$price,$pricePeriod,$img,$details,$date_time,$userid,$userName,$mobile,$email,$nego,$lat,$lng, $publish){ 
     $stmt = $this->pdo->prepare("UPDATE `adv` 
SET  `headline` = :headline, `address` = :address, `address1` = :address1,`address2` = :address2, `localAdd` = :localAdd, `category` = :category, `sub_cat` = :sub_cat, `feat_1` = :feat_1, `feat_2` = :feat_2, `feat_3` = :feat_3, `feat_4` = :feat_4, `price` = :price, `pricePeriod` = :pricePeriod,`details` = :details,`date_time` = :date_time,`userid` = :userid,`userName` = :userName,`mobile` = :mobile,`email` = :email,`nego` = :nego,`lat` = :lat, `lng` = :lng,`publish` = :publish WHERE `adv_id` = :adv_id ");
			$stmt->bindParam(":adv_id", $adv_id, PDO::PARAM_INT);
			$stmt->bindParam(":headline", $headline, PDO::PARAM_INT);
			$stmt->bindParam(":address", $address, PDO::PARAM_INT);
			$stmt->bindParam(":address1", $address1, PDO::PARAM_INT);
			$stmt->bindParam(":address2", $address2, PDO::PARAM_INT);
			$stmt->bindParam(":localAdd", $localAdd, PDO::PARAM_INT);
			$stmt->bindParam(":category", $category, PDO::PARAM_INT);
			$stmt->bindParam(":sub_cat", $sub_cat, PDO::PARAM_INT);
			$stmt->bindParam(":feat_1", $feat_1, PDO::PARAM_INT);
			$stmt->bindParam(":feat_2", $feat_2, PDO::PARAM_INT);
			$stmt->bindParam(":feat_3", $feat_3, PDO::PARAM_INT);
			$stmt->bindParam(":feat_4", $feat_4, PDO::PARAM_INT);
			$stmt->bindParam(":price", $price, PDO::PARAM_INT);
			$stmt->bindParam(":pricePeriod", $pricePeriod, PDO::PARAM_INT);
			$stmt->bindParam(":details", $details, PDO::PARAM_INT);
			$stmt->bindParam(":date_time", $date_time, PDO::PARAM_INT);
			$stmt->bindParam(":userid", $userid, PDO::PARAM_INT);
			$stmt->bindParam(":userName", $userName, PDO::PARAM_INT);
			$stmt->bindParam(":mobile", $mobile, PDO::PARAM_INT);
			$stmt->bindParam(":email", $email, PDO::PARAM_INT);
			$stmt->bindParam(":nego", $nego, PDO::PARAM_INT);
			$stmt->bindParam(":lat", $lat, PDO::PARAM_INT);
			$stmt->bindParam(":lng", $lng, PDO::PARAM_INT);
			$stmt->bindParam(":publish", $publish, PDO::PARAM_INT);
			
			
			$stmt->execute();
    
     
	} 
public function userLogNo(){
		$stmt = $this->pdo->prepare("SELECT * FROM `token`"); 
$stmt->execute();
return $stmt->fetchAll(PDO::FETCH_OBJ); 
	} 
    public function openionsCount(){
		$stmt = $this->pdo->prepare("SELECT * FROM `opinion`"); 
$stmt->execute();
return $stmt->fetchAll(PDO::FETCH_OBJ); 
	}  
    public function totalUserNo(){
		$stmt = $this->pdo->prepare("SELECT * FROM `users`"); 
$stmt->execute();
return $stmt->fetchAll(PDO::FETCH_OBJ); 
	} 
    public function totalPubAdv(){
		$stmt = $this->pdo->prepare("SELECT * FROM `adv` WHERE publish = '1' ORDER BY `adv_id` DESC LIMIT 10"); 
  

//$stmt->bindParam(":userid", $userid, PDO::PARAM_INT);

$stmt->execute();
return $stmt->fetchAll(PDO::FETCH_OBJ); 
	}  
    public function totalUnPubAdv(){
		$stmt = $this->pdo->prepare("SELECT * FROM `adv` WHERE (publish = '0' OR publish = '') ORDER BY `adv_id` DESC LIMIT 10"); 

$stmt->execute();
return $stmt->fetchAll(PDO::FETCH_OBJ); 
	} 
public function totalLogUserData(){
		$stmt = $this->pdo->prepare("SELECT u.* FROM token t INNER JOIN users u ON u.user_id = t.user_id"); 

$stmt->execute();
return $stmt->fetchAll(PDO::FETCH_OBJ); 
	}
    public function totalUserData(){
		$stmt = $this->pdo->prepare("SELECT * FROM `users`"); 

$stmt->execute();
return $stmt->fetchAll(PDO::FETCH_OBJ); 
	}  
    public function msgsViewCount($messageFrom, $advid, $userid){
        $stmt = $this->pdo->prepare(" SELECT messages.* FROM messages WHERE messages.advId = :advid AND messages.messageTo = :userid AND messages.messageFrom = :messageFrom AND messages.status = 0 "); 
        $stmt->bindParam(":userid", $userid, PDO::PARAM_INT);
        $stmt->bindParam(":messageFrom", $messageFrom, PDO::PARAM_INT);
        $stmt->bindParam(":advid", $advid, PDO::PARAM_INT);
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_OBJ);  
    }
    
    public function msgsViewed($messageFrom, $advid, $user_id){
		$stmt = $this->pdo->prepare("UPDATE `messages` SET `status` = '1' where `messageTo` = :user_id AND `status` = '0' AND `messageFrom` = :messageFrom AND `advId` = :advid");
		$stmt->bindParam(":user_id", $user_id, PDO::PARAM_INT);
		$stmt->bindParam(":messageFrom", $messageFrom, PDO::PARAM_INT);
		$stmt->bindParam(":advid", $advid, PDO::PARAM_INT);
		$stmt->execute();
	}   

}

?>
