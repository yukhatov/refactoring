<?php
/**
 * Created by PhpStorm.
 * User: artur
 * Date: 02.12.17
 * Time: 16:23
 */
require_once 'DatabaseConnection.php';
require_once 'IDatabaseManager.php';

/**
 * Class DatabaseManager
 */
class DatabaseManager implements IDatabaseManager
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
     * @return string
     */
    public function read() : string
    {
        return file_get_contents($this->databaseConnection->getDatabaseName());
    }

    /**
     * @param string $content
     * @return string
     */
    public function write(string $content) : string
    {
        return file_put_contents($this->databaseConnection->getDatabaseName(), $content, FILE_APPEND);
    }
}