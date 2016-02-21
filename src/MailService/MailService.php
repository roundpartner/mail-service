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
implements MailServiceInterface
{

    /**
     * @var MailGun
     */
    protected $plugin;

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
        $this->plugin = new Plugin\MailGun($config);
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
     * @param MailServiceInterface $plugin
     *
     * @return MailService
     */
    public function setPlugin($plugin)
    {
        $this->plugin = $plugin;
        return $this;
    }

    /**
     * @return MailServiceInterface
     */
    public function getPlugin()
    {
        return $this->plugin;
    }

    /**
     * @param array $postData
     *
     * @return Response
     */
    public function sendMessage($postData)
    {
        return $this->plugin->sendMessage($postData);
    }

}