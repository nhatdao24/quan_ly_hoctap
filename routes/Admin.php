<?php

use App\Http\Controllers\Admin\AdminController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Auth;
use App\Http\Controllers\Admin\ProjectController;
use App\Http\Controllers\Client\PostController;
use App\Http\Controllers\Admin\AssignmentController;

// màn hình dashboard admin
Route::get('/dashboard', [AdminController::class, 'dashboard'])->name('admin.dashboard')->middleware('check.admin');
// đổi mật khẩu
Route::post('/changePassword', [AdminController::class, 'changePassword'])->name('admin.changePassword')->middleware('check.admin');

// view thêm dự án
Route::get('/createProject', [ProjectController::class, 'createProject'])->name('admin.createProject')->middleware('check.admin');
// thêm dự án vào database
Route::post('/addProject', [ProjectController::class, 'addProject'])->name('admin.addProject')->middleware('check.admin');
// chi tiết dự án
Route::get('/projectDetail/{id}', [ProjectController::class, 'projectDetail'])->name('admin.projectDetail')->middleware('check.admin');
// view quản lý người dùng trong dự án
Route::get('/user_management/{project_id}', [ProjectController::class, 'userManagement'])->name('admin.userManagement')->middleware('check.admin');
// thêm thành viên vào dự án
Route::post('/addMember', [ProjectController::class, 'addMember'])->name('admin.addMember')->middleware('check.admin');
// cập nhật role của thành viên
Route::post('/updateMemberRole', [ProjectController::class, 'updateMemberRole'])->name('admin.updateMemberRole')->middleware('check.admin');
// xóa thành viên khỏi dự án
Route::post('/removeMember', [ProjectController::class, 'removeMember'])->name('admin.removeMember')->middleware('check.admin');
// view quản lsý bài viết
Route::get('/post_management/{project_id}', [PostController::class, 'postManagement'])->name('admin.postManagement')->middleware('check.admin');
// tạo post mới
Route::post('/createPost', [PostController::class, 'createPost'])->name('admin.createPost')->middleware('check.admin');
// cập nhật post
Route::post('/updatePost', [PostController::class, 'updatePost'])->name('admin.updatePost')->middleware('check.admin');
// xóa post
Route::post('/deletePost', [PostController::class, 'deletePost'])->name('admin.deletePost')->middleware('check.admin');
// tạo comment
Route::post('/createComment', [PostController::class, 'createComment'])->name('admin.createComment')->middleware('check.admin');
// cập nhật nội dung comment
Route::post('/updateComment', [PostController::class, 'updateComment'])->name('admin.updateComment')->middleware('check.admin');
// cập nhật trạng thái comment
Route::post('/updateCommentStatus', [PostController::class, 'updateCommentStatus'])->name('admin.updateCommentStatus')->middleware('check.admin');
// xóa comment
Route::post('/deleteComment', [PostController::class, 'deleteComment'])->name('admin.deleteComment')->middleware('check.admin');
// view quản lý file nộp trong dự án
Route::get('/file_management/{assignment_id}', [ProjectController::class, 'fileManagement'])->name('admin.fileManagement')->middleware('check.admin');
// view quản lý bài tập trong dự án
Route::get('/assignment_management/{project_id}', [AssignmentController::class, 'assignmentManagement'])->name('admin.assignmentManagement')->middleware('check.admin');
// thêm bài tập mới
Route::post('/createAssignment', [AssignmentController::class, 'createAssignment'])->name('admin.createAssignment')->middleware('check.admin');
// cập nhật bài tập
Route::post('/updateAssignment', [AssignmentController::class, 'updateAssignment'])->name('admin.updateAssignment')->middleware('check.admin');
// xóa bài tập
Route::post('/deleteAssignment', [AssignmentController::class, 'deleteAssignment'])->name('admin.deleteAssignment')->middleware('check.admin');
// xem chi tiết bài tập và danh sách nộp bài
Route::get('/assignmentDetail/{assignment_id}', [AssignmentController::class, 'assignmentDetail'])->name('admin.assignmentDetail')->middleware('check.admin');








