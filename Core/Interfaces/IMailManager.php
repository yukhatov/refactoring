<?php
/**
 * Created by PhpStorm.
 * User: artur
 * Date: 02.12.17
 * Time: 19:57
 */
namespace Interfaces;

/**
 * Interface IMailManager
 * @package Interfaces
 */
interface IMailManager
{
    /**
     * @return bool
     */
    public function send() : bool;

    /**
     * @param string $body
     * @return mixed
     */
    public function setBody(string $body);
}