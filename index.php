<?php

spl_autoload_register(function ($class) {
    $basedir=__DIR__  .'/app/' .$class .'.php';
    $filename=str_replace('\\','/',$basedir);
    if(file_exists($filename)){
        require_once $filename;
    }
});
$pdo=Database::getInstance();

$request=$_SERVER['REQUEST_URI'];
$path=parse_url($request,PHP_URL_PATH);
$path=trim($path,'/');
switch(true){
    case $path==='categories':
        $controller=new CategoriesController($pdo);
        $controller->listAction();
        break;
    case preg_match('#^vehicules/(\d+)$#',$path,$matches);
        $controller=new CategoriesController($pdo);
        $controller->showAction((int)$matches[1]);
        break;
    default:
        header("HTTP/1.0 404 Not Found");
        echo "<h1>404 Not Found</h1>";
        break;    
}
?>