<?php

namespace App\Http\Controllers\Dashboard;

use Illuminate\Http\Request;
use Spatie\Permission\Models\Role;
use App\Models\User;

class ProfileController extends Controller
{
    public function profile()
    {
        $data = array(
            'user' => auth()->user()
        );
        return view('pages.dashboard.profile.edit', $data);
    }

    public function store(Request $request)
    {
        $user = User::find(auth()->user()->id);
        $user->name = $request->input('name');
        $user->email = $request->input('email');
        $user->save();
    }

    public function update(Request $request)
    {
        $user = User::find(auth()->user()->id);
        $user->name = $request->input('name');
        $user->email = $request->input('email');
        $user->save();

        return redirect()->route('dashboard.profile')->with('status', 'Profile updated successfully');
    }

    public function changePassword()
    {
        $data = array(
            'user' => auth()->user()
        );
        return view('pages.dashboard.profile.password', $data);
    }

    public function storePassword(Request $request)
    {
        $user = auth()->user();
        $password = $request->input('password');
        $confirmation = $request->input('password_confirmation');

        if ($password !== $confirmation) {
            return back()->withErrors(['password' => 'The password confirmation does not match']);
        }

        $user->password = bcrypt($password);
        $user->save();

        return redirect()->route('dashboard.profile.password.change')->with('status', 'Password updated successfully');
    }
}
