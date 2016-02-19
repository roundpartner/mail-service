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

    public function getMailService()
    {
        return new Mailgun();
    }
}