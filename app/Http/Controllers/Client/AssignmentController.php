<?php

namespace App\Http\Controllers\Client;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class AssignmentController extends Controller
{
    //
    // view danh sạch bài tập trong dự án
    public function assignmentList($project_id)
    {
        $assignments = DB::table('assignments')->where('project_id', $project_id)->get();
        return view('Client.index', ['content' => 'assignment_List', 'assignments' => $assignments, 'project_id' => $project_id]);
    }
    // view chi tiết bài tập và nộp bài
    public function assignmentSubmit($assignment_id)
    {
        // kiểm tra user đã có trong bảng project_user_roles chưa
        $project_id = DB::table('assignments')->where('id', $assignment_id)->value('project_id');
        $userRole = DB::table('project_user_roles')
            ->where('project_id', $project_id)
            ->where('user_id', Auth::id())
            ->value('role');
        if (!$userRole) {
            return redirect()->back()->with('error', 'Bạn không có quyền truy cập bài tập này!');
        }
        // lấy thông tin bài tập
        $assignment = DB::table('assignments')->where('id', $assignment_id)->first();
        // kiểm tra đã nộp bài chưa
        $submission = DB::table('submissions')
            ->where('assignment_id', $assignment_id)
            ->where('user_id', Auth::user()->id)
            ->first();
        if ($submission) {
            return view('Client.index', ['content' => 'assignment_Submit', 'assignment' => $assignment, 'submission' => $submission]);
        }
        return view('Client.index', ['content' => 'assignment_Submit', 'assignment' => $assignment]);
    }

    // nộp bài tập
    public function submitAssignment(Request $request, $assignment_id)
    {
        // check quá hạn nộp bài
        $assignment = DB::table('assignments')->where('id', $assignment_id)->first();
        if (strtotime(now()) > strtotime($assignment->end_date)) {
            return redirect()->back()->with('error', 'Quá hạn nộp bài tập!');
        }
        // xử lý file upload
        $request->validate([
            'file_baitap' => 'required|file|max:10240', // giới hạn file 10MB
        ]);
        if ($request->hasFile('file_baitap')) {
            $file = $request->file('file_baitap');
            $fileName = time() . '_' . $file->getClientOriginalName();
            $filePath = $file->storeAs('submissions', $fileName);
            // lưu thông tin nộp bài vào database
            DB::table('submissions')->insert([
                'assignment_id' => $assignment_id,
                'user_id' => Auth::user()->id,
                'file_path' =>$filePath,
                'submitted_at' => now(),
                'status' => 'submitted',
            ]);
            return redirect()->back()->with('success', 'Nộp bài tập thành công!');
        } else {
            return redirect()->back()->with('error', 'Vui lòng chọn file để nộp bài tập.');
        }
    }
    // cap nhật bài tập đã nộp
    public function updateSubmission(Request $request, $assignment_id)
    {
        // check quá hạn nộp bài
        $assignment = DB::table('assignments')->where('id', $assignment_id)->first();
        if (strtotime(now()) > strtotime($assignment->end_date)) {
            return redirect()->back()->with('error', 'Quá hạn nộp bài tập!');
        }
        // xử lý file upload
        $request->validate([
            'file_baitap' => 'required|file|max:10240', // giới hạn file 10MB
        ]);
        if ($request->hasFile('file_baitap')) {
            $file = $request->file('file_baitap');
            $fileName = time() . '_' . $file->getClientOriginalName();
            $filePath = $file->storeAs('submissions', $fileName);
            // lưu thông tin nộp bài vào database
            DB::table('submissions')
                ->where('assignment_id', $assignment_id)
                ->where('user_id', Auth::user()->id)
                ->update([
                    'file_path' => $filePath,
                    'submitted_at' => now(),
                    'status' => 'submitted',
                ]);
            return redirect()->back()->with('success', 'Nộp bài tập thành công!');
        } else {
            return redirect()->back()->with('error', 'Vui lòng chọn file để nộp bài tập.');
        }
    }
}
