<?php
require("include/func_qr.php");
QRcode::png('http://app.huazhuedu.com/intro_sign.php?saler='.$_GET['info']);