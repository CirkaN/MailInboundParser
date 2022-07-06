<?php

namespace CirkaN\MailInboundParser;

use Spatie\LaravelPackageTools\Package;
use Spatie\LaravelPackageTools\PackageServiceProvider;
use CirkaN\MailInboundParser\Commands\MailInboundParserCommand;

class MailInboundParserServiceProvider extends PackageServiceProvider
{
    public function configurePackage(Package $package): void
    {
        /*
         * This class is a Package Service Provider
         *
         * More info: https://github.com/spatie/laravel-package-tools
         */
        $package
            ->name('mailinboundparser')
            ->hasConfigFile();
    }
}
