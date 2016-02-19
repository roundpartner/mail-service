<?php

namespace MailService;

use Mailgun\Mailgun as MailGun;
use MailService\Entity\Configuration;
use MailService\Entity\Response;
use MailService\Entity\ResponseBody;

/**
 * Class MailService
 *
 * @package MailService
 */
class MailService
{

    /**
     * @var MailGun
     */
    protected $service;

    /**
     * @var Configuration
     */
    protected $config;

    /**
     * MailService constructor.
     *
     * @param Configuration $config
     */
    public function __construct($config)
    {
        $this->config = $config;
        $this->service = new MailGun($config->key);
    }

    /**
     * Factory method to create new service
     *
     * @param string $key
     * @param string $endpoint
     * @return MailService
     */
    public static function createService($key, $endpoint)
    {
        $config = new Configuration();
        $config->key = $key;
        $config->endpoint = $endpoint;
        return new self($config);
    }

    /**
     * @param $service
     */
    public function setService($service)
    {
        $this->service = $service;
    }

    /**
     * @param array $postData
     *
     * @return array
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