<?php

namespace CirkaN\MailInboundParser;

use CirkaN\MailInboundParser\Interfaces\ProviderInterface;

class MailInboundParser
{
    /**
     * @var \CirkaN\MailInboundParser\Interfaces\ProviderInterface
     */
    private $driver;

    public function __construct(ProviderInterface $driver)
    {
        $this->driver = $driver;
    }

    public function getDriver(): ProviderInterface
    {
        return $this->driver;
    }

    public function filterByIdentifications(string $stack, string $start_char, string $end_char): string
    {
        $filter = strpos($stack, $start_char);
        $filter += strlen($start_char);
        $size = strpos($stack, $end_char, $filter) - $filter;
        return substr($stack, $filter, $size);
    }
}
