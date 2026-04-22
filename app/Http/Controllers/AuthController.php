<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\LoginLog;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

class AuthController extends Controller
{


    public function register(Request $request)
    {
        // DEBUG (remove after testing)
        // dd("Custom register working");

        $request->validate([
            'name' => 'required',
            'mobile' => 'required|unique:users',
            'email' => 'required|unique:users',
        ]);

        $password = Str::random(8);

        // generate unique 9-digit user_id
        do {
            $user_id = rand(100000000, 999999999);
        } while (User::where('user_id', $user_id)->exists());

        $user = User::create([
            'name' => $request->name,
            'mobile' => $request->mobile,
            'email' => $request->email,
            'username' => $request->mobile, // ✅ FIXED
            'user_id' => $user_id,
            'password' => Hash::make($password),
        ]);

        return view('auth.success', [
            'username' => $request->mobile,
            'password' => $password,
            'user_id' => $user_id
        ]);
    }
    public function login(Request $request)
    {


        if (Auth::attempt($request->only('username', 'password'))) {

            $user = Auth::user();
            // 🔥 ROLE BASED REDIRECT
            if ($user->role === 'admin') {
                return redirect('admin/dashboard');
            }else{

                return redirect('/dashboard');
            }

        }
    }
    public function logout()
    {
        Auth::logout();
        return redirect('/login');
    }

    private function generateUnique($field, $length = 9)
    {
        do {
            $value = str_pad(rand(0, pow(10, $length) - 1), $length, '0', STR_PAD_LEFT);
        } while (User::where($field, $value)->exists());

        return $value;
    }
    protected function redirectTo($request)
    {
        if (!$request->expectsJson()) {
            return route('login'); // 👈 THIS NEEDS NAME
        }
    }
    public function showLogin()
    {
        return view('auth.login');
    }
}
