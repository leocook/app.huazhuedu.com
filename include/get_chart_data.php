<?php
session_start();
//require("chk_login.php");
require("func_conn.php");
require("func_chart.php");
if(!isset($_GET["type"])){
    $tp = "week";
}else{
    $tp= chk_chart_param($_GET["type"]);
}
if(!$tp){
    echo json_encode(['err'=>'no']);
}
else{
    $mysqli = get_conn();
    if($tp==='mon'){
        $creat = get_create($mysqli,30);
    }
    elseif($tp==='tmon'){
        $creat = get_create($mysqli,90);
    }
    elseif($tp==='year'){
        $creat = get_create($mysqli,365);
    }
    else{
        $creat = get_create($mysqli,7);
    }
    close_conn($mysqli);
    echo json_encode(['err'=>'yes','d'=>$creat]);
}



