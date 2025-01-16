<?php

namespace App\Http\Controllers;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

use Illuminate\Http\Request;

class RegisterController extends Controller
{
    public function register(Request $request){
        $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'nik' => ['required', 'string', 'max:255', 'unique:users'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'alamat' => ['required', 'string', 'max:255'],
            'password' => ['required', 'string', 'min:8', 'confirmed'],
        ]);
        User::create([
            'name' => $request['name'],
            'nik' => $request['nik'],
            'email' => $request['email'],
            'alamat' => $request['alamat'],
            'password' => Hash::make($request['password']),
        ]);
        return redirect()->back()->with('success', 'Akun sedang diverifikasi oleh admin');
    }
}
