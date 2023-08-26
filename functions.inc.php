<?php

function getFormatDate($str){
    $date = date("d-m-y", strtotime($str));
    echo $date;
}

?>