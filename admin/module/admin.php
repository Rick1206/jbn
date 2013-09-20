<?php
/**
 * admin user funcion 
 * ============================================================================
 * powered by Rick
 * http://www.digitalcn.net
 * ----------------------------------------------------------------------------
 * $Author: Rick Shi  
 * $email:1491361147@qq.com
 *
*/

if (!defined('IN_SK'))
{
    die('Hacking attempt');
}
//get old pssword
function get_old_psw($admin_id,$param)
{
	global $db,$ea;
	
	
	$sql = 'SELECT admin_id,uname,psw '.
			'FROM '. $ea->table('admin').
			'WHERE pwd="'.$param['old_psw'].'"'.' and admin_id = "'.$admin_id.'" ';
				
	$info = $db->getOne($sql);			
	return $info;
	$db->free_result($res);
}

//change user password
function change_psw($admin_id,$param)
{
	global $db,$ea;
	
	$sql =  'UPDATE '.$ea->table('admin').
			' SET ';
	if(!empty($param['user_note']))
	{
			 $sql .=  ' note="'.$param['user_note'].'",';
	}
	$sql .=  ' psw="'.$param['new_psw'].'"'.
			 ' WHERE '. 
			 ' admin_id='.$admin_id;
			 
   
	$res = $db->query($sql);
	if($res)
	{
		return true;
	}
	else
	{
		return false;
	}
	
	$db->free_result($res);	

}

//get all user 

function get_all_user($id)
{
	global $db,$ea;
	
	if(empty($id))
	{
	
		$sql = "SELECT * FROM".$ea->table('admin');
	
		$a = $db->getAll($sql);
		
	}
	else
	{
		$sql = "SELECT amdin_id,name FROM ".$ea->table('admin').'WHERE admin_id='.$id;
		$res = $db->query($sql);
		while( $row = $db->fetch_array($res) )
		{
			$a = $row['name'];
		}
		
	}
	return $a;
	

}


//add new user
function add_new_user($param)
{
  global $ea,$db;
	
  $sql='INSERT INTO '.$ea->table('admin').' (name,psw,user_group,note) VALUES '.
  		'('.'"'.$param['user_name'].'",'.'"'.$param['user_psw'].'",'.'"'.$param['user_group'].'",'.'"'.$param['user_note'].'"'.
		
		')';
  
  
  $res = $db->query($sql);
  
  if($res)
  {
  	return true;
  }
  else
  {
  	return false;
  }
	

}

//del user

function del_user($id)
{
	global $ea,$db;
	
	if(empty($id))
	{
		return false;
	}
	else
	{
	
		$sql = 'DELETE FROM '.$ea->table('admin').' WHERE admin_id='.$id;
		
		$res = $db->query($sql);
		
		if($res)
		{
			return true;
		}
		else
		{
			return false;
		}
	
	}
	
}



?>