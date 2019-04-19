<?php

include '../../class/login.php';
include '../../core/init.php';


$showTimeline=False;
if(login::isLoggedIn()){
     $userid =login::isLoggedIn();
    
     $showTimeline=True;
    echo 'User find';
    header('Location: ../../profile.php');
}
$user_id =login::isLoggedIn();

$error_msg = '';


if(isset($_POST['mob'])){
$mobile=$_POST['mob'];
$password=$_POST['pass'];
$exadvid=$_POST['exadvid'];
$exadvuserid=$_POST['exadvuserid'];
//userid and password login part
    if(DB::query('SELECT mobile FROM users WHERE mobile=:mobile', array(':mobile'=>$mobile))){

if(DB::query('SELECT mobile FROM users WHERE mobile=:mobile', array(':mobile'=>$mobile))){
    
		if(password_verify($password, DB::query('SELECT password FROM users WHERE mobile=:mobile',array(':mobile'=>$mobile))[0]['password'])){
//			echo'logged in!';
			// token part
			//creating or generate token
				$cstrong = true;
				$token=bin2hex(openssl_random_pseudo_bytes(64, $cstrong));
				//select userid from databse
				$user_id=DB::query('SELECT user_id FROM users WHERE mobile=:mobile', array(':mobile'=>$mobile))[0]['user_id'];
				//put token and userid in databse
			DB::query('INSERT INTO token VALUES(0, :token, :user_id)', array(':token'=>sha1($token), ':user_id'=>$user_id));
			// set cookies to computer for logged in snid=cookies name, $token = cookie token, time=how much time cookie active for login, 2nd NULL = cause we dont have ssl, if have then use true, true=for crose site scripting.

			//set cookie valid for 7 days
			setcookie('SNID', $token, time()+60*60*24*7,'/',NULL, NULL, true);
			//set cookie valid for 3 days and goto index page for config
			setcookie('SNID_', $token, time()+60*60*24*3,'/',NULL, NULL, true);
			header('Location: http://localhost/bhara/relateAdv.php?adId='.$exadvid.'&logup=yes');
            
		}
		
		else{
 $error_msg = '<p>ইউজার পাওয়া যায়নি।</p>';
		}

}else{
	$error_msg = '<p style="color: red;
    vertical-align: middle;
    text-align: center;">ইউজার পাওয়া যায়নি।</p>';
}
    }else{
        if(empty($mobile) or empty($password)){
        $errorb = 'All feilds are required';
    }else {
//        $email = $getFromU->checkInput($email);
        $mobile = $getFromU->checkInput($mobile);
        $password = $getFromU->checkInput($password);
//        if(!filter_var($email)){
//            $errorb = 'Invalid email format';
//        } else 4
//        $mobile = settype($mobilee, "string");
        $mobilee = strlen((string)$mobile);
        
        echo $mobilee;
        
            if($mobilee != 11){
            $errorb = 'Mobile number is not valid';
        }else if (strlen($password) < 5 && strlen($password) <=60){
            $errorb = 'Password is too short';
        } else {

//            if((filter_var($email,FILTER_VALIDATE_EMAIL)) && $getFromU->checkEmail($email) === true){
//                $errorb = 'Email is already in use!';
//            }else{
                if(DB::query('SELECT mobile FROM users where mobile=:mobile', array(':mobile'=>$mobile))){
                    $errorb = 'mobile number is already in use!';
                    
                } else {
                // $getFromU->register($email, $screenName, $password);
                // header('Location: home.php');
                $user_id = $getFromU->create('users', array('mobile' => $mobile, 'password' =>password_hash($password,PASSWORD_BCRYPT),'profileImage' =>'assets/images/defaultProfileImage.png','profileCover' =>'assets/images/defaultCoverImage.png'));
//                $_SESSION['user_id'] = $user_id;
//                    echo $user_id;
                // header('Location: includes/signup.php?step=1');
                $cstrong = true;
                $token=bin2hex(openssl_random_pseudo_bytes(64, $cstrong));
                //select userid from databse
                $user_id=DB::query('SELECT user_id FROM users WHERE mobile=:mobile', array(':mobile'=>$mobile))[0]['user_id'];
                $id = rand();  
//                    echo $id;
//                    echo sha1($token);
                $getFromU->create('token', array('id'=>'','token'=>sha1($token),'user_id'=>$user_id));
                //put token and userid in databse
//            DB::query('INSERT INTO login_tokens VALUES(0, :token, :user_id)', array(':token'=>sha1($token), ':user_id'=>$user_id));
            
            // set cookies to commputer for logged in snid=cookies name, $token = cookie token, time=how much time cookie active for login, 2nd NULL = cause we dont have ssl, if have then use true, true=for crose site scripting.

            //set cookie valid for 7 days
            setcookie('SNID', $token, time()+60*60*24*7,'/',NULL, NULL, true);
            //set cookie valid for 3 days and goto index page for config
            setcookie('SNID_', $token, time()+60*60*24*3,'/',NULL, NULL, true);
            
                header('Location: http://localhost/bhara/relateAdv.php?adId='.$exadvid.'&logup=yes');
            }
//            }
        }
    } 
        
    }
}


?>