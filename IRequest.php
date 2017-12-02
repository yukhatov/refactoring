<?php
/**
 * Created by PhpStorm.
 * User: artur
 * Date: 02.12.17
 * Time: 19:57
 */
interface IRequest
{
    public function send() : IResponse;
}