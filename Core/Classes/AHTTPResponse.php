<?php
/**
 * Created by PhpStorm.
 * User: artur
 * Date: 02.12.17
 * Time: 16:50
 */
namespace Classes;

use Interfaces\IResponse;

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
     * @param mixed $content
     */
    public function setContent($content)
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