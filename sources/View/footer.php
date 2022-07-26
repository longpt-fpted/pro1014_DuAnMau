
        <footer class="main-footer">
            <article class="follow-section">
                <p>Theo dõi chúng tôi tại: </p>
                <a href="https://www.facebook.com/Pakage-Store-100342635784351/" target="_blank">
                    <i class="fab fa-facebook"></i>
                </a>
                <a href="#">
                    <i class="fab fa-instagram"></i>
                </a>
                <a href="#">
                    <i class="fab fa-twitter"></i>
                </a>
            </article>
            <hr>
            <section class="footer-container">
                <article class="footer-box">
                    <article class="logo">
                        <img src="./assets/images/logo1.png" alt="logo">
                        <div class="logo--txt">
                            <p>Demon</p>
                            <p>Stone</p>
                        </div>
                    </article>
                    <div class="footer-desc">
                        <p id="website-address">
                            381 Dien Bien Phu Str, Ward 25, <br>Binh Thanh Disctrict, HCM
                        </p>
                        <p id="website-hotline">
                            Hotline: (+84) 373 118 242 (8:00 - 20:00)
                        </p>
                        <p id="website-email">
                            Email: contact@pakage-store.com
                        </p>
                    </div>
                </article>
                <article class="footer-box">
                    <h2 class="footer-title">
                        Tổng quát
                    </h2>
                    <div class="footer-desc">
                        <a href="#" class="footer-detail">
                            Giới thiệu Pakage Store
                        </a>
                        <a href="#" class="footer-detail">
                            Điều khoản dịch vụ
                        </a>
                        <a href="#" class="footer-detail">
                            Chính sách bảo mật
                        </a>
                        <a href="#" class="footer-detail">
                            Chính sách bảo hàng
                        </a>
                    </div>
                </article>
                <article class="footer-box">
                    <h2 class="footer-title">
                        Tài khoản
                    </h2>
                    <div class="footer-desc">
                        <a href="./register.php" class="footer-detail">
                            Đăng ký
                        </a>
                        <a href="./login.php" class="footer-detail">
                            Đăng nhập
                        </a>
                        <a href="./cart.php" class="footer-detail">
                            Giỏ hàng
                        </a>
                        <a href="./user.php" class="footer-detail">
                            Thông tin tài khoản
                        </a>
                    </div>
                </article>
                <article class="footer-box fb-page">
                    <div class="fb-page" data-href="https://www.facebook.com/Pakage-Store-100342635784351/" data-tabs="" data-width="" data-height="" data-small-header="false" data-adapt-container-width="false" data-hide-cover="false" data-show-facepile="true">
                        <blockquote cite="https://www.facebook.com/Pakage-Store-100342635784351/" class="fb-xfbml-parse-ignore"><a href="https://www.facebook.com/Pakage-Store-100342635784351/">Pakage Store</a></blockquote>
                    </div>
                </article>
            </section>
        </footer>
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
        displayCart();
    </script>
    <script src="./assets/js/validatecontact.js"></script>
    <script src="./assets/js/validateregister.js"></script>
</body>
</html>