<?php
define('IN_SK',true);
require_once('./includes/init.php');
require_once('./includes/pager.php');
?>
<div class="pop_reg">
<div class="w">
<a href="javascript:;" class="popClose fr"><img src="image/close.jpg" /></a>
</div>
<div id="p1">
<div class="fl pl15 pt20 pb20 f16 w300">
    <table cellpadding="0" cellspacing="0" border="0" class="pro_support pop_reg_table mb20 drophack-2">
    <tr><td>会员账号</td><td><input type="text" class="comm-text" value="请填写您的称呼" id="username"/></td></tr>
    <tr><td>会员密码</td><td><input type="password" class="comm-text" id="password"/></td></tr>
    <tr><td>确认密码</td><td><input type="password" class="comm-text" id="commpassword"/></td></tr>
    <tr><td valign="top">会员类型</td>
    	<td>
        <ul class="checkbox ol pr" comment="utype">
            <li rel="1" hide="showcharge" class="on">基本会员</li>
            <li rel="2" >赞助会员</li>
            <li rel="3" >终身会员</li>
        </ul>
         <input type="hidden" id="utype" value="0" />
         
         <div id="showcharge" class="dropdownlist card cardtoothercharge none" comment="othercharge" dtype="rel" style="z-index:10;">
         <span class="title"><span class="show">关注宝宝</span></span>
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
    
   	<tr><td>姓&nbsp;&nbsp;&nbsp;&nbsp;名</td><td><input type="text" class="comm-text" value="请填写您的称呼" id="truename"/></td></tr>
    <tr><td>性&nbsp;&nbsp;&nbsp;&nbsp;别</td><td><ul class="checkbox" comment="usex">
    <li class="on fl pr10" rel="0">男</li><li class="fl" rel="1">女</li></ul><input type="hidden" id="usex" value="0" /> </td></tr>
    
    <tr><td>证件类型</td><td><div class="dropdownlist card" comment="card" style="z-index:10;"><span class="title"><span class="show">身份证</span></span>
    <ul><li>身份证</li><li>护照</li></ul>
    <input type="hidden" id="card" name="card" value="身份证" />
    </div></td></tr>
    <tr><td>证件号码</td><td><input type="text" class="comm-text" value="请填写您的证件信息" id="cardnumber"/></td></tr>
    <tr><td>国&nbsp;&nbsp;&nbsp;&nbsp;籍</td><td><div class="dropdownlist card" comment="country" style="z-index:9;"><span class="title"><span class="show">国籍</span></span>
    <ul><li>中国</li><li>其他</li></ul>
    <input type="hidden" id="country" name="country" value="" />
    </div></td></tr>
    <tr><td>宗教信仰</td><td><div class="dropdownlist card" style="z-index:8;" comment="religion"><span class="title"><span class="show">宗教信仰</span></span>
    <ul><li>基督教</li><li>天主教</li><li>回教</li><li>佛教</li><li>道教</li><li>无</li><li>其他</li></ul>
    <input type="hidden" id="religion" name="religion" value="" />
    </div></td></tr>
    <tr><td>教育程度</td><td>
    <div class="dropdownlist card" style="z-index:7;" comment="educate"><span class="title"><span class="show">教育程度</span></span>
    <ul><li>硕士以上</li><li>硕士</li><li>大学</li><li>大专</li><li>高中</li><li>中学</li><li>小学</li><li>其他</li></ul>
    <input type="hidden" id="educate" name="educate" value="" />
    </div>
    </td></tr>
    <tr><td>电子邮件</td><td><input type="text" class="comm-text" value="请填写您的电子邮件" id="email"/></td></tr>
    <tr><td>联系电话</td><td><input type="text" class="comm-text" value="请填写您的联系电话" id="phone" /></td></tr>
    </table>
    
    <div class="pt15">
    <a href="javascript:;" ><img src="image/submit2.jpg" name="donatesubmit" width="120" height="35" border="0" id="regsubmit"/></a></div>
    </div>
    
<div class="fl pt20 pl20 w350 f14">
    	
    <p class="pb15"><img src="image/reg_terms.jpg" /></p>
    <p class="pb20"><img src="image/thanks.jpg" /></p> 
    <p>
    	<pre>
会员费为：
1. 基本会员：选择某一个孩子关心：每年人民币600元
（平均每月50元）
2. 赞助会员：关注所有孩子：每年人民币6000元
3. 终身会员：关注所有孩子，一次性奉献人民币60,000元。

目前本中心只接受银行转账方式，因此请详细查看以下信息，
以免发生错误。
我们将在接受到您的捐赠信息后7天内与您进行电话联系
确认详细信息。
开户银行：浦发银行商城路支行
银行账号：6225220112279088
开户者：汪薇 
如您选择邮寄现金或支票的方式，请邮寄至以下地址： 
上海市浦东新区森林村森塘路西凌家宅29号（靠近地铁二号
线远东大道站）
邮编:201202
        
        </pre>
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
<!-- error  end-->

</div>