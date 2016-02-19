<?php

class MailServiceTest extends PHPUnit_Framework_TestCase
{
    public function testInitService()
    {
        new \MailService\MailService();
    }
}