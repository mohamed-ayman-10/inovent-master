<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
    public function login()
    {
        return view('frontend.auth.login');
    }

    public function postLogin(Request $request)
    {
        try {

            $request->validate([
                'email' => 'required|email',
                'password' => 'required'
            ]);

            if (Auth::guard('web')->attempt($request->except('_token'))) {
                return redirect('home');
            } else {
                return back()->withErrors(['error' => 'The email or password is incorrect']);
            }

        } catch (\Exception $e) {
            return back()->withErrors(['error' => $e->getMessage()]);
        }
    }

    public function register()
    {
        return view('frontend.auth.register');
    }

    public function postRegister(Request $request)
    {
        try {

            $request->validate([
                'first_name' => 'required|string|min:2',
                'last_name' => 'required|string|min:2',
                'phone' => 'required|string|min:11',
                'email' => 'required|email|unique:users,email',
                'password' => 'required|string|confirmed'
            ]);

            $user = new User();
            $user->first_name = $request->first_name;
            $user->last_name = $request->last_name;
            $user->phone = $request->phone;
            $user->email = $request->email;
            $user->password = bcrypt($request->password);
            $user->save();

            return redirect()->route('auth.login');

        } catch (\Exception $e) {
            return back()->withErrors(['error' => $e->getMessage()]);
        }
    }
}
