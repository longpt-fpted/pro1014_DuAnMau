<?php
    include('./header.php');

    $id = isset($_GET['id']) ? $_GET['id'] : 'error';

    
    if($id !== 'error') {
        $product = $productDAO->getProductByID($id);
        $productCate = $cateDAO->getCategoryByID($product->getCateID())->getName();
    } else {
        $id = 1;
        $product = $productDAO->getProductByID($id);
        $productCate = $cateDAO->getCategoryByID($product->getCateID())->getName();
    }

?>
        <section class="main-content">
            <section class="content-container">
                <section class="content-box">
                    <section class="main-product-box">
                        <article class="main-product__thumbnail">
                            <img src="./assets/images/elden-ring.jpg" alt="Thumbnail">
                        </article>
                        <article class="main-product__detail">
                            <h2 class="main-product__detail-title">
                                <?php echo $product->getName(); ?>
                            </h2>
                            <div class="main-product__detail-rating">
                                <div class="back-stars">
                                    <i class="fal fa-star" aria-hidden="true"></i>
                                    <i class="fal fa-star" aria-hidden="true"></i>
                                    <i class="fal fa-star" aria-hidden="true"></i>
                                    <i class="fal fa-star" aria-hidden="true"></i>
                                    <i class="fal fa-star" aria-hidden="true"></i>
                                    <div class="front-stars" id="rating" style="width: <?php echo $product->getRating(); ?>%;">
                                        <i class="fa fa-star" aria-hidden="true"></i>
                                        <i class="fa fa-star" aria-hidden="true"></i>
                                        <i class="fa fa-star" aria-hidden="true"></i>
                                        <i class="fa fa-star" aria-hidden="true"></i>
                                        <i class="fa fa-star" aria-hidden="true"></i>
                                    </div>
                                </div>
                            </div>
                            <p class="main-product__detail-cate">
                                <i class="fal fa-tag"></i> Thể loại: <?php echo $productCate; ?>
                            </p>
                            <p class="main-product__detail-price">
                                <span class="price"><?php echo $product->getTotalPrice(); ?></span>
                                <span class="addons">
                                    <a href="#">
                                        <i class="fal fa-heart"></i>
                                    </a>
                                </span>
                            </p>
                            <p class="main-product__detail-price">
                                <span class="sale"><?php echo $product->getPrice(); ?></span>
                                <span class="addons sale-tag">
                                    -<?php echo $product->getSale(); ?>%
                                </span>
                            </p>
                            <article class="main-product__detail-footer">
                                <button class="btn buy">
                                    <i class="fal fa-credit-card-front"></i> Mua ngay
                                </button>
                                <button class="btn add" onclick="addProductToCart(<? echo $product->getID(); ?>)">
                                    <i class="fal fa-cart-arrow-down"></i> Thêm vào giỏ hàng
                                </button>
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
        <?php include('./footer.php') ?>