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
$title="人员管理";
$admin = new Admin();
$higher=$admin->get_operator(50);  //获取等级大于50的用户
$super_admins=[];
$admins=[];
$ops=[];
$dgt=[];
$salers=[];
foreach($higher as $h){
    if(intval($h["levels"])>95){
        array_push($super_admins,$h);
        continue;
    } elseif (intval($h["levels"])>90){
        array_push($admins,$h);
        continue;
    } elseif (intval($h["levels"])>70){
        array_push($ops,$h);
        continue;
    } elseif (intval($h["levels"])>60){
        array_push($dgt,$h);
        continue;
    } elseif(intval($h["levels"])>50){
        array_push($salers,$h);
        continue;
    }
    else{

    }
}
$smarty = new Smarty_HZ();
$smarty->assign('title',$title);
$smarty->assign('sas',$super_admins);
$smarty->assign('admins',$admins);
$smarty->assign('ops',$ops);
$smarty->assign('dgt',$dgt);
$smarty->assign('salers',$salers);
$smarty->assign('lvl',$_SESSION['lvl']);
$smarty->display('manage.tpl');
