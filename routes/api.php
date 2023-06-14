<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\V1\InvoiceController;

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
Route::group(['prefix'=>'v1','namespace'=>'\App\Http\Controllers\Api\V1','middleware'=>'auth:sanctum'],function(){
  Route::ApiResource('customers',CustomerController::class);
  Route::ApiResource('invoices',InvoiceController::class);
  Route::post('/invoices/bulkInvoice',[InvoiceController::class,'bulkInvoice']);

});
