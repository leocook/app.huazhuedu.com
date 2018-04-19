<?php
use inc\Vali;
require("inc/Auto.php");
require('set_conf.php');
spl_autoload_register('autoload');
Vali::check_client();
if(!isset($_GET['id'])){
    $id= '01';
}else{
    $id=Vali::filter_bid($_GET['id']);
}
if($id){
    switch ($id){
        case '01':
            $title = '初级消防员';
            $bid='01';
            break;
        case '03':
            $title = '中级消防员';
            $bid='03';
            break;
        default:
            $title = '初级消防员';
            $bid='01';
    }
    $smarty = new Smarty_HZ();
    $smarty->assign('bid',$bid);
    $smarty->assign('title',$title);
    $smarty->display('nav.tpl');
}
