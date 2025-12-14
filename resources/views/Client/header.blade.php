<!-- header.php -->
<style>
    /* Nút tên người dùng */
    #name {
        background: #000;
        color: #fff;
        border: none;
        padding: 8px 16px;
        border-radius: 5px;
        font-weight: 600;
        font-size: 14px;
        cursor: pointer;
        transition: background 0.3s;
    }

    #name:hover {
        background: #333;
    }

    /* Overlay */
    .profile-overlay {
        position: fixed;
        inset: 0;
        background: rgba(0, 0, 0, 0.5);
        display: none;
        justify-content: center;
        align-items: center;
        z-index: 9999;
    }

    .profile-overlay.show {
        display: flex;
    }

    /* Form Box */
    .profile-form-box {
        background: #fff;
        padding: 30px;
        border-radius: 8px;
        width: 450px;
        max-height: 90vh;
        overflow-y: auto;
        box-shadow: 0 2px 10px rgba(0, 0, 0, 0.1);
        position: relative;
    }

    .profile-form-box h3 {
        margin: 0 0 20px;
        font-size: 22px;
        font-weight: 600;
        color: #333;
        border-bottom: 2px solid #000;
        padding-bottom: 10px;
        text-align: center;
    }

    .profile-close {
        position: absolute;
        top: 15px;
        right: 20px;
        font-size: 24px;
        cursor: pointer;
        color: #888;
        line-height: 1;
        transition: color 0.3s;
    }

    .profile-close:hover {
        color: #000;
    }

    .form-group {
        margin-bottom: 15px;
    }

    .form-group label {
        display: block;
        margin-bottom: 6px;
        font-weight: 600;
        color: #333;
        font-size: 14px;
    }

    .form-group input,
    .form-group textarea {
        width: 100%;
        padding: 10px 12px;
        border: 1px solid #ddd;
        border-radius: 5px;
        font-size: 14px;
        box-sizing: border-box;
        transition: border 0.3s;
        font-family: inherit;
    }

    .form-group input:focus,
    .form-group textarea:focus {
        outline: none;
        border-color: #000;
    }

    .form-group input:disabled {
        background: #f5f5f5;
        cursor: not-allowed;
        color: #999;
    }

    .form-group textarea {
        resize: vertical;
        min-height: 70px;
    }

    .btn-update {
        width: 100%;
        padding: 12px;
        background: #000;
        color: #fff;
        border: none;
        border-radius: 5px;
        font-size: 15px;
        font-weight: 600;
        cursor: pointer;
        margin-top: 10px;
        transition: background 0.3s;
    }

    .btn-update:hover {
        background: #333;
    }

    .info-note {
        background: #f8f9fa;
        padding: 12px;
        border-radius: 5px;
        margin-bottom: 15px;
        font-size: 13px;
        color: #666;
        border-left: 3px solid #000;
    }

    .divider {
        margin: 20px 0;
        border: none;
        height: 1px;
        background: #eee;
    }

    .password-section-title {
        font-size: 14px;
        font-weight: 600;
        color: #333;
        margin-bottom: 12px;
    }
</style>

<header class="header">
    <div class="logo">
        
    </div>

    <div class="search-box">
        <form action="" method="get">
            <input type="text" name="search" placeholder="Tìm kiếm dự án...">
            <button type="submit" name="btn">Tìm</button>
        </form>
    </div>

    <nav class="nav-links">
        <a href="{{ route('client.dashboard') }}">Trang chủ</a>
        <a href="">Thông báo</a>
        <?php
        use Illuminate\Support\Facades\Auth;
        if (!Auth::check()) {
        ?>
            <a href="{{ route('login') }}">Đăng nhập</a>
            <a href="{{ route('register') }}">Đăng ký</a>
        <?php
        } else {
        ?>
            <button id='name'><?php echo Auth::user()->name; ?></button>
            <a href="{{ route('logout') }}">Đăng Xuất</a>
        <?php
        }
        ?>
    </nav>
</header>

<!-- Form cập nhật thông tin người dùng -->
<?php if (Auth::check()) { ?>
<div class="profile-overlay" id="profileOverlay">
    <div class="profile-form-box" onclick="event.stopPropagation()">
        <span class="profile-close" id="profileClose">×</span>
        <h3>Thông tin tài khoản</h3>
        

        <form action="{{ route('client.updateProfile') }}" method="POST">
            @csrf
            <div class="form-group">
                <label>Họ và tên</label>
                <input type="text" name="name" value="{{ Auth::user()->name }}" required placeholder="Nhập họ và tên">
            </div>

            <div class="form-group">
                <label>Email</label>
                <input type="email" value="{{ Auth::user()->email }}" disabled>
            </div>


            <hr class="divider">

            <div class="password-section-title">Đổi mật khẩu</div>
            
            <div class="form-group">
                <label>Mật khẩu mới</label>
                <input type="password" name="password" placeholder="Để trống nếu không đổi">
            </div>

            <div class="form-group">
                <label>Xác nhận mật khẩu</label>
                <input type="password" name="password_confirmation" placeholder="Nhập lại mật khẩu mới">
            </div>

            <button type="submit" class="btn-update">Cập nhật thông tin</button>
        </form>
    </div>
</div>

<script>
    // Mở form khi click vào nút name
    document.getElementById('name').addEventListener('click', function(e) {
        e.preventDefault();
        document.getElementById('profileOverlay').classList.add('show');
    });

    // Đóng form khi click ra ngoài
    document.getElementById('profileOverlay').addEventListener('click', function(e) {
        if (e.target === this) {
            this.classList.remove('show');
        }
    });

    // Đóng form khi click nút đóng
    document.getElementById('profileClose').addEventListener('click', function() {
        document.getElementById('profileOverlay').classList.remove('show');
    });
</script>
<?php } ?>