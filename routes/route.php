<?php
use App\Controllers\AuthController;
use App\Controllers\DriverController;
use App\Controllers\InvoiceController;
use App\Controllers\PaymentController;
use App\Controllers\PriceController;
use App\Controllers\TransactionController;
use App\Controllers\UserController;
use App\Controllers\VehicleController;
use App\Controllers\VendorController;
use Support\Route;
use Support\View;
use Support\AuthMiddleware;


// Authentication
Route::get('/sign-in',function(){
    return view('auth/sign-in');
});
Route::post('/sign-in',[AuthController::class, 'onLogin']);
Route::post('/sign-out',[AuthController::class, 'logout']);
Route::group([AuthMiddleware::class],function(){

    Route::get('/',function(){
        return view('home/home',[],'layout/app');
    });
    // User
    Route::get('/users', [UserController::class, 'index']);
    Route::get('/getusers', [UserController::class, 'getUser']);
    Route::post('/users', [UserController::class, 'create']);
    Route::put('/uusers/{id}', [UserController::class, 'update']);
    Route::delete('/users/{id}', [UserController::class, 'delete']);
    
    // Invoices
    Route::get('/invoices', [InvoiceController::class, 'index']);
    Route::get('/getinvoices', [InvoiceController::class, 'getInvoices']);
    Route::post('/cinvoices',[InvoiceController::class, 'create']);
    Route::put('/uinvoices/{id}', [InvoiceController::class, 'update']);
    Route::delete('/invoices/{id}', [InvoiceController::class, 'delete']);
    
    // Shippers
    Route::get('/shippers',[VendorController::class, 'index']);
    Route::get('/getshippers', [VendorController::class, 'getShippers']);
    Route::post('/shippers',[VendorController::class, 'create']);
    Route::put('/ushippers/{id}', [VendorController::class, 'update']);
    Route::delete('/shippers/{id}', [VendorController::class, 'delete']);
    
    // Order
    Route::get('/orders',[TransactionController::class, 'index']);
    Route::get('/getorders', [TransactionController::class, 'getOrders']);
    Route::post('/orders',[TransactionController::class, 'create']);
    Route::put('/uorders/{id}', [TransactionController::class, 'update']);
    Route::delete('/orders/{id}', [TransactionController::class, 'delete']);
    Route::post('/getprice',[TransactionController::class, 'getPrice']);
    
    // Transporter
    Route::get('/transporters',[DriverController::class, 'index']);
    // Transporter - Driver
    Route::get('/getdriver', [DriverController::class, 'getDriver']);
    Route::post('/driver',[DriverController::class, 'create']);
    Route::put('/udriver/{id}', [DriverController::class, 'update']);
    Route::delete('/driver/{id}', [DriverController::class, 'delete']);
    // Transporter - Vehicle
    Route::get('/getvehicle', [VehicleController::class, 'getVehicle']);
    Route::post('/vehicle',[VehicleController::class, 'create']);
    Route::put('/uvehicle/{id}', [VehicleController::class, 'update']);
    Route::delete('/vehicle/{id}', [VehicleController::class, 'delete']);
    // Transporter - Price
    Route::get('/getprice', [PriceController::class, 'getPrice']);
    Route::post('/price',[PriceController::class, 'create']);
    Route::put('/uprice/{id}', [PriceController::class, 'update']);
    Route::delete('/price/{id}', [PriceController::class, 'delete']);
    
    // Payment
    Route::get('/payment',function(){
        return view('payments/payment',[],'layout/app');
    });
    Route::get('/getpayment', [PaymentController::class, 'getPayment']);
    Route::post('/payment',[PaymentController::class, 'create']);
    Route::put('/upayment/{id}', [PaymentController::class, 'update']);
    Route::delete('/payment/{id}', [PaymentController::class, 'delete']);
});