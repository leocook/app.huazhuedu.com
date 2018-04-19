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
if(!$v->check_lvl(64)){
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
$c = new Custom();
if(!$c->is_custom_in_class($id)){
    echo json_encode(['status'=>'no','msg'=>'该用户未报名，不能修改']);
    exit();
}

if(!isset($_POST['cid_'])){
    echo json_encode(['status'=>'no','msg'=>'空参数']);
    exit();
}
$cid = Vali::filter_class_id($_POST['cid_']);
if(!$cid){
    echo json_encode(['status'=>'no','msg'=>'班次编码错误']);
    exit();
}

switch ($_POST['tp_']){
    case 'finance':
        if(!$v->check_finance()){
            echo json_encode(['status'=>'no','msg'=>'您不是财务人员，没有该权限']);
            exit();
        }
        if(!$c->is_full($cid)){
            if($c->update_cust_pay_stat($id)){
                echo json_encode(['status'=>'yes','msg'=>'交费信息确认成功']);
                exit();
            }else{
                echo json_encode(['status'=>'no','msg'=>'操作失败']);
                exit();
            }
        }else{
            echo json_encode(['status'=>'no','msg'=>'该班次缴费已超过额定人数，请联系管理员']);
            exit();
        }
        break;
    case 'operator':
        if(!$v->check_operator()){
            echo json_encode(['status'=>'no','msg'=>'您不是操作员，没有该权限']);
            exit();
        }
        if(!$c->is_full($cid)){
            if($c->update_cust_pass_stat($id)){
                echo json_encode(['status'=>'yes','msg'=>'班次分配确认成功']);
                exit();
            }else{
                echo json_encode(['status'=>'no','msg'=>'操作失败']);
                exit();
            }
        }else{
            echo json_encode(['status'=>'no','msg'=>'该班次已满，无法继续增添人数']);
            exit();
        }
        break;
    case 'admin':
        if(!$v->check_admin()){
            echo json_encode(['status'=>'no','msg'=>'您不是管理员，没有该权限']);
            exit();
        }
        if($c->is_reg_full($cid)){
            echo json_encode(['status'=>'no','msg'=>'目标班次已满']);
            exit();
        }else{
            if($c->update_cust_class($id,$cid)){
                echo json_encode(['status'=>'yes','msg'=>'班次更换成功!']);
                exit();
            }else{
                echo json_encode(['status'=>'no','msg'=>'操作失败']);
                exit();
            }
        }
        break;
    default:
        break;
}