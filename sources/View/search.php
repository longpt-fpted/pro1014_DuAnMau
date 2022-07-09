<?php 
    include('./header.php') 
?>
<section class="main-content">
    <div class="main-search">
        <h1>Tìm kiếm sản phẩm</h1><br>
        <div class="product-filter">
            <div class="information-filter">
                <h>Thể loại</h><br>
                <select name="category" id="category">
                    <option value="Tất cả">Tất cả</option>
                    <option value="Action">Action</option>
                    <option value="FPS">FPS</option>
                    <option value="Video Production">Video Production</option>
                    <option value="Simulation">Simulation</option>
                    <option value="Sport">Sport</option>
                    <option value="Anthem">Anthem</option>
                    <option value="Origin">Origin</option>
                    <option value="Acc Game">Acc Game</option>
                    <option value="3D">3D</option>
                    <option value="Ubisoft">Ubisoft</option>
                    <option value="RPG">RPG</option>
                </select>
            </div>
            <div class="information-filter">
                <h>Mức giá</h><br>
                <input id="" type="number" step="10000" min="0" placeholder="Từ">
                <h>-</h>
                <input id="" type="number" step="10000" min="0" placeholder="Đến">
            </div>
            <div class="information-filter">
                <h>Sắp xếp</h><br>
                <select name="sort" id="sort">
                    <option value="Mặc định">Mặc định</option>
                    <option value="Mới cập nhật">Mới cập nhật</option>
                    <option value="Bán chạy nhất">Bán chạy nhất</option>
                    <option value="Giá thấp đến cao">Giá thấp đến cao</option>
                    <option value="Giá cao đến thấp">Giá cao đến thấp</option>
                    <option value="Từ A - Z">Từ A - Z</option>
                    <option value="Từ Z - A">Từ Z - A</option>
                </select>
            </div>
            <button id="btn-filter">Lọc</button><br>
        </div>
        <button id="btn-restore"><i>Khôi phục bộ lọc</i></button>
    </div>
    <article class="content-container">
        <section class="content-box">
            <?php 
                $productsOnSales = $productDAO->getSaleProductsWithLimit(4);
                foreach ($productsOnSales as $productOnSales) {
            ?>
                <article class="product-box">
                    <a class="product-box__thumbnail" href="./product.php?id=<?php echo $productOnSales->getID(); ?>">
                        <img src="./assets/images/elden-ring.jpg" alt="product thumbnail">
                    </a>
                    <div class="product-box__detail">
                        <div class="product-box__desc">
                            <div class="product-box__title">
                                <a href="./product.php?id=<?php echo $productOnSales->getID(); ?>"><?php echo $productOnSales->getName();?></a>
                                <div class="tag sale-tag">
                                    -<?php echo $productOnSales->getSale(); ?>%
                                </div>
                            </div>
                            <div class="product-box__price">
                                <p class="product-box__totalprice">
                                    <?php echo $productOnSales->getTotalPrice(); ?></p>
                                <p class="product-box__fullprice">
                                <?php echo $productOnSales->getPrice(); ?></p>
                            </div>
                        </div>
                        <a class="product-box__add" href="#">
                            <i class="fal fa-cart-arrow-down"></i>
                        </a>
                    </div>
                </article>
            <?php
                }
            ?>
        </section>
        <a class="content-detail" href="#">
            Xem thêm
        </a>
    </article>
</section>
<?php 
    include('./footer.php') 
?>
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