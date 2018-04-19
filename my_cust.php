<?php
use inc\Vali;
use inc\Custom;
require("inc/Auto.php");
require('set_conf.php');
spl_autoload_register('autoload');
//Vali::check_client();
$v=new Vali();
session_start();
$sid = session_id();
if(!isset($_SESSION['mobile'])){
    header('Location:login_page.php');
    exit();
}
$in_mb = $_SESSION['mobile'];
$v=new Vali();
if(!$v->ajax_ck_login($in_mb,$sid)){
    header('Location:login_page.php');
    exit();
}
$c = new Custom();
$stat = ['未通过','已通过'];
$info = $c->get_customs($in_mb);
$smarty = new Smarty_HZ();
$smarty->assign('title','我的客户');
$smarty->assign('info',$info);
$smarty->assign('stat',$stat);
$smarty->display('my_cust.tpl');