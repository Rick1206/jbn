<?php

/**
 * to get user group information
 * ============================================================================
 * powered by Rick
 * http://www.emporioasia.com
 * ----------------------------------------------------------------------------
 * $Author: Rick  
 * $email:calvin@emporioasia.com
*/
if (!defined('IN_SK'))
{
    die('Hacking attempt');
}

$a_right = get_right_byId(isset($_SESSION['admin_id']) ? $_SESSION['admin_id'] : "");


?>