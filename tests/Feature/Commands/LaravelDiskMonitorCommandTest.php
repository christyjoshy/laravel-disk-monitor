<?php
namespace Rubix\LaravelDiskMonitor\Tests\Feature\Commands;

use Illuminate\Support\Facades\Storage;
use Rubix\LaravelDiskMonitor\Models\DiskMonitorEntry;
use Rubix\LaravelDiskMonitor\Tests\TestCase;

class LaravelDiskMonitorCommandTest extends TestCase
{
    public function setUp(): void
    {
        parent::setUp();
        Storage::fake('local');
    }

    // @test

    public function it_will_record_zero_files_for_empty_disks()
    {
        Storage::disk('local')->put('test.txt', 'test');
        $this->artisan(LaravelDiskMonitorCommand::class)
            ->assertExitCode(0);
        $this->assertCount(1, DiskMonitorEntry::get());
        
        $entry = DiskMonitorEntry::last();
        $this->assertEquals(1, $entry->file_count);
    }
}
