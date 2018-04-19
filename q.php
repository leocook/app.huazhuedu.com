<?php
require_once("set_conf.php");
require_once "jssdk/jssdk.php";
$jssdk = new JSSDK("wx4345c824a8e2c268", "1f1e486d69107dec2670ae1d02c90175");
$signPackage = $jssdk->GetSignPackage();
$smarty = new Smarty_HZ();
$smarty->assign('JP',$signPackage);
$smarty->display('q.tpl');
