
        <?php include('./header.php') ?>
        <section class="main-content">
            <article class="content-container">
                <h2 class="content-title">
                    đăng kí
                </h2>
                <section class="content-box">
                    <form action="../Controller/RegisterController.php" method="post" enctype="multipart/form-data" class="account-box">
                        <div class="input-box">
                            <label for="fullname">Họ và tên:</label>
                            <input type="text" name="fullname" id="fullname" placeholder="Họ và tên" required>
                        </div>
                        <div class="input-box">
                            <label for="username">Tên tài khoản:</label>
                            <input type="text" name="username" id="username" placeholder="Tên tài khoản" required>
                        </div>

                        <div class="input-box">
                            <label for="password">Mật khẩu:</label>
                            <input type="text" name="password" id="password" placeholder="Mật khẩu" required>
                        </div>

                        <div class="input-box">
                            <label for="email">Email:</label>
                            <input type="text" name="email" id="email" placeholder="Email" required>
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
        <?php include('./footer.php') ?>