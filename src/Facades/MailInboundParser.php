<?php

namespace CirkaN\MailInboundParser\Facades;

use Illuminate\Support\Facades\Facade;

/**
 * @see \CirkaN\MailInboundParser\MailInboundParser
 */
class MailInboundParser extends Facade
{
    protected static function getFacadeAccessor()
    {
        return 'mailinboundparser';
    }
}
