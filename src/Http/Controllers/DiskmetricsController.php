<?php

namespace Rubix\LaravelDiskMonitor\Http\Controllers;

use Illuminate\Routing\Controller;
use Rubix\LaravelDiskMonitor\Models\DiskMonitorEntry;

class DiskMetricsController extends Controller{
    public function __invoke()
    {
        $entries = DiskMonitorEntry::latest()->get();

        return view('laravel-disk-monitor::entries',compact('entries'));
    }
   
}
?>