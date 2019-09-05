<?php
include("LoggerFactory.php");


class DBLoggerFactory extends LoggerFactory{
    public function getLogger(){
        $dbLogger = DBLogger::getInstance();
        return $dbLogger;
    }
}