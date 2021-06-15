<?php

namespace Rubix\LaravelDiskMonitor\Commands;

use Illuminate\Console\Command;
use Illuminate\Support\Facades\Storage;
use Rubix\LaravelDiskMonitor\Models\DiskMonitorEntry;

class LaravelDiskMonitorCommand extends Command
{
    public $signature = 'disk-monitor:record-metrics';

    public $description = 'Record the metrics of disk';

    public function handle()
    {
        $this->comment('Recording metrics ... ');
        $diskName = config('disk-monitor.disk_name');
        $fileCount = count(Storage::disk($diskName)->allFiles());
        DiskMonitorEntry::create([
            'disk_name' => $diskName,
            'file_count' => $fileCount,
        ]);

        $this->comment('All done');
    }
}
