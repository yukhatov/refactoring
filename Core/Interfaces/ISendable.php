<?php
/**
 * Created by PhpStorm.
 * User: artur
 * Date: 02.12.17
 * Time: 19:57
 */
namespace Interfaces;

/**
 * Interface ISendable
 * @package Interfaces
 */
interface ISendable
{

    /**
     * @param int $value
     * @return mixed
     */
    public function sendEmail(int $value);
}