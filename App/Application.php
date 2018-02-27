<?php
/**
 * Created by PhpStorm.
 * User: artur
 * Date: 02.12.17
 * Time: 16:46
 */
namespace App;

use Interfaces\IDatabaseManager;
use Interfaces\ISendable;
use Interfaces\IRunable;
use Interfaces\IMailManager;
use Interfaces\IRequest;
use Interfaces\IValidator;

/**
 * Class Application
 * @package App
 */
class Application implements IRunable, ISendable
{
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
     * @param IDatabaseManager $dbManager
     * @param IMailManager $mailManager
     * @param IValidator $validator
     */
    public function __construct(IDatabaseManager $dbManager, IMailManager $mailManager, IValidator $validator)
    {
        $this->dbManager = $dbManager;
        $this->mailManager = $mailManager;
        $this->validator = $validator;
    }

    /**
     * @param IRequest $request
     * 
     * @throws Exception if the provided url is broken or db conction is broken.
     *     
     * @return string
     */
    public function run(IRequest $request) : string
    {
        if (!$content = $request->send()) {
            throw new \Exception("Request error: Unable to send request!");
        }
        
        if (!$this->dbManager->write($content)) {
            throw new \Exception("Database manager error: Unable to write data!");
        }

        return $content;
    }

    /**
     * @param $value
     * 
     * @throws Exception if emailcould not be sent.
     * 
     * @return mixed
     */
    public function sendEmail(int $value)
    {
        $this->mailManager->setBody($this->validator->validate($value));

        if (!$this->mailManager->send()) {
            throw new \Exception("Mail manager error: email could not be sent!");
        }
    }
}