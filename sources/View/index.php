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
                    <? 
                        $productsOnSales = $productDAO->getSaleProductsWithLimit(12);
                        foreach ($productsOnSales as $productOnSales) {
                    ?>
                        <article class="product-box">
                            <a class="product-box__thumbnail" href="./product.php?id=<?echo $productOnSales->getID(); ?>">
                                <img src="<?echo $productOnSales->getImg() ?>" alt="product thumbnail">
                            </a>
                            <div class="product-box__detail">
                                <div class="product-box__desc">
                                    <div class="product-box__title">
                                        <a href="./product.php?id=<?echo $productOnSales->getID(); ?>"><? echo $productOnSales->getName();?></a>
                                        <div class="tag sale-tag">
                                            -<? echo $productOnSales->getSale(); ?>%
                                        </div>
                                    </div>
                                    <div class="product-box__price">
                                        <p class="product-box__totalprice">
                                            <? echo $productOnSales->getTotalPrice(); ?></p>
                                        <p class="product-box__fullprice">
                                        <? echo $productOnSales->getPrice(); ?></p>
                                    </div>
                                </div>
                                <a class="product-box__add" onclick="addProductToCart(<?echo $productOnSales->getID()?>)">
                                    <i class="fal fa-cart-arrow-down"></i>
                                </a>
                            </div>
                        </article>
                    <?
                        }
                    ?>
                </section>
                <a class="content-detail" href="#">
                    Xem thêm
                </a>
            </article>
            <article class="content-container">
                <h2 class="content-title">
                    Mới ra mắt
                </h2>
                <section class="content-box" style="flex-wrap: wrap;">
                <? 
                        $newProducts = $productDAO->getNewProducts(16);
                        foreach ($newProducts as $newProduct) {
                ?>
                    <article class="product-box">
                        <a class="product-box__thumbnail" href="./product.php?id=<?echo $newProduct->getID(); ?>">
                            <img src="<? echo $newProduct->getImg() ?>" alt="product thumbnail">
                        </a>
                        <div class="product-box__detail">
                            <div class="product-box__desc">
                                <div class="product-box__title">
                                    <a href="./product.php?id=<?echo $newProduct->getID(); ?>"><? echo $newProduct->getName();?></a>
                                    <div class="tag sale-tag">
                                        -<? echo $newProduct->getSale(); ?>%
                                    </div>
                                </div>
                                <div class="product-box__price">
                                    <p class="product-box__totalprice">
                                        <? echo $newProduct->getTotalPrice(); ?></p>
                                    <p class="product-box__fullprice">
                                    <? echo $newProduct->getPrice(); ?></p>
                                </div>
                            </div>
                            <a class="product-box__add" onclick="addProductToCart(<? echo $newProduct->getID(); ?>)">
                                <i class="fal fa-cart-arrow-down"></i>
                            </a>
                        </div>
                    </article>
                <?
                    }
                ?>
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
                <section class="content-box" style="flex-wrap: nowrap;">
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
        <?php include('./footer.php') ?>
