<?php
use inc\Vali;
use inc\Chart;
use inc\Admin;
error_reporting(0);
require_once("inc/Auto.php");
require_once('set_conf.php');
session_start();
spl_autoload_register('autoload');
$v=new Vali();
$v->ajax_check_login($_SESSION['mobile'],session_id());
if(!$v->check_lvl(90)){
    echo json_encode(['status'=>'no','msg'=>'权限不够，请升级用户!']);
    exit();
}
$c= new Chart();
switch ($_POST['action']){
    case 'area':
        $a_count=$c->get_mbaddr_count();
        $s=$c->get_mbadr();
        if( !$a_count || !$s ) {
            echo json_encode(['status'=>'no','msg'=>'读取数据库错误，请联系管理员!']);
            exit();
        }else{
            $area_select_count = 0;
            foreach ($s as $item) {
                $area_select_count += intval($item[1]);
            }
            $other_count = intval($a_count[0]) - $area_select_count;
            array_push($s,['其他',$other_count]);
            echo json_encode(['status' => 'yes','msg'=>'获取数据成功','data'=>$s]);
            exit();
        }
        break;
    default:
        break;
}