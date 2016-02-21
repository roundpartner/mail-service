<?php

/**
 * Class MailServiceFactoryTest
 */
class MailServiceFactoryTest extends PHPUnit_Framework_TestCase
{

    /**
     * Tests factory methods
     */
    public function testCreateMailService()
    {
        $service = \MailService\MailServiceFactory::createService('testkey', 'mailinator.com');
        $this->assertInstanceOf('\MailService\MailService', $service);
    }

}