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
        collect(config('disk-monitor.disk_names'))
        ->each(fn(string $diskName) => $this->recordMetrics($diskName));


        $this->comment('All done');
    }
    public function recordMetrics(string $diskName)
    {
        $this->info("Recording metrics for ".$diskName." ...");
        $disk = Storage::disk($diskName);
        $fileCount = count($disk->allFiles());
        DiskMonitorEntry::create([
            'disk_name' => $diskName,
            'file_count' => $fileCount
        ]);
    }
}
