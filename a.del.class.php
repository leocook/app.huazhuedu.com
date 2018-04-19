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
if(!$v->check_lvl(70)){
    echo json_encode(['status'=>'no','msg'=>'权限不够，请升级用户!']);
    exit();
}
$c=new Custom();
$cid = Vali::filter_class_id($_POST['cid_']);
if(!$cid){
    echo json_encode(["msg" => "班次参数非法", "status" => "no"]);
    exit(0);
}
if(!$c->is_class_exist($cid)){
    echo json_encode(["msg" => "班次不存在", "status" => "no"]);
    exit(0);
}
if($c->del_class($cid)){
    echo json_encode(["msg" => "删除成功", "status" => "yes",'errCode'=>0]);
    exit(0);
}else{
    echo json_encode(["msg" => "删除失败", "status" => "no"]);
    exit(0);
}

