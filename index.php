<?php
/**
 * Created by PhpStorm.
 * User: artur
 * Date: 02.12.17
 * Time: 17:27
 */
require 'vendor/autoload.php';

use Core\FileDatabaseManager;
use Core\FileDatabaseConnection;
use Core\AHTTPRequest;
use Core\MailManager;
use App\Application;
use Core\Validator;

$GLOBALS['config'] = parse_ini_file(__DIR__ . '/config.ini', true);

$mailManager = new MailManager('test@gmail.com', 'admin@provectus.com');
$dbManager = new FileDatabaseManager(new FileDatabaseConnection());
$application = new Application();
$validator = new Validator();

$application->setMailManager($mailManager);
$application->setDbManager($dbManager);
$application->setValidator($validator);

$application->run(new AHTTPRequest($GLOBALS['config']['http']['url'] ?? ""));
echo $application->sendEmail(7);
