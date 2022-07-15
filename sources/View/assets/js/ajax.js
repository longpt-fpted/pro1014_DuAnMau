function addProductToCart(id) {
    let data = `pid=${id}&method=add`;
    $.ajax({
        url: `../Controller/CartController.php`,
        method: "GET",
        data: data,
    }).done(res => {
        let isContain = false;
        res = JSON.parse(res);
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
        if(document.querySelector('#cart-detail') !== null) {
            loadCart();
        }
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
        if(document.querySelector('#cart-detail') !== null) {
            loadCart();
        }
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
        if(document.querySelector('#cart-detail') !== null) {
            loadCart();
        }
    })
}

function checkout(userID) {
    if(userID == false) {
        displayNotify('warning', `Vui lòng đăng nhập để thực hiện giao dịch này!`);
        setTimeout(() => {
            window.location.href = './login.php';
        }, 3000)
    } else {
        let data = `userID=${userID}&method=checkout`;
        $.ajax({
            url: `../Controller/CartController.php`,
            method: "POST",
            data: data,
        }).done(res => {
            res = JSON.parse(res);
            switch (res.status) {
                case 'length': {
                    displayNotify("warning", "Giỏ hàng trống, xin vui lòng mua hàng");
                    break;
                } 
                case 'money': {
                    displayNotify('warning', "Tài khoản không đủ số dư, xin vui lòng nạp thêm!");
                    break;
                }
                case 'login': {
                    displayNotify('danger', `Vui lòng đăng nhập để thực hiện giao dịch này!`);
                    setTimeout(() => {
                        window.location.href = './login.php';
                    }, 3000)
                    break;
                }
                case 'fail': {
                    displayNotify('danger', "Có lỗi trong quá trình thanh toán, xin vui lòng liên hệ với ban quản trị!");
                    break;
                }
                case 'success': {
                    displayNotify('success', "Thanh toán thành công! Bạn sẽ được đưa về trang chủ trong vài giây tới!");
                    setTimeout(() => {
                        window.location.href = './index.php';
                    }, 3000)
                    break;
                }
                default: 
                    console.log('nothing');
                    break;
            }
        })
    }
}

function addToFavorite(id) {
    
}

function removeProductFromFavorite(userID, productID) {
    let data = `user=${userID}&product=${productID}&method=remove`;
    $.ajax({
        url: '../Controller/FavoriteController.php',
        method: 'POST',
        data: data,
    }).done(res => {
        res = JSON.parse(res);

        // switch (res.status) {
        //     case 'success':
        //         displayNotify('success', `Xoá thành công sản phẩm khỏi danh sách yêu thích!`);
        //         loadFavorite();

        //         break;  
        
        //     default:
        //         break;
        // }
        // console.log(res);
    })
}