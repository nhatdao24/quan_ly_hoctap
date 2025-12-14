<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth as FacadesAuth;
use Illuminate\Support\Facades\Hash;
use App\Models\User;

class Auth extends Controller
{
    //
    public function login()
    {
        return view('auth.login');
    }
    public function register()
    {
        return view('auth.register');
    }
    public function logout()
    {
        //
        FacadesAuth::logout();
        return redirect('/');
    }
    public function checkLogin(Request $request)
    {
        //
        $request->validate([
            'email' => 'required|email',
            'password' => 'required|min:6',
        ]);

        if(FacadesAuth::attempt($request->only('email', 'password'))){
            // Authentication passed...
            if(FacadesAuth::user()->role == 'admin'){
                return redirect()->route('admin.dashboard');
            }
            else{
                
                return redirect()->route('client.dashboard');
            }
        }
        return redirect('login')->withErrors('Đăng nhập không thành công. Vui lòng kiểm tra lại thông tin.');
    }
    public function createAccount(Request $request){
        $request->validate([
            'name'=>'required|string|max:255',
            'email'=>'required|email|unique:users,email',
            'password'=>'required|string|min:6|confirmed',
        ]);
        // create user
        $user = User::create([
            'name'=>$request->name,
            'email'=>$request->email,
            'password'=>Hash::make($request->password),

        ]);
        // login user
        return redirect('login');
    }
}
