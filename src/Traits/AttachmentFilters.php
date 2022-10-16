<?php


namespace CirkaN\MailInboundParser\Traits;


trait AttachmentFilters
{
    public function getRestrictedAttachments(): array
    {
        return [
            'example.jpg',
        ];
    }
}