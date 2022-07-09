        <?php include('./header.php') ?>
        <section class="main-content">
            <article class="content-container">
                <h2 class="content-title">
                    đăng nhập
                </h2>
                <section class="content-box">
                    <form action="../sources/Controller/LoginController.php" method="post" enctype="multipart/form-data" class="account-box" id="login-form">
                        <div class="input-box">
                            <label for="username">Tên tài khoản:</label>
                            <input type="text" name="username" id="username" placeholder="Tên tài khoản" required>
                        </div>
                        <div class="input-box">
                            <label for="password">Mật khẩu:</label>
                            <input type="password" name="password" id="password" placeholder="Mật khẩu" required>
                        </div>
                        <div class="input-box">
                            <input type="submit" name="login" id="submit" value="Đăng nhập">
                        </div>
                    </form>
                </section>
            </article>
        </section>            
        <?php include('./footer.php') ?>
        <script>
            document.querySelector('#submit').addEventListener('click', (e) => {
                e.preventDefault();
                let data = $('#login-form').serialize()+"&method=login";
                console.log(data);
                $.ajax({
                    url: 'http://localhost/hihihaha/pro1014_duan/sources/Controller/LoginController.php',
                    type: 'POST',
                    data: data,
                }).done(res => {
                    res = JSON.parse(res);
                    console.log(res);
                    switch (res['status']) {
                        case 'success':
                            displayNotify('success', 'Đăng nhập thành công! Bạn sẽ được trả về trang chủ trong vài giây nữa!');
                            setTimeout(function() {
                                window.location = 'index.php';
                            }, 2500)
                            break;
                        case 'wrong-password':
                            displayNotify('warning', 'Đăng nhập thất bại! Sai tên tài khoản hoặc mật khẩu!');
                            break;
                        case 'user-not-exist':
                            displayNotify('warning', 'Không tồn tại tên tài khoản! Bạn có muốn đăng kí không ?');
                            break;
                    }
                })
            })
        </script>