<?php

namespace App\Http\Controllers\Client;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;

class PostController extends Controller
{
    // View danh sách bài posts và comments trong dự án 
    public function postList($project_id)
    {
        // Lấy thông tin dự án
        $project = DB::table('projects')->where('id', $project_id)->first();
        
        // Lấy danh sách posts
        $posts = DB::table('posts')
            ->where('project_id', $project_id)
            ->orderBy('created_at', 'desc')
            ->get();
        
        // Lấy comments cho mỗi post (chỉ lấy completed)
        $comments = [];
        foreach ($posts as $post) {
            $postComments = DB::table('comments')
                ->join('users', 'comments.user_id', '=', 'users.id')
                ->where('comments.post_id', $post->id)
                ->where('comments.status', 'completed')
                ->select('comments.*', 'users.name as user_name')
                ->orderBy('comments.created_at', 'asc')
                ->get();
            
            $comments[$post->id] = $postComments;
        }
        
        // Kiểm tra role của user hiện tại
        $userRole = DB::table('project_user_roles')
            ->where('project_id', $project_id)
            ->where('user_id', Auth::id())
            ->value('role');
        
        return view('Client.index', [
            'content' => 'post_list',
            'project' => $project,
            'project_id' => $project_id,
            'posts' => $posts,
            'comments' => $comments,
            'userRole' => $userRole
        ]);
    }
    
    // Tạo comment mới
    public function createComment(Request $request)
    {
        // kiểm tra user đã có trong bảng project_user_roles chưa
        $userRole = DB::table('project_user_roles')
            ->where('project_id', $request->project_id)
            ->where('user_id', Auth::id())
            ->value('role');
        if (!$userRole) {
            return redirect()->back()->with('error', 'Bạn không có quyền thêm bình luận trong dự án này!');
        }

        $request->validate([
            'post_id' => 'required',
            'project_id' => 'required',
            'content' => 'required|string|max:1000',
        ]);
        
        DB::table('comments')->insert([
            'post_id' => $request->post_id,
            'user_id' => Auth::id(),
            'content' => $request->content,
            'status' => 'pending',
            'created_at' => now(),
        ]);
        
        return redirect()->back()->with('success', 'Comment đã được gửi và đang chờ duyệt!');
    }
    
    // Cập nhật comment của mình hoặc của người khác (nếu là leader)
    public function updateComment(Request $request)
    {
        $request->validate([
            'comment_id' => 'required',
            'project_id' => 'required',
            'content' => 'required|string|max:1000',
        ]);
        
        $comment = DB::table('comments')->where('id', $request->comment_id)->first();
        
        if (!$comment) {
            return redirect()->back()->with('error', 'Comment không tồn tại!');
        }
        
        // Kiểm tra quyền
        $userRole = DB::table('project_user_roles')
            ->where('project_id', $request->project_id)
            ->where('user_id', Auth::id())
            ->value('role');
        
        $canEdit = false;
        
        // Nếu là comment của mình
        if ($comment->user_id == Auth::id()) {
            $canEdit = true;
        }
        // Nếu là leader và comment đang ở trạng thái completed
        elseif ($userRole == 'leader' && $comment->status == 'completed') {
            $canEdit = true;
        }
        
        if (!$canEdit) {
            return redirect()->back()->with('error', 'Bạn không có quyền chỉnh sửa comment này!');
        }
        
        DB::table('comments')
            ->where('id', $request->comment_id)
            ->update([
                'content' => $request->content,
            ]);
        
        return redirect()->back()->with('success', 'Cập nhật comment thành công!');
    }
    
    // Xóa comment của mình hoặc của người khác (nếu là leader)
    public function deleteComment(Request $request)
    {
        $request->validate([
            'comment_id' => 'required',
            'project_id' => 'required',
        ]);
        
        $comment = DB::table('comments')->where('id', $request->comment_id)->first();
        
        if (!$comment) {
            return redirect()->back()->with('error', 'Comment không tồn tại!');
        }
        
        // Kiểm tra quyền
        $userRole = DB::table('project_user_roles')
            ->where('project_id', $request->project_id)
            ->where('user_id', Auth::id())
            ->value('role');
        
        $canDelete = false;
        
        // Nếu là comment của mình
        if ($comment->user_id == Auth::id()) {
            $canDelete = true;
        }
        // Nếu là leader và comment đang ở trạng thái completed
        elseif ($userRole == 'leader' && $comment->status == 'completed') {
            $canDelete = true;
        }
        
        if (!$canDelete) {
            return redirect()->back()->with('error', 'Bạn không có quyền xóa comment này!');
        }
        
        DB::table('comments')->where('id', $request->comment_id)->delete();
        
        return redirect()->back()->with('success', 'Xóa comment thành công!');
    }
}

