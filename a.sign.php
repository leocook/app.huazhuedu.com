<?php

use inc\User;
use inc\Vali;
use inc\Admin;
error_reporting(0);
require_once("inc/Auto.php");
session_start();
spl_autoload_register('autoload');
$ggid = '01a007'; //新用户使用套餐
$dday='7'; //新用户天数
$mb = Vali::filter_mobile($_POST['mb']);
if(!$mb){
    echo json_encode(["err" => "手机号码非法", "status" => "no"]);
    exit(0);
}
$pwd = Vali::filter_pwd($_POST['pwd']);
if(!$pwd){
    echo json_encode(["err" => "密码格式不对，请检查", "status" => "no"]);
    exit(0);
}
$code=Vali::filter_captcha($_POST["code"]);
if(!$code){
    echo json_encode(["err" => "验证码格式错误", "status" => "no"]);
    exit(0);
}
if($code!=$_SESSION["SMS"]){
    echo json_encode(["err" => "验证码错误", "status" => "no"]);
    exit(0);
}
$v= new Vali();
if ($v->is_singed($mb)) {
    echo json_encode(["err" => "您已经是我们的用户了，请登陆", "status" => "no"]);
    exit(0);
}
$saler = Vali::filter_mobile($_POST['saler']);

$u = new User();
if($u->sign($mb,$pwd,$saler,0)){
    $a=new Admin();
    if($a->add_order($mb,$ggid,$dday)>0){
        if($u->sign_login($mb,$pwd,session_id())){
            echo json_encode(["err" => "注册成功", "status" => "yes"]);
        }else{
            echo json_encode(["err" => "注册成功,登录失败!", "status" => "no"]);
        }
    }
}else{
    echo json_encode(["err" => "注册失败", "status" => "no"]);
}