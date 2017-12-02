<?php
/**
 * Created by PhpStorm.
 * User: artur
 * Date: 02.12.17
 * Time: 16:18
 */
require_once 'IConnection.php';

/**
 * Class DatabaseConnection
 */
class DatabaseConnection implements IConnection
{
    /**
     * @var string
     */
    private $dbName;
    /**
     * @var string
     */
    private $dbUser;
    /**
     * @var string
     */
    private $dbPass;

    /**
     * DatabaseConnection constructor.
     */
    public function __construct()
    {
        $config = parse_ini_file($GLOBALS['configPath'], true);

        $this->dbName = $config['db']['baza'] ?? "";
        $this->dbUser = $config['db']['login'] ?? "";
        $this->dbPass = $config['db']['pass'] ?? "";
    }

    /**
     * @return string
     */
    public function getDatabaseName() : string
    {
        return $this->dbName;
    }
}