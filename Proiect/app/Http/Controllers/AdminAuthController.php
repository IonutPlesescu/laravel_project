<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Cookie;
class AdminAuthController extends Controller
{
    public function showLoginForm()
    {
        return view('admin.auth.login');
    }



    public function login(Request $request)
    {
        $credentials = $request->only('username', 'parola');
    
        // Retrieve the user by username
        $user = \App\Models\CustomAdmin::where('username', $credentials['username'])->first();
    
        // Check if the user exists and if the password starts with '$2y$'
        if ($user && Hash::check($credentials['parola'], $user->parola)) {
            // Log successful login
            Log::info('Login Successful');
    
            // Manually log in the user
            Auth::guard('admin')->login($user);
    
            // Create a session for the user
            $request->session()->regenerate();
    
            // Set a cookie with the username
            return redirect('/evenimente')->withCookie(Cookie::make('logged_user', $user->username, 60));
        }
    
        // Log failed login attempt
        Log::error('Login Error: Invalid credentials', $credentials);
        return back()->withErrors(['username' => 'Invalid credentials']);
    }
    
    

    public function logout()
    {
        return redirect('/evenimente')->withCookie(Cookie::forget('logged_user'));
    }

}
