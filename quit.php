<?php
session_start();
require_once("include/func_login.php");
logout();
header("Location:/index.php ");
exit(0);
