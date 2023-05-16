<?php
use Illuminate\Support\Facades\Artisan;
Route::get('restart', function () {
    /* php artisan migrate */
    Artisan::call('optimize:clear');
    Artisan::call('config:cache');
    Artisan::call('view:cache');
    Artisan::call('event:cache');
    dd("Done");
});
Route::get('end', function () {
    /* php artisan migrate */
    Artisan::call('optimize:clear');
    Artisan::call('config:clear');
    Artisan::call('view:clear');
    Artisan::call('route:clear');
    dd("Done");
});

