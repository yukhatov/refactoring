<?php
/**
 * Created by PhpStorm.
 * User: artur
 * Date: 02.12.17
 * Time: 16:50
 */
require_once 'IResponse.php';

class HTTPResponse implements IResponse
{
    private $content;

    public function __construct($content)
    {
        $this->content = $content;
    }

    public function getContent() : string
    {
        return $this->content;
    }
}