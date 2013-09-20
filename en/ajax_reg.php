<?php
define('IN_SK',true);
require_once('../includes/init.php');
?>
<div class="pop_reg">
<div class="w">
<a href="javascript:;" class="popClose fr"><img src="image/close.jpg" /></a>
</div>
<div id="p1">
<div class="fl pl15 pt20 pb20 f13 w300">
    <table cellpadding="0" cellspacing="0" border="0" class="pro_support pop_reg_table mb20 drophack-2">
    <tr><td width="113">Member ID</td><td><input type="text" class="comm-text" value="Enter your Member ID" id="username"/></td></tr>
    <tr><td>Member password</td><td><input type="password" class="comm-text" id="password"/></td></tr>
    <tr><td>Confirm password</td><td><input type="password" class="comm-text" id="commpassword"/></td></tr>
    <tr><td valign="top">Membership type</td>
    	<td>
        <ul class="checkbox ol pr f12" comment="utype">
            <li rel="1" hide="showcharge" class="on">Basic membership</li>
            <li rel="2" >Sponsoring membership</li>
            <li rel="3" >Lifetime membership</li>
        </ul>
         <input type="hidden" id="utype" value="0" />
         
        <div id="showcharge" class="dropdownlist card cardtoothercharge none" comment="othercharge" dtype="rel" style="z-index:11;">
         <span class="title"><span class="show">Baby</span></span>
    	<ul>
    	<?php
    	$query = $db->query("SELECT * FROM ".$ea->table('children'));
		while($thisB = $db->fetch_array($query)) {
    	 ?>
    	<li rel="<?php echo $thisB['child_id']; ?>"><?php echo $thisB["name_cn"]; ?></li>
        <?php 
		}
        ?>
    </ul>
    <input type="hidden" id="othercharge" name="othercharge" value="0" />
    </div>
        </td></tr>
    
   	<tr><td>Name</td><td><input type="text" class="comm-text" value="Enter your Name" id="truename"/></td></tr>
    <tr><td>Gender</td><td><ul class="checkbox" comment="usex">
    <li class="on fl pr10" rel="0">Male</li><li class="fl" rel="1">Female</li></ul><input type="hidden" id="usex" value="0" /> </td></tr>
    
    <tr><td>Type of ID</td><td><div class="dropdownlist card" comment="card" style="z-index:10;"><span class="title"><span class="show">Identity card</span></span>
    <ul><li>Identity card</li><li>Passport</li></ul>
    <input type="hidden" id="card" name="card" value="身份证" />
    </div></td></tr>
    <tr><td>ID No. </td><td><input type="text" class="comm-text" value="Enter your ID No." id="cardnumber"/></td></tr>
    <tr><td>Nationality</td><td><div class="dropdownlist card" comment="country" style="z-index:9;"><span class="title"><span class="show">Nationality</span></span>
    <ul><li>China</li><li>Others</li></ul>
    <input type="hidden" id="country" name="country" value="" />
    </div></td></tr>
    <tr><td>Faith</td><td><div class="dropdownlist card" style="z-index:8;" comment="religion"><span class="title"><span class="show">Faith</span></span>
    <ul><li>Christian</li><li>Catholicism</li><li>Islam</li><li>Buddhism</li><li>Taoism</li><li>None</li><li>Others</li></ul>
    <input type="hidden" id="religion" name="religion" value="" />
    </div></td></tr>
    <tr><td>Education</td><td>
    <div class="dropdownlist card" style="z-index:7;" comment="educate"><span class="title"><span class="show">Education</span></span>
    <ul><li>Master or above</li><li>Master</li><li>University</li><li>College</li><li>High School</li><li>Middle School</li><li>Primary School</li><li>Others</li></ul>
    <input type="hidden" id="educate" name="educate" value="" />
    </div>
    </td></tr>
    <tr><td>Email</td><td><input type="text" class="comm-text" value="Enter your email" id="email"/></td></tr>
    <tr><td>Tel</td><td><input type="text" class="comm-text" value="Enter your tel" id="phone" /></td></tr>
    </table>
    
    <div class="pt15">
    <a href="javascript:;" ><img src="image/submit2.jpg" name="donatesubmit" width="120" height="35" border="0" id="regsubmit"/></a></div>
    </div>
    
<div class="fl pt20 pl20 w350 f12">
    	
    <p class="pb5 font-agreen f24">Detail for membership register</p>
    <p class="pb10 font-green f16 lh100">Forever Love Children Center is grateful for your membership.</p> 
    <p>Membership fees:</p>
    <ol class="ol-decimal" style="padding-top:10px; padding-bottom:8px;">
<li style="padding-bottom:0">
Basic membership: you can provide your care and support to a 
    child and each year the fee is  RMB 600( RMB 50 per month)
</li>
<li style="padding-bottom:0">
Sponsoring membership:  Care and support all the children and 
    the fee is  RMB 6,000 .
</li>
<li style="padding-bottom:0">
Lifetime membership: Care and support all the children and you 
    should make one-off donation of RMB 60,000.
</li>
</ol>

<p class="pb10">
Thank you for your donation. At this moment, for cash donations, Forever Love Children Center only accepts bank wiring. Please use the following bank account information carefully to prevent any error. We will confirm with you within 7 days after receiving your donation.
</p>
<p class="pb10">
Bank Name: <br/>
Shanghai Pudong Development Bank, Shang-Cheng Road Branch  <br/>
Bank Account: 6225220112279088  <br/>
Name of the Account: Wang Wei
</p>
<p>
If you want to send cash or check to us, please send to:  
No. 29 Xi Ling Jia Zhai, Sen-Tang Road, Sen-Lin Village, Pudong New District, Shanghai (near Yuandong Avenue Station of Metro Line 2)Postal code: 201202
</p>


</div>
    
</div>

<div class="w650 ol pt50 pb50 tc none" id="error">
	<img src="image/info_error.jpg" border="0" usemap="#Map2" class="mau" />
    <map name="Map2">
      <area shape="rect" coords="175,139,225,158" class="curp" href="#">
      <area shape="rect" coords="362,16,382,37" class="curp" href="#" >
    </map>
</div>

</div>