<?php 
session_start();
include "/Applications/XAMPP/xamppfiles/htdocs/pro1014_duan/sources/Utils/Database.php";
include "/Applications/XAMPP/xamppfiles/htdocs/pro1014_duan/sources/Utils/Utils.php";
include "/Applications/XAMPP/xamppfiles/htdocs/pro1014_duan/sources/Model/DAO/UserDAO.php";
include "/Applications/XAMPP/xamppfiles/htdocs/pro1014_duan/sources/Model/DAO/ProductDAO.php";
include "/Applications/XAMPP/xamppfiles/htdocs/pro1014_duan/sources/Model/DAO/CategoryDAO.php";
include "/Applications/XAMPP/xamppfiles/htdocs/pro1014_duan/sources/Model/DAO/OrderDAO.php";
include "/Applications/XAMPP/xamppfiles/htdocs/pro1014_duan/sources/Model/DAO/OrderDetailDAO.php";
include "/Applications/XAMPP/xamppfiles/htdocs/pro1014_duan/sources/Model/DAO/FavoriteDAO.php";
// include "C:/xampp/htdocs/pro1014_DuAn/sources/Utils/Database.php";
// include "../Utils/Utils.php";
// include "../Model/DAO/UserDAO.php";
// include "../Model/DAO/ProductDAO.php";
// include "../Model/DAO/CategoryDAO.php";
// include "../Model/DAO/OrderDAO.php";
// include "../Model/DAO/OrderDetailDAO.php";


$utils = new Utils();
$userDAO = new UserDAO();
$productDAO = new ProductDAO();
$cateDAO = new CategoryDAO();
$orderDAO = new OrderDAO();
$orderDetailDAO = new OrderDetailDAO();
$favoriteDAO = new FavoriteDAO();


$user = isset($_SESSION['user']) ? $userDAO->getUserByID($_SESSION['user']) : 'error';

if(isset($_SESSION['user'])) {
    $order = $orderDAO->getUnpayOrderByUserID($user->getID());
    $_SESSION['cart'] = isset($_SESSION['cart']) ? $orderDetailDAO->getAllOrderDetailByUserIdAndOrderID($user->getID(), $order->getID()) : [];


    $favorites = $favoriteDAO->getAllFavoritesByUserID($user->getID());

    $favorites = array_map(function($fav) {
        global $productDAO, $user;
        $pd = $productDAO->getProductByID($fav->getProductID());
        return ['uid' => $user->getID(),'pid' => $pd->getID(), 'name' => $pd->getName(), 'totalPrice' => $pd->getTotalPrice(), 'price' => $pd->getPrice(), 'date' => $fav->getDate(), 'img' => $pd->getImg()];
    }, $favorites);
    



} else {
    $_SESSION['cart'] = isset($_SESSION['cart']) ? $_SESSION['cart'] : [];
}

$_SESSION['cart'] = array_map(function($od) {
    global $productDAO;
    $p = '';
    if(isset($_SESSION['user'])) {
        $p = $productDAO->getProductByID($od->getProductID());
        return ['id' => $p->getID(), 'name' => $p->getName(), 'img' => $p->getImg(), 'quantity' => $od->getQuantity(), 'price' => $od->getPrice(), 'fullprice' => ($p->getPrice() * $od->getQuantity())];
    } else{
        return $od;  
    } 
}, $_SESSION['cart']);

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <!-- Font Awesome 5 -->
    <link href="https://cdn.jsdelivr.net/gh/hung1001/font-awesome-pro@4cac1a6/css/all.css" rel="stylesheet" type="text/css" />

    <!-- Jquery -->
    <script type="text/javascript" src="//code.jquery.com/jquery-1.11.0.min.js"></script>
    <script type="text/javascript" src="//code.jquery.com/jquery-migrate-1.2.1.min.js"></script>

    <script>
        let favorites = <? echo json_encode($favorites) ?>;

        function Product(id, name, img, quantity, price, fullPrice) {
            this.id = id;
            this.name = name;
            this.img = img;
            this.quantity = quantity;
            this.price = price;
            this.fullPrice = fullPrice;
        }
        const carts = <? echo (json_encode($_SESSION['cart'])) ?>;
        let cartQuantity = 0;
        let currency = {
            fullPrice: 0,
            discount: 0,
            userMoney: <? echo isset($_SESSION['user']) ? $user->getCurrency() : 0 ?>,
            left: 0,
            total: 0,
        }

    </script>
    <script src="./assets/js/main.js"></script>
    <script src="./assets/js/ajax.js"></script>
    <script>
        
    </script>
    <!-- Slick JS -->
    <link rel="stylesheet" type="text/css" href="//cdn.jsdelivr.net/npm/slick-carousel@1.8.1/slick/slick.css"/>
    <!-- CSS -->
    <link rel="stylesheet" href="./assets/css/style.css">
</head>
<body>
    <div id="fb-root"></div>
    <script async defer crossorigin="anonymous" src="https://connect.facebook.net/vi_VN/sdk.js#xfbml=1&version=v12.0&appId=1303126910149001&autoLogAppEvents=1" nonce="geF2GnV4"></script>
    <main>
        <article class="search-modal" id="search-box">
                <form action="search.php" method="post" class="modal-container">
                    <input type="text" name="search-input" id="search-input">
                    <button type="submit" name="search-submit" id="search-submit">
                        <i class="fal fa-search"></i>
                    </button>
                </form>
                <button id="search-modal-close">
                    <i class="fal fa-times-circle"></i>
                </button>
        </article>
        <article class="cart-modal" id="cart-modal">
            <div class="modal-container">
                <div class="modal-head">
                    <div class="modal--title">
                        <i class="fal fa-shopping-bag"></i>
                        <p>Your cart</p>
                        <p class="cart-modal--total-quantity" id="cart-modal--total-quantity">
                            (0)
                        </p>
                    </div>
                    <button id="cart-modal-close">
                        <i class="fal fa-times-circle"></i>
                    </button>
                    
                </div>
                <div class="modal-body" id="cart-modal__body">
                </div>
                <div class="modal-footer" >
                    <ul class="cart-modal-price-list" id="cart-modal__footer">
                        
                    </ul>
                    <a href="./cart.php" class="cart-modal-checkout">
                        Check out
                    </a>
                </div>
            </div>
        </article>
        <header class="main-header">
            <section class="main-navbar">
                <a href="./index.php" class="logo">
                    <!-- <img src="./assets/images/logo.png" alt="logo"> -->
                    <img src="./assets/images/logo1.png" alt="logo">
                    <div class="logo--txt">
                        <p>Demon</p>
                        <p>Stone</p>
                    </div>
                </a>
                <article class="main-navbar__nav">
                    <li class="main-navbar--item">
                        Category <i class="fal fa-angle-down"></i>
                        <ul class="main-navbar__category main-navbar__submenu">
                            <li class="category--item">
                                <h4 class="category--title">
                                    Thể loại
                                </h4>
                                <?php
                                    $cates = $cateDAO->getAllCategories();
                                    foreach ($cates as $cate) {

                                ?>
                                <p class="category--desc">
                                    <? echo $cate->getName(); ?>
                                </p>
                                <?php } ?>
                            </li>
                            <li class="category--item">
                                <h4 class="category--title">
                                    Đặc sắc
                                </h4>
                                <a class="category--desc" href="#">
                                    Sale
                                </a>
                                <a class="category--desc" href="#">
                                    Mới ra mắt
                                </a>
                                <a class="category--desc" href="#">
                                    Hot
                                </a>
                            </li>
                            <li class="category--item" id="hot-items">
                                <?php 
                                    $saleProducts = $productDAO->getSaleProductsWithLimit(5);
                                    foreach ($saleProducts as $product) {
                                ?>
                                    <article class="product-box">
                                        <a class="product-box__thumbnail" href="#">
                                            <img src="<? echo $product->getImg(); ?>" alt="product thumbnail">
                                        </a>
                                        <div class="product-box__detail">
                                            <div class="product-box__desc">
                                                <div class="product-box__title" href="#">
                                                    <a href="#"><? echo $product->getName(); ?></a>
                                                    <div class="tag sale-tag">
                                                        -<? echo $product->getSale(); ?>%
                                                    </div>
                                                </div>
                                                <div class="product-box__price">
                                                    <p class="product-box__totalprice">
                                                    <? echo $product->getTotalPrice(); ?></p>
                                                    <p class="product-box__fullprice">
                                                    <? echo $product->getPrice(); ?></p>
                                                </div>
                                            </div>
                                            <a class="product-box__add" onclick="addProductToCart(<? echo $product->getID(); ?>)">
                                                Add to cart
                                            </a>
                                        </div>
                                    </article>
                                <?php } ?>
                            </li>
                        </ul>
                    </li>
                    <li class="main-navbar--item">
                        Helps <i class="fal fa-angle-down"></i>
                        <ul class="main-navbar__submenu">
                            <li class="category--item">
                                <a href="https://www.facebook.com/p.thieenlong" class="category--title">
                                    FAQs
                                </a>
                            </li>
                            <li class="category--item">
                                <a href="https://www.facebook.com/p.thieenlong" class="category--title">
                                    Liên lạc trực tuyến
                                </a>
                            </li>
                        </ul>
                    </li>
                    <a class="main-navbar--item" href="./blog.html">
                        Blogs
                    </a>
                </article>
                <article class="main-navbar__nav" id="user-navbar">
                    <li class="main-navbar--item">
                        <i class="fal fa-user-circle"></i>
                        <ul class="main-navbar__submenu">
                            <?php if(isset($_SESSION['user'])): ?>
                                <li class="category--item">
                                    <a href="./user.php?id=<? echo $user->getID(); ?>" class="category--title">
                                        Thông tin
                                    </a>
                                </li>

                                <li class="category--item">
                                    <a href="./cart.php?id=<? echo $user->getID(); ?>" class="category--title">
                                        Giỏ hàng
                                    </a>
                                </li>
                                <li class="category--item">
                                    <a class="category--title" id="logout">
                                        Đăng xuất
                                    </a>
                                </li>
                            <?php else :?>
                                <li class="category--item">
                                    <a href="./register.php" class="category--title">
                                        Đăng ký
                                    </a>
                                </li>
                                <li class="category--item">
                                    <a href="./login.php" class="category--title">
                                        Đăng nhập
                                    </a>
                                </li>
                            <?php endif;?>
                        </ul>
                    </li>
                    <li class="main-navbar--item">
                        <i class="fal fa-heart"></i>
                    </li>
                    <li class="main-navbar--item" id="search-modal-open">
                        <i class="fal fa-search"></i>
                    </li>
                    <li class="main-navbar--item" id="cart-modal-open">
                        <i class="fal fa-shopping-bag"></i>
                    </li>
                </article>
            </section>
        </header>
        <script>
            $('#logout').click((e) => {
                $.ajax({
                    url: '../Controller/LoginController.php',
                    type: 'POST',
                    data: "method=logout",
                }).done(res => {
                    res = JSON.parse(res);
                    switch (res['status']) {
                        case 'success':
                            displayNotify('success', 'Đăng xuất thành công! Bạn sẽ được trả về trang chủ trong vài giây nữa!');
                            setTimeout(function() {
                                window.location = 'index.php';
                            }, 2500)
                            break;
                        case 'success':
                            displayNotify('fail', 'Đăng xuất thất bại!');
                            break;
                        
                    }
                })
            })
            
        </script>
        