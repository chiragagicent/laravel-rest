<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\api\V1\InvoiceController;
use App\Http\Controllers\api\V1\CustomerController;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});
//api/v1/customers
Route::group(['prefix'=>'v1','namespace'=>'App\Http\Controllers\api\V1'],function(){
    Route::apiResource('customers',CustomerController::class);
    Route::apiResource('invoices',InvoiceController::class);

    Route::post('/invoices/bulk',['uses' => 'InvoiceController@bulkStore']);
});
