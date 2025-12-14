<style>
    .assignment-submit-container {
        padding: 30px;
        background-color: #f9f9f9;
        min-height: calc(100vh - 60px);
        max-width: 900px;
        margin: 0 auto;
    }

    .page-header {
        background: #fff;
        padding: 30px;
        border-radius: 8px;
        box-shadow: 0 2px 4px rgba(0, 0, 0, 0.08);
        margin-bottom: 30px;
        border-left: 4px solid #333;
    }

    .page-header h1 {
        font-size: 24px;
        color: #222;
        margin: 0 0 15px 0;
        font-weight: 600;
    }

    .assignment-info {
        display: grid;
        gap: 12px;
        margin-top: 20px;
        padding-top: 20px;
        border-top: 1px solid #f0f0f0;
    }

    .info-row {
        display: flex;
        align-items: center;
        gap: 10px;
        color: #666;
        font-size: 14px;
    }

    .info-label {
        font-weight: 600;
        color: #333;
        min-width: 120px;
    }

    .info-value {
        color: #666;
    }

    /* Alert */
    .alert {
        padding: 16px 20px;
        border-radius: 6px;
        margin-bottom: 20px;
        font-size: 14px;
        display: flex;
        align-items: center;
        gap: 12px;
        line-height: 1.6;
    }

    .alert-success {
        background-color: #d4edda;
        color: #155724;
        border-left: 4px solid #28a745;
    }

    .alert-warning {
        background-color: #fff3cd;
        color: #856404;
        border-left: 4px solid #ffc107;
    }

    .alert-info {
        background-color: #d1ecf1;
        color: #0c5460;
        border-left: 4px solid #17a2b8;
    }

    /* Form Section */
    .form-section {
        background: #fff;
        padding: 30px;
        border-radius: 8px;
        box-shadow: 0 2px 4px rgba(0, 0, 0, 0.08);
        border-left: 4px solid #333;
    }

    .form-section h2 {
        font-size: 18px;
        color: #222;
        margin: 0 0 20px 0;
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

    .form-group input[type="file"] {
        width: 100%;
        padding: 12px 15px;
        border: 2px dashed #ddd;
        border-radius: 6px;
        background-color: #fafafa;
        color: #333;
        font-size: 14px;
        font-family: inherit;
        transition: all 0.2s ease;
        cursor: pointer;
    }

    .form-group input[type="file"]:hover {
        border-color: #333;
        background-color: #f5f5f5;
    }

    .form-group input[type="file"]:focus {
        outline: none;
        border-color: #333;
        box-shadow: 0 0 0 3px rgba(0, 0, 0, 0.05);
    }

    .file-info {
        margin-top: 10px;
        padding: 12px 15px;
        background: #f9f9f9;
        border-radius: 6px;
        border: 1px solid #e0e0e0;
        font-size: 13px;
        color: #666;
        display: flex;
        align-items: center;
        gap: 10px;
    }

    .file-icon {
        color: #333;
    }

    /* Buttons */
    .btn {
        padding: 12px 28px;
        border: none;
        border-radius: 6px;
        font-size: 14px;
        font-weight: 500;
        cursor: pointer;
        transition: all 0.2s ease;
        text-decoration: none;
        display: inline-flex;
        align-items: center;
        gap: 8px;
    }

    .btn-primary {
        background-color: #333;
        color: #fff;
    }

    .btn-primary:hover {
        background-color: #222;
        box-shadow: 0 4px 8px rgba(0, 0, 0, 0.15);
    }

    .btn-secondary {
        background-color: #6c757d;
        color: #fff;
    }

    .btn-secondary:hover {
        background-color: #5a6268;
    }

    .btn-danger {
        background-color: #dc3545;
        color: #fff;
    }

    .btn-danger:hover {
        background-color: #c82333;
    }

    .btn-group {
        display: flex;
        gap: 10px;
        margin-top: 20px;
    }

    /* Submission Status */
    .submission-status {
        background: #f9f9f9;
        padding: 20px;
        border-radius: 6px;
        border: 1px solid #e0e0e0;
        margin-bottom: 20px;
    }

    .status-badge {
        display: inline-block;
        padding: 6px 12px;
        border-radius: 4px;
        font-size: 12px;
        font-weight: 600;
        text-transform: uppercase;
        letter-spacing: 0.5px;
    }

    .status-submitted {
        background: #d4edda;
        color: #155724;
    }

    .status-pending {
        background: #fff3cd;
        color: #856404;
    }

    .btn-update {
        background: #333;
        color: #fff;
        padding: 8px 16px;
        border: none;
        border-radius: 6px;
        font-size: 13px;
        font-weight: 500;
        cursor: pointer;
        transition: all 0.2s ease;
    }

    .btn-update:hover {
        background: #222;
    }

    /* Modal */
    .modal-overlay {
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

    .modal-overlay.active {
        display: flex;
    }

    .modal-content {
        background: #fff;
        border-radius: 8px;
        padding: 30px;
        max-width: 600px;
        width: 100%;
        max-height: 90vh;
        overflow-y: auto;
        box-shadow: 0 10px 40px rgba(0, 0, 0, 0.2);
        position: relative;
    }

    .modal-header {
        display: flex;
        justify-content: space-between;
        align-items: center;
        margin-bottom: 20px;
        padding-bottom: 15px;
        border-bottom: 2px solid #f0f0f0;
    }

    .modal-header h3 {
        font-size: 20px;
        color: #222;
        margin: 0;
        font-weight: 600;
    }

    .modal-close {
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

    .modal-close:hover {
        background: #f0f0f0;
        color: #333;
    }

    /* Responsive */
    @media (max-width: 768px) {
        .assignment-submit-container {
            padding: 15px;
        }

        .btn-group {
            flex-direction: column;
        }

        .btn {
            width: 100%;
            justify-content: center;
        }
    }
</style>

<div class="assignment-submit-container">
    <!-- Alert Messages -->
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

    @if(session('error'))
    <div class="alert alert-warning">
        <svg width="20" height="20" fill="none" stroke="currentColor" viewBox="0 0 24 24">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                d="M12 8v4m0 4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z" />
        </svg>
        {{ session('error') }}
    </div>
    @endif

    <!-- Check deadline -->
    @if(strtotime(now()) > strtotime($assignment->end_date))
    <div class="alert alert-warning">
        <svg width="20" height="20" fill="none" stroke="currentColor" viewBox="0 0 24 24">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                d="M12 8v4m0 4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z" />
        </svg>
        <strong>Cảnh báo:</strong> Thời gian nộp bài đã hết. Bạn không thể nộp bài tập này nữa.
    </div>
    @else
    <!-- Check if already submitted -->
    @if(isset($submission))
    <!-- Already Submitted -->
    <div class="form-section">
        <div class="submission-status">
            <div style="display: flex; justify-content: space-between; align-items: center; margin-bottom: 12px;">
                <h3 style="margin: 0; font-size: 16px; color: #222;">Trạng thái nộp bài</h3>
                <span class="status-badge status-submitted">Đã nộp</span>
            </div>
            <div style="display: grid; gap: 8px; font-size: 14px;">
                <div style="color: #666;">
                    <strong>Thời gian nộp:</strong> {{ date('d/m/Y H:i', strtotime($submission->submitted_at)) }}
                </div>
            </div>
        </div>

        <div class="btn-group">
            <button type="button" class="btn btn-primary" onclick="openUpdateModal()">
                <svg width="18" height="18" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                        d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z" />
                </svg>
                Cập Nhật Bài Nộp
            </button>
            <a href="{{ route('client.assignmentList', ['project_id' => $assignment->project_id]) }}"
                class="btn btn-secondary">
                Quay Lại
            </a>
        </div>
    </div>
    @else
    <!-- Submit New Assignment -->
    <div class="form-section">
        <h2> Nộp bài tập</h2>
        <form action="{{ route('client.submitAssignment', ['assignment_id' => $assignment->id]) }}" method="POST"
            enctype="multipart/form-data">
            @csrf
            <div class="form-group">
                <label for="file_baitap">
                    Chọn file bài tập <span style="color: #dc3545;">*</span>
                </label>
                <input type="file" id="file_baitap" name="file_baitap" accept=".pdf,.doc,.docx,.zip,.rar" required>
                <small style="color: #999; font-size: 12px; margin-top: 5px; display: block;">
                    Hỗ trợ: PDF, DOC, DOCX, ZIP, RAR (Tối đa 10MB)
                </small>
            </div>

            <div class="btn-group">
                <button type="submit" class="btn btn-primary">
                    <svg width="18" height="18" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M4 16v1a3 3 0 003 3h10a3 3 0 003-3v-1m-4-8l-4-4m0 0L8 8m4-4v12" />
                    </svg>
                    Nộp Bài Tập
                </button>
                <a href="{{ route('client.assignmentList', ['project_id' => $assignment->project_id]) }}"
                    class="btn btn-secondary">
                    Quay Lại
                </a>
            </div>
        </form>
    </div>
    @endif
    @endif
</div>

<!-- Update Modal -->
@if(isset($submission))
<div id="updateModal" class="modal-overlay">
    <div class="modal-content">
        <div class="modal-header">
            <h3>Cập Nhật Bài Nộp</h3>
            <button type="button" class="modal-close" onclick="closeUpdateModal()">&times;</button>
        </div>
        <form action="{{ route('client.updateSubmission', ['assignment_id' => $assignment->id]) }}" method="POST"
            enctype="multipart/form-data">
            @csrf
            <div class="form-group">
                <label for="file_baitap_update">
                    Chọn file mới <span style="color: #dc3545;">*</span>
                </label>
                <input type="file" id="file_baitap_update" name="file_baitap" accept=".pdf,.doc,.docx,.zip,.rar,.php" required>
                <small style="color: #999; font-size: 12px; margin-top: 5px; display: block;">
                    Hỗ trợ: PDF, DOC, DOCX, ZIP, RAR (Tối đa 10MB)
                </small>
            </div>

            <div class="btn-group">
                <button type="submit" class="btn btn-primary">
                    <svg width="18" height="18" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M4 16v1a3 3 0 003 3h10a3 3 0 003-3v-1m-4-8l-4-4m0 0L8 8m4-4v12" />
                    </svg>
                    Cập Nhật
                </button>
                <button type="button" class="btn btn-secondary" onclick="closeUpdateModal()">
                    Hủy
                </button>
            </div>
        </form>
    </div>
</div>

<script>
    // Open update modal
    function openUpdateModal() {
        document.getElementById('updateModal').classList.add('active');
    }

    // Close update modal
    function closeUpdateModal() {
        document.getElementById('updateModal').classList.remove('active');
    }

    // Close modal when clicking outside
    document.getElementById('updateModal').addEventListener('click', function(e) {
        if (e.target === this) {
            closeUpdateModal();
        }
    });
</script>
@endif
