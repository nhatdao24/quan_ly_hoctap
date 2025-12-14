<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Testing\Fluent\Concerns\Has;

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
        $admin->password = Hash::make($request->password);
        DB::table('users')->where('id', $admin->id)->update(['password' => $admin->password]);
        return back()->with('success', 'Đổi mật khẩu thành công');
    }

    // danh sách tài khoản có trong hệ thống
    public function userList()
    {
        $users = DB::table('users')
            ->whereIn('role', ['client', 'lock'])
            ->orderBy('created_at', 'desc')
            ->get();
        return view('Admin.index', ['content' => 'user_list', 'users' => $users]);
    }

    // Cập nhật thông tin người dùng
    public function updateUser(Request $request)
    {
        $request->validate([
            'user_id' => 'required|integer',
            'name' => 'required|string|max:255',
            'password' => 'nullable|min:8'
        ]);

        $updateData = [
            'name' => $request->name,
        ];

        // Chỉ cập nhật mật khẩu nếu có nhập
        if ($request->filled('password')) {
            $updateData['password'] = Hash::make($request->password);
        }

        DB::table('users')
            ->where('id', $request->user_id)
            ->update($updateData);

        return redirect()->route('admin.userList')->with('success', 'Cập nhật thông tin người dùng thành công');
    }

    // Xóa tài khoản người dùng
    public function deleteUser(Request $request)
    {
        $request->validate([
            'user_id' => 'required|integer'
        ]);

        // Xóa user khỏi tất cả dự án
        DB::table('project_user_roles')->where('user_id', $request->user_id)->delete();

        // Xóa tất cả submissions của user
        DB::table('submissions')->where('user_id', $request->user_id)->delete();

        // Xóa tất cả comments của user
        DB::table('comments')->where('user_id', $request->user_id)->delete();

        // Xóa user
        DB::table('users')->where('id', $request->user_id)->delete();

        return redirect()->route('admin.userList')->with('success', 'Xóa tài khoản người dùng thành công');
    }

    // Khóa/Mở khóa tài khoản
    public function toggleUserLock(Request $request)
    {
        $request->validate([
            'user_id' => 'required|integer'
        ]);

        $user = DB::table('users')->where('id', $request->user_id)->first();

        $newRole = $user->role === 'lock' ? 'client' : 'lock';

        DB::table('users')
            ->where('id', $request->user_id)
            ->update(['role' => $newRole]);

        $message = $newRole === 'lock' ? 'Đã khóa tài khoản' : 'Đã mở khóa tài khoản';

        return redirect()->route('admin.userList')->with('success', $message);
    }
}
