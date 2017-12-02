<?php
/**
 * Created by PhpStorm.
 * User: artur
 * Date: 02.12.17
 * Time: 19:57
 */
interface IDatabaseManager
{
    public function read() : string;
    public function write(string $content) : string;
}