<?php

namespace MailService;

/**
 * Interface MailServiceInterface
 *
 * @package MailService
 */
interface MailServiceInterface
{
    /**
     * @param array $postData
     *
     * @return \MailService\Entity\Response
     */
    public function sendMessage($postData);
}