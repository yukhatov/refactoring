<?php
/**
 * Created by PhpStorm.
 * User: artur
 * Date: 02.12.17
 * Time: 17:27
 */
//$loader = require_once __DIR__ . '/vendor/autoload.php';
require 'vendor/autoload.php';

use Core\FileDatabaseManager;
use Core\FileDatabaseConnection;
use Core\AHTTPRequest;
use Core\MailManager;
use App\Application;

$GLOBALS['config'] = parse_ini_file(__DIR__ . '/config.ini', true);

$dbManager = new FileDatabaseManager(new FileDatabaseConnection());
$mailManager = new MailManager('test@gmail.com', 'admin@provectus.com');
$application = new Application();

$application->setDbManager($dbManager);
$application->setMailManager($mailManager);

$application->run(new AHTTPRequest($GLOBALS['config']['http']['url'] ?? ""));
$application->sendEmail(7);
