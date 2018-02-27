<?php
/**
 * Created by PhpStorm.
 * User: artur
 * Date: 02.12.17
 * Time: 17:12
 */
namespace Classes;

use Interfaces\IMailManager;

/**
 * Class MailManager
 */
class MailManager implements IMailManager
{
    /**
     * @var string
     */
    private $receiver;
    /**
     * @var string
     */
    private $sender;
    /**
     * @var string
     */
    private $body;

    /**
     * MailManager constructor.
     * @param $receiver
     * @param $sender
     * @param string $body
     */
    public function __construct($receiver, $sender, $body = "")
    {
        $this->receiver = $receiver;
        $this->sender = $sender;
        $this->body = $body;
    }

    /**
     * @return bool
     */
    public function send() : bool
    {
        /* Send email here and check if it's sent */
        $isEmailSent = true;

        if ($isEmailSent) {
            echo sprintf(
                "Email has been send to %s From %s. Notify you about %s",
                $this->receiver,
                $this->sender,
                $this->body
            );
            
            return true;
        }
        
        return false;
    }

    /**
     * @param string $body
     */
    public function setBody(string $body)
    {
        $this->body = $body;
    }
}