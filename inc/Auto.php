<?php
function autoload($cls)
{
    $cls_path = str_replace('\\', '/', $cls) . '.class.php';
    if (file_exists($cls_path)) {
        require_once($cls_path);
    } else {
        echo $cls_path;
        exit("程序出错，即将退出！");
    }
}
