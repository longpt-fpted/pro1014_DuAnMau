
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
                            <input type="text" name="username" id="username" placeholder="Tên tài khoản" required>
                        </div>
                        <div class="input-box">
                            <label for="email">Email:</label>
                            <input type="text" name="email" id="email" placeholder="Email" required>
                        </div>
                        <div class="input-box">
                            <input type="submit" name="submit" id="submit" value="Xác nhận">
                        </div>
                    </form>
                </section>
            </article>
        </section>            
        <?php include('./footer.php') ?>