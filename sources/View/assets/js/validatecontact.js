var fullname = document.getElementById("customer-name")
var mail = document.getElementById("mail")
var emailRegex = /\S+@\S+\.\S+/
var subject = document.getElementById("subject")
var message = document.getElementById("message")

errorFullname = document.getElementById("error-fullname")
errorMail = document.getElementById("error-mail")
errorSubject = document.getElementById("error-subject")
errorMessage = document.getElementById("error-message")

function check(){
    var success = true

    if (fullname.value == "") {
        errorFullname.innerHTML = "Vui lòng điền họ và tên!"
        fullname.style.borderBottom = "1px solid red"
        success = false
    } else {
        errorFullname.innerHTML = ""
    }
    if (mail.value == "") {
        errorMail.innerHTML = "Vui lòng điền email!"
        mail.style.borderBottom = "1px solid red"
        success = false
    } else if (mail.value.match(emailRegex) == null) {
        errorMail.innerHTML = "Email không đúng định dạng!"
        mail.style.borderBottom = "1px solid red"
        success = false
    } else {
        errorMail.innerHTML = ""
    }
    if (subject.value == "") {
        errorSubject.innerHTML = "Vui lòng điền vào mục này!"
        subject.style.borderBottom = "1px solid red"
        success = false
    } else {
        errorSubject.innerHTML = ""
    }
    if (message.value == "") {
        errorMessage.innerHTML = "Vui lòng điền vào mục này!"
        message.style.borderBottom = "1px solid red"
        success = false
    } else {
        errorMessage.innerHTML = ""
    }

    return success;
}
function check_forNotifications(){
    var success = true

    if (fullname.value == "") {
        errorFullname.innerHTML = "Vui lòng điền họ và tên!"
        fullname.style.border = "1px solid red"
        success = false
    } else {
        errorFullname.innerHTML = ""
    }
    if (mail.value == "") {
        errorMail.innerHTML = "Vui lòng điền email!"
        mail.style.border = "1px solid red"
        success = false
    } else if (mail.value.match(emailRegex) == null) {
        errorMail.innerHTML = "Email không đúng định dạng!"
        mail.style.border= "1px solid red"
        success = false
    } else {
        errorMail.innerHTML = ""
    }
    return success;
}
function removeErrorFullname() {
    fullname.style.border = ""
    errorFullname.innerHTML = ""
}
function removeErrorEmail() {
    mail.style.border = ""
    errorMail.innerHTML =""
}
function removeErrorSubject() {
    subject.style.border = ""
    errorSubject.innerHTML =""
}
function removeErrorMessage() {
    message.style.border = ""
    errorMessage.innerHTML =""
}