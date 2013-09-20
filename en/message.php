<?php
define('IN_SK',true);
require_once('../includes/init.php');
require_once('../includes/pager.php');
?>
<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01//EN" "http://www.w3.org/TR/html4/strict.dtd">
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
<title>家百浓-爱心赠言</title>
<meta name="keywords" content="孩子"/> 
<meta name="description" content="孩子的健康和未来,爱心赠言"/>
<link type="text/css" rel="stylesheet" href="css/base.css" />
<link type="text/css" rel="stylesheet" href="css/style.css" />
<link type="text/css" rel="stylesheet" href="css/jScrollPane.css" />
</head>
<body class="bg2">
<?php
	$navNum = 6;
	include "head.php"; 
?>
<div class="w">
<div class="w960 pr">
    <div class="tags about png"><div class="tags-content png"><ul><li><a href="donate.php"><img src="image/tags/into_01.png" class="png"/></a></li><li><a href="pro_support.php"><img src="image/tags/into_02.png" class="png"/></a></li><li class="tagon"><a href="message.php"><img src="image/tags/into_03.png"  class="png"/></a></li></ul></div><div class="tags-right png"></div></div> 
</div>
</div>

<div class="w bgfff">
<div id="content">
<div class="w970 ol pt20 pb10">
	<div class="fl pl165 pt30 pb20 w530">
        <!--<p class="fi pb50 w300 f14">你的关爱是对孩子最大的帮助，您的鼓励是对我们工作最大的支持，短短几句话，也是您的一份爱心捐助
在这里留下您的爱吧</p>-->
	<p class="fi pb50 w400 f16">爱心来自于心，一句用心的祝福，一个真心的拥抱，一次温暖的抚摸，一天与孩子交心的互动，一小时与孩子平和的交流...我们看重您由心而发的爱，没有形式，没有解释，没有比较，有的就是那一份简单的爱。
	</p>
        <table cellpadding="0" cellspacing="0" border="0" class="pro_support mb20 f14">
    <tr><td>昵&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;称</td><td><input type="text" class="comm-text" value="请填写您的称呼" id="uname" /></td></tr>
    <tr><td valign="top">爱心赠言</td><td><textarea class="comm-textarea comm2" id="word" >请在此填写您的爱心……</textarea>
    <a href="javascript:void(0)"><img src="image/submit_word.jpg" id="wordsubmit" /></a></td></tr>
    </table> 
    
    <!--<div class="pt40 fl f14">
    	<p>家百浓儿童中心感谢您的爱心捐赠，目前本中心只接受银行转账方式，<br />因此请详细查看以下信息，以免发生错误。<br />我们将在接受到您的捐赠信息后7天内与您进行电话联系确认详细信息。</p>
        <p class="pt10">
        开户银行：浦发银行商城路支行<br />
        银行账号：6225220112279088<br />
        开户者：汪薇
        </p>
        <p class="pt10">
        如您选择邮寄现金或支票的方式，请邮寄至以下地址：
        </p>
        <p >
        上海市浦东新区森林村森塘路西凌家宅29号（靠近地铁二号线远东大道站）<br />邮编:201202<br />
        </p>
    </div>-->
    </div>
    <div class="fr word">
        	<div class="tc f12">爱心小黑板</div>
            <ul class="wlist f12">
            <?php
			$all_date_num = page_1::page_all_num("message"," WHERE umessage_".$lang."<>''");
			$perpage = 3;
			$page = isset($_GET['page']) ? $_GET['page'] : 1 ;
			$offset = ($page - 1) * $perpage;
			$multipage = multi_cn($all_date_num, $perpage, $page, "message.php");
			
			$strPage= "message.php?page=";
			
			$params = array(
         	'total_rows'=>$all_date_num, 
            'method'    =>'html', 
            'parameter' =>$strPage.'!',  
            'now_page'  =>$_GET['page'], 
            'list_rows' =>3,
			);
			$page = new Core_Lib_Page($params);

			$myquery = $db->query("SELECT message_id, uname,umessage_".$lang." as message FROM ".$ea->table('message')." ORDER BY dateline Desc LIMIT $offset, $perpage");
				while($thisB = $db->fetch_array($myquery)) {
		?>
            	<li><?php echo $thisB['uname']; ?>说：<br/>
				<?php echo cut_str($thisB['message'],40); ?>
                </li>
	    <?php
        }
		$thisB = null;
		$myquery= null;
		$db->close();
	  	?>  
            </ul>
            <div class="w page pb20 pt15 page">
	 		<?php echo $page->show(2);?>
    </div>
    </div>

</div>
</div>
 <!-- result -->
  <div class="w650 ol pt50 pb50 tc none" id="result">
	<img src="image/into_mes.jpg" border="0" usemap="#Map" class="mau" />
    <map name="Map">
      <area shape="rect" coords="252,139,307,162" href="message.php">
      <area shape="rect" coords="490,16,512,39" href="message.php">
    </map>
 </div>
 <!-- result end -->
<!-- error -->
<div class="w650 ol pt50 pb50 tc none" id="error">
	<img src="image/info_error.jpg" border="0" usemap="#Map2" class="mau" />
    <map name="Map2">
      <area shape="rect" coords="175,139,225,158" class="curp" href="#">
      <area shape="rect" coords="362,16,382,37" class="curp" href="#">
    </map>
 </div>
<!-- error  end-->



</div>





<div class="w ol pb50 pt10 tags-bottom">
<div class="cb mau w960">
    	<a href="" class="png fr"><img src="image/social_media_sina.png" class="png" /></a>
</div>
</div>
<!-- footer -->
<?php
	include "foot.php"; 
?>
<!-- footer -->
</body>
</html>
<script language="javascript" src="script/jquery-1.5.1.min.js" type="text/javascript"></script>
<script language="javascript" src="script/common.js" type="text/javascript"></script>
<script language="javascript" src="script/action.js" type="text/javascript"></script>
<script language="javascript" src="script/jScrollPane.js" type="text/javascript"></script>
<script language="javascript" src="script/jquery.mousewheel.js" type="text/javascript"></script>
<script language="javascript">
$(function(){
	$(".right_jpannel").jScrollPane({dragMaxHeight:13,scrollbarWidth:15});
	bindWord();
	bindErrorBtn();
});
</script>
<!--[if IE 6]>
<script language="javascript" src="script/DD_belatedPNG.js"></script>
<script>
	DD_belatedPNG.fix('.png,.menu li a');
    document.execCommand("BackgroundImageCache",false,true);
</script>
<![endif]-->