<?php

namespace RoundPartner\Test\Unit;

/**
 * Class PluginFactoryTest
 */
class PluginFactoryTest extends PHPUnit_Framework_TestCase
{

    /**
     * Test that a plugin can be loaded
     */
    public function testGetPlugin()
    {
        $config = new \MailService\Entity\Configuration();
        $config->plugin = 'MailGun';
        $plugin = \MailService\PluginFactory::getPlugin($config);
        $this->assertInstanceOf('\MailService\Plugin\MailGun', $plugin);
    }

    /**
     * Tests that unknown plugins can be handled
     */
    public function testGetUnknownPlugin()
    {
        $this->setExpectedException('\Exception', 'Plugin FooBar not found.');
        $config = new \MailService\Entity\Configuration();
        $config->plugin = 'FooBar';
        \MailService\PluginFactory::getPlugin($config);
    }
}
