<?php


class ConfigReader
{
    private static $instance = null;

    private function __construct(){

        //	opens the config file
        $configVars = parse_ini_file('Logger.ini', TRUE);

        //   create an associative array to store all config variables
        $configData = array();
        $configData['loggingtype'] = $configVars['LoggingType']['loggingtype'];
        $configData['logginglevel'] = $configVars['LoggingLevel']['logginglevel'];
        $configData['loggingfileName'] = $configVars['LoggingFileName']['loggingfileName'];
        $configData['dbhost'] = $configVars['Database']['host'];
        $configData['dbusername'] = $configVars['Database']['username'];
        $configData['dbpasswd'] = $configVars['Database']['passwd'];
        $configData['dbname'] = $configVars['Database']['dbname'];
        $configData['dbtablename'] = $configVars['Database']['table'];

        $this->configData = $configData;
    }

    /**
     * checks whether an instance of the class is available
     * if not creates an instance
     * @return instanace of ConfigReader
     */
    public static function getInstance()
    {
        if(self::$instance == null)
        {
            self::$instance = new self;
        }
        return self::$instance;
    }

    /**
     * gets data from Config file based on key
     * @return data
     * @param object $key
     */
    public  function getConfigData($key)
    {
        return $this->configData[$key];
    }
}