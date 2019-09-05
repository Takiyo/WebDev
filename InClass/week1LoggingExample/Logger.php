<?php
include("iLogger.php");


class Logger implements iLogger{

    /**
     * constructor gets the logging level from config file
     */
    protected function __construct()
    {
        $configRdrInstance = ConfigReader::getInstance();
        $this->level = $configRdrInstance->getConfigData('logginglevel');
    }

    /**
     * writes debug messages to text or db log
     * @param string $message
     */

    public function debug($message) {
        if($this->level == 'debug') {
            $this->write_log($message);
        }
    }

    /**
     * writes info messages to text or db log
     * @param string $message
     */
    public function info($message) {
        if($this->level == 'info' || $this->level == 'debug' ) {
            $this->write_log($message);
        }
    }

    /**
     * writes warn messages to text or db log
     * @param string $message
     */
    public function warn($message) {
        if($this->level == 'warn' ||$this->level == 'info' || $this->level == 'debug' ) {
            $this->write_log($message);
        }
    }

    /**
     * writes error messages to text or db log
     * @param string $message
     */
    public function error($message) {
        if($this->level == 'error' || $this->level == 'warn' || $this->level == 'info' || $this->level == 'debug' ) {
            $this->write_log($message);
        }
    }

    /**
     * writes message to log
     * @param string $message
     */
    protected function write_log($message){}
}