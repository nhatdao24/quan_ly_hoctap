<div>
    <style>
        /* === Reset === */
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
            font-family: "Segoe UI", Arial, sans-serif;
        }

        /* === Layout tổng === */
        .layout {
            display: flex;
            min-height: 100vh;
            background-color: #f4f4f4;
        }

        /* === SIDEBAR === */
        .sidebar {
            position: fixed;
            top: 0;
            left: 0;
            height: 100vh;
            /* đứng yên theo chiều cao màn hình */
            width: 250px;
            background: #1f1f1f;
            color: #e0e0e0;
            display: flex;
            flex-direction: column;
            padding: 20px 15px;
            overflow-y: auto;
        }

        .sidebar h2 {
            text-align: center;
            margin-bottom: 25px;
            color: #fff;
            letter-spacing: 1px;
        }

        /* === Link & button === */
        .sidebar a,
        .sidebar .dropbtn {
            display: block;
            background: none;
            color: #cfcfcf;
            padding: 10px 14px;
            border: none;
            text-align: left;
            font-size: 15px;
            cursor: pointer;
            width: 100%;
            border-radius: 6px;
            transition: all 0.2s ease;
            text-decoration: none;
            white-space: nowrap;
            /* tránh chữ bị xuống dòng */
        }

        .sidebar a:hover,
        .sidebar .dropbtn:hover {
            background: #333;
            color: #fff;
        }

        /* === DROPDOWN === */
        .dropdown {
            position: relative;
            width: 100%;
        }

        .dropdown-content {
            display: none;
            flex-direction: column;
            background: #2b2b2b;
            border-radius: 6px;
            overflow: hidden;
            margin-top: 4px;
            margin-left: 10px;
            width: calc(100% - 10px);
        }

        /* Khi hover hiện menu con */
        .dropdown:hover .dropdown-content {
            display: flex;
        }

        .dropdown-content a {
            padding: 9px 14px;
            font-size: 14px;
            color: #bfbfbf;
            border-left: 3px solid transparent;
            width: 100%;
        }

        .dropdown-content a:hover {
            background: #3a3a3a;
            border-left: 3px solid #888;
            color: #fff;
        }

        /* === MAIN === */
        .main {
            flex: 1;
            display: flex;
            flex-direction: column;
            margin-left: 250px;
        }

        /* === HEADER === */
        .header {
            background: #fff;
            border-bottom: 1px solid #ddd;
            padding: 15px 25px;
            display: flex;
            align-items: center;
            justify-content: space-between;
            position: sticky;
            top: 0;
            z-index: 10;
        }

        .header h1 {
            font-size: 20px;
            font-weight: 600;
            color: #222;
        }

        .header a {
            color: #333;
            text-decoration: none;
            margin-left: 15px;
            font-size: 14px;
            transition: color 0.2s ease;
        }

        .header a:hover {
            color: #000;
            text-decoration: underline;
        }

        .logout {
            color: #d33;
            font-weight: 500;
        }

        /* === CONTENT === */


        /* === SCROLLBAR === */
        ::-webkit-scrollbar {
            width: 8px;
        }

        ::-webkit-scrollbar-thumb {
            background: #bbb;
            border-radius: 4px;
        }

        ::-webkit-scrollbar-thumb:hover {
            background: #999;
        }

        /* === RESPONSIVE === */
        @media (max-width: 768px) {
            .layout {
                flex-direction: column;
            }

            .sidebar {
                width: 100%;
                flex-direction: row;
                overflow-x: auto;
            }

            .sidebar h2 {
                display: none;
            }

            .dropdown-content {
                position: static;
                margin-left: 0;
                width: 100%;
            }
        }
    </style>
    <!DOCTYPE html>
    <html lang="vi">

    <head>
        <meta charset="UTF-8">
        <title>Admin Dashboard</title>
    </head>

    <body>
        <div class="layout">
            @include('admin.siderbar')
            <div class="main">
                @include('admin.header')
                <div class="content-area">
                    @include('admin.'.$content)
                </div>
            </div>
        </div>
    </body>

    </html>