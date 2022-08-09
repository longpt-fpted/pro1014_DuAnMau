<?php 
    include('header.php');
    include('./topbar.php')
?>

<?php
$keyword = isset($_REQUEST['keyword']) ? $_REQUEST['keyword'] : '';
$productDAO = new ProductDAO();
$productSearch = $productDAO->getProductsByName($keyword);
?>
    <!-- Begin Page Content -->
    <div class="container-fluid">
        <!-- Page Heading -->
        
        <h2 id="welcome-admin">WELCOME TO ADMIN PAGE!</h1>
        
    </div>
    <!-- /.container-fluid -->

</div>
<!-- End of Main Content -->
<script src="js/validate-product.js"></script>
<?php
    include './footer.php'; 
    // include '/XAMPP/htdocs/pro1014_duan/sources/View/admin/footer.php'; 
?>
