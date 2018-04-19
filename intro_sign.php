<?php
session_start();
require_once('set_conf.php');
require_once('include/func_login.php');
require_once "jssdk/jssdk.php";
$jssdk = new JSSDK("wx4345c824a8e2c268", "1f1e486d69107dec2670ae1d02c90175");
$signPackage = $jssdk->GetSignPackage();
if(!isset($_GET["saler"])){
    $saler="";
}else{
    $saler= check_mobile_submit($_GET["saler"]);
    if(!$saler){
        $saler="";
    }
}
$smarty = new Smarty_HZ();
$smarty->assign('title',"消防新干线");
$smarty->assign('saler',$saler);
$smarty->assign('JP',$signPackage);
$smarty->assign('js',"./script/intro_sign.js?v=".time());
$smarty->display('intro_sign.tpl');