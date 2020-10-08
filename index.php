<?php   
require_once("../mainfile.php");
include(XOOPS_ROOT_PATH."/header.php");  

global $xoopsUser;
if (is_object($xoopsUser))
{
redirect_header("main.php", 2, 'You are logged in'); 
exit();
}

echo $xoopsTpl->fetch(XOOPS_ROOT_PATH . '/mobile/templates/index.tpl');
?>

