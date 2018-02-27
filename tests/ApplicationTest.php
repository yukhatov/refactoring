<?php
/**
 * Created by PhpStorm.
 * User: artur
 * Date: 03.12.17
 * Time: 14:11
 */
require 'vendor/autoload.php';

use PHPUnit\Framework\TestCase;
use App\Application;
use Classes\MailManager;
use Classes\FileDatabaseManager;
use Classes\FileDatabaseConnection;
use Classes\AHTTPRequest;
use Classes\Validator;

/**
 * @covers Application
 */
class ApplicationTest extends TestCase
{
    private $config;
    
    private $application;
    
    public function __construct($name = null, array $data = [], $dataName = '')
    {
        parent::__construct($name, $data, $dataName);

        $this->config = parse_ini_file(__DIR__ . '/../config.ini', true);
        $dbConnection = new FileDatabaseConnection(
            $this->config['db']['baza'] ?? "",
            $this->config['db']['login'] ?? "",
            $this->config['db']['pass'] ?? ""
        );

        $this->application = new Application(
            new FileDatabaseManager($dbConnection),
            new MailManager('test@gmail.com', 'admin@provectus.com'),
            new Validator()
        );
    }

    /**
     * @expectedException        Exception
     * @expectedExceptionMessage Request error
     */
    public function testRunRequestError() : void
    {
        $this->application->run(new AHTTPRequest(""));
    }
}