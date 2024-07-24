<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;
class UserController extends Controller
{
    public function register(Request $request)
    {
        // Validate the request data
        $validator = Validator::make($request->all(), [
            'username' => 'required|string|max:255|unique:users',
            'first_name' => 'required|string|max:255',
            'last_name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users',
            'password' => 'required|string|min:8|confirmed',
        ]);

        if ($validator->fails()) {
            return response()->json([
                'errors' => $validator->errors()
            ], 422);
        }

        // Create the new user
        $user = User::create([
            'username' => $request->username,
            'first_name' => $request->first_name,
            'last_name' => $request->last_name,
            'email' => $request->email,
            'password' => Hash::make($request->password), // Hash the password
        ]);

        return response()->json([
            'message' => 'User registered successfully',
            'user' => $user
        ], 201);
    }
    public function login(Request $request)
    {
        // Validate the request data
        $validator = Validator::make($request->all(), [
            'email' => 'required|string|email',
            'password' => 'required|string',
        ]);

        if ($validator->fails()) {
            return response()->json([
                'errors' => $validator->errors()
            ], 422);
        }

        // Attempt to log the user in
        $credentials = $request->only('email', 'password');
        if (Auth::attempt($credentials)) {
            $user = Auth::user();
            return response()->json([
                'message' => 'Login successful',
                'user' => $user
            ], 200);
        } else {
            return response()->json([
                'message' => 'Invalid email or password'
            ], 401);
        }
    }
    public function logout(Request $request)
    {
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();
        return response()->json(['message' => 'Logged out']);
    }
    public function getUserById($id)
    {
        $user = User::find($id);

        if ($user) {
            return response()->json($user, 200);
        } else {
            return response()->json(['message' => 'User not found'], 404);
        }
    }
}
