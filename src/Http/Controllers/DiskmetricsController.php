<?php

namespace Rubix\LaravelDiskMonitor\Http\Controllers;

use Rubix\LaravelDiskMonitor\Models\DiskMonitorEntry;

class DiskMetricsController{
    public function __invoke()
    {
        $entries = DiskMonitorEntry::latest()->get();

        return view('laravel-disk-monitor::entries',compact('entries'));
    }
   
}
?>