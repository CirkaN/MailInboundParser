
# MailInboundParser

[comment]: <> ([![Latest Version on Packagist]&#40;https://img.shields.io/packagist/v/cirkan/mailinboundparser.svg?style=flat-square&#41;]&#40;https://packagist.org/packages/cirkan/mailinboundparser&#41;)

[comment]: <> ([![GitHub Tests Action Status]&#40;https://img.shields.io/github/workflow/status/cirkan/mailinboundparser/run-tests?label=tests&#41;]&#40;https://github.com/cirkan/mailinboundparser/actions?query=workflow%3Arun-tests+branch%3Amain&#41;)

[comment]: <> ([![GitHub Code Style Action Status]&#40;https://img.shields.io/github/workflow/status/cirkan/mailinboundparser/Check%20&%20fix%20styling?label=code%20style&#41;]&#40;https://github.com/cirkan/mailinboundparser/actions?query=workflow%3A"Check+%26+fix+styling"+branch%3Amain&#41;)

[comment]: <> ([![Total Downloads]&#40;https://img.shields.io/packagist/dt/cirkan/mailinboundparser.svg?style=flat-square&#41;]&#40;https://packagist.org/packages/cirkan/mailinboundparser&#41;)

InboundParser should make your life easier if you have to deal with inbound emails.

<h4>What can you expect from this package?</h4>

1.Email Parsing <br>
2.Metadata Extraction <br>
3.Content Extraction<br>
4.Attachment Handling<br>
5.Customization<b4>

[comment]: <> (## Support us)

[comment]: <> ([<img src="https://github-ads.s3.eu-central-1.amazonaws.com/MailInboundParser.jpg?t=1" width="419px" />]&#40;https://spatie.be/github-ad-click/MailInboundParser&#41;)

[comment]: <> (We invest a lot of resources into creating [best in class open source packages]&#40;https://spatie.be/open-source&#41;. You can support us by [buying one of our paid products]&#40;https://spatie.be/open-source/support-us&#41;.)

[comment]: <> (We highly appreciate you sending us a postcard from your hometown, mentioning which of our package&#40;s&#41; you are using. You'll find our address on [our contact page]&#40;https://spatie.be/about-us&#41;. We publish all received postcards on [our virtual postcard wall]&#40;https://spatie.be/open-source/postcards&#41;.)

## Installation

You can install the package via composer:

```bash
composer require cirkan/mailinboundparser
```

[comment]: <> (You can publish and run the migrations with:)

[comment]: <> (```bash)

[comment]: <> (php artisan vendor:publish --tag="mailinboundparser-migrations")

[comment]: <> (php artisan migrate)

[comment]: <> (```)

[comment]: <> (You can publish the config file with:)

[comment]: <> (```bash)

[comment]: <> (php artisan vendor:publish --tag="mailinboundparser-config")

[comment]: <> (```)

[comment]: <> (This is the contents of the published config file:)

[comment]: <> (```php)

[comment]: <> (return [)

[comment]: <> (];)

[comment]: <> (```)


## Usage

```php
$mailInboundParser = new CirkaN\MailInboundParser(new MailgunProvider());
echo $mailInboundParser->getDriver()
                       ->setMailBody($mailBody)
                       ->getSubject();
```

### Available Methods

```
    public function setMailBody(array $mailBody): self;

    public function getSubject(): string;

    public function getRawBody(): string;

    public function getSender(): string;

    public function getTimestamp(): string;

    public function getHeaderValue(string $value): string;

    public function getDate(): ?Carbon;

    public function getHtmlBody(): string;

```
### Available Providers
```
Mailgun
```

## Testing

```bash
composer test
```

## Changelog

Please see [CHANGELOG](CHANGELOG.md) for more information on what has changed recently.

## Contributing

Please see [CONTRIBUTING](https://github.com/CirkaN/.github/blob/main/CONTRIBUTING.md) for details.

## Security Vulnerabilities

Please review [our security policy](../../security/policy) on how to report security vulnerabilities.

## Credits

- [Nikola Cirkovic](https://github.com/CirkaN)
- [All Contributors](../../contributors)

## License

The MIT License (MIT). Please see [License File](LICENSE.md) for more information.
