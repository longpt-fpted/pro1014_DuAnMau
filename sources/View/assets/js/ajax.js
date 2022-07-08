
function addProductToCart(id) {
    console.log('send request');
    let data = `pid=${id}&method=add`;
    $.ajax({
        url: `../Controller/CartController.php`,
        method: "GET",
        data: data,
    }).done(res => {
        let isContain = false;
        res = JSON.parse(res);
        displayNotify('success', `Thêm sản phẩm thành công`);
        for (let index = 0; index < carts.length; index++) {
            const element = carts[index];
            if(element.id == res.product.id) {
                element.quantity++;
                isContain = true;
                break;
            }
        }
        isContain ? '' : carts.push(res.product);
        cartQuantity++;
        displayCart();
    })
}