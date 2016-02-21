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
        $this->service = \MailService\MailServiceFactory::createService('fakekey', 'mailinator.com');
    }

    /**
     * Tests sending mail returns response
     */
    public function testSendMail()
    {
        $this->assertInstanceOf('\MailService\Entity\Response', $this->callSendMessage());
    }

    /**
     * Tests that mail was successfully sent
     */
    public function testSendMailSentSuccessfully()
    {
        $this->assertEquals(200, $this->callSendMessage()->responseCode);
    }

    /**
     * Test integration with MailGun Plugin
     */
    public function testSendMailIntegrationWithMailGun()
    {
        // todo: tidy up this test stub
        $mock = $this->getMockBuilder('Mailgun')
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
        $this->service->getPlugin()->setService($mock);
        $postData = array(
            'from' => 'Console <test@mailinator.com>',
            'to' => 'Test <test@mailinator.com>',
            'subject' => 'Test message',
            'text' => 'This is a test',
            'o:tracking' => false,
        );
        $this->assertInstanceOf('\MailService\Entity\Response', $this->service->sendMessage($postData));
    }

    /**
     * Calls send message function
     *
     * @return \MailService\Entity\Response
     */
    protected function callSendMessage()
    {
        // todo: tidy up this test stub
        $responseBody = new \MailService\Entity\ResponseBody();
        $responseBody->id = '';
        $responseBody->message = '';
        $response = new \MailService\Entity\Response();
        $response->body = $responseBody;
        $response->responseCode = 200;

        $mock = $this->getMockBuilder('MailGun')
            ->setMethods(array('sendMessage'))
            ->getMock();
        $mock->expects($this->any())
            ->method('sendMessage')
            ->will($this->returnValue($response));
        $this->service->setPlugin($mock);

        $postData = array(
            'from' => 'Console <test@mailinator.com>',
            'to' => 'Test <test@mailinator.com>',
            'subject' => 'Test message',
            'text' => 'This is a test',
            'o:tracking' => false,
        );
        return $this->service->sendMessage($postData);
    }

}