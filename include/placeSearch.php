<div data-role="collapsible-set" data-content-theme="c" class="locationShow" style=" margin-top: -12px;z-index: 99; background-color: aliceblue;
    padding-bottom: 0.694rem; display:none;">
    বর্তমান অবস্থান:
    <?php echo $location; ?>
    <div data-role="collapsible" data-theme="e" data-content-theme="d">
        <h6>ঢাকা</h6>
        <ul>
            <li><a href="#" value="1" class="dis_design">ঢাকা</a></li>
            <?php $upaz = $getFromPo->upazila('1');
                    
                    foreach($upaz as $upa){
                       echo '<li><a href="#" value="'.$upa->id.'" class="dis_design">'.$upa->bn_name.'</a></li>';
                    }
                    ?>

            <li><a href="#" value="2" class="dis_design">ফরিদপুর</a></li>
            <li><a href="#" value="3" class="dis_design">গাজীপুর</a></li>
            <li><a href="#" value="4" class="dis_design">গোপালগঞ্জ</a></li>
            <li><a href="#" value="6" class="dis_design">কিশোরগঞ্জ</a></li>
            <li><a href="#" value="7" class="dis_design">মাদারীপুর</a></li>
            <li><a href="#" value="8" class="dis_design">মানিকগঞ্জ</a></li>
            <li><a href="#" value="9" class="dis_design">মুন্সিগঞ্জ</a></li>
            <li><a href="#" value="11" class="dis_design">নারায়াণগঞ্জ</a></li>
            <li><a href="#" value="12" class="dis_design">নরসিংদী</a></li>
            <li><a href="#" value="14" class="dis_design">রাজবাড়ি</a></li>
            <li><a href="#" value="15" class="dis_design">শরীয়তপুর</a></li>
            <li><a href="#" value="17" class="dis_design">টাঙ্গাইল</a></li>
        </ul>
    </div>
    <div data-role="collapsible" data-theme="e" data-content-theme="d">
        <h3>চট্টগ্রাম</h3>
        <ul>
            <li><a href="#" value="43" class="dis_design">চট্টগ্রাম</a></li>
            <?php $upaz = $getFromPo->upazila('43');
                    
                    foreach($upaz as $upa){
                       echo '<li><a href="#" value="'.$upa->id.'" class="dis_design">'.$upa->bn_name.'</a></li>';
                    }
                    ?>
            <li><a href="#" value="40" class="dis_design">বান্দরবান</a></li>
            <li><a href="#" value="41" class="dis_design">ব্রাহ্মণবাড়িয়া</a></li>
            <li><a href="#" value="42" class="dis_design">চাঁদপুর</a></li>
            <li><a href="#" value="44" class="dis_design">কুমিল্লা</a></li>
            <li><a href="#" value="45" class="dis_design">কক্স বাজার</a></li>
            <li><a href="#" value="46" class="dis_design">ফেনী</a></li>
            <li><a href="#" value="47" class="dis_design">খাগড়াছড়ি</a></li>
            <li><a href="#" value="48" class="dis_design">লক্ষ্মীপুর</a></li>
            <li><a href="#" value="49" class="dis_design">নোয়াখালী</a></li>
            <li><a href="#" value="50" class="dis_design">রাঙ্গামাটি</a></li>
        </ul>
    </div>
    <div data-role="collapsible" data-theme="e" data-content-theme="d">
        <h3>সিলেট</h3>
        <ul>

            <li><a href="#" value="51" class="dis_design">হবিগঞ্জ</a></li>
            <li><a href="#" value="52" class="dis_design">মৌলভীবাজার</a></li>
            <li><a href="#" value="53" class="dis_design">সুনামগঞ্জ</a></li>
            <li><a href="#" value="54" class="dis_design">সিলেট</a></li>
        </ul>
    </div>
    <div data-role="collapsible" data-theme="e" data-content-theme="d">
        <h3>খুলনা</h3>
        <ul>

            <li><a href="#" value="55" class="dis_design">বাগেরহাট</a></li>
            <li><a href="#" value="56" class="dis_design">চুয়াডাঙ্গা</a></li>
            <li><a href="#" value="57" class="dis_design">যশোর</a></li>
            <li><a href="#" value="58" class="dis_design">ঝিনাইদহ</a></li>
            <li><a href="#" value="59" class="dis_design">খুলনা</a></li>
            <li><a href="#" value="60" class="dis_design">কুষ্টিয়া</a></li>
            <li><a href="#" value="61" class="dis_design">মাগুরা</a></li>
            <li><a href="#" value="62" class="dis_design">মেহেরপুর</a></li>
            <li><a href="#" value="63" class="dis_design">নড়াইল</a></li>
            <li><a href="#" value="64" class="dis_design">সাতক্ষীরা</a></li>
        </ul>
    </div>
    <div data-role="collapsible" data-theme="e" data-content-theme="d">
        <h3>রাজশাহি</h3>


        <ul>

            <li><a href="#" value="18" class="dis_design">বগুড়া</a></li>
            <li><a href="#" value="19" class="dis_design">জয়পুরহাট</a></li>
            <li><a href="#" value="20" class="dis_design">নওগাঁ</a></li>
            <li><a href="#" value="21" class="dis_design">নাটোর</a></li>
            <li><a href="#" value="22" class="dis_design">নবাবগঞ্জ</a></li>
            <li><a href="#" value="23" class="dis_design">পাবনা</a></li>
            <li><a href="#" value="24" class="dis_design">রাজশাহী</a></li>
            <li><a href="#" value="25" class="dis_design">সিরাজগঞ্জ</a></li>
        </ul>
    </div>
    <div data-role="collapsible" data-theme="e" data-content-theme="d">
        <h3>বরিশাল</h3>


        <ul>

            <li><a href="#" value="34" class="dis_design">বরগুনা</a></li>
            <li><a href="#" value="35" class="dis_design">বরিশাল</a></li>
            <li><a href="#" value="36" class="dis_design">ভোলা</a></li>
            <li><a href="#" value="37" class="dis_design">ঝালকাঠি</a></li>
            <li><a href="#" value="38" class="dis_design">পটুয়াখালী</a></li>
            <li><a href="#" value="39" class="dis_design">পিরোজপুর</a></li>
        </ul>
    </div>
    <div data-role="collapsible" data-theme="e" data-content-theme="d">
        <h3>রংপুর</h3>


        <ul>

            <li><a href="#" value="26" class="dis_design">দিনাজপুর</a></li>
            <li><a href="#" value="27" class="dis_design">গাইবান্ধা</a></li>
            <li><a href="#" value="28" class="dis_design">কুড়িগ্রাম</a></li>
            <li><a href="#" value="29" class="dis_design">লালমনিরহাট</a></li>
            <li><a href="#" value="30" class="dis_design">নীলফামারী</a></li>
            <li><a href="#" value="31" class="dis_design">পঞ্চগড়</a></li>
            <li><a href="#" value="32" class="dis_design">রংপুর</a></li>
            <li><a href="#" value="33" class="dis_design">ঠাকুরগাঁও</a></li>
        </ul>
    </div>

</div>
