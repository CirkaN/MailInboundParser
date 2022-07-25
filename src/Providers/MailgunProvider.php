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
        return $this->mailBody['body-plain'];
    }

    public function getSender(): string
    {
        return $this->mailBody['sender'];
    }

    public function getTimestamp(): string
    {
        return $this->mailBody['timestamp'];
    }

    public function getHeaderValue(string $value): ?string
    {
        if (isset($this->mailBody[$value]))
            return $this->mailBody[$value];

        return null;
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


    public function getRecipient(): string
    {
        return explode(',', $this->mailBody['recipient'])[0];
    }

    public function getRecipients(): array
    {
        return explode(',', $this->mailBody['recipient']);
    }

    public function saveAttachments(string $path): bool
    {
        if ($this->mailBody['attachment-count'] > 0) {
            for ($i = 1; $i <= $this->mailBody['attachment-count']; $i++) {
                \Storage::put($path, $this->mailBody['attachment-' . $i]);
            }
        }
        return true;
    }
}