<?php
namespace Rubix\LaravelDiskMonitor\Tests\Feature\Commands;

use Illuminate\Support\Facades\Storage;
use Rubix\LaravelDiskMonitor\Models\DiskMonitorEntry;
use Rubix\LaravelDiskMonitor\Tests\TestCase;
use Rubix\LaravelDiskMonitor\Commands\LaravelDiskMonitorCommand;

class LaravelDiskMonitorCommandTest extends TestCase{
    public function setUp(): void
    {
        parent::setUp();
        Storage::fake('local');
    }
  
    
    /** @test */
    public function it_will_record_zero_files_for_empty_disks()
    {
        $this->artisan(LaravelDiskMonitorCommand::class)->assertExitCode(0);    
        $entry = DiskMonitorEntry::last();
        $this->assertEquals(0, $entry->file_count);

        Storage::disk('local')->put('test.txt','test');
        $this->artisan(LaravelDiskMonitorCommand::class)->assertExitCode(0);
        $entry = DiskMonitorEntry::last();
        $this->assertEquals(1, $entry->file_count);

    }

}

?>