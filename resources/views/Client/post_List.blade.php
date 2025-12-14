<!DOCTYPE html>
<html lang="vi">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Danh sách bài viết - {{ $project->title }}</title>
    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        body {
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            background-color: #f9f9f9;
            color: #333;
        }

        .container {
            max-width: 1200px;
            margin: 0 auto;
            padding: 20px;
        }

        .page-header {
            background-color: #fff;
            padding: 20px;
            margin-bottom: 30px;
            border-radius: 8px;
            box-shadow: 0 2px 4px rgba(0,0,0,0.1);
            display: flex;
            justify-content: space-between;
            align-items: center;
            border-left: 4px solid #333;
        }

        .page-header h1 {
            color: #333;
            font-size: 24px;
        }

        .page-header p {
            color: #666;
            margin-top: 8px;
            font-size: 14px;
        }

        .btn-back {
            padding: 10px 20px;
            background-color: #333;
            color: #fff;
            text-decoration: none;
            border-radius: 4px;
            transition: all 0.3s;
            display: inline-flex;
            align-items: center;
            gap: 8px;
        }

        .btn-back:hover {
            background-color: #222;
            transform: translateX(-2px);
        }

        .posts-container {
            display: flex;
            flex-direction: column;
            gap: 30px;
        }

        .post-card {
            background-color: #fff;
            border-radius: 8px;
            box-shadow: 0 2px 8px rgba(0,0,0,0.1);
            overflow: hidden;
            border-left: 4px solid #333;
        }

        .post-header {
            padding: 20px;
            border-bottom: 1px solid #eee;
        }

        .post-title {
            font-size: 22px;
            color: #333;
            margin-bottom: 10px;
            font-weight: 600;
        }

        .post-content {
            padding: 20px;
            color: #555;
            line-height: 1.8;
        }

        .post-image {
            width: 100%;
            max-height: 400px;
            object-fit: cover;
            display: block;
        }

        .comments-section {
            padding: 20px;
            background-color: #f9f9f9;
            border-top: 1px solid #eee;
        }

        .comments-header {
            font-size: 18px;
            color: #333;
            margin-bottom: 20px;
            font-weight: 600;
        }

        .comment-item {
            background-color: #fff;
            padding: 15px;
            margin-bottom: 15px;
            border-radius: 6px;
            border-left: 3px solid #333;
            box-shadow: 0 1px 3px rgba(0,0,0,0.05);
        }

        .comment-header {
            display: flex;
            justify-content: space-between;
            align-items: center;
            margin-bottom: 10px;
        }

        .comment-author {
            font-weight: 600;
            color: #333;
            font-size: 14px;
        }

        .comment-date {
            font-size: 12px;
            color: #999;
        }

        .comment-content {
            color: #555;
            line-height: 1.6;
            font-size: 14px;
            margin-bottom: 10px;
        }

        .comment-actions {
            display: flex;
            gap: 10px;
            margin-top: 10px;
        }

        .btn-edit, .btn-delete {
            padding: 6px 12px;
            border: none;
            border-radius: 4px;
            cursor: pointer;
            font-size: 12px;
            transition: all 0.3s;
        }

        .btn-edit {
            background-color: #333;
            color: #fff;
        }

        .btn-edit:hover {
            background-color: #222;
        }

        .btn-delete {
            background-color: #dc3545;
            color: #fff;
        }

        .btn-delete:hover {
            background-color: #c82333;
        }

        .add-comment-section {
            margin-top: 20px;
            padding-top: 20px;
            border-top: 2px solid #ddd;
        }

        .add-comment-form {
            display: flex;
            flex-direction: column;
            gap: 15px;
        }

        .add-comment-form textarea {
            width: 100%;
            padding: 12px;
            border: 1px solid #ddd;
            border-radius: 4px;
            resize: vertical;
            min-height: 80px;
            font-family: inherit;
            font-size: 14px;
        }

        .add-comment-form textarea:focus {
            outline: none;
            border-color: #333;
        }

        .btn-submit {
            padding: 10px 20px;
            background-color: #333;
            color: #fff;
            border: none;
            border-radius: 4px;
            cursor: pointer;
            font-size: 14px;
            transition: all 0.3s;
            align-self: flex-start;
        }

        .btn-submit:hover {
            background-color: #222;
        }

        .no-comments {
            text-align: center;
            color: #999;
            padding: 30px;
            font-style: italic;
        }

        .no-posts {
            text-align: center;
            color: #999;
            padding: 50px;
            font-size: 16px;
            background-color: #fff;
            border-radius: 8px;
            box-shadow: 0 2px 4px rgba(0,0,0,0.1);
        }

        .alert {
            padding: 15px;
            margin-bottom: 20px;
            border-radius: 4px;
            font-size: 14px;
        }

        .alert-success {
            background-color: #d4edda;
            color: #155724;
            border: 1px solid #c3e6cb;
        }

        .alert-error {
            background-color: #f8d7da;
            color: #721c24;
            border: 1px solid #f5c6cb;
        }

        /* Modal styles */
        .modal {
            display: none;
            position: fixed;
            z-index: 1000;
            left: 0;
            top: 0;
            width: 100%;
            height: 100%;
            background-color: rgba(0,0,0,0.5);
        }

        .modal-content {
            background-color: #fff;
            margin: 100px auto;
            padding: 30px;
            border-radius: 8px;
            width: 90%;
            max-width: 600px;
            box-shadow: 0 4px 20px rgba(0,0,0,0.3);
        }

        .modal-header {
            font-size: 20px;
            color: #333;
            margin-bottom: 20px;
            font-weight: 600;
        }

        .modal-form {
            display: flex;
            flex-direction: column;
            gap: 15px;
        }

        .modal-form textarea {
            width: 100%;
            padding: 12px;
            border: 1px solid #ddd;
            border-radius: 4px;
            resize: vertical;
            min-height: 100px;
            font-family: inherit;
        }

        .modal-form textarea:focus {
            outline: none;
            border-color: #333;
        }

        .modal-actions {
            display: flex;
            gap: 10px;
            justify-content: flex-end;
        }

        .btn-cancel {
            padding: 10px 20px;
            background-color: #6c757d;
            color: #fff;
            border: none;
            border-radius: 4px;
            cursor: pointer;
            transition: all 0.3s;
        }

        .btn-cancel:hover {
            background-color: #5a6268;
        }

        .status-badge {
            display: inline-block;
            padding: 4px 8px;
            border-radius: 4px;
            font-size: 11px;
            font-weight: 600;
            text-transform: uppercase;
        }

        .status-completed {
            background-color: #d4edda;
            color: #155724;
        }

        .post-meta {
            display: flex;
            align-items: center;
            gap: 15px;
            font-size: 13px;
            color: #666;
        }
    </style>
</head>
<body>
    <div class="container">
        <div class="page-header">
            <div>
                <h1>{{ $project->title }}</h1>
                <p>Danh sách bài viết và thảo luận</p>
            </div>
            <a href="{{ route('client.projectDetail', ['id' => $project_id]) }}" class="btn-back">
                <span>←</span> Quay Lại
            </a>
        </div>

        @if(session('success'))
            <div class="alert alert-success">
                {{ session('success') }}
            </div>
        @endif

        @if(session('error'))
            <div class="alert alert-error">
                {{ session('error') }}
            </div>
        @endif

        <div class="posts-container">
            @if(count($posts) == 0)
                <div class="no-posts">
                    Chưa có bài viết nào trong dự án này.
                </div>
            @else
                @foreach($posts as $post)
                    <div class="post-card">
                        <div class="post-header">
                            <h2 class="post-title">{{ $post->title }}</h2>
                            <div class="post-meta">
                                <span>📅 {{ date('d/m/Y H:i', strtotime($post->created_at)) }}</span>
                            </div>
                        </div>

                        @if($post->image_path)
                            <img src="{{ asset('storage/' . $post->image_path) }}" alt="{{ $post->title }}" class="post-image">
                        @endif

                        <div class="post-content">
                            {{ $post->content }}
                        </div>

                        <div class="comments-section">
                            <div class="comments-header">
                                💬 Bình luận ({{ count($comments[$post->id]) }})
                            </div>

                            @if(count($comments[$post->id]) == 0)
                                <div class="no-comments">
                                    Chưa có bình luận nào được duyệt.
                                </div>
                            @else
                                @foreach($comments[$post->id] as $comment)
                                    <div class="comment-item">
                                        <div class="comment-header">
                                            <div>
                                                <span class="comment-author">{{ $comment->user_name }}</span>
                                                <span class="status-badge status-completed">✓ Đã duyệt</span>
                                            </div>
                                            <span class="comment-date">{{ date('d/m/Y H:i', strtotime($comment->created_at)) }}</span>
                                        </div>
                                        <div class="comment-content">
                                            {{ $comment->content }}
                                        </div>

                                        @php
                                            $canEdit = false;
                                            // Nếu là comment của mình
                                            if ($comment->user_id == auth()->id()) {
                                                $canEdit = true;
                                            }
                                            // Nếu là leader và comment đang ở trạng thái completed
                                            elseif ($userRole == 'leader' && $comment->status == 'completed') {
                                                $canEdit = true;
                                            }
                                        @endphp

                                        @if($canEdit)
                                            <div class="comment-actions">
                                                <button class="btn-edit" onclick="openEditModal('{{ $comment->id }}', '{{ addslashes($comment->content) }}')">✏️ Sửa</button>
                                                <button class="btn-delete" onclick="if(confirm('Bạn có chắc muốn xóa bình luận này?')) { document.getElementById('delete-form-{{ $comment->id }}').submit(); }">🗑️ Xóa</button>
                                            </div>

                                            <form id="delete-form-{{ $comment->id }}" action="{{ route('client.deleteComment') }}" method="POST" style="display: none;">
                                                @csrf
                                                <input type="hidden" name="comment_id" value="{{ $comment->id }}">
                                                <input type="hidden" name="project_id" value="{{ $project_id }}">
                                            </form>
                                        @endif
                                    </div>
                                @endforeach
                            @endif

                            <!-- Form thêm comment mới -->
                            <div class="add-comment-section">
                                <form action="{{ route('client.createComment') }}" method="POST" class="add-comment-form">
                                    @csrf
                                    <input type="hidden" name="post_id" value="{{ $post->id }}">
                                    <input type="hidden" name="project_id" value="{{ $project_id }}">
                                    <textarea name="content" placeholder="Viết bình luận của bạn... (Bình luận sẽ được duyệt trước khi hiển thị)" required></textarea>
                                    <button type="submit" class="btn-submit">💬 Gửi bình luận</button>
                                </form>
                            </div>
                        </div>
                    </div>
                @endforeach
            @endif
        </div>
    </div>

    <!-- Modal chỉnh sửa comment -->
    <div id="editModal" class="modal" onclick="if(event.target === this) closeEditModal()">
        <div class="modal-content">
            <div class="modal-header">✏️ Chỉnh sửa bình luận</div>
            <form id="editForm" action="{{ route('client.updateComment') }}" method="POST" class="modal-form">
                @csrf
                <input type="hidden" name="comment_id" id="edit_comment_id">
                <input type="hidden" name="project_id" value="{{ $project_id }}">
                <textarea name="content" id="edit_content" required></textarea>
                <div class="modal-actions">
                    <button type="button" class="btn-cancel" onclick="closeEditModal()">Hủy</button>
                    <button type="submit" class="btn-submit">💾 Lưu thay đổi</button>
                </div>
            </form>
        </div>
    </div>

    <script>
        function openEditModal(commentId, content) {
            document.getElementById('edit_comment_id').value = commentId;
            document.getElementById('edit_content').value = content;
            document.getElementById('editModal').style.display = 'block';
        }

        function closeEditModal() {
            document.getElementById('editModal').style.display = 'none';
        }
    </script>
</body>
</html>
