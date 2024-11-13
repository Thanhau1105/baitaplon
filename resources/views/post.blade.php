<!DOCTYPE html>
html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Danh Sách Bài Đăng</title>
    <link rel="icon" type="image/x-icon" href="/image/android-chrome-512x512.png">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css"
          integrity="sha512-DTOQO9RWCH3ppGqcWaEA1BIZOC6xxalwEsw9c2QQeAIftl+Vegovlnee1c9QX4TctnWMn13TZye+giMm8e2LwA=="
          crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet"
          href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@48,700,1,200"/>
    <link rel="stylesheet" href="/resources/bootstrap/bootstrap.min.css">
    <link rel="stylesheet" href="/css/style.css">
    <link rel="stylesheet" href="@{/css/post.css}">
    <link rel="stylesheet" href="/css/base.css">
    <link rel="stylesheet" href="/css/contact.css">
</head>
<body>
<header class="header">
    <div class="container-fluid">
        <div class="row">
            <div class="col-12">
                <div class="inner-head">
                    <div class="inner-logo">
                        <a href="@{/user/home}">
                            <img src="/image/logo.png" alt="logo">
                        </a>
                    </div>
                    <div class="inner-menu">
                        <ul class="menu">
                            <li><a href="@{/user/home}" class="active-menu">Trang Chủ</a></li>
                            <li><a href="/introduce">Giới Thiệu</a></li>
                            <li><a href="@{/post}">Bài Đăng</a></li>
                            <li><a href="@{/contact}">Liên Hệ</a></li>
                        </ul>
                    </div>
                    <div class="user-dropdown">
                        <div class="dropdown-toggle">
                            <i class="fa-solid fa-user"></i>
                            <span text="${email}">Tên Người Dùng</span>
                            <i class="fa-solid fa-chevron-down"></i>
                        </div>
                        <ul class="dropdown-menu">
                            <li><a href="@{/user/profile}">Quản Lí Cá Nhân</a></li>
                            <li><form action="/logout" method="post">
                                <button type="submit">Đăng Xuất</button>
                            </form></li>
                        </ul>
                    </div>
                    <div class="inner-menu-mb">
                        <div class="menu-mb-icon"><i class="fa-solid fa-bars"></i></div>
                        <ul class="menu-mb">
                            <li><a href="@{/user/home}" class="active-menu"><i class="fa-solid fa-house"></i>Trang Chủ</a></li>
                            <li><a href="@{/user/introduce}"><i class="fa-solid fa-house"></i>Giới Thiệu</a></li>
                            <li><a href="@{/post}"><i class="fa-solid fa-house"></i>Bài Đăng</a></li>
                            <li><a href="@{/user/contact}"><i class="fa-solid fa-house"></i>Liên Hệ</a></li>
                            <li class="item-action">
                                <a href="/login">Đăng Nhập</a>
                                <a href="/logout">Đăng Xuất</a>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
</header>
<div class="container">
    <div class="post-container">
        <a href="@{/post/create_post}" class="btn btn-primary" name="create">Đăng Bài</a>
        <div class="row">
            <div class="col-md-6 col-12" th:each="post : ${posts}">
                <div class="inner-box">
                    <div class="inner-img" th:if="${post.listImages != null and !post.listImages.isEmpty()}">
                        <img src="@{'/' + ${post.listImages[0].url}}" alt="Image Description" class="image" />
                    </div>
                    <div class="inner-content">
                        <h3 class="title" text="${post.title}"></h3>
                        <a th:if="${post.location.link}" href="${post.location.link}" target="_blank" class="btn inner-location">
                            <i class="fa-solid fa-map-location"></i>
                            <p class="line-clamp" style="--line-clamp:1;" text="${post.location.address}"></p>
                        </a>
                        <div class="inner-bot">
                            <p><span text="${#numbers.formatDecimal(post.price, 0, 'COMMA', 0, 'POINT')}"></span>VND</p>
                            <a href="@{/post/detail/{id}(id=${post.id})}" class="btn">Xem Phòng</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<script src="@{/bootstrap/bootstrap.bundle.min.js}"></script>
</body>
</html>
