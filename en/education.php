<?php
define('IN_SK',true);
require_once('../includes/init.php');
require_once('../includes/pager.php');
?>
<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01//EN" "http://www.w3.org/TR/html4/strict.dtd">
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
<title>Forever Love - Education</title>

<meta name="keywords" content="孩子"/> 
<meta name="description" content="孩子的健康和未来,成长日记,孩子教养"/>

<link type="text/css" rel="stylesheet" href="css/base.css" />
<link type="text/css" rel="stylesheet" href="css/style.css" />
<link type="text/css" rel="stylesheet" href="css/jScrollPane.css" />
</head>
<body>
<?php
	$navNum = 4;
	include "head.php"; 
?>
<div class="w970 pr"><a class="gback" href="index.php"></a></div>
<div class="w bgfff">
<div class="w970 ol pt20 pb10">	
	<div class="w650 fl">
    	<div class="pr">
        <div id="h_panel">
        <ul class="w800">
        <?php
		
		$all_date_num = page_1::page_all_num("education"," WHERE title_".$lang."<>''");
			$perpage = 2;
			$page = isset($_GET['page']) ? $_GET['page'] : 1 ;
			$offset = ($page - 1) * $perpage;
			$multipage = multi_cn($all_date_num, $perpage, $page, "education.php");
			//paper显示层
			$strPage= "education.php?page=";
			$params = array(
			'total_rows'=>$all_date_num, 
            'method'    =>'html', 
            'parameter' =>$strPage.'!',  
            'now_page'  =>$_GET['page'], 
            'list_rows' =>2,
			);
			$page = new Core_Lib_Page($params);
		
		
		$myquery = $db->query("SELECT education_id, photo, dateline, intro_".$lang." as intro, title_".$lang." as title FROM ".$ea->table('education')." ORDER BY dateline Desc LIMIT $offset, $perpage");
		while($thisB = $db->fetch_array($myquery)) {
		?>
        <li>
        	<table cellpadding="0" cellspacing="0" border="0">
            	<tr><td><img src="<?php echo $file_dir."/education/".$thisB['photo']; ?>" /></td>
                <td>
                <div class="p30">
                <strong class="f16 font-agreen"><?php echo $thisB['title'];?></strong>
                <p class="pt5 pb5 f14"><?php echo $thisB['intro'];?></p>
                <a href="education_detail.php?education_id=<?php echo $thisB['education_id']; ?>" class="font-aorange fr f14 fi">More …</a>
                </div>
                </td>
                </tr>            
            </table>
        </li>
        <?php
        }
   		 ?>
       
            
        </ul>
        
        </div>
        
      <div class="w970 page pb20 pt15 pr"> 
        <?php echo $page->show(4);?>
         </div>
        
        </div>
    </div>
      
   <!-- <div class="edu_new mt30">
     
    	<strong>课程名称：</strong>小小观察者<br/>
<strong>主讲导师：</strong>Cindy<br/>
<strong>课程时间：</strong>2012.3.27  14:00~16:00<br/>
<strong>地址：</strong>上海市浦东区川沙<br/>
<strong>报名电话：</strong>021-9999999<br/>
<strong>课程内容：</strong>婴儿刚出生的几个月正试着适应外部世界。在这一关键阶段，让宝宝们感到安全并受到保护是最为重要的，从而让他们更好地学习与人建立联系。
    </div>-->
</div>
</div>
<div class="w960 ol pt20 pb50">
	<a class="fr"><img src="image/social_media_sina.png" /></a>   
</div>
<?php
	include "foot.php"; 
?>
</body>
</html>
<script language="javascript" src="script/jquery-1.5.1.min.js" type="text/javascript"></script>
<script language="javascript" src="script/common.js" type="text/javascript"></script>
<script language="javascript" src="script/action.js" type="text/javascript"></script>
<script language="javascript" src="script/jScrollPane.js" type="text/javascript"></script>
<script language="javascript" src="script/jquery.mousewheel.js" type="text/javascript"></script>
<script language="javascript" src="script/jquery.mousewheel.js" type="text/javascript"></script>
<script language="javascript" src="script/jquery.onImagesLoad.min.js" type="text/javascript"></script>
<script language="javascript">
$(function(){	
	/*$("#h_panel").onImagesLoad({ 
		selectorCallback: selectorImagesLoaded()
	}); 
	function selectorImagesLoaded()
	{
		$("#h_panel").jScrollPane({dragMaxHeight:13,scrollbarWidth:15,scrollbarMargin:0});	
	}*/
});
</script>