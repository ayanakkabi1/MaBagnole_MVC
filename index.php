<?php

spl_autoload_register(function ($class) {
    $basedir=__DIR__  .'/app/' .$class .'.php';
    $filename=str_replace('\\','/',$basedir);
    if(file_exists($filename)){
        require_once $filename;
    }
});
?>