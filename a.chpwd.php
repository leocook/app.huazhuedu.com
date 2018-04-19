<?php

use inc\Vali;
use inc\Sms;
use inc\User;
//error_reporting(0);
require_once("inc/Auto.php");
session_start();
spl_autoload_register('autoload');
$v=new Vali();
$mb = Vali::filter_mobile($_POST['mb']);
if(!$mb){
    echo json_encode(["msg" => "手机号码不符合要求", "status" => "no"]);
    exit(0);
}
if(!$v->is_singed($mb)){
    echo json_encode(["msg" => "您还不是我们的会员，请先注册", "status" => "no"]);
    exit(0);
}
switch ($_POST['action']){
    case 'sms':
        $_SESSION["SMS"] = mt_rand(1200,9998);
        $r = Sms::send($mb,$_SESSION["SMS"]);
        if($r->Message ==="OK"){
            echo json_encode(["status"=>"yes","msg"=>"注册码已成功发送！"]);
            exit(0);
        }else{
            echo json_encode(["status"=>"no","msg"=>"发送频繁，请一分钟以后再试！"]);
            exit(0);
        }
    case 'ch':
        $pwd =Vali::filter_pwd($_POST["pwd"]);
        if (!$pwd) {
            echo json_encode(["msg" => "密码不符合要求", "status" => "no"]);
            exit(0);
        }
        if(Vali::filter_captcha($_POST["code"])!==(string)$_SESSION["SMS"]){
            echo json_encode(["msg" => "验证码错误", "status" => "no","code"=>$_SESSION["SMS"]]);
            exit(0);
        }
        $p_new = md5($pwd,false);
        $u= new User();
        if($u->change_pwd($mb,$p_new)){
            echo json_encode(["msg" => "修改成功，请重新登陆！", "status" => "yes"]);
            Vali::logout();
            exit(0);
        }else{
            echo json_encode(["msg" => "修改密码失败！", "status" => "no"]);
            exit(0);
        }
    default:
        echo json_encode(["msg" => "参数错误", "status" => "no"]);
        exit(0);
}

