<style>
    .user-management-container {
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

    /* Form thêm thành viên */
    .add-member-section {
        background: #fff;
        padding: 25px 30px;
        border-radius: 8px;
        box-shadow: 0 2px 4px rgba(0, 0, 0, 0.08);
        margin-bottom: 30px;
    }

    .add-member-section h2 {
        font-size: 18px;
        color: #222;
        margin-bottom: 20px;
        font-weight: 600;
        border-bottom: 2px solid #f0f0f0;
        padding-bottom: 10px;
    }

    .add-member-form {
        display: flex;
        gap: 15px;
        align-items: end;
        flex-wrap: wrap;
    }

    .form-group {
        flex: 1;
        min-width: 200px;
    }

    .form-group label {
        display: block;
        margin-bottom: 8px;
        color: #333;
        font-weight: 500;
        font-size: 14px;
    }

    .form-group select {
        width: 100%;
        padding: 10px 15px;
        border: 1px solid #ddd;
        border-radius: 6px;
        background-color: #fff;
        color: #333;
        font-size: 14px;
        cursor: pointer;
        transition: all 0.2s ease;
    }

    .form-group select:hover {
        border-color: #999;
    }

    .form-group select:focus {
        outline: none;
        border-color: #333;
        box-shadow: 0 0 0 3px rgba(0, 0, 0, 0.05);
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

    .btn-primary {
        background-color: #333;
        color: #fff;
    }

    .btn-primary:hover {
        background-color: #222;
        box-shadow: 0 4px 8px rgba(0, 0, 0, 0.15);
    }

    .btn-danger {
        background-color: #dc3545;
        color: #fff;
        padding: 6px 12px;
        font-size: 13px;
    }

    .btn-danger:hover {
        background-color: #c82333;
    }

    /* Bảng danh sách thành viên */
    .members-section {
        background: #fff;
        padding: 25px 30px;
        border-radius: 8px;
        box-shadow: 0 2px 4px rgba(0, 0, 0, 0.08);
    }

    .members-section h2 {
        font-size: 18px;
        color: #222;
        margin-bottom: 20px;
        font-weight: 600;
        border-bottom: 2px solid #f0f0f0;
        padding-bottom: 10px;
    }

    .members-table {
        width: 100%;
        border-collapse: collapse;
        background: #fff;
    }

    .members-table thead {
        background-color: #f8f8f8;
        border-bottom: 2px solid #e0e0e0;
    }

    .members-table thead th {
        padding: 14px 16px;
        text-align: left;
        font-weight: 600;
        font-size: 14px;
        color: #333;
        text-transform: uppercase;
        letter-spacing: 0.5px;
    }

    .members-table tbody tr {
        border-bottom: 1px solid #f0f0f0;
        transition: background-color 0.2s ease;
    }

    .members-table tbody tr:hover {
        background-color: #fafafa;
    }

    .members-table tbody td {
        padding: 16px;
        color: #555;
        font-size: 14px;
    }

    .role-badge {
        display: inline-block;
        padding: 5px 14px;
        border-radius: 20px;
        font-size: 12px;
        font-weight: 600;
        text-transform: uppercase;
        letter-spacing: 0.5px;
    }

    .role-badge.leader {
        background-color: #333;
        color: #fff;
    }

    .role-badge.member {
        background-color: #e0e0e0;
        color: #555;
    }

    .action-buttons {
        display: flex;
        gap: 8px;
    }

    /* Alert messages */
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
        padding: 50px 20px;
        color: #999;
    }

    .empty-state p {
        font-size: 16px;
        margin: 0;
    }

    /* Modal cho chỉnh sửa role */
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
        max-width: 450px;
        width: 90%;
        animation: slideIn 0.3s ease;
    }

    .modal-header {
        margin-bottom: 20px;
        padding-bottom: 15px;
        border-bottom: 2px solid #f0f0f0;
    }

    .modal-header h3 {
        margin: 0;
        font-size: 20px;
        color: #222;
        font-weight: 600;
    }

    .modal-body {
        margin-bottom: 25px;
    }

    .modal-footer {
        display: flex;
        gap: 10px;
        justify-content: flex-end;
    }

    .btn-secondary {
        background-color: #6c757d;
        color: #fff;
    }

    .btn-secondary:hover {
        background-color: #5a6268;
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

    /* Responsive */
    @media (max-width: 768px) {
        .add-member-form {
            flex-direction: column;
        }

        .form-group {
            width: 100%;
        }

        .members-table {
            font-size: 12px;
        }

        .members-table thead th,
        .members-table tbody td {
            padding: 10px;
        }
    }
</style>

<div class="user-management-container">
    <!-- Header -->
    <div class="page-header">
        <a href="{{ route('admin.projectDetail', ['id' => $project_id]) }}" class="btn-back">
            <svg width="16" height="16" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 19l-7-7m0 0l7-7m-7 7h18" />
            </svg>
            Quay Lại
        </a>
        <h1>Quản Lý Thành Viên Dự Án</h1>
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

    <!-- Form thêm thành viên -->
    <div class="add-member-section">
        <h2>Thêm Thành Viên Mới</h2>
        <form action="{{ route('admin.addMember') }}" method="POST" class="add-member-form">
            @csrf
            <input type="hidden" name="project_id" value="{{ $project_id }}">

            <div class="form-group">
                <label for="user_id">Chọn Thành Viên</label>
                <select name="user_id" id="user_id" required>
                    <option value="">-- Chọn người dùng --</option>
                    @foreach($availableUsers as $user)
                    <option value="{{ $user->id }}">{{ $user->name }} ({{ $user->email }})</option>
                    @endforeach
                </select>
            </div>

            <div class="form-group">
                <label for="role">Vai Trò</label>
                <select name="role" id="role" required>
                    <option value="">-- Chọn vai trò --</option>
                    <option value="leader">Leader</option>
                    <option value="member">Member</option>
                </select>
            </div>

            <button type="submit" class="btn btn-primary">Thêm Thành Viên</button>
        </form>
    </div>

    <!-- Danh sách thành viên -->
    <div class="members-section">
        <h2>Danh Sách Thành Viên ({{ $members->count() }})</h2>

        @if($members->count() > 0)
        <table class="members-table">
            <thead>
                <tr>
                    <th>STT</th>
                    <th>Tên</th>
                    <th>Email</th>
                    <th>Vai Trò</th>
                    <th>Thao Tác</th>
                </tr>
            </thead>
            <tbody>
                @foreach($members as $index => $member)
                <tr>
                    <td>{{ $index + 1 }}</td>
                    <td>{{ $member->name }}</td>
                    <td>{{ $member->email }}</td>
                    <td>
                        <span class="role-badge {{ $member->role }}">
                            {{ $member->role == 'leader' ? 'Leader' : 'Member' }}
                        </span>
                    </td>
                    <td>
                        <div class="action-buttons">
                            <button class="btn btn-primary"
                                onclick="openEditModal('{{ $member->project_user_role_id }}', '{{ $member->role }}', '{{ $member->name }}')">
                                Sửa Role
                            </button>
                            <form action="{{ route('admin.removeMember') }}" method="POST"
                                onsubmit="return confirm('Bạn có chắc muốn xóa {{ $member->name }} khỏi dự án?');"
                                style="display: inline;">
                                @csrf
                                <input type="hidden" name="project_id" value="{{ $project_id }}">
                                <input type="hidden" name="project_user_role_id"
                                    value="{{ $member->project_user_role_id }}">
                                <button type="submit" class="btn btn-danger">Xóa</button>
                            </form>
                        </div>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
        @else
        <div class="empty-state">
            <p>Chưa có thành viên nào trong dự án</p>
        </div>
        @endif
    </div>
</div>

<!-- Modal chỉnh sửa role -->
<div id="editRoleModal" class="modal">
    <div class="modal-content">
        <div class="modal-header">
            <h3>Chỉnh Sửa Vai Trò</h3>
        </div>
        <form action="{{ route('admin.updateMemberRole') }}" method="POST">
            @csrf
            <input type="hidden" name="project_id" value="{{ $project_id }}">
            <input type="hidden" name="project_user_role_id" id="edit_project_user_role_id">

            <div class="modal-body">
                <div class="form-group">
                    <label for="edit_role">Vai Trò Mới cho <strong id="member_name"></strong></label>
                    <select name="role" id="edit_role" required>
                        <option value="leader">Leader</option>
                        <option value="member">Member</option>
                    </select>
                </div>
            </div>

            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" onclick="closeEditModal()">Hủy</button>
                <button type="submit" class="btn btn-primary">Lưu Thay Đổi</button>
            </div>
        </form>
    </div>
</div>

<script>
    function openEditModal(projectUserRoleId, currentRole, memberName) {
        document.getElementById('edit_project_user_role_id').value = projectUserRoleId;
        document.getElementById('edit_role').value = currentRole;
        document.getElementById('member_name').textContent = memberName;
        document.getElementById('editRoleModal').classList.add('show');
    }

    function closeEditModal() {
        document.getElementById('editRoleModal').classList.remove('show');
    }

    // Đóng modal khi click bên ngoài
    window.onclick = function (event) {
        const modal = document.getElementById('editRoleModal');
        if (event.target == modal) {
            closeEditModal();
        }
    }
    // Tự động ẩn thông báo sau 3 giây
    document.addEventListener('DOMContentLoaded', function() {
        const alerts = document.querySelectorAll('.alert-success');
        alerts.forEach(function(alert) {
            setTimeout(function() {
                alert.classList.add('fade-out');
                setTimeout(function() {
                    alert.style.display = 'none';
                }, 500);
            }, 3000);
        });
    });</script>
