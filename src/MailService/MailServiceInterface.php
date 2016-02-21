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
     * @return Response
     */
    public function sendMessage($postData);
}