<?php
use inc\Vali;
use inc\Chart;
use inc\Admin;
error_reporting(0);
require_once("inc/Auto.php");
require_once('set_conf.php');
session_start();
spl_autoload_register('autoload');
$v=new Vali();
//$v->ajax_check_login($_SESSION['mobile'],session_id());
/*if(!$v->check_lvl(60)){
    echo json_encode(['status'=>'no','msg'=>'权限不够，请升级用户!']);
    exit();
}*/
$smarty = new Smarty_HZ();
$smarty->assign('title','用户分布');
$smarty->assign('name','用户分布');
$smarty->assign('user_count',$data);
$smarty->assign('js0',"script/echarts.simple.min.js");
$smarty->assign('js1',"script/user_area.js");
$smarty->assign('css0',"style/user_area.css");
$smarty->assign('css1',"style/nz.css");
$smarty->display('user_area.tpl');
?>