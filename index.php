<?php
use inc\Vali;
require("inc/Auto.php");
require('set_conf.php');
spl_autoload_register('autoload');
Vali::check_client();
$smarty = new Smarty_HZ();
$smarty->assign('title','华筑消防，保驾护航');
$smarty->display('index.tpl');
?>
