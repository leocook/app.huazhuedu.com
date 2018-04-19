<?php
use inc\Exam;
use inc\Vali;
use inc\Record;
require_once("inc/Auto.php");
require_once("set_conf.php");
session_start();
spl_autoload_register('autoload');
Vali::check_client();
$v=new Vali();
$v->check_login($_SESSION['mobile'],session_id());
$v->check_buy('D');
if(!isset($_GET['id'])){
    $id=1;
}else{
    $id = Vali::filter_paper_id($_GET['id']);
}

if(!$id or !$v->is_real_paper_exist($id)){
    header('Location:404.php');
    exit();
}
$_SESSION['exam']='1';
$e= new Exam();
$schema = $e->get_exam_schema('1001');
$scCount=(int)$schema["scCount"];
$mcCount=(int)$schema["mcCount"];
$tfCount=(int)$schema["tfCount"];

$SC_rows=$e->get_real_type_ques($id,'1');
$MC_rows=$e->get_real_type_ques($id,'2');
$TF_rows=$e->get_real_type_ques($id,'3');
$rec = new Record();
$rec->record(2,1,$schema["name"]);
$smarty = new Smarty_HZ();
$smarty->assign('title',"模拟考试");
$smarty->assign('name',$schema["name"]);
$smarty->assign('exam',$schema);
$smarty->assign('mc_start',$scCount);
$smarty->assign('tf_start',$scCount+$mcCount);
$smarty->assign('count',$scCount+$mcCount+$tfCount);
$smarty->assign('sc',$SC_rows );
$smarty->assign('mc',$MC_rows );
$smarty->assign('tf',$TF_rows );
$smarty->assign('js0',"./script/md5.js");
$smarty->assign('js1',"./script/exam.js");
$smarty->assign('css0',"./style/exam.css");
$smarty->assign('css1',"./style/nz.css");
$smarty->display('exam.tpl');



