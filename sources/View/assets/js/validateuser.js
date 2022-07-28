var fullname = document.getElementById("fullname")
var username = document.getElementById("username")
var password = document.getElementById("password")
var oldpassword = document.getElementById("old-pass")
var newpassword = document.getElementById("new-pass")
var passwordRegex = ("^(?=.{8,})^")
var email = document.getElementById("email")
var mail = document.getElementById("mail")
var emailRegex = /\S+@\S+\.\S+/
var phone = document.getElementById("phone")
var phoneRegex = /((09|05|07|03)+([0-9]{8})\b)/g


errorFullname = document.getElementById("error-fullname")
errorUsername = document.getElementById("error-username")
errorPassword = document.getElementById("error-password")
errorOldPassword = document.getElementById("error-oldpassword")
errorNewPassword = document.getElementById("error-newpassword")
errorEmail = document.getElementById("error-email")
errorMail = document.getElementById("error-mail")
errorPhone = document.getElementById("error-phone")


function check_register() {
    var success = true

    if (fullname.value == "") {
        errorFullname.innerHTML = "Vui lòng điền họ và tên!"
        fullname.style.border = "1px solid red"
        success = false
    } else {
        errorFullname.innerHTML = ""
    }
    if (username.value == "") {
        errorUsername.innerHTML = "Vui lòng điền tài khoản!"
        username.style.border = "1px solid red"
        success = false
    } else {
        errorUsername.innerHTML = ""
    }
    if (password.value == "") {
        errorPassword.innerHTML = "Vui lòng điền mật khẩu!"
        password.style.border = "1px solid red"
        success = false
    }
    else if(password.value.match(passwordRegex) == null) {
        errorPassword.innerHTML = "Mất khẩu quá ngắn!"
        password.style.border = "1px solid red"
    }
    else {
        errorPassword.innerHTML = ""
    }
    if (email.value == "") {
        errorEmail.innerHTML = "Vui lòng điền email!"
        email.style.border = "1px solid red"
        success = false
    } else if (email.value.match(emailRegex) == null) {
        errorEmail.innerHTML = "Email không đúng định dạng!"
        email.style.border = "1px solid red"
        success = false
    } else {
        errorEmail.innerHTML = ""
    }
    
    return success;
}
function check_login() {
    var success = true

    if (username.value == "") {
        errorUsername.innerHTML = "Vui lòng điền tài khoản!"
        username.style.border = "1px solid red"
        success = false
    } else {
        errorUsername.innerHTML = ""
    }
    if (password.value == "") {
        errorPassword.innerHTML = "Vui lòng điền mật khẩu!"
        password.style.border = "1px solid red"
        success = false
    }
    else {
        errorPassword.innerHTML = ""
    }
    
    return success;
}
function check_forgetPassword() {
    var success = true

    if (username.value == "") {
        errorUsername.innerHTML = "Vui lòng điền tài khoản!"
        username.style.border = "1px solid red"
        success = false
    } else {
        errorUsername.innerHTML = ""
    }
    if (email.value == "") {
        errorEmail.innerHTML = "Vui lòng điền địa chỉ Email!"
        email.style.border = "1px solid red"
        success = false
    }
    else {
        errorEmail.innerHTML = ""
    }
    
    return success;
}
function check_change_password() {
    var success = true

    if (oldpassword.value == "") {
        errorOldPassword.innerHTML = "Vui lòng điền vào mục này!"
        oldpassword.style.borderBottom = "1px solid red"
        success = false
    } else {
        errorOldPassword.innerHTML = ""
    }
    if (newpassword.value == "") {
        errorNewPassword.innerHTML = "Vui lòng điền vào mục này!"
        newpassword.style.borderBottom = "1px solid red"
        success = false
    }
    else {
        errorNewPassword.innerHTML = ""
    }
    
    return success;
}
function check_change_email() {
    var success = true

    if (mail.value == "") {
        errorMail.innerHTML = "Vui lòng điền email!"
        mail.style.border = "1px solid red"
        success = false
    } else if (mail.value.match(emailRegex) == null) {
        errorMail.innerHTML = "Email không đúng định dạng!"
        mail.style.border = "1px solid red"
        success = false
    } else {
        errorMail.innerHTML = ""
    }
    
    return success;
}
function check_change_phone() {
    var success = true

    if(phone.value == ""){
        errorPhone.innerHTML = "Vui lòng nhập số điện thoại mới!"
        phone.style.borderBottom = "1px solid red"
        success = false
    } else if(phone.value.match(phoneRegex) == null){
        errorPhone.innerHTML = "Số điện thoại không đúng định dạng"
        phone.style.borderBottom = "1px solid red"
        success = false
    }
    
    return success;
}

function removeErrorFullname() {
    fullname.style.border = ""
    errorFullname.innerHTML = ""
}
function removeErrorUsername() {
    username.style.border = ""
    errorUsername.innerHTML = ""
}
function removeErrorPassword() {
    password.style.border = ""
    errorPassword.innerHTML = ""
}
function removeErrorEmail() {
    email.style.border = ""
    errorEmail.innerHTML =""
}
function removeErrorSubject() {
    subject.style.border = ""
    errorSubject.innerHTML =""
}
function removeErrorMessage() {
    message.style.border = ""
    errorMessage.innerHTML =""
}
function removeErrorOldPassword() {
    oldpassword.style.border = ""
    errorOldPassword.innerHTML = ""
}
function removeErrorNewPassword() {
    newpassword.style.border = ""
    errorNewPassword.innerHTML = ""
}
function removeErrorMail() {
    mail.style.border = ""
    errorMail.innerHTML =""
}
