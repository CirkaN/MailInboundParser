<?php


namespace CirkaN\MailInboundParser\Interfaces;


use Carbon\Carbon;

interface ProviderInterface
{

    /**
     *  Capture incoming mail body received from mail provider
     * @param array $mailBody
     * @return $this
     */
    public function setMailBody(array $mailBody): self;

    /**
     * Extract Email Subject From Mail Body
     * @return string|null
     */
    public function getSubject(): ?string;


    /**
     *  Extract Raw Body From Mail Body
     * @return string|null
     */
    public function getRawBody(): ?string;

    /**
     * Extract Sender Email  From Mail Body
     * @return string
     */
    public function getSender(): string;

    /**
     * Extract timestamp when email was being delivered to the mail provider
     * @return string
     */
    public function getTimestamp(): string;

    /**
     * Extract custom header value by providing header value (example body-html)
     * @param string $value
     * @return string|null
     */
    public function getHeaderValue(string $value): ?string;

    /**
     * Extract Carbon instance of date from timestamp
     * @return Carbon|null
     */
    public function getDate(): ?Carbon;

    /**
     * Extract html body from email
     * @return string
     */
    public function getHtmlBody(): string;

    /**
     * Extract Recipient list from the email
     * @return string
     */
    public function getRecipient(): string;

    /**
     * Extract all recipients list from the email
     * @return array
     */
    public function getRecipients(): array;

    /**
     * Save attachments that are provided in the email body
     * @param string $path
     * @return bool
     */
    public function saveAttachments(string $path): bool;

    /**
     * Get Attachment paths that are provided in the email body
     * @return array|null
     */
    public function getAttachments(): ?array;

    /**
     * Get Ccs that are linked to the email
     * @return array|null
     */
    public function getCcs(): ?array;
}