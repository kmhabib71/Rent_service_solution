<?php

include '../class/login.php';
include '../core/init.php';


$showTimeline=False;
if(login::isLoggedIn()){
     $userid =login::isLoggedIn();
    
     $showTimeline=True;
    echo 'User find';
    header('Location: ../profile.php');
}
$user_id =login::isLoggedIn();

$error_msg = '';


if(isset($_GET['mob'])){
$mobile=$_GET['mob'];
$password=$_GET['pass'];

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
            
                header('Location: ../profile.php');
            }
//            }
        }
    }
}




?>



    <!DOCTYPE html>
    <html lang="en">

    <head>
        <title>লগইন-ভাড়া.কম</title>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <!--===============================================================================================-->
        <!--        <link rel="icon" type="image/png" href="images/icons/favicon.ico" />-->
        <!--===============================================================================================-->
        <link rel="stylesheet" type="text/css" href="vendor/bootstrap/css/bootstrap.min.css">
        <!--===============================================================================================-->
        <link rel="stylesheet" type="text/css" href="fonts/font-awesome-4.7.0/css/font-awesome.min.css">
        <!--===============================================================================================-->
        <link rel="stylesheet" type="text/css" href="vendor/animate/animate.css">
        <!--===============================================================================================-->
        <link rel="stylesheet" type="text/css" href="vendor/css-hamburgers/hamburgers.min.css">
        <!--===============================================================================================-->
        <link rel="stylesheet" type="text/css" href="vendor/select2/select2.min.css">
        <link rel="stylesheet" href="../assets/css/mobileCustom.css" media="screen and (max-width: 600px)">
        <!--===============================================================================================-->
        <link rel="stylesheet" type="text/css" href="css/util.css">
        <link rel="stylesheet" type="text/css" href="css/main.css">
        <!--===============================================================================================-->
        <style>
            .det_img_cont img {
                height: 100%;
                width: 100%;
            }
            
            .back_arrow img {
                height: 30px;
                width: 30px;
                vertical-align: middle;
                text-align: center;
                margin-left: 0.233rem;
                margin-top: 0.345rem;
                opacity: 0.93;
            }
            
            input[type=number]::-webkit-inner-spin-button,
            input[type=number]::-webkit-outer-spin-button {
                -webkit-appearance: none;
                margin: 0;
            }

        </style>

    </head>

    <body>
        <div class="header_wrapper" style="    width: 100%; position:fixed; z-index:9; height: 2.986rem;">
            <div class="logo">
                <div class="back_arrow" style="font-size:42px; text-shadow:none; color:white;"><img src="https://img.icons8.com/metro/50/ffffff/undo.png"></div>

                <a href="http://bhara.com" style="display:none;"><img src="assets/img/logo.svg" alt=""></a>

            </div>
            <a style="text-decoration:none;" href="http://bhara.com">
                <div class="brandName" style="margin-top: 0rem;    margin-left: -35px;">ভাড়া.কম</div>
            </a>
            <a href="#adv" style="display:none;">
                <div class="post_adv">Post Adv</div>
            </a>
            <div class="account_icon" style="    visibility: hidden;">
                <img src="assets/img/account.svg" alt="">
            </div>

        </div>
        <div class="limiter">
            <div class="container-login100" style="background: #54af11b5;">
                <div class="wrap-login100" style=" margin-top: 55px;
        padding-top: 75px;">
                    <div class="login100-pic js-tilt" data-tilt>
                        <img src="images/img-01.png" alt="IMG">
                    </div>

                    <form class="login100-form validate-form">
                        <span class="login100-form-title">
						নতুন অ্যাকাউন্ট খুলুন
					</span>

                        <div class="wrap-input100 validate-input" data-validate="বৈধ মোবাইল নাম্বার দিন: 01815******">
                            <input class="input100" type="number" name="mob" placeholder="মোবাইল" style="    background-color: rgb(250, 255, 189) !important;">
                            <span class="focus-input100"></span>
                            <span class="symbol-input100">
							<i class="fa fa-phone" aria-hidden="true"></i>
						</span>
                        </div>

                        <div class="wrap-input100 validate-input" data-validate="Password is required">
                            <input class="input100" type="password" id="input100" name="pass" placeholder="পাসওয়ার্ড" style="    background-color: rgb(250, 255, 189) !important;">

                            <span class="focus-input100"></span>
                            <span class="symbol-input100">
							<i class="fa fa-lock" aria-hidden="true"></i>
						</span>

                        </div>



                        <input type="checkbox" style="max-width: 30px; vertical-align: middle;" onclick="myFunction()" id="b"><label for="b" style="font-size:12px;">পাসওয়ার্ড দেখুন</label>
                        <div class="container-login100-form-btn">
                            <button class="login100-form-btn" style="font-size: 20px;">
				সাইনআপ
						</button>
                        </div>

                        <!--
<div class="text-center p-t-12">
    <span class="txt1">
							পাসওয়ার্ড
						</span>
    <a class="txt2" href="#">
							 ভুলে গেছেন?
						</a>
</div>
-->


                        <?php if($error_msg){echo ' <div class="text-center p-t-136" style="margin-top: -25px;">';}else{?>
                        <div class="text-center p-t-136">
                            <?php } ?>

                            <div id="error_multiple_files" style="color: red; vertical-align: middle; text-align: center;">
                                <?php echo $error_msg;  ?>
                            </div>
                            <?php if($error_msg){echo ' <a class="txt2" href="login.php" style="color:green; font-size: 18px; ">
				            লগিইন করুন
							<i class="fa fa-long-arrow-right m-l-5" aria-hidden="true"></i>
						</a>';}else{ echo 
    ' <a class="txt2" href="login.php">
				            লগিইন করুন
							<i class="fa fa-long-arrow-right m-l-5" aria-hidden="true"></i>
						</a>';
}  ?>

                        </div>
                    </form>
                </div>
            </div>
        </div>




        <!--===============================================================================================-->
        <script src="vendor/jquery/jquery-3.2.1.min.js"></script>
        <!--===============================================================================================-->
        <script src="vendor/bootstrap/js/popper.js"></script>
        <script src="vendor/bootstrap/js/bootstrap.min.js"></script>
        <!--===============================================================================================-->
        <script src="vendor/select2/select2.min.js"></script>
        <!--===============================================================================================-->
        <script src="vendor/tilt/tilt.jquery.min.js"></script>
        <script>
            $('.js-tilt').tilt({
                scale: 1.1
            })

        </script>
        <!--===============================================================================================-->
        <script src="js/main.js"></script>
        <script>
            function myFunction() {
                var x = document.getElementById("input100");
                if (x.type === "password") {
                    x.type = "text";
                } else {
                    x.type = "password";
                }
            }
            $(function() {
                $(".back_arrow").on("click", function() {
                    window.history.back();
                });
            });

        </script>

    </body>

    </html>
