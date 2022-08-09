<?php 
session_start();
include "/storage/ssd2/188/19378188/public_html/Utils/Database.php";
include "/storage/ssd2/188/19378188/public_html/Utils/Utils.php";
include "/storage/ssd2/188/19378188/public_html/Utils/Mail.php";
include "/storage/ssd2/188/19378188/public_html/Model/DAO/UserDAO.php";
include "/storage/ssd2/188/19378188/public_html/Model/DAO/ProductDAO.php";
include "/storage/ssd2/188/19378188/public_html/Model/DAO/CategoryDAO.php";
include "/storage/ssd2/188/19378188/public_html/Model/DAO/FeedbackDAO.php";
include "/storage/ssd2/188/19378188/public_html/Model/DAO/ContactDAO.php";
$userDAO = new UserDAO();
$users = $userDAO->getAllUsers();

$productDAO = new ProductDAO();
$products = $productDAO->getAllProductsWithoutAvailable();

$categoryDAO = new CategoryDAO();
$cates = $categoryDAO->getAllCategories();

$utils = new Utils();

$feedbackDAO = new FeedbackDAO();
$feedbacks = $feedbackDAO->getAllFeedbacks();

$contactDAO = new ContactDAO();
$contacts = $contactDAO->getAllContacts() != false ? $contactDAO->getAllContacts() : [];

if(!isset($_SESSION['admin'])){ 
    header("location: ./login.php"); 
}

?>
<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>SB Admin 2 - Dashboard</title>

    <!-- Custom fonts for this template-->
    <link href="vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
    <link
        href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i"
        rel="stylesheet">

    <!-- Custom styles for this template-->
    <link href="https://dsgobruh.000webhostapp.com/View/assets/css/style.css" rel="stylesheet">
    <link href="css/sb-admin-2.min.css" rel="stylesheet">
    <link rel="stylesheet" href="css/responsive.css">
    
    <script src="https://dsgobruh.000webhostapp.com/View/assets/js/main.js"></script>
    <script src="https://dsgobruh.000webhostapp.com/View/assets/js/ajax.js"></script>
</head>

<body id="page-top">

    <!-- Page Wrapper -->
    <div id="wrapper">

        <!-- Sidebar -->
        <ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">

            <!-- Sidebar - Brand -->
            <a class="sidebar-brand d-flex align-items-center justify-content-center" href="index.php">
                <div class="sidebar-brand-icon rotate-n-15">
                    <img src="images/logo1.png" alt="logo" width="50vh">
                </div>
                <div class="sidebar-brand-text mx-3">DS Admin</div>
            </a>

            <!-- Divider -->
            <hr class="sidebar-divider my-0">

            
            <!-- Divider -->
            <hr class="sidebar-divider">

            <!-- Heading -->
            <div class="sidebar-heading">
                Interface
            </div>

            <!-- Nav Item - Pages Collapse Menu -->
            <li class="nav-item">
                <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseTwo"
                    aria-expanded="true" aria-controls="collapseTwo">
                    <i class="fas fa-fw fa-cog"></i>
                    <span>Quản lí</span>
                </a>
                <div id="collapseTwo" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
                    <div class="bg-white py-2 collapse-inner rounded">
                        <h6 class="collapse-header">Danh sách quản lí:</h6>
                        <a class="collapse-item" href="users.php">Thành viên</a>
                        <a class="collapse-item" href="products.php">Sản phẩm</a>
                        <a class="collapse-item" href="categories.php">Danh mục</a>
                        <a class="collapse-item" href="feedbacks.php">Phản hồi</a>
                        <a class="collapse-item" href="contacts.php">Liên lạc</a>
                    </div>
                </div>
            </li>

            <!-- Nav Item - Utilities Collapse Menu -->
            <li class="nav-item">
                <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseUtilities"
                    aria-expanded="true" aria-controls="collapseUtilities">
                    <i class="fas fa-fw fa-wrench"></i>
                    <span>Tuỳ chọn</span>
                </a>
                <div id="collapseUtilities" class="collapse" aria-labelledby="headingUtilities"
                    data-parent="#accordionSidebar">
                    <div class="bg-white py-2 collapse-inner rounded">
                        <h6 class="collapse-header">Tuỳ chọn:</h6>
                        <a class="collapse-item" href="#">Colors</a>
                        <a class="collapse-item" href="#">Borders</a>
                        <a class="collapse-item" href="#">Animations</a>
                        <a class="collapse-item" href="#">Other</a>
                    </div>
                </div>
            </li>

            <!-- Divider -->
            <hr class="sidebar-divider">

            <!-- Heading -->

            <!-- Main Page  -->
            
            <li class="nav-item">
                <a class="nav-link" href="../index.php">
                <i class="fas fa-laptop-house"></i>
                    <span>Trang chủ</span></a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="./charts.php">
                <i class="fas fa-fw fa-chart-area"></i>
                <span>Biểu đồ</span></a>
            </li>

            <!-- Divider -->
            <hr class="sidebar-divider d-none d-md-block">

            <!-- Sidebar Toggler (Sidebar) -->
            <div class="text-center d-none d-md-inline">
                <button class="rounded-circle border-0" id="sidebarToggle"></button>
            </div>

            <!-- Sidebar Message -->

        </ul>