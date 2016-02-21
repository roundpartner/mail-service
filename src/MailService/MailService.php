<?php

namespace MailService;

use Mailgun\Mailgun as MailGun;
use MailService\Entity\Configuration;
use MailService\Entity\Response;

/**
 * Class MailService
 *
 * @package MailService
 */
class MailService
implements MailServiceInterface
{

    /**
     * @var MailServiceInterface
     */
    protected $plugin;

    /**
     * MailService constructor.
     *
     * @param Configuration $config
     */
    public function __construct($config)
    {
        $this->plugin = PluginFactory::getPlugin($config);
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