<?php
/**
 * Created by PhpStorm.
 * User: artur
 * Date: 02.12.17
 * Time: 19:57
 */
interface IDatabaseManager
{
    /**
     * @return bool
     */
    public function read() : bool;

    /**
     * @param string $content
     * @return bool
     */
    public function write(string $content) : bool;
}