<style>
    .create-project-container {
        padding: 30px;
        background-color: #f9f9f9;
        min-height: calc(100vh - 60px);
        display: flex;
        justify-content: center;
        align-items: flex-start;
    }

    .form-wrapper {
        width: 100%;
        max-width: 700px;
        margin-top: 20px;
    }

    .back-link {
        display: inline-flex;
        align-items: center;
        gap: 6px;
        color: #333;
        text-decoration: none;
        font-size: 14px;
        margin-bottom: 20px;
        font-weight: 500;
        transition: all 0.2s ease;
    }

    .back-link:hover {
        color: #000;
        gap: 10px;
    }

    .form-card {
        background: #fff;
        padding: 35px 40px;
        border-radius: 8px;
        box-shadow: 0 2px 4px rgba(0, 0, 0, 0.08);
        border-left: 4px solid #333;
    }

    .form-header {
        margin-bottom: 30px;
        padding-bottom: 20px;
        border-bottom: 2px solid #f0f0f0;
    }

    .form-header h1 {
        font-size: 24px;
        color: #222;
        margin: 0 0 8px 0;
        font-weight: 600;
    }

    .form-header p {
        color: #666;
        font-size: 14px;
        margin: 0;
    }

    .form-group {
        margin-bottom: 25px;
    }

    .form-group label {
        display: block;
        margin-bottom: 8px;
        color: #333;
        font-weight: 500;
        font-size: 14px;
    }

    .form-group label .required {
        color: #dc3545;
        margin-left: 3px;
    }

    .form-group input,
    .form-group textarea {
        width: 100%;
        padding: 12px 15px;
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
        line-height: 1.6;
    }

    .form-group input:focus,
    .form-group textarea:focus {
        outline: none;
        border-color: #333;
        box-shadow: 0 0 0 3px rgba(0, 0, 0, 0.05);
    }

    .form-group input::placeholder,
    .form-group textarea::placeholder {
        color: #999;
    }

    .char-count {
        font-size: 12px;
        color: #999;
        text-align: right;
        margin-top: 5px;
    }

    .form-footer {
        display: flex;
        gap: 12px;
        justify-content: flex-end;
        margin-top: 30px;
        padding-top: 25px;
        border-top: 1px solid #f0f0f0;
    }

    .btn {
        padding: 12px 28px;
        border: none;
        border-radius: 6px;
        font-size: 14px;
        font-weight: 500;
        cursor: pointer;
        transition: all 0.2s ease;
        text-decoration: none;
        display: inline-block;
    }

    .btn-cancel {
        background-color: #f0f0f0;
        color: #333;
    }

    .btn-cancel:hover {
        background-color: #e0e0e0;
        color: #222;
    }

    .btn-submit {
        background-color: #333;
        color: #fff;
    }

    .btn-submit:hover {
        background-color: #222;
        box-shadow: 0 4px 8px rgba(0, 0, 0, 0.15);
    }

    .btn-submit:disabled {
        background-color: #999;
        cursor: not-allowed;
        opacity: 0.6;
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

    .alert-error {
        background-color: #f8d7da;
        color: #721c24;
        border-left: 4px solid #dc3545;
    }

    .error-list {
        margin: 5px 0 0 0;
        padding-left: 20px;
    }

    .error-list li {
        margin: 3px 0;
    }

    /* Responsive */
    @media (max-width: 768px) {
        .create-project-container {
            padding: 15px;
        }

        .form-card {
            padding: 25px 20px;
        }

        .form-footer {
            flex-direction: column;
        }

        .btn {
            width: 100%;
            text-align: center;
        }
    }
</style>

<div class="create-project-container">
    <div class="form-wrapper">
        <!-- Back link -->
        <a href="{{ route('admin.dashboard') }}" class="back-link">
            <svg width="20" height="20" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 19l-7-7m0 0l7-7m-7 7h18" />
            </svg>
            Quay lại danh sách dự án
        </a>

        <!-- Form Card -->
        <div class="form-card">
            <div class="form-header">
                <h1>Thêm Dự Án Mới</h1>
                <p>Điền thông tin để tạo dự án mới cho hệ thống</p>
            </div>

            <!-- Validation Errors -->
            @if ($errors->any())
            <div class="alert alert-error">
                <svg width="20" height="20" viewBox="0 0 20 20" fill="currentColor">
                    <path fill-rule="evenodd"
                        d="M10 18a8 8 0 100-16 8 8 0 000 16zM8.707 7.293a1 1 0 00-1.414 1.414L8.586 10l-1.293 1.293a1 1 0 101.414 1.414L10 11.414l1.293 1.293a1 1 0 001.414-1.414L11.414 10l1.293-1.293a1 1 0 00-1.414-1.414L10 8.586 8.707 7.293z"
                        clip-rule="evenodd" />
                </svg>
                <div>
                    <strong>Có lỗi xảy ra:</strong>
                    <ul class="error-list">
                        @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            </div>
            @endif

            <!-- Form -->
            <form action="{{ route('admin.addProject') }}" method="POST" id="createProjectForm">
                @csrf

                <div class="form-group">
                    <label for="title">
                        Tên Dự Án
                        <span class="required">*</span>
                    </label>
                    <input type="text" id="title" name="title" placeholder="Nhập tên dự án" required maxlength="255"
                        value="{{ old('title') }}">
                    <div class="char-count">
                        <span id="titleCount">0</span>/255 ký tự
                    </div>
                </div>

                <div class="form-group">
                    <label for="description">Mô Tả</label>
                    <textarea id="description" name="description"
                        placeholder="Nhập mô tả chi tiết về dự án (tùy chọn)">{{ old('description') }}</textarea>
                </div>

                <div class="form-footer">
                    <a href="{{ route('admin.dashboard') }}" class="btn btn-cancel">Hủy</a>
                    <button type="submit" class="btn btn-submit" id="submitBtn">
                        Tạo Dự Án
                    </button>
                </div>
            </form>
        </div>
    </div>
</div>

<script>
    // Character counter
    const titleInput = document.getElementById('title');
    const titleCount = document.getElementById('titleCount');

    function updateCharCount() {
        const count = titleInput.value.length;
        titleCount.textContent = count;

        // Change color if approaching limit
        if (count > 240) {
            titleCount.style.color = '#dc3545';
        } else if (count > 200) {
            titleCount.style.color = '#ffc107';
        } else {
            titleCount.style.color = '#999';
        }
    }

    titleInput.addEventListener('input', updateCharCount);

    // Initialize count if there's old value
    if (titleInput.value) {
        updateCharCount();
    }

    // Form submission handling
    const form = document.getElementById('createProjectForm');
    const submitBtn = document.getElementById('submitBtn');

    form.addEventListener('submit', function () {
        submitBtn.disabled = true;
        submitBtn.textContent = 'Đang tạo...';
    });
</script>