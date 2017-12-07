<?php
/**
 * Created by PhpStorm.
 * User: artur
 * Date: 02.12.17
 * Time: 17:27
 */
require 'vendor/autoload.php';

use Classes\FileDatabaseManager;
use Classes\FileDatabaseConnection;
use Classes\AHTTPRequest;
use Classes\AHTTPResponse;
use Classes\MailManager;
use App\Application;
use Classes\Validator;

$GLOBALS['config'] = parse_ini_file(__DIR__ . '/config.ini', true);

$dbConnection = new FileDatabaseConnection(
    $GLOBALS['config']['db']['baza'] ?? "",
    $GLOBALS['config']['db']['login'] ?? "",
    $GLOBALS['config']['db']['pass'] ?? ""
);
$mailManager = new MailManager('test@gmail.com', 'admin@provectus.com');
$dbManager = new FileDatabaseManager($dbConnection);
$application = new Application();
$validator = new Validator();

$application->setMailManager($mailManager);
$application->setDbManager($dbManager);
$application->setValidator($validator);

$application->run(new AHTTPRequest($GLOBALS['config']['http']['url'] ?? "", new AHTTPResponse()));
echo $application->sendEmail(7);
