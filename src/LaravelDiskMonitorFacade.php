<?php

namespace Rubix\LaravelDiskMonitor;

use Illuminate\Support\Facades\Facade;

/**
 * @see \Rubix\LaravelDiskMonitor\LaravelDiskMonitor
 */
class LaravelDiskMonitorFacade extends Facade
{
    protected static function getFacadeAccessor()
    {
        return 'laravel-disk-monitor';
    }
}
