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
    echo json_encode(['status'=>'no','msg'=>'请先登录!','errCode'=>1]);
    exit();
}
$mb = $_SESSION['mobile'];
$v=new Vali();
if(!$v->ajax_ck_login($mb,$sid)){
    echo json_encode(['status'=>'no','msg'=>'请先登录!','errCode'=>1]);
    exit();
}
if(!$v->check_lvl(50)){
    echo json_encode(['status'=>'no','msg'=>'权限不足!','errCode'=>2]);
    exit();
}
if(!isset($_POST['id_'])){
    echo json_encode(['status'=>'no','msg'=>'空参数']);
    exit();
}
$id = Vali::filter_cust_id($_POST['id_']);
if(!$id){
    echo json_encode(['status'=>'no','msg'=>'参数错误']);
    exit();
}
$c= new Custom();
$is_exist = $c->is_custom_exist($id);
if(!$is_exist){
        echo json_encode(['status'=>'no','msg'=>'没有此用户信息']);
        exit();
}else{
    $data=[];
    $info = $c->get_custom_info($id);
    $data[]=['des'=>"身份证号",'val'=>$info['id_num']];
    $data[]=['des'=>"手机号码",'val'=>$info['mb']];
    $data[]=['des'=>"固定电话",'val'=>$info['tel']];
    $data[]=['des'=>"单位名称",'val'=>$info['end']];
    echo json_encode(['status'=>'yes','data'=>$data]);
    exit();
}