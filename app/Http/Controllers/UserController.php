<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;

class UserController extends Controller
{
    // Login Functionality
    public function login(Request $request)
    {
        // Validate the request
        $request->validate([
            'username' => 'required|string',
            'password' => 'required|string',
        ]);

        // Find the user by username
        $user = User::where('username', $request->username)->first();

        // Check if the user exists and the password matches
        if ($user && $user->password == $request->password) {
            return response()->json(['success' => true, 'user' => $user]);
        }

        // Return invalid credentials response
        return response()->json(['success' => false, 'message' => 'Invalid credentials'], 401);
    }
}
