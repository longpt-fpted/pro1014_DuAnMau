<?php 
    include('header.php');
    include('./topbar.php')
?>

    <!-- Begin Page Content -->
    <div class="container-fluid">
        <!-- Page Heading -->
        <h1 class="h3 mb-0 text-gray-800">Products</h1>  <br>  
        <div class="modal-overlay" id="modal-overlay"></div>
        <button id="btn-add" onclick="modal_add()">Thêm sản phẩm</button>
        <div class="modal-add" id="modal-add-form">
            <button id="btn-hidden" onclick="modal_hidden()">x</button>
            <form action="http://localhost/pro1014_duan/sources/controller/AddProductsController.php" enctype="multipart/form-data" id="modal-add-product" method="post">
                <p id="modal-add-title">Thêm sản phẩm</p>
                <h>Tên sản phẩm</h><br>
                <input type="text" id="name" name="name" placeholder="Tên sản phẩm"><br>   
                <h>Hình ảnh:</h>
                <input type="text" id="image" name="image" placeholder="Url hình ảnh">                            
                <h>Danh mục</h><br>
                <select name="category" id="category">
                    <option value=""></option>
                    <?php foreach($cates as $cate) {?>
                        <option value="<?php echo $cate->getID(); ?>"><?php echo $cate->getName(); ?></option>
                    <?php } ?>
                </select>
                <h>Giá niêm yết:</h><br>
                <input type="number" id="price" name="price" placeholder="Giá niêm yết" min="0" max="999999999"><br>
                <h>Sale:</h><br>
                <input type="number" id="sale_percent" name="sale_percent" placeholder="Giảm giá" max="100">
                <input type="submit" id="submit" value="Cập Nhật">
            </form>
        </div>                   
        <div class="show-information">
            <?php
                $products = $productDAO->getAllProducts();
                foreach ($products as $product) {
            ?>
            <div class="product-information">
                <div class="image">
                    <img src=".<?php echo $product->getImg() ?>" alt="">
                </div>
                <div class="detail">
                    <form action="http://localhost/pro1014_duan/sources/controller/UpdateProductsController.php" method="post" enctype="multipart/form-data" id="user-infor">
                        <table>
                            <tr>
                                <td><h>ID:</h></td>
                                <td><input type="text" id="id" name="id" value="<?php echo $product ->getID() ?>"><br>   </td>
                            </tr>
                            <tr>
                                <td><h>Tên sản phẩm:</h></td>
                                <td><input type="text" id="name" name="name" value="<?php echo $product ->getName() ?>"><br>   </td>
                            </tr>
                            <tr>
                                <td><h>Hình ảnh:</h></td>
                                <td><input type="text" id="image" name="image" value="<?php echo $product -> getImg() ?>"><br> </td>
                            </tr>
                            <tr>
                                <td><h>Danh mục:</h></td>
                                <td><select name="category" id="category">  
                                        <?php foreach($cates as $cate) {?>
                                            <option value="<?php echo $cate->getID(); ?>" <?php echo $cate->getID() == $product->getCateID() ? 'selected' : '' ?>><?php echo $cate->getName(); ?></option>
                                        <?php } ?>
                                    </select><br>
                                </td>
                            </tr>
                            <tr>
                                <td><h>Giá niêm yết:</h></td>
                                <td><input type="text" id="price" name="price" value="<?php echo $product -> getPrice() ?>đ"><br></td>
                            </tr>
                            <tr>
                                <td><h>Sale:</h></td>
                                <td><input type="text" id="sale_percent" name="sale_percent" value="<?php echo $product -> getSale() ?>%"><br></td>
                            </tr>
                            <tr>
                                <td><h>Tình trạng:</h></td>
                                <td><select name="is_available" id="is_available">
                                        <?php 
                                            if($product->getAvailable() == 1){
                                                echo "<option value='1'>Còn hàng</option>";
                                                echo "<option value='0'>Hết hàng</option>";
                                            }else if($product->getAvailable() == 0){
                                                echo "<option value='0'>Hết hàng</option>";
                                                echo "<option value='1'>Còn hàng</option>";
                                            }
                                        ?>
                                    </select>
                                </td>
                            </tr>
                        </table>
                        <input type="submit" id="submit" value="Cập Nhật">
                    </form>
                </div>
            </div>
        <?php } ?>
    </div>
    <!-- /.container-fluid -->

</div>
<!-- End of Main Content -->
        
    <footer class="sticky-footer bg-white">
        <div class="container my-auto">
            <div class="copyright text-center my-auto">
                <span>Copyright &copy; Your Website 2022</span>
            </div>
        </div>
    </footer>

    </div>
    <!-- End of Content Wrapper -->

</div>
<!-- End of Page Wrapper -->

    <!-- Scroll to Top Button-->
    <a class="scroll-to-top rounded" href="#page-top">
        <i class="fas fa-angle-up"></i>
    </a>

    <!-- Logout Modal-->
    <div class="modal fade" id="logoutModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
        aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Ready to Leave?</h5>
                    <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">×</span>
                    </button>
                </div>
                <div class="modal-body">Select "Logout" below if you are ready to end your current session.</div>
                <div class="modal-footer">
                    <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
                    <a class="btn btn-primary" href="login.html">Logout</a>
                </div>
            </div>
        </div>
    </div>

<?php 
    include('C:\xampp\htdocs\pro1014_DuAn\sources\View\admin\footer.php') 
?>