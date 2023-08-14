<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use App\Models\Admin;
use Illuminate\Http\Request;

class ProfileController extends Controller
{
    public function index() {
        return view('dashboard.pages.profile.index');
    }

    public function postEdit(Request $request) {
        try {

            $request->validate([
                'name' => 'required|string|min:2',
                'email' => 'required|email|unique:admins,email,'. auth()->user()->id,
                'password' => 'confirmed'
            ]);

            $admin = Admin::query()->findOrFail(auth()->user()->id);
            $admin->name = $request->name;
            $admin->email = $request->email;
            if ($request->Password) {
                $admin->password = $request->password;
            }
            $admin->save();

            return back()->with('message', 'Updated Profile Successfully');

        }catch (\Exception $e) {
            return back()->withErrors(['error', $e->getMessage()]);
        }
    }
}
