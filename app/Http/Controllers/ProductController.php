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
    public function index()
    {
        $products = Product::query();

        $products->when(request('name'), function ($query) {
            $query->where('name', 'like', '%' . request('name') . '%');
        })->when(request('sortOption'), function ($query) {
            match (request('sortOption')) {
                'a_z' => $query->sortA_Z(),
                'z_a' => $query->sortZ_A(),
                'expensive_cheap' => $query->sortExpensive(),
                'cheap_expensive' => $query->sortCheap(),
                'hight_rating' => $query->sortRating('desc'),
                'low_rating' => $query->sortRating('asc'),
                default => $query
            };
        })->rangePrice(request('price_from'), request('price_to'))
            ->avgRating()
            ->totalReview();

        return view("product.index", ['products' => $products->get()]);
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
