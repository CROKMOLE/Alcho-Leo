<?php

use App\Http\Controllers\ProductController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Session;

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

Route::controller(ProductController::class)->group(function () {
//    Route::get('/products', 'index');
    Route::get('/search', 'search');
    Route::get('/products', 'index')->name('products.index');
});

Route::post('/theme', function (Request $request) {
    $current = session('theme', 'light');
    $newTheme = $current === 'light' ? 'dark' : 'light';
    session(['theme' => $newTheme]);
    return redirect()->back();
})->name('theme.toggle');


Route::get('/lang/{locale}', function (string $locale) {
    if (! in_array($locale, ['en', 'ru'])) {
        abort(404);
    }

    Session::put('locale', $locale);
    App::setLocale($locale);


    return redirect()->back();
});

