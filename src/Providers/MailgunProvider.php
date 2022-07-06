<?php


namespace CirkaN\MailInboundParser\Providers;

use Carbon\Carbon;
use CirkaN\MailInboundParser\Interfaces\ProviderInterface;

class MailgunProvider implements ProviderInterface
{

    protected $mailBody;

    public function setMailBody(array $mailBody): ProviderInterface
    {
        $this->mailBody = $mailBody;
        return $this;
    }

    public function getSubject(): string
    {
        return $this->mailBody['Subject'];
    }

    public function getRawBody(): string
    {
        return $this->mailBody['stripped-text'];
    }

    public function getSender(): string
    {
        return $this->mailBody['Sender'];
    }

    public function getTimestamp(): string
    {
        return $this->mailBody['timestamp'];
    }

    public function getHeaderValue(string $value): string
    {
        if (isset($this->mailBody[$value]))
            return $this->mailBody[$value];

        return '';
    }

    public function getDate(): ?Carbon
    {
        if (isset($this->mailBody['timestamp']))
            return Carbon::createFromTimestamp($this->mailBody['timestamp']);
        return null;
    }

    public function getHtmlBody(): string
    {
        return $this->mailBody['body-html'];
    }
}