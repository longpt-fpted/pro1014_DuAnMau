<?php
include "/storage/ssd2/188/19378188/public_html/Utils/Database.php";
include "/storage/ssd2/188/19378188/public_html/Model/DAO/CategoryDAO.php";
$method = isset($_REQUEST['method']) ? $_REQUEST['method'] : 'error';
$name = isset($_REQUEST['name']) ? $_REQUEST['name'] : 'error';
$id = isset($_REQUEST['id']) ? $_REQUEST['id'] : 'error';


function addCategory($name) {
    $cateDAO = new CategoryDAO();
    $resp = [];
    $resp['status'] = $cateDAO->insertNewCategory($name) ? 'success' : 'fail';
    return $resp;
}
function updateCategory($id, $name) {
    $cateDAO = new CategoryDAO();
    $resp = [];
    $resp['status'] = $cateDAO->updateCategoryByID($id, $name) ? 'success' : 'fail';
    return $resp;
}
switch ($method) {
    case 'add':
        echo json_encode(addCategory($name));
        break;
    case 'update':
        echo json_encode(updateCategory($id, $name));
        break;
    default:
        # code...
        break;
}
?>