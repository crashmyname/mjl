<?php
use Support\Route;
use Support\View;
use Support\AuthMiddleware;

// handleMiddleware();
Route::get('/',function(){
    return view('home/home',[],'layout/app');
});
Route::get('/login',function(){
    return view('auth/sign-in');
});
Route::get('/users',function(){
    return view('users/user',[],'layout/app');
});
Route::get('/invoices',function(){
    return view('invoices/invoice',[],'layout/app');
});
Route::get('/shippers',function(){
    return view('shippers/shipper',[],'layout/app');
});
Route::get('/transactions',function(){
    return view('transactions/transaction',[],'layout/app');
});
Route::get('/transporters',function(){
    return view('transporters/transporter',[],'layout/app');
});
Route::get('/payment',function(){
    return view('payments/payment',[],'layout/app');
});