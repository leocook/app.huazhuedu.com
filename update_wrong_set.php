<?php
require_once("include/chk_login.php");
require_once('set_conf.php');
require_once("include/func_exam.php");
$mb = $_SESSION["mobile"];
$mysqli = get_conn();
$new_str = $_POST["p"];
$old_str = get_user_wrong_set($mysqli,$mb);
$new_wr = del_wr_str($new_str,$old_str);
update_wrong_set($mysqli,$new_wr,$mb);
close_conn($mysqli);
echo json_encode(["result"=>"删除成功!"]);
?>