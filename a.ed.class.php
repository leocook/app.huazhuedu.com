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

$nam = Vali::filter_company($_POST['nam_']);
if(!$nam){
    echo json_encode(["msg" => "名字不符合要求", "status" => "no"]);
    exit(0);
}

$count=Vali::filter_count($_POST["count_"]);
if (!$count){
    echo json_encode(["msg" => "数量参数非法", "status" => "no"]);
    exit(0);
}
$addr = Vali::filter_company($_POST['addr_']);
if(!$addr){
    echo json_encode(["msg" => "地址含有非法字符", "status" => "no"]);
    exit(0);
}

$closed = Vali::filter_param($_POST['closed_']);
if(!isset($closed)){
    echo json_encode(["msg" => "参数非法", "status" => "no"]);
    exit(0);
}
$start = strtotime($_POST['start_']);
$end = strtotime($_POST['end_']);
if(!$start or !$end or (($end-$start)<=0)){
    echo json_encode(["msg" => "选择正确的开始和结束日期", "status" => "no"]);
    exit(0);
}


if(!empty($_POST['des_'])){
    $des =htmlspecialchars(trim($_POST['des_']," ';"));
}else{
    $des='';
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
$in_ip = $_SERVER['REMOTE_ADDR'];
$c_start = date('Y-m-d H-i-s',$start);
$c_end = date('Y-m-d H-i-s',$end);
if($c->update_class($nam,$count,$c_start,$c_end,$closed,$addr,$des,$in_ip,$in_mb,$cid)){
    echo json_encode(["msg" => "更新成功", "status" => "yes",'errCode'=>0]);
    exit(0);
}else{
    echo json_encode(["msg" => "添加失败", "status" => "no"]);
    exit(0);
}

