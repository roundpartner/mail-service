<?php

namespace MailService;

use Mailgun\Mailgun;

/**
 * Class MailService
 *
 * @package MailService
 */
class MailService
{

    protected $mailgun;

    /**
     * MailService constructor.
     *
     * @param $apiKey
     */
    public function __construct($apiKey)
    {
        $this->mailgun = new Mailgun($apiKey);
    }

    /**
     * @return Mailgun
     */
    public function getMailService()
    {
        return $this->mailgun;
    }
}