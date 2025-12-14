<style>
    .project-detail-container {
        padding: 30px;
        background-color: #f9f9f9;
        min-height: calc(100vh - 60px);
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

    .page-header {
        background: #fff;
        padding: 30px;
        border-radius: 8px;
        box-shadow: 0 2px 4px rgba(0, 0, 0, 0.08);
        margin-bottom: 30px;
        border-left: 4px solid #333;
    }

    .page-header h1 {
        font-size: 28px;
        color: #222;
        margin: 0 0 12px 0;
        font-weight: 600;
    }

    .page-header p {
        color: #666;
        font-size: 14px;
        margin: 0;
        line-height: 1.6;
    }

    /* Stats Cards */
    .stats-grid {
        display: grid;
        grid-template-columns: repeat(auto-fit, minmax(200px, 1fr));
        gap: 20px;
        margin-bottom: 30px;
    }

    .stat-card {
        background: #fff;
        padding: 20px 25px;
        border-radius: 8px;
        box-shadow: 0 2px 4px rgba(0, 0, 0, 0.08);
        display: flex;
        align-items: center;
        gap: 15px;
        transition: all 0.2s ease;
    }

    .stat-card:hover {
        box-shadow: 0 4px 12px rgba(0, 0, 0, 0.12);
    }

    .stat-icon {
        width: 50px;
        height: 50px;
        border-radius: 8px;
        background: #f0f0f0;
        display: flex;
        align-items: center;
        justify-content: center;
        font-size: 24px;
    }

    .stat-content {
        flex: 1;
    }

    .stat-label {
        font-size: 13px;
        color: #999;
        margin: 0 0 5px 0;
        text-transform: uppercase;
        letter-spacing: 0.5px;
    }

    .stat-value {
        font-size: 24px;
        font-weight: 600;
        color: #222;
        margin: 0;
    }

    /* Management Links */
    .management-section {
        background: #fff;
        padding: 30px;
        border-radius: 8px;
        box-shadow: 0 2px 4px rgba(0, 0, 0, 0.08);
    }

    .management-section h2 {
        font-size: 20px;
        color: #222;
        margin: 0 0 25px 0;
        font-weight: 600;
        border-bottom: 2px solid #f0f0f0;
        padding-bottom: 15px;
    }

    .management-grid {
        display: grid;
        grid-template-columns: repeat(auto-fit, minmax(280px, 1fr));
        gap: 20px;
    }

    .management-card {
        background: #fafafa;
        border: 2px solid #e0e0e0;
        border-radius: 8px;
        padding: 25px;
        text-decoration: none;
        transition: all 0.3s ease;
        display: flex;
        flex-direction: column;
        gap: 15px;
    }

    .management-card:hover {
        border-color: #333;
        background: #fff;
        box-shadow: 0 4px 12px rgba(0, 0, 0, 0.08);
        transform: translateY(-2px);
    }

    .management-icon {
        width: 50px;
        height: 50px;
        border-radius: 8px;
        background: #333;
        color: #fff;
        display: flex;
        align-items: center;
        justify-content: center;
        font-size: 24px;
    }

    .management-content h3 {
        font-size: 18px;
        color: #222;
        margin: 0 0 8px 0;
        font-weight: 600;
    }

    .management-content p {
        font-size: 14px;
        color: #666;
        margin: 0;
        line-height: 1.5;
    }

    .management-arrow {
        display: flex;
        align-items: center;
        justify-content: flex-end;
        color: #999;
        transition: all 0.2s ease;
    }

    .management-card:hover .management-arrow {
        color: #333;
        transform: translateX(5px);
    }

    /* Responsive */
    @media (max-width: 768px) {
        .project-detail-container {
            padding: 15px;
        }

        .stats-grid {
            grid-template-columns: 1fr;
        }

        .management-grid {
            grid-template-columns: 1fr;
        }
    }
</style>

<div class="project-detail-container">
    <!-- Back link -->
    <a href="{{ route('admin.dashboard') }}" class="back-link">
        <svg width="20" height="20" fill="none" stroke="currentColor" viewBox="0 0 24 24">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 19l-7-7m0 0l7-7m-7 7h18" />
        </svg>
        Quay lại danh sách dự án
    </a>

    <!-- Project Header -->
    <div class="page-header">
        <h1>{{ $project->title ?? 'Dự án' }}</h1>
        <p>{{ $project->description ?? 'Không có mô tả cho dự án này.' }}</p>
    </div>

    <!-- Stats -->
    <div class="stats-grid">
        <div class="stat-card">
            <div class="stat-icon">👥</div>
            <div class="stat-content">
                <p class="stat-label">Thành viên</p>
                <p class="stat-value">{{ $memberCount ?? 0 }}</p>
            </div>
        </div>

        <div class="stat-card">
            <div class="stat-icon">📝</div>
            <div class="stat-content">
                <p class="stat-label">Bài tập</p>
                <p class="stat-value">{{ $assignmentCount ?? 0 }}</p>
            </div>
        </div>

        <div class="stat-card">
            <div class="stat-icon">📅</div>
            <div class="stat-content">
                <p class="stat-label">Ngày tạo</p>
                <p class="stat-value" style="font-size: 16px;">{{ date('d/m/Y', strtotime($project->created_at)) }}</p>
            </div>
        </div>
    </div>

    <!-- Management Links -->
    <div class="management-section">
        <h2>Quản Lý Dự Án</h2>
        <div class="management-grid">
            <!-- Quản lý thành viên -->
            <a href="{{ route('admin.userManagement', ['project_id' => $project_id]) }}" class="management-card">
                <div class="management-icon">👥</div>
                <div class="management-content">
                    <h3>Quản Lý Thành Viên</h3>
                    <p>Thêm, xóa và chỉnh sửa vai trò thành viên trong dự án</p>
                </div>
                <div class="management-arrow">
                    <svg width="24" height="24" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7" />
                    </svg>
                </div>
            </a>

            <!-- Quản lý bài tập -->
            <a href="{{ route('admin.assignmentManagement', ['project_id' => $project_id]) }}" class="management-card">
                <div class="management-icon">📝</div>
                <div class="management-content">
                    <h3>Quản Lý Bài Tập</h3>
                    <p>Tạo bài tập, xem danh sách và theo dõi trạng thái nộp bài</p>
                </div>
                <div class="management-arrow">
                    <svg width="24" height="24" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7" />
                    </svg>
                </div>
            </a>

            <!-- Quản lý bài posts -->
            <a href="{{ route('admin.postManagement', ['project_id' => $project_id]) }}" class="management-card">
                <div class="management-icon">💬</div>
                <div class="management-content">
                    <h3>Quản Lý Bài Posts</h3>
                    <p>Xem và quản lý các bài viết, thảo luận trong dự án</p>
                </div>
                <div class="management-arrow">
                    <svg width="24" height="24" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7" />
                    </svg>
                </div>
            </a>
        </div>
    </div>
</div>
