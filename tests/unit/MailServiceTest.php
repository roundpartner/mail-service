<?php

/**
 * Class MailServiceTest
 */
class MailServiceTest extends PHPUnit_Framework_TestCase
{

    /**
     * @var \MailService\MailService
     */
    protected $service;

    public function setUp()
    {
        parent::setUp();
        $this->service = new \MailService\MailService('apikey');
    }

    /**
     * Tests that instance of mailgun can be retrieved
     */
    public function testGetInstanceOfMailgun()
    {
        $this->assertInstanceOf('\Mailgun\Mailgun', $this->service->getMailService());
    }

}