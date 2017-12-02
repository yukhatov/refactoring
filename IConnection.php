<?php
/**
 * Created by PhpStorm.
 * User: artur
 * Date: 02.12.17
 * Time: 19:57
 */
interface IConnection
{
    public function getDatabaseName() : string;
}