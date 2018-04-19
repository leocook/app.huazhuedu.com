<?php
use inc\Vali;
require("inc/Auto.php");
require('set_conf.php');
spl_autoload_register('autoload');
Vali::check_client();
$smarty = new Smarty_HZ();
$smarty->assign('title','在线考场');
$smarty->display('exam_index.tpl');

