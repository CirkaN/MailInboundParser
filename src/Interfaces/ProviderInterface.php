<?php


namespace CirkaN\MailInboundParser\Interfaces;


use Carbon\Carbon;

interface ProviderInterface
{
    public function setMailBody(array $mailBody): self;

    public function getSubject(): string;

    public function getRawBody(): string;

    public function getSender(): string;

    public function getTimestamp(): string;

    public function getHeaderValue(string $value): string;

    public function getDate(): ?Carbon;

    public function getHtmlBody(): string;
}