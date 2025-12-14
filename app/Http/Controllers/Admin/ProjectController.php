<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;


class ProjectController extends Controller
{
    //
    // view thêm dự án
    public function createProject()
    {
        return view('Admin.index', ['content' => 'create_project']);
    }

    // thêm dự án vào database
    public function addProject(Request $request)
    {
        //
        $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'nullable|string',
        ]);
        DB::table('projects')->insert([
            'title' => $request->title,
            'description' => $request->description,
            'created_at' => now(),
            'updated_at' => now(),
        ]);
        return redirect()->route('admin.dashboard')->with('success', 'Thêm dự án thành công');
    }

        // chi tiết dự án
        public function projectDetail($id)
        {
            // Lấy thông tin dự án
            $project = DB::table('projects')->where('id', $id)->first();
            
            // Đếm số lượng thành viên
            $memberCount = DB::table('project_user_roles')
                ->where('project_id', $id)
                ->count();
            
            // Đếm số lượng bài tập
            $assignmentCount = DB::table('assignments')
                ->where('project_id', $id)
                ->count();
            
            return view('Admin.index', [
                'content' => 'project_detail',
                'project_id' => $id,
                'project' => $project,
                'memberCount' => $memberCount,
                'assignmentCount' => $assignmentCount
            ]);
        }

        // view quản lý người dùng trong dự án
        public function userManagement($project_id)
        {
            // Lấy thông tin dự án
            $project = DB::table('projects')->where('id', $project_id)->first();
            
            // Lấy danh sách thành viên trong dự án
            $members = DB::table('project_user_roles')
                ->join('users', 'users.id', '=', 'project_user_roles.user_id')
                ->where('project_user_roles.project_id', $project_id)
                ->select('users.*', 'project_user_roles.role', 'project_user_roles.id as project_user_role_id')
                ->get();
            
            // Lấy danh sách user chưa có trong dự án
            $usersInProject = DB::table('project_user_roles')
                ->where('project_id', $project_id)
                ->pluck('user_id');
                
            $availableUsers = DB::table('users')
                ->whereNotIn('id', $usersInProject)
                ->where('role', '!=', 'admin')
                ->get();
            
            return view('Admin.index', [
                'content' => 'user_management', 
                'project_id' => $project_id,
                'project' => $project,
                'members' => $members,
                'availableUsers' => $availableUsers
            ]);
        }
        
        // Thêm thành viên vào dự án
        public function addMember(Request $request)
        {
            $request->validate([
                'project_id' => 'required|integer',
                'user_id' => 'required|integer',
                'role' => 'required|in:leader,member'
            ]);
            
            DB::table('project_user_roles')->insert([
                'project_id' => $request->project_id,
                'user_id' => $request->user_id,
                'role' => $request->role
            ]);
            
            return redirect()->route('admin.userManagement', ['project_id' => $request->project_id])
                ->with('success', 'Thêm thành viên thành công');
        }
        
        // Cập nhật role của thành viên
        public function updateMemberRole(Request $request)
        {
            $request->validate([
                'project_user_role_id' => 'required|integer',
                'role' => 'required|in:leader,member',
                'project_id' => 'required|integer'
            ]);
            
            DB::table('project_user_roles')
                ->where('id', $request->project_user_role_id)
                ->update(['role' => $request->role]);
            
            return redirect()->route('admin.userManagement', ['project_id' => $request->project_id])
                ->with('success', 'Cập nhật role thành công');
        }
        
        // Xóa thành viên khỏi dự án
        public function removeMember(Request $request)
        {
            $request->validate([
                'project_user_role_id' => 'required|integer',
                'project_id' => 'required|integer'
            ]);
            
            DB::table('project_user_roles')
                ->where('id', $request->project_user_role_id)
                ->delete();
            
            return redirect()->route('admin.userManagement', ['project_id' => $request->project_id])
                ->with('success', 'Xóa thành viên thành công');
        }
        
        
        // view quản lý file nộp trong dự án
        public function fileManagement($assignment_id)
        {
            return view('Admin.index', ['content' => 'file_management', 'assignment_id' => $assignment_id]);
        }
        
        
}
