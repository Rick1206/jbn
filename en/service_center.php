<?php
define('IN_SK',true);

require_once('../includes/init.php');
require_once('../phpmailer/class.phpmailer.php');

if($_POST["type"] != ""){	
	$jbnType = $_POST["type"];
}

error_reporting(E_ALL);

switch($jbnType){
	case "money":
	//--- 财力 ---//
	$updateSql = $db->query("INSERT INTO ".$ea->table('money')." (uname, usex, ucard, ucountry, ucardinfo, ubelief, uedu, uemail, uphone, umoney, uinvoice, dateline) VALUES ('". $_POST["uname"]."', '".$_POST["usex"]."', '".$_POST["ucard"]."', '".$_POST["ucountry"]."', '".$_POST["ucardinfo"]."', '".$_POST["ubelief"]."', '".$_POST["uedu"]."', '".$_POST["uemail"]."', '".$_POST["uphone"]."', '".$_POST["umoney"]."', '".$_POST["uinvoice"]."', '".date('Y-m-d')."')");	
	break;
	
	case "material":
	//--- 物力 ---//
	$updateSql = $db->query("INSERT INTO ".$ea->table('material')." (uname, usex, ucard, ucountry, ucardinfo, ubelief, uedu, uemail, uphone, uproduct, ucount, utransport, dateline) VALUES ('". $_POST["uname"]."', '".$_POST["usex"]."', '".$_POST["ucard"]."', '".$_POST["ucountry"]."', '".$_POST["ucardinfo"]."', '".$_POST["ubelief"]."', '".$_POST["uedu"]."', '".$_POST["uemail"]."', '".$_POST["uphone"]."', '".$_POST["uproduct"]."', '".$_POST["ucount"]."', '".$_POST["utransport"]."', '".date('Y-m-d')."')");
	
	break;
	
	case "job":
	//--- 义工申请 ---//
	$updateSql = $db->query("INSERT INTO ".$ea->table('job')." (uname, usex, ucard, utype, uage, ucontact, uedu, ubelief, ujob, uexperience, uintro, utime, dateline) VALUES ('". $_POST["uname"]."', '".$_POST["usex"]."', '".$_POST["ucard"]."', '".$_POST["utype"]."', '".$_POST["uage"]."', '".$_POST["ucontact"]."', '".$_POST["uedu"]."', '".$_POST["ubelief"]."', '".$_POST["ujob"]."', '".$_POST["uexperience"]."', '".$_POST["uintro"]."', '".$_POST["utime"]."', '".date('Y-m-d')."')");	
	break;
	
	case "message":
	$updateSql = $db->query("INSERT INTO ".$ea->table('message')." (uname, umessage_".$lang.", dateline) VALUES ('". $_POST["uname"]."', '".$_POST["umessage"]."', '".date('Y-m-d')."')");	
	break;
	
	case "transfer":
	$updateSql = $db->query("INSERT INTO ".$ea->table('transfer')." (tname, tphone, tcontact, product_id, tcount, dateline) VALUES ('". $_POST["tname"]."', '".$_POST["tphone"]."', '".$_POST["tcontact"]."', '".$_POST["product_id"]."', '".$_POST["tcount"]."', '".date('Y-m-d')."')");	
	break;
	
	case "email":
	$mail = new PHPMailer();
	$mail->IsSMTP();
	$mail->SetLanguage('zh_cn','phpmailer/language/');
    $mail->CharSet 		 = "utf-8"; 
    $mail->Encoding		 = "base64";
	$mail->SMTPSecure 	 = "ssl";
	$mail->SMTPAuth      = true;                  
	$mail->SMTPKeepAlive = true;                  
	$mail->Host          = "smtp.exmail.qq.com"; 		  
	$mail->Port          = 465;                    
	$mail->Username      = "max.liu@foreverloveinchina.com";    
	$mail->Password      = "forever123456";            
	
	$mail->SetFrom('max.liu@foreverloveinchina.com', 'JBNEmail');
	
	$mail->Subject       = "家百浓邮件";
	
	$body = preg_replace("/[\/]/",'',$_POST["email_body"]);
	
	$mail->MsgHTML($body);
	
	$address = $_POST["email_address"];
	
	$mail->AddAddress($address, "");
	
	$mail->AddCC('cindy.cheng@foreverloveinchina.com','cindy');
	
	$mail->AddCC('max.liu@foreverloveinchina.com','max');
	
	if(!$mail->Send()) {
	  echo "1";
	} else {
	  echo "0";
	}
	return;
	break;
	case "register":
	$query  = $db->query("SELECT accountname FROM ".$ea->table('users')." WHERE accountname = '".$_POST["aname"]."' LIMIT 1");
	if ($thisB = $db->fetch_array($query)) {
		echo "wrong1";
		return;
	}
	$updateSql = $db->query("INSERT INTO ".$ea->table('users').
	" (accountname, password, child_id, typeid, username, usex, utype, ucard, ucountry, ubelief, uedu, uemail, ucontact, dateline) VALUES ('"
	. $_POST["aname"]."', '".$_POST["password"]."', '".$_POST["childid"]."', '".$_POST["utype"]."', '".$_POST["uname"]."', '".$_POST["usex"]."', '".$_POST["uctype"]."', '".$_POST["ucard"]."', '".$_POST["ucountry"]."', '".$_POST["ubelief"]."', '".$_POST["uedu"]."', '".$_POST["uemail"]."', '".$_POST["ucontact"]."', '".date('Y-m-d')."')");
	
	if($updateSql){
		session_start();
		$_SESSION["userName"] = $_POST["uname"];
		echo "1";
	}else{
		echo "0";
	}
	exit();
	break;
	
	case "login":
	$query  = $db->query("SELECT userid, accountname, password,username FROM ".$ea->table('users')." WHERE accountname = '".$_POST["aname"]."' AND password = '".$_POST["passwrod"]."' LIMIT 1");
	if ($thisB = $db->fetch_array($query)) {
		if($thisB['status']==false){
			session_start();
			$_SESSION["userName"] = $thisB["username"];
			echo "2";	
		}else{
			$_SESSION["userId"] = $thisB["userid"];
			echo "1";
		}
	}else{
		echo "0";
	}
	return;
	break;
}

if($updateSql){
	echo "1";	
}else{
	echo "0";
}

	
?>
