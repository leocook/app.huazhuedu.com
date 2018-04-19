<?php
use inc\Vali;
use inc\Record;
require("inc/Auto.php");
require('set_conf.php');
spl_autoload_register('autoload');
//Vali::check_client();
session_start();
$sid = session_id();
if(!isset($_SESSION['mobile'])){
    echo json_encode(['status'=>'no','msg'=>'您还没有登录','errCode'=>1]);
    exit();
}
$in_mb = $_SESSION['mobile'];
$v=new Vali();
if(!$v->ajax_ck_login($in_mb,$sid)){
    echo json_encode(['status'=>'no','msg'=>'您还没有登录','errCode'=>1]);
    exit();
}
if(!$v->check_lvl(50)){
    echo json_encode(['status'=>'no','msg'=>'对不起，您没有权限']);
    exit();
}
if(!isset($_POST['mb_'])){
    echo json_encode(['status'=>'no','msg'=>'缺少必要参数']);
    exit();
}else{
    $mb = Vali::filter_mobile($_POST['mb_']);
    if(!$mb){
        echo json_encode(['status'=>'no','msg'=>'参数格式错误']);
        exit();
    }
}

if(!isset($_POST['id_'])){
    echo json_encode(['status'=>'no','msg'=>'参数错误','errCode'=>2]);
    exit();
}
$id = Vali::filter_study_id($_POST['id_']);
if(!$id){
    echo json_encode(['status'=>'no','msg'=>'参数格式不匹配','errCode'=>3]);
    exit();
}
$rec = new Record();
$info = $rec->get_day_rec($in_mb,$id);
if($info){
    $data = [];
    foreach ($info as $i){
        $ch = explode('_',$i['content']);
        switch ($i['tp']){
            case '1':
                $data[]= [
                    'tim'=>$i['tim'],
                    't'=>'<span style="color:green">章节测试</span>',
                    'c'=>'章节名称:'.$rec->get_test_name($ch[1]),
                    'b'=>'章节编号:'.$ch[1]
                ];
                break;
            case '2':
                if($i['stat']==='1'){
                    $data[]= [
                        'tim'=>$i['tim'],
                        't'=>'<span style="color:red">在线测试</span>',
                        'c'=>'试卷名称:'.$ch[0],
                        'b'=>'试卷编号:'.$ch[1]
                    ];
                }else{
                    $data[]= [
                        'tim'=>$i['tim'],
                        't'=>'<span style="color:red">考试结束</span>',
                        'c'=>'本次得分:'.$ch[0],
                        'b'=>'试卷总分:'.$ch[1]
                    ];
                }
                break;
            case '3':
                $data[]= [
                    'tim'=>$i['tim'],
                    't'=>'<span style="color:blue">视频学习</span>',
                    'c'=>'视频名称:'.$rec->get_video_name($ch[1]),
                    'b'=>'视频编号:'.$ch[1]
                ];
                break;
            case 4:
                $data[]= [
                    'tim'=>$i['tim'],
                    't'=>'<span style="color:deeppink">错题复习</span>',
                    'c'=>'练习名称:'.$ch[0],
                    'b'=>'练习编号:'.$ch[1]
                ];
                break;
            default:
                $data[]= ['tim'=>$i['tim'],'c'=>$i['content']];
                break;
        }

    }
    echo json_encode(['status'=>'yes','msg'=>'获取成功','errCode'=>0,'data'=>$data]);
    exit();
}else{
    echo json_encode(['status'=>'yes','msg'=>'当天没有学习记录','errCode'=>4]);
    exit();
}

