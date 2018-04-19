<?php
use inc\Vali;
use inc\Video;
use inc\Record;
error_reporting(0);
require_once("inc/Auto.php");
session_start();
spl_autoload_register('autoload');
$v=new Vali();
$v->ajax_check_login($_SESSION['mobile'],session_id());
$id = $v::filter_id($_POST['id']);
if(!$id){
    echo json_encode(['status'=>'no','msg'=>'参数错误','errcode'=>99]);
    exit();
}
$video = new Video();
if(substr($id,2,4)!=='0101'){
    if(!$v->ajax_has_priv('B')){
          echo json_encode(["status" => "no", "msg" => "该功能需要购买使用",'errcode'=>2]);
          exit(0);
    }
}
$v_param = $video->get_video_info($id);
$rec = new Record();
$rec->record(3,1,'视频学习'.'_'.$id);
echo json_encode(["status"=>"yes","path"=>$v_param["path"]]);
exit(0);