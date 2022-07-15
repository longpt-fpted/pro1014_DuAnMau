<?php 
    include('./header.php');
            $keyword = $_POST['search-input'];
            $productDAO = new ProductDAO();
            // var_dump($keyword);
            //$product = $productDAO->getAllProducts();
            if($keyword == ""){
                $product = $productDAO->getAllProducts();
            } else {
                $product = $productDAO->getProductsBySearch($keyword);
            }
            //var_dump($product);
?>
<section class="main-content">
    <form action="../Controller/SearchCateController.php" class="main-search" method="POST">
        <h1>Tìm kiếm sản phẩm</h1><br>
        <div class="product-filter">
            <div class="information-filter">
                <h>Thể loại</h><br>
                <select name="category" id="category">
                    <option value="Tất cả">Tất cả</option>
                    <? foreach($cates as $cate) {?>
                        <option value="<? echo $cate->getName(); ?>"><? echo $cate->getName(); ?></option>
                    <? } ?>
                </select>
            </div>
            <div class="information-filter">
                <h>Mức giá</h><br>
                <input id="min-price" default="0" name="min-price" type="number" step="10000" min="0" placeholder="Từ">
                <h>-</h>
                <input id="max-price" default="50000000" name="max-price" type="number" step="10000" min="0" placeholder="Đến">
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
            <button type="submit" id="btn-filter">Lọc</button><br>
    </form>
        <button id="btn-restore"><i>Khôi phục bộ lọc</i></button>
    </div>
    <article class="content-container">
        <section class="content-box" style="flex-wrap: wrap;">
            <?php 
                $productSearch = $product;
                foreach ($productSearch as $productSearch) {
            ?>
                <article class="product-box">
                    <a class="product-box__thumbnail" href="./product.php?id=<?php echo $productSearch->getID(); ?>">
                        <img src="<?php echo $productSearch->getImg(); ?>" alt="product thumbnail">
                    </a>
                    <div class="product-box__detail">
                        <div class="product-box__desc">
                            <div class="product-box__title">
                                <a title="<?php echo $productSearch->getName();?>" href="./product.php?id=<?php echo $productSearch->getID(); ?>"><?php echo $productSearch->getName();?></a>
                                <div class="tag sale-tag">
                                    -<?php echo $productSearch->getSale(); ?>%
                                </div>
                            </div>
                            <div class="product-box__price">
                                <p class="product-box__totalprice">
                                    <?php echo $productSearch->getTotalPrice(); ?></p>
                                <p class="product-box__fullprice">
                                <?php echo $productSearch->getPrice(); ?></p>
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
        <section class="content-box">
            <?php 
                /*$productCate = $productCate;
                foreach ($productCate as $productCate) {
            ?>
                <article class="product-box">
                    <a class="product-box__thumbnail" href="./product.php?id=<?php echo $productCate->getID(); ?>">
                        <img src="<?php echo $productCate->getImg(); ?>" alt="product thumbnail">
                    </a>
                    <div class="product-box__detail">
                        <div class="product-box__desc">
                            <div class="product-box__title">
                                <a href="./product.php?id=<?php echo $productCate->getID(); ?>"><?php echo $productCate->getName();?></a>
                                <div class="tag sale-tag">
                                    -<?php echo $productCate->getSale(); ?>%
                                </div>
                            </div>
                            <div class="product-box__price">
                                <p class="product-box__totalprice">
                                    <?php echo $productCate->getTotalPrice(); ?></p>
                                <p class="product-box__fullprice">
                                <?php echo $productCate->getPrice(); ?></p>
                            </div>
                        </div>
                        <a class="product-box__add" href="#">
                            <i class="fal fa-cart-arrow-down"></i>
                        </a>
                    </div>
                </article>
            <?php
                }
            */?>
        </section>
        <?php /*<a class="content-detail" href="#">
            Xem thêm
        </a> */?>
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