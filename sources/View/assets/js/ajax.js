
function addProductToCart() {
    const xhttp = new XMLHttpRequest();



    xhttp.onload = () => {
        console.log('gửi giỏ hàng lên server');
        console.log("response text", xhttp.responseText);
    }
    xhttp.open("GET", 'http://localhost/pro1014_duan/sources/Controller/CartController.php?pid=2&method=add');
    xhttp.send();
}