<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;

class UserController extends Controller
{
    public function index() {
        $users = User::all();
        return view('dashboard.pages.users.index', compact('users'));
    }

    public function edit($id) {
        $user = User::query()->findOrFail($id);
        return view('dashboard.pages.users.edit', compact('user'));
    }

    public function update($id, Request $request) {
        try {

            $request->validate([
                'first_name' => 'required|min:2|string',
                'last_name' => 'required|min:2|string',
                'phone' => 'required|string|min:11|max:15',
                'email' => 'required|email|unique:users,email,'.$request->id,
                'password' => 'confirmed',
            ]);

            $user = User::query()->findOrFail($request->id);
            $user->first_name = $request->first_name;
            $user->last_name = $request->last_name;
            $user->email = $request->email;
            $user->phone = $request->phone;
            if($request->password) {
                $user->password = $request->password;
            }
            $user->save();

            return redirect()->route('dashboard.users.index')->with('message', 'Updated User Successfully!');

        }catch (\Exception $e) {
            return back()->withErrors(['error', $e->getMessage()]);
        }
    }

    public function destroy($id) {
        User::destroy($id);
        return back()->with('message', 'Deleted User Successfully!');
    }
}
