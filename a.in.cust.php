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

$n = Vali::filter_chinese_name($_POST['nam_']);
if(!$n){
    echo json_encode(["msg" => "名字要求2-4个汉字", "status" => "no"]);
    exit(0);
}

$id=Vali::filter_id_num($_POST["id_"]);
if (!$id){
    echo json_encode(["msg" => "身份证号码非法", "status" => "no"]);
    exit(0);
}

$mb = Vali::filter_mobile($_POST['mb_']);
if(!$mb){
    echo json_encode(["msg" => "手机号码不符合要求", "status" => "no"]);
    exit(0);
}

$addr = Vali::filter_company($_POST['com_']);
if(!$addr){
    echo json_encode(["msg" => "单位名称不符合要求", "status" => "no"]);
    exit(0);
}

if(!empty($_POST['tel_'])){
    $tel = Vali::filter_tel($_POST['tel_']);
    if(!$tel){
        echo json_encode(["msg" => "固定电话格式不对", "status" => "no"]);
        exit(0);
    }
}else{
    $tel='';
}

if(!empty($_POST['des_'])){
    $des =htmlspecialchars(trim($_POST['des_']," ';"));
}else{
    $des='';
}
$c=new Custom();
if($c->is_custom_reg($id,$in_mb)){
    echo json_encode(["msg" => "该用户您已经添加", "status" => "no"]);
    exit(0);
}else{
    $in_ip = $_SERVER['REMOTE_ADDR'];
    if($c->in_cust($n,$id,$mb,$tel,$addr,$des,$in_mb,$in_ip)){
        echo json_encode(["msg" => "添加成功", "status" => "yes",'errCode'=>0]);
        exit(0);
    }else{
        echo json_encode(["msg" => "添加失败", "status" => "no"]);
        exit(0);
    }
}

