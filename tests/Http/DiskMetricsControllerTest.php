<?php
namespace Rubix\LaravelDiskMonitor\Tests\Http;

use Illuminate\Support\Facades\Route;
use Rubix\LaravelDiskMonitor\Tests\TestCase;

class DiskMetricsControllerTest extends TestCase
{
    /** @test */
    public function it_can_display_list_of_entries()
    {
        // Route::get('/test',[DiskMetricsController::class]);
        Route::diskMonitor('test');

        $this->get('/test')->assertOk();
    }
}
?>