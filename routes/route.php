<?php
use Support\Route;
use Support\View;
use Support\AuthMiddleware;

// handleMiddleware();
Route::get('/',function(){
    return view('home/home',[],'layout/app');
});