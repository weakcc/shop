<?php

Route::prefix('v1')->name('api.v1.')->group(function () {
    Route::get('version', function () {
//        abort(403, 'test');
        return 'this is version v1';
    })->name('version');
});


Route::prefix('v1')->namespace('Api')->name('api.v1.')->group(function () {
    Route::get('test', [\App\Http\Controllers\Api\TestController::class, 'test'])->name('test');
});
