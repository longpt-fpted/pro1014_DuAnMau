var product_name = document.getElementById("name")
var image = document.getElementById("image")
var category = document.getElementById("category")
var price = document.getElementById("price")
var image_allowed = /(\.jpg|\.jpeg|\.png|\.gif)$/i


errorName = document.getElementById("error-name")
errorImage = document.getElementById("error-image")
errorCategory = document.getElementById("error-category")
errorPrice = document.getElementById("error-price")

function check() {
    var success = true

    if (product_name.value == "") {
        errorName.innerHTML = "Vui lòng nhập tên sản phẩm!"
        product_name.style.border = "1px solid red"
        success = false
    } else {
        errorName.innerHTML = ""
    }
    if (image.value == "") {
        errorImage.innerHTML = "Vui lòng chọn ảnh!"
        success = false
    } else if(!image_allowed.exec(image.value)){
        errorImage.innerHTML = "Ảnh không đúng định dạng!"
        success = false
    } 
    else {
        errorImage.innerHTML = ""
    }
    if (category.value == "") {
        errorCategory.innerHTML = "Vui lòng chọn danh mục!"
        category.style.border = "1px solid red"
        success = false
    } else {
        errorCategory.innerHTML = ""
    }
    if (price.value == "") {
        errorPrice.innerHTML = "Vui lòng nhập giá!"
        price.style.border = "1px solid red"
        success = false
    } else {
        errorPrice.innerHTML = ""
    }
    
    return success;
}
function removeErrorName() {
    product_name.style.border = ""
    errorName.innerHTML = ""
}
function removeErrorImage() {
    image.style.border = ""
    errorImage.innerHTML = ""
}
function removeErrorCategory() {
    category.style.border = ""
    errorCategory.innerHTML = ""
}
function removeErrorPrice() {
    price.style.border = ""
    errorPrice.innerHTML =""
}
