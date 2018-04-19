<?php
//error_reporting(0);
require_once("set_conf.php");
switch ($_GET['r']){
    case 'success':
        $title = "提交成功";
        $msg = "问卷提交成功!";
        $img = "img/huizhang.png";
        break;
    case 'err':
        $title = "出错啦";
        $msg = "提交出了点小问题!";
        $img = "img/huizhang.png";
        break;
    default:
        $title = "出错啦";
        $msg = "您提交的参数，不符合要求！";
        $img = "img/huizhang.png";
        break;
}

$smarty = new Smarty_HZ();

$smarty->assign('title',$title);
$smarty->assign('msg',$msg);
$smarty->assign('img',$img);
$smarty->display('q_result.tpl');
