<?php 

spl_autoload_register('autoLoad');

function autoLoad($className){
    $path = "Core/";
    $extension = ".php";
    $fullPath = $path . $className . $extension;

    try{
        if (!file_exists($fullPath)){
            return false;
        }
    }
    catch (Exception $e){
        echo 'Caught exception: ', $e->getMessage();
    }

    include_once $fullPath;
}