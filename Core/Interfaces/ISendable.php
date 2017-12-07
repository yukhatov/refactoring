<?php
/**
 * Created by PhpStorm.
 * User: artur
 * Date: 02.12.17
 * Time: 19:57
 */
namespace Interfaces;

interface ISendable
{
    /**
     * @param int $value
     * @return string
     */
    public function sendEmail(int $value) : string;

    /**
     * @param IMailManager $mailManager
     * @return mixed
     */
    public function setMailManager(IMailManager $mailManager);
}