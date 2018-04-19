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
$id = Vali::filter_class_id($_POST['id_']);
if(!$id){
    echo json_encode(['status'=>'no','msg'=>'参数错误']);
    exit();
}
$c= new Custom();
$info = $c->get_class_info($id);
if(!$info){
    if(!$id){
        echo json_encode(['status'=>'no','msg'=>'没有开班信息']);
        exit();
    }
}else{
    $data=[];
    $reg_count = $c->get_reg_count($id);
    $reg_pass = $c->get_reg_pass($id);
    $reg_pay = $c->get_reg_pay($id);
    $totle_count = $info['count'];
    $data[]=['des'=>"报名情况",'val'=>"$reg_count : $reg_pay : $reg_pass"];
    $data[]=['des'=>"授课地点",'val'=>$info['addr']];
    $data[]=['des'=>"开始时间",'val'=>$info['start']];
    $data[]=['des'=>"结束时间",'val'=>$info['end']];
    $data[]=['des'=>"备注",'val'=>$info['des']];
    echo json_encode(['status'=>'yes','data'=>$data,'lvl'=>$_SESSION['lvl']]);
    exit();
}