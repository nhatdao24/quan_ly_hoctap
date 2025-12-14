<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Auth;



class AssignmentController extends Controller
{
    //
    // view quản lý bài tập trong dự án
    public function assignmentManagement($project_id)
    {
        // Lấy thông tin dự án
        $project = DB::table('projects')->where('id', $project_id)->first();

        // Lấy danh sách bài tập
        $assignments = DB::table('assignments')
            ->where('project_id', $project_id)
            ->orderBy('created_at', 'desc')
            ->get();

        // Lấy danh sách thành viên trong dự án
        $members = DB::table('project_user_roles')
            ->join('users', 'users.id', '=', 'project_user_roles.user_id')
            ->where('project_user_roles.project_id', $project_id)
            ->select('users.id', 'users.name', 'users.email')
            ->get();

        return view('Admin.index', [
            'content' => 'assignment_management',
            'project_id' => $project_id,
            'project' => $project,
            'assignments' => $assignments,
            'members' => $members
        ]);
    }

    // Thêm bài tập mới
    public function createAssignment(Request $request)
    {
        $request->validate([
            'project_id' => 'required|integer',
            'title' => 'required|string|max:50',
            'description' => 'nullable|string',
            'end_date' => 'required|date',
            'file' => 'nullable|file|mimes:doc,docx|max:10240'
        ]);

        $filePath = null;

        // Upload file nếu có
        if ($request->hasFile('file')) {
            $file = $request->file('file');
            $fileName = time() . '_' . $file->getClientOriginalName();
            $filePath = $file->storeAs('assignments', $fileName, 'public');
        }

        // Thêm bài tập vào database
        DB::table('assignments')->insert([
            'project_id' => $request->project_id,
            'title' => $request->title,
            'description' => $request->description,
            'file_path' => $filePath,
            'end_date' => $request->end_date,
            'created_at' => now()
        ]);

        return redirect()->route('admin.assignmentManagement', ['project_id' => $request->project_id])
            ->with('success', 'Thêm bài tập thành công');
    }

    // Cập nhật bài tập
    public function updateAssignment(Request $request)
    {
        $request->validate([
            'assignment_id' => 'required|integer',
            'project_id' => 'required|integer',
            'title' => 'required|string|max:50',
            'description' => 'nullable|string',
            'end_date' => 'required|date',
            'file' => 'nullable|file|mimes:doc,docx|max:10240'
        ]);

        $assignment = DB::table('assignments')->where('id', $request->assignment_id)->first();
        $filePath = $assignment->file_path;

        // Upload file mới nếu có
        if ($request->hasFile('file')) {
            // Xóa file cũ
            if ($filePath && Storage::disk('public')->exists($filePath)) {
                Storage::disk('public')->delete($filePath);
            }

            $file = $request->file('file');
            $fileName = time() . '_' . $file->getClientOriginalName();
            $filePath = $file->storeAs('assignments', $fileName, 'public');
        }

        // Cập nhật bài tập
        DB::table('assignments')
            ->where('id', $request->assignment_id)
            ->update([
                'title' => $request->title,
                'description' => $request->description,
                'file_path' => $filePath,
                'end_date' => $request->end_date
            ]);

        return redirect()->route('admin.assignmentManagement', ['project_id' => $request->project_id])
            ->with('success', 'Cập nhật bài tập thành công');
    }

    // Xóa bài tập
    public function deleteAssignment(Request $request)
    {
        $request->validate([
            'assignment_id' => 'required|integer',
            'project_id' => 'required|integer'
        ]);

        $assignment = DB::table('assignments')->where('id', $request->assignment_id)->first();

        // Xóa file nếu có
        if ($assignment->file_path && Storage::disk('public')->exists($assignment->file_path)) {
            Storage::disk('public')->delete($assignment->file_path);
        }

        // Xóa submissions của bài tập
        $submissions = DB::table('submissions')->where('assignment_id', $request->assignment_id)->get();
        foreach ($submissions as $submission) {
            if ($submission->file_path && Storage::disk('public')->exists($submission->file_path)) {
                Storage::disk('public')->delete($submission->file_path);
            }
        }
        DB::table('submissions')->where('assignment_id', $request->assignment_id)->delete();

        // Xóa bài tập
        DB::table('assignments')->where('id', $request->assignment_id)->delete();

        return redirect()->route('admin.assignmentManagement', ['project_id' => $request->project_id])
            ->with('success', 'Xóa bài tập thành công');
    }

    // Xem chi tiết bài tập và danh sách nộp bài
    public function assignmentDetail($assignment_id)
    {
        // Lấy thông tin bài tập
        $assignment = DB::table('assignments')->where('id', $assignment_id)->first();

        if (!$assignment) {
            return redirect()->back()->with('error', 'Bài tập không tồn tại');
        }

        // Lấy danh sách thành viên trong dự án
        $members = DB::table('project_user_roles')
            ->join('users', 'users.id', '=', 'project_user_roles.user_id')
            ->where('project_user_roles.project_id', $assignment->project_id)
            ->select('users.id', 'users.name', 'users.email')
            ->get();

        // Lấy danh sách đã nộp bài
        $submissions = DB::table('submissions')
            ->where('assignment_id', $assignment_id)
            ->pluck('user_id');

        // Tạo danh sách trạng thái nộp bài
        $submissionStatus = [];
        foreach ($members as $member) {
            $submission = DB::table('submissions')
                ->where('assignment_id', $assignment_id)
                ->where('user_id', $member->id)
                ->first();

            $submissionStatus[] = [
                'user_id' => $member->id,
                'name' => $member->name,
                'email' => $member->email,
                'status' => $submission ? 'submitted' : 'missing',
                'file_path' => $submission ? $submission->file_path : null,
                'submitted_at' => $submission ? $submission->submitted_at : null
            ];
        }

        return view('Admin.index', [
            'content' => 'assignment_detail',
            'assignment' => $assignment,
            'submissionStatus' => $submissionStatus,
            'project_id' => $assignment->project_id
        ]);
    }

    // dowload bài tập của sinh viên về
    public function downloadSubmission($file_path)
    {
        if (!Storage::exists($file_path)) {
            abort(404, 'File không tồn tại');
        }

        return Storage::download($file_path);
    }
}
