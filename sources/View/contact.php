<?php
    include './header.php';
    // include("/xampp/htdocs/pro1014_DuAn/sources/View/header.php");
?>
<section class="main-content">
    <div class="main-contact">
        <h1>Get in touch</h1>
        <div class="contact-infor">
            <div class="contact-infor-detail" id="address">
                <div class="icon">
                    <i class="fas fa-map-marker-alt"></i>
                </div>
                <div class="infor">
                    <span>Address: 381 Dien Bien Phu Str, Ward 25, Binh Thanh Disctrict, HCM</span>
                </div>
            </div>
            <div class="contact-infor-detail" id="hotline">
                <div class="icon">
                    <i class="fas fa-phone-alt"></i>
                </div>
                <div class="infor">
                    <span>Hotline: (+84) 373 118 242 (8:00 - 20:00)</span>
                </div>
            </div>
            <div class="contact-infor-detail" id="email">
                <div class="icon">
                    <i class="fas fa-envelope"></i>
                </div>
                <div class="infor">
                    <span>Email: contact@pakage-store.com</span>
                </div>
            </div>
            <div class="contact-infor-detail" id="facebook">
                <div class="icon">
                    <i class="fab fa-facebook-f"></i>
                </div>
                <div class="infor">
                    <span>Facebook: <a href="https://www.facebook.com/Pakage-Store-100342635784351/" target="_blank">Demon Stone</a></span>
                </div>
            </div>
        </div>
        <div class="contact-content">
            <form action="http://localhost/pro1014_duan/sources/controller/AddContactController.php" id="contact-form" method="POST">
                <div class="input-1">
                    <span>FULL NAME</span><br><br>
                    <input type="text" id="customer-name" name="customer-name" onclick="removeErrorFullname()" placeholder="Full Name">
                    <div id="error-fullname" class="error-validate"></div>
                </div>
                <div class="input-1">
                    <span>EMAIL</span><br><br>
                    <input type="text" id="mail" name="mail" onclick="removeErrorEmail()" placeholder="Email">
                    <div id="error-mail" class="error-validate"></div>
                </div>
                <div class="input-2">
                    <span>SUBJECT</span><br><br>
                    <input type="text" id="subject" name="subject" onclick="removeErrorSubject()" placeholder="Subject">
                    <div id="error-subject" class="error-validate"></div>
                </div>
                <div class="input-2">
                    <span>MESSAGE</span><br><br>
                    <textarea name="message" id="message" cols="30" rows="5" onclick="removeErrorMessage()" placeholder="Message"></textarea>
                    <div id="error-message" class="error-validate"></div>
                </div>
                <input type="text" name="type" id="type" value="1" hidden>
                <div class="input-2">
                    <input type="submit" id="submit" value="Gửi" onclick="return check()">
                </div>
            </form>
            <div class="img">
                <img src="./assets/images/chatbot.png" alt="">
            </div>
        </div>
    </div>
</section>
<script src="./assets/js/validatecontact.js"></script>
<?php
    include './footer.php';
?>