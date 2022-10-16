<?php

use Carbon\Carbon;
use CirkaN\MailInboundParser\Providers\MailgunProvider;

beforeEach(function () {
    $this->mailBody = [
        'subject' => 'Re: Sample POST request',
        'from' => 'Bob <bob@mail.test>',
        'Received' => 'from [10.20.76.69] (Unknown [50.56.129.169]) by mxa.mailgun.org with ESMTP id 517acc75.4b341f0-worker2; Fri, 26 Apr 2013 18:50:29 -0000 (UTC)',
        'Date' => 'Fri, 26 Apr 2013 11:50:29 -0700',
        'X-Mailgun-Variables' => '{"my_var_1": "Mailgun Variable #1", "my-var-2": "awesome"}',
        'Content-Type' => 'multipart/mixed; boundary="------------020601070403020003080006"',
        'recipient' => 'rachel@mail.test,emily@mail.test',
        'body-html' => '
<html>
  <body">
  <h1>Hello World</h1>
  </body>
</html>',
        'From' => 'Bob <bob@mail.test>',
        'User-Agent' => 'Mozilla/5.0 (X11; Linux x86_64; rv:17.0) Gecko/20130308 Thunderbird/17.0.4',
        'X-Test-Utf8' => 'Доброго здоровьица!',
        'Sender' => 'bob@mail.test.me',
        'sender' => 'ross@mail.test.me',
        'References' => '<517AC78B.5060404@test.me>',
        'X-Test-Many' => 'v3',
        'Message-Id' => '<517ACC75.5010709@test.me>',
        'To' => 'Alice <alice@mail.test>',
        'Subject' => 'Re: Sample POST request',
        'In-Reply-To' => '<517AC78B.5060404@mail.test>',
        'X-Test-Upsert' => 'C\'est très bien!',
        'Mime-Version' => '1.0',
        'attachment-count' => '2',
        'content-id-map' => '{"<part1.04060802.06030207@mail.test>":"attachment-1"}',
        'stripped-text' => 'Hi Alice,

This is Bob.

I also attached a file.',
        'body-plain' => 'Hi Alice,

This is Bob.

I also attached a file.',
        'stripped-html' => '',
        'stripped-signature' => 'Thanks,
        Bob',
        'signature' => 'e066773d6ba33ceedb81be5700b517f71774344250e74a150923d0b337d0c73f',
        'token' => 'd9893d86961ceb161668d60879bc2b58c269efc6a7ba851373',
        'timestamp' => '1657064961',
    ];
    $this->initializedDriver = (new CirkaN\MailInboundParser\MailInboundParser(new MailgunProvider()))->getDriver()->setMailBody($this->mailBody);
});

it('can read subject', function () {
    $e = new \CirkaN\MailInboundParser\MailInboundParser(new MailgunProvider());
    $expected = $e->getDriver()->setMailBody($this->mailBody)->getSubject();

    expect($expected)->toBe('Re: Sample POST request');
});

it('can get timestamp', function () {
    $expected = $this->initializedDriver->getTimestamp();
    expect($expected)->toBe('1657064961');
});

it('can get carbon instance of the date', function () {
    $expected = $this->initializedDriver->getDate();
    expect($expected)->toBeInstanceOf(Carbon::class);
});

it('can get custom header value', function () {
    $expected = $this->initializedDriver->getHeaderValue('attachment-count');
    expect($expected)->toBe('2');
});

it('can get text representation of the mail body', function () {
    $expected = $this->initializedDriver->getRawBody();
    expect($expected)->toBe('Hi Alice,

This is Bob.

I also attached a file.');

});
it('can get html representation of the mail body', function () {
    $expected = $this->initializedDriver->getHtmlBody();
    expect($expected)->toBe('
<html>
  <body">
  <h1>Hello World</h1>
  </body>
</html>');
});