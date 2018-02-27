<?php
/**
 * Created by PhpStorm.
 * User: artur
 * Date: 02.12.17
 * Time: 19:57
 */
namespace Interfaces;

/**
 * Interface IRunable
 * @package Interfaces
 */
interface IRunable
{
    /**
     * @param IRequest $request
     * @return string
     */
    public function run(IRequest $request) : string;
}