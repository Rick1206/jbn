<?php
/**
 * add children information
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
require('../../FCKeditor/fckeditor.php') ;
if( empty($_SESSION['admin_id']) ){
	header('Location: login.php');
	exit();
}
$pic_doc = 'children';
$attachdir = "../../../uploadfiles/".$pic_doc."/";
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
   // to add children information
   $action = isset($param["action"]) ? $param["action"] : "";
   if(empty($action))
   {
	
?>
<form method="post" enctype="multipart/form-data" name="add_children" id="add_children">
<table width="100%" border="0" cellspacing="0" cellpadding="0">
  <tr>
    <td width="5" height="31" background="../../images/i_m_t.jpg">&nbsp;</td>
    <td width="972" background="../../images/i_m_t.jpg">
    成长日记&gt;&gt;<a href="children_list.php" id="module_link">孩子列表</a>&gt;&gt;添加孩子</td>
  </tr>
  <tr>
    <td>&nbsp;</td>
    <td>
      <table width="98%" border="0" align="center" cellpadding="0" cellspacing="0">
        
        <tr>
          <td width="20%" height="20" align="right">孩子姓名(中文)：</td>
          <td width="80%" height="30"><label>
            <input name="title_cn" type="text" class="input_add" />
          </label></td>
        </tr>
        
        <tr>
          <td width="20%" height="20" align="right">孩子姓名(英文)：</td>
          <td width="80%" height="30"><label>
            <input name="title_en" type="text" class="input_add" />
          </label></td>
        </tr>
        
    
        
       <tr>
          <td height="20" align="right">图片1:</td>
          <td height="30"><input name="photo1[]" type="file" size="40"> 
          ('gif','jpg','jpeg','png',Size:256*177px)</td>
        </tr>
        
        <tr>
          <td height="20" align="right">图片2:</td>
          <td height="30"><input name="photo2[]" type="file" size="40"> 
          ('gif','jpg','jpeg','png',Size:256*177px)</td>
        </tr>
        
        <tr>
          <td height="20" align="right">图片3:</td>
          <td height="30"><input name="photo3[]" type="file" size="40"> 
          ('gif','jpg','jpeg','png',Size:256*177px)</td>
        </tr>
           
        <tr>
          <td height="20">&nbsp;</td>
          <td height="30">
            <input type="submit" name="submit" id="add_children" value="保存" />
            <input type="hidden" name="action" value="add_children" />            </td>
        </tr>
      </table>
    </td>
  </tr>
</table> 
</form>
<?php
	}
	elseif($action == 'add_children')
	{
	
		$attachment_s = ($attachments_arg_s = attach_upload(array('gif','jpg','jpeg','png'), 'photo1')) ? 1 : 0;
		if($attachment_s){
			
			$pic1 = $attachments_arg_s[0]['attachment'];
			
		   $attachment_s = ($attachments_arg_s = attach_upload(array('gif','jpg','jpeg','png'), 'photo2')) ? 1 : 0;
			if($attachment_s){
				$pic2 = $attachments_arg_s[0]['attachment'];
			}else{
				$pic2 ="";
			}
			
			$attachment_s = ($attachments_arg_s = attach_upload(array('gif','jpg','jpeg','png'), 'photo3')) ? 1 : 0;
			
			if($attachment_s){
				$pic3 = $attachments_arg_s[0]['attachment'];
			}else{
				$pic3 ="";
			}
			
			$back_data = $db->query("INSERT INTO ".$ea->table('children')." (name_cn, name_en, pic1, pic2, pic3, dateline) VALUES ('".
			$param['title_cn']."','".$param['title_en']."','".$pic1."','".$pic2."', '".$pic3."', '".date("Y-m-d H:i:s")."')");
			if($back_data)
			{
				show_msg('添加成功','children_add.php');  
			}
			else
			{
				show_msg('请重试','children_add.php');
			}
			
			} else {
				show_msg('图片上传失败!','children_add.php');
		}
	}
?>   
</body>
</html>
