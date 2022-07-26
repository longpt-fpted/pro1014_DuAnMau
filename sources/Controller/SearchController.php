<?php
include "/Applications/XAMPP/xamppfiles/htdocs/pro1014_duan/sources/Utils/Database.php";
include "../Model/DAO/CategoryDAO.php";
include "../Model/DAO/ProductDAO.php";

$s_cate = isset($_REQUEST['category']) ? $_REQUEST['category'] : 'none';
$s_min = isset($_REQUEST['min']) ? $_REQUEST['min'] : 'none';
$s_max = isset($_REQUEST['max']) ? $_REQUEST['max'] : 'none';
$s_sort = isset($_REQUEST['sort']) ? $_REQUEST['sort'] : 'none';
$s_keyword = isset($_REQUEST['keyword']) ? $_REQUEST['keyword'] : 'none';
function getSearchingProducts($cate, $min, $max, $keyword) {
    $resp = [];
    $productDAO = new ProductDAO();
    $products = $productDAO->getProductsByKeywords($cate, $min, $max, $keyword);
    $resp['method'] = 'default';
    $resp['status'] = $products != false ? 'success' : 'fail';
    if($resp['status'] == 'success') {
        foreach ($products as $product) {
            $resp['products'][] = ['id' => $product->getID(), 'name' => $product->getName(), 'fullprice' => $product->getPrice(), 'price' => $product->getTotalPrice(), 'image' => $product->getImg(), 'sale' => $product->getSale()];
        }
    }
    return $resp;
}
function getNewestProducts($cate, $min, $max, $keyword) {
    $resp = [];
    $productDAO = new ProductDAO();
    $products = $productDAO->getNewestProductsForSearch($cate, $min, $max, $keyword);
    $resp['method'] = 'newest';
    $resp['status'] = $products != false ? 'success' : 'fail';
    if($resp['status'] == 'success') {
        foreach ($products as $product) {
            $resp['products'][] = ['id' => $product->getID(), 'name' => $product->getName(), 'fullprice' => $product->getPrice(), 'price' => $product->getTotalPrice(), 'image' => $product->getImg(), 'sale' => $product->getSale()];
        }
    }
    return $resp;
}
function getHotProducts($cate, $min, $max, $keyword) {
    $resp = [];
    $productDAO = new ProductDAO();
    $products = $productDAO->getHotProductsForSearch($cate, $min, $max, $keyword);
    $resp['method'] = 'hot';
    $resp['status'] = $products != false ? 'success' : 'fail';
    if($resp['status'] == 'success') {
        foreach ($products as $product) {
            $resp['products'][] = ['id' => $product->getID(), 'name' => $product->getName(), 'fullprice' => $product->getPrice(), 'price' => $product->getTotalPrice(), 'image' => $product->getImg(), 'sale' => $product->getSale()];
        }
    }
    return $resp;
}
function getSaleProducts($cate, $min, $max, $keyword) {
    $resp = [];
    $productDAO = new ProductDAO();
    $products = $productDAO->getSaleProductsForSearch($cate, $min, $max, $keyword);
    $resp['method'] = 'sale';
    $resp['status'] = $products != false ? 'success' : 'fail';
    if($resp['status'] == 'success') {
        foreach ($products as $product) {
            $resp['products'][] = ['id' => $product->getID(), 'name' => $product->getName(), 'fullprice' => $product->getPrice(), 'price' => $product->getTotalPrice(), 'image' => $product->getImg(), 'sale' => $product->getSale()];
        }
    }
    return $resp;
}
function getProductsForSearchWithPriceIncrease($cate, $min, $max, $keyword) {
    $resp = [];
    $productDAO = new ProductDAO();
    $products = $productDAO->getProductsForSearchWithPriceIncrease($cate, $min, $max, $keyword);
    $resp['method'] = 'price-increase';
    $resp['status'] = $products != false ? 'success' : 'fail';
    if($resp['status'] == 'success') {
        foreach ($products as $product) {
            $resp['products'][] = ['id' => $product->getID(), 'name' => $product->getName(), 'fullprice' => $product->getPrice(), 'price' => $product->getTotalPrice(), 'image' => $product->getImg(), 'sale' => $product->getSale()];
        }
    }
    return $resp;
}
function getProductsForSearchWithPriceDecrease($cate, $min, $max, $keyword) {
    $resp = [];
    $productDAO = new ProductDAO();
    $products = $productDAO->getProductsForSearchWithPriceDecrease($cate, $min, $max, $keyword);
    $resp['method'] = 'price-decrease';
    $resp['status'] = $products != false ? 'success' : 'fail';
    if($resp['status'] == 'success') {
        foreach ($products as $product) {
            $resp['products'][] = ['id' => $product->getID(), 'name' => $product->getName(), 'fullprice' => $product->getPrice(), 'price' => $product->getTotalPrice(), 'image' => $product->getImg(), 'sale' => $product->getSale()];
        }
    }
    return $resp;
}
function getProductsForSearchWithNameIncrease($cate, $min, $max, $keyword) {
    $resp = [];
    $productDAO = new ProductDAO();
    $products = $productDAO->getProductsForSearchWithNameIncrease($cate, $min, $max, $keyword);
    $resp['method'] = 'name-increase';
    $resp['status'] = $products != false ? 'success' : 'fail';
    if($resp['status'] == 'success') {
        foreach ($products as $product) {
            $resp['products'][] = ['id' => $product->getID(), 'name' => $product->getName(), 'fullprice' => $product->getPrice(), 'price' => $product->getTotalPrice(), 'image' => $product->getImg(), 'sale' => $product->getSale()];
        }
    }
    return $resp;
}
function getProductsForSearchWithNameDecrease($cate, $min, $max, $keyword) {
    $resp = [];
    $productDAO = new ProductDAO();
    $products = $productDAO->getProductsForSearchWithNameDecrease($cate, $min, $max, $keyword);
    $resp['method'] = 'name-decrease';
    $resp['status'] = $products != false ? 'success' : 'fail';
    if($resp['status'] == 'success') {
        foreach ($products as $product) {
            $resp['products'][] = ['id' => $product->getID(), 'name' => $product->getName(), 'fullprice' => $product->getPrice(), 'price' => $product->getTotalPrice(), 'image' => $product->getImg(), 'sale' => $product->getSale()];
        }
    }
    return $resp;
}
switch ($s_sort) {
    case 'newest':
        echo json_encode(getNewestProducts($s_cate, $s_min, $s_max, $s_keyword));
        break;
    case 'hot':
        echo json_encode(getHotProducts($s_cate, $s_min, $s_max, $s_keyword));
        break;
    case 'sale':
        echo json_encode(getSaleProducts($s_cate, $s_min, $s_max, $s_keyword));
        break;
    case 'increase':
        echo json_encode(getProductsForSearchWithPriceIncrease($s_cate, $s_min, $s_max, $s_keyword));
        break;
    case 'decrease':
        echo json_encode(getProductsForSearchWithPriceDecrease($s_cate, $s_min, $s_max, $s_keyword));
        break;
    case 'atoz':
        echo json_encode(getProductsForSearchWithNameIncrease($s_cate, $s_min, $s_max, $s_keyword));
        break;
    case 'ztoa':
        echo json_encode(getProductsForSearchWithNameDecrease($s_cate, $s_min, $s_max, $s_keyword));
        break;
    case 'default':
        echo json_encode(getSearchingProducts($s_cate, $s_min, $s_max, $s_keyword));
        break;
}
?>