<?php
/**
 * Created by PhpStorm.
 * User: artur
 * Date: 02.12.17
 * Time: 19:57
 */
interface IRequest
{
    /**
     * @return IResponse
     */
    public function send() : IResponse;
}