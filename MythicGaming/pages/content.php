<?php

$file = dirname(__FILE__) . "/home.php";

if(isset($_GET['page'])){
    $file='pages/'.$_GET['page'];
    $option = $_GET['page'];
    
    $f = dirname(__FILE__) . "/$option.php";
    if(file_exists($f)){
        $file = $f;
    }
}

require_once($file);