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
     * @param string $content
     */
    public function setContent(string $content)
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