<?php
include("Logger.php");


class TextLogger extends Logger {

    private static $instance = null;
    private $handle;

    /**
     * gets the filename from the config file
     * opens the file in append mode
     */
    private function init(){
        $configRdrInstance = ConfigReader::getInstance();
        $filename = $configRdrInstance->getConfigData('loggingfileName');
        $this->handle = fopen($filename,  'a');
    }

    /**
     * gets the logging level from base logger class constructor
     *  calls the init function
     */
    protected function __construct(){
        parent::__construct();
        $this->init();
    }

    /**
     * static function to create a single instance
     * of TextLogger class
     */
    public static function getInstance(){
        if(self::$instance == null){
            self::$instance = new self;
        }
        return self::$instance;
    }

    /**
     * writes message to the file
     * @param string $message
     */
    protected function write_log($message) {
        $this->write_string($message);
    }

    /**
     * writes current date, level and message to the log file
     * @param string $message
     */
    private function write_string($message)  {
        $current_time = date("d-M-Y, h:i:s a");
        fwrite($this->handle, $current_time. " ".$this->level. " ".$message.PHP_EOL);
        echo 'Successfully logged to text file';
    }
}