<?php
include('./header.php');
if (isset($_GET['id'])) {
    $userID = $_GET['id'] == $_SESSION['user'] ? $_SESSION['user'] : false;
}
if ($userID != false) {
    $user = $userID != 'error' ? $userDAO->getUserByID($userID) : 'false';
    $uMethod = isset($_GET['umethod']) ? $_GET['umethod'] : 0;
    $notifies = $notifyDAO->getAllNotifiesByUserID($user->getID());
} else {
    echo "<script>
            window.location = './index.php';
        </script>";
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
                    <input type="text" id="phone" name="phone" onclick="removeErrorPhone()" placeholder="Số điện thoại...">
                </div>
                <div id="error-phone" class="error-validate"></div>
                <div class="input-box-submit">
                    <button type="submit" class="submit" onclick="return check_change_phone()">
                        Thay đổi
                    </button>
                </div>
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
            <form class="form-edit" id="password-form" method="POST" action="../Controller/UserChangePasswordController.php">
                <label for="old-pass">Nhập mật khẩu cũ:</label>
                <input type="number" hidden id="id" name="id" value="<?php echo $user->getID(); ?>">
                <div class="input-box">
                    <i class="fal fa-key"></i>
                    <input type="password" id="old-pass" name="old-pass" onclick="removeErrorOldPassword()" placeholder="Mật khẩu cũ"><br>
                </div>
                <div id="error-oldpassword" class="error-validate"></div>
                <label for="new-pass">Nhập mật khẩu mới:</label>
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
                        <form action="../Controller/UserChangeNameController.php" method="post" enctype="multipart/form-data" class="main-info">
                            <div class="form-info">
                                <input type="number" hidden id="id" name="id" value="<?php echo $user->getID(); ?>">
                                <div class="form-avatar">
                                    <img src="<?php echo $user->getAvatar(); ?>" alt="user avatar">
                                    <input type="file" name="image" id="image" hidden>
                                    <label for="image">
                                        <i class="fal fa-pencil"></i>
                                    </label>
                                </div>
                                <div class="form-name">
                                    <div class="input-box">
                                        <label for="username">Họ & Tên</label>
                                        <input type="text" name="fullname" id="fullname" onclick="removeErrorFullname()" value="<?php
                                                                                                echo $user->getFullname();
                                                                                                ?>">
                                    </div>
                                    <div id="error-fullname" class="error-validate"></div>
                                    <div class="input-box">
                                        <label for="phone">Số điện thoại</label>
                                        <input type="text" name="phone" id="phone-number" onclick="removeErrorPhonenumber()" value="<?php
                                                                                            echo $user->getPhone();
                                                                                            ?>">
                                    </div>
                                    <div id="error-phone-number" class="error-validate"></div>
                                </div>
                            </div>
                            <button type="submit" onclick="return check_change_profile()" class="submit-form">
                                Lưu thay đổi
                            </button>
                        </form>
                        <div class="form-container">
                            <div class="form-info">
                                <i class="fal fa-phone"></i>
                                <p>
                                    Số điện thoại<br>
                                    +84 <?php echo $user->getPhone(); ?>
                                </p>
                                <button class="form-edit-btn">Cập nhật</button>
                            </div>
                            <div class="form-info">
                                <i class="fal fa-envelope"></i>
                                <p>
                                    Địa chỉ email<br>
                                    <?php echo $user->getEmail(); ?>
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
                            if ($orders != false && count($orders) > 0) {
                                foreach ($orders as $order) {
                                    $orderdetails = $orderDetailDAO->getAllOrderDetailPayedByUserIdAndOrderID($user->getID(), $order->getID());
                            ?>
                                    <section class="order-detail-box">
                                        <article class="order-detail-box__head">
                                            <i class="fal fa-box-check"></i>
                                            Giao hàng thành công - <?php echo $order->getDate(); ?>
                                        </article>
                                        <article class="order-detail-box__body">
                                            <?php
                                            foreach ($orderdetails as $orderdetail) {
                                                $product = $productDAO->getProductByID($orderdetail->getProductID());
                                            ?>
                                                <article class="order">
                                                    <div class="order-thumbnail">
                                                        <img src="<?php echo $product->getImg() ?>" alt="">
                                                        <p class="quantity">
                                                            <?php echo $orderdetail->getQuantity(); ?>
                                                        </p>
                                                    </div>
                                                    <div class="order-title">
                                                        <?php echo $product->getName(); ?>
                                                    </div>
                                                    <div class="order-totalprice">
                                                        <?php echo $utils->formatMoney($orderdetail->getPrice()); ?>
                                                    </div>
                                                </article>
                                            <?php  } ?>
                                        </article>
                                        <article class="order-detail-box__foot">
                                            <div class="price">
                                                <span>Tổng tiền:</span> <?php echo $utils->formatMoney($order->getPrice()); ?>
                                            </div>
                                        </article>
                                    </section>
                                <?php  }
                            } else { ?>
                                <h3>Bạn không có đơn hàng!</h3>
                            <?php } ?>
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
                                        <?php echo $user->getFullname(); ?>
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
                                        <?php echo $user->getFullname(); ?>
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
                            <article class="card">
                                <div class="charge-form">
                                    <form id="frm" action="../Controller/ChargeController.php" method="Post" onsubmit="return checkNapThe()">
                                        <input type="number" hidden id="id" name="id" value="<?php echo $user->getID(); ?>">
                                        <select class="txt" name="card-type" id="card-type">
                                            <option value="Default">Loại thẻ</option>
                                            <option value="Vinaphone">Vinaphone</option>
                                            <option value="Viettel">Viettel</option>
                                            <option value="Mobiphone">Mobiphone</option>
                                        </select>
                                        <select class="txt" name="card-value" id="card-value">
                                            <option value="Default">Mệnh giá</option>
                                            <option value="500000">500000</option>
                                            <option value="200000">200000</option>
                                            <option value="100000">100000</option>
                                        </select>
                                        <input type="text" class="txt" id="card-code" name="card-code" placeholder="Mã thẻ nạp">
                                        <input type="text" class="txt" id="card-seri" name="card-seri" placeholder="Số seri">
                                        <p> <label></label> <span id="notifyerror"></span> </p>
                                        <input type="submit" id="charge" name="charge" value="Nạp tiền">
                                    </form>
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
                            if (count($discounts) > 0) {
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
                                <h3>Bạn không có voucher!</h3>
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
                        if ($notifies != false && count($notifies) > 0) {
                            foreach ($notifies as $notify) {
                        ?>
                                <?php if ($notify->getType() == 0) {
                                    $product = $productDAO->getProductByID($notify->getTypeID());
                                ?>
                                    <article class="news-box">
                                        <div class="news-box__head">
                                            <i class="fal fa-calendar"></i>
                                            <div class="date">
                                                <?php echo $notify->getDate(); ?>
                                            </div>
                                        </div>
                                        <div class="news-box__body">
                                            <div class="news-thumbnail">
                                                <img src="<?php echo $product->getImg(); ?>" alt="news">
                                            </div>
                                            <div class="news-detail">
                                                <h4 class="news-title">
                                                    Sản phẩm <?php echo $product->getName(); ?> đang được giảm giá!
                                                </h4>
                                                <p class="news-desc">
                                                    Sản phẩm <?php echo $product->getName(); ?> được bạn yêu thích đang được giảm giá, hãy mua ngay!
                                                </p>
                                            </div>
                                        </div>
                                        <div class="news-box__foot">
                                            <a href="./product.php?id=<?php echo $product->getID(); ?>" class="method">Xem chi tiết</a>
                                            <a onclick="removeNotify(<?php echo $notify->getID(); ?>)" class="method">Xoá</a>
                                        </div>
                                    </article>
                                <?php  } else if ($notify->getType() == 1) {
                                    $product = $productDAO->getProductByID($notify->getTypeID());
                                ?>
                                    <article class="news-box">
                                        <div class="news-box__head">
                                            <i class="fal fa-calendar"></i>
                                            <div class="date">
                                                <?php echo $notify->getDate(); ?>
                                            </div>
                                        </div>
                                        <div class="news-box__body">
                                            <div class="news-thumbnail">
                                                <img src="<?php echo $product->getImg(); ?>" alt="news">
                                            </div>
                                            <div class="news-detail">
                                                <h4 class="news-title">
                                                    Sản phẩm <?php echo $product->getName(); ?> đang đợi bạn đánh giá
                                                </h4>
                                                <p class="news-desc">
                                                    Xin hãy cho chúng tôi biết trải nghiệm sau khi sử dụng sản phẩm <?php echo $product->getName(); ?> của bạn như thế nào nhé :D!
                                                </p>
                                            </div>
                                        </div>
                                        <div class="news-box__foot">
                                            <a class="method" onclick="displayFeedbackBox(`<?php echo $product->getName(); ?>`, `<?php echo $product->getImg(); ?>`, `<?php echo $product->getID(); ?>`);">Xem chi tiết</a>
                                        </div>
                                    </article>
                                <?php } else if ($notify->getType() == 2) {
                                    $order = $orderDAO->getOrderByID($notify->getTypeID());
                                ?>
                                    <article class="news-box">
                                        <div class="news-box__head">
                                            <i class="fal fa-calendar"></i>
                                            <div class="date">
                                                <?php echo $order->getDate(); ?>
                                            </div>
                                        </div>
                                        <div class="news-box__body">
                                            <div class="news-thumbnail">
                                                <!-- <img src="./assets/images/elden-ring.jpg" alt="news"> -->
                                            </div>
                                            <div class="news-detail">
                                                <h4 class="news-title">
                                                    Đơn hàng <?php echo $order->getID(); ?> đã được xác nhận!
                                                </h4>
                                                <p class="news-desc">
                                                    Đơn hàng <?php echo $order->getID(); ?> đã được xác nhận. Cửa hàng đã gửi thông tin chi tiết vào email của bạn. Vui lòng kiểm tra!
                                                </p>
                                            </div>
                                        </div>
                                        <div class="news-box__foot">
                                            <a onclick="removeNotify(<?php echo $notify->getID(); ?>)" class="method">Xoá</a>
                                        </div>
                                    </article>
                                    <?php } else if ($notify->getType() == 3) {
                                    $comment = $commentDAO->getReplyCommentByID($notify->getTypeID());
                                    $replyUser = $userDAO->getUserByID($comment->getUserID());
                                    if ($replyUser->getID() !== $user->getID()) {
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
                                                <a href="./product.php?id=<?php echo $comment->getProductID(); ?>" class="method">Xem chi tiết</a>
                                                <a onclick="removeNotify(<?php echo $notify->getID(); ?>)" class="method">Xoá</a>
                                            </div>
                                        </article>
                                    <?php  } ?>
                                <?php  } ?>
                        <?php  }
                        } else { ?>
                        <h3>Bạn không có thông báo!</h3>
                        <?php } ?>
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

    userBox[<?php echo $uMethod; ?>].style.display = 'block';
    userMethod[<?php echo $uMethod; ?>].classList.add('active');

    userMethod.forEach((element, index) => {
        element.addEventListener('click', (event) => {
            if (userBox[index].style.display == 'none') {
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
    function checkNapThe(){
        var error = "";

        var checkcardtype = document.getElementById("card-type");
        if (checkcardtype.value=="Default"){
            checkcardtype.className="error";
            error += "Vui lòng chọn loại thẻ !<br>";
        }
        else checkcardtype.className="txt";

        var checkcardvalue = document.getElementById("card-value");
        if (checkcardvalue.value=="Default"){
            checkcardvalue.className="error";
            error += "Vui lòng chọn mệnh giá thẻ !<br>";
        }
        else checkcardvalue.className="txt";

        var checkcode = document.getElementById("card-code");
        if (checkcode.value == "") {
            checkcode.className="error";
            error += "Mã thẻ nạp không được bỏ trống !<br>";
        }
        else if (checkcode.value.length<11){
            checkcode.className="error";
            error += "Mã thẻ quá ngắn vui lòng nhập đúng định dạng mã thẻ !<br>";
        }
        else if (checkcode.value.length>15) {
            checkcode.className="error";
            error += "Mã thẻ quá dài vui lòng nhập đúng định dạng mã thẻ !<br>";
        }
        else checkcode.className="txt";

        var checkseri = document.getElementById("card-seri");
        if (checkseri.value == "") {
            checkseri.className="error";
            error += "Số seri không được bỏ trống !<br>";
        }
        else if (checkseri.value.length<11){
            checkseri.className="error";
            error += "Số seri quá ngắn vui lòng nhập đúng định dạng !<br>";
        }
        else if (checkseri.value.length>15) {
            checkseri.className="error";
            error += "Số seri quá dài vui lòng nhập đúng định dạng !<br>";
        }
        else checkseri.className="txt";

        if (error!="") {
            document.getElementById('notifyerror').innerHTML="<p>" + error + "</p>";
            return false;
        }
    }
</script>
<script src="./assets/js/validateuser.js"></script>
<script src="./assets/js/userModal.js"></script>
<?php include('./footer.php') ?>