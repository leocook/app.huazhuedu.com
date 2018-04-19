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
    echo json_encode(['status'=>'no','msg'=>'您还没有登录','errCode'=>1]);
    exit();
}
$in_mb = $_SESSION['mobile'];
$v=new Vali();
if(!$v->ajax_ck_login($in_mb,$sid)){
    echo json_encode(['status'=>'no','msg'=>'您还没有登录','errCode'=>1]);
    exit();
}
if(!$v->check_lvl(50)){
    echo json_encode(['status'=>'no','msg'=>'权限不够，请升级用户!']);
    exit();
}

$cls_id = Vali::filter_class_id($_POST['z_cls_']);
if(!$cls_id){
    echo json_encode(["msg" => "课程id不符合要求", "status" => "no"]);
    exit(0);
}
$cust=new Custom();
if(!$cust->is_class_exist($cls_id)){
    echo json_encode(["msg" => "该班次不存在", "status" => "no"]);
    exit(0);
}
$c_name = $cust->get_class_name($cls_id);
if($cust->is_full($cls_id)){
    echo json_encode(["msg" => $c_name."班次已满，请报其他班", "status" => "no"]);
    exit(0);
}
$uid = Vali::filter_cust_id($_POST['uid_']);
if(!$uid){
    echo json_encode(["msg" => "用户id不符合要求", "status" => "no"]);
    exit(0);
}
if(!$cust->is_custom_exist($uid)){
    echo json_encode(["msg" => "该用户不存在", "status" => "no"]);
    exit(0);
}

$z = Vali::filter_param($_POST['z_']);
$c = Vali::filter_param($_POST['c_']);
if(!isset($z) or !isset($c)){
    echo json_encode(["msg" => " 参数未正确设置", "status" => "no"]);
    exit(0);
}
switch ($z){
    case '1':
        $d = Vali::filter_param($_POST['d_']);
        if(!$d){
            echo json_encode(["msg" => " 参数未正确设置", "status" => "no"]);
            exit(0);
        }
        $z_start = strtotime($_POST['z_start_']);
        $z_end = strtotime($_POST['z_end_']);
        if(!$z_start or !$z_end or (($z_end-$z_start)<=0)){
            echo json_encode(["msg" => "选择正确的开始和结束日期", "status" => "no"]);
            exit(0);
        }
        break;
    default:
        $d= '0';
        $z_start = date('Y-m-d H-i-s');
        $z_end = date('Y-m-d H-i-s');
        break;
}
$info= $cust->get_custom_info($uid);
if($cust->is_cust_in_class($info['id_num'],$uid)){
    echo json_encode(["msg" => "该用户已经报名", "status" => "no"]);
    exit(0);
}
if($cust->is_reg_full($cls_id)){
    echo json_encode(["msg" => "该班已报满，请报其他班次", "status" => "no"]);
    exit(0);
}

$in_ip = $_SERVER['REMOTE_ADDR'];
if($cust->reg_in_class($uid,$cls_id,$c,$z,$d,$in_mb,$in_ip,$info['id_num'],$info['nam'],$c_name)){
    echo json_encode(["msg" => "报名成功", "status" => "yes",'errCode'=>0]);
    exit(0);
}else{
    echo json_encode(["msg" => "报名失败", "status" => "no"]);
    exit(0);
}

