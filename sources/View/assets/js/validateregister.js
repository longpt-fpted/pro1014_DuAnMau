var fullname = document.getElementById("fullname")
var username = document.getElementById("username")
var password = document.getElementById("password")
var passwordRegex = ("^(?=.{8,})^")
var email = document.getElementById("email")
var emailRegex = /\S+@\S+\.\S+/


errorFullname = document.getElementById("error-fullname")
errorUsername = document.getElementById("error-username")
errorPassword = document.getElementById("error-password")
errorEmail = document.getElementById("error-email")

function check() {
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
