<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('market-skeleton', [
        'page' => 'market-pages.welcome'
    ]);
});


Route::get('/tt', function () {
    return view('market-skeleton', [
        'page' => 'market-pages.w'
    ]);
});
