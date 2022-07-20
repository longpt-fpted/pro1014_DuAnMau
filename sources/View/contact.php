<?php
    include("/xampp/htdocs/pro1014_DuAn/sources/View/header.php");
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
            <form action="" id="contact-form" method="POST">
                <div class="input-1">
                    <span>FULL NAME</span><br><br>
                    <input type="text" id="fullname" name="fullname" placeholder="Full Name">
                </div>
                <div class="input-1">
                    <span>EMAIL</span><br><br>
                    <input type="text" id="email" name="email" placeholder="Email">
                </div>
                <div class="input-2">
                    <span>SUBJECT</span><br><br>
                    <input type="text" id="subject" name="subject" placeholder="Subject">
                </div>
                <div class="input-2">
                    <span>MESSAGE</span><br><br>
                    <textarea name="message" id="message" cols="30" rows="5" placeholder="Message"></textarea>
                </div>
                <div class="input-2">
                    <input type="submit" id="submit">
                </div>
            </form>
            <div class="img">
                <img src="./assets/images/chatbot.png" alt="">
            </div>
        </div>
    </div>
</section>
<?php
    include("/xampp/htdocs/pro1014_DuAn/sources/View/footer.php");
?>