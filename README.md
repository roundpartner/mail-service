# mailservice

A service for sending email transactions.


Wraps Mailguns sendMessage method

```php
$service = new \MailService\MailService($config);
$service->sendMessage($postData);

```