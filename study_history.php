<?php
use inc\Vali;
use inc\Record;
require("inc/Auto.php");
require('set_conf.php');
spl_autoload_register('autoload');
//Vali::check_client();
session_start();
if(!isset($_SESSION['mobile'])) {
    header('Location:login_page.php');
    exit();
}
$mb = $_SESSION['mobile'];
$sid = session_id();
$v= new Vali();
$v->check_login($mb,$sid);
if(!$v->check_lvl(50)){
    header('Location:member.php');
    exit();
}
if(!isset($_GET['m'])) {
    $m = $mb;
}else{
    $m=Vali::filter_mobile($_GET['m']);
    if(!$m){
        $m = $mb;
    }
}
$rec = new Record();
$ctime = $rec->get_ctime($m);
$info = $rec->get_info($m);
$r=[];
foreach ($info as $i){
    $r[]= substr($i['tim'],5,5);
    $res=array_unique($r);
}

$smarty = new Smarty_HZ();
$smarty->assign('title','个人学习记录' );
$smarty->assign('mb',$m );
$smarty->assign('ctime',$ctime );
$smarty->assign('res',$res );
$smarty->display('study_history.tpl');
?>
