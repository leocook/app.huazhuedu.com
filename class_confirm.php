<?php
use inc\Vali;
use inc\Custom;
require("inc/Auto.php");
require('set_conf.php');
spl_autoload_register('autoload');
//Vali::check_client();
session_start();
$sid = session_id();
if(!isset($_SESSION['mobile'])){
    header('Location:login_page.php');
    exit();
}
$mb = $_SESSION['mobile'];
$v=new Vali();
$v->check_login($mb,$sid);
$lvl = $_SESSION['lvl'];
if($lvl <60){
    header('Location:member.php');
    exit();
}
if($lvl>=65 and $lvl<70){
    $op = 'finance';
}else if($lvl >=70 and $lvl <80){
    $op = 'operator';
}else if($lvl >90){
    $op = 'admin';
}else{
    $op = 'other';
}
$cust=new Custom();
$classes = $cust->get_viable_class();
$users = $cust->get_all_customs();
$result=[];
foreach ($classes as $c){
    $result[$c['id']]=[];
    $result[$c['id']]['id']=$c['id'];
    $result[$c['id']]['nam']=$c['nam'];
    $result[$c['id']]['start']=$c['start'];
    $result[$c['id']]['end']=$c['end'];
    $result[$c['id']]['count']=$c['count'];
    foreach ($users as $u){
        if($u['class_id'] === $c['id']){
            $stat = $u['pay_stat'].$u['pass_stat'];
            switch ($stat){
                case '11':
                    $result[$c['id']]['pass'][] = $u;
                    break;
                case '10':
                    $result[$c['id']]['paid'][] = $u;
                    break;
                case '00':
                    $result[$c['id']]['nopay'][] = $u;
                    break;
                default:
                    break;
            }
        }
    }
}
//var_dump($result);
$lvl = $_SESSION['lvl'];
$smarty = new Smarty_HZ();
$smarty->assign('title',"付款确认");
$smarty->assign('cls',$result);
$smarty->assign('vcs',$classes);
$smarty->assign('op',$op);
$smarty->display('class_confirm.tpl');