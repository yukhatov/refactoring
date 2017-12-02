<?php
/**
 * Created by PhpStorm.
 * User: artur
 * Date: 02.12.17
 * Time: 16:50
 */
require_once 'HTTPResponse.php';
require_once 'IRequest.php';

class HTTPRequest implements IRequest
{
    const configPath = __DIR__ . '/config.ini';

    private $ch;

    public function __construct($url)
    {
        $config = parse_ini_file(self::configPath, true);

        $this->ch = curl_init($config['http']['url'] ?? "");

        curl_setopt($this->ch, CURLOPT_RETURNTRANSFER, true);
    }

    public function send() : IResponse
    {
        $response = new HttpResponse(curl_exec($this->ch));

        curl_close($this->ch);

        return $response;
    }
}