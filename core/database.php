<?php

/**
 * @class Database
 */
class Database
{

	/**
	* @desc data base user name
	* @var $_dbUser
	* @access private
	*/
	private $_dbUser;

	/**
	* @desc data base user password
	* @var $_dbPassword
	* @access private
	*/
	private $_dbPassword;

	/**
	* @desc host name
	* @var $_dbHost
	* @access private
	*/
	private $_dbHost;

	/**
	* @desc data base name
	* @var $_dbName
	* @access protected
	*/
	protected $_dbName;

	/**
	* @desc conection to the data base
	* @var $_connection
	* @access private
	*/
	private $_connection;

    /**
    * @desc data base instance
    * @var $_instance
    * @access private
    */
    private static $_instance;

	/**
	 * [__construct]
	 */
    private function __construct()
    {
       try {
		   //load from Config/Config.ini
           $config = parse_ini_file(getcwd() . '/config/config.ini');
		   $this->_dbHost = $config["host"];
		   $this->_dbUser = $config["user"];
		   $this->_dbPassword = $config["password"];
		   $this->_dbName = $config["database"];

           $this->_connection = new \PDO('mysql:host='.$this->_dbHost.'; dbname='.$this->_dbName, $this->_dbUser, $this->_dbPassword);
           $this->_connection->setAttribute(\PDO::ATTR_ERRMODE, \PDO::ERRMODE_EXCEPTION);
           $this->_connection->exec("SET CHARACTER SET utf8");
       }
       catch (\PDOException $e)
       {
           print "Error!: " . $e->getMessage();
           die();
       }
    }

	/**
	 * [prepare]
	 * @param  [type] $sql [description]
	 * @return [type]      [description]
	 */
	public function prepare($sql)
    {
        return $this->_connection->prepare($sql);
    }

	/**
	 * [instance singleton]
	 * @return [object] [class database]
	 */
    public static function instance()
    {
        if (!isset(self::$_instance))
        {
            $class = __CLASS__;
            self::$_instance = new $class;
        }
        return self::$_instance;
    }

    /**
     * [__clone Evita que el objeto se pueda clonar]
     * @return [type] [message]
     */
    public function __clone()
    {
        trigger_error('La clonación de este objeto no está permitida', E_USER_ERROR);
    }
}
