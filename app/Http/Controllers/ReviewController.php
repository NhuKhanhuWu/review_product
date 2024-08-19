<?php

namespace App\Http\Controllers;

use App\Http\Requests\ReviewRequest;
use App\Models\Review;
use Illuminate\Http\Request;

use function PHPSTORM_META\type;

class ReviewController extends Controller
{
    public function __construct()
    {
        $this->middleware("throttle:review")->only(['store']);
    }

    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
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
    public function store(ReviewRequest $request)
    {
        Review::create($request->validated());

        $product_id = (int)$request->validated()["product_id"];
        return redirect('http://127.0.0.1:8000/products' . '/' . $product_id)->with('success', 'Review sended');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
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
