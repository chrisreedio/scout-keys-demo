<?php

use ChrisReedIO\ScoutKeys\Facades\ScoutKeys;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
})->name('welcome');

ScoutKeys::getRoute();
