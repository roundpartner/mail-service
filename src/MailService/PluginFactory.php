<?php

namespace MailService;

use MailService\Entity\Configuration;

/**
 * Class PluginFactory
 *
 * @package MailService
 */
class PluginFactory
{

    const PLUGIN_CLASS_PREFIX = 'MailService\\Plugin\\';

    /**
     * @param Configuration $config
     * @return MailServiceInterface
     * @throws \Exception
     */
    public static function getPlugin($config)
    {
        $className = self::PLUGIN_CLASS_PREFIX . $config->plugin;
        if (!class_exists($className)) {
            throw new \Exception("Plugin {$config->plugin} not found.");
        }
        return new $className($config);
    }
}
