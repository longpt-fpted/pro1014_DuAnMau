        <?php include('./header.php') ?>
        <section class="main-content">
            <article class="content-container">
                <h2 class="content-title">
                    đăng nhập
                </h2>
                <section class="content-box">
                    <form action="" method="post" enctype="multipart/form-data" class="account-box" id="login-form">
                        <div class="input-box">
                            <label for="username">Tên tài khoản:</label>
                            <input type="text" name="username" id="username" placeholder="Tên tài khoản" required>
                        </div>
                        <div class="input-box">
                            <label for="password">Mật khẩu:</label>
                            <input type="text" name="password" id="password" placeholder="Mật khẩu" required>
                        </div>
                        <div class="input-box">
                            <input type="submit" name="login" id="submit" value="Đăng nhập">
                        </div>
                    </form>
                </section>
            </article>
        </section>            
        <script>
            document.querySelector('#submit').addEventListener('click', (e) => {
                e.preventDefault();
                let data = $('#login-form').serialize()+"&method=login";
                console.log(data);
                $.ajax({
                    url: 'http://localhost/pro1014_duan/sources/Controller/LoginController.php',
                    type: 'POST',
                    data: data,
                }).done(res => {
                    res = JSON.parse(res);
                    switch (res['status']) {
                        case 'success':
                            location.href = 'index.php';
                            // console.log('login success');
                            break;
                        case 'wrong-password':
                            console.log('wrong password');
                            break;
                    }
                })
                // const xhttp = new XMLHttpRequest();
                // xhttp.onload = () => {
                //     console.log('gửi giỏ hàng lên server');
                //     console.log("response text", xhttp.responseText);
                // }
                // xhttp.open("POST", 'http://localhost/pro1014_duan/sources/Controller/CartController.php?pid=2&method=add');
                // xhttp.send();
            })
        </script>
        <?php include('./footer.php') ?>