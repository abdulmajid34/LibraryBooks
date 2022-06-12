<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\UserAdmin;
use Illuminate\Support\Facades\Hash;

class RegisterController extends Controller
{
    public function formRegister() {
        return view('register');
    }

    public function register(Request $request) {
        $validatedData = $request->validate([
            'name' => 'required',
            'email' => 'required|email',
            'password' => 'required'
        ]);

        $validatedData['password'] = Hash::make($validatedData['password']);
        if(UserAdmin::create($validatedData)) {
            $request->session()->flash('success', trans('message.msg-register-success'));
            return redirect()->route('login');
        }

        return back()->withErrors([
            'name' => trans('custom.name.required')
        ]);
    }
}
