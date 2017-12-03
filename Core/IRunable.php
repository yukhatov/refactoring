<?php
/**
 * Created by PhpStorm.
 * User: artur
 * Date: 02.12.17
 * Time: 19:57
 */
interface IRunable
{
    /**
     * @param IRequest $request
     * @return bool
     */
    public function run(IRequest $request) : bool;

    /**
     * @param IDatabaseManager $dbManager
     * @return mixed
     */
    public function setDbManager(IDatabaseManager $dbManager);
}