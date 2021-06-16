<?php

namespace Rubix\LaravelDiskMonitor\Http\Controllers;

use Rubix\LaravelDiskMonitor\Models\DiskMonitorEntry;

class DiskMetricsController
{
    public function index()
    {
        $entries = DiskMonitorEntry::latest()->get();

        return view('disk-monitor::entries', compact('entries'));
    }
}
