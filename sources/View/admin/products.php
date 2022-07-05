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
            <form action="" id="modal-add-product" method="post">
                <p id="modal-add-title">Thêm sản phẩm</p>
                <h>Tên sản phẩm</h><br>
                <input type="text" id="productname" name="productname" placeholder="Tên sản phẩm"><br>   
                <h>Hình ảnh:</h>
                <input type="text" id="image" name="image" placeholder="Url hình ảnh">                            
                <h>Danh mục</h><br>
                <select name="cate_name" id="cate_name">
                    <option value=""></option>
                    <option value="Action">Action</option>
                    <option value="FPS">FPS</option>
                    <option value="Video Production">Video Production</option>
                    <option value="Simulation">Simulation</option>
                    <option value="Sport">Sport</option>
                    <option value="Battle Field">Battle Field</option>
                    <option value="Animation">Animation</option>
                    <option value="Adventure">Adventure</option>
                    <option value="RPG">RPG</option>
                </select>
                <h>Giá niêm yết:</h><br>
                <input type="text" id="price" name="price" placeholder="Giá niêm yết"><br>
                <h>Sale:</h><br>
                <input type="text" id="sale" name="sale" placeholder="Giảm giá">
                <input type="submit" id="submit" value="Cập Nhật">
            </form>
        </div>                   
        <div class="show-information">
            <div class="product-information">
                <div class="image">
                    <img src="../admin/images/elden-ring.jpg" alt="">
                </div>
                <div class="detail">
                    <form action="" id="user-infor">
                        <table>
                            <tr>
                                <td><h>Tên sản phẩm:</h></td>
                                <td><input type="text" id="productname" name="productname" value="Elden Ring"><br>   </td>
                            </tr>
                            <tr>
                                <td><h>Hình ảnh:</h></td>
                                <td><input type="text" id="image" name="image" value="../admin/images/elden-ring.jpg"><br> </td>
                            </tr>
                            <tr>
                                <td><h>Danh mục:</h></td>
                                <td><select name="cate_name" id="cate_name">
                                        <option value="Action">Action</option>
                                        <option value="FPS">FPS</option>
                                        <option value="Video Production">Video Production</option>
                                        <option value="Simulation">Simulation</option>
                                        <option value="Sport">Sport</option>
                                        <option value="Battle Field">Battle Field</option>
                                        <option value="Animation">Animation</option>
                                        <option value="Adventure">Adventure</option>
                                        <option value="RPG">RPG</option>
                                    </select><br>
                                </td>
                            </tr>
                            <tr>
                                <td><h>Giá niêm yết:</h></td>
                                <td><input type="text" id="price" name="price" value="699.000đ"><br></td>
                            </tr>
                            <tr>
                                <td><h>Sale:</h></td>
                                <td><input type="text" id="sale" name="sale" value="20%"><br></td>
                            </tr>
                        </table>
                        <input type="submit" id="submit" value="Cập Nhật">
                    </form>
                </div>
            </div>
            <div class="product-information">
                <div class="image">
                    <img src="../admin/images/elden-ring.jpg" alt="">
                </div>
                <div class="detail">
                    <form action="" id="user-infor">
                        <table>
                            <tr>
                                <td><h>Tên sản phẩm:</h></td>
                                <td><input type="text" id="productname" name="productname" value="Elden Ring"><br>   </td>
                            </tr>
                            <tr>
                                <td><h>Hình ảnh:</h></td>
                                <td><input type="text" id="image" name="image" value="../admin/images/elden-ring.jpg"><br> </td>
                            </tr>
                            <tr>
                                <td><h>Danh mục:</h></td>
                                <td><select name="cate_name" id="cate_name">
                                        <option value="Action">Action</option>
                                        <option value="FPS">FPS</option>
                                        <option value="Video Production">Video Production</option>
                                        <option value="Simulation">Simulation</option>
                                        <option value="Sport">Sport</option>
                                        <option value="Battle Field">Battle Field</option>
                                        <option value="Animation">Animation</option>
                                        <option value="Adventure">Adventure</option>
                                        <option value="RPG">RPG</option>
                                    </select><br>
                                </td>
                            </tr>
                            <tr>
                                <td><h>Giá niêm yết:</h></td>
                                <td><input type="text" id="price" name="price" value="699.000đ"><br></td>
                            </tr>
                            <tr>
                                <td><h>Sale:</h></td>
                                <td><input type="text" id="sale" name="sale" value="20%"><br></td>
                            </tr>
                        </table>
                        <input type="submit" id="submit" value="Cập Nhật">
                    </form>
                </div>
            </div>
            <div class="product-information">
                <div class="image">
                    <img src="../admin/images/elden-ring.jpg" alt="">
                </div>
                <div class="detail">
                    <form action="" id="user-infor">
                        <table>
                            <tr>
                                <td><h>Tên sản phẩm:</h></td>
                                <td><input type="text" id="productname" name="productname" value="Elden Ring"><br>   </td>
                            </tr>
                            <tr>
                                <td><h>Hình ảnh:</h></td>
                                <td><input type="text" id="image" name="image" value="../admin/images/elden-ring.jpg"><br> </td>
                            </tr>
                            <tr>
                                <td><h>Danh mục:</h></td>
                                <td><select name="cate_name" id="cate_name">
                                        <option value="Action">Action</option>
                                        <option value="FPS">FPS</option>
                                        <option value="Video Production">Video Production</option>
                                        <option value="Simulation">Simulation</option>
                                        <option value="Sport">Sport</option>
                                        <option value="Battle Field">Battle Field</option>
                                        <option value="Animation">Animation</option>
                                        <option value="Adventure">Adventure</option>
                                        <option value="RPG">RPG</option>
                                    </select><br>
                                </td>
                            </tr>
                            <tr>
                                <td><h>Giá niêm yết:</h></td>
                                <td><input type="text" id="price" name="price" value="699.000đ"><br></td>
                            </tr>
                            <tr>
                                <td><h>Sale:</h></td>
                                <td><input type="text" id="sale" name="sale" value="20%"><br></td>
                            </tr>
                        </table>
                        <input type="submit" id="submit" value="Cập Nhật">
                    </form>
                </div>
            </div>
            <div class="product-information">
                <div class="image">
                    <img src="../admin/images/elden-ring.jpg" alt="">
                </div>
                <div class="detail">
                    <form action="" id="user-infor">
                        <table>
                            <tr>
                                <td><h>Tên sản phẩm:</h></td>
                                <td><input type="text" id="productname" name="productname" value="Elden Ring"><br>   </td>
                            </tr>
                            <tr>
                                <td><h>Hình ảnh:</h></td>
                                <td><input type="text" id="image" name="image" value="../admin/images/elden-ring.jpg"><br> </td>
                            </tr>
                            <tr>
                                <td><h>Danh mục:</h></td>
                                <td><select name="cate_name" id="cate_name">
                                        <option value="Action">Action</option>
                                        <option value="FPS">FPS</option>
                                        <option value="Video Production">Video Production</option>
                                        <option value="Simulation">Simulation</option>
                                        <option value="Sport">Sport</option>
                                        <option value="Battle Field">Battle Field</option>
                                        <option value="Animation">Animation</option>
                                        <option value="Adventure">Adventure</option>
                                        <option value="RPG">RPG</option>
                                    </select><br>
                                </td>
                            </tr>
                            <tr>
                                <td><h>Giá niêm yết:</h></td>
                                <td><input type="text" id="price" name="price" value="699.000đ"><br></td>
                            </tr>
                            <tr>
                                <td><h>Sale:</h></td>
                                <td><input type="text" id="sale" name="sale" value="20%"><br></td>
                            </tr>
                        </table>
                        <input type="submit" id="submit" value="Cập Nhật">
                    </form>
                </div>
            </div>
            <div class="product-information">
                <div class="image">
                    <img src="../admin/images/pubg.jpg" alt="">
                </div>
                <div class="detail">
                    <form action="" id="user-infor">
                        <table>
                            <tr>
                                <td><h>Tên sản phẩm:</h></td>
                                <td><input type="text" id="productname" name="productname" value="PlayerUnknow's Battleground"><br>   </td>
                            </tr>
                            <tr>
                                <td><h>Hình ảnh:</h></td>
                                <td><input type="text" id="image" name="image" value="../admin/images/pubg.jpg"><br> </td>
                            </tr>
                            <tr>
                                <td><h>Danh mục:</h></td>
                                <td><select name="cate_name" id="cate_name">
                                        <option value="Action">Action</option>
                                        <option value="FPS">FPS</option>
                                        <option value="Video Production">Video Production</option>
                                        <option value="Simulation">Simulation</option>
                                        <option value="Sport">Sport</option>
                                        <option value="Battle Field">Battle Field</option>
                                        <option value="Animation">Animation</option>
                                        <option value="Adventure">Adventure</option>
                                        <option value="RPG">RPG</option>
                                    </select><br>
                                </td>
                            </tr>
                            <tr>
                                <td><h>Giá niêm yết:</h></td>
                                <td><input type="text" id="price" name="price" value="699.000đ"><br></td>
                            </tr>
                            <tr>
                                <td><h>Sale:</h></td>
                                <td><input type="text" id="sale" name="sale" value="20%"><br></td>
                            </tr>
                        </table>
                        <input type="submit" id="submit" value="Cập Nhật">
                    </form>
                </div>
            </div>
            <div class="product-information">
                <div class="image">
                    <img src="../admin/images/pubg.jpg" alt="">
                </div>
                <div class="detail">
                    <form action="" id="user-infor">
                        <table>
                            <tr>
                                <td><h>Tên sản phẩm:</h></td>
                                <td><input type="text" id="productname" name="productname" value="PlayerUnknow's Battleground"><br>   </td>
                            </tr>
                            <tr>
                                <td><h>Hình ảnh:</h></td>
                                <td><input type="text" id="image" name="image" value="../admin/images/pubg.jpg"><br> </td>
                            </tr>
                            <tr>
                                <td><h>Danh mục:</h></td>
                                <td><select name="cate_name" id="cate_name">
                                        <option value="Action">Action</option>
                                        <option value="FPS">FPS</option>
                                        <option value="Video Production">Video Production</option>
                                        <option value="Simulation">Simulation</option>
                                        <option value="Sport">Sport</option>
                                        <option value="Battle Field">Battle Field</option>
                                        <option value="Animation">Animation</option>
                                        <option value="Adventure">Adventure</option>
                                        <option value="RPG">RPG</option>
                                    </select><br>
                                </td>
                            </tr>
                            <tr>
                                <td><h>Giá niêm yết:</h></td>
                                <td><input type="text" id="price" name="price" value="699.000đ"><br></td>
                            </tr>
                            <tr>
                                <td><h>Sale:</h></td>
                                <td><input type="text" id="sale" name="sale" value="20%"><br></td>
                            </tr>
                        </table>
                        <input type="submit" id="submit" value="Cập Nhật">
                    </form>
                </div>
            </div>
            <div class="product-information">
                <div class="image">
                    <img src="../admin/images/pubg.jpg" alt="">
                </div>
                <div class="detail">
                    <form action="" id="user-infor">
                        <table>
                            <tr>
                                <td><h>Tên sản phẩm:</h></td>
                                <td><input type="text" id="productname" name="productname" value="PlayerUnknow's Battleground"><br>   </td>
                            </tr>
                            <tr>
                                <td><h>Hình ảnh:</h></td>
                                <td><input type="text" id="image" name="image" value="../admin/images/pubg.jpg"><br> </td>
                            </tr>
                            <tr>
                                <td><h>Danh mục:</h></td>
                                <td><select name="cate_name" id="cate_name">
                                        <option value="Action">Action</option>
                                        <option value="FPS">FPS</option>
                                        <option value="Video Production">Video Production</option>
                                        <option value="Simulation">Simulation</option>
                                        <option value="Sport">Sport</option>
                                        <option value="Battle Field">Battle Field</option>
                                        <option value="Animation">Animation</option>
                                        <option value="Adventure">Adventure</option>
                                        <option value="RPG">RPG</option>
                                    </select><br>
                                </td>
                            </tr>
                            <tr>
                                <td><h>Giá niêm yết:</h></td>
                                <td><input type="text" id="price" name="price" value="699.000đ"><br></td>
                            </tr>
                            <tr>
                                <td><h>Sale:</h></td>
                                <td><input type="text" id="sale" name="sale" value="20%"><br></td>
                            </tr>
                        </table>
                        <input type="submit" id="submit" value="Cập Nhật">
                    </form>
                </div>
            </div>
            <div class="product-information">
                <div class="image">
                    <img src="../admin/images/pubg.jpg" alt="">
                </div>
                <div class="detail">
                    <form action="" id="user-infor">
                        <table>
                            <tr>
                                <td><h>Tên sản phẩm:</h></td>
                                <td><input type="text" id="productname" name="productname" value="PlayerUnknow's Battleground"><br>   </td>
                            </tr>
                            <tr>
                                <td><h>Hình ảnh:</h></td>
                                <td><input type="text" id="image" name="image" value="../admin/images/pubg.jpg"><br> </td>
                            </tr>
                            <tr>
                                <td><h>Danh mục:</h></td>
                                <td><select name="cate_name" id="cate_name">
                                        <option value="Action">Action</option>
                                        <option value="FPS">FPS</option>
                                        <option value="Video Production">Video Production</option>
                                        <option value="Simulation">Simulation</option>
                                        <option value="Sport">Sport</option>
                                        <option value="Battle Field">Battle Field</option>
                                        <option value="Animation">Animation</option>
                                        <option value="Adventure">Adventure</option>
                                        <option value="RPG">RPG</option>
                                    </select><br>
                                </td>
                            </tr>
                            <tr>
                                <td><h>Giá niêm yết:</h></td>
                                <td><input type="text" id="price" name="price" value="699.000đ"><br></td>
                            </tr>
                            <tr>
                                <td><h>Sale:</h></td>
                                <td><input type="text" id="sale" name="sale" value="20%"><br></td>
                            </tr>
                        </table>
                        <input type="submit" id="submit" value="Cập Nhật">
                    </form>
                </div>
            </div>
        </div>
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