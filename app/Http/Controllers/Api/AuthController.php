<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;

class AuthController extends Controller
{
    public function login(Request $request)
    {
        $request->validate([
            "email" => "required|email",
            'password' => 'required'
        ]);

        // Attempt to log the user in
        if (Auth::attempt(['email' => $request->email, 'password' => $request->password])) {
            $user = User::where('email', $request->email)->first(); // get user in database
            $token = $user->createToken('token')->plainTextToken; //create token

            return redirect()->to($request->pre_url)->with('token', json_decode($token));
        }

        // If unsuccessful, redirect back to the login with the form data
        return redirect()->route('login')->with('message', 'Incorrect email/password');
    }

    public function logout(Request $request)
    {
        // delete token
        $request->user()->tokens()->delete();

        // logout
        Auth::guard('web')->logout();
        return redirect()->route('products.index')->with('message', 'logout successfully');
    }

    public function checkLoginAjax()
    {
        $check_result = Auth::check() == 1 ? true : false;
        return response()->json(['authenticated' => $check_result]);
    }
}
