<?php
/**
 * Created by PhpStorm.
 * User: artur
 * Date: 02.12.17
 * Time: 19:57
 */
namespace Core;

interface IConnection
{
    /**
     * @return string
     */
    public function getDatabaseName() : string;
}