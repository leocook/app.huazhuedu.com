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
$_SESSION['exam']='1';
$exam = new Exam();
$rnd = mt_rand(1,9);
$q_info=$exam->get_qid("100".$rnd);
$name = $q_info['nam'];
$SC_rows=$exam->get_num_questions($q_info['sc_que']);
$MC_rows=$exam->get_num_questions($q_info['mc_que']);
$TF_rows=$exam->get_num_questions($q_info['tf_que']);
$scCount=count($SC_rows);
$mcCount=count($MC_rows);
$tfCount=count($TF_rows);
$scores=[
    'scScore'=>$q_info['sc_score'],
    'mcScore'=>$q_info['mc_score'],
    'tfScore'=>$q_info['tf_score']
];
$rec = new Record();
$rec->record(2,1,$name);
$smarty = new Smarty_HZ();
$smarty->assign('title',"真题考试");
$smarty->assign('name',$name);
$smarty->assign('exam',$scores);
$smarty->assign('mc_start',$scCount);
$smarty->assign('tf_start',$scCount+$mcCount);
$smarty->assign('count',$scCount+$mcCount+$tfCount);
$smarty->assign('sc',$SC_rows );
$smarty->assign('mc',$MC_rows );
$smarty->assign('tf',$TF_rows );
$smarty->assign('js0',"./script/md5.js");
$smarty->assign('js1',"./script/exam.js?v=".time());
$smarty->assign('css0',"./style/exam.css");
$smarty->assign('css1',"./style/nz.css");
$smarty->display('exam.tpl');


