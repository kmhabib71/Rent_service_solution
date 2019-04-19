<?php
class Post extends User {
	
	function __construct($pdo){
		$this->pdo = $pdo;
	}
    
        public function distCord($distCord){
		$stmt = $this->pdo->prepare("SELECT `lat`, `lon` FROM `area_districts` WHERE `id` = :distCord ");
		$stmt->bindParam(":distCord", $distCord, PDO::PARAM_INT);
		$stmt->execute();
		return $stmt->fetchAll(PDO::FETCH_OBJ);
    
            

	}     public function advLocation($advId){
		$stmt = $this->pdo->prepare("SELECT `lat`, `lng` FROM `adv` WHERE `lat` != 0.000000 AND `lng` != 0.000000 AND `adv_id` = :advId ");
		$stmt->bindParam(":advId", $advId, PDO::PARAM_INT);
		$stmt->execute();
		$latLng =  $stmt->fetchAll(PDO::FETCH_OBJ);
      $temp = array();
            foreach ($latLng as $row) {
                $temp[] = array($row->lng ,$row->lat);
            }
            echo json_encode($temp);
            

	} 
    public function savedLocation(){
		$stmt = $this->pdo->prepare("SELECT `lat`, `lng` FROM `adv` WHERE `lat` != 0.000000 AND `lng` != 0.000000 ");
		
		$stmt->execute();
		$latLng =  $stmt->fetchAll(PDO::FETCH_OBJ);
      $temp = array();
            foreach ($latLng as $row) {
                $temp[] = array($row->lng ,$row->lat);
            }
            echo json_encode($temp);
            

	} 
    
    	public function deletePost($user_id, $advId, $userID){
if($user_id == $userID){
			$stmt = $this->pdo->prepare("DELETE FROM `adv` WHERE `adv_id` = :advId AND `userid` = :user_id");
			$stmt->bindParam(":user_id", $user_id, PDO::PARAM_INT);
			$stmt->bindParam(":advId", $advId, PDO::PARAM_INT);
			$stmt->execute();
    }
		}
 public function editProfile($editName, $editMobile, $editEmail, $editAddress, $profileImage, $userId){
        $stmt = $this->pdo->prepare("UPDATE `users` 
SET `username` = :username, `mobile` = :mobile, `email` = :email,`address` = :address, `profileImage` = :profileImage   WHERE `user_id`= :userId");
			$stmt->bindParam(":username", $editName, PDO::PARAM_INT);
			$stmt->bindParam(":mobile", $editMobile, PDO::PARAM_INT);
			$stmt->bindParam(":email", $editEmail, PDO::PARAM_INT);
			$stmt->bindParam(":address", $editAddress, PDO::PARAM_INT);
			$stmt->bindParam(":profileImage", $profileImage, PDO::PARAM_INT);
			$stmt->bindParam(":userId", $userId, PDO::PARAM_INT);
			$stmt->execute();
    }   
    
    
    
    
    
public function advDataEdit($user_id){
    $stmt = $this->pdo->prepare("SELECT * FROM `adv` WHERE `userid` = :user_id");
			$stmt->bindParam(":user_id",$user_id, PDO::PARAM_INT);
			$stmt->execute();
    $Posts = $stmt->fetchAll(PDO::FETCH_OBJ);
    foreach($Posts as $post){
    
  ?>
    <?php
    $image = $post->img;
$character = json_decode($image);
$imagee = $character[0]->imageName;
?>
        <a href="#<?php echo $post->adv_id; ?>" data-ajax="false">
        <div class="single_post" id="<?php echo $post->adv_id; ?>" data-advId="<?php echo $post->adv_id; ?>">

            <div class="post_image"><img src="files/<?php echo $imagee; ?>" alt=""></div>
            <div class="post_details" style="width: 71%;">
               <div class="post_address">
                    <?php echo $post->address ;?>                                     <span style=" margin-left:0.694rem; ">                                         <?php $this->catFinder($post->category ); ?></span>
                </div>
                <div class="post_heading">
                    <?php echo $post->headline ;?>

                </div>
                
                <div class="post_features">
                    <?php $this->feat_1Finder($post->category, $post->feat_1, $post->feat_2, $post->feat_3); ?>
                </div>
                <div class="date_price">
                    <div class="price">৳ 
                        <?php echo $post->price;?> প্রতি মাসে</div>
                    <div class="date">
                        <?php echo $this->timeAgo($post->date_time);?> </div>
                </div>
            </div>
        </div>
        </a>
        <div class="editAdv" data-advId="<?php echo $post->adv_id; ?>" data-userId="<?php echo $post->userid; ?>" style="cursor:pointer;cursor: pointer;height: 1.5rem;width: 1.5rem;background: red;display: flex;justify-content: center;align-items: center; border-radius: 50%;color: white;">X</div>
        <?php
}
	}
  
        
        public function advData($user_id){
    $stmt = $this->pdo->prepare("SELECT * FROM `adv` WHERE `userid` = :user_id");
			$stmt->bindParam(":user_id",$user_id, PDO::PARAM_INT);
			$stmt->execute();
    $Posts = $stmt->fetchAll(PDO::FETCH_OBJ);
    foreach($Posts as $post){
    
  ?>
            <?php
    $image = $post->img;
$character = json_decode($image);
$imagee = $character[0]->imageName;
?>
                <a href="#<?php echo $post->adv_id; ?>" data-ajax="false">
        <div class="single_post" id="<?php echo $post->adv_id; ?>" data-advId="<?php echo $post->adv_id; ?>">

            <div class="post_image"><img src="files/<?php echo $imagee; ?>" alt=""></div>
            <div class="post_details" style="width: 71%;">
               <div class="post_address">
                    <?php echo $post->address ;?>                                     <span style=" margin-left:0.694rem; ">                                         <?php $this->catFinder($post->category ); ?></span>
                </div>
                <div class="post_heading">
                    
                    <?php echo  $post->headline ;?>

                </div>
                
                <div class="post_features">
                   <?php $this->feat_1Finder($post->category, $post->feat_1, $post->feat_2, $post->feat_3); ?>
                </div>
                <div class="date_price">
                    <div class="price">৳ 
                        <?php echo $post->price;?> প্রতি মাসে</div>
                    <div class="date">
                        <?php echo $this->timeAgo($post->date_time);?> </div>
                </div>
            </div>
        </div>
        </a>
                <?php
}
	}
    public function advInfo($user_id){
		$stmt = $this->pdo->prepare("SELECT * FROM `adv` WHERE userid = :user_id");
		$stmt->bindParam(":user_id", $user_id, PDO::PARAM_INT);
		$stmt->execute();
		return $stmt->fetch(PDO::FETCH_OBJ);
	} 
    
    public function userData($user_id){
		$stmt = $this->pdo->prepare("SELECT * FROM users WHERE user_id = :user_id");
		$stmt->bindParam(":user_id", $user_id, PDO::PARAM_INT);
		$stmt->execute();
		return $stmt->fetch(PDO::FETCH_OBJ);
	}
public function Posts($nameCat, $location){
    if($location == ''){
    if($nameCat == 'main'){
      $stmt = $this->pdo->prepare("SELECT * FROM `adv` WHERE publish != '0' ORDER BY `date_time` DESC");  
    }else if($nameCat == 'homeCat'){
       $stmt = $this->pdo->prepare("SELECT * FROM `adv` WHERE (`category` = '1' OR `category` = '2' OR `category` = '3') AND publish != '0' ORDER BY `date_time` DESC"); 
    }else if($nameCat == 'vehCat'){
       $stmt = $this->pdo->prepare("SELECT * FROM `adv` WHERE (`category` = '6' OR `category` = '7' OR `category` = '8') AND publish != '0' ORDER BY `date_time` DESC"); 
    }else if($nameCat == 'comCat'){
       $stmt = $this->pdo->prepare("SELECT * FROM `adv`   WHERE (`category` = '9' OR `category` = '10' OR `category` = '19' OR `category` = '20' OR `category` = '21' OR `category` = '22' OR `category` = '23' OR `category` = '11') AND publish != '0'  ORDER BY `date_time` DESC"); 
    }else if($nameCat == 'perCat'){
       $stmt = $this->pdo->prepare("SELECT * FROM `adv`    WHERE (`category` = '15' OR `category` = '16') AND publish != '0' ORDER BY `date_time` DESC"); 
    }else if($nameCat == 'othCat'){
       $stmt = $this->pdo->prepare("SELECT * FROM `adv`    WHERE `category` = '17' AND publish != '0'  ORDER BY `date_time` DESC"); 
    }else if($nameCat == 'conCat'){
       $stmt = $this->pdo->prepare("SELECT * FROM `adv`    WHERE (`category` = '13' OR `category` = '14') AND publish != '0' ORDER BY `date_time` DESC"); 
    }else{
       $stmt = $this->pdo->prepare("SELECT * FROM `adv`    WHERE `category` = :nameCat AND publish != '0' ORDER BY `date_time` DESC"); 
        $stmt->bindParam(":nameCat",$nameCat, PDO::PARAM_INT);
    }
        }else{
         if($nameCat == 'main'){
      $stmt = $this->pdo->prepare("SELECT * FROM `adv` WHERE (`address1` = :address1 OR `address2` = :address1) AND publish != '0'  ORDER BY `date_time` DESC");
             $stmt->bindParam(":address1",$location, PDO::PARAM_INT);
    }else if($nameCat == 'homeCat'){
           
       $stmt = $this->pdo->prepare("SELECT * FROM `adv` WHERE (`category` = '1' OR `category` = '2' OR `category` = '3') AND (`address1` = :address1 OR `address2` = :address1) AND publish != '0' ORDER BY `date_time` DESC");
             $stmt->bindValue(":address1", $location, PDO::PARAM_STR);
             
    }else if($nameCat == 'vehCat'){
       $stmt = $this->pdo->prepare("SELECT * FROM `adv` WHERE (`category` = '6' OR `category` = '7' OR `category` = '8') AND (`address1` = :address1 OR `address2` = :address1) AND publish != '0' ORDER BY `date_time` DESC");
             $stmt->bindParam(":address1", $location, PDO::PARAM_STR);
    }else if($nameCat == 'comCat'){
       $stmt = $this->pdo->prepare("SELECT * FROM `adv`   WHERE (`category` = '9' OR `category` = '10' OR `category` = '19' OR `category` = '20' OR `category` = '21' OR `category` = '22' OR `category` = '23' OR `category` = '11') AND (`address1` = :address1 OR `address2` = :address1) AND publish != '0'  ORDER BY `date_time` DESC");
             $stmt->bindParam(":address1", $location, PDO::PARAM_STR);
    }else if($nameCat == 'perCat'){
       $stmt = $this->pdo->prepare("SELECT * FROM `adv`    WHERE (`category` = '15' OR `category` = '16') AND (`address1` = :address1 OR `address2` = :address1) AND publish != '0' ORDER BY `date_time` DESC");
             $stmt->bindParam(":address1", $location, PDO::PARAM_STR);
    }else if($nameCat == 'othCat'){
       $stmt = $this->pdo->prepare("SELECT * FROM `adv`    WHERE (`category` = '17') AND (`address1` = :address1 OR `address2` = :address1) AND publish != '0'  ORDER BY `date_time` DESC");
             $stmt->bindParam(":address1", $location, PDO::PARAM_STR);
    }else if($nameCat == 'conCat'){
       $stmt = $this->pdo->prepare("SELECT * FROM `adv`    WHERE (`category` = '13' OR `category` = '14') AND (`address1` = :address1 OR `address2` = :address1) AND publish != '0' ORDER BY `date_time` DESC");
             $stmt->bindParam(":address1", $location, PDO::PARAM_STR);
    }else{
       $stmt = $this->pdo->prepare("SELECT * FROM `adv`    WHERE `category` = :nameCat AND (`address1` = :address1 OR `address2` = :address1) AND publish != '0' ORDER BY `date_time` DESC"); 
        $stmt->bindParam(":nameCat",$nameCat, PDO::PARAM_INT);
             $stmt->bindParam(":address1", $location, PDO::PARAM_STR);
    }
    };
	
    // $stmt->bindParam(":user_id", $user_id, PDO::PARAM_INT);
    $stmt->execute();
    $Posts = $stmt->fetchAll(PDO::FETCH_OBJ);
    foreach($Posts as $post){
  ?>
                    <?php
    $image = $post->img;
//    $complex = array('more', 'complex', 'object', array('foo', 'bar'));

        


$character = json_decode($image);
$imagee = $character[0]->imageName;
//        echo $image;
//      $imag = json_encode($image);
//       foreach($wcr as $key => $value):
//echo '<option value="'.$key.'">'.$value.'</option>'; //close your tags!!
//endforeach;
//        $info=array();
//while($row = $image){
//array_push($info,$row);
//}
//echo json_encode($info);
//        
        
//        echo $imag[0];
//        echo $wcr[0]
?>



                        <script>


                        </script>
                        <!--                        <a href="#<?php echo $post->adv_id; ?>" data-ajax="false">-->
                        <div class="single_post" id="<?php echo $post->adv_id; ?>" data-advId="<?php echo $post->adv_id; ?>">

                            <div class="post_image"><img src="files/<?php echo $imagee; ?>" alt=""></div>
                            <div class="post_details" style="width: 71%;">
                                <div class="post_address">

                                    <?php echo $post->address ;?>
                                    <span style=" margin-left:0.694rem; ">
                                        <?php $this->catFinder($post->category ); ?></span>
                                </div>
                                <div class="post_heading">
                                    <?php echo $post->headline ;?>

                                </div>

                                <div class="post_features">
                                    <?php $this->feat_1Finder($post->category, $post->feat_1, $post->feat_2, $post->feat_3); ?>

                                </div>
                                <div class="date_price">
                                    <div class="price">৳
                                        <?php echo $post->price;?>
                                        <?php echo $post->pricePeriod;?>
                                    </div>
                                    <div class="date">
                                        <?php echo $this->timeAgo($post->date_time);?> </div>
                                </div>

                            </div>


                        </div>
                        <!--        </a>-->

                        <?php
}
    echo '<div class="locFind" style="display:none;">'.$location.'</div>';
}
 public function postDetails($id){
   $stmt = $this->pdo->prepare("SELECT * FROM `adv` WHERE `adv_id` = :advID");
     $stmt->bindParam(":advID", $id, PDO::PARAM_INT);
    $stmt->execute();
    return $stmt->fetchAll(PDO::FETCH_OBJ);  
 }
    public function catFinder($id){
if($id == 1){
    echo 'ফ্ল্যাট/ অ্যাপার্টমেন্ট';
}else if($id == 2){echo 'বাসা';
}else if($id == 3){echo ' রুম ';
}else if($id == 4){echo ' বাড়ি ';
}else if($id == 5){echo '  মাইক্রো  ';
}else if($id == 6){echo ' কার ';
}else if($id == 7){echo ' বাস ';
} else if($id == 8){echo ' ট্রাক ';
} else if($id == 9){echo ' ব্যাংক/বীমা ';
} else if($id == 10){echo ' শোরুম ';
} else if($id == 11){echo ' দোকান ';
} else if($id == 12){echo ' গ্যারেজ ';
} else if($id == 13){echo ' ক্রেইন ';
}else if($id == 14){echo ' স্কাবেটর ';
}else if($id == 15){echo ' চাকরি ';
}else if($id == 16){echo ' কন্ট্রাক্ট ';
}else if($id == 17){echo ' কন্ট্রাক্ট ';                    
}else if($id == 18){echo ' কন্ট্রাক্ট ';                    
}else if($id == 19){echo ' স্টোর হাউস ';                    
}else if($id == 20){echo ' ফ্যাক্টরি ';                    
}else if($id == 21){echo '  হোটেল ';                    
}else if($id == 22){echo ' অফিস ';                    
}else if($id == 23){echo '  রেস্ট্রুরেন্ট ';                    
}else if($id == 24){echo ' কন্ট্রাক্ট ';                    
}else if($id == 25){echo 'এক্সকাভেটর ';                    
}else if($id == 26){echo ' ডোজার ';                    
}else if($id == 27){echo ' লোডার ';                    
}else if($id == 28){echo ' ডাম্পার ';                    
}else if($id == 29){echo ' চুক্তিভিত্তিক নিয়োগ ';                    
}else if($id ==30){echo ' অন্যান্য ';                    
}else{
    echo 'Not found';
} 
 } 
    
public function feat_1Finder($cat, $feat_1, $feat_2, $feat_3){
    
   if($cat == 1 ){echo 'বেড: '.$feat_1.' বাথ: '.$feat_2.'';}else if($cat == 2 ) {echo 'বেড: '.$feat_1.' বাথ: '.$feat_2.'';} else if($cat == 3 ){ if($feat_2 == 1 ){echo 'ভাড়া প্রোপার্টি ধরণ: মেস'; } else if($feat_2 == 2){echo 'ভাড়া প্রোপার্টি ধরণ: হোস্টেল'; } else if($feat_2 == 3){echo 'ভাড়া প্রোপার্টি ধরণ: বাসা'; } else if($feat_2 == 4){echo 'ভাড়া প্রোপার্টি ধরণ: অ্যাপার্টমেন্ট'; } else if($feat_2 == 5){echo 'ভাড়া প্রোপার্টি ধরণ: বাড়ি '; }; }else if($cat == 4 ) {echo 'মডেল: '.$feat_1.' কালার: '.$feat_2.'';} 
    else if($cat == 6 ) {echo 'কার মডেল: '.$feat_1.' সিট সংখ্যা: '.$feat_3.'';} 
    else if($cat == 7 ) {echo 'বাস ব্রান্ড: '.$feat_1.' সিট সংখ্যা: '.$feat_3.'';} 
    else if($cat == 8 ) {echo 'ট্রাক ব্রান্ড: '.$feat_1.' ধারণ ক্ষমতা: '.$feat_2.'';} 
    else if($cat == 9 ) {echo 'আয়তন: '.$feat_1.'';} 
    else if($cat == 10 ) {echo 'আয়তন: '.$feat_1.'';} 
    else if($cat == 11 ) {echo 'আয়তন: '.$feat_1.'';} 
    else if($cat == 12 ) {echo 'আয়তন: '.$feat_1.'';} 
    else if($cat == 13 ) {echo 'ধারণ ক্ষমতা: '.$feat_1.'';} 
    else if($cat == 14 ) {echo 'ধারণ ক্ষমতা: '.$feat_1.'';} 
    else if($cat == 15 ) {echo 'ধারণ ক্ষমতা: '.$feat_1.'';} 
    else if($cat == 19 ) {echo 'আয়তন: '.$feat_1.'';} 
    else if($cat == 20 ) {echo 'আয়তন: '.$feat_1.'';} 
    else if($cat == 21 ) {echo 'আয়তন: '.$feat_1.'';} 
    else if($cat == 22 ) {echo 'আয়তন: '.$feat_1.'';} 
    else if($cat == 23 ) {echo 'আয়তন: '.$feat_1.'';} 
    else if($cat == 25 ) {echo 'ধারণ ক্ষমতা: '.$feat_1.'';} 
    else if($cat == 26 ) {echo 'ধারণ ক্ষমতা: '.$feat_1.'';} 
    else if($cat == 27 ) {echo 'ধারণ ক্ষমতা: '.$feat_1.'';} 
    else if($cat == 28 ) {echo 'ধারণ ক্ষমতা: '.$feat_1.'';} 
    else if($cat == 29 ) {echo 'ধারণ ক্ষমতা: '.$feat_1.'';} 
    else if($cat == 30 ) {echo 'ধারণ ক্ষমতা: '.$feat_1.'';}else{echo 'সাধারণ';};
   

              
                  
 }

public function shareButton(){?>
                            <ul class="share-buttons" style="list-style: none;
    display: flex;
    margin-right: auto;
    margin-left: 1rem;">
                                <li>
                                    <a href="https://www.facebook.com/sharer/sharer.php?u=&quote=" title="Share on Facebook" target="_blank" onclick="window.open('https://www.facebook.com/sharer/sharer.php?u=' + encodeURIComponent(document.URL) + '&quote=' + encodeURIComponent(document.URL)); return false;"><img alt="Share on Facebook" src="http://localhost/bhara/assets/img/color/Facebook.png" /></a>
                                </li>
                                <li>
                                    <a href="https://twitter.com/intent/tweet?source=&text=:%20" target="_blank" title="Tweet" onclick="window.open('https://twitter.com/intent/tweet?text=' + encodeURIComponent(document.title) + ':%20'  + encodeURIComponent(document.URL)); return false;"><img alt="Tweet" src="http://localhost/bhara/assets/img/color/Twitter.png" /></a>
                                </li>
                                <li>
                                    <a href="https://plus.google.com/share?url=" target="_blank" title="Share on Google+" onclick="window.open('https://plus.google.com/share?url=' + encodeURIComponent(document.URL)); return false;"><img alt="Share on Google+" src="http://localhost/bhara/assets/img/color/Google+.png" /></a>
                                </li>
                                <li>
                                    <a href="http://pinterest.com/pin/create/button/?url=&description=" target="_blank" title="Pin it" onclick="window.open('http://pinterest.com/pin/create/button/?url=' + encodeURIComponent(document.URL) + '&description=' +  encodeURIComponent(document.title)); return false;"><img alt="Pin it" src="http://localhost/bhara/assets/img/color/Pinterest.png" /></a>
                                </li>
                                <li>
                                    <a href="http://www.reddit.com/submit?url=&title=" target="_blank" title="Submit to Reddit" onclick="window.open('http://www.reddit.com/submit?url=' + encodeURIComponent(document.URL) + '&title=' +  encodeURIComponent(document.title)); return false;"><img alt="Submit to Reddit" src="http://localhost/bhara/assets/img/color/Reddit.png" /></a>
                                </li>
                                <li>
                                    <a href="http://www.linkedin.com/shareArticle?mini=true&url=&title=&summary=&source=" target="_blank" title="Share on LinkedIn" onclick="window.open('http://www.linkedin.com/shareArticle?mini=true&url=' + encodeURIComponent(document.URL) + '&title=' +  encodeURIComponent(document.title)); return false;"><img alt="Share on LinkedIn" src="http://localhost/bhara/assets/img/color/LinkedIn.png" /></a>
                                </li>
                                <li>
                                    <a href="http://wordpress.com/press-this.php?u=&quote=&s=" target="_blank" title="Publish on WordPress" onclick="window.open('http://wordpress.com/press-this.php?u=' + encodeURIComponent(document.URL) + '&quote=' +  encodeURIComponent(document.title)); return false;"><img alt="Publish on WordPress" src="http://localhost/bhara/assets/img/color/Wordpress.png" /></a>
                                </li>
                                <li>
                                    <a href="https://pinboard.in/popup_login/?url=&title=&description=" target="_blank" title="Save to Pinboard" onclick="window.open('https://pinboard.in/popup_login/?url=' + encodeURIComponent(document.URL) + '&title=' +  encodeURIComponent(document.title)); return false;"><img alt="Save to Pinboard" src="http://localhost/bhara/assets/img/color/Pinboard.png" /></a>
                                </li>
                                <li>
                                    <a href="mailto:?subject=&body=:%20" target="_blank" title="Send email" onclick="window.open('mailto:?subject=' + encodeURIComponent(document.title) + '&body=' +  encodeURIComponent(document.URL)); return false;"><img alt="Send email" src="http://localhost/bhara/assets/img/color/Email.png" /></a>
                                </li>
                            </ul>


                            <?php
        
}

    
public function getPostBySearch($hashtag, $location){
    if($location==''){
         $stmt = $this->pdo->prepare("SELECT * FROM `adv` WHERE (`headline` LIKE :hashtag OR `address` LIKE :hashtag OR `address1` LIKE :hashtag OR `address2` LIKE :hashtag) AND publish != '0'");
			$stmt->bindValue(":hashtag", '%'.$hashtag.'%', PDO::PARAM_STR);
    }else{
       $stmt = $this->pdo->prepare("SELECT * FROM `adv` WHERE (`headline` LIKE :hashtag OR `address` LIKE :hashtag OR `address1` LIKE :hashtag OR `address2` LIKE :hashtag) AND `address1` = :location AND publish != '0'");
			$stmt->bindValue(":hashtag", '%'.$hashtag.'%', PDO::PARAM_STR);
			$stmt->bindValue(":location", $location, PDO::PARAM_STR); 
    }
			
			$stmt->execute();
    $Posts = $stmt->fetchAll(PDO::FETCH_OBJ);
    foreach($Posts as $post){
  ?>
                                <?php
    $image = $post->img;


        


$character = json_decode($image);
$imagee = $character[1]->imageName;

?>



                                    <script>


                                    </script>
                                    <!--                        <a href="#<?php echo $post->adv_id; ?>" data-ajax="false">-->
                                    <div class="single_post" id="<?php echo $post->adv_id; ?>" data-advId="<?php echo $post->adv_id; ?>">

                                        <div class="post_image"><img src="files/<?php echo $imagee; ?>" alt=""></div>
                                        <div class="post_details" style="width: 71%;">
                                            <div class="post_address">
                                                <?php echo $post->address ;?> <span style=" margin-left:0.694rem; ">                                         <?php $this->catFinder($post->category ); ?></span>
                                            </div>
                                            <div class="post_heading">
                                                <?php echo $post->headline ;?>

                                            </div>

                                            <div class="post_features">
                                                <?php $this->feat_1Finder($post->category, $post->feat_1, $post->feat_2, $post->feat_3); ?>
                                            </div>
                                            <div class="date_price">
                                                <div class="price">৳
                                                    <?php echo $post->price;?> প্রতি মাসে</div>
                                                <div class="date">
                                                    <?php echo $this->timeAgo($post->date_time);?> </div>
                                            </div>

                                        </div>


                                    </div>
                                    <!--        </a>-->

                                    <?php
}
    echo '<div class="locFind" style="display:none;">'.$location.'</div>';
		}   
    
 public function division(){
     $stmt = $this->pdo->prepare("SELECT * FROM `area_divisions`");
    // $stmt->bindParam(":user_id", $user_id, PDO::PARAM_INT);
    $stmt->execute();
    $divi = $stmt->fetchAll(PDO::FETCH_OBJ);
    
     foreach($divi as $div){ if($div->id==3){
         echo '
                                <option value="volvo" data-divid="'.$div->id.'">'.$div->bn_name.'</option>
                                ';
     }
                            if($div->id==2){
         echo '
                                <option value="volvo" data-divid="'.$div->id.'">'.$div->bn_name.'</option>
                                ';
     }
                            
                                echo '
                                <option value="volvo" data-divid="'.$div->id.'">'.$div->bn_name.'</option>
                                ';
                            }
     
 } 
    public function district($sel_res){
     $stmt = $this->pdo->prepare("SELECT * FROM `area_districts` WHERE `division_id` = :sel_res");
     $stmt->bindParam(":sel_res", $sel_res, PDO::PARAM_INT);
    $stmt->execute();
   return $stmt->fetchAll(PDO::FETCH_OBJ);
    
//     foreach($disti as $dist){
//                                echo '
//                                <option value="'.$dist->division_id.'" data-distid="'.$dist->id.'" class="dis_design">'.$dist->bn_name.'</option>
//                                ';
//                            }
     
 } 
public function upazila($upazila){
     $stmt = $this->pdo->prepare("SELECT * FROM `area_upazilas` WHERE `district_id` = :upazila ");
     $stmt->bindParam(":upazila", $upazila, PDO::PARAM_INT);
    $stmt->execute();
    return $stmt->fetchAll(PDO::FETCH_OBJ);
    }  
    
    public function relatedAdv($headline, $advID){
     $stmt = $this->pdo->prepare("SELECT * FROM `adv` WHERE (`headline` LIKE :hashtag OR `address` LIKE :hashtag OR `address1` LIKE :hashtag OR `address2` LIKE :hashtag) AND `adv_id` != :advID AND publish != '0' " );
    
     $stmt->bindParam(":hashtag", $headline, PDO::PARAM_STR);
     $stmt->bindParam(":advID", $advID, PDO::PARAM_STR);
    $stmt->execute();
 $Posts = $stmt->fetchAll(PDO::FETCH_OBJ); 
    foreach($Posts as $post){
  ?>
                                        <?php
    $image = $post->img;
//    $complex = array('more', 'complex', 'object', array('foo', 'bar'));

        


$character = json_decode($image);
$imagee = $character[0]->imageName;
//        echo $image;
//      $imag = json_encode($image);
//       foreach($wcr as $key => $value):
//echo '<option value="'.$key.'">'.$value.'</option>'; //close your tags!!
//endforeach;
//        $info=array();
//while($row = $image){
//array_push($info,$row);
//}
//echo json_encode($info);
//        
        
//        echo $imag[0];
//        echo $wcr[0]
?>



                                            <script>


                                            </script>
                                            <a href="relateAdv.php?adId=<?php echo $post->adv_id; ?>" data-ajax="false" class="marLef" style="margin-left:0px;">
        <div class="single_post" id="<?php echo $post->adv_id; ?>" data-advId="<?php echo $post->adv_id; ?>">

            <div class="post_image"><img src="files/<?php echo $imagee; ?>" alt=""></div>
            <div class="post_details" style="width: 71%;">
               <div class="post_address">
                    <?php echo $post->address ;?>                                     <span style=" margin-left:0.694rem; ">                                         <?php $this->catFinder($post->category ); ?></span>
                </div>
                <div class="post_heading">
                    <?php echo $post->headline ;?>

                </div>
                
                <div class="post_features">
                    <?php $this->feat_1Finder($post->category, $post->feat_1, $post->feat_2, $post->feat_3); ?>
                </div>
                <div class="date_price">
                    <div class="price">৳ 
                        <?php echo $post->price;?> প্রতি মাসে</div>
                    <div class="date">
                        <?php echo $this->timeAgo($post->date_time);?> </div>
                </div>

            </div>


        </div>
        </a>

                                            <?php
}
    }  
    
public function checkInput($var){
		$var = htmlspecialchars($var);
		$var = trim($var);
		$var = stripcslashes($var);
		return $var;

	}
    
    public function create($table, $fields = array()){
		$columns = implode(',', array_keys($fields));
		$values = ':'.implode(', :', array_keys($fields));
		$sql = "INSERT INTO {$table}({$columns})VALUES ({$values}) ";
		if($stmt = $this->pdo->prepare($sql)){
			foreach($fields as $key => $data){
				$stmt->bindValue(':'.$key, $data);
			}
			$stmt->execute();
			return $this->pdo->lastInsertId();
		}
	}
    public function getPostBaseLocation($data){
        $stmt = $this->pdo->prepare("SELECT * FROM `adv` WHERE `address1` = :dis_data AND publish != '0' ");
        $stmt->bindParam(":dis_data", $data, PDO::PARAM_STR);
//     $stmt->bindParam(":sel_res", $sel_res, PDO::PARAM_INT);
    $stmt->execute();

      $Posts = $stmt->fetchAll(PDO::FETCH_OBJ);
    foreach($Posts as $post){
  ?>
                                                <?php
    $image = $post->img;

$character = json_decode($image);
$imagee = $character[1]->imageName;

?>
                                                    <script type="text/javascript">
                                                        var simple = '<?php echo $image; ?>';
                                                        //    var imgFile = '<?php echo json_encode($image); ?>';
                                                        var imgF = JSON.parse(simple);

                                                    </script>


                                                    <script>


                                                    </script>
                                                    <div class="single_post">
                                                        <div class="post_image"><img src="files/<?php echo $imagee; ?>" alt=""></div>
                                                        <div class="post_details" style="width: 71%;">
                                                            <div class="post_heading">
                                                                <?php echo $post->headline ;?>

                                                            </div>
                                                            <div class="post_address">
                                                                <?php echo $post->address ;?> <span style=" margin-left:0.694rem; ">                                         <?php $this->catFinder($post->category ); ?></span>
                                                            </div>
                                                            <div class="post_features">
                                                                <?php $this->feat_1Finder($post->category, $post->feat_1, $post->feat_2, $post->feat_3); ?>
                                                            </div>
                                                            <div class="date_price">
                                                                <div class="price">BDT
                                                                    <?php echo $post->price;?> per month</div>
                                                                <div class="date">
                                                                    <?php echo $post->date_time;?> </div>
                                                            </div>

                                                        </div>


                                                    </div>


                                                    <?php
}
    }
    public function home_adv(){
         $stmt = $this->pdo->prepare("SELECT * FROM `adv` WHERE (`category`='1' OR `category`='2' OR `category`='3' OR `category`='4') AND publish != '0' ");
//     $stmt->bindParam(":sel_res", $sel_res, PDO::PARAM_INT);
    $stmt->execute();

      $Posts = $stmt->fetchAll(PDO::FETCH_OBJ);
    foreach($Posts as $post){
  ?>
                                                        <?php
    $image = $post->img;

$character = json_decode($image);
$imagee = $character[1]->imageName;

?>
                                                            <script type="text/javascript">
                                                                var simple = '<?php echo $image; ?>';
                                                                //    var imgFile = '<?php echo json_encode($image); ?>';
                                                                var imgF = JSON.parse(simple);

                                                            </script>


                                                            <script>


                                                            </script>
                                                            <div class="single_post">
                                                                <div class="post_image"><img src="files/<?php echo $imagee; ?>" alt=""></div>
                                                                <div class="post_details" style="width: 71%;">
                                                                    <div class="post_heading">
                                                                        <?php echo $post->headline ;?>

                                                                    </div>
                                                                    <div class="post_address">
                                                                        <?php echo $post->address ;?> <span style=" margin-left:0.694rem; ">                                         <?php $this->catFinder($post->category ); ?></span>
                                                                    </div>
                                                                    <div class="post_features">
                                                                        <?php echo $post->feat_1;?> Bed,
                                                                        <?php echo $post->feat_2;?> Bath
                                                                    </div>
                                                                    <div class="date_price">
                                                                        <div class="price">BDT
                                                                            <?php echo $post->price;?> per month</div>
                                                                        <div class="date">
                                                                            <?php echo $post->date_time;?> </div>
                                                                    </div>

                                                                </div>


                                                            </div>


                                                            <?php
}  
        
        
        
    }
    public function vehicle(){
         $stmt = $this->pdo->prepare("SELECT * FROM `adv` WHERE (`category`='5' OR `category`='6' OR `category`='7' OR `category`='8') AND publish != '0' ");

    $stmt->execute();

      $Posts = $stmt->fetchAll(PDO::FETCH_OBJ);
    foreach($Posts as $post){
  ?>
                                                                <?php
    $image = $post->img;

$character = json_decode($image);
$imagee = $character[1]->imageName;

?>
                                                                    <script type="text/javascript">
                                                                        var simple = '<?php echo $image; ?>';
                                                                        //    var imgFile = '<?php echo json_encode($image); ?>';
                                                                        var imgF = JSON.parse(simple);

                                                                    </script>


                                                                    <script>


                                                                    </script>
                                                                    <div class="single_post">
                                                                        <div class="post_image"><img src="files/<?php echo $imagee; ?>" alt=""></div>
                                                                        <div class="post_details" style="width: 71%;">
                                                                            <div class="post_heading">
                                                                                <?php echo $post->headline ;?>

                                                                            </div>
                                                                            <div class="post_address">
                                                                                <?php echo $post->address ;?> <span style=" margin-left:0.694rem; ">                                         <?php $this->catFinder($post->category ); ?></span>
                                                                            </div>
                                                                            <div class="post_features">
                                                                                <?php $this->feat_1Finder($post->category, $post->feat_1, $post->feat_2, $post->feat_3); ?>
                                                                            </div>
                                                                            <div class="date_price">
                                                                                <div class="price">BDT
                                                                                    <?php echo $post->price;?> per month</div>
                                                                                <div class="date">
                                                                                    <?php echo $post->date_time;?> </div>
                                                                            </div>

                                                                        </div>


                                                                    </div>


                                                                    <?php
}  
        
        
        
    }
    public function constr(){
         $stmt = $this->pdo->prepare("SELECT * FROM `adv` WHERE (`category`='5' OR `category`='6' OR `category`='7' OR `category`='8') AND publish != '0' ");

    $stmt->execute();

      $Posts = $stmt->fetchAll(PDO::FETCH_OBJ);
    foreach($Posts as $post){
  ?>
                                                                        <?php
    $image = $post->img;

$character = json_decode($image);
$imagee = $character[1]->imageName;

?>
                                                                            <script type="text/javascript">
                                                                                var simple = '<?php echo $image; ?>';
                                                                                //    var imgFile = '<?php echo json_encode($image); ?>';
                                                                                var imgF = JSON.parse(simple);

                                                                            </script>


                                                                            <script>


                                                                            </script>
                                                                            <div class="single_post">
                                                                                <div class="post_image"><img src="files/<?php echo $imagee; ?>" alt=""></div>
                                                                                <div class="post_details" style="width: 71%;">
                                                                                    <div class="post_heading">
                                                                                        <?php echo $post->headline ;?>

                                                                                    </div>
                                                                                    <div class="post_address">
                                                                                        <?php echo $post->address ;?> <span style=" margin-left:0.694rem; ">                                         <?php $this->catFinder($post->category ); ?></span>
                                                                                    </div>
                                                                                    <div class="post_features">
                                                                                        <?php $this->feat_1Finder($post->category, $post->feat_1, $post->feat_2, $post->feat_3); ?>
                                                                                    </div>
                                                                                    <div class="date_price">
                                                                                        <div class="price">BDT
                                                                                            <?php echo $post->price;?> per month</div>
                                                                                        <div class="date">
                                                                                            <?php echo $post->date_time;?> </div>
                                                                                    </div>

                                                                                </div>


                                                                            </div>


                                                                            <?php
}  
        
        
        
    }
    
    
//    public function timeAgo($datetime){
//		$time = strtotime($datetime);
//		$current = time();
//		$seconds = $current - $time;
//		$minutes = round($seconds / 60);
//		$hours = round($seconds / 3600);
//		$months = round ($seconds / 2600640);
//
//		if($seconds <= 60){
//			if($seconds == 0){
//				return 'posted now';
//			}else {
//				return ''.$seconds.'s ago';
//			}
//			} else if($minutes <= 60){
//				return ''.$minutes.'m ago';
//			}else if($hours <= 24){
//				return ''.$hours.'h ago ';
//
//			}else if($months <= 12){
//				return ''.date('M j', $time);
//			}else {
//				return ''.date('j M Y', $time);
//			}
//		}
    
//    function timeAgo($datetime)
//{
//    $etime = time() - $datetime;
//
//    if ($etime < 1)
//    {
//        return '0 seconds';
//    }
//
//    $a = array( 365 * 24 * 60 * 60  =>  'year',
//                 30 * 24 * 60 * 60  =>  'month',
//                      24 * 60 * 60  =>  'day',
//                           60 * 60  =>  'hour',
//                                60  =>  'minute',
//                                 1  =>  'second'
//                );
//    $a_plural = array( 'year'   => 'years',
//                       'month'  => 'months',
//                       'day'    => 'days',
//                       'hour'   => 'hours',
//                       'minute' => 'minutes',
//                       'second' => 'seconds'
//                );
//
//    foreach ($a as $secs => $str)
//    {
//        $d = $etime / $secs;
//        if ($d >= 1)
//        {
//            $r = round($d);
//            return $r . ' ' . ($r > 1 ? $a_plural[$str] : $str) . ' ago';
//        }
//    }
//}
    
 function timeAgo($time_ago) {
    $time_ago =  strtotime($time_ago) ? strtotime($time_ago) : $time_ago;
    $time  = time() - $time_ago;

switch($time):
// seconds
case $time <= 60;
return 'এইমাত্র';
// minutes
case $time >= 60 && $time < 3600;
return (round($time/60) == 1) ? 'a minute' : round($time/60).' মিনিট';
// hours
case $time >= 3600 && $time < 86400;
return (round($time/3600) == 1) ? 'a hour ago' : round($time/3600).' ঘন্টা';
// days
case $time >= 86400 && $time < 604800;
return (round($time/86400) == 1) ? 'a day ago' : round($time/86400).' দিন';
// weeks
case $time >= 604800 && $time < 2600640;
return (round($time/604800) == 1) ? 'a week ago' : round($time/604800).' সপ্তাহ';
// months
case $time >= 2600640 && $time < 31207680;
return (round($time/2600640) == 1) ? 'a month ago' : round($time/2600640).' মাস';
// years
case $time >= 31207680;
return (round($time/31207680) == 1) ? 'a year ago' : round($time/31207680).' বছর' ;

endswitch;
}
  
   

}
?>
