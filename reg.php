<?php
use inc\Vali;
use inc\Video;
require("inc/Auto.php");
require('set_conf.php');
spl_autoload_register('autoload');
Vali::check_client();
$smarty = new Smarty_HZ();
$smarty->assign('title',"消防新干线在线报名");
$smarty->display('reg.tpl');