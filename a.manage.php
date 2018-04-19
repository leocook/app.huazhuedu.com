<?php
use inc\Vali;
use inc\Admin;
error_reporting(0);
require_once("inc/Auto.php");
session_start();
spl_autoload_register('autoload');
$v=new Vali();
$v->ajax_check_login($_SESSION['mobile'],session_id());
if(!$v->check_lvl(50)){
    echo json_encode(['status'=>'no','msg'=>'权限不够，请升级用户!']);
    exit();
}
$admin = new Admin();
$mb = Vali::filter_mobile($_POST['mb']);
if(!$mb){
    echo json_encode(['status'=>'no','msg'=>'电话号码格式有误']);
    exit();
}
switch ($_POST['action']){
    case 'search':
        $ip = Vali::filter_ip($_POST['ip']);
        if(!$ip){
            echo json_encode(['status'=>'no','msg'=>'ip地址不符合规范']);
            exit();
        }
        $r=$admin->addr_from_ip($ip);
        $num= $admin->get_extends($mb);
        echo json_encode(['num'=>$num[0][0],'addr'=>$r[0]['addr'].' '.$r[0]['operator']]);
        break;
    case 'change':
        $lvl = Vali::filter_lvl($_POST['lvl']);
        if(!$lvl){
            echo json_encode(['status'=>'no','msg'=>'等级不在有效范围']);
            exit();
        }
        if(!$v->check_lvl(70)){
            echo json_encode(['status'=>'no','msg'=>'权限不够，请升级管理员!']);
            exit();
        }
        if($lvl>$_SESSION['lvl']){
            echo json_encode(['status'=>'no','msg'=>'您只能修改小于'.$_SESSION['lvl'].'级的人员等级']);
            exit();
        }
        if($admin->change_user_lvl($mb,$lvl)){
            echo json_encode(['status'=>'yes','msg'=>'更新成功']);
            exit();
        }else{
            echo json_encode(['status'=>'no','msg'=>'更新失败']);
            exit();
        }
    default:
        echo json_encode(['status'=>'no','msg'=>'参数错误,请修改后再提交']);
        break;
}