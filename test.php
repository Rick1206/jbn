<?php
define('IN_SK',true);

require_once('./includes/init.php');
require_once('./phpmailer/class.phpmailer.php');
try {	
$mail = new PHPMailer();
	$mail->IsSMTP();
	//$mail->SetLanguage('zh_cn','phpmailer/language/');
    $mail->CharSet 		 = "utf-8"; 
    $mail->Encoding		 = "base64";
	$mail->SMTPSecure 	 = "ssl";
	$mail->SMTPAuth      = true;                  
	$mail->SMTPKeepAlive = true;                  
	$mail->Host          = "smtp.exmail.qq.com"; 		  
	$mail->Port          = 587;                    
	$mail->Username      = "max.liu@foreverloveinchina.com";    
	$mail->Password      = "forever123456";            
	
	$mail->SetFrom('max.liu@foreverloveinchina.com', 'JBNEmail');
	
	$mail->Subject       = "家百浓邮件";
	
	$body = "333";
	
	$mail->MsgHTML($body);
	
	//$address = $_POST["email_address"];
	
	$mail->AddAddress('1491361147@qq.com', "");
	
	$mail->AddCC('cindy.cheng@foreverloveinchina.com','cindy');
	
	$mail->AddCC('max.liu@foreverloveinchina.com','max');
	
	$mail->Send();
	 } catch ( phpmailerException $e ) {
        echo $e->errorMessage (); //Pretty error messages from PHPMailer（就是这边输出错误的）
    } catch ( Exception $e ) {
        echo $e->getMessage (); //Boring error messages from anything else!
    }
	
	?>