# mailservice

A service for sending email transactions.

## Sending Mail

Wraps Mailguns sendMessage method

```php
$service = new \MailService\MailService($config);
$service->sendMessage($postData);
```

## Testing

Mailguns api is mocked to allow for testing of this services functionality.

```bash
cd tests/
phpunit
```

