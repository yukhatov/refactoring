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
use Core\MailManager;
use Core\FileDatabaseManager;
use Core\FileDatabaseConnection;
use Core\AHTTPRequest;
use Core\Validator;

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
        $application->setValidator(new Validator());

        $this->assertStringEndsWith("too low", $application->sendEmail(2));
        $this->assertStringEndsWith("between 3 and 6", $application->sendEmail(5));
        $this->assertStringEndsWith("over 7", $application->sendEmail(8));
    }

    public function testRun() : void
    {
        $application = new Application();

        $application->setDbManager(new FileDatabaseManager(new FileDatabaseConnection()));

        $this->assertTrue($application->run(new AHTTPRequest($GLOBALS['config']['http']['url'] ?? "")));
    }
}