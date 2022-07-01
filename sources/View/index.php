<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <!-- Font Awesome 5 -->
    <link href="https://cdn.jsdelivr.net/gh/hung1001/font-awesome-pro@4cac1a6/css/all.css" rel="stylesheet" type="text/css" />

    <!-- Jquery -->
    <script type="text/javascript" src="//code.jquery.com/jquery-1.11.0.min.js"></script>
    <script type="text/javascript" src="//code.jquery.com/jquery-migrate-1.2.1.min.js"></script>
    <!-- Slick JS -->
    <link rel="stylesheet" type="text/css" href="//cdn.jsdelivr.net/npm/slick-carousel@1.8.1/slick/slick.css"/>
    <!-- CSS -->
    <link rel="stylesheet" href="./assets/css/style.css">
</head>
<body>
    <div id="fb-root"></div>
    <script async defer crossorigin="anonymous" src="https://connect.facebook.net/vi_VN/sdk.js#xfbml=1&version=v12.0&appId=1303126910149001&autoLogAppEvents=1" nonce="geF2GnV4"></script>
    <main>
        <article class="search-modal" id="search-box">
                <form action="" method="post" class="modal-container">
                    <input type="text" name="search-input" id="search-input">
                    <button type="button" name="search-submit" id="search-submit">
                        <i class="fal fa-search"></i>
                    </button>
                </form>
                <button id="search-modal-close">
                    <i class="fal fa-times-circle"></i>
                </button>
        </article>
        <article class="cart-modal" id="cart-modal">
            <div class="modal-container">
                <div class="modal-head">
                    <div class="modal--title">
                        <i class="fal fa-shopping-bag"></i>
                        <p>Your cart</p>
                        <p class="cart-modal--total-quantity">
                            (0)
                        </p>
                    </div>
                    <button id="cart-modal-close">
                        <i class="fal fa-times-circle"></i>
                    </button>
                    
                </div>
                <div class="modal-body">
                    <article class="product-box">
                        <a class="product-box__thumbnail" href="#">
                            <img src="./assets/images/elden-ring.jpg" alt="product thumbnail">
                        </a>
                        <div class="product-box__detail">
                            <div class="product-box__desc">
                                <div class="product-box__title" href="#">
                                    <a href="#">Elden Ring</a>
                                    <a href="#"><i class="fal fa-trash"></i></a>
                                </div>
                                <div class="product-box__quantity">
                                    <form>
                                        <button type="button" name="minus" id="minus">
                                            <i class="far fa-minus"></i>
                                        </button>
                                        <input type="number" name="product-quantity">
                                        <button type="button" name="plus" id="plus">
                                            <i class="far fa-plus"></i>
                                        </button>
                                    </form>
                                </div>
                                <div class="product-box__price">
                                    <p class="product-box__totalprice">
                                        790000
                                    </p>
                                    <p class="product-box__fullprice">
                                        800000
                                    </p>
                                </div>
                            </div>
                        </div>
                    </article>
                </div>
                <div class="modal-footer">
                    <ul class="cart-modal-price-list">
                        <!-- 9.000.000.000đ -->
                        <li class="cart-modal-price-item">
                            <p>
                                Tổng giá:
                            </p>
                            <p>
                                9.000.000.000đ
                            </p>
                        </li>
                        <li class="cart-modal-price-item">
                            <p>
                                Giảm giá:
                            </p>
                            <p>
                                9.000.000.000đ
                            </p>
                        </li>
                        <li class="cart-modal-price-item">
                            <p>
                                Số tiền trong tài khoản:
                            </p>
                            <p>
                                9.000.000.000đ
                            </p>
                        </li>
                        <li class="cart-modal-price-item">
                            <p>
                                Còn thiếu:
                            </p>
                            <p>
                                9.000.000.000đ
                            </p>
                        </li>
                        <li class="cart-modal-price-item">
                            <p>
                                Tổng thanh toán:
                            </p>
                            <p>
                                9.000.000.000đ
                            </p>
                        </li>
                    </ul>
                    <a href="#" class="cart-modal-checkout">
                        Check out
                    </a>
                </div>
            </div>
        </article>
        <?php include('.\header.php') ?>
        <section class="main-banner">
            <section class="main-banner__content">
                <h1 class="main-banner--title">
                    Discover
                    <br>
                    New Feature
                </h1>
                <h3 class="main-banner--detail">
                    Sống lại cảm giác đam mê
                </h3>
                <div class="main-banner__btns">
                    <button class="main-banner--primary-btn">
                        Tham gia ngay
                    </button>
                    <button class="main-banner--secondary-btn">
                        Tìm hiểu thêm
                    </button>
                </div>
            </section>
        </section>
        <section class="main-content"  style="margin-top: 0;">
            <article class="content-container">
                <h2 class="content-title">
                    giảm giá
                </h2>
                <section class="content-box">
                    <article class="product-box">
                        <a class="product-box__thumbnail" href="#">
                            <img src="./assets/images/elden-ring.jpg" alt="product thumbnail">
                        </a>
                        <div class="product-box__detail">
                            <div class="product-box__desc">
                                <div class="product-box__title" href="#">
                                    <a href="#">Elden Ring</a>
                                    <div class="tag sale-tag">
                                        -10%
                                    </div>
                                </div>
                                <div class="product-box__price">
                                    <p class="product-box__totalprice">
                                        790000
                                    </p>
                                    <p class="product-box__fullprice">
                                        800000
                                    </p>
                                </div>
                            </div>
                            <a class="product-box__add" href="#">
                                <i class="fal fa-cart-arrow-down"></i>
                            </a>
                        </div>
                    </article>
                    <article class="product-box">
                        <a class="product-box__thumbnail" href="#">
                            <img src="./assets/images/elden-ring.jpg" alt="product thumbnail">
                        </a>
                        <div class="product-box__detail">
                            <div class="product-box__desc">
                                <div class="product-box__title" href="#">
                                    <a href="#">Elden Ring</a>
                                    <div class="tag sale-tag">
                                        -10%
                                    </div>
                                </div>
                                <div class="product-box__price">
                                    <p class="product-box__totalprice">
                                        790000
                                    </p>
                                    <p class="product-box__fullprice">
                                        800000
                                    </p>
                                </div>
                            </div>
                            <a class="product-box__add" href="#">
                                <i class="fal fa-cart-arrow-down"></i>
                            </a>
                        </div>
                    </article>
                    <article class="product-box">
                        <a class="product-box__thumbnail" href="#">
                            <img src="./assets/images/elden-ring.jpg" alt="product thumbnail">
                        </a>
                        <div class="product-box__detail">
                            <div class="product-box__desc">
                                <div class="product-box__title" href="#">
                                    <a href="#">Elden Ring</a>
                                    <div class="tag sale-tag">
                                        -10%
                                    </div>
                                </div>
                                <div class="product-box__price">
                                    <p class="product-box__totalprice">
                                        790000
                                    </p>
                                    <p class="product-box__fullprice">
                                        800000
                                    </p>
                                </div>
                            </div>
                            <a class="product-box__add" href="#">
                                <i class="fal fa-cart-arrow-down"></i>
                            </a>
                        </div>
                    </article>
                    <article class="product-box">
                        <a class="product-box__thumbnail" href="#">
                            <img src="./assets/images/elden-ring.jpg" alt="product thumbnail">
                        </a>
                        <div class="product-box__detail">
                            <div class="product-box__desc">
                                <div class="product-box__title" href="#">
                                    <a href="#">Elden Ring</a>
                                    <div class="tag sale-tag">
                                        -10%
                                    </div>
                                </div>
                                <div class="product-box__price">
                                    <p class="product-box__totalprice">
                                        790000
                                    </p>
                                    <p class="product-box__fullprice">
                                        800000
                                    </p>
                                </div>
                            </div>
                            <a class="product-box__add" href="#">
                                <i class="fal fa-cart-arrow-down"></i>
                            </a>
                        </div>
                    </article>
                </section>
                <a class="content-detail" href="#">
                    Xem thêm
                </a>
            </article>
            <article class="content-container">
                <h2 class="content-title">
                    giảm giá
                </h2>
                <section class="content-box">
                    <article class="product-box">
                        <a class="product-box__thumbnail" href="#">
                            <img src="./assets/images/elden-ring.jpg" alt="product thumbnail">
                        </a>
                        <div class="product-box__detail">
                            <div class="product-box__desc">
                                <div class="product-box__title" href="#">
                                    <a href="#">Elden Ring</a>
                                    <div class="tag sale-tag">
                                        -10%
                                    </div>
                                </div>
                                <div class="product-box__price">
                                    <p class="product-box__totalprice">
                                        790000
                                    </p>
                                    <p class="product-box__fullprice">
                                        800000
                                    </p>
                                </div>
                            </div>
                            <a class="product-box__add" href="#">
                                <i class="fal fa-cart-arrow-down"></i>
                            </a>
                        </div>
                    </article>
                    <article class="product-box">
                        <a class="product-box__thumbnail" href="#">
                            <img src="./assets/images/elden-ring.jpg" alt="product thumbnail">
                        </a>
                        <div class="product-box__detail">
                            <div class="product-box__desc">
                                <div class="product-box__title" href="#">
                                    <a href="#">Elden Ring</a>
                                    <div class="tag sale-tag">
                                        -10%
                                    </div>
                                </div>
                                <div class="product-box__price">
                                    <p class="product-box__totalprice">
                                        790000
                                    </p>
                                    <p class="product-box__fullprice">
                                        800000
                                    </p>
                                </div>
                            </div>
                            <a class="product-box__add" href="#">
                                <i class="fal fa-cart-arrow-down"></i>
                            </a>
                        </div>
                    </article>
                    <article class="product-box">
                        <a class="product-box__thumbnail" href="#">
                            <img src="./assets/images/elden-ring.jpg" alt="product thumbnail">
                        </a>
                        <div class="product-box__detail">
                            <div class="product-box__desc">
                                <div class="product-box__title" href="#">
                                    <a href="#">Elden Ring</a>
                                    <div class="tag sale-tag">
                                        -10%
                                    </div>
                                </div>
                                <div class="product-box__price">
                                    <p class="product-box__totalprice">
                                        790000
                                    </p>
                                    <p class="product-box__fullprice">
                                        800000
                                    </p>
                                </div>
                            </div>
                            <a class="product-box__add" href="#">
                                <i class="fal fa-cart-arrow-down"></i>
                            </a>
                        </div>
                    </article>
                    <article class="product-box">
                        <a class="product-box__thumbnail" href="#">
                            <img src="./assets/images/elden-ring.jpg" alt="product thumbnail">
                        </a>
                        <div class="product-box__detail">
                            <div class="product-box__desc">
                                <div class="product-box__title" href="#">
                                    <a href="#">Elden ten nay dai vai ca chuong luon Ring</a>
                                    <div class="tag sale-tag">
                                        -10%
                                    </div>
                                </div>
                                <div class="product-box__price">
                                    <p class="product-box__totalprice">
                                        790000
                                    </p>
                                    <p class="product-box__fullprice">
                                        800000
                                    </p>
                                </div>
                            </div>
                            <a class="product-box__add" href="#">
                                <i class="fal fa-cart-arrow-down"></i>
                            </a>
                        </div>
                    </article>
                </section>
                <a class="content-detail" href="#">
                    Xem thêm
                </a>
            </article>
            <article class="content-container ">
                <h2 class="content-title">
                    kết nối với chúng tôi!
                </h2>
                <article class="contact-box">
                    <div class="contact-thumbnail">
                        <img src="./assets/images/chatbot.jpg" alt="contact logo">
                    </div>
                    <form action="" method="post">
                        <p class="contact-desc">
                            Chúng tôi sẽ gửi email cho bạn mỗi khi có thông tin mới nếu bạn đăng ký dịch vụ này!
                        </p>
                        <input type="text" name="fullname" id="fullname" placeholder="Họ và tên">
                        <input type="text" name="email" id="email" placeholder="Email">

                        <button name="submit">
                            Tham gia ngay!
                        </button>
                    </form>
                </article>
            </article>
            <article class="content-container">
                <h2 class="content-title">
                    tin tức nổi bật
                </h2>
                <section class="content-box" id="news-box">
                    <article class="news-box">
                        <a class="news-box__thumbnail" href="#">
                            <img src="./assets/images/elden-ring.jpg" alt="news thumbnail">
                        </a>
                        <div class="news-box__detail">
                            <a class="news-box__title" href="#">
                                <h4>
                                    Elden Ring chính thức vượt mặt Dying Light 2 và God of War, trở thành tựa game được yêu thích nhiều nhất trên Steam
                                </h4>
                            </a>
                            <p class="news-box__date">
                                21/08/2021
                            </p>
                            <p class="news-box__desc">
                                Elden Ring còn được coi là hậu duệ của dòng game nổi tiếng Dark Souls.
                            </p>
                        </div>
                    </article>
                    <article class="news-box">
                        <a class="news-box__thumbnail" href="#">
                            <img src="./assets/images/elden-ring.jpg" alt="news thumbnail">
                        </a>
                        <div class="news-box__detail">
                            <a class="news-box__title" href="#">
                                <h4>
                                    Elden Ring chính thức vượt mặt Dying Light 2 và God of War, trở thành tựa game được yêu thích nhiều nhất trên Steam
                                </h4>
                            </a>
                            <p class="news-box__date">
                                21/08/2021
                            </p>
                            <p class="news-box__desc">
                                Elden Ring còn được coi là hậu duệ của dòng game nổi tiếng Dark Souls.
                            </p>
                        </div>
                    </article>
                    <article class="news-box">
                        <a class="news-box__thumbnail" href="#">
                            <img src="./assets/images/elden-ring.jpg" alt="news thumbnail">
                        </a>
                        <div class="news-box__detail">
                            <a class="news-box__title" href="#">
                                <h4>
                                    Elden Ring chính thức vượt mặt Dying Light 2 và God of War, trở thành tựa game được yêu thích nhiều nhất trên Steam
                                </h4>
                            </a>
                            <p class="news-box__date">
                                21/08/2021
                            </p>
                            <p class="news-box__desc">
                                Elden Ring còn được coi là hậu duệ của dòng game nổi tiếng Dark Souls.
                            </p>
                        </div>
                    </article>
                    <article class="news-box">
                        <a class="news-box__thumbnail" href="#">
                            <img src="./assets/images/elden-ring.jpg" alt="news thumbnail">
                        </a>
                        <div class="news-box__detail">
                            <a class="news-box__title" href="#">
                                <h4>
                                    Elden Ring chính thức vượt mặt Dying Light 2 và God of War, trở thành tựa game được yêu thích nhiều nhất trên Steam
                                </h4>
                            </a>
                            <p class="news-box__date">
                                21/08/2021
                            </p>
                            <p class="news-box__desc">
                                Elden Ring còn được coi là hậu duệ của dòng game nổi tiếng Dark Souls.
                            </p>
                        </div>
                    </article>
                    <article class="news-box">
                        <a class="news-box__thumbnail" href="#">
                            <img src="./assets/images/elden-ring.jpg" alt="news thumbnail">
                        </a>
                        <div class="news-box__detail">
                            <a class="news-box__title" href="#">
                                <h4>
                                    Elden Ring chính thức vượt mặt Dying Light 2 và God of War, trở thành tựa game được yêu thích nhiều nhất trên Steam
                                </h4>
                            </a>
                            <p class="news-box__date">
                                21/08/2021
                            </p>
                            <p class="news-box__desc">
                                Elden Ring còn được coi là hậu duệ của dòng game nổi tiếng Dark Souls.
                            </p>
                        </div>
                    </article>
                </section>
            </article>
            <article class="content-container">
                <h2 class="content-title">
                    Feedback
                </h2>
                <section class="content-box">
                    <article class="feedback-box">
                        <div class="feedback-box__thumbnail">
                            <p>’’</p>
                        </div>
                        <div class="feedback-box__detail">
                            <h4 class="feedback-box__desc">
                               “Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.”
                            </h4>
                            <hr>
                            <p class="feedback-box__author">
                                Dr.Strange
                            </p>
                        </div>
                    </article>
                    <article class="feedback-box">
                        <div class="feedback-box__thumbnail">
                            <p>’’</p>
                        </div>
                        <div class="feedback-box__detail">
                            <h4 class="feedback-box__desc">
                               “Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.”
                            </h4>
                            <hr>
                            <p class="feedback-box__author">
                                Dr.Strange
                            </p>
                        </div>
                    </article>
                    <article class="feedback-box">
                        <div class="feedback-box__thumbnail">
                            <p>’’</p>
                        </div>
                        <div class="feedback-box__detail">
                            <h4 class="feedback-box__desc">
                               “Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.”
                            </h4>
                            <hr>
                            <p class="feedback-box__author">
                                Dr.Strange
                            </p>
                        </div>
                    </article>
                </section>
            </article>
        </section>
        <?php include('.\footer.php') ?>
    </main>
    <!-- Slick JS -->
    <script type="text/javascript" src="//cdn.jsdelivr.net/npm/slick-carousel@1.8.1/slick/slick.min.js"></script>
    <script src="./assets/js/slick.js"></script>
    <script>
        // $('.main-navbar') 
        jQuery(window).on('scroll', () => {
            if(jQuery(window).scrollTop() > 10) {
                jQuery('header').css({
                    backgroundColor : "rgba(86, 128, 233, .9)",
                    transition: '.5s',
                });
            } else jQuery('header').css('background-color', "transparent");
        });

        const searchBtn = $('#search-modal-open');
        const searchCloseBtn = $('#search-modal-close');
        const cartBtn = $('#cart-modal-open');
        const cartCloseBtn = $('#cart-modal-close');
        
        searchBtn.click(() => {
            $('#search-box').css({
                visibility: 'visible',
            })
            $('#search-box').children().css({
                animationName: 'slide-down',
                animationDuration: '.5s',
            })
        })
        searchCloseBtn.click(() => {
            $('#search-box').children().css({
                animationName: 'slide-up',
                animationDuration: '.5s',
            })
            $('#search-box').css({
                visibility: 'hidden',
            })
        })
        cartBtn.click(() => {
            $('#cart-modal').css({
                visibility: 'visible',
            })
            $('#cart-modal').children().css({
                animationName: 'slide-to-left',
                animationDuration: '.5s',
            })
        })
        cartCloseBtn.click(() => {
            $('#cart-modal').children().css({
                animationName: 'slide-to-right',
                animationDuration: '.5s',
            })
            $('#cart-modal').css({
                visibility: 'hidden',
            })
        })
        jQuery(window).click((e) => {
            if(e.target == $('#search-box')[0]) {
                $('#search-box').children().css({
                    animationName: 'slide-up',
                    animationDuration: '.5s',
                })
                $('#search-box').css({
                    visibility: 'hidden',
                })
            }
            if(e.target == $('#cart-modal')[0]) {
                $('#cart-modal').children().css({
                    animationName: 'slide-to-right',
                    animationDuration: '.5s',
                })
                $('#cart-modal').css({
                    visibility: 'hidden',
                })
            }
        })
        $('.product-box__quantity form input').hover(() => {
            $('.product-box__quantity form').css({
                borderColor: 'blue',
            })
        }, () => {
            $('.product-box__quantity form').css({
                borderColor: 'transparent',
            })
        })
    </script>
</body>
</html>