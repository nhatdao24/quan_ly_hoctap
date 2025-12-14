<?php

namespace App\Http\Controllers\Client;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class ClientController extends Controller
{
    //
    public function clientDashboard()
    {
        $projects = DB::table('projects')->get();
        return view('Client.index', ['content' => 'dashboard', 'projects' => $projects]);
    }
    // view dự án chi tiết
    public function projectDetail($id)
    {
        $project = DB::table('projects')->where('id', $id)->first();
        return view('Client.index', ['content' => 'project_Detail', 'project' => $project, 'project_id' => $id]);
    }   

        // cập nhật thông tin người dùng
    public function updateProfile(Request $request)
    {
        if (!Auth::check()) {
            return redirect()->route('login')->with('error', 'Vui lòng đăng nhập.');
        }

        $request->validate([
            'name' => 'required|string|max:255',
            'password' => 'nullable|min:6|confirmed',
        ]);

        $userId = Auth::user()->id;
        $updateData = [
            'name' => $request->input('name'),
        ];

        // Nếu có đổi mật khẩu
        if ($request->filled('password')) {
            $updateData['password'] = Hash::make($request->input('password'));
        }

        DB::table('users')
            ->where('id', $userId)
            ->update($updateData);

        return redirect()->back()->with('success', 'Cập nhật thông tin thành công!');
    } 
}
