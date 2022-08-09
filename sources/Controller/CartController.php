<?php
session_start();

include "../Utils/Database.php";
include "../Utils/Mail.php";
include "../Model/DAO/UserDAO.php";
include "../Model/DAO/ProductDAO.php";
include "../Model/DAO/OrderDAO.php";
include "../Model/DAO/OrderDetailDAO.php";
include "../Model/DAO/DiscountDAO.php";
include_once "../Model/DAO/NotifyDAO.php";

$productDAO = new ProductDAO();
$userDAO = new UserDAO();
$orderDAO = new OrderDAO();
$orderDetailDAO = new OrderDetailDAO();
$mail = new Mail();

$productID = isset($_REQUEST['pid']) ? $_REQUEST['pid'] : 'error';
$method = isset($_REQUEST['method']) ? $_REQUEST['method'] : 'error'; 
$userID = isset($_REQUEST['userID']) ? $_REQUEST['userID'] : 'error';
$coupon = isset($_REQUEST['coupon']) ? $_REQUEST['coupon'] : 'error';

function addProductToCart($productID) {
    global $productDAO, $userDAO, $orderDAO, $orderDetailDAO;
    $resp = [];
    $product = $productDAO->getProductByID($productID);
    
    
    if(isset($_SESSION['user'])) {
        $isContain = false;
        $user = $userDAO->getUserByID($_SESSION['user']);
        $quantity = 1;
        $index = 0;
        $order = $orderDAO->getUnpayOrderByUserID($user->getID());
        $orderdetails = $orderDetailDAO->getAllOrderDetailByUserIdAndOrderID($user->getID(), $order->getID());
        $_SESSION['cart'] = isset($_SESSION['cart']) ? $_SESSION['cart'] : [];
        foreach($orderdetails as $orderdetail) {
            if($productID == $orderdetail->getProductID()) {
                $orderdetail->addProduct();
                $isContain = true;
                $orderDetailDAO->addOrderDetailToOrder($order->getID(), $productID, $orderdetail->getQuantity(), true);
                $quantity = $orderdetail->getQuantity();

                break;
            }
            $index++;
        }
        
        if($isContain == false) {
            $orderdetails[] = new OrderDetail($order->getID(), $product->getID(), $product->getTotalPrice());
            $orderDetailDAO->addOrderDetailToOrder($order->getID(), $productID, 1, false);
            $_SESSION['cart'][] = ["id" => $product->getID(), "name" => $product->getName(), "img" => $product->getImg(), "quantity" => $quantity, "price" => $product->getTotalPrice()  * $quantity, "fullprice" => $product->getPrice() * $quantity];

        } else {
            $_SESSION['cart'][$index] = ["id" => $product->getID(), "name" => $product->getName(), "img" => $product->getImg(), "quantity" => $quantity, "price" => $product->getTotalPrice()  * $quantity, "fullprice" => $product->getPrice() * $quantity];
            $resp['index'] = $_SESSION['cart'][$index];
        }
        
        $resp['status'] = 'success';
        $resp['product'] = ["id" => $product->getID(), "name" => $product->getName(), "img" => $product->getImg(), "quantity" => $quantity, "price" => $product->getTotalPrice() * $quantity, "fullprice" => $product->getPrice() * $quantity];


    } else {
        $_SESSION['cart'] = isset($_SESSION['cart']) ? $_SESSION['cart'] : [];
        $isContain = false;
        $quantity = 1;

        $index = 0;
        foreach ($_SESSION['cart'] as $orderdetail) {
            if($orderdetail['id'] == $product->getID()) {
                $orderdetail['quantity'] += 1;
                $quantity = $orderdetail['quantity'];
                $isContain = true;
                break;
            }
            $index++;
        }

        if($isContain == false) {
            $_SESSION['cart'][] = ["id" => $product->getID(), "name" => $product->getName(), "img" => $product->getImg(), "quantity" => 1, "price" => $product->getTotalPrice(), "fullprice" => $product->getPrice()];
        } else {
            $_SESSION['cart'][$index] = ["id" => $product->getID(), "name" => $product->getName(), "img" => $product->getImg(), "quantity" => $quantity, "price" => $product->getTotalPrice() * $quantity, "fullprice" => $product->getPrice() * $quantity];
        }

        $resp['status'] = 'success';
        $resp['product'] = ["id" => $product->getID(), "name" => $product->getName(), "img" => $product->getImg(), "quantity" => $quantity, "price" => $product->getTotalPrice() * $quantity, "fullprice" => $product->getPrice() * $quantity];

    }


    return $resp;
}
function removeProductFromCart($productID) {
    global $productDAO, $userDAO, $orderDAO, $orderDetailDAO;
    $resp = [];
    $product = $productDAO->getProductByID($productID);
    $user = isset($_SESSION['user']) ? $userDAO->getUserByID($_SESSION['user']) : '';
    
    if(isset($_SESSION['cart'])) {
        $index = 0;
        foreach($_SESSION['cart'] as $orderdetail) {

            if($orderdetail['id'] == $product->getID()) {
                $resp['product'] = ["id" => $product->getID(), "name" => $product->getName(), "img" => $product->getImg(), "quantity" => $orderdetail['quantity'], "price" => $product->getTotalPrice() * $orderdetail['quantity'], "fullprice" => $product->getPrice() * $orderdetail['quantity']];

                array_splice($_SESSION['cart'], $index, 1);
            
                $resp['id'] = $orderdetail['id'];
                $resp['index'] = $index;
                if(isset($_SESSION['user'])) {
                    $order = $orderDAO->getUnpayOrderByUserID($user->getID());

                    $_SESSION['cart'] = $orderDetailDAO->getAllOrderDetailByUserIdAndOrderID($user->getID(), $order->getID());
                    $_SESSION['cart'] = array_map(function($od) {
                        global $productDAO;
                        $p = '';
                        $p = $productDAO->getProductByID($od->getProductID());
                        return ['id' => $p->getID(), 'name' => $p->getName(), 'img' => $p->getImg(), 'quantity' => $od->getQuantity(), 'price' => $od->getPrice(), 'fullprice' => ($p->getPrice() * $od->getQuantity())];
                    }, $_SESSION['cart']);

                    $resp['status'] = $orderDetailDAO->removerOrderDetailByProductIDAndOrderID($product->getID(), $order->getID()) ? "success" : 'fail';
                } else {
                    $resp['status'] = 'success';
                }
                break;
            }
            $index++;
        }
    }
    return $resp;
}
function checkout($userID, $coupon) {
    global $productDAO, $userDAO, $orderDAO, $orderDetailDAO;
    $notifyDAO = new NotifyDAO();
    $discountDAO = new DiscountDAO();
    $resp = [];
    $user = null;
    if($userID != 'error') {
        $user = $userDAO->getUserByID($userID);
        $order = $orderDAO->getUnpayOrderByUserID($user->getID());
        $orderdetails = $orderDetailDAO->getAllOrderDetailByUserIdAndOrderID($user->getID(), $order->getID());
        $totalPrice = 0;
        $mail = new Mail();
        foreach ($orderdetails as $orderdetail) {
            $totalPrice += $orderdetail->getPrice();
        }

        $discountMoney = 0;
        if($coupon != 'error') {
            $discount = $discountDAO->getDiscountByUserID($user->getID(), $coupon) != false ? $discountDAO->getDiscountByUserID($user->getID(), $coupon) : false;
            
            if($discount != false) {
                $discountMoney = $discount->getPrice();
                $discountDAO->updateDiscountByUserID($user->getID(), $coupon);
                $resp['coupon'] = $coupon;
            } else $resp['coupon'] = 'fail coupon';
        } else $resp['coupon'] = 'no-coupon';

        if($user->getCurrency() < $totalPrice) {
            $resp['status'] = 'money';
        } else if(isset($_SESSION['cart']) && count($_SESSION['cart']) <= 0) {
            $resp['status'] = 'length';
        } else if($totalPrice <= 0) {
            $resp['status'] = 'cart-money';
        } else if($orderDAO->updateOrderToPayByUserID($user->getID(), $totalPrice = $totalPrice - $discountMoney < 0 ? 0 : $totalPrice - $discountMoney, date("Y-m-d"))) {
                $orderDAO->createOrderForUserID($user->getID(), date("Y-m-d"));
                $user->withdrawCurrency($totalPrice);
                $userDAO->widthdraw($totalPrice, $user->getID());
                $notifyDAO->createNotifyToUser($user->getID(), 2, $order->getID());
               
                foreach ($orderdetails as $orderdetail) {
                    $productDAO->updateProductSell($orderdetail->getProductID());
                    $notifyDAO->createNotifyToUser($userID, 1, $orderdetail->getProductID());
                }


                if($totalPrice >= 1000000 && $totalPrice < 5000000) {
                    $resp['discount'] = $discountDAO->insertNewDiscountForUser($user->getID(), 0) ? '100k' : 'fail';
                } else if($totalPrice >= 5000000 && $totalPrice < 10000000) {
                    $resp['discount'] = $discountDAO->insertNewDiscountForUser($user->getID(), 1) ? '200k' : 'fail';
                } else if($totalPrice >= 10000000) {
                    $resp['discount'] = $discountDAO->insertNewDiscountForUser($user->getID(), 2) ? '500k' : 'fail';
                } else $resp['discount'] = 'none';
                $mailOrder = array_map(function($mailOrderDetail) {
                    $productDAO = new ProductDAO();
                    $product = $productDAO->getProductByID($mailOrderDetail->getProductID());
                    return ['name' => $product->getName(), 'quantity' => $mailOrderDetail->getQuantity(), 'totalprice' => $mailOrderDetail->getPrice()];
                }, $orderdetails);
                $mailStr = $mail->getCheckoutMail($user, $mailOrder);
                
                $resp['status'] = $mail->sendMail($user->getEmail(), "Xác nhận đơn hàng", $mailStr) == 1 ? 'success' : 'mail';
               
        }  else {
            $resp['status'] = 'fail';
        }
    }
    else {
        $resp['status'] = 'login';
    }
    return $resp;
}
function minusProductFromCart($productID) {
    global $productDAO, $userDAO, $orderDAO, $orderDetailDAO;
    $resp = [];
    $product = $productDAO->getProductByID($productID);
    $user = isset($_SESSION['user']) ? $userDAO->getUserByID($_SESSION['user']) : '';

    if(isset($_SESSION['cart'])) {
        $index = 0;
        foreach($_SESSION['cart'] as $od) {
            if($od['id'] == $product->getID()) {
                if($od['quantity'] > 1) {
                    $od['quantity']--;
                    $quantity = $od['quantity'];
                    
                    $resp['product'] = ["id" => $product->getID(), "name" => $product->getName(), "img" => $product->getImg(), "quantity" => $quantity, "price" => $product->getTotalPrice() * $quantity, "fullprice" => $product->getPrice() * $quantity];

                    $_SESSION['cart'][$index] = ["id" => $product->getID(), "name" => $product->getName(), "img" => $product->getImg(), "quantity" => $quantity, "price" => $product->getTotalPrice() * $quantity, "fullprice" => $product->getPrice() * $quantity];

                    if(isset($_SESSION['user'])) {
                        $order = $orderDAO->getUnpayOrderByUserID($user->getID());
                        $resp['status'] = $orderDetailDAO->minusOrderDetailFromOrder($order->getID(), $productID, $quantity) ? "success" : 'fail';
                    } else {
                        $resp['status'] = 'success';
                    }
                    break;
                } else {
                    $resp = removeProductFromCart($productID);
                    $resp['status'] = 'remove';
                    break;
                }
            }
            $index++;
        } 
    } else {
        $resp['status'] = 'fail';
    }

    return $resp;
}

switch ($method) {
    case 'add':
        echo json_encode(addProductToCart($productID));
        session_write_close();
        
        break;
    case 'remove':
        echo json_encode(removeProductFromCart($productID));
        session_write_close();
        break;
    case 'minus':
        echo json_encode(minusProductFromCart($productID));
        session_write_close();
        break;
    case 'checkout':
        echo json_encode(checkout($userID, $coupon));
        session_write_close();
        break;
    default:
        # code...
        break;
}
?>