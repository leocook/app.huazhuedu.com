<?php
namespace inc;
class Live
{
    public static function breath(){
        echo json_encode(['liv'=>time()]) ;
    }

}