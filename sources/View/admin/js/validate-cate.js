var cateName = document.getElementById("name")


errorName = document.getElementById("error-name")

function check() {
    var success = true

    if (cateName.value == "") {
        errorName.innerHTML = "Vui lòng nhập tên danh mục!"
        cateName.style.border = "1px solid red"
        success = false
    } else {
        errorName.innerHTML = ""
    }
    
    return success;
}
function removeErrorName() {
    cateName.style.border = ""
    errorName.innerHTML = ""
}