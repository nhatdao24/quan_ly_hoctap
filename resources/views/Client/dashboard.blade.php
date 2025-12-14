<style>
    .dashboard-container {
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
        display: flex;
        justify-content: space-between;
        align-items: center;
    }

    .page-header h1 {
        font-size: 24px;
        color: #222;
        margin: 0;
        font-weight: 600;
    }

    .btn-add-project {
        background: #333;
        color: #fff;
        padding: 10px 20px;
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

    .btn-add-project:hover {
        background: #222;
        box-shadow: 0 4px 8px rgba(0, 0, 0, 0.15);
        color: #fff;
    }

    /* Grid dự án */
    .projects-grid {
        display: grid;
        grid-template-columns: repeat(auto-fill, minmax(320px, 1fr));
        gap: 25px;
    }

    .project-card {
        background: #fff;
        border-radius: 8px;
        box-shadow: 0 2px 4px rgba(0, 0, 0, 0.08);
        transition: all 0.3s ease;
        overflow: hidden;
        border-left: 4px solid #e0e0e0;
        display: flex;
        flex-direction: column;
    }

    .project-card:hover {
        box-shadow: 0 6px 16px rgba(0, 0, 0, 0.12);
        border-left-color: #333;
        transform: translateY(-2px);
    }

    .project-card-body {
        padding: 25px;
        flex: 1;
    }

    .project-title {
        font-size: 18px;
        font-weight: 600;
        color: #222;
        margin: 0 0 12px 0;
        line-height: 1.4;
    }

    .project-description {
        color: #666;
        font-size: 14px;
        line-height: 1.6;
        margin: 0 0 20px 0;
        display: -webkit-box;
        -webkit-line-clamp: 3;
        -webkit-box-orient: vertical;
        overflow: hidden;
        text-overflow: ellipsis;
        min-height: 63px;
    }

    .project-meta {
        display: flex;
        gap: 15px;
        font-size: 13px;
        color: #999;
        padding-top: 15px;
        border-top: 1px solid #f0f0f0;
    }

    .project-card-footer {
        padding: 15px 25px;
        background: #f8f8f8;
        border-top: 1px solid #f0f0f0;
    }

    .btn-view-project {
        display: block;
        width: 100%;
        background: #333;
        color: #fff;
        padding: 10px 20px;
        border: none;
        border-radius: 6px;
        font-size: 14px;
        font-weight: 500;
        cursor: pointer;
        transition: all 0.2s ease;
        text-decoration: none;
        text-align: center;
    }

    .btn-view-project:hover {
        background: #222;
        color: #fff;
    }

    /* Empty state */
    .empty-state {
        text-align: center;
        padding: 80px 20px;
        background: #fff;
        border-radius: 8px;
        box-shadow: 0 2px 4px rgba(0, 0, 0, 0.08);
    }

    .empty-state svg {
        width: 80px;
        height: 80px;
        color: #ddd;
        margin-bottom: 20px;
    }

    .empty-state h3 {
        font-size: 20px;
        color: #666;
        margin: 0 0 10px 0;
        font-weight: 600;
    }

    .empty-state p {
        font-size: 14px;
        color: #999;
        margin: 0 0 25px 0;
    }

    /* Responsive */
    @media (max-width: 768px) {
        .dashboard-container {
            padding: 15px;
        }

        .projects-grid {
            grid-template-columns: 1fr;
        }

        .page-header {
            flex-direction: column;
            gap: 15px;
            align-items: flex-start;
        }

        .btn-add-project {
            width: 100%;
            justify-content: center;
        }
    }
</style>
@if($projects->count() > 0)
    <div class="projects-grid">
        @foreach($projects as $project)
        <div class="project-card">
            <div class="project-card-body">
                <h3 class="project-title">{{ $project->title }}</h3>
                <p class="project-description">
                    {{ $project->description ?? 'Không có mô tả cho dự án này.' }}
                </p>
                <div class="project-meta">
                    <span> Ngày tạo: {{ date('d/m/Y', strtotime($project->created_at)) }}</span>
                </div>
            </div>
            <div class="project-card-footer">
                <a href="{{ route('client.projectDetail', ['id' => $project->id]) }}" class="btn-view-project">
                    Xem Chi Tiết
                </a>
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
        <h3>Chưa có dự án nào</h3>
    @endif