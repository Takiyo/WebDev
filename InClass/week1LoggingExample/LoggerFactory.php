<?php
include("DBLogger.php");


abstract class LoggerFactory
{
abstract public function getLogger();
}