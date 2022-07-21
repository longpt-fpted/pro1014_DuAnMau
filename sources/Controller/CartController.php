<?php
include "/Applications/XAMPP/xamppfiles/htdocs/pro1014_duan/sources/Utils/Database.php";
include "/Applications/XAMPP/xamppfiles/htdocs/pro1014_duan/sources/Utils/Mail.php";
include "/Applications/XAMPP/xamppfiles/htdocs/pro1014_duan/sources/Model/DAO/UserDAO.php";
include "/Applications/XAMPP/xamppfiles/htdocs/pro1014_duan/sources/Model/DAO/ProductDAO.php";
include "/Applications/XAMPP/xamppfiles/htdocs/pro1014_duan/sources/Model/DAO/OrderDAO.php";
include "/Applications/XAMPP/xamppfiles/htdocs/pro1014_duan/sources/Model/DAO/OrderDetailDAO.php";
include_once "/Applications/XAMPP/xamppfiles/htdocs/pro1014_duan/sources/Model/DAO/NotifyDAO.php";

$productDAO = new ProductDAO();
$userDAO = new UserDAO();
$orderDAO = new OrderDAO();
$orderDetailDAO = new OrderDetailDAO();
$mail = new Mail();
session_start();

$productID = isset($_REQUEST['pid']) ? $_REQUEST['pid'] : 'error';
$method = isset($_REQUEST['method']) ? $_REQUEST['method'] : 'error'; 
$userID = isset($_POST['userID']) ? $_POST['userID'] : 'error';

function addProductToCart($productID) {
    global $productDAO, $userDAO, $orderDAO, $orderDetailDAO;
    $resp = [];
    $product = $productDAO->getProductByID($productID);
    
    
    if(isset($_SESSION['user'])) {
        $isContain = false;
        $user = $userDAO->getUserByID($_SESSION['user']);
        $order = $orderDAO->getUnpayOrderByUserID($user->getID());
        $orderdetails = $orderDetailDAO->getAllOrderDetailByUserIdAndOrderID($user->getID(), $order->getID());
        
        foreach($orderdetails as $orderdetail) {
            if($productID == $orderdetail->getProductID()) {
                $orderdetail->addProduct();
                $isContain = true;
                $orderDetailDAO->addOrderDetailToOrder($order->getID(), $productID, $orderdetail->getQuantity(), true);
                break;
            }
        }
        
        if($isContain == false) {
            $orderdetails[] = new OrderDetail($order->getID(), $product->getID(), $product->getTotalPrice());
            $orderDetailDAO->addOrderDetailToOrder($order->getID(), $productID, 1, false);
        }
        
        $resp['status'] = 'success';

        /*
            ['status' => 'success', ]
        */
        $resp['product'] = ["id" => $product->getID(), "name" => $product->getName(), "img" => $product->getImg(), "quantity" => $orderdetail->getQuantity(), "price" => $product->getTotalPrice() * $orderdetail->getQuantity(), "fullprice" => $product->getPrice() * $orderdetail->getQuantity()];



        $_SESSION['cart'][] = ["id" => $product->getID(), "name" => $product->getName(), "img" => $product->getImg(), "quantity" => $orderdetail->getQuantity(), "price" => $product->getTotalPrice()  * $orderdetail->getQuantity(), "fullprice" => $product->getPrice() * $orderdetail->getQuantity()];
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
function minusProductFromCart($productID) {
    global $productDAO, $userDAO, $orderDAO, $orderDetailDAO;
    $resp = [];
    $product = $productDAO->getProductByID($productID);
    $user = isset($_SESSION['user']) ? $userDAO->getUserByID($_SESSION['user']) : '';

    if(isset($_SESSION['cart'])) {
        $index = 0;
        foreach($_SESSION['cart'] as $od) {
            if($od['id'] == $product->getID()) {
                var_dump($od['quantity']);
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
function checkout($userID) {
    global $productDAO, $userDAO, $orderDAO, $orderDetailDAO;
    $notifyDAO = new NotifyDAO();

    $resp = [];
    $user = null;
    if($userID != 'error') {
        $user = $userDAO->getUserByID($userID);
        $order = $orderDAO->getUnpayOrderByUserID($user->getID());
        $orderdetails = $orderDetailDAO->getAllOrderDetailByUserIdAndOrderID($user->getID(), $order->getID());
        $totalPrice = 0;

        foreach ($orderdetails as $orderdetail) {
            $totalPrice += $orderdetail->getPrice();
        }

        if($user->getCurrency() < $totalPrice) {
            $resp['status'] = 'money';
        } else if(count($_SESSION['cart']) <= 0) {
            $resp['status'] = 'length';
        } else if($orderDAO->updateOrderToPayByUserID($user->getID(), $totalPrice, date("Y-m-d"))) {
                $orderDAO->createOrderForUserID($user->getID(), date("Y-m-d"));
                $user->withdrawCurrency($totalPrice);
                $userDAO->widthdraw($totalPrice, $user->getID());
                $notifyDAO->createNotifyToUser($user->getID(), 2, $order->getID());
               
                foreach ($orderdetails as $orderdetail) {
                    $productDAO->updateProductSell($orderdetail->getProductID());
                    $notifyDAO->createNotifyToUser($userID, 1, $orderdetail->getProductID());
                }


                // Send mail...
               
                $resp['status'] = 'success';
        } else {
            $resp['status'] = 'fail';
        }
    }
    else {
        $resp['status'] = 'login';
    }
    return $resp;
}
switch ($method) {
    case 'add':
        echo json_encode(addProductToCart($productID));
        break;
    case 'remove':
        echo json_encode(removeProductFromCart($productID));
        break;
    case 'minus':
        echo json_encode(minusProductFromCart($productID));
        break;
    case 'checkout':
        echo json_encode(checkout($userID));
        break;
    default:
        # code...
        break;
}
?>