<?php
interface iLogger{
    public function info($message);
    public function debug($message);
    public function warn($message);
    public function error($message);
}