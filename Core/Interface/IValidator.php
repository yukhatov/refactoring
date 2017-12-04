<?php
/**
 * Created by PhpStorm.
 * User: artur
 * Date: 02.12.17
 * Time: 19:57
 */
namespace Core;

/**
 * Interface IValidator
 * @package Core
 */
interface IValidator
{
    /**
     * @param $value
     * @return string
     */
    public function validate($value) : string;
}