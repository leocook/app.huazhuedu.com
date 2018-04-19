<?php
use inc\Vali;
use inc\Admin;;
require_once("inc/Auto.php");
require_once("set_conf.php");
session_start();
spl_autoload_register('autoload');
$v=new Vali();
$v->check_login($_SESSION['mobile'],session_id());
if(!$v->check_lvl(90)){
    header("Location: member.php");
    exit();
}
$title="一周注册用户";
$admin = new Admin();
$users = $admin->get_week_user();
$smarty = new Smarty_HZ();
$smarty->assign('title',$title);
$smarty->assign('name',$title);
$smarty->assign('users',$users);
$smarty->assign('js0',"script/nz.js");
$smarty->assign('js1',"script/nz.js");
$smarty->assign('css0',"style/score.css");
$smarty->assign('css1',"style/nz.css");
$smarty->display('week_user.tpl');
