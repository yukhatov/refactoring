<?php
/**
 * Created by PhpStorm.
 * User: artur
 * Date: 02.12.17
 * Time: 17:27
 */
/*require_once 'Application.php';
require_once 'Core/MailManager.php';
require_once 'Core/FileDatabaseManager.php';
require_once 'Core/FileDatabaseConnection.php';*/

$GLOBALS['config'] = parse_ini_file(__DIR__ . '/config.ini', true);

$dbManager = new FileDatabaseManager(new FileDatabaseConnection());
$mailManager = new MailManager('test@gmail.com', 'admin@provectus.com');
$application = new Application();

$application->setDbManager($dbManager);
$application->setMailManager($mailManager);

$application->run(new MyHTTPRequest($GLOBALS['config']['http']['url'] ?? ""));
$application->sendEmail(7);
