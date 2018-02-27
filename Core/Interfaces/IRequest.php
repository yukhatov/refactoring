<?php
/**
 * Created by PhpStorm.
 * User: artur
 * Date: 02.12.17
 * Time: 19:57
 */
namespace Interfaces;

interface IRequest
{
    /**
     * @return string
     */
    public function send() : string;
}