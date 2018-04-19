<?php

use inc\User;
use inc\Vali;
error_reporting(0);
require_once("inc/Auto.php");
session_start();
spl_autoload_register('autoload');

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
if($code!=$_SESSION["code_hz"]){
    echo json_encode(["err" => "验证码错误", "status" => "no"]);
    exit(0);
}
$u=new User();
if ($u->login($mb, $pwd,session_id())) {
    echo json_encode(["err" => "登陆成功","status" => "yes"]);
    exit(0);
} else {
    echo json_encode(["err" => "用户名或者密码错误", "status" => "no"]);
    exit(0);
}
