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
        <h1 class="h3 mb-0 text-gray-800">Products</h1>  <br>  
        <form
            action="" method="Post"
            class="d-none d-sm-inline-block form-inline mr-auto ml-md-3 my-2 my-md-0 mw-100 navbar-search">
            <div class="input-group">
                <input type="text" class="form-control bg-light border-0 small" id="keyword" name="keyword" placeholder="Search for..."
                    aria-label="Search" aria-describedby="basic-addon2">
                <div class="input-group-append">
                    <button class="btn btn-primary" type="submit">
                        <i class="fas fa-search fa-sm"></i>
                    </button>
                </div>
            </div>
        </form>
        <div class="modal-overlay" id="modal-overlay"></div>
        <button id="btn-add" onclick="modal_add()">Thêm sản phẩm</button>
        <div class="modal-add" id="modal-add-form">
            <button id="btn-hidden" onclick="modal_hidden()">x</button>
            <form action="https://dsgobruh.000webhostapp.com/Controller/AddProductsController.php" onsubmit="return check()" enctype="multipart/form-data" id="modal-add-product" method="post">
                <p id="modal-add-title">Thêm sản phẩm</p>
                <span>Tên sản phẩm</span><br>
                <input type="text" id="name" name="name" onclick="removeErrorName()" placeholder="Tên sản phẩm"><br>   
                <div id="error-name" class="error-validate"></div>

                <span>Hình ảnh:</span>
                <input type="file" id="image" name="image" class="image-input" onclick="removeErrorImage()">                            
                <div id="error-image" class="error-validate"></div>

                <span>Danh mục</span><br>
                <select name="category" id="category" onclick="removeErrorCategory()">
                    <option value=""></option>
                    <?php foreach($cates as $cate) {?>
                        <option value="<?php echo $cate->getID(); ?>"><?php echo $cate->getName(); ?></option>
                    <?php } ?>
                </select>
                <div id="error-category" class="error-validate"></div>

                <span>Giá niêm yết:</span><br>
                <input type="number" id="price" name="price" onclick="removeErrorPrice()" placeholder="Giá niêm yết" min="0" step="1000" max="999999999"><br>
                <div id="error-price" class="error-validate"></div>

                <span>Sale:</span><br>
                <input type="number" id="sale_percent" name="sale_percent" placeholder="Giảm giá" min="0" max="100">
                <input type="submit" id="submit" value="Cập Nhật">
            </form>
        </div>                   
        <div class="show-information">
            <?php
                if($productSearch != false && count($productSearch) > 0)
                foreach ($productSearch as $product){
            ?>
            <div class="product-information">
                <div class="image">
                    <img src=".<?php echo $product->getImg() ?>" alt="">
                </div>
                <div class="detail">
                    <form action="https://dsgobruh.000webhostapp.com/Controller/UpdateProductsController.php" method="post" enctype="multipart/form-data" id="user-infor">
                        <table>
                            <tr>
                                <input type="text" id="id" name="id" value="<?php echo $product ->getID() ?>" hidden><br>
                            </tr>
                            <tr>
                                <td><span>Tên sản phẩm:</span></td>
                                <td><input type="text" id="name" name="name" value="<?php echo $product ->getName() ?>"><br>   </td>
                            </tr>
                            <tr>
                                <td><span>Hình ảnh:</span></td>
                                <td><input type="file" id="image" name="image"><br> </td>
                            </tr>
                            <tr>
                                <td><span>Danh mục:</span></td>
                                <td><select name="category" id="category">  
                                        <?php foreach($cates as $cate) {?>
                                            <option value="<?php echo $cate->getID(); ?>" <?php echo $cate->getID() == $product->getCateID() ? 'selected' : '' ?>><?php echo $cate->getName(); ?></option>
                                        <?php } ?>
                                    </select><br>
                                </td>
                            </tr>
                            <tr>
                                <td><span>Giá niêm yết:</span></td>
                                <td><input type="text" id="price" name="price" value="<?php echo $product -> getPrice() ?>"><br></td>
                            </tr>
                            <tr>
                                <td><span>Sale:</span></td>
                                <td><input type="text" id="sale_percent" name="sale_percent" value="<?php echo $product -> getSale() ?>"><br></td>
                            </tr>
                            <tr>
                                <td><span>Đánh giá:</span></td>
                                <td><input type="text" id="rating" name="rating" value="<?php echo $product -> getRating() ?>"><br></td>
                            </tr>
                            <tr>
                                <td><span>Lượt mua:</span></td>
                                <td><input type="text" id="sell_count" name="sell_count" value="<?php echo $product -> getSellCount() ?>"><br></td>
                            </tr>
                            <tr>
                                <td><span>Lượt xem:</span></td>
                                <td><input type="text" id="view" name="view" value="<?php echo $product -> getView() ?>"><br></td>
                            </tr>
                            <tr>
                                <td><span>Tình trạng:</span></td>
                                <td><select name="is_available" id="is_available">
                                        <option value='1' <?php echo $product->getID() == 1 ? 'selected' : '' ?>>Còn hàng</option> 
                                        <option value='0' <?php echo $product->getID() == 0 ? 'selected' : '' ?>>Hết hàng</option> 
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
<script src="js/validate-product.js"></script>
<?php
    include './footer.php'; 
    // include '/XAMPP/htdocs/pro1014_duan/sources/View/admin/footer.php'; 
?>

