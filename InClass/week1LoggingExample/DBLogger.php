<?php
include("Logger.php");

class DBLogger extends Logger {

    private static $instance = null;
    private static $connection;
    private $dbtablename = null;

    /**
     * gets database details - hostname, username, password and table name
     * from config file
     */
    private function init()
    {
        $configRdrInstance = ConfigReader::getInstance();
        $hostname = $configRdrInstance->getConfigData('dbhost');
        $dbusername = $configRdrInstance->getConfigData('dbusername');
        $dbpassword = $configRdrInstance->getConfigData('dbpasswd');
        $dbname = $configRdrInstance->getConfigData('dbname');
        $dbtablename = $configRdrInstance->getConfigData('dbtablename');

        // binding the database table name to private variable $dbtablename
        $this->dbtablename = $dbtablename;

        $dbpassword= '';

        echo("<br>");
        $arr = get_defined_vars();
        print_r($arr);
        echo("<br>");

        // creating a new connection and assigning it to static variable $connection
        $dbconn = new mysqli($hostname, $dbusername, $dbpassword,  $dbname);
        if (mysqli_connect_errno()) {
            throw new Exception("Connect failed");
        }
        self::$connection = $dbconn;
    }

    /**
     * gets the logging level from Logger class constructor
     * calls the init method
     */
    protected function __construct(){
        parent::__construct();
        $this->init();
    }

    /**
     * checks whether an instance of DBLogger class exists, if not
     * creates an instance
     */
    public static function getInstance(){
        if(self::$instance == null)
        {self::$instance = new self;
        }
        return self::$instance;
    }

    /**
     * inserts message along with current time and level to db
     * @param string $message
     */
    protected function write_log($message) {
        $conn = self::$connection;
        $current_time =  date("d-M-Y, h:i:s a");
        $dbtablename = $this->dbtablename;

        //	creating the prepare statement
        if ($stmt = $conn->prepare("INSERT into $dbtablename (logtime, priority, message) values (?, ?, ?)")){
            // binding to parameters
            $stmt->bind_param('sss', $current_time, $this->level, $message);
            $stmt->execute();
            echo 'Successfully logged to database';
        }
        else
        {
            throw new Exception("Failed to insert");
        }
    }
}