<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Auth;
use App\Http\Controllers\Client\AssignmentController;
use App\Http\Controllers\Client\ClientController;
use App\Http\Controllers\Client\PostController;

Route::get('/ClientDashboard', [ClientController::class, 'clientDashboard'])->name('client.dashboard')->middleware('check.client');
// view dự án chi tiết
Route::get('/clientProjectDetail/{id}', [ClientController::class, 'projectDetail'])->name('client.projectDetail')->middleware('check.client');
// view danh sách bài tập trong dự án
Route::get('/clientAssignmentList/{project_id}', [AssignmentController::class, 'assignmentList'])->name('client.assignmentList')->middleware('check.client');
// view danh sách bài posts trong dự án
Route::get('/clientPostList/{project_id}', [PostController::class, 'postList'])->name('client.postList')->middleware('check.client');
// cập nhật thông tin người dùng
Route::post('/clientUpdateProfile', [ClientController::class, 'updateProfile'])->name('client.updateProfile')->middleware('check.client');
// view chi tiết bài tập và nộp bài
Route::get('/clientAssignmentDetail/{assignment_id}', [AssignmentController::class, 'assignmentSubmit'])->name('client.assignmentSubmit')->middleware(['check.client']);
// nộp bài tập
Route::post('/clientSubmitAssignment/{assignment_id}', [AssignmentController::class, 'submitAssignment'])->name('client.submitAssignment')->middleware('check.client');
// cap nhật bài tập đã nộp
Route::post('/clientUpdateSubmission/{assignment_id}', [AssignmentController::class, 'updateSubmission'])->name('client.updateSubmission')->middleware('check.client');

// Post & Comment routes
// tạo comment mới
Route::post('/clientCreateComment', [PostController::class, 'createComment'])->name('client.createComment')->middleware(['check.client']);
// cập nhật comment
Route::post('/clientUpdateComment', [PostController::class, 'updateComment'])->name('client.updateComment')->middleware(['check.client']);
// xóa comment
Route::post('/clientDeleteComment', [PostController::class, 'deleteComment'])->name('client.deleteComment')->middleware(['check.client']);