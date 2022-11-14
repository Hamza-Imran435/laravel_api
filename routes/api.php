<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CustomerController;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});


/** Customer Group Routes */
Route::controller(CustomerController::class)->group(function(){

    /** Get Data Route */
    Route::get('/','CustomerList');

    /**Register Customer Route */
    Route::post('/register','insertCustomer');

    /**Delete Customer Record  Route*/
    Route::post('/delete/{id}','deleteCustomerRecord');

    /**Update Customer Record Route  */
    Route::post('/update/{id?}/{key:name?}','updateCustomer');

    /**Single Customer Fetch Route */
    Route::get('/customer/{id}','customer');

});
