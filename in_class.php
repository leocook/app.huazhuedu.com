<?php
/*
 *  开班录入
 */
use inc\Vali;
require("inc/Auto.php");
require('set_conf.php');
spl_autoload_register('autoload');
//Vali::check_client();

$smarty = new Smarty_HZ();
$smarty->assign('title',"客户录入");
$smarty->display('in_class.tpl');