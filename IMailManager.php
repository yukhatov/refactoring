<?php
/**
 * Created by PhpStorm.
 * User: artur
 * Date: 02.12.17
 * Time: 19:57
 */
interface IMailManager
{
    public function send() : string;
    public function setBody(string $body) : void;
}