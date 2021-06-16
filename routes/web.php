<?php

use Illuminate\Support\Facades\Route;
use Rubix\LaravelDiskMonitor\Http\Controllers\DiskMetricsController;

Route::macro('diskMonitor',function(string $prefix){
    Route::prefix($prefix)->group(function(){
        Route::get('/',[DiskMetricsController::class]);
    });
});

