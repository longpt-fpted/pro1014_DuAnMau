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
                <h>Họ và tên:</h><br>
                <input type="text" id="fullname" name="fullname" placeholder="Họ và tên"><br>  
                <h>Tên Đăng nhập:</h><br>
                <input type="text" id="username" name="username" placeholder="Tên đăng nhập"><br>              
                <h>Mật khẩu:</h><br>
                <input type="password" id="password" name="password" placeholder="Mật khẩu"><br>                   
                <h>Email:</h><br>
                <input type="text" id="email" name="email" placeholder="Địa chỉ email"><br>
                <h>Số điện thoại:</h><br>
                <input type="text" id="phone-number" name="phone-number" placeholder="Số điện thoại"><br>
                <h>Vai trò:</h><br>
                <select name="role" id="role">
                    <option value=""></option>
                    <option value="Quản trị viên">Quản trị viên</option>
                    <option value="Khách hàng">Khách hàng</option>
                </select><br>
                <input type="submit" id="submit" value="Cập Nhật">
            </form>
        </div> 
        
        <div class="show-information">
            <?php
                $users = $userDAO->getAllUsers();
                foreach ($users as $user) {
            ?>
            <div class="information">
                <div class="image">
                    <img src="./images/avatar.png" alt="">
                </div>
                <div class="detail">
                    <form action="http://localhost/pro1014_duan/sources/Controller/UpdateUsersController.php" id="user-infor" method="post">
                        <h>ID:</h>
                        <input type="text" id="id" name="id" value="<?php
                        echo $user->getID()?>"><br>
                        <h>Họ và tên:</h><br>
                        <input type="text" id="fullname" name="fullname" value="<?php 
                        echo $user->getFullname(); ?>"><br>                               
                        <h>Email:</h><br>
                        <input type="text" id="email" name="email" value="<?php 
                        echo $user->getEmail(); ?>"><br>
                        <h>Số điện thoại:</h><br>
                        <input type="text" id="phone-number" name="phone-number" value="<?php 
                        echo $user->getPhone(); ?>"><br>
                        <h>Vai trò:</h><br>
                        <select name="role" id="role">
                            <option value="1" <?php  echo $user->getRoleID() == 1 ? 'selected' : '';?>>Quản trị viên</option>
                            <option value="0" <?php  echo $user->getRoleID() == 0 ? 'selected' : '';?>>Khách hàng</option>
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

<!-- Footer -->
<footer class="sticky-footer bg-white">
    <div class="container my-auto">
        <div class="copyright text-center my-auto">
            <span>Copyright &copy; Your Website 2022</span>
        </div>
    </div>
</footer>
<!-- End of Footer -->

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

<?php 
    include('/xampp/htdocs/pro1014_DuAn/sources/View/admin/footer.php') 
?>