<?php
include '../init.php';
include '../../class/login.php';

if(isset($_POST['sel_res']) ){
	$sele_resu = $getFromU->checkInput($_POST['sel_res']);
    $sel_res_retu =  $getFromPo->district($sele_resu);
    echo '<option value=""  > জেলা নির্বাচন করুন</option>';
    foreach($sel_res_retu as $sele){
        
        echo '
        
                        
            
            <option value="'.$sele->id.'"  class="upazila_design">'.$sele->bn_name.'</option>';
       
        
    }
}

if(isset($_POST['sel_upaz']) ){
	$sele_resu = $getFromU->checkInput($_POST['sel_upaz']);
    $sel_res_retu =  $getFromPo->upazila($sele_resu);
    echo '<option value="volvo" >এলাকা নির্বচন করুন</option>';
    foreach($sel_res_retu as $sele){
        
        echo '
        
            <option value="'.$sele->id.'"  class="upazila_design">'.$sele->bn_name.'</option> ';
        
    }
}


    
    
    if(isset($_POST['dist_hit'])){
    echo '
    <div data-role="collapsible" data-inset="false" >
        <h2>ঢাকা</h2>
            <ul data-role="listview">
                <li><a href="#" data-rel="dialog" value="1" class="dis_design">ঢাকা</a></li>
            <li><a href="#" data-rel="dialog" value="2" class="dis_design">ফরিদপুর</a></li>
            <li><a href="#" data-rel="dialog" value="3" class="dis_design">গাজীপুর</a></li>
            <li><a href="#" data-rel="dialog" value="4" class="dis_design">গোপালগঞ্জ</a></li>
            <li><a href="#" data-rel="dialog" value="6" class="dis_design">কিশোরগঞ্জ</a></li>
            <li><a href="#" data-rel="dialog" value="7" class="dis_design">মাদারীপুর</a></li>
            <li><a href="#" data-rel="dialog" value="8" class="dis_design">মানিকগঞ্জ</a></li>
            <li><a href="#" data-rel="dialog" value="9" class="dis_design">মুন্সিগঞ্জ</a></li> 
            <li><a href="#" data-rel="dialog" value="11" class="dis_design">নারায়াণগঞ্জ</a></li>
            <li><a href="#" data-rel="dialog" value="12" class="dis_design">নরসিংদী</a></li>
            <li><a href="#" data-rel="dialog" value="14" class="dis_design">রাজবাড়ি</a></li>
            <li><a href="#" data-rel="dialog" value="15" class="dis_design">শরীয়তপুর</a></li>
            <li><a href="#" data-rel="dialog" value="17" class="dis_design">টাঙ্গাইল</a></li>
            </ul>
        </div><!-- /collapsible -->
        <div data-role="collapsible" data-inset="false">
        <h2>চট্টগ্রাম</h2>
            <ul data-role="listview">
                <li><a href="#" data-rel="dialog" value="40" class="dis_design">বান্দরবান</a></li>
            <li><a href="#" data-rel="dialog" value="41" class="dis_design">ব্রাহ্মণবাড়িয়া</a></li>
            <li><a href="#" data-rel="dialog" value="42" class="dis_design">চাঁদপুর</a></li>
            <li><a href="#" data-rel="dialog" value="43" class="dis_design">চট্টগ্রাম</a></li>
            <li><a href="#" data-rel="dialog" value="44" class="dis_design">কুমিল্লা</a></li>
            <li><a href="#" data-rel="dialog" value="45" class="dis_design">কক্স বাজার</a></li>
            <li><a href="#" data-rel="dialog" value="46" class="dis_design">ফেনী</a></li>
            <li><a href="#" data-rel="dialog" value="47" class="dis_design">খাগড়াছড়ি</a></li>
            <li><a href="#" data-rel="dialog" value="48" class="dis_design">লক্ষ্মীপুর</a></li>
            <li><a href="#" data-rel="dialog" value="49" class="dis_design">নোয়াখালী</a></li> 
            <li><a href="#" data-rel="dialog" value="50" class="dis_design">রাঙ্গামাটি</a></li>
            </ul>
        </div><!-- /collapsible -->
        <div data-role="collapsible" data-inset="false">
        <h2>রাজশাহি</h2>
            <ul data-role="listview">
                <li><a href="#" data-rel="dialog" value="18" class="dis_design">বগুড়া</a></li>
            <li><a href="#" data-rel="dialog" value="19" class="dis_design">জয়পুরহাট</a></li>
            <li><a href="#" data-rel="dialog" value="20" class="dis_design">নওগাঁ</a></li>
            <li><a href="#" data-rel="dialog" value="21" class="dis_design">নাটোর</a></li>
            <li><a href="#" data-rel="dialog" value="22" class="dis_design">নবাবগঞ্জ</a></li>
            <li><a href="#" data-rel="dialog" value="23" class="dis_design">পাবনা</a></li>
            <li><a href="#" data-rel="dialog" value="24" class="dis_design">রাজশাহী</a></li>
            <li><a href="#" data-rel="dialog" value="25" class="dis_design">সিরাজগঞ্জ</a></li>
            </ul>
        </div><!-- /collapsible -->
        <div data-role="collapsible" data-inset="false">
        <h2>খুলনা</h2>
            <ul data-role="listview">
                <li><a href="#" data-rel="dialog" value="55" class="dis_design">বাগেরহাট</a></li>
            <li><a href="#" data-rel="dialog" value="56" class="dis_design">চুয়াডাঙ্গা</a></li>
            <li><a href="#" data-rel="dialog" value="57" class="dis_design">যশোর</a></li>
            <li><a href="#" data-rel="dialog" value="58" class="dis_design">ঝিনাইদহ</a></li>
            <li><a href="#" data-rel="dialog" value="59" class="dis_design">খুলনা</a></li>
            <li><a href="#" data-rel="dialog" value="60" class="dis_design">কুষ্টিয়া</a></li> 
            <li><a href="#" data-rel="dialog" value="61" class="dis_design">মাগুরা</a></li>
            <li><a href="#" data-rel="dialog" value="62" class="dis_design">মেহেরপুর</a></li>
            <li><a href="#" data-rel="dialog" value="63" class="dis_design">নড়াইল</a></li>       
            <li><a href="#" data-rel="dialog" value="64" class="dis_design">সাতক্ষীরা</a></li>
            </ul>
        </div>
        <div data-role="collapsible" data-inset="false">
        <h2>বরিশাল</h2>
            <ul data-role="listview">
                <li><a href="#" data-rel="dialog" value="34" class="dis_design">বরগুনা</a></li>
            <li><a href="#" data-rel="dialog" value="35" class="dis_design">বরিশাল</a></li>
            <li><a href="#" data-rel="dialog" value="36" class="dis_design">ভোলা</a></li>
            <li><a href="#" data-rel="dialog" value="37" class="dis_design">ঝালকাঠি</a></li>
            <li><a href="#" data-rel="dialog" value="38" class="dis_design">পটুয়াখালী</a></li>
            <li><a href="#" data-rel="dialog" value="39" class="dis_design">পিরোজপুর</a></li>
            </ul>
        </div>
        <div data-role="collapsible" data-inset="false">
        <h2>সিলেট</h2>
            <ul data-role="listview">
                <li><a href="#" data-rel="dialog" value="51" class="dis_design">হবিগঞ্জ</a></li>
            <li><a href="#" data-rel="dialog" value="52" class="dis_design">মৌলভীবাজার</a></li>
            <li><a href="#" data-rel="dialog" value="53" class="dis_design">সুনামগঞ্জ</a></li>
            <li><a href="#" data-rel="dialog" value="54" class="dis_design">সিলেট</a></li>
            </ul>
        </div>
        <div data-role="collapsible" data-inset="false">
        <h2>রংপুর</h2>
            <ul data-role="listview">
                <li><a href="#" data-rel="dialog" value="26" class="dis_design">দিনাজপুর</a></li>
            <li><a href="#" data-rel="dialog" value="27" class="dis_design">গাইবান্ধা</a></li>
            <li><a href="#" data-rel="dialog" value="28" class="dis_design">কুড়িগ্রাম</a></li>
            <li><a href="#" data-rel="dialog" value="29" class="dis_design">লালমনিরহাট</a></li>
            <li><a href="#" data-rel="dialog" value="30" class="dis_design">নীলফামারী</a></li>
            <li><a href="#" data-rel="dialog" value="31" class="dis_design">পঞ্চগড়</a></li>
            <li><a href="#" data-rel="dialog" value="32" class="dis_design">রংপুর</a></li>
            <li><a href="#" data-rel="dialog" value="33" class="dis_design">ঠাকুরগাঁও</a></li>
            </ul>
        </div>
    ';
}



if(isset($_POST['area_sch']) ){
echo '
<option value="2" data-distid="2" class="dis_design">ফরিদপুর</option> 
            <option value="3" data-distid="3" class="dis_design">গাজীপুর</option>
            <option value="4" data-distid="4" class="dis_design">গোপালগঞ্জ</option>     
            <option value="6" data-distid="6" class="dis_design">কিশোরগঞ্জ</option>
            <option value="7" data-distid="7" class="dis_design">মাদারীপুর</option>
            <option value="8" data-distid="8" class="dis_design">মানিকগঞ্জ</option>
            <option value="9" data-distid="9" class="dis_design">মুন্সিগঞ্জ</option>
            <option value="11" data-distid="11" class="dis_design">নারায়াণগঞ্জ</option>
            <option value="12" data-distid="12" class="dis_design">নরসিংদী</option> 
            <option value="14" data-distid="14" class="dis_design">রাজবাড়ি</option>
            <option value="15" data-distid="15" class="dis_design">শরীয়তপুর</option> 
            <option value="40" data-distid="40" class="dis_design">বান্দরবান</option>
            <option value="41" data-distid="41" class="dis_design">ব্রাহ্মণবাড়িয়া</option>  
            <option value="42" data-distid="42" class="dis_design">চাঁদপুর</option>    
            <option value="43" data-distid="43" class="dis_design">চট্টগ্রাম</option> 
            <option value="44" data-distid="44" class="dis_design">কুমিল্লা</option>    
            <option value="45" data-distid="45" class="dis_design">কক্স বাজার</option>
            <option value="46" data-distid="46" class="dis_design">ফেনী</option> 
            <option value="47" data-distid="47" class="dis_design">খাগড়াছড়ি</option>          
            <option value="48" data-distid="48" class="dis_design">লক্ষ্মীপুর</option>          
            <option value="49" data-distid="49" class="dis_design">নোয়াখালী</option>
            <option value="50" data-distid="50" class="dis_design">রাঙ্গামাটি</option> 
            <option value="55" data-distid="55" class="dis_design">বাগেরহাট</option>        
            <option value="56" data-distid="56" class="dis_design">চুয়াডাঙ্গা</option> 
            <option value="57" data-distid="57" class="dis_design">যশোর</option>   
            <option value="58" data-distid="58" class="dis_design">ঝিনাইদহ</option> 
            <option value="59" data-distid="59" class="dis_design">খুলনা</option>            
            <option value="60" data-distid="60" class="dis_design">কুষ্টিয়া</option> 
            <option value="61" data-distid="61" class="dis_design">মাগুরা</option>       
            <option value="62" data-distid="62" class="dis_design">মেহেরপুর</option>   
            <option value="63" data-distid="63" class="dis_design">নড়াইল</option>           
            <option value="64" data-distid="64" class="dis_design">সাতক্ষীরা</option>
            <option value="34" data-distid="34" class="dis_design">বরগুনা</option>       
            <option value="35" data-distid="35" class="dis_design">বরিশাল</option>
            <option value="36" data-distid="36" class="dis_design">ভোলা</option>      
            <option value="37" data-distid="37" class="dis_design">ঝালকাঠি</option>    
            <option value="38" data-distid="38" class="dis_design">পটুয়াখালী</option>           
            <option value="39" data-distid="39" class="dis_design">পিরোজপুর</option> 
            <option value="18" data-distid="18" class="dis_design">বগুড়া</option> 
        <option value="19" data-distid="19" class="dis_design">জয়পুরহাট</option> 
            <option value="20" data-distid="20" class="dis_design">নওগাঁ</option>
            <option value="21" data-distid="21" class="dis_design">নাটোর</option>
            <option value="22" data-distid="22" class="dis_design">নবাবগঞ্জ</option>    
            <option value="23" data-distid="23" class="dis_design">পাবনা</option>       
            <option value="24" data-distid="24" class="dis_design">রাজশাহী</option>           
            <option value="25" data-distid="25" class="dis_design">সিরাজগঞ্জ</option> 
            <option value="51" data-distid="51" class="dis_design">হবিগঞ্জ</option>   
            <option value="52" data-distid="52" class="dis_design">মৌলভীবাজার</option>       
            <option value="53" data-distid="53" class="dis_design">সুনামগঞ্জ</option>            
            <option value="54" data-distid="54" class="dis_design">সিলেট</option>
            <option value="26" data-distid="26" class="dis_design">দিনাজপুর</option>             
            <option value="27" data-distid="27" class="dis_design">গাইবান্ধা</option>   
            <option value="28" data-distid="28" class="dis_design">কুড়িগ্রাম</option>   
            <option value="29" data-distid="29" class="dis_design">লালমনিরহাট</option>
            <option value="30" data-distid="30" class="dis_design">নীলফামারী</option>         
            <option value="31" data-distid="31" class="dis_design">পঞ্চগড়</option>    
            <option value="32" data-distid="32" class="dis_design">রংপুর</option> 
            <option value="33" data-distid="33" class="dis_design">ঠাকুরগাঁও</option>      
            <option value="5" data-distid="5" class="dis_design">জামালপুর</option>
            <option value="10" data-distid="10" class="dis_design">ময়মনসিংহ</option>    
            <option value="13" data-distid="13" class="dis_design">নেত্রকোণা</option>         
            <option value="16" data-distid="16" class="dis_design">শেরপুর</option>
';
}
//<option value="'.$sele->id.'" data-distid="'.$sele->id.'" class="dis_design">'.$sele->bn_name.'</option>  

?>
