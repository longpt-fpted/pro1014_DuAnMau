var fullname = document.getElementById("fullname")
var email = document.getElementById("email")
var emailRegex = /\S+@\S+\.\S+/
var subject = document.getElementById("subject")
var message = document.getElementById("message")

errorFullname = document.getElementById("error-fullname")
errorEmail = document.getElementById("error-email")
errorSubject = document.getElementById("error-subject")
errorMessage = document.getElementById("error-message")

function check_contact(){
    var success = true

    if (fullname.value == "") {
        errorFullname.innerHTML = "Vui lòng điền họ và tên!"
        fullname.style.border = "1px solid red"
        success = false
    } else {
        errorFullname.innerHTML = ""
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
    if (subject.value == "") {
        errorSubject.innerHTML = "Vui lòng điền vào mục này!"
        subject.style.border = "1px solid red"
        success = false
    } else {
        errorSubject.innerHTML = ""
    }
    if (message.value == "") {
        errorMessage.innerHTML = "Vui lòng điền vào mục này!"
        message.style.border = "1px solid red"
        success = false
    } else {
        errorMessage.innerHTML = ""
    }

    return success;
}
function removeErrorFullname() {
    fullname.style.border = ""
    errorFullname.innerHTML = ""
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