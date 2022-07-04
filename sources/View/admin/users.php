        <?php include('header.php');
            // include ('/Applications/XAMPP/xamppfiles/htdocs/pro1014_duan/sources/Model/DAO/UserDAO.php');

        ?>
        <!-- End of Sidebar -->

        <!-- Content Wrapper -->
        <?php include('./topbar.php') ?>
                <!-- End of Topbar -->

                <!-- Begin Page Content -->
                <div class="container-fluid">

                    <!-- Page Heading -->
                    <h1 class="h3 mb-4 text-gray-800">Users</h1>

                    <button id="btn-add" onclick="add()">Thêm thành viên</button>
                    <!-- <div class="modal-add">
                        <form action="" id="modal-add-infor">
                            <p>Thêm thành viên</p>
                            <h>Họ và tên:</h><br>
                            <input type="text" id="fullname" name="fullname" placeholder="Họ và tên"><br>  
                            <h>Tên Đăng nhập:</h><br>
                            <input type="text" id="username" name="username" placeholder="Tên đăng nhập"><br>              
                            <h>Mật khẩu:</h><br>
                            <input type="text" id="password" name="password" placeholder="Mật khẩu"><br>                   
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
                    </div>  -->
                    <div class="show-information">
                        <div class="information">
                            <div class="image">
                                <img src="./images/avatar.png" alt="">
                            </div>
                            <div class="detail">
                                <form action="" id="user-infor">
                                    <h>Họ và tên:</h><br>
                                    <input type="text" id="fullname" name="fullname" value="Trần Văn A"><br>                               
                                    <h>Email:</h><br>
                                    <input type="text" id="email" name="email" value="vanadeptrai@gmail.com"><br>
                                    <h>Số điện thoại:</h><br>
                                    <input type="text" id="phone-number" name="phone-number" value="0919919991"><br>
                                    <h>Vai trò:</h><br>
                                    <select name="role" id="role">
                                        <option value="Quản trị viên">Quản trị viên</option>
                                        <option value="Khách hàng">Khách hàng</option>
                                    </select><br>
                                    <input type="submit" id="submit" value="Cập Nhật">
                                </form>
                            </div>
                        </div>
                        <div class="information">
                            <div class="image">
                                <img src="./images/avatar.png" alt="">
                            </div>
                            <div class="detail">
                                <form action="" id="user-infor">
                                    <h>Họ và tên:</h><br>
                                    <input type="text" id="fullname" name="fullname" value="Trần Văn A"><br>                               
                                    <h>Email:</h><br>
                                    <input type="text" id="email" name="email" value="vanadeptrai@gmail.com"><br>
                                    <h>Số điện thoại:</h><br>
                                    <input type="text" id="phone-number" name="phone-number" value="0919919991"><br>
                                    <h>Vai trò:</h><br>
                                    <select name="role" id="role">
                                        <option value="Quản trị viên">Quản trị viên</option>
                                        <option value="Khách hàng">Khách hàng</option>
                                    </select><br>
                                    <input type="submit" id="submit" value="Cập Nhật">
                                </form>
                            </div>
                        </div>
                        <div class="information">
                            <div class="image">
                                <img src="./images/avatar.png" alt="">
                            </div>
                            <div class="detail">
                                <form action="" id="user-infor">
                                    <h>Họ và tên:</h><br>
                                    <input type="text" id="fullname" name="fullname" value="Trần Văn A"><br>                               
                                    <h>Email:</h><br>
                                    <input type="text" id="email" name="email" value="vanadeptrai@gmail.com"><br>
                                    <h>Số điện thoại:</h><br>
                                    <input type="text" id="phone-number" name="phone-number" value="0919919991"><br>
                                    <h>Vai trò:</h><br>
                                    <select name="role" id="role">
                                        <option value="Quản trị viên">Quản trị viên</option>
                                        <option value="Khách hàng">Khách hàng</option>
                                    </select><br>
                                    <input type="submit" id="submit" value="Cập Nhật">
                                </form>
                            </div>
                        </div>
                        <div class="information">
                            <div class="image">
                                <img src="./images/avatar.png" alt="">
                            </div>
                            <div class="detail">
                                <form action="" id="user-infor">
                                    <h>Họ và tên:</h><br>
                                    <input type="text" id="fullname" name="fullname" value="Trần Văn A"><br>                               
                                    <h>Email:</h><br>
                                    <input type="text" id="email" name="email" value="vanadeptrai@gmail.com"><br>
                                    <h>Số điện thoại:</h><br>
                                    <input type="text" id="phone-number" name="phone-number" value="0919919991"><br>
                                    <h>Vai trò:</h><br>
                                    <select name="role" id="role">
                                        <option value="Quản trị viên">Quản trị viên</option>
                                        <option value="Khách hàng">Khách hàng</option>
                                    </select><br>
                                    <input type="submit" id="submit" value="Cập Nhật">
                                </form>
                            </div>
                        </div>
                        <div class="information">
                            <div class="image">
                                <img src="./images/avatar.png" alt="">
                            </div>
                            <div class="detail">
                                <form action="" id="user-infor">
                                    <h>Họ và tên:</h><br>
                                    <input type="text" id="fullname" name="fullname" value="Trần Văn A"><br>                               
                                    <h>Email:</h><br>
                                    <input type="text" id="email" name="email" value="vanadeptrai@gmail.com"><br>
                                    <h>Số điện thoại:</h><br>
                                    <input type="text" id="phone-number" name="phone-number" value="0919919991"><br>
                                    <h>Vai trò:</h><br>
                                    <select name="role" id="role">
                                        <option value="Quản trị viên">Quản trị viên</option>
                                        <option value="Khách hàng">Khách hàng</option>
                                    </select><br>
                                    <input type="submit" id="submit" value="Cập Nhật">
                                </form>
                            </div>
                        </div>
                        <div class="information">
                            <div class="image">
                                <img src="./images/avatar.png" alt="">
                            </div>
                            <div class="detail">
                                <form action="" id="user-infor">
                                    <h>Họ và tên:</h><br>
                                    <input type="text" id="fullname" name="fullname" value="Trần Văn A"><br>                               
                                    <h>Email:</h><br>
                                    <input type="text" id="email" name="email" value="vanadeptrai@gmail.com"><br>
                                    <h>Số điện thoại:</h><br>
                                    <input type="text" id="phone-number" name="phone-number" value="0919919991"><br>
                                    <h>Vai trò:</h><br>
                                    <select name="role" id="role">
                                        <option value="Quản trị viên">Quản trị viên</option>
                                        <option value="Khách hàng">Khách hàng</option>
                                    </select><br>
                                    <input type="submit" id="submit" value="Cập Nhật">
                                </form>
                            </div>
                        </div>
                        <div class="information">
                            <div class="image">
                                <img src="./images/avatar.png" alt="">
                            </div>
                            <div class="detail">
                                <form action="" id="user-infor">
                                    <h>Họ và tên:</h><br>
                                    <input type="text" id="fullname" name="fullname" value="Trần Văn A"><br>                               
                                    <h>Email:</h><br>
                                    <input type="text" id="email" name="email" value="vanadeptrai@gmail.com"><br>
                                    <h>Số điện thoại:</h><br>
                                    <input type="text" id="phone-number" name="phone-number" value="0919919991"><br>
                                    <h>Vai trò:</h><br>
                                    <select name="role" id="role">
                                        <option value="Quản trị viên">Quản trị viên</option>
                                        <option value="Khách hàng">Khách hàng</option>
                                    </select><br>
                                    <input type="submit" id="submit" value="Cập Nhật">
                                </form>
                            </div>
                        </div>
                        <div class="information">
                            <div class="image">
                                <img src="./images/avatar.png" alt="">
                            </div>
                            <div class="detail">
                                <form action="" id="user-infor">
                                    <h>Họ và tên:</h><br>
                                    <input type="text" id="fullname" name="fullname" value="Trần Văn A"><br>                               
                                    <h>Email:</h><br>
                                    <input type="text" id="email" name="email" value="vanadeptrai@gmail.com"><br>
                                    <h>Số điện thoại:</h><br>
                                    <input type="text" id="phone-number" name="phone-number" value="0919919991"><br>
                                    <h>Vai trò:</h><br>
                                    <select name="role" id="role">
                                        <option value="Quản trị viên">Quản trị viên</option>
                                        <option value="Khách hàng">Khách hàng</option>
                                    </select><br>
                                    <input type="submit" id="submit" value="Cập Nhật">
                                </form>
                            </div>
                        </div>
                    </div>
                    <!-- <?php
                        $userDAO = new UserDAO();
                        $username = 'pthieenlong';
                        $password = 'pthieenlong';
                        $user = $userDAO->getUserByUsername($username);
                        
                        $checkPassword = $user->checkPassword($user->getPassword(), $password);
                        if($checkPassword) {
                            echo 'dang nhap thanh cong';
                        } else echo 'dang nhap that bai';

                        // làm hàm connect database
                        // thông qua database => mảng ['id'], ['username'] 
                        // mảng.['id']
                        // thay vì lấy mảng => đối tượng.
                        // $user->getID(); == mảng.['id']
                    ?> -->

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

    <!-- Bootstrap core JavaScript-->
    <script src="vendor/jquery/jquery.min.js"></script>
    <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

    <!-- Core plugin JavaScript-->
    <script src="vendor/jquery-easing/jquery.easing.min.js"></script>

    <!-- Custom scripts for all pages-->
    <script src="js/sb-admin-2.min.js"></script>

</body>

</html>