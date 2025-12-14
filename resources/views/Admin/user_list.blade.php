<style>
    .user-list-container {
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

    /* Table */
    .users-table-container {
        background: #fff;
        border-radius: 8px;
        box-shadow: 0 2px 4px rgba(0, 0, 0, 0.08);
        overflow: hidden;
    }

    .users-table {
        width: 100%;
        border-collapse: collapse;
    }

    .users-table thead {
        background: #333;
        color: #fff;
    }

    .users-table thead th {
        padding: 15px 20px;
        text-align: left;
        font-weight: 600;
        font-size: 14px;
    }

    .users-table tbody td {
        padding: 15px 20px;
        border-bottom: 1px solid #f0f0f0;
        font-size: 14px;
        color: #333;
    }

    .users-table tbody tr:hover {
        background: #f9f9f9;
    }

    .status-badge {
        display: inline-block;
        padding: 4px 12px;
        border-radius: 12px;
        font-size: 12px;
        font-weight: 600;
        text-transform: uppercase;
    }

    .status-active {
        background: #d4edda;
        color: #155724;
    }

    .status-locked {
        background: #f8d7da;
        color: #721c24;
    }

    .action-buttons {
        display: flex;
        gap: 8px;
    }

    .btn-action {
        padding: 6px 12px;
        border: none;
        border-radius: 4px;
        font-size: 12px;
        font-weight: 500;
        cursor: pointer;
        transition: all 0.2s ease;
        text-decoration: none;
        display: inline-flex;
        align-items: center;
        gap: 4px;
    }

    .btn-edit {
        background: #6c757d;
        color: #fff;
    }

    .btn-edit:hover {
        background: #5a6268;
    }

    .btn-lock {
        background: #ffc107;
        color: #000;
    }

    .btn-lock:hover {
        background: #e0a800;
    }

    .btn-unlock {
        background: #28a745;
        color: #fff;
    }

    .btn-unlock:hover {
        background: #218838;
    }

    .btn-delete {
        background: #dc3545;
        color: #fff;
    }

    .btn-delete:hover {
        background: #c82333;
    }

    /* Modal */
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
        max-width: 500px;
        width: 90%;
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

    .form-group input {
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

    .form-group input:focus {
        outline: none;
        border-color: #333;
        box-shadow: 0 0 0 3px rgba(0, 0, 0, 0.05);
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
        .user-list-container {
            padding: 15px;
        }

        .users-table {
            font-size: 12px;
        }

        .users-table thead th,
        .users-table tbody td {
            padding: 10px;
        }

        .action-buttons {
            flex-direction: column;
        }
    }
</style>

<div class="user-list-container">
    <!-- Header -->
    <div class="page-header">
        <h1>Quản Lý Tài Khoản Người Dùng</h1>
        <p>Danh sách tất cả tài khoản trong hệ thống</p>
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

    <!-- Users Table -->
    @if(count($users) > 0)
    <div class="users-table-container">
        <table class="users-table">
            <thead>
                <tr>
                    <th>STT</th>
                    <th>Tên</th>
                    <th>Email</th>
                    <th>Ngày Tạo</th>
                    <th>Trạng Thái</th>
                    <th>Thao Tác</th>
                </tr>
            </thead>
            <tbody>
                @foreach($users as $index => $user)
                <tr>
                    <td>{{ $index + 1 }}</td>
                    <td>{{ $user->name }}</td>
                    <td>{{ $user->email }}</td>
                    <td>{{ date('d/m/Y', strtotime($user->created_at)) }}</td>
                    <td>
                        @if($user->role === 'lock')
                        <span class="status-badge status-locked">🔒 Đã Khóa</span>
                        @else
                        <span class="status-badge status-active">✓ Hoạt Động</span>
                        @endif
                    </td>
                    <td>
                        <div class="action-buttons">
                            <button class="btn-action btn-edit" onclick="openEditModal('{{ $user->id }}', '{{ addslashes($user->name) }}', '{{ $user->email }}')">
                                ✏️ Sửa
                            </button>

                            <form action="{{ route('admin.toggleUserLock') }}" method="POST" style="display: inline;">
                                @csrf
                                <input type="hidden" name="user_id" value="{{ $user->id }}">
                                @if($user->role === 'lock')
                                <button type="submit" class="btn-action btn-unlock" onclick="return confirm('Bạn có chắc muốn mở khóa tài khoản này?')">
                                    🔓 Mở Khóa
                                </button>
                                @else
                                <button type="submit" class="btn-action btn-lock" onclick="return confirm('Bạn có chắc muốn khóa tài khoản này?')">
                                    🔒 Khóa
                                </button>
                                @endif
                            </form>

                            <form action="{{ route('admin.deleteUser') }}" method="POST" style="display: inline;">
                                @csrf
                                <input type="hidden" name="user_id" value="{{ $user->id }}">
                                <button type="submit" class="btn-action btn-delete" onclick="return confirm('Bạn có chắc muốn xóa tài khoản này? Tất cả dữ liệu liên quan sẽ bị xóa!')">
                                    🗑️ Xóa
                                </button>
                            </form>
                        </div>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
    @else
    <div class="empty-state">
        <p>Chưa có tài khoản người dùng nào trong hệ thống</p>
    </div>
    @endif
</div>

<!-- Modal Cập Nhật User -->
<div id="editUserModal" class="modal">
    <div class="modal-content">
        <div class="modal-header">
            <h3>Cập Nhật Thông Tin Người Dùng</h3>
        </div>
        <form action="{{ route('admin.updateUser') }}" method="POST">
            @csrf
            <input type="hidden" name="user_id" id="edit_user_id">

            <div class="form-group">
                <label for="edit_name">Tên <span style="color: red;">*</span></label>
                <input type="text" id="edit_name" name="name" placeholder="Nhập tên người dùng" required maxlength="255">
            </div>

            <div class="form-group">
                <label for="edit_email">Email</label>
                <input type="email" id="edit_email" name="email" readonly style="background-color: #f0f0f0; cursor: not-allowed;">
            </div>

            <div class="form-group">
                <label for="edit_password">Mật Khẩu Mới (để trống nếu không đổi)</label>
                <input type="password" id="edit_password" name="password" placeholder="Nhập mật khẩu mới (tối thiểu 8 ký tự)" minlength="8">
            </div>

            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" onclick="closeEditModal()">Hủy</button>
                <button type="submit" class="btn btn-primary">Cập Nhật</button>
            </div>
        </form>
    </div>
</div>

<script>
    function openEditModal(userId, userName, userEmail) {
        document.getElementById('edit_user_id').value = userId;
        document.getElementById('edit_name').value = userName;
        document.getElementById('edit_email').value = userEmail;
        document.getElementById('edit_password').value = '';
        document.getElementById('editUserModal').classList.add('show');
    }

    function closeEditModal() {
        document.getElementById('editUserModal').classList.remove('show');
        document.querySelector('#editUserModal form').reset();
    }

    // Đóng modal khi click bên ngoài
    window.onclick = function(event) {
        const modal = document.getElementById('editUserModal');
        if (event.target == modal) {
            closeEditModal();
        }
    }
</script>
