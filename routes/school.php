<?php

Route::prefix('school')->group(function () {
    Route::get('/', [\App\Http\Controllers\SchoolController::class, 'index']);
    Route::get('/{school}', [\App\Http\Controllers\SchoolController::class, 'show']);
//    Route::post('/', [\App\Http\Controllers\SchoolController::class, 'store'])->middleware('auth');
//    Route::post('/{school}', [\App\Http\Controllers\SchoolController::class, 'update'])->middleware('auth');
//    Route::delete('/{school}', [\App\Http\Controllers\SchoolController::class, 'destroy'])->middleware('auth');
});
