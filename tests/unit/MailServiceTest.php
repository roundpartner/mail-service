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

    /**
     * Set up a test
     */
    public function setUp()
    {
        parent::setUp();
        $this->service = \MailService\MailService::createService('fakekey', 'mailinator.com');
    }

    /**
     * Tests mail can be sent
     */
    public function testSendMail()
    {
        // todo: tidy up this test stub
        $mock = $this->getMockBuilder('MailGun')
            ->setMethods(array('sendMessage'))
            ->getMock();
        $mock->expects($this->any())
            ->method('sendMessage')
            ->will($this->returnValue((object) array(
                'http_response_body' => (object) array(
                    'id' => '<123.456.789@example.org',
                    'message' => 'Queued. Thank you.',
                ),
                'http_response_code' => 200,
            )));
        $this->service->setService($mock);

        $postData = array(
            'from' => 'Console <test@mailinator.com>',
            'to' => 'Test <test@mailinator.com>',
            'subject' => 'Test message',
            'text' => 'This is a test',
            'o:tracking' => false,
        );
        $this->assertInstanceOf('\MailService\Entity\Response', $this->service->sendMessage($postData));
    }

}