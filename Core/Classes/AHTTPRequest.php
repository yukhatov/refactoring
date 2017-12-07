<?php
/**
 * Created by PhpStorm.
 * User: artur
 * Date: 02.12.17
 * Time: 16:50
 */
namespace Classes;

use Interfaces\IRequest;
use Interfaces\IResponse;

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
     * @var IResponse
     */
    private $response;

    /**
     * AHTTPRequest constructor.
     * @param string $url
     * @param IResponse $response
     */
    public function __construct(string $url, IResponse $response)
    {
        $this->response = $response;
        $this->ch = curl_init($url);

        curl_setopt($this->ch, CURLOPT_RETURNTRANSFER, true);
    }

    /**
     * @return IResponse
     */
    public function send() : IResponse
    {
        $this->response->setContent(curl_exec($this->ch));

        curl_close($this->ch);

        return $this->response;
    }
}