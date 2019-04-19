<?php  
 include '../../class/login.php';
include '../../core/init.php';


if(isset($_POST['openionsCount'])){
    echo count($getFromA->openionsCount());
}
    
    if(isset($_POST['openions'])){
 $opValue = $getFromA->openions();
    ?>

<table id="customers">
    <thead>
        <tr>
            <th>id</th>
            <th>opSub</th>
            <th>opDetails</th>
            <th>dateTime</th>
            <th>userid</th>
            <th>usermail</th>
            <th>Action</th>
        </tr>
    </thead>
    <tbody>
        <?php 
    foreach($opValue as $data){
        
        
?>
        <tr class="tableVal">

            <td width="">
                <input type="text" name="adv_id" class="adv_id sm" value="<?php echo $data->id ; ?>" style="">

            </td>
            <td width="">
                <input type="text" name="headline" class="headline mid" value="<?php echo $data->opSub ; ?>" style="">

            </td>
            <td width="">
                <input type="text" name="address" class="address mid" value="<?php echo $data->opDetails ; ?>" style="">

            </td>
            <td width="">
                <input type="text" name="address1" class="address1 mid" value="<?php echo $data->dateTime ; ?>" style="">

            </td>

            <td width="">
                <input type="text" name="address2" class="address2 mid" value="<?php echo $data->userid ; ?>" style="">

            </td>
            <td width="">
                <input type="text" name="localAdd" class="localAdd mid" value="<?php echo $data->usermail ; ?>" style="">

            </td>
            <td width="">
                <button>Submit</button>

            </td>



        </tr>



        <?php
     }
    ?>
    </tbody>





</table>

<?php
        
    }

    
    
if(isset($_POST['adv_id'])){
$adv_id = $_POST['adv_id'];
$headline = $_POST['headline'];
$address = $_POST['address'];
$address1 = $_POST['address1'];
$address2 = $_POST['address2'];
$localAdd = $_POST['localAdd'];
$category = $_POST['category'];
$sub_cat = $_POST['sub_cat'];
$feat_1 = $_POST['feat_1'];
$feat_2 = $_POST['feat_2'];
$feat_3 = $_POST['feat_3'];
$feat_4 = $_POST['feat_4'];
$price = $_POST['price'];
$pricePeriod = $_POST['pricePeriod'];
$img = $_POST['img'];
$details = $_POST['details'];
$date_time = $_POST['date_time'];
$userid = $_POST['userid'];
$userName = $_POST['userName'];
$mobile = $_POST['mobile'];
$email = $_POST['email'];
$nego = $_POST['nego'];
$lat = $_POST['lat'];
$lng = $_POST['lng'];
$publish = $_POST['publish'];

$fols = $getFromA->advEditSubmit($adv_id,$headline,$address,$address1,$address2,$localAdd,$category,$sub_cat,$feat_1,$feat_2,$feat_3,$feat_4,$price,$pricePeriod,$img,$details,$date_time,$userid,$userName,$mobile,$email,$nego,$lat,$lng, $publish);
  
}

if(isset($_POST['userLogNo'])){
    $totalUserData = $getFromA->userLogNo();
echo count($totalUserData);
}
if(isset($_POST['totalUserNo'])){
    $totalUserData = $getFromA->totalUserNo();
echo count($totalUserData);
}

if(isset($_POST['totalPubAdvNo'])){
    $totalUserData = $getFromA->totalPubAdv();
echo count($totalUserData);
}
if(isset($_POST['totalUnPubAdvNo'])){
    $totalUserData = $getFromA->totalUnPubAdv();
echo count($totalUserData);
}

if(isset($_POST['totalLogInUser'])){
    $totalUserData = $getFromA->totalLogUserData();
    ?>

    <table id="customers">
        <thead>
            <tr>
                <th>user_id</th>
                <th>username</th>
                <th>email</th>
                <th>address</th>
                <th>mobile</th>
                <th>password</th>
                <th>screenName</th>
                <th>profileImage</th>
                <th>profileCover</th>
                <th>following</th>
                <th>followers</th>
                <th>currentCity</th>
                <th>homeTown</th>
                <th>gender</th>
                <th>birthday</th>
                <th>language</th>
                <th>religion</th>
                <th>relationShipStatus</th>
                <th>bio</th>
                <th>country</th>
                <th>website</th>
                <th>Action</th>
            </tr>
        </thead>
        <tbody>

            <?php 
    foreach($totalUserData as $data){
        
    ?>

            <tr class="tableVal">

                <td width="">
                    <input type="text" name="adv_id" class="adv_id sm" value="<?php echo $data->user_id ; ?>" style="">

                </td>
                <td width="">
                    <input type="text" name="headline" class="headline mid" value="<?php echo $data->username ; ?>" style="">

                </td>
                <td width="">
                    <input type="text" name="address" class="address mid" value="<?php echo $data->email ; ?>" style="">

                </td>
                <td width="">
                    <input type="text" name="address1" class="address1 mid" value="<?php echo $data->address ; ?>" style="">

                </td>

                <td width="">
                    <input type="text" name="address2" class="address2 mid" value="<?php echo $data->mobile ; ?>" style="">

                </td>
                <td width="">
                    <input type="text" name="localAdd" class="localAdd mid" value="<?php echo $data->password ; ?>" style="">

                </td>
                <td width="">
                    <input type="text" name="category" class="category mid" value="<?php echo $data->screenName ; ?>" style="">

                </td>
                <td width="">
                    <input type="text" name="sub_cat" class="sub_cat mid" class="" value="<?php echo $data->profileImage ; ?>" style="">

                </td>
                <td width="">
                    <input type="text" name="feat_1" class="feat_1 mid" value="<?php echo $data->profileCover ; ?>" style="">

                </td>
                <td width="">
                    <input type="text" name="feat_2" class="feat_2 mid" value="<?php echo $data->following ; ?>" style="">

                </td>
                <td width="">
                    <input type="text" name="feat_3" class="feat_3 mid" value="<?php echo $data->followers ; ?>" style="">

                </td>
                <td width="">
                    <input type="text" name="feat_4" class="feat_4 mid" value="<?php echo $data->currentCity ; ?>" style="">

                </td>
                <td width="">
                    <input type="text" name="price" class="price mid" value="<?php echo $data->homeTown ; ?>" style="">

                </td>
                <td width="">
                    <input type="text" name="pricePeriod" class="pricePeriod mid" value="<?php echo $data->gender ; ?>" style="">

                </td>

                <td width="">
                    <input type="text" class="big img" name="img" value="<?php echo $data->birthday ; ?>" style="">

                </td>
                <td width="">
                    <input type="text" name="details" class="details big" value="<?php echo $data->language ; ?>" style="">

                </td>
                <td width="">
                    <input type="text" name="date_time" class="date_time mid" value="<?php echo $data->religion ; ?>" style="">

                </td>
                <td width="">
                    <input type="text" name="userid" class="userid sm" value="<?php echo $data->relationShipStatus ; ?>" style="">

                </td>
                <td width="">
                    <input type="text" name="userName" class="userName mid" value="<?php echo $data->bio ; ?>" style="">

                </td>
                <td width="">
                    <input type="text" name="mobile" class="mobile mid" value="<?php echo $data->country ; ?>" style="">

                </td>
                <td width="">
                    <input type="text" name="email" class="big email" value="<?php echo $data->website ; ?>" style="">

                </td>
                <!--
                <td width="">
                    <input type="text" name="nego" class="sm nego" value="<?php echo $data->nego ; ?>" style="">

                </td>
                <td width="">
                    <input type="text" class="sm lat" name="lat" value="<?php echo $data->lat ; ?>" style="">

                </td>
-->

            </tr>



            <?php
     }
    ?>
        </tbody>





    </table>

    <?php
}
if(isset($_POST['totalUser'])){
    $totalUserData = $getFromA->totalUserData();
    ?>

        <table id="customers">
            <thead>
                <tr>
                    <th>user_id</th>
                    <th>username</th>
                    <th>email</th>
                    <th>address</th>
                    <th>mobile</th>
                    <th>password</th>
                    <th>screenName</th>
                    <th>profileImage</th>
                    <th>profileCover</th>
                    <th>following</th>
                    <th>followers</th>
                    <th>currentCity</th>
                    <th>homeTown</th>
                    <th>gender</th>
                    <th>birthday</th>
                    <th>language</th>
                    <th>religion</th>
                    <th>relationShipStatus</th>
                    <th>bio</th>
                    <th>country</th>
                    <th>website</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>

                <?php 
    foreach($totalUserData as $data){
        
    ?>

                <tr class="tableVal">

                    <td width="">
                        <input type="text" name="adv_id" class="adv_id sm" value="<?php echo $data->user_id ; ?>" style="">

                    </td>
                    <td width="">
                        <input type="text" name="headline" class="headline mid" value="<?php echo $data->username ; ?>" style="">

                    </td>
                    <td width="">
                        <input type="text" name="address" class="address mid" value="<?php echo $data->email ; ?>" style="">

                    </td>
                    <td width="">
                        <input type="text" name="address1" class="address1 mid" value="<?php echo $data->address ; ?>" style="">

                    </td>

                    <td width="">
                        <input type="text" name="address2" class="address2 mid" value="<?php echo $data->mobile ; ?>" style="">

                    </td>
                    <td width="">
                        <input type="text" name="localAdd" class="localAdd mid" value="<?php echo $data->password ; ?>" style="">

                    </td>
                    <td width="">
                        <input type="text" name="category" class="category mid" value="<?php echo $data->screenName ; ?>" style="">

                    </td>
                    <td width="">
                        <input type="text" name="sub_cat" class="sub_cat mid" class="" value="<?php echo $data->profileImage ; ?>" style="">

                    </td>
                    <td width="">
                        <input type="text" name="feat_1" class="feat_1 mid" value="<?php echo $data->profileCover ; ?>" style="">

                    </td>
                    <td width="">
                        <input type="text" name="feat_2" class="feat_2 mid" value="<?php echo $data->following ; ?>" style="">

                    </td>
                    <td width="">
                        <input type="text" name="feat_3" class="feat_3 mid" value="<?php echo $data->followers ; ?>" style="">

                    </td>
                    <td width="">
                        <input type="text" name="feat_4" class="feat_4 mid" value="<?php echo $data->currentCity ; ?>" style="">

                    </td>
                    <td width="">
                        <input type="text" name="price" class="price mid" value="<?php echo $data->homeTown ; ?>" style="">

                    </td>
                    <td width="">
                        <input type="text" name="pricePeriod" class="pricePeriod mid" value="<?php echo $data->gender ; ?>" style="">

                    </td>

                    <td width="">
                        <input type="text" class="big img" name="img" value="<?php echo $data->birthday ; ?>" style="">

                    </td>
                    <td width="">
                        <input type="text" name="details" class="details big" value="<?php echo $data->language ; ?>" style="">

                    </td>
                    <td width="">
                        <input type="text" name="date_time" class="date_time mid" value="<?php echo $data->religion ; ?>" style="">

                    </td>
                    <td width="">
                        <input type="text" name="userid" class="userid sm" value="<?php echo $data->relationShipStatus ; ?>" style="">

                    </td>
                    <td width="">
                        <input type="text" name="userName" class="userName mid" value="<?php echo $data->bio ; ?>" style="">

                    </td>
                    <td width="">
                        <input type="text" name="mobile" class="mobile mid" value="<?php echo $data->country ; ?>" style="">

                    </td>
                    <td width="">
                        <input type="text" name="email" class="big email" value="<?php echo $data->website ; ?>" style="">

                    </td>
                    <!--
                <td width="">
                    <input type="text" name="nego" class="sm nego" value="<?php echo $data->nego ; ?>" style="">

                </td>
                <td width="">
                    <input type="text" class="sm lat" name="lat" value="<?php echo $data->lat ; ?>" style="">

                </td>
-->

                </tr>



                <?php
     }
    ?>
            </tbody>





        </table>

        <?php
}
if(isset($_POST['totalPubAdv'])){
    $totalUserData = $getFromA->totalPubAdv();
   ?>

            <table id="customers">
                <thead>
                    <tr>
                        <th>Adv_id</th>
                        <th>Headline</th>
                        <th>Address</th>
                        <th>Address1</th>
                        <th>Address2</th>
                        <th>LocalAdd</th>
                        <th>Category</th>
                        <th>Sub_cat</th>
                        <th>Feat_1</th>
                        <th>Feat_2</th>
                        <th>Feat_3</th>
                        <th>Feat_4</th>
                        <th>Price</th>
                        <th>PricePeriod</th>
                        <th>Img</th>
                        <th>Details</th>
                        <th>Date_time</th>
                        <th>Userid</th>
                        <th>UserName</th>
                        <th>Mobile</th>
                        <th>Email</th>
                        <th>Nego</th>
                        <th>Lat</th>
                        <th>Lng</th>
                        <th>Publish</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    <?php 
    foreach($totalUserData as $data){
        
?>
                    <tr class="tableVal">

                        <td width="">
                            <input type="text" name="adv_id" class="adv_id sm" value="<?php echo $data->adv_id ; ?>" style="">

                        </td>
                        <td width="">
                            <input type="text" name="headline" class="headline mid" value="<?php echo $data->headline ; ?>" style="">

                        </td>
                        <td width="">
                            <input type="text" name="address" class="address mid" value="<?php echo $data->address ; ?>" style="">

                        </td>
                        <td width="">
                            <input type="text" name="address1" class="address1 mid" value="<?php echo $data->address1 ; ?>" style="">

                        </td>

                        <td width="">
                            <input type="text" name="address2" class="address2 mid" value="<?php echo $data->address2 ; ?>" style="">

                        </td>
                        <td width="">
                            <input type="text" name="localAdd" class="localAdd mid" value="<?php echo $data->localAdd ; ?>" style="">

                        </td>
                        <td width="">
                            <input type="text" name="category" class="category mid" value="<?php echo $data->category ; ?>" style="">

                        </td>
                        <td width="">
                            <input type="text" name="sub_cat" class="sub_cat mid" class="" value="<?php echo $data->sub_cat ; ?>" style="">

                        </td>
                        <td width="">
                            <input type="text" name="feat_1" class="feat_1 mid" value="<?php echo $data->feat_1 ; ?>" style="">

                        </td>
                        <td width="">
                            <input type="text" name="feat_2" class="feat_2 mid" value="<?php echo $data->feat_2 ; ?>" style="">

                        </td>
                        <td width="">
                            <input type="text" name="feat_3" class="feat_3 mid" value="<?php echo $data->feat_3 ; ?>" style="">

                        </td>
                        <td width="">
                            <input type="text" name="feat_4" class="feat_4 mid" value="<?php echo $data->feat_4 ; ?>" style="">

                        </td>
                        <td width="">
                            <input type="text" name="price" class="price mid" value="<?php echo $data->price ; ?>" style="">

                        </td>
                        <td width="">
                            <input type="text" name="pricePeriod" class="pricePeriod mid" value="<?php echo $data->pricePeriod ; ?>" style="">

                        </td>

                        <td width="">
                            <input type="text" class="big img" name="img" value="<?php echo $data->img ; ?>" style="">

                        </td>
                        <td width="">
                            <input type="text" name="details" class="details big" value="<?php echo $data->details ; ?>" style="">

                        </td>
                        <td width="">
                            <input type="text" name="date_time" class="date_time mid" value="<?php echo $data->date_time ; ?>" style="">

                        </td>
                        <td width="">
                            <input type="text" name="userid" class="userid sm" value="<?php echo $data->userid ; ?>" style="">

                        </td>
                        <td width="">
                            <input type="text" name="userName" class="userName mid" value="<?php echo $data->userName ; ?>" style="">

                        </td>
                        <td width="">
                            <input type="text" name="mobile" class="mobile mid" value="<?php echo $data->mobile ; ?>" style="">

                        </td>
                        <td width="">
                            <input type="text" name="email" class="big email" value="<?php echo $data->email ; ?>" style="">

                        </td>
                        <td width="">
                            <input type="text" name="nego" class="sm nego" value="<?php echo $data->nego ; ?>" style="">

                        </td>
                        <td width="">
                            <input type="text" class="sm lat" name="lat" value="<?php echo $data->lat ; ?>" style="">

                        </td>
                        <td width="">
                            <input type="text" class="sm lng" name="lng" value="<?php echo $data->lng ; ?>" style="">

                        </td>

                        <td width="">
                            <input type="text" class="sm publish" class="publish" value="<?php echo $data->publish ; ?>" style="">

                        </td>

                        <td width="">
                            <button class="actionSub">Action</button>

                        </td>


                    </tr>



                    <?php
     }
    ?>
                </tbody>





            </table>

            <?php
}
if(isset($_POST['totalUnPubAdv'])){
    $totalUserData = $getFromA->totalUnPubAdv();
    ?>
                <table id="customers">
                    <thead>
                        <tr>
                            <th>Adv_id</th>
                            <th>Headline</th>
                            <th>Address</th>
                            <th>Address1</th>
                            <th>Address2</th>
                            <th>LocalAdd</th>
                            <th>Category</th>
                            <th>Sub_cat</th>
                            <th>Feat_1</th>
                            <th>Feat_2</th>
                            <th>Feat_3</th>
                            <th>Feat_4</th>
                            <th>Price</th>
                            <th>PricePeriod</th>
                            <th>Img</th>
                            <th>Details</th>
                            <th>Date_time</th>
                            <th>Userid</th>
                            <th>UserName</th>
                            <th>Mobile</th>
                            <th>Email</th>
                            <th>Nego</th>
                            <th>Lat</th>
                            <th>Lng</th>
                            <th>Publish</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php 
    foreach($totalUserData as $data){
   ?>

                        <tr class="tableVal">

                            <td width="">
                                <input type="text" name="adv_id" class="adv_id sm" value="<?php echo $data->adv_id ; ?>" style="">

                            </td>
                            <td width="">
                                <input type="text" name="headline" class="headline mid" value="<?php echo $data->headline ; ?>" style="">

                            </td>
                            <td width="">
                                <input type="text" name="address" class="address mid" value="<?php echo $data->address ; ?>" style="">

                            </td>
                            <td width="">
                                <input type="text" name="address1" class="address1 mid" value="<?php echo $data->address1 ; ?>" style="">

                            </td>

                            <td width="">
                                <input type="text" name="address2" class="address2 mid" value="<?php echo $data->address2 ; ?>" style="">

                            </td>
                            <td width="">
                                <input type="text" name="localAdd" class="localAdd mid" value="<?php echo $data->localAdd ; ?>" style="">

                            </td>
                            <td width="">
                                <input type="text" name="category" class="category mid" value="<?php echo $data->category ; ?>" style="">

                            </td>
                            <td width="">
                                <input type="text" name="sub_cat" class="sub_cat mid" class="" value="<?php echo $data->sub_cat ; ?>" style="">

                            </td>
                            <td width="">
                                <input type="text" name="feat_1" class="feat_1 mid" value="<?php echo $data->feat_1 ; ?>" style="">

                            </td>
                            <td width="">
                                <input type="text" name="feat_2" class="feat_2 mid" value="<?php echo $data->feat_2 ; ?>" style="">

                            </td>
                            <td width="">
                                <input type="text" name="feat_3" class="feat_3 mid" value="<?php echo $data->feat_3 ; ?>" style="">

                            </td>
                            <td width="">
                                <input type="text" name="feat_4" class="feat_4 mid" value="<?php echo $data->feat_4 ; ?>" style="">

                            </td>
                            <td width="">
                                <input type="text" name="price" class="price mid" value="<?php echo $data->price ; ?>" style="">

                            </td>
                            <td width="">
                                <input type="text" name="pricePeriod" class="pricePeriod mid" value="<?php echo $data->pricePeriod ; ?>" style="">

                            </td>

                            <td width="">
                                <input type="text" class="big img" name="img" value="<?php echo $data->img ; ?>" style="">

                            </td>
                            <td width="">
                                <input type="text" name="details" class="details big" value="<?php echo $data->details ; ?>" style="">

                            </td>
                            <td width="">
                                <input type="text" name="date_time" class="date_time mid" value="<?php echo $data->date_time ; ?>" style="">

                            </td>
                            <td width="">
                                <input type="text" name="userid" class="userid sm" value="<?php echo $data->userid ; ?>" style="">

                            </td>
                            <td width="">
                                <input type="text" name="userName" class="userName mid" value="<?php echo $data->userName ; ?>" style="">

                            </td>
                            <td width="">
                                <input type="text" name="mobile" class="mobile mid" value="<?php echo $data->mobile ; ?>" style="">

                            </td>
                            <td width="">
                                <input type="text" name="email" class="big email" value="<?php echo $data->email ; ?>" style="">

                            </td>
                            <td width="">
                                <input type="text" name="nego" class="sm nego" value="<?php echo $data->nego ; ?>" style="">

                            </td>
                            <td width="">
                                <input type="text" class="sm lat" name="lat" value="<?php echo $data->lat ; ?>" style="">

                            </td>
                            <td width="">
                                <input type="text" class="sm lng" name="lng" value="<?php echo $data->lng ; ?>" style="">

                            </td>

                            <td width="">
                                <input type="text" class="sm publish" class="publish" value="<?php echo $data->publish ; ?>" style="">

                            </td>

                            <td width="">
                                <button class="actionSub">Action</button>

                            </td>


                        </tr>


                        <?php
    } ?>
                    </tbody>





                </table>

                <?php
}


?>
