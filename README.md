# mailservice

A service for sending email transactions.

## Initialising

The factory method uses MailGun service by default which requires an api key and an endpoint

```php
$service = new \MailService\MailServiceFactory($key, $endpoint);
```

## Sending Mail

```php
$service = new \MailService\MailServiceFactory($key, $endpoint);
$service->sendMessage($postData);
```

## Testing

Mailguns api is mocked to allow for testing of this services functionality.

```bash
cd tests/
phpunit
```

## Plugins

Any plugin can be used as long as they implement the MailServiceInterface interface and placed inside the plugin directory.

The plugin can be loaded by setting the plugin variable in the configuration

```
$config = new Configuration();
$config->plugin = 'MyCustomPlugin';
return new MailService($config);
```
