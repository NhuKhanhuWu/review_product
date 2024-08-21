<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Requests\UserRequest;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
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
        return view('user.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(UserRequest $request)
    {
        User::create($request->validated());
        return redirect()->route('products.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(User $user)
    {
        // return view('user.show', ['user' => $user]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(User $user)
    {
        return view('user.edit', ['user' => $user]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, User $user)
    {
        // dd($request->validated());
        // dd($request->);
        $user->update($request->validate([
            'name' => 'required',
            'email' => 'required|email|unique:users,email,' . $user->id,
            'birth' => 'date',
            'gender' => 'string'
        ]));

        session()->flash('success', 'Your information has ben updated!');
        return redirect()->route('users.edit', ['user' => $user]);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }

    // custom route
    public function reviews(User $user, Request $request)
    {
        // filter reviews
        $filter = $request->input('filter');
        $reviews = $filter == '' ? $user->reviews : $user->filterReview((int)$filter[0], $user)->get();
        // dd($reviews);

        return view('user.review', ['user' => $user, 'reviews' => $reviews]);
    }
}
