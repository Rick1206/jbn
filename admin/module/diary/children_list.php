<?php
define('IN_SK',true);
require('../../includes/init.php');	
require('../../lib/lib_right.php');

if( empty($_SESSION['admin_id']) ){
	header('Location: ../../login.php');
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
		if(!@$param["del_children"])
		{
	?>
<table width="100%" border="0" cellspacing="0" cellpadding="0">
  <form id="form2" name="form2" method="get" action="children_list.php">
  <tr>
    <td width="5" height="31" background="../../images/i_m_t.jpg">&nbsp;</td>
    <td width="486" background="../../images/i_m_t.jpg">孩子中心&gt;&gt;孩子列表</td>
    
  </tr>
  </form>
  <tr>
    <td></td>
    <td colspan="2">&nbsp;</td>
  </tr>
  <tr>
    <td></td>
    <td height="400" colspan="2" valign="top">
	  <form id="form1" name="form1" method="post" action="children_list.php" >
      <table width="98%" border="0" align="center" cellpadding="0" cellspacing="0" class="table">
        <tr>
          <td width="7" bgcolor="#999999" >&nbsp;</td>
          <td colspan="4" class="m_t_c">孩子列表</td>
          <td class="m_t_c"><div align="right"><img src="../../images/add.jpg" /></div></td>
          <td class="m_t_c"><a href="children_add.php" style="color:#000;">添加孩子</a></td>
        </tr>
        <tr>
          <td>&nbsp;</td>
          <td width="26" height="30"><input type="checkbox" name="chkall" id="chkall" onclick="checkall(this.form)" /></td>
          <td width="52">全选</td>
		  <td width="98"></td>
		  <td width="540">标题</td>
          <td width="117">日期</td>
          <td width="94">操作</td>
        </tr>
        <?php
			$where = "";
            $all_date_num = page_1::page_all_num('children',$where);
            $page = isset($_GET['page']) ? $_GET['page'] : 1 ;	
            $offset = ($page - 1) * $page_a;
            $user_list = page_1::page_array('*','children',$where,' ORDER BY dateline DESC, child_id DESC',$offset,$page_a);
            foreach($user_list as $k=>$v)
            {
        ?>
        <tr>
          <td>&nbsp;</td>
          <td height="25">&nbsp;</td>
          <td><input type="checkbox" name="del_children_a[]" value="<?php echo $v['child_id']; ?>" /></td>
          <td></td>
          <!--<td><php echo $_children_type[$v['children_type']];?></td>-->
          <td><?php echo $v['name_cn'] ? $v['name_cn'] : $v['name_en'];?></td>
          <td><?php echo $v['dateline'];?></td>
          <td><a href="children_modify.php?child_id=<?php echo $v['child_id'];?>"><img src="../../images/modify.gif" width="16" height="16" border="0" alt="<?php echo $_L['edit'];?>" title="<?php echo $_L['edit'];?>" /></a></td>
        </tr>
        <?php
            }
        ?>
        <tr>
          <td></td>
          <td height="25" colspan="6">
          <?php 
            echo page::page_num($all_date_num,$page_a,$page,'children_list.php');
          ?>
          </td>
        </tr>
        <tr>
          <td>&nbsp;</td>
          <td height="30" colspan="9" align="center">
            <input type="submit" name="del_children" id="del_children" value="删除" />   
            <input type="button" name="rfd" id="rfd" onclick="window.location.reload();" value="刷新" /></td>
        </tr>
      </table>
	  </form>
    </td>
  </tr>
</table>
<?php
	}
	else
	{
	
		if(isset($param['del_children_a']))
		{
			
			if( isset($param['del_children_a']) && is_array($param['del_children_a']))
			{
				//删除数据
				foreach($param['del_children_a'] as $k)
				{
					$back_data = $db->query("DELETE FROM ".$ea->table('children')." WHERE children_id = '$k'");
				}
				
				//返回结果
				if($back_data)
				{
					show_msg('删除成功','children_list.php');
				}
				else
				{
					show_msg('请重试','children_list.php');
				}
				
			}
			
		}
		else
		{
			show_msg('没有选中删除项','children_list.php');
		}
	
	
	}
?>
</body>
</html>
