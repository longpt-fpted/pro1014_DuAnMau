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
    <link rel="stylesheet" type="text/css" href="//cdn.jsdelivr.net/npm/slick-carousel@1.8.1/slick/slick.css" />
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
        <section class="main-content">
            <section class="content-container">
                <section class="content-box">
                    <section class="main-product-box">
                        <article class="main-product__thumbnail">
                            <img src="./assets/images/elden-ring.jpg" alt="Thumbnail">
                        </article>
                        <article class="main-product__detail">
                            <h2 class="main-product__detail-title">
                                Elden Ring
                            </h2>
                            <div class="main-product__detail-rating">
                                <div class="back-stars">
                                    <i class="fal fa-star" aria-hidden="true"></i>
                                    <i class="fal fa-star" aria-hidden="true"></i>
                                    <i class="fal fa-star" aria-hidden="true"></i>
                                    <i class="fal fa-star" aria-hidden="true"></i>
                                    <i class="fal fa-star" aria-hidden="true"></i>
                                    <div class="front-stars" id="rating">
                                        <i class="fa fa-star" aria-hidden="true"></i>
                                        <i class="fa fa-star" aria-hidden="true"></i>
                                        <i class="fa fa-star" aria-hidden="true"></i>
                                        <i class="fa fa-star" aria-hidden="true"></i>
                                        <i class="fa fa-star" aria-hidden="true"></i>
                                    </div>
                                </div>
                            </div>
                            <p class="main-product__detail-cate">
                                <i class="fal fa-tag"></i> Thể loại: Hành động, Hành xác
                            </p>
                            <p class="main-product__detail-price">
                                <span class="price">790000</span>
                                <span class="addons">
                                    <a href="#">
                                        <i class="fal fa-heart"></i>
                                    </a>
                                </span>
                            </p>
                            <p class="main-product__detail-price">
                                <span class="sale">
                                    800000</span>
                                <span class="addons sale-tag">
                                    -10%
                                </span>
                            </p>
                            <article class="main-product__detail-footer">
                                <a href="#" class="btn buy">
                                    <i class="fal fa-credit-card-front"></i> Mua ngay
                                </a>
                                <a href="#" class="btn add">
                                    <i class="fal fa-cart-arrow-down"></i> Thêm vào giỏ hàng
                                </a>
                            </article>
                        </article>
                    </section>
                </section>
            </section>
            <section class="content-container">
                    <div class="content-title">
                        Đánh giá sản phẩm
                    </div>
                    <section class="content-box">
                    <section class="content-box">
                        <article class="comment-box">
                            <div class="comment-box-main">
                                <div class="comment-user-avatar">
                                    <img src="./assets/images/man.png" alt="">
                                </div>
                                <div class="comment-detail">
                                    <h2 class="comment-detail__name">
                                        Long T. Pham
                                    </h2>
                                    <div class="comment-detail__date">
                                        Đánh giá vào ngày: 21/08/2021
                                    </div>
                                    <div class="comment-detail__rating">
                                        <div class="back-stars">
                                            <i class="fal fa-star" aria-hidden="true"></i>
                                            <i class="fal fa-star" aria-hidden="true"></i>
                                            <i class="fal fa-star" aria-hidden="true"></i>
                                            <i class="fal fa-star" aria-hidden="true"></i>
                                            <i class="fal fa-star" aria-hidden="true"></i>
        
                                            <div class="front-stars" style="width: 70%;">
                                                <i class="fa fa-star" aria-hidden="true"></i>
                                                <i class="fa fa-star" aria-hidden="true"></i>
                                                <i class="fa fa-star" aria-hidden="true"></i>
                                                <i class="fa fa-star" aria-hidden="true"></i>
                                                <i class="fa fa-star" aria-hidden="true"></i>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="comment-detail__ask">
                                        &emsp;&emsp;&emsp;&emsp;Lorem ipsum dolor sit amet consectetur adipisicing elit. Provident vitae itaque, tempore sed ratione asperiores mollitia porro magni perspiciatis, atque architecto id ipsum hic eum cupiditate aut ullam rem dolores!
                                    </div>
                                </div>
                            </div>
                            <div class="comment-box-main">
                                <div class="comment-user-avatar">
                                    <img src="./assets/images/man.png" alt="">
                                </div>
                                <div class="comment-detail">
                                    <h2 class="comment-detail__name">
                                        Long T. Pham
                                    </h2>
                                    <div class="comment-detail__date">
                                        Đánh giá vào ngày: 21/08/2021
                                    </div>
                                    <div class="comment-detail__rating">
                                        <div class="back-stars">
                                            <i class="fal fa-star" aria-hidden="true"></i>
                                            <i class="fal fa-star" aria-hidden="true"></i>
                                            <i class="fal fa-star" aria-hidden="true"></i>
                                            <i class="fal fa-star" aria-hidden="true"></i>
                                            <i class="fal fa-star" aria-hidden="true"></i>
        
                                            <div class="front-stars" style="width: 70%;">
                                                <i class="fa fa-star" aria-hidden="true"></i>
                                                <i class="fa fa-star" aria-hidden="true"></i>
                                                <i class="fa fa-star" aria-hidden="true"></i>
                                                <i class="fa fa-star" aria-hidden="true"></i>
                                                <i class="fa fa-star" aria-hidden="true"></i>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="comment-detail__ask">
                                        &emsp;&emsp;&emsp;&emsp;Lorem ipsum dolor sit amet consectetur adipisicing elit. Provident vitae itaque, tempore sed ratione asperiores mollitia porro magni perspiciatis, atque architecto id ipsum hic eum cupiditate aut ullam rem dolores!
                                    </div>
                                </div>
                            </div>
                            <div class="comment-box-main">
                                <div class="comment-user-avatar">
                                    <img src="./assets/images/man.png" alt="">
                                </div>
                                <div class="comment-detail">
                                    <h2 class="comment-detail__name">
                                        Long T. Pham
                                    </h2>
                                    <div class="comment-detail__date">
                                        Đánh giá vào ngày: 21/08/2021
                                    </div>
                                    <div class="comment-detail__rating">
                                        <div class="back-stars">
                                            <i class="fal fa-star" aria-hidden="true"></i>
                                            <i class="fal fa-star" aria-hidden="true"></i>
                                            <i class="fal fa-star" aria-hidden="true"></i>
                                            <i class="fal fa-star" aria-hidden="true"></i>
                                            <i class="fal fa-star" aria-hidden="true"></i>
        
                                            <div class="front-stars" style="width: 70%;">
                                                <i class="fa fa-star" aria-hidden="true"></i>
                                                <i class="fa fa-star" aria-hidden="true"></i>
                                                <i class="fa fa-star" aria-hidden="true"></i>
                                                <i class="fa fa-star" aria-hidden="true"></i>
                                                <i class="fa fa-star" aria-hidden="true"></i>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="comment-detail__ask">
                                        &emsp;&emsp;&emsp;&emsp;Lorem ipsum dolor sit amet consectetur adipisicing elit. Provident vitae itaque, tempore sed ratione asperiores mollitia porro magni perspiciatis, atque architecto id ipsum hic eum cupiditate aut ullam rem dolores!
                                    </div>
                                </div>
                            </div>
                        </article>
                    </section>
                </section>
            </section>

            <section class="content-container">
                <div class="content-title">
                    Hỏi đáp về sản phẩm
                </div>
                <section class="content-box">
                    <section class="input-comment-box">
                        <h3 class="input-comment-box-title">
                            Gửi bình luận
                        </h3>
                        <form action="">
                            <textarea name="comment-input" id="comment-input" class="comment-input" required placeholder="Nhập nội dung bình luận"></textarea>
                            <button class="comment-submit" name="comment-submit" type="button">
                                <i class="fal fa-paper-plane"></i>
                                Gửi bình luận
                            </button>
                        </form>
                    </section>
                </section>
                <section class="content-box">
                    <article class="comment-box">
                        <div class="comment-box-main">
                            <div class="comment-user-avatar">
                                <img src="./assets/images/man.png" alt="">
                            </div>
                            <div class="comment-detail">
                                <h2 class="comment-detail__name">
                                    Long T. Pham
                                </h2>
                                <div class="comment-detail__date">
                                    Bình luận vào ngày: 21/08/2021
                                </div>
                                <div class="comment-detail__ask">
                                    &emsp;&emsp;&emsp;&emsp;Lorem ipsum dolor sit amet consectetur adipisicing elit. Provident vitae itaque, tempore sed ratione asperiores mollitia porro magni perspiciatis, atque architecto id ipsum hic eum cupiditate aut ullam rem dolores!
                                </div>
                                <button class="comment-detai__answer-btn">
                                    Trả lời
                                </button>
                            </div>
                        </div>
                        <div class="comment-box-replies">

                            <article class="comment-box">
                                <div class="comment-box-main">
                                    <div class="comment-user-avatar">
                                        <img src="./assets/images/man.png" alt="">
                                    </div>
                                    <div class="comment-detail">
                                        <h2 class="comment-detail__name">
                                            Long T. Pham
                                        </h2>
                                        <div class="comment-detail__date">
                                            Bình luận vào ngày: 21/08/2021
                                        </div>
                                        <div class="comment-detail__ask">
                                            &emsp;&emsp;&emsp;&emsp;Lorem ipsum dolor sit amet consectetur adipisicing elit. Provident vitae itaque, tempore sed ratione asperiores mollitia porro magni perspiciatis, atque architecto id ipsum hic eum cupiditate aut ullam rem dolores!
                                        </div>
                                        <button class="comment-detai__answer-btn">
                                            Trả lời
                                        </button>
                                    </div>
                                </div>
                                <div class="comment-box-replies">
                                </div>
                            </article>

                            <article class="comment-box">
                                <div class="comment-box-main">
                                    <div class="comment-user-avatar">
                                        <img src="./assets/images/man.png" alt="">
                                    </div>
                                    <div class="comment-detail">
                                        <h2 class="comment-detail__name">
                                            Long T. Pham
                                        </h2>
                                        <div class="comment-detail__date">
                                            Bình luận vào ngày: 21/08/2021
                                        </div>
                                        <div class="comment-detail__ask">
                                            &emsp;&emsp;&emsp;&emsp;Lorem ipsum dolor sit amet consectetur adipisicing elit. Provident vitae itaque, tempore sed ratione asperiores mollitia porro magni perspiciatis, atque architecto id ipsum hic eum cupiditate aut ullam rem dolores!
                                        </div>
                                        <button class="comment-detai__answer-btn">
                                            Trả lời
                                        </button>
                                    </div>
                                </div>
                                <div class="comment-box-replies">
                                </div>
                            </article>
                        </div>
                    </article>
                </section>
            </section>
        <?php include('.\footer.php') ?>
    </main>
    <!-- Slick JS -->
    <script type="text/javascript" src="//cdn.jsdelivr.net/npm/slick-carousel@1.8.1/slick/slick.min.js"></script>
    <script src="./assets/js/slick.js"></script>
    <script>
        // $('.main-navbar') 
        jQuery(window).on('scroll', () => {
            if (jQuery(window).scrollTop() > 10) {
                jQuery('header').css({
                    backgroundColor: "rgba(86, 128, 233, .9)",
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
            if (e.target == $('#search-box')[0]) {
                $('#search-box').children().css({
                    animationName: 'slide-up',
                    animationDuration: '.5s',
                })
                $('#search-box').css({
                    visibility: 'hidden',
                })
            }
            if (e.target == $('#cart-modal')[0]) {
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