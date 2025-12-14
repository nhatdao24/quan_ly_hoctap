<style>
    .project-detail-container {
        padding: 30px;
        background-color: #f9f9f9;
        min-height: calc(100vh - 60px);
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
        margin: 0 0 15px 0;
        font-weight: 600;
    }

    .project-description {
        color: #666;
        font-size: 14px;
        line-height: 1.7;
        margin: 0;
        white-space: pre-wrap;
    }

    /* Management Cards */
    .management-grid {
        display: grid;
        grid-template-columns: repeat(auto-fit, minmax(300px, 1fr));
        gap: 20px;
    }

    .management-card {
        background: #fff;
        padding: 30px;
        border-radius: 8px;
        box-shadow: 0 2px 4px rgba(0, 0, 0, 0.08);
        transition: all 0.3s ease;
        border-left: 4px solid #e0e0e0;
        text-decoration: none;
        display: flex;
        align-items: center;
        gap: 20px;
    }

    .management-card:hover {
        box-shadow: 0 4px 12px rgba(0, 0, 0, 0.15);
        transform: translateY(-2px);
        border-left-color: #333;
    }

    .management-icon {
        font-size: 48px;
        line-height: 1;
        flex-shrink: 0;
    }

    .management-content {
        flex: 1;
    }

    .management-content h3 {
        font-size: 18px;
        color: #222;
        margin: 0 0 8px 0;
        font-weight: 600;
    }

    .management-content p {
        color: #666;
        font-size: 14px;
        margin: 0;
        line-height: 1.5;
    }

    .management-arrow {
        color: #999;
        flex-shrink: 0;
        transition: all 0.2s ease;
    }

    .management-card:hover .management-arrow {
        color: #333;
        transform: translateX(4px);
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

    /* Responsive */
    @media (max-width: 768px) {
        .project-detail-container {
            padding: 15px;
        }

        .management-grid {
            grid-template-columns: 1fr;
        }

        .management-card {
            padding: 20px;
        }
    }
</style>

<div class="project-detail-container">
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

    <!-- Project Header -->
    <div class="page-header">
        <h1>{{ $project->title ?? 'Dự Án' }}</h1>
        <p class="project-description">{{ $project->description ?? 'Không có mô tả' }}</p>
    </div>

    <!-- Management Cards -->
    <div class="management-grid">
        <!-- Quản lý bài tập -->
        <a href="{{ route('client.assignmentList', ['project_id' => $project_id]) }}" class="management-card">
            <div class="management-icon">📝</div>
            <div class="management-content">
                <h3>Danh Sách Bài Tập</h3>
                <p>Xem danh sách và nộp bài</p>
            </div>
            <div class="management-arrow">
                <svg width="24" height="24" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7" />
                </svg>
            </div>
        </a>

        <!-- Quản lý bài posts -->
        <a href="{{ route('client.postList', ['project_id' => $project_id]) }}" class="management-card">
            <div class="management-icon">💬</div>
            <div class="management-content">
                <h3>Danh Sách Bài Posts</h3>
                <p>Xem và thảo luận trong dự án</p>
            </div>
            <div class="management-arrow">
                <svg width="24" height="24" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7" />
                </svg>
            </div>
        </a>
    </div>
</div>
