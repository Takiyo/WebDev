<?php
include("LoggerFactory.php");


class TextLoggerFactory extends LoggerFactory{
    public function getLogger(){
        $txtLogger = TextLogger::getInstance();
        return $txtLogger;
    }
}