<?php
/**
 * Created by PhpStorm.
 * User: artur
 * Date: 02.12.17
 * Time: 16:18
 */
namespace Core;

use Core\IConnection;

/**
 * Class FileDatabaseConnection
 */
class FileDatabaseConnection implements IConnection
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
        $this->dbName = $GLOBALS['config']['db']['baza'] ?? "";
        $this->dbUser = $GLOBALS['config']['db']['login'] ?? "";
        $this->dbPass = $GLOBALS['config']['db']['pass'] ?? "";
    }

    /**
     * @return string
     */
    public function getDatabaseName() : string
    {
        return $this->dbName;
    }
}