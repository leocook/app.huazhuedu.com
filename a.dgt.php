<?php
use inc\Admin;
use inc\Vali;
error_reporting(0);
require_once("inc/Auto.php");
session_start();
spl_autoload_register('autoload');
$v=new Vali();
$v->ajax_check_login($_SESSION['mobile'],session_id());
$mb = Vali::filter_mobile($_POST['mb']);
if(!$mb){
    echo json_encode(["msg" => "手机号码不符合要求", "status" => "no"]);
    exit(0);
}
if(!$v->is_singed($mb)){
    echo json_encode(["msg" => "此用户未注册，请先注册", "status" => "no"]);
    exit(0);
}
if(!$v->check_lvl(90)){
    echo json_encode(["msg" => "您的等级不够，请升级", "status" => "no"]);
    exit(0);
}
$admin = new Admin();
switch ($_POST['action']){
    case 'pass':
        if($admin->manage_dgt($mb,51)){
            echo json_encode(["msg" => "审核通过！", "status" => "yes"]);
            exit();
        }
        break;
    case 'rej':
        if($admin->manage_dgt($mb,2)){
            echo json_encode(["msg" => "删除成功", "status" => "yes"]);
            exit();
        }
        break;
    default:
        echo json_encode(["msg" => "参数错误", "status" => "no"]);
        exit(0);
}

