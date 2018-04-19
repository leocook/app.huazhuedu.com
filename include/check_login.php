<?php
session_start();
require("func_conn.php");
require("func_login.php");
error_reporting(0);
$mysqli = get_conn();
$sid = session_id();
if(isset($_SESSION["mobile"])) {
    $mb = $_SESSION["mobile"];
}else{
    $mb="";
}
$r=check_sid_in_db($mysqli,$mb,$sid);
if (!$_SESSION["login"] or $r == "0") {
    logout();
    echo json_encode(["status"=>"no"]);
    close_conn($mysqli);
    exit(0);
}
else {
    echo json_encode(["status"=>"yes","priv"=>$_SESSION["priv"]]);
    close_conn($mysqli);
    exit(0);
}
