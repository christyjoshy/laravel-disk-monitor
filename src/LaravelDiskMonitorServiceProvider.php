<?php

namespace Rubix\LaravelDiskMonitor;

use Illuminate\Support\Facades\Route;
use Rubix\LaravelDiskMonitor\Commands\LaravelDiskMonitorCommand;
use Spatie\LaravelPackageTools\Package;
use Spatie\LaravelPackageTools\PackageServiceProvider;

class LaravelDiskMonitorServiceProvider extends PackageServiceProvider
{
    public function configurePackage(Package $package): void
    {
        /*
         * This class is a Package Service Provider
         *
         * More info: https://github.com/spatie/laravel-package-tools
         */
        $package
            ->name('laravel-disk-monitor')
            ->hasConfigFile()
            ->hasViews()
            ->hasRoute('web')
            ->hasMigration('create_disk_monitor_table')
            ->hasCommand(LaravelDiskMonitorCommand::class);
    }
}
