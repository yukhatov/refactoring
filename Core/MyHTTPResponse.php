<?php
/**
 * Created by PhpStorm.
 * User: artur
 * Date: 02.12.17
 * Time: 16:50
 */
namespace Core;

require_once 'IResponse.php';

/**
 * Class MyHTTPResponse
 */
class MyHTTPResponse implements IResponse
{
    /**
     * @var
     */
    private $content;

    /**
     * MyHTTPResponse constructor.
     * @param $content
     */
    public function __construct($content)
    {
        $this->content = $content;
    }

    /**
     * @return string
     */
    public function getContent() : string
    {
        return $this->content;
    }
}