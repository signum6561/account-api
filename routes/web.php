<?php

use Illuminate\Support\Facades\Route;
use Barryvdh\Debugbar\Facades\Debugbar;


Route::get('/', function () {
    DebugBar::info('Hello');
    return view('welcome');
});
