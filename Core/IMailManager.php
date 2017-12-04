<?php
/**
 * Created by PhpStorm.
 * User: artur
 * Date: 02.12.17
 * Time: 19:57
 */
namespace Core;

interface IMailManager
{
    /**
     * @return string
     */
    public function send() : string;

    /**
     * @param string $body
     * @return mixed
     */
    public function setBody(string $body);
}