<?php
function get_question($mysqli){
    $sql = "select question,param,answer from hosts where host= 'hw'";
    $mysqli->query($sql);
    $res = $mysqli->query($sql);
    $rows = $res->fetch_all(MYSQLI_ASSOC);
    $res->free();
    return $rows;
}