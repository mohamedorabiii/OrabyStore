<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Services\SearchService;
use Illuminate\Http\Request;

class SearchController extends Controller
{
    public function __construct(protected SearchService $searchService) {}

    public function index(Request $request)
    {
        $query   = $request->input('q', '');
        $results = $query
            ? $this->searchService->search($query)
            : [
                'products'      => collect(),
                'categories'    => collect(),
                'brands'        => collect(),
                'subcategories' => collect(),
            ];

        return view('search', array_merge($results, compact('query')));
    }
    public function live(Request $request)
    {
        $query = $request->input('q', '');

        if (strlen($query) < 2) {
            return response()->json([]);
        }

        $results = $this->searchService->search($query, 5);

        return response()->json([
            'products' => $results['products']->getCollection()->map(fn ($product) => [
                'id'    => $product->id,
                'name'  => $product->name_en,
                'price' => $product->price,
                'image' => asset('storage/' . $product->image),
                'url'   => route('product.details', $product->id),
            ])->values(),
            'categories' => $results['categories']->map(fn ($category) => [
                'id'   => $category->id,
                'name' => $category->name_en,
                'url'  => route('categories'),
            ])->values(),
            'brands' => $results['brands']->map(fn ($brand) => [
                'id'   => $brand->id,
                'name' => $brand->name,
                'url'  => route('brands'),
            ])->values(),
        ]);
    }
}