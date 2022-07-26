
        <?php include('./header.php') ?>
        <section class="main-content">
            <article class="content-container">
                <h2 class="content-title">
                    đăng kí
                </h2>
                <section class="content-box">
                    <form action="../Controller/RegisterController.php" onsubmit="return check_register()" method="post" enctype="multipart/form-data" class="account-box">
                        <div class="input-box">
                            <label for="fullname">Họ và tên:</label>
                            <input type="text" name="fullname" id="fullname" onclick="removeErrorFullname()" placeholder="Họ và tên">
                            <div id="error-fullname" class="error-validate"></div>
                        </div>
                        <div class="input-box">
                            <label for="username">Tên tài khoản:</label>
                            <input type="text" name="username" id="username" onclick="removeErrorUsername()" placeholder="Tên tài khoản">
                            <div id="error-username" class="error-validate"></div>
                        </div>

                        <div class="input-box">
                            <label for="password">Mật khẩu:</label>
                            <input type="password" name="password" id="password" onclick="removeErrorPassword()" placeholder="Mật khẩu">
                            <div id="error-password" class="error-validate"></div>
                        </div>

                        <div class="input-box">
                            <label for="email">Email:</label>
                            <input type="text" name="email" id="email" onclick="removeErrorEmail()" placeholder="Email">
                            <div id="error-email" class="error-validate"></div>
                        </div>
                        <div class="input-box" style="flex-wrap: nowrap; gap: 1em;">
                            <input type="checkbox" name="confirm" id="confirm" style="width: 1em;" required>
                            <label for="confirm" style="width: fit-content; font-size: .75em;">Bằng việc click vào đây là bạn đã đồng ý với các điều khoản của chúng tôi</label>
                        </div>
                        <div class="validate">
                            <h4 id="baoloi" style="color:red;"></h4>
                        </div>
                        <div class="input-box">
                            <input type="submit" name="submit" id="submit" value="Đăng kí">
                        </div>
                    </form>
                </section>
            </article>
        </section>      
        <script src="./assets/js/validateuser.js"></script>   
        <?php include('./footer.php') ?>