<?php
/**
 * Created by PhpStorm.
 * User: artur
 * Date: 02.12.17
 * Time: 19:57
 */
namespace Core;

interface IResponse
{
    /**
     * @return string
     */
    public function getContent() : string;
}