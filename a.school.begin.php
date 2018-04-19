<?php
use inc\Vali;
use inc\Custom;
require("inc/Auto.php");
require('set_conf.php');
spl_autoload_register('autoload');
//Vali::check_client();
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
    $data[]=['des'=>"授课地点",'val'=>$info['addr']];
    $data[]=['des'=>"开始时间",'val'=>$info['start']];
    $data[]=['des'=>"结束时间",'val'=>$info['end']];
    $data[]=['des'=>"备注",'val'=>$info['des']];
    echo json_encode(['status'=>'yes','data'=>$data]);
    exit();
}