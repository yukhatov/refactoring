<?php
/**
 * Created by PhpStorm.
 * User: artur
 * Date: 03.12.17
 * Time: 14:11
 */
use PHPUnit\Framework\TestCase;

require_once 'Application.php';
require_once 'Core/MailManager.php';
require_once 'Core/FileDatabaseManager.php';
require_once 'Core/FileDatabaseConnection.php';

/**
 * @covers Application
 */
class ApplicationTest extends TestCase
{
    public function __construct($name = null, array $data = [], $dataName = '')
    {
        parent::__construct($name, $data, $dataName);
        $GLOBALS['config'] = parse_ini_file(__DIR__ . '/../config.ini', true);
    }

    public function testSendEmail() : void
    {
        $application = new Application();

        $application->setMailManager(new MailManager('test@gmail.com', 'admin@provectus.com'));

        $this->assertStringEndsWith("too low", $application->sendEmail(2));
        $this->assertStringEndsWith("between 3 and 6", $application->sendEmail(5));
        $this->assertStringEndsWith("over 7", $application->sendEmail(8));
    }

    public function testRun() : void
    {
        $application = new Application();

        $application->setDbManager(new FileDatabaseManager(new FileDatabaseConnection()));

        $this->assertTrue($application->run(new MyHTTPRequest($GLOBALS['config']['http']['url'] ?? "")));
    }
}