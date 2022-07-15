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
                        <div class="input-box">
                            <i class="fal fa-envelope"></i>
                            <input type="text" id="mail" name="mail" placeholder="Email...">
                        </div>
                        <button type="submit" class="submit">
                            Thay đổi
                        </button>
                    </form>
                    <form action="../Controller/UserChangePasswordController.php" method="post" class="form-edit">
                        <label for="phone">Nhập mật khẩu cũ:</label>
                        <div class="input-box">
                            <i class="fal fa-key"></i>
                            <input type="text" id="old-pass" name="old-pass" placeholder="Mật khẩu cũ">
                        </div>
                        <label for="phone">Nhập mật khẩu mới:</label>
                        <div class="input-box">
                            <i class="fal fa-key"></i>

                            <input type="text" id="new-pass" name="new-pass" placeholder="Mật khẩu mới">
                        </div>
                        <button type="submit" class="submit">
                            Xác nhận
                        </button>
                    </form>
                </div>
            </div>
        </article>
        <?php
            include('./header.php');
            $userID = isset($_GET['id']) ? $_GET['id'] : 1;
            $user = $userDAO->getUserByID($userID);

            $favorites = $favoriteDAO->getAllFavoritesByUserID($user->getID());

            $favorites = array_map(function($fav) {
                global $productDAO, $user;
                $pd = $productDAO->getProductByID($fav->getProductID());
                // id, ten, 2 gia, ngay, hinh
                return ['uid' => $user->getID(),'pid' => $pd->getID(), 'name' => $pd->getName(), 'totalPrice' => $pd->getTotalPrice(), 'price' => $pd->getPrice(), 'date' => $fav->getDate(), 'img' => $pd->getImg()];
            }, $favorites);
        ?>

        <script>
            let favorites = <? echo json_encode($favorites) ?>;

        </script>
        <section class="main-content">
            <section class="content-container">
                <section class="content-box">
                    <article class="user-controller">
                        <article class="user-method active">
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
                            <i class="fal fa-newspaper"></i>
                            <p class="user-method--title">
                                Thông báo của tôi
                            </p>
                        </article>
                        <article class="user-method">
                            <i class="fal fa-star"></i>
                            <p class="user-method--title">
                                Đánh giá của tôi
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
                                        <div class="form-avatar">
                                            <img src="./assets/images/man.png" alt="user avatar">
                                            <input type="file" name="user-avatar" id="user-avatar" hidden>
                                            <label for="user-avatar">
                                                <i class="fal fa-pencil"></i>
                                            </label>
                                        </div>
                                        <div class="form-name">
                                            <div class="input-box">
                                                <label for="username">Họ & Tên</label>
                                                <input type="text" name="fullname" id="fullname" value="<?
                                                    echo $user->getFullname();
                                                ?>">
                                            </div>
                                            <div class="input-box">
                                                <label for="phone">Số điện thoại</label>
                                                <input type="text" name="phone" id="phone" value="<?
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
                                            +84 <?echo $user->getPhone();?>
                                        </p>
                                        <button class="form-edit-btn">Cập nhật</button>
                                    </div>
                                    <div class="form-info">
                                        <i class="fal fa-envelope"></i>
                                        <p>
                                            Địa chỉ email<br>
                                            <?echo $user->getEmail();?>
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
                                    <?
                                        $orders = $orderDAO->getAllPayedOrderByUserID($user->getID());
                                        foreach ($orders as $order) {
                                            $orderdetails = $orderDetailDAO->getAllOrderDetailPayedByUserIdAndOrderID($user->getID(), $order->getID());
                                    ?>
                                        <section class="order-detail-box">
                                            <article class="order-detail-box__head">
                                                <i class="fal fa-box-check"></i>
                                                Giao hàng thành công - <? echo $order->getDate(); ?>
                                            </article>
                                            <article class="order-detail-box__body">
                                                <? foreach ($orderdetails as $orderdetail) {
                                                    $product = $productDAO->getProductByID($orderdetail->getProductID());
                                                ?>
                                                <article class="order">
                                                    <div class="order-thumbnail">
                                                        <img src="<? echo $product->getImg() ?>" alt="">
                                                        <p class="quantity">
                                                            <? echo $orderdetail->getQuantity(); ?>
                                                        </p>
                                                    </div>
                                                    <div class="order-title">
                                                        <? echo $product->getName(); ?>
                                                    </div>
                                                    <div class="order-totalprice">
                                                        <? echo $utils->formatMoney($orderdetail->getPrice()); ?>VND
                                                    </div>
                                                </article>
                                                <? } ?> 
                                            </article>
                                            <article class="order-detail-box__foot">
                                                <div class="price">
                                                    <span>Tổng tiền:</span> <? echo $utils->formatMoney($order->getPrice()); ?>VND
                                                </div>
                                            </article>
                                        </section>
                                    <? } ?>
                                </div>
                            </article>
                        </article>
                        <article class="user-box">
                            <div class="user-box__title">
                                Thông tin thanh toán
                            </div>
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
                                            <img src="./assets/images/paypal.png" alt="card-thumbnail">
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
                                </section>
                            </div>
                        </article>
                        <article class="user-box">
                            <div class="user-box__title">
                                Thông báo của tôi
                            </div>
                            <article class="user-box__dashboard">
                                <article class="news-box">
                                    <div class="news-box__head">
                                        <i class="fal fa-calendar"></i>
                                        <div class="date">
                                            21/08/2021
                                        </div>
                                    </div>
                                    <div class="news-box__body">
                                        <div class="news-thumbnail">
                                            <img src="./assets/images/elden-ring.jpg" alt="news">
                                        </div>
                                        <div class="news-detail">
                                            <h4 class="news-title">
                                                Elden Ring chính thức vượt mặt Dying Light 2 và God of War, trở thành tựa game được yêu thích nhiều nhất trên Steam
                                            </h4>
                                            <p class="news-desc">
                                                Elden Ring còn được coi là hậu duệ của dòng game nổi tiếng Dark Souls.
                                            </p>
                                        </div>
                                    </div>
                                    <div class="news-box__foot">
                                        <a href="#" class="method">Xem chi tiết</a>
                                    </div>
                                </article>
                            </article>
                            
                        </article>
                        <article class="user-box">
                            <div class="user-box__title">
                                Đánh giá của tôi
                            </div>
                            <article class="user-box__dashboard">
                                <article class="news-box">
                                    <div class="news-box__head">
                                        <i class="fal fa-calendar"></i>
                                        <div class="date">
                                            21/08/2021
                                        </div>
                                    </div>
                                    <div class="news-box__body">
                                        <div class="news-thumbnail">
                                            <img src="./assets/images/elden-ring.jpg" alt="news">
                                        </div>
                                        <div class="news-detail">
                                            <h4 class="news-title">
                                                Elden Ring
                                            </h4>
                                            <div class="rating">
                                                <div class="back-stars">
                                                    <i class="fal fa-star" aria-hidden="true"></i>
                                                    <i class="fal fa-star" aria-hidden="true"></i>
                                                    <i class="fal fa-star" aria-hidden="true"></i>
                                                    <i class="fal fa-star" aria-hidden="true"></i>
                                                    <i class="fal fa-star" aria-hidden="true"></i>
                
                                                    <div class="front-stars" id="rating" style="width: 50%;">
                                                        <i class="fa fa-star" aria-hidden="true"></i>
                                                        <i class="fa fa-star" aria-hidden="true"></i>
                                                        <i class="fa fa-star" aria-hidden="true"></i>
                                                        <i class="fa fa-star" aria-hidden="true"></i>
                                                        <i class="fa fa-star" aria-hidden="true"></i>
                                                    </div>
                                                </div>
                                            </div>
                                            <p class="news-desc">
                                                Lorem ipsum dolor sit, amet consectetur adipisicing elit. Atque voluptatum eos at laborum a. Aspernatur, consectetur reiciendis fugiat consequatur repellendus suscipit unde sit, asperiores eligendi dolorem soluta, incidunt nemo doloremque!
                                            </p>
                                        </div>
                                    </div>
                                    <div class="news-box__foot">
                                        <a href="#" class="method">Xem chi tiết</a>
                                    </div>
                                </article>
                            </article>
                            
                        </article>
                        <article class="user-box">
                            <div class="user-box__title">
                                Sản phẩm yêu thích
                            </div>
                            <article class="user-box__dashboard" id="favorite">
                                
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

            userBox[0].style.display = 'block';
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
        <script src="./assets/js/userModal.js"></script>
        <?php include('./footer.php') ?>