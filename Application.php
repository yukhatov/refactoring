<?php
/**
 * Created by PhpStorm.
 * User: artur
 * Date: 02.12.17
 * Time: 16:46
 */
require_once 'HTTPRequest.php';
require_once 'DatabaseManager.php';

class Application
{
    private const LOW_RANGE = 3;
    private const SIX = 6;
    private const SEVEN = 7;

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
     * Application constructor.
     */
    public function __construct()
    {
        $this->config = parse_ini_file($GLOBALS['configPath'], true);
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
     * @param $value
     * @return string
     */
    public function run($value) : string
    {
        $request = new HTTPRequest($this->config['http']['url'] ?? "");
        $response = $request->send();

        $this->dbManager->write($response->getContent());

        return $this->sendEmail($value);
    }

    /**
     * @param $value
     * @return string
     */
    private function sendEmail($value) : string
    {
        if ($value <= self::LOW_RANGE) {
            $this->mailManager->setBody('Your Value is too low');
        } elseif ($value > self::SIX) {
            if ($value == self::SEVEN) {
                $this->mailManager->setBody('Your Value equals to 7');
            } else {
                $this->mailManager->setBody('Your Value is over 7');
            }
        } else {
            $this->mailManager->setBody('Your Value is between 3 and 6');
        }

        return $this->mailManager->send();
    }
}