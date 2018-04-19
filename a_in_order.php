<?php
use inc\Vali;
use inc\Admin;
error_reporting(0);
require_once("inc/Auto.php");
session_start();
spl_autoload_register('autoload');
$v=new Vali();
$v->ajax_check_login($_SESSION['mobile'],session_id());
if(!$v->check_lvl(50)){
    echo json_encode(['status'=>'no','msg'=>'权限不够，请联系操作员!']);
    exit();
}
$admin = new Admin();
switch ($_POST['action']){
    case 'search':
        $mb = $v::filter_mobile($_POST['mb']);
        if(!$mb){
            echo json_encode(['status'=>'no','msg'=>'手机号码不符合规定!']);
            exit();
        }
        if(!$v->is_singed($mb)){
            echo json_encode(['status'=>'no','msg'=>'该用户还没有注册!']);
        }else{
            echo json_encode(['status'=>'yes','orders'=>$admin->get_orders($mb),'mb'=>$mb]);
        }
        break;
    case 'add':
        if(!$v->check_op()){
            echo json_encode(['status'=>'no','msg'=>'权限不够，请联系操作员!']);
            exit();
        }
        $mb = $v::filter_mobile($_POST['mb']);
        if(!$v->is_singed($mb)){
            echo json_encode(['status'=>'no','msg'=>'该用户还没有注册!']);
            exit();
        }
        $mb = $v::filter_mobile($_POST['mb']);
        if(!$mb){
            echo json_encode(['status'=>'no','msg'=>'手机号码不符合规定!']);
            exit();
        }
        $capt = $v::filter_captcha($_POST['code']);
        if($capt!==$_SESSION["code_hz"]){
            echo json_encode(['status'=>'no','msg'=>'验证码输入错误!']);
            exit();
        }
        if($admin->add_order($mb,'01a365',365,$_SESSION['mobile'])>0){
            echo json_encode(['status'=>'yes','msg'=>'开通成功！']);
            exit();
        }
        break;
    case 'del':
        if(!$v->check_lvl(95)){
            echo json_encode(['status'=>'no','msg'=>'权限不够，请升级用户!']);
            exit();
        }
        $id = $v::filter_order_id($_POST['id']);
        if($admin->del_order_by_id($id)>0){
            echo json_encode(['status'=>'yes','msg'=>'删除成功！']);
            exit();
        }
        break;
    case "update":
        break;
    default:
}


