<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\Tag;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\App;

class ProductController extends Controller
{
    public function index(Request $request)
    {
//        if (! in_array($locale, ['en', 'ru'])) {
//            abort(400);
//        }
//
//        App::setLocale($locale);
        $query = Product::with('tags');

        if ($request->has('tags') && is_array($request->tags) && count($request->tags) > 0) {
            foreach ($request->tags as $tagId) {
                $query->whereHas('tags', function ($q) use ($tagId) {
                    $q->where('tags.id', $tagId);
                });
            }
        }

        $products = $query->paginate(5)->withQueryString();
        $allTags = Tag::all();

        return view('market-skeleton', [
            'page' => 'market-pages.product-list',
            'products' => $products,
            'allTags' => $allTags,
        ]);
    }


}
