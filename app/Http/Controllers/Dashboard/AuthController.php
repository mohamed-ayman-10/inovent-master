<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
    public function login()
    {
        return view('dashboard.login');
    }

    public function postLogin(Request $request)
    {
        try {

            $request->validate([
                'email' => 'required|string',
                'password' => 'required|string'
            ]);

            if (Auth::guard('admin')->attempt($request->except('_token'))) {
                return redirect(RouteServiceProvider::DASHBOARD);
            }else {
                return back()->with('errorMessage', 'The email or password is incorrect');
            }

        } catch (\Exception $e) {
            return back()->with('errorMessage', $e->getMessage());
        }
    }

    public function logout(Request $request) {
        Auth::guard('admin')->logout();
        return redirect('dashboard/login');
    }
}
