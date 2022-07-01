        <?php include('./header.php') ?>
        <section class="main-content">
            <article class="content-container">
                <h2 class="content-title">
                    đăng nhập
                </h2>
                <section class="content-box">
                    <form action="" method="post" class="account-box">
                        <div class="input-box">
                            <label for="username">Tên tài khoản:</label>
                            <input type="text" name="username" id="username" placeholder="Tên tài khoản" required>
                        </div>
                        <div class="input-box">
                            <label for="password">Mật khẩu:</label>
                            <input type="text" name="password" id="password" placeholder="Mật khẩu" required>
                        </div>
                        <div class="input-box">
                            <input type="submit" name="submit" id="submit" value="Đăng nhập">
                        </div>
                    </form>
                </section>
            </article>
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