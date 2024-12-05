<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;

class AdminController extends Controller
{
    public function index(){
        return view('admin.dashboard');
    }

    public function login(){
        // User::create([
        //     'name' => 'Admin Manager',
        //     'email' => 'admin@gmail.com',
        //     'password' => bcrypt('123456')
        // ]);
        return view('admin.login');
    }

    public function check_login(Request $req){
        $req->validate([
            'email' => 'required|email|exists:users',
            'password' => 'required'
        ]);

        $data = $req->only('email','password');
        $check = auth()->attempt($data);
        if($check){
            return redirect()->route('admin.dashboard');
        }

        return redirect()->back();
    }

    public function logout(){
        auth()->logout();
        return redirect()->route('admin.login');
    }
}
