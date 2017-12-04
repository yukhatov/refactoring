<?php
/**
 * Created by PhpStorm.
 * User: artur
 * Date: 02.12.17
 * Time: 16:50
 */
namespace Core;

use Core\IResponse;

/**
 * Class AHTTPResponse shortcut for ASCII Http response
 */
class AHTTPResponse implements IResponse
{
    /**
     * @var
     */
    private $content;

    /**
     * AHTTPResponse constructor.
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