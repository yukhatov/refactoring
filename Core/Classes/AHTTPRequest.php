<?php
/**
 * Created by PhpStorm.
 * User: artur
 * Date: 02.12.17
 * Time: 16:50
 */
namespace Classes;

use Interfaces\IRequest;

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
     * @param string $url
     */
    public function __construct(string $url)
    {
        $this->ch = curl_init($url);

        curl_setopt($this->ch, CURLOPT_RETURNTRANSFER, true);
    }

    /**
     * @return string
     */
    public function send() : string
    {
        $content = curl_exec($this->ch);

        curl_close($this->ch);

        return $content;
    }
}