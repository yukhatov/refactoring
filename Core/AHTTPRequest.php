<?php
/**
 * Created by PhpStorm.
 * User: artur
 * Date: 02.12.17
 * Time: 16:50
 */
namespace Core;

use Core\IRequest;
use Core\IResponse;

/**
 * Class AHTTPRequest shortcut for ASCII Http request
 */
class AHTTPRequest implements IRequest
{
    /**
     * @var resource
     */
    private $ch;

    /**
     * AHTTPRequest constructor.
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
        $response = new AHTTPResponse(curl_exec($this->ch));

        curl_close($this->ch);

        return $response;
    }
}