<?php
/**
 * Created by PhpStorm.
 * User: artur
 * Date: 02.12.17
 * Time: 16:50
 */

require_once 'MyHTTPResponse.php';
require_once 'IRequest.php';

/**
 * Class MyHTTPRequest
 */
class MyHTTPRequest implements IRequest
{
    /**
     * @var resource
     */
    private $ch;

    /**
     * MyHTTPRequest constructor.
     * @param $url
     */
    public function __construct(string $url)
    {
        $this->ch = curl_init($GLOBALS['config']['http']['url'] ?? "");

        curl_setopt($this->ch, CURLOPT_RETURNTRANSFER, true);
    }

    /**
     * @return IResponse
     */
    public function send() : IResponse
    {
        $response = new MyHTTPResponse(curl_exec($this->ch));

        curl_close($this->ch);

        return $response;
    }
}