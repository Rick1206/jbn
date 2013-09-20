<?php
if (!defined('IN_SK')) 
{
    die('Hacking attempt');
}   

//add diary

function add_diary($param,$admin_id)
{

	global $db,$ea;
	
	foreach($param as $index => $value)
	{
	
		$param[$index] = htmlspecialchars($value);	
	
	}
	$publish = $param['publish'];
	$sql = 'INSERT INTO '.$ea->table('diary'). '(`title`,`keywords`,`contant`,`lan`,`add_time`,`is_publish`,`order`,`admin_id`) '.
			'VALUES ("'.$param['title'].'",'.
			'"'.$param['keywords'].'",'.
			'"'.$param['contant'].'",'.
			//'"'.$param['summary'].'",'.
			'"'.$param['diary_lan'].'",'.
			'"'.$param['add_time'].'",'.
			'"'.$publish.'",'.
			'"'.$param['diary_order'].'",'.
			'"'.$admin_id.'")';
			
	$res = $db->query($sql);
	if($res)
	{	//add global search
		$id = $db->insert_id();
		$url = 'diary_search.php?diary='.$id;
		$sql_1 = 'INSERT INTO '.$ea->table('search'). ' (type,m_id,keywords,depict,url,admin_id,is_publish,lan) '.
			  'VALUES ("52",'.
			  '"'.$id.'",'.
			  '"'.$param['title'].'",'.
			  '"'.$param['keywords'].'",'.
			  '"'.$url.'",'.
			  '"'.$admin_id.'",'.
			  '"'.$publish.'",'.
			  '"'.$param['diary_lan'].'")';
	    $search_res = $db->query($sql_1);
		if($search_res)
		{	
			return true;
		}
		else
		{
			//del add diary 
			$del_add = 'DELETE FROM '.$ea->table('diary').' WHERE diary_id='.$id;
			$res_del = $db->query($del_add);
			return false;
		}
	}
	else
	{
		return false;
	}
	
	$db->free_result($res);		

}

function search_byDid($id)
{
	global $db,$ea;
	
	$sql = 'SELECT * FROM '.$ea->table('diary'). 'WHERE diary_id='.$id;
	$res = $db->getAll($sql);
	
	return $res;

}
// education
function search_byEid($id)
{
	global $db,$ea;
	
	$sql = 'SELECT * FROM '.$ea->table('education'). 'WHERE education_id='.$id;
	$res = $db->getAll($sql);
	
	return $res;

}

//modify diary

function edit_diary($param,$id)
{

	global $db,$ea;
	
	foreach($param as $index => $value)
	{
	
		$param[$index] = htmlspecialchars($value);	
	
	}

	$publish = empty($param['publish']) ? 0 : $param['publish'];

	$sql = 'UPDATE '.$ea->table('diary'). 'SET '.
			' title ="'.$param['title'].'",'.
			' keywords ="'.$param['keywords'].'",'.
			//' summary ="'.$param['summary'].'",'.
			' lan ="'.$param['diary_lan'].'",'.
			' contant ="'.$param['contantr'].'",'.
			' is_publish = "'.$publish.'",'.
			' `order` = "'.$param['diary_order'].'",'.
			' add_time ="'.$param['add_time'].'"'.
			' WHERE diary_id='.$id;

	$res = $db->query($sql);
	
	if($res)
	{
		//update global search
		$upde_search = 'UPDATE '.$ea->table('search').' SET '.
						' keywords ="'.$param['title'].'",'.
						' lan ="'.$param['diary_lan'].'",'.
						' is_publish = "'.$publish.'",'.
						' depict ="'.$param['keywords'].'"'.
						' WHERE type=52 and m_id='.$id;
		
		$res_u = $db->query($upde_search);
		return true;
	}
	else
	{
		return false;
	}
	$db->free_result($res);
}


//del all diary

function del_diary($id)
{
	global $ea,$db;
	
	if(empty($id))
	{
		return false;
	}
	else
	{
	
		$sql = 'DELETE FROM '.$ea->table('diary').' WHERE diary_id='.$id;
		
		$res = $db->query($sql);
		
	}
	
}


?>