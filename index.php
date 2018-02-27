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

$config = parse_ini_file(__DIR__ . '/config.ini', true);
$dbConnection = new FileDatabaseConnection(
    $config['db']['baza'] ?? "",
    $config['db']['login'] ?? "",
    $config['db']['pass'] ?? ""
);
$application = new Application(
    new FileDatabaseManager($dbConnection),
    new MailManager('test@gmail.com', 'admin@provectus.com'),
    new Validator()
);

try {
    $response = new AHTTPResponse($application->run(new AHTTPRequest($config['http']['url'] ?? "")));
    
    $application->sendEmail(7);
} catch (Exception $e){
    die($e->getMessage());
}
