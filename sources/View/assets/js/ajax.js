
function addProductToCart(id) {
    console.log('send request');
    let data = `pid=${id}&method=add`;
    $.ajax({
        url: `../Controller/CartController.php`,
        method: "GET",
        data: data,
    }).done(res => {
        res = JSON.parse(res);
        displayNotify('success', `Thêm sản phẩm thành công`);
        carts.push(res.product);
        cartQuantity++;
        displayCart();
        // carts.forEach((element) => {
        //     cartQuantity += (element.quantity);
        // });
    })
}