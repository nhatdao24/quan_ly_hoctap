<style>
    body {
        margin: 0;
        padding: 0;
        font-family: 'Segoe UI', sans-serif;
        background-color: #1c1c1c;
        /* nền đen xám */
        color: #f0f0f0;
        /* chữ trắng xám */
        display: flex;
        justify-content: center;
        align-items: center;
        height: 100vh;
    }

    .login-container {
        background-color: #2e2e2e;
        /* hộp xám đậm */
        padding: 40px;
        border-radius: 10px;
        box-shadow: 0 0 15px rgba(255, 255, 255, 0.1);
        width: 350px;
    }

    .login-container h2 {
        text-align: center;
        margin-bottom: 30px;
        color: #ffffff;
    }

    .form-group {
        margin-bottom: 20px;
    }

    label {
        display: block;
        margin-bottom: 8px;
        color: #cccccc;
        font-size: 14px;
    }

    input[type="text"],
    input[type="password"] {
        width: 100%;
        padding: 10px;
        border: 1px solid #444;
        border-radius: 5px;
        background-color: #1c1c1c;
        color: #fff;
        font-size: 14px;
    }

    input[type="text"]::placeholder,
    input[type="password"]::placeholder {
        color: #888;
    }

    .btn-submit {
        width: 100%;
        padding: 12px;
        background-color: #ffffff;
        color: #1c1c1c;
        border: none;
        border-radius: 5px;
        font-weight: bold;
        cursor: pointer;
        transition: background-color 0.3s ease;
    }

    .btn-submit:hover {
        background-color: #cccccc;
    }

    .register-link {
        text-align: center;
        margin-top: 20px;
        font-size: 13px;
    }

    .register-link a {
        color: #ffffff;
        text-decoration: underline;
    }

    .my-box {
        margin-top: 20px;
        padding: 15px;
        background-color: #444;
        border-radius: 5px;
        text-align: center;
        color: #fff;
    }
</style>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Đăng Ký</title>
</head>

<body>
    <div class="login-container">
        <h2>Đăng ký</h2>
        <form method="post" action="{{ route('createAccount') }}">
            @csrf
            <div class="form-group">
                <label for="fullname">Họ và tên</label>
                <input type="text" id="name" name="name" required placeholder="Nhập họ và tên">
            </div>

            <div class="form-group">
                <label for="email">Email</label>
                <input type="text" id="email" name="email" required placeholder="Nhập email">
            </div>

            <div class="form-group">
                <label for="password">Mật khẩu</label>
                <input type="password" id="password" name="password" required placeholder="Nhập mật khẩu">
            </div>

            <div class="form-group">
                <label for="repassword">Nhập lại mật khẩu</label>
                <input type="password" id="repassword" name="password_confirmation" required placeholder="Nhập lại mật khẩu">
            </div>

            <button type="submit" name="btn_register" class="btn-submit">Đăng ký</button>
        </form>

        <div class="register-link">
            <!-- dùng lại class register-link để đồng bộ -->
            <p>Đã có tài khoản? <a href="/login">Đăng nhập</a></p>
</body>

</html>