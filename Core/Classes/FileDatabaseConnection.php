<?php
/**
 * Created by PhpStorm.
 * User: artur
 * Date: 02.12.17
 * Time: 16:18
 */
namespace Classes;

use Interfaces\IConnection;

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
    public function __construct(string $dbName, string $dbUser, string $dbPass)
    {
        $this->dbName = $dbName;
        $this->dbUser = $dbUser;
        $this->dbPass = $dbPass;
    }

    /**
     * @return string
     */
    public function getDatabaseName() : string
    {
        return $this->dbName;
    }
}