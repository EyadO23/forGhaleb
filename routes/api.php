<?php

use App\Http\Controllers\DeviceTokenController;
use App\Http\Controllers\ReportController;
use Illuminate\Http\Request;
use App\Http\Middleware\CheckUser;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\TenderController;
use App\Http\Controllers\BidController;
use App\Http\Controllers\ContractorController;
use App\Http\Controllers\SavedTenderController;
use App\Http\Controllers\UserController;


Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');


//--------------------------------for User ------------------------------------
Route::post('register',[UserController::class,'register']);
Route::post('login',[UserController::class,'login']);
Route::post('logout',[UserController::class,'logout'])->middleware('auth:sanctum');
// Route::post('/google-login', [UserController::class, 'googleLogin']);

Route::post('/save-device-token', [DeviceTokenController::class, 'save'])->middleware('auth:sanctum');
         
Route::get('report/performance', [ReportController::class, 'performance'])->middleware('auth:sanctum');

Route::middleware(['auth:sanctum', CheckUser::class . ':admin'])->group(function () {
    Route::get('report/summary', [ReportController::class, 'summary']);
});



//--------------------------------------For Tender --------------------------------------

Route::middleware('auth:sanctum')->group(function(){
    Route::prefix('Tender')->group(function(){
         Route::get ('/index',[TenderController::class,'indexApi']); 
         Route::post('/{id}/save',[SavedTenderController::class,'savetender']);
         Route::delete('/{id}/delete',[SavedTenderController::class,'deletetender']);
         Route::get('/saved',[SavedTenderController::class,'getSavedTenders']);
         Route::get('/opened',[TenderController::class,'openedTenders']);


Route::middleware([CheckUser::class.':admin'])->group(function(){
            //   Route::get ('/show/{id}',[TenderController::class,'showApi']); 

              Route::post('/store', [TenderController::class,'storeApi']);

              Route::put('/update/{id}',[TenderController::class,'updateApi']); 

               Route::delete ('/destroy/{id}',[TenderController::class,'destroyApi']);
               

               Route::post('{tender}/evaluate', [BidController::class, 'evaluateBidsApi']);


}); 

});
});

Route::middleware([CheckUser::class.':admin,committee'])->group(function(){

               Route::post('Tender/winner', [TenderController::class, 'setManualWinner'])->middleware('auth:sanctum');
});
Route::middleware('auth:sanctum')->get('/notifications', function (Illuminate\Http\Request $request) {
    return $request->user()->notifications;
});





///------------------------------ for Bid --------------------------------------------------

Route::middleware('auth:sanctum')->group(function(){
    Route::prefix('bid')->group(function(){
        Route::post('/store', [BidController::class, 'storeApi']); 
        Route::put('/update/{id}', [BidController::class, 'updateApi']); 
        Route::get('/show/{id}',[BidController::class,'show']);

        Route::middleware([CheckUser::class.':admin,committee'])->group(function(){

           Route::get('/index', [BidController::class, 'index']);

       
});

    });

                 
    });



//-----------------------------------------contractor-------------------------------------
Route::middleware('auth:sanctum')->group(function(){
    Route::prefix('contractor')->group(function(){
       //------------------------store && update -------------------------------
        Route::post('/store', [ContractorController::class, 'store']); 

        Route::get('/user/{id}', [ContractorController::class, 'showByUserId']);   

        Route::get('/bids',[BidController::class,'previousbids']);

        Route::middleware([CheckUser::class.':admin'])->group(function(){

          Route::get('/index', [ContractorController::class, 'index']);

       
});
        
    });   

});

















               







