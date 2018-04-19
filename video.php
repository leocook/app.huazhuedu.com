<?php
use inc\Vali;
use inc\Video;
require("inc/Auto.php");
require('set_conf.php');
spl_autoload_register('autoload');
Vali::check_client();
if(!isset($_GET['id'])){
    $id=1;
}else{
    $id=intval($_GET['id']);
}
$v = new Video();
$videos = $v->get_videos($id);
$smarty = new Smarty_HZ();
$smarty->assign('title',$videos['b_name']);
$smarty->assign('name',$videos['s_name']);
$smarty->assign('videos',$videos['list']);
$smarty->display('video.tpl');