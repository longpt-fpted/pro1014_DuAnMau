<?php 
    include('./header.php');
    include('./topbar.php');
?>
<?php
$keyword = isset($_REQUEST['keyword']) ? $_REQUEST['keyword'] : '';
$userDAO = new UserDAO();
$userSearch = $userDAO->getUserBySearch($keyword);

?>
            <!-- Begin Page Content -->
    <div class="container-fluid">

        <!-- Page Heading -->
        <h1 class="h3 mb-4 text-gray-800">Users</h1>
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
                    <option value="0" selected>Thành viên</option>
                    <option value="1">Quản trị viên</option>
                </select><br>
                <input type="submit" id="submit" onclick="return check()" value="Cập Nhật">
            </form>
            <!-- <button onclick="check()">check</button> -->
        </div> 
        
        <div class="show-information">
            <?php
                foreach ($userSearch as $user) {
            ?>
            <div class="information">
                <div class="image">
                    <img src=".<?php echo $user->getAvatar(); ?>" alt="">
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
<script src="js/validate-user.js"></script>
<?php
    include '/Applications/XAMPP/xamppfiles/htdocs/pro1014_duan/sources/View/admin/footer.php'; 
    // include '/XAMPP/htdocs/pro1014_duan/sources/View/admin/footer.php'; 
?>
