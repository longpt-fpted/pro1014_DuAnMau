function addProductToCart(id) {
    let data = `pid=${id}&method=add`;
    
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
                    break;
            }
        })
    }
}
function addToFavorite(userID, productID) {
    if(userID == false) {
        displayNotify('warning', `Vui lòng đăng nhập để thực hiện chức năng này!`);
        setTimeout(() => {
            window.location.href = './login.php';
        }, 3000)
    } else {
        let data = `user=${userID}&product=${productID}&method=add`;
        $.ajax({
            url: '../Controller/FavoriteController.php',
            method: 'POST',
            data: data,
        }).done(res => {
            res = JSON.parse(res);
            switch (res.status) {
                case 'success':
                    displayNotify('success', `Thêm thành công sản phẩm ${res.product.name} vào danh sách yêu thích!`);
                    favorites.push(res.product);
                    break;
                case 'contained':
                    displayNotify('info', `Sản phẩm ${res.pmame} đã tồn tại trong danh sách yêu thích!`);
                default:
                    break;
            }
        })
    }
}

function removeProductFromFavorite(userID, productID) {
    let data = `user=${userID}&product=${productID}&method=remove`;
    $.ajax({
        url: '../Controller/FavoriteController.php',
        method: 'POST',
        data: data,
    }).done(res => {
        res = JSON.parse(res);

        switch (res.status) {
            case 'success':
                displayNotify('success', `Xoá thành công sản phẩm khỏi danh sách yêu thích!`);

                if(favorites.find(element => element.pid == res.pid)) {
                    let index = favorites.findIndex((element) => element.pid == res.pid);
                    favorites.splice(index, 1);
                }
                loadFavorite();
                break;  
        
            default:
                break;
        }
    })
}

function removeNotify(id) {
    let data = `nid=${id}&method=remove`;
    $.ajax({
        url: '../Controller/NotifyController.php',
        method: 'POST',
        data: data,
    }).done(res => {
        res = JSON.parse(res);

        switch (res.status) {
            case 'success':
                displayNotify('success', `Xoá thành công thông báo!`);
                break;
            default:
                break;
        }
    })
}
function sendNotify(userID, commentID) {
    let data = `uid=${userID}&cid=${commentID}&method=cmt`;
    $.ajax({
        url: '../Controller/NotifyController.php',
        method: 'POST',
        data: data,
        
    }).done(res => {
        res = JSON.parse(res);
    })
}
function submitFeedback(event) {
    event.preventDefault();
    let data = $('#feedback-container').serialize()+"&method=submit";
    $.ajax({
        url: '../Controller/FeedbackController.php',
        type: 'POST',
        data: data,
    }).done(res => {
        res = JSON.parse(res);
        switch (res.status) {
            case 'success':
                displayNotify('success', `Cảm ơn bạn đã đánh giá sản phẩm của chúng tôi!`);
                closeFeedbackPanel();
                break;
            case 'fail':
                displayNotify('warning', `Xảy ra lỗi trong quá trình đánh giá! Vui lòng liên hệ với ban quản lí về trường hợp này!`);
                closeFeedbackPanel();
                break;
            default:
                break;
        }
    })
}
function comment(event) {
    event.preventDefault();
    let data = $('#comment-form').serialize()+"&method=comment"; //userid=abc&asdfkjasdfzclkjasdf=adsfkjasldfj&
    $.ajax({
        url: '../Controller/CommentController.php',
        method: 'POST',
        data: data,
    }).done(res => {
        res = JSON.parse(res);
        switch (res.status) {
            case 'login':
                displayNotify('warning', `Bạn cần đăng nhập để thực hiện chức năng này!`);
                setTimeout(function() {
                    window.location = 'login.php';
                }, 2500)
                break;
            case 'success':
                displayNotify('success', `Bình luận thành công!`);
                break;
            default:
                break;
        }
    })
}
function reply(event, index) {
    event.preventDefault();
    let data = $($('form[id=reply-form]')[index]).serialize()+"&method=reply";
    $.ajax({
        url: '../Controller/CommentController.php',
        method: 'POST',
        data: data,
    }).done(res => {
        res = JSON.parse(res);
        switch (res.status) {
            case 'login':
                displayNotify('warning', `Bạn cần đăng nhập để thực hiện chức năng này!`);
                setTimeout(function() {
                    window.location = 'login.php';
                }, 2500)
                break;
            case 'success':
                displayNotify('success', `Bình luận thành công!`);
                    sendNotify(res.user, res.cid);
                break;
            default:
                break;
        }
    })
}
function removeComment(event, userID, commentID) {
    event.preventDefault();
    let data = `uid=${userID}&cid=${commentID}&method=remove`;
    $.ajax({
        url: '../Controller/CommentController.php',
        method: 'POST',
        data: data,
    }).done(res => {
        res = JSON.parse(res);
        console.log(res);
        
        switch (res.status) {
            case 'success':
                displayNotify('success', `Xoá bình luận thành công!`);
                break;
            default:
                break;
        }
    })
