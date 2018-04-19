<?php
function get_question($mysqli){
    $sql = "select id,question,param,lamps,scrn,mul,status,sound,answer from hosts where host= 'sj'";
    $mysqli->query($sql);
    $res = $mysqli->query($sql);
    $rows = $res->fetch_all(MYSQLI_ASSOC);
    if(!$rows){
        exit('数据库查询错误');
    }
    $res->free();
    return $rows;
}