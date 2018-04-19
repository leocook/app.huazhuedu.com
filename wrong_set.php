<?php
require_once("include/chk_login.php");
require_once('set_conf.php');
require_once("include/func_exam.php");
$mysqli=get_conn();
$wr_answer = get_user_wrong_set($mysqli,$_SESSION["mobile"]);
if(!$wr_answer){
    $msg="错题集为空，请先参加模拟考试！";
    close_conn($mysqli);
    header('content-type:text/html;charset=utf-8');
    echo "<script>alert('$msg');window.history.back();</script>";
    exit(0);
}else{
    $ids=str_replace('|',',',$wr_answer);
    $rows =get_wr($mysqli,$ids);
}
shuffle($rows);
record($mysqli,4,1,'错题集'.'_'.$_SESSION["mobile"].'的错题集');
close_conn($mysqli);
$count = count($rows);
$title="模考错题汇总";
$smarty = new Smarty_HZ();
$smarty->assign('title',$title);
$smarty->assign('name',$title);
$smarty->assign('show_answer',"hidden");
$smarty->assign('chk_del_question',"");
$smarty->assign('rs',$rows);
$smarty->assign('count',$count);
$smarty->assign('js0',"./script/test.js");
$smarty->assign('js1',"./script/nz.js");
$smarty->assign('css0',"./style/exam.css");
$smarty->assign('css1',"./style/nz.css");
$smarty->display('test.tpl');
?>