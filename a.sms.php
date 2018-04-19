<?php

use inc\Vali;
use inc\Sms;
//error_reporting(0);
require_once("inc/Auto.php");
session_start();
spl_autoload_register('autoload');
$_SESSION["SMS"] = mt_rand(1200,9998);
$v = new Vali();
$mb_to = Vali::filter_mobile($_POST['mb']);
if(!$mb_to){
    echo json_encode(["status"=>"no","msg"=>"请输入正确的手机号码！"]);
    exit(0);
}
if($v->is_singed($mb_to)){
    echo json_encode(["status"=>"no","msg"=>"您已经是我们的用户，请勿重复注册！"]);
    exit(0);
}
$r = Sms::send($mb_to,$_SESSION["SMS"]);
if($r->Message ==="OK"){
    echo json_encode(["status"=>"yes","msg"=>"注册码已成功发送！"]);
    exit(0);
}else{
    echo json_encode(["status"=>"no","msg"=>"发送频繁，请一分钟以后再试！"]);
    exit(0);
}