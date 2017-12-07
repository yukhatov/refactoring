<?php
/**
 * Created by PhpStorm.
 * User: artur
 * Date: 02.12.17
 * Time: 16:23
 */
namespace Classes;

use Interfaces\IConnection;
use Interfaces\IDatabaseManager;

/**
 * Class DatabaseManager
 */
class FileDatabaseManager implements IDatabaseManager
{
    /**
     * @var IConnection
     */
    private $databaseConnection;

    /**
     * DatabaseManager constructor.
     * @param IConnection $connection
     */
    public function __construct(IConnection $connection)
    {
        $this->databaseConnection = $connection;
    }

    /**
     * @return bool
     */
    public function read() : bool
    {
        return file_get_contents($this->databaseConnection->getDatabaseName());
    }

    /**
     * @param string $content
     * @return bool
     */
    public function write(string $content) : bool
    {
        return file_put_contents($this->databaseConnection->getDatabaseName(), $content, FILE_APPEND);
    }
}