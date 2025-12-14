<style>
    .post-management-container {
        padding: 30px;
        background-color: #f9f9f9;
        min-height: calc(100vh - 60px);
    }

    .page-header {
        background: #fff;
        padding: 25px 30px;
        border-radius: 8px;
        box-shadow: 0 2px 4px rgba(0, 0, 0, 0.08);
        margin-bottom: 30px;
        border-left: 4px solid #333;
    }

    .page-header h1 {
        font-size: 24px;
        color: #222;
        margin: 0 0 10px 0;
        font-weight: 600;
    }

    /* Feed container */
    .feed-container {
        max-width: 800px;
        margin: 0 auto;
    }

    /* Create Post Form Modal */
    .create-post-modal {
        display: none;
        position: fixed;
        top: 0;
        left: 0;
        right: 0;
        bottom: 0;
        background: rgba(0, 0, 0, 0.5);
        z-index: 1000;
        align-items: center;
        justify-content: center;
        padding: 20px;
    }

    .create-post-modal.active {
        display: flex;
    }

    .create-post-section {
        background: #fff;
        border-radius: 8px;
        box-shadow: 0 10px 40px rgba(0, 0, 0, 0.2);
        padding: 30px;
        max-width: 600px;
        width: 100%;
        max-height: 90vh;
        overflow-y: auto;
        border-left: 4px solid #333;
        position: relative;
    }

    .create-post-section h3 {
        font-size: 18px;
        color: #222;
        margin: 0 0 20px 0;
        font-weight: 600;
    }

    /* Post Card */
    .post-card {
        background: #fff;
        border-radius: 8px;
        box-shadow: 0 2px 4px rgba(0, 0, 0, 0.08);
        margin-bottom: 25px;
        overflow: hidden;
    }

    .post-header {
        padding: 20px 25px;
        border-bottom: 1px solid #f0f0f0;
        display: flex;
        justify-content: space-between;
        align-items: start;
    }

    .post-title {
        font-size: 18px;
        font-weight: 600;
        color: #222;
        margin: 0 0 8px 0;
    }

    .post-time {
        font-size: 13px;
        color: #999;
    }

    .post-actions {
        display: flex;
        gap: 8px;
    }

    .btn-icon {
        background: none;
        border: none;
        padding: 6px;
        cursor: pointer;
        color: #666;
        transition: all 0.2s ease;
        border-radius: 4px;
        text-decoration: none;
        display: inline-flex;
        align-items: center;
    }

    .btn-icon:hover {
        background: #f0f0f0;
        color: #333;
    }

    .post-content {
        padding: 20px 25px;
        color: #333;
        font-size: 14px;
        line-height: 1.7;
        white-space: pre-wrap;
        word-wrap: break-word;
    }

    .post-image {
        width: 100%;
        max-height: 500px;
        object-fit: cover;
    }

    /* Comments Section */
    .comments-section {
        border-top: 1px solid #f0f0f0;
    }

    .comments-header {
        padding: 15px 25px;
        background: #fafafa;
        font-weight: 600;
        font-size: 14px;
        color: #333;
    }

    .comment-item {
        padding: 15px 25px;
        border-bottom: 1px solid #f0f0f0;
        transition: background 0.2s ease;
    }

    .comment-item:hover {
        background: #fafafa;
    }

    .comment-header {
        display: flex;
        justify-content: space-between;
        align-items: center;
        margin-bottom: 8px;
    }

    .comment-user {
        display: flex;
        align-items: center;
        gap: 10px;
    }

    .comment-user-name {
        font-weight: 600;
        font-size: 14px;
        color: #333;
    }

    .comment-status {
        display: inline-block;
        padding: 3px 10px;
        border-radius: 12px;
        font-size: 11px;
        font-weight: 600;
        text-transform: uppercase;
    }

    .comment-status.completed {
        background: #d4edda;
        color: #155724;
    }

    .comment-status.pending {
        background: #fff3cd;
        color: #856404;
    }

    .comment-status.cancelled {
        background: #f8d7da;
        color: #721c24;
    }

    .comment-time {
        font-size: 12px;
        color: #999;
    }

    .comment-content {
        color: #555;
        font-size: 14px;
        line-height: 1.5;
        margin: 8px 0;
        white-space: pre-wrap;
        word-wrap: break-word;
    }

    .comment-actions {
        display: flex;
        gap: 10px;
        margin-top: 10px;
    }

    .btn-comment-action {
        background: none;
        border: none;
        padding: 4px 10px;
        font-size: 12px;
        color: #666;
        cursor: pointer;
        border-radius: 4px;
        transition: all 0.2s ease;
        text-decoration: none;
    }

    .btn-comment-action:hover {
        background: #f0f0f0;
        color: #333;
    }

    /* Comment Form */
    .comment-form {
        padding: 20px 25px;
        background: #fafafa;
        border-top: 1px solid #f0f0f0;
    }

    .comment-form textarea {
        width: 100%;
        padding: 12px 15px;
        border: 1px solid #ddd;
        border-radius: 6px;
        background: #fff;
        color: #333;
        font-size: 14px;
        font-family: inherit;
        resize: vertical;
        min-height: 80px;
        margin-bottom: 10px;
    }

    .comment-form textarea:focus {
        outline: none;
        border-color: #333;
        box-shadow: 0 0 0 3px rgba(0, 0, 0, 0.05);
    }

    .btn-submit-comment {
        background: #333;
        color: #fff;
        padding: 8px 20px;
        border: none;
        border-radius: 6px;
        font-size: 13px;
        font-weight: 500;
        cursor: pointer;
        transition: all 0.2s ease;
    }

    .btn-submit-comment:hover {
        background: #222;
    }

    /* Form Groups */
    .form-group {
        margin-bottom: 20px;
    }

    .form-group label {
        display: block;
        margin-bottom: 8px;
        color: #333;
        font-weight: 500;
        font-size: 14px;
    }

    .form-group input,
    .form-group textarea,
    .form-group select {
        width: 100%;
        padding: 10px 15px;
        border: 1px solid #ddd;
        border-radius: 6px;
        background-color: #fff;
        color: #333;
        font-size: 14px;
        font-family: inherit;
        transition: all 0.2s ease;
    }

    .form-group textarea {
        resize: vertical;
        min-height: 120px;
    }

    .form-group input:focus,
    .form-group textarea:focus,
    .form-group select:focus {
        outline: none;
        border-color: #333;
        box-shadow: 0 0 0 3px rgba(0, 0, 0, 0.05);
    }

    .form-actions {
        display: flex;
        gap: 10px;
        justify-content: flex-end;
    }

    .btn {
        padding: 10px 24px;
        border: none;
        border-radius: 6px;
        font-size: 14px;
        font-weight: 500;
        cursor: pointer;
        transition: all 0.2s ease;
        text-decoration: none;
        display: inline-block;
    }

    .btn-secondary {
        background-color: #6c757d;
        color: #fff;
    }

    .btn-secondary:hover {
        background-color: #5a6268;
    }

    .btn-primary {
        background-color: #333;
        color: #fff;
    }

    .btn-primary:hover {
        background-color: #222;
    }

    .btn-danger {
        background-color: #dc3545;
        color: #fff;
    }

    .btn-danger:hover {
        background-color: #c82333;
    }

    /* Edit/Status inline forms */
    .inline-form {
        display: none;
        margin-top: 15px;
        padding: 15px;
        background: #f9f9f9;
        border-radius: 6px;
        border: 1px solid #e0e0e0;
    }

    .show-form:target {
        display: block;
    }

    /* Alert */
    .alert {
        padding: 14px 20px;
        border-radius: 6px;
        margin-bottom: 20px;
        font-size: 14px;
        display: flex;
        align-items: center;
        gap: 10px;
    }

    .alert-success {
        background-color: #d4edda;
        color: #155724;
        border-left: 4px solid #28a745;
    }

    .empty-state {
        text-align: center;
        padding: 60px 20px;
        background: #fff;
        border-radius: 8px;
        box-shadow: 0 2px 4px rgba(0, 0, 0, 0.08);
    }

    .empty-state p {
        font-size: 16px;
        color: #999;
        margin: 0;
    }

    .toggle-form {
        cursor: pointer;
    }

    .btn-create {
        background: #333;
        color: #fff;
        padding: 10px 24px;
        border: none;
        border-radius: 6px;
        font-size: 14px;
        font-weight: 500;
        cursor: pointer;
        transition: all 0.2s ease;
        display: inline-flex;
        align-items: center;
        gap: 8px;
    }

    .btn-create:hover {
        background: #222;
    }

    .btn-back {
        background: #f0f0f0;
        color: #333;
        padding: 8px 16px;
        border: none;
        border-radius: 6px;
        font-size: 14px;
        font-weight: 500;
        cursor: pointer;
        transition: all 0.2s ease;
        display: inline-flex;
        align-items: center;
        gap: 6px;
        text-decoration: none;
    }

    .btn-back:hover {
        background: #e0e0e0;
    }

    .modal-close-btn {
        position: absolute;
        top: 20px;
        right: 20px;
        background: none;
        border: none;
        font-size: 28px;
        color: #999;
        cursor: pointer;
        padding: 0;
        width: 32px;
        height: 32px;
        display: flex;
        align-items: center;
        justify-content: center;
        border-radius: 4px;
        transition: all 0.2s ease;
    }

    .modal-close-btn:hover {
        background: #f0f0f0;
        color: #333;
    }

    /* Responsive */
    @media (max-width: 768px) {
        .post-management-container {
            padding: 15px;
        }
    }
</style>

<div class="post-management-container">
    <!-- Header -->
    <div class="page-header">
        <a href="{{ route('admin.projectDetail', ['id' => $project_id]) }}" class="btn-back">
            <svg width="16" height="16" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 19l-7-7m0 0l7-7m-7 7h18" />
            </svg>
            Quay Lại
        </a>
        <div style="display: flex; justify-content: space-between; align-items: center; margin-top: 15px;">
            <div>
                <h1>Quản Lý Bài Viết</h1>
                <p style="color: #666; font-size: 14px; margin-top: 5px;">Dự án: <strong>{{ $project->title ?? 'N/A' }}</strong></p>
            </div>
            <button type="button" class="btn-create" onclick="toggleCreateForm()">
                <svg width="18" height="18" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4" />
                </svg>
                Tạo Bài Viết
            </button>
        </div>
    </div>

    <!-- Alert Success -->
    @if(session('success'))
    <div class="alert alert-success">
        <svg width="20" height="20" viewBox="0 0 20 20" fill="currentColor">
            <path fill-rule="evenodd"
                d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z"
                clip-rule="evenodd" />
        </svg>
        {{ session('success') }}
    </div>
    @endif

    <!-- Feed Container -->
    <div class="feed-container">
        <!-- Posts List -->
        @if($posts->count() > 0)
        @foreach($posts as $post)
        <div class="post-card">
            <!-- Post Header -->
            <div class="post-header">
                <div style="flex: 1;">
                    <h3 class="post-title">{{ $post->title }}</h3>
                    <p class="post-time">{{ date('d/m/Y H:i', strtotime($post->created_at)) }}</p>
                </div>
                <div class="post-actions">
                    <a href="#edit-post-{{ $post->id }}" class="btn-icon toggle-form" title="Chỉnh sửa">
                        <svg width="18" height="18" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z" />
                        </svg>
                    </a>
                    <form action="{{ route('admin.deletePost') }}" method="POST"
                        onsubmit="return confirm('Bạn có chắc muốn xóa bài viết này?');" style="display: inline;">
                        @csrf
                        <input type="hidden" name="project_id" value="{{ $project_id }}">
                        <input type="hidden" name="post_id" value="{{ $post->id }}">
                        <button type="submit" class="btn-icon" title="Xóa">
                            <svg width="18" height="18" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16" />
                            </svg>
                        </button>
                    </form>
                </div>
            </div>

            <!-- Edit Form (hidden by default) -->
            <div id="edit-post-{{ $post->id }}" class="inline-form show-form">
                <form action="{{ route('admin.updatePost') }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <input type="hidden" name="project_id" value="{{ $project_id }}">
                    <input type="hidden" name="post_id" value="{{ $post->id }}">

                    <div class="form-group">
                        <label>Tiêu đề <span style="color: #dc3545;">*</span></label>
                        <input type="text" name="title" value="{{ $post->title }}" required maxlength="50">
                    </div>

                    <div class="form-group">
                        <label>Nội dung <span style="color: #dc3545;">*</span></label>
                        <textarea name="content" required>{{ $post->content }}</textarea>
                    </div>

                    <div class="form-group">
                        <label>Hình ảnh mới (tùy chọn)</label>
                        <input type="file" name="image" accept="image/*">
                        @if($post->image_path)
                        <small style="color: #666; font-size: 12px; display: block; margin-top: 5px;">
                            Ảnh hiện tại: {{ basename($post->image_path) }}
                        </small>
                        @endif
                    </div>

                    <div class="form-actions">
                        <a href="#" class="btn btn-secondary">Hủy</a>
                        <button type="submit" class="btn btn-primary">Lưu Thay Đổi</button>
                    </div>
                </form>
            </div>

            <!-- Post Content -->
            <div class="post-content">{{ $post->content }}</div>

            <!-- Post Image -->
            @if($post->image_path)
            <img src="{{ asset('storage/' . $post->image_path) }}" alt="Post image" class="post-image">
            @endif

            <!-- Comments Section -->
            <div class="comments-section">
                <div class="comments-header">
                    💬 Comments ({{ isset($comments[$post->id]) ? $comments[$post->id]->count() : 0 }})
                </div>

                <!-- Comments List -->
                @if(isset($comments[$post->id]) && $comments[$post->id]->count() > 0)
                @foreach($comments[$post->id] as $comment)
                <div class="comment-item">
                    <div class="comment-header">
                        <div class="comment-user">
                            <span class="comment-user-name">{{ $comment->user_name }}</span>
                            <span class="comment-status {{ $comment->status }}">{{ $comment->status }}</span>
                        </div>
                        <span class="comment-time">{{ date('d/m/Y H:i', strtotime($comment->created_at)) }}</span>
                    </div>
                    <div class="comment-content">{{ $comment->content }}</div>
                    <div class="comment-actions">
                        <a href="#edit-comment-{{ $comment->id }}" class="btn-comment-action">
                            Sửa
                        </a>
                        <a href="#status-{{ $comment->id }}" class="btn-comment-action">
                            Đổi trạng thái
                        </a>
                        <form action="{{ route('admin.deleteComment') }}" method="POST"
                            onsubmit="return confirm('Bạn có chắc muốn xóa comment này?');" style="display: inline;">
                            @csrf
                            <input type="hidden" name="project_id" value="{{ $project_id }}">
                            <input type="hidden" name="comment_id" value="{{ $comment->id }}">
                            <button type="submit" class="btn-comment-action" style="color: #dc3545;">
                                Xóa
                            </button>
                        </form>
                    </div>

                    <!-- Edit Comment Form (hidden by default) -->
                    <div id="edit-comment-{{ $comment->id }}" class="inline-form show-form">
                        <form action="{{ route('admin.updateComment') }}" method="POST">
                            @csrf
                            <input type="hidden" name="project_id" value="{{ $project_id }}">
                            <input type="hidden" name="comment_id" value="{{ $comment->id }}">

                            <div class="form-group">
                                <label>Nội dung comment</label>
                                <textarea name="content" required>{{ $comment->content }}</textarea>
                            </div>

                            <div class="form-actions">
                                <a href="#" class="btn btn-secondary">Hủy</a>
                                <button type="submit" class="btn btn-primary">Lưu Thay Đổi</button>
                            </div>
                        </form>
                    </div>

                    <!-- Status Change Form (hidden by default) -->
                    <div id="status-{{ $comment->id }}" class="inline-form show-form">
                        <form action="{{ route('admin.updateCommentStatus') }}" method="POST">
                            @csrf
                            <input type="hidden" name="project_id" value="{{ $project_id }}">
                            <input type="hidden" name="comment_id" value="{{ $comment->id }}">

                            <div class="form-group">
                                <label>Trạng thái</label>
                                <select name="status" required>
                                    <option value="pending" {{ $comment->status == 'pending' ? 'selected' : '' }}>
                                        Pending
                                    </option>
                                    <option value="completed" {{ $comment->status == 'completed' ? 'selected' : '' }}>
                                        Completed
                                    </option>
                                    <option value="cancelled" {{ $comment->status == 'cancelled' ? 'selected' : '' }}>
                                        Cancelled
                                    </option>
                                </select>
                            </div>

                            <div class="form-actions">
                                <a href="#" class="btn btn-secondary">Hủy</a>
                                <button type="submit" class="btn btn-primary">Cập Nhật</button>
                            </div>
                        </form>
                    </div>
                </div>
                @endforeach
                @endif

                <!-- Comment Form -->
                <div class="comment-form">
                    <form action="{{ route('admin.createComment') }}" method="POST">
                        @csrf
                        <input type="hidden" name="project_id" value="{{ $project_id }}">
                        <input type="hidden" name="post_id" value="{{ $post->id }}">
                        <textarea name="content" placeholder="Viết comment của bạn..." required></textarea>
                        <button type="submit" class="btn-submit-comment">Gửi Comment</button>
                    </form>
                </div>
            </div>
        </div>
        @endforeach
        @else
        <div class="empty-state">
            <p>Chưa có bài viết nào. Hãy tạo bài viết đầu tiên ở form bên trên!</p>
        </div>
        @endif
    </div>
</div>

<!-- Create Post Modal -->
<div id="createPostModal" class="create-post-modal">
    <div class="create-post-section">
        <button type="button" class="modal-close-btn" onclick="closeCreateModal()">&times;</button>
        <h3>✍️ Tạo Bài Viết Mới</h3>
        <form action="{{ route('admin.createPost') }}" method="POST" enctype="multipart/form-data">
            @csrf
            <input type="hidden" name="project_id" value="{{ $project_id }}">

            <div class="form-group">
                <label for="title">Tiêu đề <span style="color: #dc3545;">*</span></label>
                <input type="text" id="title" name="title" placeholder="Nhập tiêu đề bài viết" required
                    maxlength="50">
            </div>

            <div class="form-group">
                <label for="content">Nội dung <span style="color: #dc3545;">*</span></label>
                <textarea id="content" name="content" placeholder="Nhập nội dung bài viết" required></textarea>
            </div>

            <div class="form-group">
                <label for="image">Hình ảnh (tùy chọn)</label>
                <input type="file" id="image" name="image" accept="image/*">
            </div>

            <div class="form-actions">
                <button type="button" class="btn btn-secondary" onclick="closeCreateModal()">Hủy</button>
                <button type="submit" class="btn btn-primary">Đăng Bài</button>
            </div>
        </form>
    </div>
</div>

<script>
    // Toggle create post modal
    function toggleCreateForm() {
        const modal = document.getElementById('createPostModal');
        modal.classList.add('active');
    }

    // Close create post modal
    function closeCreateModal() {
        const modal = document.getElementById('createPostModal');
        modal.classList.remove('active');
        // Reset form
        modal.querySelector('form').reset();
    }

    // Close modal when clicking outside
    document.getElementById('createPostModal').addEventListener('click', function(e) {
        if (e.target === this) {
            closeCreateModal();
        }
    });
</script>
