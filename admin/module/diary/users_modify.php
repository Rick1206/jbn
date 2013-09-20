<?php
/**
 * modify news information
 * ============================================================================
 * powered by Rick
 * http://www.digitalcn.net
 * ----------------------------------------------------------------------------
 * $Author: Rick Shi  
 * $email:1491361147@qq.com
 *
*/
define('IN_SK',true);	
require('../../includes/init.php');	
require('../../lib/lib_right.php');
require('../../FCKeditor/fckeditor.php') ;
if( empty($_SESSION['admin_id']) ){
	header('Location: ../../login.php');
	exit();
}

$pic_doc = 'news';
$attachdir = "../../../uploadfiles/".$pic_doc."/";

$get_userid = isset($_GET["userid"]) ? $_GET["userid"] : "";
if(empty($get_userid))
{
	header('Location: ../../login.php');
	exit();
}
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title><?php echo $system_name;?></title>
<link rel="stylesheet" href="../../style/module.css" />
<script src="../../../js/j132m.js" language="javascript"></script>
<script src="../../js/contorl_module.js" language="javascript"></script>
<script src="../../js/time_cn.js" language="javascript"></script>
</head>
<body>
<?php
   $action = isset($param["action"]) ? $param["action"] : "";
   if(empty($action))
   {
	if($get_userid != '')
	{
			$sql = 'SELECT * FROM '.$ea->table('users'). 'WHERE userid='.$get_userid;
			$user_info = $db->getAll($sql);
			foreach($user_info as $k=>$v)
			{
				$user_name = $v['username'];
				$user_status = $v['status'];
				
				$user_type = $v['typeid'];
				$user_sex = $v['usex'];
				$user_card_type = $v['utype'];
				$user_card = $v['ucard'];
				$user_country = $v['ucountry'];
				
				$user_belief = $v['ubelief'];
				$user_edu = $v['uedu'];
				$user_country = $v['ucountry'];
				
				$user_email = $v['uemail'];
				$user_contact = $v['ucontact'];

			}	
	}
	
?>
<form method="post" enctype="multipart/form-data" name="modify_news" id="modify_news">
<table width="100%" border="0" cellspacing="0" cellpadding="0">
  <tr>
    <td width="5" height="31" background="../../images/i_m_t.jpg">&nbsp;</td>
    <td width="972" background="../../images/i_m_t.jpg">
    家百浓会员&gt;&gt;
    <a href="users_list.php" id="module_link">会员列表</a>
    &gt;&gt;修改会员信息</td>
  </tr>
  <tr>
    <td>&nbsp;</td>
    <td>
    
      <table width="98%" border="0" align="center" cellpadding="0" cellspacing="0">
      
      <tr>
          <td height="20" align="right">审核状态：</td>
          <td height="30">
            <select name="users_status">
			   <option <?php echo ($user_status) ? " selected=\"selected\"" : "";?> value='0' />否</option>
			   <option <?php echo ($user_status) ? " selected=\"selected\"" : "";?> value='1' />是</option>
            </select>
          </td>
        </tr>

        <tr>
          <td height="25" align="right">会员姓名：</td>
          <td height="30">
          <?php echo $user_name;?>
          </td>
        </tr>
        
        <tr>
          <td width="20%" height="20" align="right">会员类型：</td>
          <td width="80%" height="30">
          	<?php echo $_user_type[$user_type];?>
          </td>
        </tr>
        
        <tr>
          <td width="20%" height="20" align="right">会员性别：</td>
          <td width="80%" height="30">
          	<?php echo ($user_sex==false) ? "男":"女";?>
          </td>
        </tr>
        
        <tr>
          <td width="20%" height="20" align="right">证件类型：</td>
          <td width="80%" height="30">
          	<?php echo $user_card_type;?>
          </td>
        </tr>
        
        <tr>
          <td width="20%" height="20" align="right">证件号码：</td>
          <td width="80%" height="30">
          	<?php  echo $user_card;?>
          </td>
        </tr>
        
         <tr>
          <td width="20%" height="20" align="right">国籍：</td>
          <td width="80%" height="30">
          	<?php  echo $user_country;?>
          </td>
        </tr>
        
         <tr>
          <td width="20%" height="20" align="right">宗教信仰：</td>
          <td width="80%" height="30">
          	<?php  echo $user_belief;?>
          </td>
        </tr>
        
         <tr>
          <td width="20%" height="20" align="right">教育程度：</td>
          <td width="80%" height="30">
          	<?php  echo $user_edu;?>
          </td>
        </tr>
        
        <tr>
          <td width="20%" height="20" align="right">电子邮件：</td>
          <td width="80%" height="30">
          	<?php  echo $user_email;?>
          </td>
        </tr>
        
        <tr>
          <td width="20%" height="20" align="right">联系方式：</td>
          <td width="80%" height="30">
          	<?php  echo $user_contact;?>
          </td>
        </tr>
        
       
        <tr>
          <td height="20">&nbsp;</td>
          <td height="30">
            <input type="submit" name="submit" id="modify_news" value="保存" />
            <input type="hidden" name="action" value="modify_news" />          </td>
        </tr>  
        
        
         
      </table>  
    </td>
  </tr>
</table> 
</form> 
<?php
	}
	elseif($action == 'modify_news')
	{
	  if(!empty($get_userid) )
	  {	
	  	
		  $back_data = $db->query("UPDATE ".$ea->table('users')." SET status='".$param['users_status']."' WHERE userid='$get_userid'");
		  
		  if( $back_data )
		  {
		  	show_msg('修改成功','users_list.php');
		  }
		  else
		  {
			 show_msg('请重试','users_list.php');
		  }
	  }
	}
?>
</body>
<script language="javascript" src="../../script/jquery-1.5.1.min.js" type="text/javascript"></script>
<script language="javascript" src="../../script/jquery-ui-1.8.20.custom.min.js" type="text/javascript" ></script>
<script language="javascript" src="../../script/ui/i18n/jquery.ui.datepicker-zh-CN.js" type="text/javascript" ></script>
<script language="javascript" type="text/javascript">
	
$(function(){
	$('#add_time').datepicker();
	//alert(3);							
});
</script>
</html>
