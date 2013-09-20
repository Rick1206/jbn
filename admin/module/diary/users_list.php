<?php
define('IN_SK',true);
require('../../includes/init.php');	
require('../../lib/lib_right.php');
if( empty($_SESSION['admin_id']) ){
	header('Location: ../../login.php');
	exit();
}

$pic_doc = 'users';
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
		if(!@$param["del_users"])
		{
	?>
<table width="100%" border="0" cellspacing="0" cellpadding="0">
  <form id="form2" name="form2" method="get" action="users_list.php">
  <tr>
    <td width="5" height="31" background="../../images/i_m_t.jpg">&nbsp;</td>
    <td width="486" background="../../images/i_m_t.jpg">家百浓会员&gt;&gt;会员列表</td>
    
  </tr>
  </form>
  <tr>
    <td></td>
    <td colspan="2">&nbsp;</td>
  </tr>
  <tr>
    <td></td>
    <td height="400" colspan="2" valign="top">
	  <form id="form1" name="form1" method="post" action="users_list.php" >
      <table width="98%" border="0" align="center" cellpadding="0" cellspacing="0" class="table">
        <tr>
          <td width="7" bgcolor="#999999" >&nbsp;</td>
          <td colspan="7" class="m_t_c">会员列表</td>
          <!--<td class="m_t_c"><div align="right"><img src="../../images/add.jpg" /></div></td>
          <td class="m_t_c"><a href="users_add.php" style="color:#000;">添加新闻</a></td>-->
        </tr>
        <tr>
          <td>&nbsp;</td>
          <td width="26" height="30"><input type="checkbox" name="chkall" id="chkall" onclick="checkall(this.form)" /></td>
          <td width="52">全选</td>
		  <td width="240">姓名</td>
		  <td width="198">审核状态</td>
		  <td width="200">会员等级</td>
          <td width="117">日期</td>
          <td width="94">操作</td>
        </tr>
        <?php
			$where = empty($users_type) ? "" : " WHERE users_type = '".$users_type."'";
            $all_date_num = page_1::page_all_num('users',$where);
            $page = isset($_GET['page']) ? $_GET['page'] : 1 ;	
            $offset = ($page - 1) * $page_a;
            $user_list = page_1::page_array('*','users',$where,' ORDER BY dateline DESC, userid DESC',$offset,$page_a);
            foreach($user_list as $k=>$v)
            {
        ?>
        <tr>
          <td>&nbsp;</td>
          <td height="25">&nbsp;</td>
          <td><input type="checkbox" name="del_users_a[]" value="<?php echo $v['userid']; ?>" /></td>
           <td><?php echo $v['username'];?></td>
           <td><?php echo ($v['status']== true) ? "是" : "否"; ?></td>
          <td><?php echo $_user_type[$v['typeid']];?></td>
          <td><?php echo $v['dateline'];?></td>
          <td><a href="users_modify.php?userid=<?php echo $v['userid'];?>"><img src="../../images/modify.gif" width="16" height="16" border="0" alt="<?php echo $_L['edit'];?>" title="<?php echo $_L['edit'];?>" /></a></td>
        </tr>
        <?php
            }
        ?>
        <tr>
          <td></td>
          <td height="25" colspan="7">
          <?php 
            echo page::page_num($all_date_num,$page_a,$page,'users_list.php');
          ?>
          </td>
        </tr>
        <tr>
          <td>&nbsp;</td>
          <td height="30" colspan="9" align="center">
            <input type="submit" name="del_users" id="del_users" value="删除" />   
            <input type="button" name="rfd" id="rfd" onclick="window.location.reload();" value="刷新" /></td>
        </tr>
      </table>
	  </form>
    </td>
  </tr>
</table>
<?php
	}
	else{
		if(isset($param['del_users_a'])){
			
			if( isset($param['del_users_a']) && is_array($param['del_users_a'])){
				//删除数据
				foreach($param['del_users_a'] as $k){
					$back_data = $db->query("DELETE FROM ".$ea->table('users')." WHERE userid = '$k'");
				}
				//返回结果
				if($back_data){
					show_msg('删除成功','users_list.php');
				}
				else{
					show_msg('请重试','users_list.php');
				}	
			}
		}
		else{
			show_msg('没有选中删除项','users_list.php');
		}
	}
?>
</body>
</html>
