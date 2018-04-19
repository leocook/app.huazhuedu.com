<?php
function chk_chart_param($str)
{
    if (preg_match('/^[a-z]{2,4}$/', $str, $matches)) {
        $p = $matches[0];
    }
    return $p;
}


function get_create($mysqli,$day)
{
    $sql = "SELECT count(*), DATE_FORMAT(createTime, '%Y-%m-%d') AS t FROM user WHERE TO_DAYS(NOW()) - TO_DAYS(createTime)<=$day GROUP BY t ORDER BY t";

    $res = $mysqli->query($sql);
    if (!$res) {
        die("获取数据失败！" . $mysqli->error);
    }
    $result = $res->fetch_all();
    $res->free();
    return $result;
}

/**
 * @param $mysqli
 * @param $day
 * @ct = count
 * @o  =   1
 * @w  =  7
 * @t  =  30
 * @n  = 90
 */
function get_user_count($mysqli)
{
    $sql = "call get_active(@ct,@o,@w,@t,@n)";
    $mysqli->query($sql);
    $res = $mysqli->query("select @ct,@o,@w,@t,@n");
    if (!$res) {
        die("获取数据失败！" . $mysqli->error);
    }
    $result = $res->fetch_assoc();
    $res->free();
    return $result;
}