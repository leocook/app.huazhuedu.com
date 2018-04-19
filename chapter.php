<?php
require_once('set_conf.php');
require_once("include/func_conn.php");
require_once("include/func_book.php");
if(!isset($_GET["id"])){
    $index="01";
}else{
    $index = get_book_index($_GET["id"]);
}
$mysqli = get_conn();
$books = get_books($mysqli,$index);
$parts = get_parts($mysqli,$index);
$chapters = get_chapters($mysqli,$index);
$mysqli->close();
switch ($index){
    case '01':
        $title = '初级题库';
        $name = '初级消防员';
        break;
    case '03':
        $title = '中级题库';
        $name = '中级消防员';
        break;
    default:
        $title = '初级题库';
        $name = '初级消防员';
        break;
}
$smarty = new Smarty_HZ();
$smarty->assign('title',$title);
$smarty->assign('name',$name);
$smarty->assign('parts',$parts);
$smarty->assign('chapters',$chapters);
$smarty->assign('js0',"script/chapter.js?v=".time());
$smarty->assign('js1',"script/nz.js");
$smarty->assign('css0',"style/chapter.css");
$smarty->assign('css1',"style/nz.css");
$smarty->display('chapter.tpl');
?>
