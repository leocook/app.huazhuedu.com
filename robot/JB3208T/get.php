<?php
require_once ("../../include/func_conn.php");
require_once ("../../include/func_JB3208T.php");
$mysqli = get_conn();
$ques=get_question($mysqli);
header('content-type:text/html;charset=utf-8');
$q=[];
foreach ($ques as $r){
    $a=["ques"=>$r['question'],
        "lamps"=>$r['lamps'],
        "scrn"=>$r['scrn'],
        "mul"=>$r['mul'],
        "stat"=>$r['status'],
        "sound"=>$r['sound'],
        "answer"=>$r['answer']
        ];
    array_push($q,$a);
}
echo json_encode($q);
close_conn($mysqli);