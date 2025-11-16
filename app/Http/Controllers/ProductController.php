<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    public function index()
    {
        $products = Product::query()->limit(10)->get(); // 10 записей на страницу

        return view('market-skeleton', [
            'page' => 'market-pages.product-list',
            'products' => $products
        ]);
    }

}
