<style>
    /* Overlay mờ toàn màn hình */
    .popup-overlay {
        position: fixed;
        inset: 0;
        background: rgba(0, 0, 0, 0.5);
        display: none;
        justify-content: center;
        align-items: center;
        z-index: 9999;
    }

    /* Hộp popup */
    .popup-box {
        background: #fff;
        padding: 25px;
        width: 350px;
        border-radius: 10px;
        box-shadow: 0 4px 20px rgba(0, 0, 0, 0.3);
    }

    .popup-box h2 {
        margin-top: 0;
        margin-bottom: 15px;
        color: #111;
    }

    .popup-box input {
        width: 100%;
        padding: 10px;
        margin: 8px 0 15px;
        border: 1px solid #aaa;
        border-radius: 6px;
    }

    /* Nút submit trong popup */
    .submit-btn {
        width: 100%;
        padding: 10px;
        background: #000;
        color: #fff;
        border: none;
        border-radius: 6px;
        cursor: pointer;
        font-weight: 600;
        transition: 0.2s;
    }

    .submit-btn:hover {
        background: #333;
    }

    /* ====== HEADER BUTTONS ====== */

    /* Nút Đổi mật khẩu */
    #btnChangePass {
        background: #000;
        color: #fff;
        padding: 8px 14px;
        border: none;
        border-radius: 6px;
        cursor: pointer;
        font-size: 14px;
        font-weight: 600;
        transition: 0.2s;
    }

    #btnChangePass:hover {
        background: #333;
    }

    /* Nút Đăng xuất */
    .logout {
        background: #000;
        color: #fff !important;
        padding: 8px 14px;
        border-radius: 6px;
        text-decoration: none;
        font-size: 14px;
        font-weight: 600;
        margin-left: 10px;
        transition: 0.2s;
    }

    .logout:hover {
        background: #333;
    }
</style>
<div class="header">
    <h1>Bảng điều khiển</h1>
    <div>
        <button id="btnChangePass">Đổi mật khẩu</button>
        <a href="{{ route('logout') }}" class="logout">Đăng xuất</a>
    </div>
</div>
<!-- Popup đổi mật khẩu -->
<div class="popup-overlay" id="popupChangePass">
    <div class="popup-box" onclick="event.stopPropagation()">
        <h2>Đổi mật khẩu</h2>

        <form action="{{ route('admin.changePassword') }}" method="POST">
            @csrf

            <label>Mật khẩu hiện tại</label>
            <input type="password" name="old_password" required>

            <label>Mật khẩu mới</label>
            <input type="password" name="password" required>

            <label>Nhập lại mật khẩu mới</label>
            <input type="password" name="password_confirmation" required>

            <button type="submit" class="submit-btn">Xác nhận</button>
        </form>
    </div>
</div>

<script>
    const btnOpen = document.getElementById('btnChangePass');
    const popup = document.getElementById('popupChangePass');

    // Mở popup
    btnOpen.addEventListener('click', () => {
        popup.style.display = 'flex';
    });

    // Click ra ngoài để đóng
    popup.addEventListener('click', () => {
        popup.style.display = 'none';
    });
</script>