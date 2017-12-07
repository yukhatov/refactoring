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
     * @param string $receiver
     */
    public function setReceiver(string $receiver)
    {
        $this->receiver = $receiver;
    }

    /**
     * @param string $sender
     */
    public function setSender(string $sender)
    {
        $this->sender = $sender;
    }

    /**
     * @return string
     */
    public function send() : string
    {
        return sprintf(
            "Email has been send to %s From %s.\r\n\r\n Notify you about %s",
            $this->receiver,
            $this->sender,
            $this->body
        );
    }

    /**
     * @param string $body
     */
    public function setBody(string $body)
    {
        $this->body = $body;
    }
}