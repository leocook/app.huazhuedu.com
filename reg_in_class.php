<?php
use inc\Vali;
use inc\Custom;
require("inc/Auto.php");
require('set_conf.php');
spl_autoload_register('autoload');
//Vali::check_client();
if(!isset($_GET['id'])){
    header('Location:404.php');
    exit(0);
}
$uid = Vali::filter_cust_id($_GET['id']);
if(!$uid){
    header('Location:404.php');
    exit(0);
}
$c=new Custom();
$info=$c->get_viable_class();
if(!$info){
    header('Location:404.php');
    exit(0);
}else{
    $smarty = new Smarty_HZ();
    $smarty->assign('title',"课程申请");
    $smarty->assign('info',$info);
    $smarty->assign('uid',$uid);
    $smarty->display('reg_in_class.tpl');
}
