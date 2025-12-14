<style>
    .assignment-detail-container {
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
        margin-bottom: 12px;
        font-weight: 600;
    }

    .page-header p {
        color: #666;
        font-size: 14px;
        margin: 5px 0;
        line-height: 1.6;
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

    /* Thông tin bài tập */
    .assignment-info {
        background: #fff;
        padding: 25px 30px;
        border-radius: 8px;
        box-shadow: 0 2px 4px rgba(0, 0, 0, 0.08);
        margin-bottom: 30px;
    }

    .assignment-info h2 {
        font-size: 18px;
        color: #222;
        margin-bottom: 20px;
        font-weight: 600;
        border-bottom: 2px solid #f0f0f0;
        padding-bottom: 10px;
    }

    .info-grid {
        display: grid;
        gap: 15px;
    }

    .info-item {
        display: flex;
        gap: 12px;
    }

    .info-label {
        font-weight: 600;
        color: #333;
        min-width: 120px;
    }

    .info-value {
        color: #666;
        flex: 1;
    }

    .file-download {
        color: #333;
        text-decoration: none;
        font-weight: 500;
        display: inline-flex;
        align-items: center;
        gap: 6px;
        padding: 6px 12px;
        background: #f0f0f0;
        border-radius: 6px;
        transition: all 0.2s ease;
    }

    .file-download:hover {
        background: #e0e0e0;
        color: #000;
    }

    /* Bảng trạng thái nộp bài */
    .submission-section {
        background: #fff;
        padding: 25px 30px;
        border-radius: 8px;
        box-shadow: 0 2px 4px rgba(0, 0, 0, 0.08);
    }

    .submission-section h2 {
        font-size: 18px;
        color: #222;
        margin-bottom: 20px;
        font-weight: 600;
        border-bottom: 2px solid #f0f0f0;
        padding-bottom: 10px;
        display: flex;
        align-items: center;
        justify-content: space-between;
    }

    .stats {
        display: flex;
        gap: 20px;
        font-size: 14px;
    }

    .stat-item {
        display: flex;
        align-items: center;
        gap: 6px;
    }

    .stat-submitted {
        color: #28a745;
        font-weight: 600;
    }

    .stat-missing {
        color: #dc3545;
        font-weight: 600;
    }

    .submission-table {
        width: 100%;
        border-collapse: collapse;
        background: #fff;
    }

    .submission-table thead {
        background-color: #f8f8f8;
        border-bottom: 2px solid #e0e0e0;
    }

    .submission-table thead th {
        padding: 14px 16px;
        text-align: left;
        font-weight: 600;
        font-size: 14px;
        color: #333;
        text-transform: uppercase;
        letter-spacing: 0.5px;
    }

    .submission-table tbody tr {
        border-bottom: 1px solid #f0f0f0;
        transition: background-color 0.2s ease;
    }

    .submission-table tbody tr:hover {
        background-color: #fafafa;
    }

    .submission-table tbody td {
        padding: 16px;
        color: #555;
        font-size: 14px;
    }

    .status-badge {
        display: inline-block;
        padding: 6px 14px;
        border-radius: 20px;
        font-size: 12px;
        font-weight: 600;
        text-transform: uppercase;
        letter-spacing: 0.5px;
    }

    .status-badge.submitted {
        background-color: #d4edda;
        color: #155724;
    }

    .status-badge.missing {
        background-color: #f8d7da;
        color: #721c24;
    }

    .file-link {
        color: #333;
        text-decoration: none;
        font-weight: 500;
        display: inline-flex;
        align-items: center;
        gap: 5px;
        transition: all 0.2s ease;
    }

    .file-link:hover {
        color: #000;
        text-decoration: underline;
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

    /* Responsive */
    @media (max-width: 768px) {
        .assignment-detail-container {
            padding: 15px;
        }

        .submission-table {
            font-size: 12px;
        }

        .submission-table thead th,
        .submission-table tbody td {
            padding: 10px;
        }

        .stats {
            flex-direction: column;
            gap: 10px;
        }
    }
</style>

<div class="assignment-detail-container">
    <!-- Back link -->
    <a href="{{ route('admin.assignmentManagement', ['project_id' => $project_id]) }}" class="back-link">
        <svg width="20" height="20" fill="none" stroke="currentColor" viewBox="0 0 24 24">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 19l-7-7m0 0l7-7m-7 7h18" />
        </svg>
        Quay lại danh sách bài tập
    </a>

    <!-- Header -->
    <div class="page-header">
        <h1>{{ $assignment->title }}</h1>
        <p><strong>Mô tả:</strong> {{ $assignment->description ?? 'Không có mô tả' }}</p>
        <p><strong>Hạn nộp:</strong> {{ date('d/m/Y H:i', strtotime($assignment->end_date)) }}</p>
        @if($assignment->file_path)
        <p>
            <strong>File đề bài:</strong>
            <a href="{{ asset('storage/'.$assignment->file_path) }}" target="_blank" class="file-download">
                📄 Tải xuống file
            </a>
        </p>
        @endif
    </div>

    <!-- Alert Error -->
    @if(session('error'))
    <div class="alert alert-error">
        <svg width="20" height="20" viewBox="0 0 20 20" fill="currentColor">
            <path fill-rule="evenodd"
                d="M10 18a8 8 0 100-16 8 8 0 000 16zM8.707 7.293a1 1 0 00-1.414 1.414L8.586 10l-1.293 1.293a1 1 0 101.414 1.414L10 11.414l1.293 1.293a1 1 0 001.414-1.414L11.414 10l1.293-1.293a1 1 0 00-1.414-1.414L10 8.586 8.707 7.293z"
                clip-rule="evenodd" />
        </svg>
        {{ session('error') }}
    </div>
    @endif

    <!-- Bảng trạng thái nộp bài -->
    <div class="submission-section">
        <h2>
            <span>Trạng Thái Nộp Bài</span>
            <div class="stats">
                @php
                $submittedCount = collect($submissionStatus)->where('status', 'submitted')->count();
                $missingCount = collect($submissionStatus)->where('status', 'missing')->count();
                $totalCount = count($submissionStatus);
                @endphp
                <div class="stat-item stat-submitted">
                    ✓ Đã nộp: {{ $submittedCount }}/{{ $totalCount }}
                </div>
                <div class="stat-item stat-missing">
                    ✗ Chưa nộp: {{ $missingCount }}/{{ $totalCount }}
                </div>
            </div>
        </h2>

        @if(count($submissionStatus) > 0)
        <table class="submission-table">
            <thead>
                <tr>
                    <th>STT</th>
                    <th>Tên Sinh Viên</th>
                    <th>Email</th>
                    <th>Trạng Thái</th>
                    <th>Thời Gian Nộp</th>
                    <th>File Nộp</th>
                </tr>
            </thead>
            <tbody>
                @foreach($submissionStatus as $index => $submission)
                <tr>
                    <td>{{ $index + 1 }}</td>
                    <td>{{ $submission['name'] }}</td>
                    <td>{{ $submission['email'] }}</td>
                    <td>
                        <span class="status-badge {{ $submission['status'] }}">
                            {{ $submission['status'] == 'submitted' ? 'Đã nộp' : 'Chưa nộp' }}
                        </span>
                    </td>
                    <td>
                        @if($submission['submitted_at'])
                        {{ date('d/m/Y H:i', strtotime($submission['submitted_at'])) }}
                        @else
                        <span style="color: #999;">-</span>
                        @endif
                    </td>
                    <td>
                        @if($submission['file_path'])
                        <a href="{{ asset($submission['file_path']) }}" target="_blank" class="file-link">
                            📎 Xem file
                        </a>
                        @else
                        <span style="color: #999;">-</span>
                        @endif
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
