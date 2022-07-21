<?php
    include('./header.php');

    
    $id = isset($_GET['id']) ? $_GET['id'] : 'error';
    
    
    if($id !== 'error') {
        // $newestProduct = $productDAO->getNewestProduct($_GET['id']);
        $product = $productDAO->getProductByID($id);
        $productFeedbacks = $feedbackDAO->getAllFeedBacksForProduct($id) != 0 ? $feedbackDAO->getAllFeedBacksForProduct($id) : 'error';

        $productComments = $commentDAO->getAllCommentsForProduct($id) != 0 ? $commentDAO->getAllCommentsForProduct($id) : 'error';

        $product->setRating($productFeedbacks != null ? $feedbackDAO->getProductFeedbackRate($product->getID()) : $product->getRating());

        $productCate = $cateDAO->getCategoryByID($product->getCateID())->getName();
        $productDAO->updateProductView($product->getID());

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
                            <img src="<?php echo $product->getImg(); ?>" alt="Thumbnail">
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
                                    <a id="favorite" onclick="addToFavorite(<? echo isset($_SESSION['user']) ? $_SESSION['user'] : 'false' ?>, <? echo $product->getID(); ?>)">
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
                                <button class="btn add" onclick="addToFavorite(<? echo isset($_SESSION['user']) ? $_SESSION['user'] : 'false' ?>, <? echo $product->getID(); ?>)">
                                    <i class="fal fa-heart"></i> Thêm vào yêu thích
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
                        <article class="comment-box">
                            <!--  -->
                            <?
                                if($productFeedbacks != 'error'):
                                foreach($productFeedbacks as $productFeedback) {
                                    $userFeedback = $userDAO->getUserByID($productFeedback->getUserID());
                            ?>
                            <div class="comment-box-main">
                                <div class="comment-user-avatar">
                                    <img src="<? echo $userFeedback->getAvatar(); ?>" alt="user-avatar">
                                </div>
                                <div class="comment-detail">
                                    <h2 class="comment-detail__name">
                                        <? echo $userFeedback->getFullname(); ?>
                                    </h2>
                                    <div class="comment-detail__date">
                                        Đánh giá vào ngày: <? echo $productFeedback->getDate(); ?>
                                    </div>
                                    <div class="comment-detail__rating">
                                        <div class="back-stars">
                                            <i class="fal fa-star" aria-hidden="true"></i>
                                            <i class="fal fa-star" aria-hidden="true"></i>
                                            <i class="fal fa-star" aria-hidden="true"></i>
                                            <i class="fal fa-star" aria-hidden="true"></i>
                                            <i class="fal fa-star" aria-hidden="true"></i>
        
                                            <div class="front-stars" style="width: <? echo $productFeedback->getRating(); ?>%;">
                                                <i class="fa fa-star" aria-hidden="true"></i>
                                                <i class="fa fa-star" aria-hidden="true"></i>
                                                <i class="fa fa-star" aria-hidden="true"></i>
                                                <i class="fa fa-star" aria-hidden="true"></i>
                                                <i class="fa fa-star" aria-hidden="true"></i>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="comment-detail__ask">
                                        <? echo $productFeedback->getText(); ?>
                                    </div>
                                </div>
                            </div>
                            <? } else: ?>
                            <h3 style="margin: auto; font-size: 1.2em; font-weight: 400;">Hiện chưa có đánh giá nào, bạn hãy mua sản phẩm và đánh giá nó nhé!</h3>
                            <? endif; ?>
                        </article>
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
                        <form id="comment-form">
                            <input type="text" name="comment-user" value="<? echo isset($_SESSION['user']) ? $_SESSION['user'] : 'error'?>" hidden>
                            <input type="text" name="comment-product" value="<? echo $product->getID(); ?>" hidden>
                            <textarea name="comment-input" id="comment-input" class="comment-input" required placeholder="Nhập nội dung bình luận"></textarea>
                            <button class="comment-submit" name="comment-submit" type="button" onclick="comment(new Event('click'))">
                                <i class="fal fa-paper-plane"></i>
                                Gửi bình luận
                            </button>
                        </form>
                    </section>
                </section>
                <section class="content-box">
                    <? 
                        if($productComments != 'error') {
                        foreach ($productComments as $productComment) {
                            $parentComment = $userDAO->getUserByID($productComment->getUserID());
                            $replyComments = $commentDAO->getReplyCommentsByParentAndProduct($productComment->getProductID(), $productComment->getUserID()) != 0 ? $commentDAO->getReplyCommentsByParentAndProduct($productComment->getProductID(), $productComment->getUserID()) : 'error';
                    ?>
                        <article class="comment-box">
                            <div class="comment-box-main">
                                <div class="comment-user-avatar">
                                    <img src="<? echo $parentComment->getAvatar(); ?>" alt="">
                                </div>
                                <div class="comment-detail">
                                    <h2 class="comment-detail__name">
                                        <? echo $parentComment->getFullname(); ?>
                                    </h2>
                                    <div class="comment-detail__date">
                                        Bình luận vào ngày: <? echo $productComment->getDate(); ?>
                                    </div>
                                    <div class="comment-detail__ask">
                                        <? echo $productComment->getText(); ?>
                                    </div>
                                    <button class="comment-detai__answer-btn" id="reply-btn">
                                        Trả lời
                                    </button>
                                    
                                </div>
                            </div>
                            <div class="comment-box-replies">
                                <form id="reply-form" style="display: none">
                                    <input type="text" name="comment-parent" value="<? echo $parentComment->getID(); ?>" hidden>
                                    <input type="text" name="comment-user" value="<? echo isset($_SESSION['user']) ? $_SESSION['user'] : 'error'?>" hidden>
                                    <input type="text" name="comment-product" value="<? echo $product->getID(); ?>" hidden>
                                    <textarea name="comment-input" id="comment-input" class="comment-input" required placeholder="Nhập nội dung bình luận"></textarea>
                                    <button class="comment-submit" name="comment-submit" type="button" onclick="reply(new Event('click'))">
                                        <i class="fal fa-paper-plane"></i>
                                        Gửi bình luận
                                    </button>
                                </form>
                                <? 
                                    if($replyComments != 'error') {
                                        foreach ($replyComments as $reply) {
                                            $userReply = $userDAO->getUserByID($reply->getUserID());
                                ?>
                                <article class="comment-box">
                                    <div class="comment-box-main">
                                        <div class="comment-user-avatar">
                                            <img src="<? echo $userReply->getAvatar(); ?>" alt="">
                                        </div>
                                        <div class="comment-detail">
                                            <h2 class="comment-detail__name">
                                                <? echo $userReply->getFullname(); ?>
                                            </h2>
                                            <div class="comment-detail__date">
                                                Bình luận vào ngày: <? echo $reply->getDate(); ?>
                                            </div>
                                            <div class="comment-detail__ask">
                                                <? echo $reply->getText(); ?>
                                            </div>
                                        </div>
                                    </div>
                                </article>
                                <? }} ?>
                            </div>
                        </article>
                    <?  }} else { ?>
                        <h3 style="margin: auto; font-size: 1.2em; font-weight: 400;">Hiện chưa có bình luận nào!</h3>
                    <?  } ?>

                </section>
            </section>
        <?php include('./footer.php') ?>

        <script>
            $('#reply-btn').click((event) => {
                $('#reply-form').toggle();
            })
        </script>