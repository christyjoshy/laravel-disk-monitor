<?php
namespace Rubix\LaravelDiskMonitor\Tests\Feature\Commands;

use Illuminate\Support\Facades\Storage;
use Rubix\LaravelDiskMonitor\Commands\LaravelDiskMonitorCommand;
use Rubix\LaravelDiskMonitor\Models\DiskMonitorEntry;
use Rubix\LaravelDiskMonitor\Tests\TestCase;

class LaravelDiskMonitorCommandTest extends TestCase
{
    public function setUp(): void
    {
        parent::setUp();
        Storage::fake('local');
        Storage::fake('another_disk');
    }
  
    /** @test */
    public function it_will_record_zero_files_for_single_disk()
    {
        $this->artisan(LaravelDiskMonitorCommand::class)->assertExitCode(0);
        $entry = DiskMonitorEntry::last();
        $this->assertEquals(0, $entry->file_count);

        Storage::disk('local')->put('test.txt', 'test');
        $this->artisan(LaravelDiskMonitorCommand::class)->assertExitCode(0);
        $entry = DiskMonitorEntry::last();
        $this->assertEquals(1, $entry->file_count);
    }

    /** @test */
    public function it_will_record_zero_files_for_multiple_disks()
    {
        config()->set('disk-monitor.disk_names', ['local','another_disk']);
        Storage::disk('another_disk')->put('test.txt', 'test');
        Storage::disk('local')->put('test.txt', 'test');

        $this->artisan(LaravelDiskMonitorCommand::class)->assertExitCode(0);
        $entries = DiskMonitorEntry::get();
        $this->assertCount(2, $entries);
        $this->assertEquals('local', $entries[0]->disk_name);
        $this->assertEquals(0, $entries[0]->disk_count);

        $this->assertEquals('another_disk', $entries[1]->disk_name);
        $this->assertEquals(1, $entries[1]->file_count);
    }
}
