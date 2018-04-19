<?php
use inc\Vali;
require_once("inc/Auto.php");
require_once("set_conf.php");
session_start();
spl_autoload_register('autoload');
$v=new Vali();
$v->check_login($_SESSION['mobile'],session_id());
if(!$v->check_lvl(70)){
    header("Location: member.php");
    exit();
}
$title="课程开通";
$smarty = new Smarty_HZ();
$smarty->assign('title',$title);
$smarty->display('add_order.tpl');
