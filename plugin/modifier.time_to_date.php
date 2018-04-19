<?php
function smarty_modifier_time_to_date($str)
{
    $tmp =date("m-d",strtotime($str));
    return $tmp;
}
