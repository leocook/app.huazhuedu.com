<?php
use inc\Vali;
use inc\Exam;
use inc\Record;
require("inc/Auto.php");
require('set_conf.php');
spl_autoload_register('autoload');
Vali::check_client();
session_start();
$v=new Vali();
$v->check_login($_SESSION['mobile'],session_id());
$v->check_buy('D');
if(!isset($_GET['id'])){
    $id=1;
}else{
    $id=intval($_GET['id']);
}
$e = new Exam();
$rows = $e->get_real_que($id);
$count=count($rows);
$title = '历年真题';
$rec= new Record();
$rec->record(1,1,$title.'_'.$id);
$smarty = new Smarty_HZ();
$smarty->assign('rs',$rows );
$smarty->assign('title',$title );
$smarty->assign('name',$title );
$smarty->assign('show_answer',"hidden");
$smarty->assign('chk_del_question',"hidden");
$smarty->assign('count',$count);
$smarty->assign('js0',"./script/test.js?v=".time());
$smarty->assign('js1',"./script/nz.js");
$smarty->assign('css0',"./style/exam.css");
$smarty->assign('css1',"./style/nz.css");
$smarty->display('test.tpl');
?>
