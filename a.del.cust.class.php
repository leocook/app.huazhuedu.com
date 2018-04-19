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
    echo json_encode(['status'=>'no','msg'=>'用户编码错误']);
    exit();
}
if(!isset($_POST['cid_'])){
    echo json_encode(['status'=>'no','msg'=>'班次参数空']);
    exit();
}
$cid = Vali::filter_class_id($_POST['cid_']);
if(!$cid){
    echo json_encode(['status'=>'no','msg'=>'班次编码无效']);
    exit();
}
$c = new Custom();
if($c->is_class_closed($cid)){
    echo json_encode(['status'=>'no','msg'=>'该班次已关闭，不能删除报名信息']);
    exit();
}
if($c->del_cust_class($id)){
    echo json_encode(['status'=>'yes','msg'=>'删除报班成功!']);
    exit();
}else{
    echo json_encode(['status'=>'no','msg'=>'操作失败']);
    exit();
}