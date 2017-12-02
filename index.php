<?php
/**
 * Created by PhpStorm.
 * User: artur
 * Date: 02.12.17
 * Time: 17:27
 */
require_once 'Application.php';
require_once 'MailManager.php';
require_once 'DatabaseManager.php';

$GLOBALS['configPath'] = __DIR__ . '/config.ini';

$dbManager = new DatabaseManager(new DatabaseConnection());
$mailManager = new MailManager('test@gmail.com', 'admin@provectus.com');
$application = new Application();

$application->setDbManager($dbManager);
$application->setMailManager($mailManager);

try {
    echo $application->run(7);
} catch (Exception $e) {
    echo $e->getMessage();
}

