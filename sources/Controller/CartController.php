<?php
include "/Applications/XAMPP/xamppfiles/htdocs/pro1014_duan/sources/Utils/Database.php";
include "/Applications/XAMPP/xamppfiles/htdocs/pro1014_duan/sources/Model/DAO/UserDAO.php";
include "/Applications/XAMPP/xamppfiles/htdocs/pro1014_duan/sources/Model/DAO/ProductDAO.php";
include "/Applications/XAMPP/xamppfiles/htdocs/pro1014_duan/sources/Model/DAO/OrderDAO.php";
include "/Applications/XAMPP/xamppfiles/htdocs/pro1014_duan/sources/Model/DAO/OrderDetailDAO.php";

$productDAO = new ProductDAO();
$userDAO = new UserDAO();
$orderDAO = new OrderDAO();
$orderDetailDAO = new OrderDetailDAO();

session_start();

$productID = isset($_REQUEST['pid']) ? $_REQUEST['pid'] : 'error';
$method = isset($_REQUEST['method']) ? $_REQUEST['method'] : 'error';


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
        
        if($isContain === false) {
            $orderdetails[] = new OrderDetail($order->getID(), $product->getID(), $product->getTotalPrice());
            $orderDetailDAO->addOrderDetailToOrder($order->getID(), $productID, 1, false);
        }
        
        $resp['status'] = 'success';
        $resp['product'] = ["id" => $orderdetail->getProductID(), "name" => $product->getName(), "img" => $product->getImg(), "quantity" => $orderdetail->getQuantity(), "price" => $product->getTotalPrice() * $orderdetail->getQuantity(), "fullprice" => $product->getPrice() * $orderdetail->getQuantity()];

        $_SESSION['cart'][] = ["id" => $orderdetail->getProductID(), "name" => $product->getName(), "img" => $product->getImg(), "quantity" => $orderdetail->getQuantity(), "price" => $product->getTotalPrice()  * $orderdetail->getQuantity(), "fullprice" => $product->getPrice() * $orderdetail->getQuantity()];
    } else {
        $_SESSION['cart'] = isset($_SESSION['cart']) ? $_SESSION['cart'] : [];
        $isContain = false;
        $quantity = 1;
        foreach ($_SESSION['cart'] as $orderdetail) {
            if($orderdetail['id'] == $product->getID()) {
                $orderdetail['quantity'] += 1;
                $quantity = $orderdetail['quantity'];
                $isContain = true;
                break;
            }
        }

        if($isContain == false) {
            $_SESSION['cart'][] = ["id" => $product->getID(), "name" => $product->getName(), "img" => $product->getImg(), "quantity" => 1, "price" => $product->getTotalPrice(), "fullprice" => $product->getPrice()];
        }

        $resp['status'] = 'success';
        $resp['product'] = ["id" => $product->getID(), "name" => $product->getName(), "img" => $product->getImg(), "quantity" => $quantity, "price" => $product->getTotalPrice() * $quantity, "fullprice" => $product->getPrice() * $quantity];

    }


    return $resp;
}


switch ($method) {
    case 'add':
        echo json_encode(addProductToCart($productID));

        break;
    
    default:
        # code...
        break;
}
?>