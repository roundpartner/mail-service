<?php

namespace MailService\Plugin;

use MailService\Entity\Configuration;
use MailService\MailServiceInterface;
use MailService\Entity\Response;
use MailService\Entity\ResponseBody;

class MailGun
implements MailServiceInterface
{

    /**
     * @var Configuration
     */
    protected $config;

    /**
     * @var \Mailgun\Mailgun
     */
    protected $service;

    /**
     * MailGun constructor.
     *
     * @param Configuration $config
     */
    public function __construct($config)
    {
        $this->config = $config;
        $this->service = new \Mailgun\Mailgun($config->key);
    }

    /**
     * @param $service
     *
     * @return MailGun
     */
    public function setService($service)
    {
        $this->service = $service;
        return $this;
    }

    /**
     * @param array $postData
     *
     * @return Response
     */
    public function sendMessage($postData)
    {
        // todo: tidy up this code
        $response = $this->service->sendMessage($this->config->endpoint, $postData);
        $responseBody = new ResponseBody();
        $responseBody->id = $response->http_response_body->id;
        $responseBody->message = $response->http_response_body->message;
        $responseEntity = new Response();
        $responseEntity->responseCode = $response->http_response_code;
        $responseEntity->body = $responseBody;

        return $responseEntity;
    }
}