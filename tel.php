<?php
session_start();
require_once('set_conf.php');
$info = [
    [
        'name'=>'杭州总校',
        'tel'=>'400-013-8119',
        'addr'=>'杭州市拱墅区长青文化创意园1号楼601',
        'con'=>[
            ['name'=>'葛老师','mb'=>'15395833601'],
            ['name'=>'张老师','mb'=>'15658816895']
        ]
    ],
    [
        'name'=>'河南分校',
        'tel'=>'0371-53371028',
        'addr'=>'郑州市经开区华美 · 仟企汇科技园4号楼4楼',
        'con'=>[
            ['name'=>'李老师','mb'=>'18638271125']
        ]
    ],
    [
        'name'=>'安徽分校',
        'tel'=>'0551-65292523',
        'addr'=>'合肥市庐阳区花园街4号 · 安徽科技大厦8楼',
        'con'=>[
            ['name'=>'罗老师','mb'=>'18638271125']
        ]
    ],

];
$smarty = new Smarty_HZ();
$smarty->assign('title',"联系方式");
$smarty->assign('info',$info);
$smarty->display('tel.tpl');