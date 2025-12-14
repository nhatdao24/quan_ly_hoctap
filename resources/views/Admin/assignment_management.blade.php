<style>
    .assignment-container {
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
        margin-bottom: 8px;
        font-weight: 600;
    }

    .page-header p {
        color: #666;
        font-size: 14px;
        margin: 0;
    }

    /* Nút thêm bài tập */
    .add-assignment-btn {
        background: #333;
        color: #fff;
        padding: 12px 24px;
        border: none;
        border-radius: 6px;
        font-size: 14px;
        font-weight: 500;
        cursor: pointer;
        transition: all 0.2s ease;
        margin-bottom: 25px;
        display: inline-flex;
        align-items: center;
        gap: 8px;
    }

    .add-assignment-btn:hover {
        background: #222;
        box-shadow: 0 4px 8px rgba(0, 0, 0, 0.15);
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
        margin-bottom: 8px;
    }

    .btn-back:hover {
        background: #e0e0e0;
    }

    /* Danh sách bài tập */
    .assignments-list {
        display: grid;
        gap: 20px;
    }

    .assignment-card {
        background: #fff;
        padding: 25px 30px;
        border-radius: 8px;
        box-shadow: 0 2px 4px rgba(0, 0, 0, 0.08);
        transition: all 0.2s ease;
        border-left: 4px solid #e0e0e0;
    }

    .assignment-card:hover {
        box-shadow: 0 4px 12px rgba(0, 0, 0, 0.12);
        border-left-color: #333;
    }

    .assignment-header {
        display: flex;
        justify-content: space-between;
        align-items: start;
        margin-bottom: 15px;
    }

    .assignment-title {
        font-size: 18px;
        font-weight: 600;
        color: #222;
        margin: 0 0 8px 0;
    }

    .assignment-description {
        color: #666;
        font-size: 14px;
        line-height: 1.6;
        margin-bottom: 15px;
    }

    .assignment-meta {
        display: flex;
        gap: 20px;
        align-items: center;
        flex-wrap: wrap;
        padding-top: 15px;
        border-top: 1px solid #f0f0f0;
    }

    .meta-item {
        display: flex;
        align-items: center;
        gap: 6px;
        font-size: 13px;
        color: #666;
    }

    .meta-item svg {
        width: 16px;
        height: 16px;
    }

    .btn-view-detail {
        background: #333;
        color: #fff;
        padding: 8px 18px;
        border: none;
        border-radius: 6px;
        font-size: 13px;
        font-weight: 500;
        cursor: pointer;
        transition: all 0.2s ease;
        text-decoration: none;
        display: inline-block;
    }

    .btn-view-detail:hover {
        background: #222;
        color: #fff;
    }

    .file-link {
        color: #333;
        text-decoration: none;
        font-weight: 500;
        display: inline-flex;
        align-items: center;
        gap: 5px;
    }

    .file-link:hover {
        text-decoration: underline;
    }

    /* Modal form thêm bài tập */
    .modal {
        display: none;
        position: fixed;
        z-index: 1000;
        left: 0;
        top: 0;
        width: 100%;
        height: 100%;
        background-color: rgba(0, 0, 0, 0.5);
        animation: fadeIn 0.2s ease;
    }

    .modal.show {
        display: flex;
        align-items: center;
        justify-content: center;
    }

    .modal-content {
        background-color: #fff;
        padding: 30px;
        border-radius: 8px;
        box-shadow: 0 4px 20px rgba(0, 0, 0, 0.2);
        max-width: 600px;
        width: 90%;
        max-height: 90vh;
        overflow-y: auto;
        animation: slideIn 0.3s ease;
    }

    .modal-header {
        margin-bottom: 25px;
        padding-bottom: 15px;
        border-bottom: 2px solid #f0f0f0;
    }

    .modal-header h3 {
        margin: 0;
        font-size: 20px;
        color: #222;
        font-weight: 600;
    }

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
        min-height: 100px;
    }

    .form-group input:focus,
    .form-group textarea:focus,
    .form-group select:focus {
        outline: none;
        border-color: #333;
        box-shadow: 0 0 0 3px rgba(0, 0, 0, 0.05);
    }

    .form-group input[type="file"] {
        padding: 8px;
        cursor: pointer;
    }

    .modal-footer {
        display: flex;
        gap: 10px;
        justify-content: flex-end;
        margin-top: 25px;
        padding-top: 20px;
        border-top: 1px solid #f0f0f0;
    }

    .btn {
        padding: 10px 24px;
        border: none;
        border-radius: 6px;
        font-size: 14px;
        font-weight: 500;
        cursor: pointer;
        transition: all 0.2s ease;
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
        box-shadow: 0 4px 8px rgba(0, 0, 0, 0.15);
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

    .empty-state svg {
        width: 64px;
        height: 64px;
        color: #ccc;
        margin-bottom: 15px;
    }

    .empty-state p {
        font-size: 16px;
        color: #999;
        margin: 0;
    }

    @keyframes fadeIn {
        from {
            opacity: 0;
        }

        to {
            opacity: 1;
        }
    }

    @keyframes slideIn {
        from {
            transform: translateY(-50px);
            opacity: 0;
        }

        to {
            transform: translateY(0);
            opacity: 1;
        }
    }

    /* Responsive */
    @media (max-width: 768px) {
        .assignment-container {
            padding: 15px;
        }

        .assignment-header {
            flex-direction: column;
            gap: 15px;
        }

        .assignment-meta {
            flex-direction: column;
            align-items: flex-start;
            gap: 10px;
        }
    }
</style>

<div class="assignment-container">
    <!-- Header -->
    <div class="page-header">
        <a href="{{ route('admin.projectDetail', ['id' => $project_id]) }}" class="btn-back">
            <svg width="16" height="16" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 19l-7-7m0 0l7-7m-7 7h18" />
            </svg>
            Quay Lại
        </a>
        <h1>Quản Lý Bài Tập</h1>
        <p>Dự án: <strong>{{ $project->title ?? 'N/A' }}</strong></p>
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

    <!-- Nút thêm bài tập -->
    <button class="add-assignment-btn" onclick="openAddModal()">
        <svg width="20" height="20" viewBox="0 0 20 20" fill="currentColor">
            <path fill-rule="evenodd"
                d="M10 3a1 1 0 011 1v5h5a1 1 0 110 2h-5v5a1 1 0 11-2 0v-5H4a1 1 0 110-2h5V4a1 1 0 011-1z"
                clip-rule="evenodd" />
        </svg>
        Thêm Bài Tập Mới
    </button>

    <!-- Danh sách bài tập -->
    @if($assignments->count() > 0)
    <div class="assignments-list">
        @foreach($assignments as $assignment)
        <div class="assignment-card">
            <div class="assignment-header">
                <div style="flex: 1;">
                    <h3 class="assignment-title">{{ $assignment->title }}</h3>
                    <p class="assignment-description">
                        {{ $assignment->description ?? 'Không có mô tả' }}
                    </p>
                </div>
                <div style="display: flex; gap: 10px;">
                    <button onclick="openEditModal('{{ $assignment->id }}', '{{ addslashes($assignment->title) }}', '{{ addslashes($assignment->description ?? '') }}', '{{ $assignment->end_date }}', '{{ $assignment->file_path ? basename($assignment->file_path) : '' }}')" class="btn-view-detail" style="background: #6c757d;">
                         Sửa
                    </button>
                    <form action="{{ route('admin.deleteAssignment') }}" method="POST" onsubmit="return confirm('Bạn có chắc muốn xóa bài tập này? Tất cả bài nộp cũng sẽ bị xóa!')" style="display: inline;">
                        @csrf
                        <input type="hidden" name="assignment_id" value="{{ $assignment->id }}">
                        <input type="hidden" name="project_id" value="{{ $project_id }}">
                        <button type="submit" class="btn-view-detail" style="background: #dc3545;">
                            Xóa
                        </button>
                    </form>
                    <a href="{{ route('admin.assignmentDetail', ['assignment_id' => $assignment->id]) }}"
                        class="btn-view-detail">
                        Xem Chi Tiết
                    </a>
                </div>
            </div>

            <div class="assignment-meta">
                <div class="meta-item">
                    <svg fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z" />
                    </svg>
                    <span>Hạn nộp: <strong>{{ date('d/m/Y H:i', strtotime($assignment->end_date)) }}</strong></span>
                </div>

                @if($assignment->file_path)
                <div class="meta-item">
                    <svg fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z" />
                    </svg>
                    <a href="{{ asset('storage'.$assignment->file_path) }}" target="_blank" class="file-link">
                        📄 Tải file đề bài
                    </a>
                </div>
                @endif

                <div class="meta-item">
                    <svg fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z" />
                    </svg>
                    <span>Tạo lúc: {{ date('d/m/Y', strtotime($assignment->created_at)) }}</span>
                </div>
            </div>
        </div>
        @endforeach
    </div>
    @else
    <div class="empty-state">
        <svg fill="none" stroke="currentColor" viewBox="0 0 24 24">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z" />
        </svg>
        <p>Chưa có bài tập nào trong dự án này</p>
    </div>
    @endif
</div>

<!-- Modal thêm bài tập -->
<div id="addAssignmentModal" class="modal">
    <div class="modal-content">
        <div class="modal-header">
            <h3>Thêm Bài Tập Mới</h3>
        </div>
        <form action="{{ route('admin.createAssignment') }}" method="POST" enctype="multipart/form-data">
            @csrf
            <input type="hidden" name="project_id" value="{{ $project_id }}">

            <div class="form-group">
                <label for="title">Tiêu Đề Bài Tập <span style="color: red;">*</span></label>
                <input type="text" id="title" name="title" placeholder="Nhập tiêu đề bài tập" required maxlength="50">
            </div>

            <div class="form-group">
                <label for="description">Mô Tả</label>
                <textarea id="description" name="description" placeholder="Nhập mô tả chi tiết về bài tập"></textarea>
            </div>

            <div class="form-group">
                <label for="end_date">Hạn Nộp <span style="color: red;">*</span></label>
                <input type="datetime-local" id="end_date" name="end_date" required>
            </div>

            <div class="form-group">
                <label for="file">File Đề Bài (.doc, .docx)</label>
                <input type="file" id="file" name="file" accept=".doc,.docx">
                <small style="color: #666; font-size: 12px; margin-top: 5px; display: block;">
                    Chỉ chấp nhận file .doc hoặc .docx (tối đa 10MB)
                </small>
            </div>

            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" onclick="closeAddModal()">Hủy</button>
                <button type="submit" class="btn btn-primary">Tạo Bài Tập</button>
            </div>
        </form>
    </div>
</div>

<!-- Modal cập nhật bài tập -->
<div id="editAssignmentModal" class="modal">
    <div class="modal-content">
        <div class="modal-header">
            <h3>Cập Nhật Bài Tập</h3>
        </div>
        <form action="{{ route('admin.updateAssignment') }}" method="POST" enctype="multipart/form-data">
            @csrf
            <input type="hidden" name="project_id" value="{{ $project_id }}">
            <input type="hidden" name="assignment_id" id="edit_assignment_id">

            <div class="form-group">
                <label for="edit_title">Tiêu Đề Bài Tập <span style="color: red;">*</span></label>
                <input type="text" id="edit_title" name="title" placeholder="Nhập tiêu đề bài tập" required maxlength="50">
            </div>

            <div class="form-group">
                <label for="edit_description">Mô Tả</label>
                <textarea id="edit_description" name="description" placeholder="Nhập mô tả chi tiết về bài tập"></textarea>
            </div>

            <div class="form-group">
                <label for="edit_end_date">Hạn Nộp <span style="color: red;">*</span></label>
                <input type="datetime-local" id="edit_end_date" name="end_date" required>
            </div>

            <div class="form-group">
                <label for="edit_file">File Đề Bài Mới (.doc, .docx)</label>
                <input type="file" id="edit_file" name="file" accept=".doc,.docx">
                <small id="current_file_info" style="color: #666; font-size: 12px; margin-top: 5px; display: block;"></small>
            </div>

            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" onclick="closeEditModal()">Hủy</button>
                <button type="submit" class="btn btn-primary">Cập Nhật</button>
            </div>
        </form>
    </div>
</div>

<script>
    function openAddModal() {
        document.getElementById('addAssignmentModal').classList.add('show');
    }

    function closeAddModal() {
        document.getElementById('addAssignmentModal').classList.remove('show');
        // Reset form
        document.querySelector('#addAssignmentModal form').reset();
    }

    // Đóng modal khi click bên ngoài
    window.onclick = function (event) {
        const modal = document.getElementById('addAssignmentModal');
        if (event.target == modal) {
            closeAddModal();
        }
    }

    // Set min date cho input datetime-local (không cho chọn ngày quá khứ)
    const endDateInput = document.getElementById('end_date');
    const now = new Date();
    now.setMinutes(now.getMinutes() - now.getTimezoneOffset());
    endDateInput.min = now.toISOString().slice(0, 16);
    
    function openEditModal(id, title, description, endDate, fileName) {
        document.getElementById('edit_assignment_id').value = id;
        document.getElementById('edit_title').value = title;
        document.getElementById('edit_description').value = description;
        
        // Chuyển đổi end_date sang định dạng datetime-local
        const date = new Date(endDate);
        date.setMinutes(date.getMinutes() - date.getTimezoneOffset());
        document.getElementById('edit_end_date').value = date.toISOString().slice(0, 16);
        
        // Hiển thị thông tin file hiện tại
        const fileInfo = document.getElementById('current_file_info');
        if (fileName) {
            fileInfo.textContent = 'File hiện tại: ' + fileName;
        } else {
            fileInfo.textContent = 'Chưa có file đính kèm';
        }
        
        document.getElementById('editAssignmentModal').classList.add('show');
    }
    
    function closeEditModal() {
        document.getElementById('editAssignmentModal').classList.remove('show');
        document.querySelector('#editAssignmentModal form').reset();
    }
</script>
