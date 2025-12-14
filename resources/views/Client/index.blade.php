<!-- index.php -->

<style>
    /* ----- RESET ----- */
* {
    margin: 0;
    padding: 0;
    box-sizing: border-box;
    font-family: "Segoe UI", sans-serif;
}

/* ----- BODY ----- */
body {
    background-color: #f5f5f5;
    color: #222;
}

/* ----- MAIN CONTENT ----- */

/* ----- HEADER ----- */
.header {
    background: #222;
    color: #fff;
    display: flex;
    justify-content: space-between;
    align-items: center;
    padding: 15px 30px;
    position: fixed;
    top: 0;
    left: 0 !important; /* Force override */
    right: 0;
    width: 100% !important; /* Force full width */
    margin-left: 0 !important; /* Force no margin */
    height: 70px;
    z-index: 1000;
}

.header .logo a {
    color: #fff;
    text-decoration: none;
    font-size: 1.4rem;
    font-weight: bold;
}

.search-box {
    display: flex;
    gap: 10px;
}

.search-box input {
    padding: 8px 12px;
    border-radius: 5px;
    border: none;
    outline: none;
    width: 200px;
}

.search-box button {
    background: #555;
    color: white;
    border: none;
    padding: 8px 12px;
    border-radius: 5px;
    cursor: pointer;
    transition: 0.3s;
}

.search-box button:hover {
    background: #888;
}

.nav-links a {
    color: #ddd;
    text-decoration: none;
    margin-left: 15px;
    transition: color 0.3s;
}

.nav-links a:hover {
    color: #fff;
}

/* ----- DASHBOARD ----- */

.dashboard {
    align-items: center; 
    margin: 0;                /* bỏ auto để không bó hẹp */
    padding: 90px 30px 30px;  /* chừa khoảng cho header */
    min-height: 100vh;
    box-sizing: border-box;
    width: 100%;              /* chiếm toàn bộ chiều ngang */
    position: relative;
    left: 0;
}



.dashboard h2 {
    margin-bottom: 20px;
    color: #333;
}

/* ----- PRODUCT LIST ----- */
.product-list {
    display: grid;
    grid-template-columns: repeat(auto-fill, minmax(220px, 1fr));
    gap: 20px;
}

.product {
    background: white;
    border-radius: 10px;
    padding: 15px;
    text-align: center;
    box-shadow: 0 2px 5px rgba(0,0,0,0.1);
    transition: 0.3s;
}

.product:hover {
    transform: translateY(-5px);
}

.product img {
    width: 100%;
    height: 180px;
    object-fit: cover;
    border-radius: 8px;
}

.product h3 {
    margin: 10px 0;
    color: #111;
}


.product button {
    background: #111;
    color: #fff;
    border: none;
    padding: 8px 12px;
    border-radius: 5px;
    cursor: pointer;
    transition: 0.3s;
}

.product button:hover {
    background: #444;
}

</style>
<!DOCTYPE html>
<html lang="vi">

<head>
    <meta charset="UTF-8">
    <title>Laptop Store</title>
</head>

<body>
    @include('client.header')

    <div class="dashboard">
        @include('client.'. $content)
    </div>

</body>

</html>