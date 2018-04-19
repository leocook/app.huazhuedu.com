<?php
use inc\Vali;
use inc\Custom;
require("inc/Auto.php");
require('set_conf.php');
spl_autoload_register('autoload');
Vali::check_client();
$c = new Custom();
$info = $c->get_totle_school_info();
$smarty = new Smarty_HZ();
$smarty->assign('title','2018年华筑教育开班信息');
$smarty->assign('info',$info);
$smarty->display('school_begin.tpl');