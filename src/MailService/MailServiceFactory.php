<?php

namespace MailService;

use MailService\Entity\Configuration;

/**
 * Class MailServiceFactory
 *
 * @package MailService
 */
class MailServiceFactory
{
    /**
     * Factory method to create new mail service
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
        return new MailService($config);
    }
}
