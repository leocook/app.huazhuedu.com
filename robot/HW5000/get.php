<?php
require_once ("../../include/func_conn.php");
require_once ("../../include/func_HW5000.php");
$mysqli = get_conn();
$ques=get_question($mysqli);
header('content-type:text/html;charset=utf-8');
echo json_encode($ques);
close_conn($mysqli);