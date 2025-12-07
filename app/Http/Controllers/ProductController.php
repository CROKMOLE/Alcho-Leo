<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\Tag;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    public function index(Request $request)
    {
        $query = Product::with('tags');

        // фильтрация по выбранным тегам (все теги)
        if ($request->has('tags') && is_array($request->tags) && count($request->tags) > 0) {
            foreach ($request->tags as $tagId) {
                $query->whereHas('tags', function ($q) use ($tagId) {
                    $q->where('tags.id', $tagId);
                });
            }
        }

        $products = $query->paginate(5)->withQueryString(); // сохраняем фильтры в пагинации
        $allTags = Tag::all();

        return view('market-skeleton', [
            'page' => 'market-pages.product-list',
            'products' => $products,
            'allTags' => $allTags,
        ]);
    }


}
