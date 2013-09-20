<?php
define('IN_SK',true);	
require('../../includes/init.php');	
require('../../lib/lib_right.php');
require('../../FCKeditor/fckeditor.php') ;
require ('../../lib/lib_chilren.php');
if( empty($_SESSION['admin_id']) ){
	header('Location: ../../login.php');
	exit();
}

$pic_doc = 'children';
$attachdir = "../../../uploadfiles/".$pic_doc."/";

$get_child_id = isset($_GET["child_id"]) ? $_GET["child_id"] : "";

if(empty($get_child_id))
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
   	
	if($get_child_id != '')
	{
			$child_info = search_byCid($get_child_id);
			foreach($child_info as $k=>$v)
			{
				$child_name_en = $v['name_en'];
				$child_name_cn = $v['name_cn'];
				$child_photo1 = $v['pic1'];
				$child_photo2 = $v['pic2'];
				$child_photo3 = $v['pic3'];
				$child_add_time = $v['dateline'];
			}	
	}
	
?>
<form method="post" enctype="multipart/form-data" name="modify_child" id="modify_child">
<table width="100%" border="0" cellspacing="0" cellpadding="0">
  <tr>
    <td width="5" height="31" background="../../images/i_m_t.jpg">&nbsp;</td>
    <td width="972" background="../../images/i_m_t.jpg">
    孩子中心&gt;&gt;
    <a href="children_list.php" id="module_link">孩子列表</a>
    &gt;&gt;修改孩子信息</td>
  </tr>
  <tr>
    <td>&nbsp;</td>
    <td>
    
      <table width="98%" border="0" align="center" cellpadding="0" cellspacing="0">
      
       <tr>
          <td width="20%" height="20" align="right">孩子姓名(简体中文)：</td>
          <td width="80%" height="30"><label>
            <input name="name_cn" type="text"  value="<?php echo $child_name_cn; ?>" class="input_add" >
          </label></td>
        </tr>
        
        
        
        <tr>
          <td width="20%" height="20" align="right">孩子姓名(英文)：</td>
          <td width="80%" height="30"><label>
            <input name="name_en" type="text"  value='<?php echo $child_name_en; ?>' class="input_add" >
          </label></td>
        </tr>

       
        <tr>
          <td height="25" align="right">日期：</td>
          <td height="30"><input type="text" name="add_time" id="add_time" onFocus="HS_setDate(this)" readonly="readonly" value="<?php echo $child_add_time;?>" />          </td>
        </tr>
        
       <tr>
          <td height="10" align="right">图片1:</td>
          <td height="30">
		  <a href="<?php echo $attachdir.$child_photo1?>" target="_blank" id="module_link"><?php echo $child_photo1?></a><br>
          <input name="photo1[]" type="file" size="40">
          ('gif', 'jpg','jpeg','png',Size:478*281px)
          <input type="hidden" name="child_photo1" value="<?php echo $child_photo1;?>" /></td>
        </tr>
       
       
       <tr>
          <td height="10" align="right">图片2:</td>
          <td height="30">
		  <a href="<?php echo $attachdir.$child_photo2?>" target="_blank" id="module_link"><?php echo $child_photo2?></a><br>
          <input name="photo2[]" type="file" size="40">
          ('gif', 'jpg','jpeg','png',Size:158*84px)
          <input type="hidden" name="child_photo2" value="<?php echo $child_photo2;?>" /></td>
        </tr>
       
       <tr>
          <td height="10" align="right">图片3:</td>
          <td height="30">
		  <a href="<?php echo $attachdir.$child_photo3?>" target="_blank" id="module_link"><?php echo $child_photo3?></a><br>
          <input name="photo3[]" type="file" size="40">
          ('gif', 'jpg','jpeg','png',Size:158*84px)
          <input type="hidden" name="child_photo3" value="<?php echo $child_photo3;?>" /></td>
        </tr>
       
      

        <tr>
          <td height="20">&nbsp;</td>
          <td height="30">
            <input type="submit" name="submit" id="modify_child" value="保存" />
            <input type="hidden" name="action" value="modify_child" />          </td>
        </tr>   
      </table>  
    </td>
  </tr>
</table> 
</form> 
<?php
	}
	elseif($action == 'modify_child')
	{
	  if(!empty($get_child_id) )
	  {	
	  	  $attachment = ($attachments_arg = attach_upload(array('gif','jpg','jpeg','png'), 'photo1')) ? 1 : 0;
		  if($attachment)
		  {
		  		$pic1 = $attachments_arg[0]['attachment'];
				@unlink($attachdir.$param['child_photo1']);
				$db->query("UPDATE ".$ea->table('children')." SET pic1='".$pic1."' WHERE child_id='$get_child_id'");
		  }

		  $attachment = ($attachments_arg = attach_upload(array('gif','jpg','jpeg','png'), 'photo2')) ? 1 : 0;
		  if($attachment)
		  {
				$pic2= $attachments_arg[0]['attachment'];
				@unlink($attachdir.$param['child_photo2']);
				$db->query("UPDATE ".$ea->table('children')." SET pic2='".$pic2."' WHERE child_id='$get_child_id'");
		  }
				  
		  $attachment = ($attachments_arg = attach_upload(array('gif','jpg','jpeg','png'), 'photo3')) ? 1 : 0;
		  if($attachment)
		  {
		  		$pic3= $attachments_arg[0]['attachment'];
		  		@unlink($attachdir.$param['child_photo3']);
		  		$db->query("UPDATE ".$ea->table('children')." SET pic3='".$pic3."' WHERE child_id='$get_child_id'");
		  }
		 	
		  $back_data = $db->query("UPDATE ".$ea->table('children')." SET name_en='".$param['name_en']."', name_cn='".$param['name_cn']."', dateline='".$param['add_time']."' WHERE child_id='$get_child_id'");
		  if( $back_data )
		  {
		  	show_msg('修改成功','children_list.php');
		  }
		  else
		  {
			 show_msg('请重试','children_list.php');
		  }
	  }
	}
?>
</body>
</html>
