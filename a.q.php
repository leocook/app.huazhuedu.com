<?php
use inc\Survey;
error_reporting(0);
require_once("inc/Auto.php");
spl_autoload_register('autoload');
$s= new Survey();
if($s->save($_POST)) {
    header("Location: q_result.php?r=success");
}else{
    header("Location: q_result.php?r=err");
}
