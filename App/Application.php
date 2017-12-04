<?php
/**
 * Created by PhpStorm.
 * User: artur
 * Date: 02.12.17
 * Time: 16:46
 */
namespace App;

use Core\IDatabaseManager;
use Core\ISendable;
use Core\IRunable;
use Core\IMailManager;
use Core\IRequest;
use Core\IValidator;
use Core\Validator;

/**
 * Class Application
 * @package App
 */
class Application implements IRunable, ISendable
{
    /**
     * @var array|bool
     */
    private $config;
    /**
     * @var IDatabaseManager
     */
    private $dbManager;
    /**
     * @var IMailManager
     */
    private $mailManager;

    /**
     * @var IValidator
     */
    private $validator;

    /**
     * Application constructor.
     */
    public function __construct()
    {
        $this->config = $GLOBALS['config'];
    }

    /**
     * @param IDatabaseManager $dbManager
     */
    public function setDbManager(IDatabaseManager $dbManager)
    {
        $this->dbManager = $dbManager;
    }

    /**
     * @param IMailManager $mailManager
     */
    public function setMailManager(IMailManager $mailManager)
    {
        $this->mailManager = $mailManager;
    }

    /**
     * @param IValidator $validator
     */
    public function setValidator(IValidator $validator)
    {
        $this->validator = $validator;
    }

    /**
     * @return bool
     */
    public function run(IRequest $request) : bool
    {
        $response = $request->send();

        return $this->dbManager->write($response->getContent());
    }

    /**
     * @param $value
     * @return string
     */
    public function sendEmail(int $value) : string
    {
        $this->mailManager->setBody($this->validator->validate($value));

        return $this->mailManager->send();
    }
}