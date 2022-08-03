<?php
    include('./header.php');
    if(isset($_GET['id'])) {
        $userID = $_GET['id'] == $_SESSION['user'] ? $_SESSION['user']: false;
    }
    if($userID != false) {
        $user = $userID != 'error' ? $userDAO->getUserByID($userID) : 'false';
        $uMethod = isset($_GET['umethod']) ? $_GET['umethod'] : 0;
        $notifies = $notifyDAO->getAllNotifiesByUserID($user->getID());
    } else {
        // header("location: ./login.php");
        ?>
            <script>
                window.location = "./login.php";
            </script>
        <?php
    }
    
?>
<article class="modal" id="form-modal">
    <div class="modal-container">
        <div class="modal-head" style="border: none; padding-bottom: 0;">
            <button class="modal-close" id="modal-close">
                <i class="fal fa-times-circle"></i>
            </button>
        </div>
        <div class="modal-body">
            <form action="../Controller/UserChangePhoneController.php" method="post" class="form-edit">
                <label for="phone">Nhập số điện thoại mới:</label>
                <input type="number" hidden id="id" name="id" value="<?php echo $user->getID(); ?>">
                <div class="input-box">
                    <i class="fal fa-phone"></i>
                    <input type="text" id="phone" name="phone" placeholder="Số điện thoại...">
                </div>
                <button type="submit" class="submit">
                    Thay đổi
                </button>
            </form>
            <form action="../Controller/UserChangeEmailController.php" method="post" class="form-edit">
                <label for="mail">Nhập địa chỉ mail mới:</label>
                <input type="number" hidden id="id" name="id" value="<?php echo $user->getID(); ?>">
                <div class="input-box">
                    <i class="fal fa-envelope"></i>
                    <input type="text" id="mail" name="mail" onclick="removeErrorMail()" placeholder="Email...">
                </div>
                <div id="error-mail" class="error-validate"></div>
                <div class="input-box-submit">
                    <button type="submit" class="submit" onclick="return check_change_email()">
                        Thay đổi
                    </button>
                </div>
            </form>
            <form class="form-edit" id="password-form">
                <label for="phone">Nhập mật khẩu cũ:</label>
                <input type="number" hidden id="id" name="id" value="<?php echo $user->getID(); ?>">
                <div class="input-box">
                    <i class="fal fa-key"></i>
                    <input type="password" id="old-pass" name="old-pass" onclick="removeErrorOldPassword()" placeholder="Mật khẩu cũ"><br>
                </div>
                <div id="error-oldpassword" class="error-validate"></div>
                <label for="phone">Nhập mật khẩu mới:</label>
                <div class="input-box">
                    <i class="fal fa-key"></i>

                    <input type="password" id="new-pass" name="new-pass" onclick="removeErrorNewPassword()" placeholder="Mật khẩu mới"><br>
                </div>
                <div id="error-newpassword" class="error-validate"></div>
                <div class="input-box-submit">
                    <button type="submit" class="submit" onclick="return check_change_password()">
                        Xác nhận
                    </button>
                </div>
            </form>
        </div>
    </div>
</article>
<article class="modal" id="feedback-modal">
    <div class="modal-container">
        <div class="modal-head" style="border: none; padding-bottom: 0;">
            <button class="modal-close" id="feedback-modal--close">
                <i class="fal fa-times-circle"></i>
            </button>
        </div>
        <div class="modal-body">
            <form action="" method="post" class="form-edit" id="feedback-container">
                <input type="text" name="uid" value="<?php echo $user->getID(); ?>" hidden>
                <div class="product-feedback__box" id="feedback-form">
                    
                </div>
                <button class="submit" id="feedback-submit" onclick="submitFeedback(event)">
                    Xác nhận
                </button>
            </form>
        </div>
    </div>
</article>
<article class="modal" id="currency-modal">
    <div class="modal-container">
        <div class="modal-head" style="border: none; padding-bottom: 0;">
            <button class="modal-close" id="currency-modal--close">
                <i class="fal fa-times-circle"></i>
            </button>
        </div>
        <div class="modal-body">
            <form class="form-edit" method="POST">
                <input type="number" hidden id="id" name="id" value="<?php echo $user->getID(); ?>">
                <label for="amount">Nhập số tiền cần nạp:</label>
                <div class="input-box">
                <i class="fal fa-coins"></i>
                <input type="number" id="amount" name="amount" placeholder="Số tiền..." min='0'>
                </div>
                <button type="button" class="submit" onclick="deposit(new Event('click'))">
                    Xác nhận
                </button>
            </form>
        </div>
    </div>
</article>
<section class="main-content">
    <section class="content-container">
        <section class="content-box">
            <article class="user-controller">
                <article class="user-method">
                    <i class="fal fa-user"></i>
                    <p class="user-method--title">
                        Thông tin cá nhân
                    </p>
                </article>                        
                <article class="user-method">
                    <i class="fal fa-shopping-cart"></i>
                    <p class="user-method--title">
                        Quản lí đơn hàng
                    </p>
                </article>                        
                <article class="user-method">
                    <i class="fal fa-credit-card-front"></i>
                    <p class="user-method--title">
                        Thông tin thanh toán
                    </p>
                </article> 
                <article class="user-method">
                    <i class="fal fa-history"></i>
                    <p class="user-method--title">
                        Lịch sử giao dịch
                    </p>
                </article>
                <article class="user-method">
                    <i class="fal fa-tag"></i>
                    <p class="user-method--title">
                        Mã giảm giá
                    </p>
                </article>
                <article class="user-method">
                    <i class="fal fa-star"></i>
                    <p class="user-method--title">
                        Thông báo của tôi
                    </p>
                </article>
                <article class="user-method">
                    <i class="fal fa-heart"></i>
                    <p class="user-method--title">
                        Sản phẩm yêu thích
                    </p>
                </article>
            </article>
            <article class="user-container">
                <article class="user-box">
                    <div class="user-box__title">
                        Thông tin cá nhân
                    </div>
                    <div class="user-box__dashboard">
                        <form action="../Controller/UserChangeNameController.php" method="post" class="main-info">
                            <div class="form-info">
                            <input type="number" hidden id="id" name="id" value="<?php echo $user->getID(); ?>">
                                <div class="form-avatar">
                                    <img src="<?php echo $user->getAvatar(); ?>" alt="user avatar">
                                    <input type="file" name="user-avatar" id="user-avatar" hidden>
                                    <label for="user-avatar">
                                        <i class="fal fa-pencil"></i>
                                    </label>
                                </div>
                                <div class="form-name">
                                    <div class="input-box">
                                        <label for="username">Họ & Tên</label>
                                        <input type="text" name="fullname" id="fullname" value="<?php 
                                            echo $user->getFullname();
                                        ?>">
                                    </div>
                                    <div class="input-box">
                                        <label for="phone">Số điện thoại</label>
                                        <input type="text" name="phone" id="phone" value="<?php 
                                            echo $user->getPhone();
                                        ?>">
                                    </div>
                                </div>
                            </div>
                            <button type="submit" class="submit-form">
                                Lưu thay đổi
                            </button>
                        </form>
                        <div class="form-container">
                            <div class="form-info">
                                <i class="fal fa-phone"></i>
                                <p>
                                    Số điện thoại<br>
                                    +84 <?php echo $user->getPhone();?>
                                </p>
                                <button class="form-edit-btn">Cập nhật</button>
                            </div>
                            <div class="form-info">
                                <i class="fal fa-envelope"></i>
                                <p>
                                    Địa chỉ email<br>
                                    <?php echo $user->getEmail();?>
                                </p>
                                <button class="form-edit-btn">Cập nhật</button>
                            </div>
                            <div class="form-info">
                                <i class="fal fa-key"></i>
                                <p>
                                    Đổi mật khẩu
                                </p>
                                <button class="form-edit-btn">Cập nhật</button>
                            </div>
                        </div>
                    </div>
                </article>
                <article class="user-box">
                    <article class="order-box">
                        <div class="order-box__title">
                            Quản lí đơn hàng
                        </div>
                        <div class="order-box__dashboard">
                            <?php 
                                $orders = $orderDAO->getAllPayedOrderByUserID($user->getID());
                                foreach ($orders as $order) {
                                    $orderdetails = $orderDetailDAO->getAllOrderDetailPayedByUserIdAndOrderID($user->getID(), $order->getID());
                            ?>
                                <section class="order-detail-box">
                                    <article class="order-detail-box__head">
                                        <i class="fal fa-box-check"></i>
                                        Giao hàng thành công - <?php  echo $order->getDate(); ?>
                                    </article>
                                    <article class="order-detail-box__body">
                                        <?php
                                        foreach ($orderdetails as $orderdetail) {
                                            $product = $productDAO->getProductByID($orderdetail->getProductID());
                                        ?>
                                        <article class="order">
                                            <div class="order-thumbnail">
                                                <img src="<?php  echo $product->getImg() ?>" alt="">
                                                <p class="quantity">
                                                    <?php  echo $orderdetail->getQuantity(); ?>
                                                </p>
                                            </div>
                                            <div class="order-title">
                                                <?php  echo $product->getName(); ?>
                                            </div>
                                            <div class="order-totalprice">
                                                <?php  echo $utils->formatMoney($orderdetail->getPrice()); ?>
                                            </div>
                                        </article>
                                        <?php  } ?> 
                                    </article>
                                    <article class="order-detail-box__foot">
                                        <div class="price">
                                            <span>Tổng tiền:</span> <?php  echo $utils->formatMoney($order->getPrice()); ?>
                                        </div>
                                    </article>
                                </section>
                            <?php  } ?>
                        </div>
                    </article>
                </article>
                <article class="user-box">
                    <div class="user-box__title">
                        Thông tin thanh toán
                    </div>
                    <h4 style="margin: .25em 0; font-weight: 400;">
                        Tài khoản của bạn hiện có: <span style="font-weight: 600 !important;" id="currency"><?php echo $utils->formatMoney($user->getCurrency()); ?></span>
                    </h4>
                    <div class="user-box__dashboard">
                        <section class="cards">
                            <article class="card">
                                <div class="card-thumbnail">
                                    <img src="./assets/images/momo.png" alt="card-thumbnail">
                                </div>
                                <div class="card-detail">
                                    <div class="card-owner">
                                        Long P. Thien
                                    </div>
                                    <div class="card-methods">
                                        <button class="method">
                                            Thay đổi
                                        </button>
                                        <button class="method">
                                            Xoá
                                        </button>
                                    </div>
                                </div>
                            </article>
                            <article class="card">
                                <div class="card-thumbnail">
                                    <img src="./assets/images/vnpay.png" alt="card-thumbnail">
                                </div>
                                <div class="card-detail">
                                    <div class="card-owner">
                                        Long P. Thien
                                    </div>
                                    <div class="card-methods">
                                        <button class="method">
                                            Thay đổi
                                        </button>
                                        <button class="method" id="deposit">
                                            Nạp tiền
                                        </button>
                                        <button class="method">
                                            Xoá
                                        </button>
                                    </div>
                                </div>
                            </article>
                        </section>
                    </div>
                </article>
                <article class="user-box">
                    <div class="user-box__title">
                        Mã giảm giá
                    </div>
                    <article class="user-box__dashboard" style="flex-wrap: wrap;">
                        <section class="vouchers">
                            <?php
                                $discounts = $discountDAO->getAllUserDiscounts($user->getID());
                                if(count($discounts) > 0) {
                                    foreach ($discounts as $discount) {
                            ?>
                                        <article class="voucher">
                                            <div class="voucher-thumnail">
                                                <img src="./assets/images/logo.png" alt="voucher">
                                            </div>
                                            <div class="voucher-detail">
                                                <p class="voucher-title">
                                                    <?php echo $utils->formatMoney($discount->getPrice()); ?>
                                                </p>
                                            </div>
                                            <p class="voucher-quantity">
                                            <?php echo $discount->getQuantity(); ?>
                                            </p>
                                        </article>
                            <?php
                                }
                            ?>
                            <?php } else { ?>
                                <h3>
                                    Bạn chưa có mã giảm giá!
                                </h3>
                            <?php } ?>
                        </section>
                    </article>
                </article>
                <article class="user-box">
                    <div class="user-box__title">
                        Thông báo của tôi
                    </div>
                    <article class="user-box__dashboard" style="flex-wrap: wrap;">
                        <?php
                            foreach ($notifies as $notify) {
                        ?>
                            <?php  if($notify->getType() == 0) {
                                $product = $productDAO->getProductByID($notify->getTypeID());
                            ?>
                            <article class="news-box">
                                <div class="news-box__head">
                                    <i class="fal fa-calendar"></i>
                                    <div class="date">
                                        <?php  echo $notify->getDate(); ?>
                                    </div>
                                </div>
                                <div class="news-box__body">
                                    <div class="news-thumbnail">
                                        <img src="<?php  echo $product->getImg(); ?>" alt="news">
                                    </div>
                                    <div class="news-detail">
                                        <h4 class="news-title">
                                            Sản phẩm <?php  echo $product->getName(); ?> đang dược giảm giá!
                                        </h4>
                                        <p class="news-desc">
                                            Sản phẩm <?php  echo $product->getName(); ?> được bạn yêu thích đang được giảm giá, hãy mua ngay!
                                        </p>
                                    </div>
                                </div>
                                <div class="news-box__foot">
                                    <a href="./product.php?id=<? echo $product->getID(); ?>" class="method">Xem chi tiết</a>
                                    <a onclick="removeNotify(<? echo $notify->getID(); ?>)" class="method">Xoá</a>
                                </div>
                            </article>
                            <?php  } else if($notify->getType() == 1) { 
                                $product = $productDAO->getProductByID($notify->getTypeID());
                            ?>
                            <article class="news-box">
                                <div class="news-box__head">
                                    <i class="fal fa-calendar"></i>
                                    <div class="date">
                                        <?php  echo $notify->getDate(); ?>
                                    </div>
                                </div>
                                <div class="news-box__body">
                                    <div class="news-thumbnail">
                                        <img src="<?php  echo $product->getImg(); ?>" alt="news">
                                    </div>
                                    <div class="news-detail">
                                        <h4 class="news-title">
                                            Sản phẩm <?php  echo $product->getName(); ?> đang đợi bạn đánh giá
                                        </h4>
                                        <p class="news-desc">
                                            Xin hãy cho chúng tôi biết trải nghiệm sau khi sử dụng sản phẩm <?php  echo $product->getName(); ?> của bạn như thế nào nhé :D!
                                        </p>
                                    </div>
                                </div>
                                <div class="news-box__foot">
                                    <a class="method" onclick="displayFeedbackBox('<?php echo $product->getName(); ?>', '<?php echo $product->getImg(); ?>', <?php echo $product->getID(); ?>);">Xem chi tiết</a>
                                </div>
                            </article>
                            <?php } else if($notify->getType() == 2) {
                                $order = $orderDAO->getOrderByID($notify->getTypeID());
                            ?>
                            <article class="news-box">
                                <div class="news-box__head">
                                    <i class="fal fa-calendar"></i>
                                    <div class="date">
                                        <?php  echo $order->getDate(); ?>
                                    </div>
                                </div>
                                <div class="news-box__body">
                                    <div class="news-thumbnail">
                                        <!-- <img src="./assets/images/elden-ring.jpg" alt="news"> -->
                                    </div>
                                    <div class="news-detail">
                                        <h4 class="news-title">
                                            Đơn hàng <?php  echo $order->getID(); ?> đã được xác nhận!
                                        </h4>
                                        <p class="news-desc">
                                            Đơn hàng <?php  echo $order->getID(); ?> đã được xác nhận. Cửa hàng đã gửi thông tin chi tiết vào email của bạn. Vui lòng kiểm tra!
                                        </p>
                                    </div>
                                </div>
                                <div class="news-box__foot">
                                    <a onclick="removeNotify(<?php echo $notify->getID(); ?>)" class="method">Xoá</a>
                                </div>
                            </article>
                            <?php } else if($notify->getType() == 3) {
                                $comment = $commentDAO->getReplyCommentByID($notify->getTypeID());
                                $replyUser = $userDAO->getUserByID($comment->getUserID());
                                if($replyUser->getID() !== $user->getID()) {
                            ?>
                            <article class="news-box">
                                <div class="news-box__head">
                                    <i class="fal fa-calendar"></i>
                                    <div class="date">
                                        <?php echo $comment->getDate(); ?>
                                    </div>
                                </div>
                                <div class="news-box__body">
                                    <div class="news-thumbnail">
                                        <!-- <img src="./assets/images/elden-ring.jpg" alt="news"> -->
                                    </div>
                                    <div class="news-detail">
                                        <h4 class="news-title">
                                            Bình luận của bạn được trả lời!
                                        </h4>
                                        <p class="news-desc">
                                            Tài khoản <?php echo $replyUser->getFullname(); ?> đã trả lời bình luận của bạn!
                                        </p>
                                    </div>
                                </div>
                                <div class="news-box__foot">
                                    <a href="./product.php?id=<?php  echo $comment->getProductID(); ?>" class="method">Xem chi tiết</a>
                                    <a onclick="removeNotify(<?php  echo $notify->getID(); ?>)" class="method">Xoá</a>
                                </div>
                            </article>
                                <?php  } ?>
                        <?php  } ?>
                    <?php  } ?>
                    </article>
                </article>
                <article class="user-box">
                    <div class="user-box__title">
                        Sản phẩm yêu thích
                    </div>
                    <article class="user-box__dashboard" id="favorite" style="flex-wrap: wrap;">
                        
                    </article>
                </article>
            </article>
        </section>
    </section>
</section>
<script>

    const userBox = document.querySelectorAll('.user-box');
    const userMethod = document.querySelectorAll('.user-method');

    const hideBox = () => {
        userBox.forEach((element) => {
            element.style.display = 'none';
        })
    }
    hideBox();

    userBox[<?php  echo $uMethod; ?>].style.display = 'block';
    userMethod[<?php  echo $uMethod; ?>].classList.add('active');

    userMethod.forEach((element, index) => {
        element.addEventListener('click', (event) => {
            if(userBox[index].style.display == 'none') {
                hideBox();
                userMethod.forEach((secondElement) => {
                    secondElement.classList.remove('active');
                });
                userMethod[index].classList.add('active');
                userBox[index].style.display = 'block';
            }
        });
    })
    loadFavorite();

</script>
<script src="./assets/js/validateuser.js"></script>
<script src="./assets/js/userModal.js"></script>
<?php include('./footer.php') ?>
