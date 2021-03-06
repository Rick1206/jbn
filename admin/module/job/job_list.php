<?php
/**
 * job list
 * ============================================================================
 * powered by EmporioAsia
 * http://www.emporioasia.com
 * ----------------------------------------------------------------------------
 * $Author: Calvin Shen  
 * $email:calvin@emporioasia.com
 *
*/
define('IN_SK',true);
require('../../includes/init.php');	
require('../../lib/lib_right.php');
if( empty($_SESSION['admin_id']) ){
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
<table width="100%" border="0" cellspacing="0" cellpadding="0">
  <tr>
    <td width="5" height="31" background="../../images/i_m_t.jpg">&nbsp;</td>
    <td width="972" background="../../images/i_m_t.jpg">义工招募&gt;&gt;<a href="job.php" id="module_link">招募查询</a>&gt;&gt;招募列表</td>
  </tr>
  <tr>
    <td></td>
    <td>&nbsp;</td>
  </tr>
  <tr>
    <td></td>
    <td height="400" valign="top">
    <?php
	$url_add = "";
	$url_link = "?";
	if (isset($_GET['formdate']) && $_GET['formdate'] != "") {
		$url_add .= $url_link."formdate=".$_GET['formdate'];
		$url_link = "&";
	}
	if (isset($_GET['todate']) && $_GET['todate'] != "") {
		$url_add .= $url_link."todate=".$_GET['todate'];
		$url_link = "&";
	}
	if (isset($_GET['email']) && $_GET['email'] != "") {
		$url_add .= $url_link."email=".$_GET['email'];
	}			
		if(!@$param["del_job"])
		{
	?>
    <form id="form1" name="form1" method="post" action="job_list.php<?php echo $url_add;?>" >
      <table width="98%" border="0" align="center" cellpadding="0" cellspacing="0" class="table">
        <tr>
          <td width="10" bgcolor="#999999" >&nbsp;</td>
          <td colspan="8" class="m_t_c">招募列表</td>
        </tr>
        <tr>
          <td>&nbsp;</td>
          <td width="37" height="30"><input type="checkbox" name="chkall" id="chkall" onclick="checkall(this.form)" /></td>
          <td width="58">全选</td>
		  <td width="122">姓名</td>
          <td width="220">证件信息</td>
		  <td width="112">应聘职位</td>
          <td width="200">联系方式</td>
          <td width="189">应聘申请时间</td>
          <td width="151">查看</td>
        </tr>
        <?php
		$conditions = "";
		$and = " WHERE";
		if (isset($_GET['formdate']) || isset($_GET['todate'])) {
			if (isset($_GET['formdate']) && $_GET['formdate'] != "") {
				$conditions .= $and." dateline>='".$_GET['formdate']."'";
				$and = " AND";
			}
			if (isset($_GET['todate']) && $_GET['todate'] != "") {
				$conditions .= $and." dateline<='".$_GET['todate']."'";
				$and = " AND";
			}
		} elseif (isset($_GET['job_id']) && $_GET['job_id']!="") {
			$conditions .= $and." job_id='".$_GET['job_id']."'";
			$and = " AND";
		}
			//to list job information
            $all_date_num = page_1::page_all_num('job',$conditions);
            //$last_page = intval (($all_date_num - 1) / $page_a) + 1; //获得总页数
            $page = isset($_GET['page']) ? $_GET['page'] : 1 ;	
            $offset = ($page - 1) * $page_a;
            $user_list = page_1::page_array('*','job',$conditions,' ORDER BY dateline DESC, job_id DESC',$offset,$page_a);
            foreach($user_list as $k=>$v)
            {
        ?>
        <tr>
          <td>&nbsp;</td>
          <td height="25">&nbsp;</td>
          <td><input type="checkbox" name="del_job_a[]" value="<?php echo $v['job_id']; ?>" /></td>
          <td><?php echo $v['uname'];?></td>
          <td><?php echo $v['utype'];?>：<?php echo $v['ucard'];?></td>
          <td><?php echo $_user_job[$v['ujob']];?></td>
          <td><?php echo $v['ucontact'];?></td>
          <td><?php echo $v['dateline'];?></td>
          <td><a href="job_modify.php?job_id=<?php echo $v['job_id'];?>" target="_blank"><img src="../../images/modify.gif" width="16" height="16" border="0" alt="<?php echo $_L['edit'];?>" title="<?php echo $_L['edit'];?>" /></a></td>
        </tr>
        <?php
            }
        ?>
        <tr>
          <td></td>
          <td height="25" colspan="8">
          <?php 
            echo page::page_num($all_date_num,$page_a,$page,'job_list.php'.$url_add);
          ?>
          </td>
        </tr>
        <tr>
          <td>&nbsp;</td>
          <td height="30" colspan="12" align="center">
            <input type="submit" name="del_job" id="del_job" value="删除" />   
            <input type="button" name="rfd" id="rfd" onclick="window.location.reload();" value="刷新" />
			<!--<input type="button" name="btn_print" id="btn_print" value="导出结果" onclick="window.open('job_export.php<?php echo $url_add;?>')">-->
		  </td>
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
	
		if(isset($param['del_job_a']))
		{
			
			if( isset($param['del_job_a']) && is_array($param['del_job_a']))
			{
				//删除数据
				foreach($param['del_job_a'] as $k)
				{
					//$sql = 'SELECT pdf FROM '.$ea->table('job'). 'WHERE job_id='.$k;
					//$job_info = $db->getAll($sql);
					//@unlink($attachdir.$job_info[0]['pdf']);
					$back_data = $db->query('DELETE FROM '.$ea->table('job').' WHERE job_id='.$k);
				}
				
				//返回结果
				if($back_data)
				{
					show_msg('删除成功','job_list.php'.$url_add);
				}
				else
				{
					show_msg('请重试','job_list.php'.$url_add);
				}
				
			}
			
		}
		else
		{
			show_msg('没有选中删除项','job_list.php'.$url_add);
		}
	
	
	}
?>
</body>
</html>
