        <?php include('./header.php') ?>
        <section class="main-content">
            <article class="content-container">
                <h2 class="content-title">
                    Quên mật khẩu
                </h2>
                <section class="content-box">
                    <form action="../Controller/ForgetPasswordController.php" method="post" class="account-box">
                        <div class="input-box">
                            <label for="username">Tên tài khoản:</label>
                            <input type="text" name="username" id="username" onclick="removeErrorUsername()" placeholder="Tên tài khoản">
                            <div id="error-username" class="error-validate"></div>
                        </div>
                        <div class="input-box">
                            <label for="email">Email:</label>
                            <input type="text" name="email" id="email" onclick="removeErrorEmail()" placeholder="Email">
                            <div id="error-email" class="error-validate"></div>
                        </div>
                        <div class="input-box">
                            <input type="submit" name="submit" id="submit" onclick="return check_forgetPassword()" value="Xác nhận">
                        </div>
                    </form>
                </section>
            </article>
        </section>            
        <script src="./assets/js/validateuser.js"></script>
        <?php include('./footer.php') ?>