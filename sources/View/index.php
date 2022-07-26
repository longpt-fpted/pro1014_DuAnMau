    <?php include('./header.php') ?>
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
                <section class="content-box" style="flex-wrap: wrap;">

                    <?php 
                        $productsOnSales = $productDAO->getSaleProductsWithLimit(12);
                        foreach ($productsOnSales as $productOnSales) {
                    ?>
                        <article class="product-box">
                            <a class="product-box__thumbnail" href="./product.php?id=<?php echo $productOnSales->getID(); ?>">
                                <img src="<?php echo $productOnSales->getImg() ?>" alt="product thumbnail">
                            </a>
                            <div class="product-box__detail">
                                <div class="product-box__desc">
                                    <div class="product-box__title">
                                        <a href="./product.php?id=<?php echo $productOnSales->getID(); ?>"><?php  echo $productOnSales->getName();?></a>
                                        <div class="tag sale-tag">
                                            -<?php  echo $productOnSales->getSale(); ?>%
                                        </div>
                                    </div>
                                    <div class="product-box__price">
                                        <p class="product-box__totalprice">
                                            <?php  echo $productOnSales->getTotalPrice(); ?></p>
                                        <p class="product-box__fullprice">
                                        <?php  echo $productOnSales->getPrice(); ?></p>
                                    </div>
                                </div>
                                <a class="product-box__add" onclick="addProductToCart(<?php echo $productOnSales->getID()?>)">
                                    <i class="fal fa-cart-arrow-down"></i>
                                </a>
                            </div>
                        </article>
                    <?php 
                        }
                    ?>
                </section>
                <a class="content-detail" href="search.php">
                    Xem thêm
                </a>
            </article>
            <article class="content-container">
                <h2 class="content-title">
                    Sản phẩm nổi bật
                </h2>
                <section class="content-box" style="flex-wrap: wrap;">
                <?php 
                        $hotProducts = $productDAO->getHotProducts(8);
                        foreach ($hotProducts as $hotProduct) {
                ?>
                    <article class="product-box">
                        <a class="product-box__thumbnail" href="./product.php?id=<?php echo $hotProduct->getID(); ?>">
                            <img src="<?php  echo $hotProduct->getImg() ?>" alt="product thumbnail">
                        </a>
                        <div class="product-box__detail">
                            <div class="product-box__desc">
                                <div class="product-box__title">
                                    <a title="<?php echo $hotProduct->getName();?>" href="./product.php?id=<?php echo $hotProduct->getID(); ?>"><?php  echo $hotProduct->getName();?></a>
                                    <?php  if ($hotProduct->getSale() > 0) :  ?>
                                    <div class="tag sale-tag">
                                        -<?php  echo $utils->formatMoney($hotProduct->getSale()); ?>%
                                    </div>
                                    <?php  endif; ?>
                                </div>
                                <div class="product-box__price">
                                <?php  if ($hotProduct->getSale() > 0) :  ?>
                                    <p class="product-box__totalprice">
                                        <?php  echo $utils->formatMoney($hotProduct->getTotalPrice()); ?></p>
                                    <p class="product-box__fullprice">
                                    <?php  echo $utils->formatMoney($hotProduct->getPrice()); ?></p>
                                <?php  else: ?>
                                    <p class="product-box__totalprice">
                                        <?php  echo $utils->formatMoney($hotProduct->getTotalPrice()); ?></p>
                                <?php  endif; ?>
                                </div>
                            </div>
                            <a class="product-box__add" onclick="addProductToCart(<?php  echo $hotProduct->getID(); ?>)">
                                <i class="fal fa-cart-arrow-down"></i>
                            </a>
                        </div>
                    </article>
                <?php 
                    }
                ?>
                </section>
                <a class="content-detail" href="search.php">
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
                    <form action="http://localhost/pro1014_duan/sources/controller/AddContactForNotification.php" method="post">
                        <p class="contact-desc">
                            Chúng tôi sẽ gửi email cho bạn mỗi khi có thông tin mới nếu bạn đăng ký dịch vụ này!
                        </p>
                        <input type="text" name="fullname" id="fullname" placeholder="Họ và tên">
                        <input type="text" name="email" id="email" placeholder="Email">
                        <input type="text" name="type" id="type" value="0" hidden>

                        <button name="submit">
                            Tham gia ngay!
                        </button>
                    </form>
                </article>
            </article>
            <article class="content-container">
                <h2 class="content-title">
                    Mới ra mắt
                </h2>
                <section class="content-box" style="flex-wrap: wrap;">
                <?php 
                        $newProducts = $productDAO->getNewProducts(16);
                        foreach ($newProducts as $newProduct) {
                ?>
                    <article class="product-box">
                        <a class="product-box__thumbnail" href="./product.php?id=<?php echo $newProduct->getID(); ?>">
                            <img src="<?php  echo $newProduct->getImg() ?>" alt="product thumbnail">
                        </a>
                        <div class="product-box__detail">
                            <div class="product-box__desc">
                                <div class="product-box__title">
                                    <a title="<?php  echo $newProduct->getName();?>" href="./product.php?id=<?php echo $newProduct->getID(); ?>"><?php  echo $newProduct->getName();?></a>
                                    <?php  if ($newProduct->getSale() > 0) :  ?>
                                    <div class="tag sale-tag">
                                        -<?php  echo $utils->formatMoney($newProduct->getSale()); ?>%
                                    </div>
                                    <?php  endif; ?>
                                </div>
                                <div class="product-box__price">
                                <?php  if ($newProduct->getSale() > 0) :  ?>
                                    <p class="product-box__totalprice">
                                        <?php  echo $utils->formatMoney($newProduct->getTotalPrice()); ?></p>
                                    <p class="product-box__fullprice">
                                    <?php  echo $utils->formatMoney($newProduct->getPrice()); ?></p>
                                <?php  else: ?>
                                    <p class="product-box__totalprice">
                                        <?php  echo $utils->formatMoney($newProduct->getTotalPrice()); ?></p>
                                <?php  endif; ?>
                                </div>
                            </div>
                            <a class="product-box__add" onclick="addProductToCart(<?php  echo $newProduct->getID(); ?>)">
                                <i class="fal fa-cart-arrow-down"></i>
                            </a>
                        </div>
                    </article>
                <?php 
                    }
                ?>
                </section>
                <a class="content-detail" href="search.php">
                    Xem thêm
                </a>
            </article>
            <article class="content-container">
                <h2 class="content-title">
                    Nhà tài trợ
                </h2>
                <section class="content-box" style="flex-wrap: nowrap;">
                    <article class="feedback-box">
                        <div class="feedback-box__thumbnail">
                            <img src="./assets/images/steam.png" alt="">
                        </div>
                        <div class="feedback-box__detail">
                            <h4 class="feedback-box__desc">
                               “Chúng tôi đã hợp tác với Demon Stone Team được 2 năm và chúng tôi rất vinh dự khi đánh giá rằng đây là 1 trong những trang web chuyên về Game úy tín nhất mà chúng tôi từng hợp tác.”
                            </h4>
                            <hr>
                            <p class="feedback-box__author">
                                - Steam -
                            </p>
                        </div>
                    </article>
                    <article class="feedback-box">
                        <div class="feedback-box__thumbnail">
                            <img src="./assets/images/riot.png" alt="">
                        </div>
                        <div class="feedback-box__detail">
                            <h4 class="feedback-box__desc">
                               “Thật sự mà nói, những bạn trẻ trong đội ngũ Demon Stone Team thật sự rất nhiệt huyết trong lĩnh vực mà họ đã chọn. Thật là 1 sự vinh hạnh cho chúng tôi khi có được cơ hội làm việc cùng các bạn.”
                            </h4>
                            <hr>
                            <p class="feedback-box__author">
                               - Riot Games -
                            </p>
                        </div>
                    </article>
                    <article class="feedback-box">
                        <div class="feedback-box__thumbnail">
                            <img src="./assets/images/tencent.png" alt="">
                        </div>
                        <div class="feedback-box__detail">
                            <h4 class="feedback-box__desc">
                               “Tài năng, nhiệt huyết, chịu khó,... là những gì mà Demon Stone Team có được, thạm chí là hơn cả thế. Chúc các bạn ngày càng thành công trên con đường mình đã chọn.”
                            </h4>
                            <hr>
                            <p class="feedback-box__author">
                               - Tencent Games -
                            </p>
                        </div>
                    </article>
                </section>
            </article>
        </section>
        <?php include('./footer.php') ?>
