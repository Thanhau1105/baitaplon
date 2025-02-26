<!DOCTYPE html>
<html xmlns:th="http://www.thymeleaf.org">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title text="${post.title}"></title>
  <link rel="icon" type="image/x-icon" href="/image/android-chrome-512x512.png">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css"
        integrity="sha512-DTOQO9RWCH3ppGqcWaEA1BIZOC6xxalwEsw9c2QQeAIftl+Vegovlnee1c9QX4TctnWMn13TZye+giMm8e2LwA=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />
  <link rel="stylesheet"
        href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@48,700,1,200"/>
  <link rel="stylesheet" href="/resources/bootstrap/bootstrap.min.css">
  <link rel="stylesheet" href="/css/base.css">
  <link rel="stylesheet" href="@{/css/postdetail.css}">
  <link rel="stylesheet" href="/css/style.css">
  <style>
    img {
      max-width: 100%;
    }
  </style>
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
              <li><a th:href="@{/contact}">Liên Hệ</a></li>
            </ul>
          </div>
          <div class="user-dropdown">
            <div class="dropdown-toggle">
              <i class="fa-solid fa-user"></i>
              <span text="${email}">Tên Người Dùng</span>
              <i class="fa-solid fa-chevron-down"></i>
            </div>
            <ul class="dropdown-menu">
              <li><a th:href="@{/user/profile}">Quản Lí Cá Nhân</a></li>
              <li><form action="/logout" method="post">
                <button type="submit">Đăng Xuất</button>
              </form></li>
            </ul>
          </div>
          <div class="inner-menu-mb">
            <div class="menu-mb-icon"><i class="fa-solid fa-bars"></i></div>
            <ul class="menu-mb">
              <li><a th:href="@{/user/home}" class="active-menu"><i class="fa-solid fa-house"></i>Trang Chủ</a></li>
              <li><a th:href="/introduce"><i class="fa-solid fa-house"></i>Giới Thiệu</a></li>
              <li><a th:href="@{/post}"><i class="fa-solid fa-house"></i>Bài Đăng</a></li>
              <li><a th:href="@{/contact}"><i class="fa-solid fa-house"></i>Liên Hệ</a></li>
              <li class="item-action">
                <a th:href="/login">Đăng Nhập</a>
                <a th:href="/logout">Đăng Xuất</a>
              </li>
            </ul>
          </div>
        </div>
      </div>
    </div>
  </div>
</header>

<div class="pt">
  <div class="container-fluid">
    <div class="row">
      <div class="col-xl-2 col-lg-2 col-md-3 col-sm-3 col-xs-3 col-12 inner-left">
        <div class="inner-slide">
          <div class="btn-left"><i class="fa-solid fa-arrow-up"></i></div>
          <div class="slide" th:each="image : ${post.listImages}">
            <img id="slide-img1" src="@{'/' + ${image.url}}" alt="" class="slide-img">
          </div>
          <div class="btn-right"><i class="fa-solid fa-arrow-down"></i></div>
        </div>
      </div>
      <div class="col-xl-7 col-lg-7 col-md-9 col-sm-9 col-xs-9 col-12">
        <div class="inner-center">
          <div class="inner-head">
            <figure th:if="${post.listImages != null and !post.listImages.isEmpty()}">
              <img id="main-image" src="@{'/' + ${post.listImages[0].url}}" alt="">
              <figcaption>
                <h1 class="inner-title" text="${post.title}"></h1>
                <span text="${#numbers.formatDecimal(post.price, 0, 'COMMA', 0, 'POINT')}"></span>VND<br>
                <div class="inner-location">
                  <a th:href="${post.location.link}" target="_blank">
                    <i class="fa-solid fa-map-location"></i>
                    <p class="line-clamp" style="--line-clamp:1;" text="${post.location.address}"></p>
                  </a>
                </div>
              </figcaption>
            </figure>
          </div>
          <div class="inner-content">
            <div class="inner-overview">
              <h2 class="inner-title">Tổng quan</h2>
              <p class="inner-para" text="${post.description}"></p>
            </div>
            <div class="inner-utilities">
              <h2 class="inner-title">Tiện ích</h2>
              <div class="utilities">
                <div class="col-4">
                  <div class="inner-box">
                    <ul>
                      <li th:each="amenity : ${post.listAmenities}" text="${amenity.name}">Amenity</li>
                    </ul>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
      <div class="col-xl-3 col-lg-3">
        <div class="inner-right" th:each="post : ${posts}">
          <div class="row">
            <div class="col-xl-12 col-lg-12 col-md-12 col-sm-6">
              <a th:href="@{/post/detail/{id}(id=${post.id})}" class="inner-other">
                <div class="inner-img" th:if="${post.listImages != null and !post.listImages.isEmpty()}">
                  <img  src="@{'/' + ${post.listImages[0].url}}" alt="" class="m-img">
                </div>
                <h5 text="${post.title}"></h5>
                <p><span text="${#numbers.formatDecimal(post.price, 0, 'COMMA', 0, 'POINT')}"></span>VND</td></p>
                <div class="location">
                  <i class="fa-solid fa-map-location"></i>
                  <p class="line-clamp" text="${post.location.address}"></p>
                </div>
              </a>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>
<div class="container">
  <h2>Bình luận</h2>
  <form action="@{/comment/create-comment}" method="post" class="comment-form">
    <div class="form-group">
      <label>Đánh giá:</label>
      <div class="rating">
        <input type="radio" name="rating" value="5" id="star1" required>
        <label for="star1" class="fa fa-star"></label>
        <input type="radio" name="rating" value="4" id="star2">
        <label for="star2" class="fa fa-star"></label>
        <input type="radio" name="rating" value="3" id="star3">
        <label for="star3" class="fa fa-star"></label>
        <input type="radio" name="rating" value="2" id="star4">
        <label for="star4" class="fa fa-star"></label>
        <input type="radio" name="rating" value="1" id="star5">
        <label for="star5" class="fa fa-star"></label>
      </div>
    </div>
    <div class="form-group">
      <label for="content">Nội dung bình luận:</label>
      <textarea id="content" name="content" rows="4" required placeholder="Nhập bình luận của bạn ở đây..."></textarea>
    </div>
    <input type="hidden" name="postId" th:value="${post.id}"/>
    <button type="submit" class="submit-comment">Gửi Bình Luận</button>
  </form>
  <div class="comments-section">
    <ul class="comments-list" th:each="comment : ${comments}">
      <li class="comment-item">
        <div class="comment-rating">
    <span th:each="i : ${#numbers.sequence(0, 4)}">
        <i class="fa-star" th:class="${i < comment.rating ? 'fas fa-star' : 'far fa-star'}"></i>
    </span>
        </div>
        <div class="comment-content">
          <p text="${comment.content}"></p>
          <p class="comment-author">- <span text="${comment.user.email}">Người bình luận</span></p>
        </div>
      </li>
    </ul>
  </div>
</div>
<script src="@{/js/header.js}"></script>
<script src="@{/js/show-room}"></script>
</body>
</html>
