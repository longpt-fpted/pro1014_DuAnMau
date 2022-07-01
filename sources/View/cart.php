        <?php include('./header.php') ?>
        <section class="main-content">
            <section class="content-container">
                <section class="content-box">
                    <section class="cart-container">
                        <section class="cart-wrapper">
                                <div class="cart-wrapper__head">
                                    Giỏ hàng
                                </div>
                                <div class="cart-wrapper__body">
                                    <div class="row">
                                        <div class="col">
                                            {{ 0 }} Sản phẩm
                                        </div>
                                        <div class="col">
                                            Đơn giá
                                        </div>
                                        <div class="col">
                                            Số lượng
                                        </div>
                                        <div class="col">
                                            Thành tiền
                                        </div>
                                        <div class="col">
                                            <i class="fal fa-trash"></i>
                                        </div>
                                    </div>
                                    <div class="cart-detail">
                                        <div class="row">
                                            <div class="col">
                                                <div class="product-thumbnail">
                                                    <img src="./assets/images/elden-ring.jpg" alt="Elden-ring">
                                                    <a href="#" class="product-title">
                                                        Elden Ring
                                                    </a>
                                                </div>
                                            </div>
                                            <div class="col">
                                                <div class="product-price">
                                                    <div class="price">790.000</div>
                                                    <div class="fullprice">
                                                        800.000đ
                                                        <span class="sale-tag">
                                                            -10%
                                                        </span>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col">
                                                <div class="product-quantity">
                                                    <button type="button" name="minus" id="minus">
                                                        <i class="fal fa-minus"></i>
                                                    </button>
                                                    <input type="number" name="product-quantity" value="1">
                                                    <button type="button" name="plus" id="plus">
                                                        <i class="fal fa-plus"></i>
                                                    </button>
                                                </div>
                                            </div>
                                            <div class="col">
                                                <div class="product-totalprice">100.000.000</div>
                                            </div>
                                            <div class="col">
                                                <div class="product-remove">
                                                    <a href="#"">
                                                        <i class="fal fa-trash"></i>
                                                    </a>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </article>
                        </section>
                        <section class="cart-desc">
                            <div class="cart-desc__head">
                                Thông tin thanh toán
                            </div>
                            <div class="cart-desc__body">
                                <div class="cart-desc--money">
                                    <p>Tổng cộng</p>
                                    <p>100.000.000</p>
                                </div>
                                <div class="cart-desc__body__coupons">
                                    <div class="coupon">
                                        <div class="coupon-thumnail">
                                            <img src="./assets/images/logo.png" alt="coupon">
                                        </div>
                                        <div class="coupon-detail">
                                            <p class="coupon-title">
                                                Giảm {{ 50% }}
                                            </p>
                                        </div>
                                        <button class="coupon-method">
                                            USE
                                        </button>
                                    </div>
                                    <div class="coupon">
                                        <div class="coupon-thumnail">
                                            <img src="./assets/images/logo.png" alt="coupon">
                                        </div>
                                        <div class="coupon-detail">
                                            <p class="coupon-title">
                                                Giảm {{ 50% }}
                                            </p>
                                        </div>
                                        <button class="coupon-method">
                                            USE
                                        </button>
                                    </div>
                                </div>
                            </div>
                            <div class="cart-desc__foot">
                                <div class="money">
                                    <div class="cart-desc--money">
                                        <p>Số tiền trong tài khoản</p>
                                        <p>100.000.000</p>
                                    </div>
                                    <div class="cart-desc--money">
                                        <p>Số tiền còn thiếu</p>
                                        <p>100.000.000</p>
                                    </div>
                                    <div class="cart-desc--money">
                                        <p>Tổng giảm</p>
                                        <p>100.000.000</p>
                                    </div>
                                    </div>
                                    <div class="cart-desc--money">
                                        <p>Tổng cộng</p>
                                        <p>100.000.000</p>
                                    </div>
                                </div>
                                <button class="checkout">
                                    Thanh toán
                                </button>
                            </div>          
                        </section>
                    </section>
                </section>
            </section>
        </section>
        <?php include('./footer.php') ?>
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