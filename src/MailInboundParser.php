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
}
