<?php

namespace Rubix\LaravelDiskMonitor\Http\Controllers;

use Rubix\LaravelDiskMonitor\Models\DiskMonitorEntry;

class DiskMetricsController{

    public function index()
    {
        //return 'ok';
        $entries = DiskMonitorEntry::latest()->get();
        // $entries->disk_name = 'local';
        // $entries->file_count = 1;
        // dd($entries);

        return view('disk-monitor::entries',compact('entries'));
    }
   
}
?>