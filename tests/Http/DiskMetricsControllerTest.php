<?php
namespace Rubix\LaravelDiskMonitor\Tests\Http;

use Rubix\LaravelDiskMonitor\Tests\TestCase;

class DiskMetricsControllerTest extends TestCase
{
    /** @test */
    public function it_can_display_list_of_entries()
    {
        $this->get('laravel-disk-monitor')->assertOk();
    }
}
?>