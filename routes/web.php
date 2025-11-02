<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserFormController;

require __DIR__.'/auth.php';
Route::get('/', function () {
    return view('welcome');
});
// Route::middleware(['auth'])->group(function () {
    Route::get('/start',[UserFormController::class,'start'])->name('start');
    
    Route::get('/firststep',[UserFormController::class,'showfirststep'])->name('firststep.show');
    Route::post('/firststep',[UserFormController::class,'storestepone'])->name('firststep.store');

    Route::get('/secondstep',[UserFormController::class,'showsteptwo'])->name('secondstep.show');
    Route::post('/secondstep',[UserFormController::class,'storesteptwo'])->name('secondstep.store');

    Route::get('/complete',[UserFormController::class,'complete'])->name('complete');
    // Route::get('/form', [FormController::class, 'show'])->name('form.show');
    // Route::post('/form/{step}', [FormController::class, 'store'])->name('form.store');
    // Route::get('/form/complete', [FormController::class, 'complete'])->name('form.complete');
//  });
