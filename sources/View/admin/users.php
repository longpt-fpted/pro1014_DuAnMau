<?php 
    include('./header.php');
    include('./topbar.php');
?>
            <!-- Begin Page Content -->
    <div class="container-fluid">

        <!-- Page Heading -->
        <h1 class="h3 mb-4 text-gray-800">Users</h1>

        <button id="btn-add" onclick="modal_add()">Thêm thành viên</button>
        <div class="modal-overlay" id="modal-overlay"></div>
        <div class="modal-add" id="modal-add-form">
            <button id="btn-hidden" onclick="modal_hidden()">x</button>
            <form action="http://localhost/pro1014_duan/sources/controller/AddUsersController.php" enctype="multipart/form-data" method="post">
                <p id="modal-add-title">Thêm thành viên</p>
                <span>Họ và tên:</span><br>
                <input type="text" id="fullname" name="fullname" onclick="removeErrorFullname()" placeholder="Họ và tên"><br>  
                <div id="error-fullname" class="error-validate"></div>

                <span>Tên Đăng nhập:</span><br>
                <input type="text" id="username" name="username" onclick="removeErrorUsername()" placeholder="Tên đăng nhập"><br>      
                <div id="error-username" class="error-validate"></div>

                <span>Mật khẩu:</span><br>
                <input type="password" id="password" name="password" onclick="removeErrorPassword()" placeholder="Mật khẩu"><br>        
                <div id="error-password" class="error-validate"></div>

                <span>Email:</span><br>
                <input type="text" id="email" name="email" onclick="removeErrorEmail()" placeholder="Địa chỉ email"><br>
                <div id="error-email" class="error-validate"></div>

                <span>Số điện thoại:</span><br>
                <input type="text" id="phone-number" name="phone-number"  onclick="removeErrorPhonenumber()" placeholder="Số điện thoại"><br>
                <div id="error-phonenumber" class="error-validate"></div>

                <span>Vai trò:</span><br>
                <select name="role" id="role">
                    <option value=""></option>
                    <option value="1">Quản trị viên</option>
                    <option value="0">Thành viên</option>
                </select><br>
                <input type="submit" id="submit" onclick="return check()" value="Cập Nhật">
            </form>
            <!-- <button onclick="check()">check</button> -->
        </div> 
        
        <div class="show-information">
            <?php
                foreach ($users as $user) {
            ?>
            <div class="information">
                <div class="image">
                    <img src="./images/avatar.png" alt="">
                </div>
                <div class="detail">
                    <form action="http://localhost/pro1014_duan/sources/Controller/UpdateUsersController.php" id="user-infor" method="post">
                        <input type="text" id="id" name="id" value="<?php
                        echo $user->getID()?>" hidden><br>
                        <span>Họ và tên:</span><br>
                        <input type="text" id="fullname" name="fullname" value="<?php 
                        echo $user->getFullname(); ?>"><br>                               
                        <span>Email:</span><br>
                        <input type="text" id="email" name="email" value="<?php 
                        echo $user->getEmail(); ?>"><br>
                        <span>Số điện thoại:</span><br>
                        <input type="text" id="phone-number" name="phone-number" value="<?php 
                        echo $user->getPhone(); ?>"><br>
                        <span>Vai trò:</span><br>
                        <select name="role" id="role">
                            <option value='0' <?php echo $user->getRoleID() == 0 ? 'selected' : '' ?>>Thành viên</option> 
                            <option value='1' <?php echo $user->getRoleID() == 1 ? 'selected' : '' ?>>Quản trị viên</option> 
                        </select><br>
                        <input type="submit" id="submit" value="Cập Nhật">
                    </form>
                </div>
            </div>
            <?php } ?>
        </div>

    </div>
    <!-- /.container-fluid -->

</div>
<!-- End of Main Content -->


<!-- Scroll to Top Button-->
<a class="scroll-to-top rounded" href="#page-top">
    <i class="fas fa-angle-up"></i>
</a>

<!-- Logout Modal-->
<div class="modal fade" id="logoutModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"aria-hidden="true">
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
<script src="js/validate-user.js"></script>
<?php
    // include '/Applications/XAMPP/xamppfiles/htdocs/pro1014_duan/sources/View/admin/footer.php'; 
    include '/XAMPP/htdocs/pro1014_duan/sources/View/admin/footer.php'; 
?>
