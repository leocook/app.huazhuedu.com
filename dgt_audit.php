<?php
use inc\Vali;
use inc\Admin;;
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
$admin = new Admin();
$apps = $admin->get_dgt_applies();
$smarty = new Smarty_HZ();
$smarty->assign('title',"代理审核");
$smarty->assign('apps',$apps);
$smarty->display('dgt_audit.tpl');
