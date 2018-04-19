<?php
use inc\Record;
use inc\Vali;
require("inc/Auto.php");
spl_autoload_register('autoload');
//Vali::check_client();
session_start();
$sid = session_id();
if(!isset($_SESSION['mobile'])){
    echo json_encode(['status'=>'no','msg'=>'请先登录!','errCode'=>1]);
    exit();
}
$mb = $_SESSION['mobile'];
$r = new Record();
$ip = $_SERVER['REMOTE_ADDR'];
switch ($_POST['tp_']){
    case '1': //章节练习
        $tp = 1;
        $stat = vali::filter_test_stat($_POST['stat_']);
        if(!$stat){
            echo json_encode(['status'=>'no','msg'=>'非法操作!']);
            exit();
        }
        $content = Vali::filter_test_id($_POST['id_']);
        if(!$content){
            echo json_encode(['status'=>'no','msg'=>'非法操作!']);
            exit();
        }
        $r->record($mb,$ip,$tp,$stat,$content);
        break;
    case '2': //随机考试
        $tp = 2;
        $stat = vali::filter_test_stat($_POST['stat_']);
        if(!$stat){
            echo json_encode(['status'=>'no','msg'=>'非法操作!']);
            exit();
        }
        $content = Vali::filter_book_id($_POST['id_']);
        if(!$content){
            echo json_encode(['status'=>'no','msg'=>'非法操作!']);
            exit();
        }
        $r->record($mb,$ip,$tp,$stat,$content);
        break;
    default:
        break;
}

