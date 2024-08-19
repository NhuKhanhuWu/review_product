<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Contracts\Database\Eloquent\Builder;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $title = $request->input("title");
        $sort = $request->input("sort");

        $request->validate([
            'from' => 'numeric',
            'to' => 'numeric|gt:from',
        ]);

        $products = Product::when(
            $title,
            fn($query, $title) => $query->title($title)
        )->rangePrice($request->price_from, $request->price_to)->avgRating()->totalReview();

        $products = match ($sort) {
            'a_z' => $products->sortA_Z(),
            'z_a' => $products->sortZ_A(),
            'expensive_cheap' => $products->sortExpensive(),
            'cheap_expensive' => $products->sortCheap(),
            'hight_rating' => $products->sortRating('desc'),
            'low_rating' => $products->sortRating('asc'),
            default => $products
        };

        $products = $products->get();

        return view("product.index", ['products' => $products]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(Product $product, Request $request)
    {
        // filter reviews
        $filter = $request->input('filter');
        $reviews = $filter == '' ? $product->review : $product->filterReview((int)$filter[0], $product)->get();

        return view('product.show', ['product' => $product->avgRating()->totalReview()->findOrFail($product->id), 'reviews' => $reviews]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
