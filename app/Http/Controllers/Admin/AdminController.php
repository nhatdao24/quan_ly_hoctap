<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;;
use Illuminate\Support\Facades\DB;

class AdminController extends Controller
{
    //
    public function dashboard()
    {
        $projects = DB::table('projects')->get();
        return view('Admin.index', ['content' => 'dashboard', 'projects' => $projects]);
    }

    
    

    // đổi mật khẩu
    public function changePassword(Request $request)
    {
        //
        $request->validate([
            'old_password' => 'required',
            'password' => 'required|min:8|confirmed',
        ]);
        $admin = Auth::user();
        if (!password_verify($request->old_password, $admin->password)) {
            return back()->withErrors(['old_password' => 'Mật khẩu cũ không đúng']);
        }
        $admin->password = bcrypt($request->password);
        DB::table('users')->where('id', $admin->id)->update(['password' => $admin->password]);
        return back()->with('success', 'Đổi mật khẩu thành công');
    }
}
