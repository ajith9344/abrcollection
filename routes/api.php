<?php

use App\Http\Controllers\WebController;
use App\Http\Controllers\AppController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

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


//Routes for Customer
Route::post('/createcustomer',[WebController::class,'createCustomer']);
Route::get('/viewcustomer',[WebController::class,'viewCustomer']);
Route::get('/showcustomer/{id}',[WebController::class,'showCustomer']);
Route::post('/deletecustomer/{id}',[WebController::class,'destroyCustomer']);
Route::post('/updatecustomer/{id}',[WebController::class,'updateCustomer']);

//Routes for Login
Route::post('/userregister',[WebController::class,'userRegister']);
Route::post('/userlogin',[WebController::class,'userLogin']);
Route::get('/userdetails',[WebController::class,'userDetails']);

//Routes for Staff
Route::post('/createstaff',[WebController::class,'createStaff']);
Route::get('/viewstaff',[WebController::class,'viewStaff']);
Route::get('/showstaff/{id}',[WebController::class,'showStaff']);
Route::post('/updatestaff/{id}',[WebController::class,'updateStaff']);
Route::post('/deletestaff/{id}',[WebController::class,'destroyStaff']);

//Routes for Admin
Route::post('/createadmin',[WebController::class,'createAdmin']);
Route::get('/viewadmin',[WebController::class,'viewAdmin']);
Route::get('/showadmin/{id}',[WebController::class,'showAdmin']);
Route::post('/deleteadmin/{id}',[WebController::class,'destroyAdmin']);
Route::post('/updateadmin/{id}',[WebController::class,'updateAdmin']);




//Route for payment
Route::post('/createpayments',[WebController::class,'createPayments']);
Route::get('/viewpayments',[WebController::class,'viewPayments']);
Route::get('/showpayments/{id}',[WebController::class,'showPayments']);
Route::post('/deletepayments/{id}',[WebController::class,'destroyPayments']);
Route::post('/updatepayments/{id}',[WebController::class,'updatePayments']);


//Route for sim
Route::post('/createsim',[WebController::class,'createSim']);
Route::get('/viewsim',[WebController::class,'viewSim']);
Route::get('/showsim/{id}',[WebController::class,'showSim']);
Route::post('/deletesim/{id}',[WebController::class,'destroySim']);
Route::post('/updatesim/{id}',[WebController::class,'updateSim']);
Route::get('/findsim',[WebController::class,'findsim']);









//For app side

//Routes for Login
Route::post('app/userregister',[AppController::class,'userRegister']);
Route::post('app/userlogin',[AppController::class,'userLogin']);
Route::get('app/userdetails',[AppController::class,'userDetails'])->middleware('auth:sanctum');


//Routes for Customer
Route::post('app/createcustomer',[AppController::class,'createCustomer']);
Route::get('app/viewcustomer',[AppController::class,'viewCustomer']);
Route::get('app/showcustomer/{id}',[AppController::class,'showCustomer']);
Route::post('app/deletecustomer/{id}',[AppController::class,'destroyCustomer']);
Route::post('app/updatecustomer/{id}',[AppController::class,'updateCustomer']);

//Routes for Staff
Route::post('app/createstaff',[AppController::class,'createStaff']);
Route::get('app/viewstaff',[AppController::class,'viewStaff']);
Route::get('app/showstaff/{id}',[AppController::class,'showStaff']);
Route::post('app/updatestaff/{id}',[AppController::class,'updateStaff']);
Route::post('app/deletestaff/{id}',[AppController::class,'destroyStaff']);

//Routes for Admin
Route::post('app/createadmin',[AppController::class,'createAdmin']);
Route::get('app/viewadmin',[AppController::class,'viewAdmin']);
Route::get('app/showadmin/{id}',[AppController::class,'showAdmin']);
Route::post('app/deleteadmin/{id}',[AppController::class,'destroyAdmin']);
Route::post('app/updateadmin/{id}',[AppController::class,'updateAdmin']);




//Route for payment
Route::post('app/createpayments',[AppController::class,'createPayments']);
Route::get('app/viewpayments',[AppController::class,'viewPayments']);
Route::get('app/showpayments/{id}',[AppController::class,'showPayments']);
Route::post('app/deletepayments/{id}',[AppController::class,'destroyPayments']);
Route::post('app/updatepayments/{id}',[AppController::class,'updatePayments']);


//Route for sim
Route::post('app/createsim',[AppController::class,'createSim']);
Route::get('app/viewsim',[AppController::class,'viewSim']);
Route::get('app/showsim/{id}',[AppController::class,'showSim']);
Route::post('app/deletesim/{id}',[AppController::class,'destroySim']);
Route::post('app/updatesim/{id}',[AppController::class,'updateSim']);



/*Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::get(
    '/some_url',
    function () {
        return "Token is wrong";
    }
)->name('view');
*/