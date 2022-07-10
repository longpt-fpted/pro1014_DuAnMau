<?php include('./header.php') ?>

<script>
    
    
</script>
<section class="main-content">
    <section class="content-container">
        <section class="content-box">
            <section class="cart-container">
                <section class="cart-wrapper">
                        <div class="cart-wrapper__head">
                            Giỏ hàng
                        </div>
                        <div class="cart-wrapper__body" >
                            <div class="row">
                                <div class="col" id="cart-wrapper__quantity">
                                    {{ 0 }} Sản phẩm
                                </div>
                                <div class="col">
                                    Đơn giá
                                </div>
                                <div class="col">
                                    Số lượng
                                </div>
                                <div class="col">
                                    Thành tiền
                                </div>
                                <div class="col">
                                    <i class="fal fa-trash"></i>
                                </div>
                            </div>
                            <div class="cart-detail" id="cart-detail"> 
                            <div class="cart-desc__head">
                                Thông tin thanh toán
                            </div>
                            <div class="cart-desc__body">
                                <div class="cart-desc--money">
                                    <p>Tổng cộng</p>
                                    <p>0</p>
                                </div>
                                <div class="cart-desc__body__coupons">
                                    <div class="coupon">
                                        <div class="coupon-thumnail">
                                            <img src="./assets/images/logo.png" alt="coupon">
                                        </div>
                                        <div class="coupon-detail">
                                            <p class="coupon-title">
                                                Giảm {{ 50% }}
                                            </p>
                                        </div>
                                        <button class="coupon-method">
                                            USE
                                        </button>
                                    </div>
                                    <div class="coupon">
                                        <div class="coupon-thumnail">
                                            <img src="./assets/images/logo.png" alt="coupon">
                                        </div>
                                        <div class="coupon-detail">
                                            <p class="coupon-title">
                                                Giảm {{ 50% }}
                                            </p>
                                        </div>
                                        <button class="coupon-method">
                                            USE
                                        </button>
                                    </div>
                                </div>
                            </div>
                            <div class="cart-desc__foot">
                                <div class="money">
                                    <div class="cart-desc--money">
                                        <p>Số tiền trong tài khoản</p>
                                        <p>0</p>
                                    </div>
                                    <div class="cart-desc--money">
                                        <p>Số tiền còn thiếu</p>
                                        <p>0</p>
                                    </div>
                                    <div class="cart-desc--money">
                                        <p>Tổng giảm</p>
                                        <p>0</p>
                                    </div>
                                    </div>
                                    <div class="cart-desc--money">
                                        <p>Tổng cộng</p>
                                        <p>0</p>
                                    </div>
                                </div>
                                <button class="checkout" id="checkout">
                                    Thanh toán
                                </button>
                            </div>
                            </div>
                        </div>
                    </article>
                </section>
                <section class="cart-desc" id="cart-desc">        
                </section>
            </section>
        </section>
    </section>
</section>
<?php include('./footer.php') ?>
<script>
    
    loadCart();
    const checkoutBtn = document.querySelector('#checkout');
    checkoutBtn.addEventListener('click', function() {
        checkout(<? echo isset($_SESSION['user']) ? $_SESSION['user'] : 'false'; ?>);
    })
</script>