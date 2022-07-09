function addProductToCart(id) {
    let data = `pid=${id}&method=add`;
    console.log(data);
    $.ajax({
        url: `../Controller/CartController.php`,
        method: "GET",
        data: data,
    }).done(res => {
        let isContain = false;
        res = JSON.parse(res);
        console.log(res);
        displayNotify('success', `Thêm sản phẩm ${res.product.name} thành công`);
        if(carts.find(element => element.id == res.product.id)) {
            let index = carts.findIndex(element => element.id == res.product.id);    
            carts[index].quantity++;
            carts[index].price = res.product.price;
            carts[index].fullprice = res.product.fullprice;
            isContain = true;

        }
        cartQuantity++;
        isContain ? '' : carts.push(res.product);
        displayCart();

    })
}
function minusProductFromCart(id) {
    let data = `pid=${id}&method=minus`;
    $.ajax({
        url: `../Controller/CartController.php`,
        method: "GET",
        data: data,
    }).done((res) => {
        res = JSON.parse(res);
        console.log(res);
        switch (res.status) {
            case 'success': {
                displayNotify('success', `Giảm số lượng sản phẩm ${res.product.name} đi 1!`);
                if(carts.find(element => element.id == res.product.id)) {
                    let index = carts.findIndex(element => element.id == res.product.id);    
                    carts[index].quantity--;
                    carts[index].price = res.product.price;
                    carts[index].fullprice = res.product.fullprice;
                }
                cartQuantity--;
                break;
            }
            case 'remove': {
                displayNotify('success', `Xoá sản phẩm ${res.product.name} thành công!`);
                if(carts.find(element => element.id == res.product.id)) {
                    let index = carts.findIndex(element => element.id == res.product.id);    
                    carts.splice(index, 1);
                }
                cartQuantity -= res.product.quantity;
                break;
            }

            default:
                displayNotify('danger', `Giảm số lượng sản phẩm ${res.product.name} thất bại!`); 
                break;
        }
        displayCart();
    })
}
function removeProductFromCart(id) {
    let data = `pid=${id}&method=remove`;
    $.ajax({
        url: `../Controller/CartController.php`,
        method: "GET",
        data: data,
    }).done(res => {
        res = JSON.parse(res);
        console.log(res);
        switch (res.status) {
            case 'success': {
                displayNotify('success', `Xoá sản phẩm ${res.product.name} thành công!`);
                if(carts.find(element => element.id == res.product.id)) {
                    let index = carts.findIndex(element => element.id == res.product.id);    
                    carts.splice(index, 1);
                }
                cartQuantity -= res.product.quantity;
                break;
            }
            default:
                break;
        }
        displayCart();
    })
}