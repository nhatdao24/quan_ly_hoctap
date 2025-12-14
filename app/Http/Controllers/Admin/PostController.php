<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

class PostController extends Controller
{
    //
    // view quản lsý bài viết trong dự án
        public function postManagement($project_id)
        {
            // Lấy thông tin dự án
            $project = DB::table('projects')->where('id', $project_id)->first();
            
            // Lấy danh sách posts với thông tin user
            $posts = DB::table('posts')
                ->where('project_id', $project_id)
                ->orderBy('created_at', 'desc')
                ->get();
            
            // Lấy tất cả comments của các posts trong dự án
            $postIds = $posts->pluck('id');
            $comments = DB::table('comments')
                ->join('users', 'users.id', '=', 'comments.user_id')
                ->whereIn('post_id', $postIds)
                ->select('comments.*', 'users.name as user_name')
                ->orderBy('comments.created_at', 'asc')
                ->get()
                ->groupBy('post_id');
            
            return view('Admin.index', [
                'content' => 'post_management',
                'project_id' => $project_id,
                'project' => $project,
                'posts' => $posts,
                'comments' => $comments
            ]);
        }
        
        // Tạo post mới
        public function createPost(Request $request)
        {
            $request->validate([
                'project_id' => 'required|integer',
                'title' => 'required|string|max:50',
                'content' => 'required|string',
                'image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:5120'
            ]);
            
            $imagePath = null;
            
            // Upload ảnh nếu có
            if ($request->hasFile('image')) {
                $image = $request->file('image');
                $imageName = time() . '_' . $image->getClientOriginalName();
                $imagePath = $image->storeAs('posts', $imageName, 'public');
            }
            
            DB::table('posts')->insert([
                'project_id' => $request->project_id,
                'title' => $request->title,
                'content' => $request->content,
                'image_path' => $imagePath,
                'created_at' => now()
            ]);
            
            return redirect()->route('admin.postManagement', ['project_id' => $request->project_id])
                ->with('success', 'Tạo bài viết thành công');
        }
        
        // Cập nhật post
        public function updatePost(Request $request)
        {
            $request->validate([
                'post_id' => 'required|integer',
                'project_id' => 'required|integer',
                'title' => 'required|string|max:50',
                'content' => 'required|string',
                'image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:5120'
            ]);
            
            $post = DB::table('posts')->where('id', $request->post_id)->first();
            $imagePath = $post->image_path;
            
            // Upload ảnh mới nếu có
            if ($request->hasFile('image')) {
                // Xóa ảnh cũ
                if ($imagePath && Storage::disk('public')->exists($imagePath)) {
                    Storage::disk('public')->delete($imagePath);
                }
                
                $image = $request->file('image');
                $imageName = time() . '_' . $image->getClientOriginalName();
                $imagePath = $image->storeAs('posts', $imageName, 'public');
            }
            
            DB::table('posts')
                ->where('id', $request->post_id)
                ->update([
                    'title' => $request->title,
                    'content' => $request->content,
                    'image_path' => $imagePath
                ]);
            
            return redirect()->route('admin.postManagement', ['project_id' => $request->project_id])
                ->with('success', 'Cập nhật bài viết thành công');
        }
        
        // Xóa post
        public function deletePost(Request $request)
        {
            $request->validate([
                'post_id' => 'required|integer',
                'project_id' => 'required|integer'
            ]);
            
            // Lấy thông tin post
            $post = DB::table('posts')->where('id', $request->post_id)->first();
            
            // Xóa ảnh nếu có
            if ($post->image_path && Storage::disk('public')->exists($post->image_path)) {
                Storage::disk('public')->delete($post->image_path);
            }
            
            // Xóa comments của post
            DB::table('comments')->where('post_id', $request->post_id)->delete();
            
            // Xóa post
            DB::table('posts')->where('id', $request->post_id)->delete();
            
            return redirect()->route('admin.postManagement', ['project_id' => $request->project_id])
                ->with('success', 'Xóa bài viết thành công');
        }
        
        // Tạo comment
        public function createComment(Request $request)
        {
            $request->validate([
                'post_id' => 'required|integer',
                'project_id' => 'required|integer',
                'content' => 'required|string'
            ]);
            
            DB::table('comments')->insert([
                'post_id' => $request->post_id,
                'user_id' => Auth::user()->id,
                'content' => $request->content,
                'status' => 'completed', // Admin comment mặc định completed
                'created_at' => now()
            ]);
            
            return redirect()->route('admin.postManagement', ['project_id' => $request->project_id])
                ->with('success', 'Thêm comment thành công');
        }
        
        // Cập nhật nội dung comment
        public function updateComment(Request $request)
        {
            $request->validate([
                'comment_id' => 'required|integer',
                'project_id' => 'required|integer',
                'content' => 'required|string|max:1000'
            ]);
            
            DB::table('comments')
                ->where('id', $request->comment_id)
                ->update(['content' => $request->content]);
            
            return redirect()->route('admin.postManagement', ['project_id' => $request->project_id])
                ->with('success', 'Cập nhật comment thành công');
        }
        
        // Cập nhật trạng thái comment
        public function updateCommentStatus(Request $request)
        {
            $request->validate([
                'comment_id' => 'required|integer',
                'project_id' => 'required|integer',
                'status' => 'required|in:pending,completed,cancelled'
            ]);
            
            DB::table('comments')
                ->where('id', $request->comment_id)
                ->update(['status' => $request->status]);
            
            return redirect()->route('admin.postManagement', ['project_id' => $request->project_id])
                ->with('success', 'Cập nhật trạng thái comment thành công');
        }
        
        // Xóa comment
        public function deleteComment(Request $request)
        {
            $request->validate([
                'comment_id' => 'required|integer',
                'project_id' => 'required|integer'
            ]);
            
            DB::table('comments')->where('id', $request->comment_id)->delete();
            
            return redirect()->route('admin.postManagement', ['project_id' => $request->project_id])
                ->with('success', 'Xóa comment thành công');
        }
}
