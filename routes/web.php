<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\BidController;
use App\Http\Controllers\ReportController;
use App\Http\Controllers\TenderController;

Route::get('/', function () {
    return view('welcome');
});



Route::resource('tenders',TenderController::class);
Route::resource('bid',BidController::class);

Route::get('tender/{tender_id}/bids', [BidController::class, 'index'])->name('bid');
Route::get('/tenders/{tender}/evaluate', [BidController::class, 'evaluate'])->name('tenders.evaluate');

Route::post('/tenders/{tender}/bids', [BidController::class, 'store'])->name('bids.store');

Route::prefix('admin/report')->name('admin.report.')->group(function () {
    Route::get('/summary', [ReportController::class, 'summary'])->name('summary');
    Route::get('/performance', [ReportController::class, 'performance'])->name('performance');
});
