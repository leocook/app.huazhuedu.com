<?php
use inc\Vali;
use inc\Exam;
require("inc/Auto.php");
require('set_conf.php');
spl_autoload_register('autoload');
Vali::check_client();
if(!isset($_GET['id'])){
    $id='0101';
}else{
    $id= Vali::filter_real_que_id($_GET['id']);
}
switch ($id){
    case '0101':
        $title = '初级消防员历届考题';
        $img ='zhenti_01.png';
        break;
    case '0102':
        $title = '中级消防员历届考题';
        $img ='zhenti_02.png';
        break;
    default:
        $title = '历届考题';
        $img ='zhenti_01.png';
        break;
}
$e = new Exam();
$list = $e->get_real_que_list($id);
if($list){
    $smarty = new Smarty_HZ();
    $smarty->assign('title',$title);
    $smarty->assign('img',$img);
    $smarty->assign('list',$list);
    $smarty->display('real_questions.tpl');
}else{
    header('Location:404.php');
    exit(0);
}