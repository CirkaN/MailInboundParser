<?php


namespace CirkaN\MailInboundParser\Providers;

use Carbon\Carbon;
use CirkaN\MailInboundParser\Interfaces\ProviderInterface;

class MailgunProvider implements ProviderInterface
{

    protected array $mailBody;

    /**
     *  Capture incoming mail body received from mail provider
     * @param array $mailBody
     * @return $this
     */

    public function setMailBody(array $mailBody): ProviderInterface
    {
        $this->mailBody = $mailBody;
        return $this;
    }

    /**
     * Extract Email Subject From Mail Body
     * @return string|null
     */
    public function getSubject(): ?string
    {
        return $this->mailBody['Subject'];
    }

    /**
     *  Extract Raw Body From Mail Body
     * @return string|null
     */
    public function getRawBody(): ?string
    {
        return $this->mailBody['body-plain'] ?? null;
    }

    /**
     * Extract Sender Email  From Mail Body
     * @return string
     */
    public function getSender(): string
    {
        return $this->mailBody['sender'];
    }

    /**
     * Extract timestamp when email was being delivered to the mail provider
     * @return string
     */
    public function getTimestamp(): string
    {
        return $this->mailBody['timestamp'];
    }

    /**
     * Extract custom header value by providing header value (example body-html)
     * @param string $value
     * @return string|null
     */
    public function getHeaderValue(string $value): ?string
    {
        if (isset($this->mailBody[$value]))
            return $this->mailBody[$value];

        return null;
    }

    /**
     * Extract Carbon instance of date from timestamp
     * @return Carbon|null
     */
    public function getDate(): ?Carbon
    {
        if (isset($this->mailBody['timestamp']))
            return Carbon::createFromTimestamp($this->mailBody['timestamp']);
        return null;
    }

    /**
     * Extract html body from email
     * @return string
     */
    public function getHtmlBody(): string
    {
        return $this->mailBody['body-html'];
    }

    /**
     * Extract Recipient list from the email
     * @return string
     */
    public function getRecipient(): string
    {
        return explode(',', $this->mailBody['recipient'])[0];
    }

    /**
     * Extract all recipients list from the email
     * @return array
     */
    public function getRecipients(): array
    {
        return explode(',', $this->mailBody['recipient']);
    }

    /**
     * Save attachments that are provided in the email body
     * @param string $path
     * @return bool
     */
    public function saveAttachments(string $path): bool
    {
        if ($this->mailBody['attachment-count'] > 0) {
            for ($i = 1; $i <= $this->mailBody['attachment-count']; $i++) {
                \Storage::put($path, $this->mailBody['attachment-' . $i]);
            }
        }

        return true;
    }

    /**
     * Get Attachment paths that are provided in the email body
     * @return array|null
     */
    public function getAttachments(): ?array
    {
        $arr = [];
        if (!isset($this->mailBody['attachment-count'])) {
            return null;
        }
        if ($this->mailBody['attachment-count'] > 0) {
            for ($i = 1; $i <= $this->mailBody['attachment-count']; $i++) {
                $arr[] = $this->mailBody['attachment-' . $i];
            }
        }
        if (empty($arr)) {
            return null;
        }

        return $arr;
    }

    /**
     * Get Ccs that are linked to the email
     * @return array|null
     */
    public function getCcs(): ?array
    {
        if (isset($this->mailBody['Cc'])) {
            return explode(',', $this->mailBody['Cc']);
        }

        return null;
    }
}