<?php
use inc\Vali;
use inc\Custom;
require("inc/Auto.php");
require('set_conf.php');
spl_autoload_register('autoload');
//Vali::check_client();
session_start();
$sid = session_id();
if(empty($_SESSION['mobile'])){
    header("Location: login_page.php");
    exit(0);
}
$in_mb = $_SESSION['mobile'];
$v=new Vali();
$v->check_login($in_mb,$sid);
if(!$v->check_lvl(50)){
    header("Location: 404.php");
    exit(0);
}
if(!isset($_GET['id'])){
    header("Location: my_cust.php");
    exit(0);
}else{
    $id=Vali::filter_cust_id($_GET['id']);
    if(!$id){
        header("Location: 404.php");
        exit(0);
    }
}
$c=new Custom();
if(!$c->is_custom_belong($_GET['id'],$in_mb)){
    header("Location: my_cust.php");
    exit(0);
}
$info = $c->get_custom_info($id);
$smarty = new Smarty_HZ();
$smarty->assign('title',"客户编辑");
$smarty->assign('info',$info);
$smarty->display('ed_cust.tpl');