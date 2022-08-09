function addProductToCart(id) {
    let data = `pid=${id}&method=add`;
    
    $.ajax({
        url: `https://dsgobruh.000webhostapp.com/Controller/CartController.php`,
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
        url: `https://dsgobruh.000webhostapp.com/Controller/CartController.php`,
        method: "GET",
        data: data,
    }).done((res) => {
        res = JSON.parse(res);
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
        url: `https://dsgobruh.000webhostapp.com/Controller/CartController.php`,
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
        let coupon = document.querySelector('input[name="coupon"]:checked');
        let data = coupon != null ? `userID=${userID}&coupon=${coupon.value}&method=checkout` :`userID=${userID}&method=checkout`;
        $.ajax({
            url: `https://dsgobruh.000webhostapp.com/Controller/CartController.php`,
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
                case 'cart-money': {
                    displayNotify("warning", "Giỏ hàng trống, xin vui lòng mua hàng");
                    break;
                }
                case 'mail': {
                    displayNotify("warning", "Có lỗi trong quá trình gửi mail");
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
            url: 'https://dsgobruh.000webhostapp.com/Controller/FavoriteController.php',
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
                    displayNotify('info', `Sản phẩm ${res.pname} đã tồn tại trong danh sách yêu thích!`);
                default:
                    break;
            }
        })
    }
}

function removeProductFromFavorite(userID, productID) {
    let data = `user=${userID}&product=${productID}&method=remove`;
    $.ajax({
        url: 'https://dsgobruh.000webhostapp.com/Controller/FavoriteController.php',
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
        url: 'https://dsgobruh.000webhostapp.com/Controller/NotifyController.php',
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
        url: 'https://dsgobruh.000webhostapp.com/Controller/NotifyController.php',
        method: 'POST',
        data: data,
        
    }).done(res => {
        res = JSON.parse(res);
        switch (res.status) {
            case 'success':
                console.log('send notify');
                break;
        
            default:
                break;
        }
    })
}
function submitFeedback(event) {
    event.preventDefault();
    let data = $('#feedback-container').serialize()+"&method=submit";
    $.ajax({
        url: 'https://dsgobruh.000webhostapp.com/Controller/FeedbackController.php',
        type: 'POST',
        data: data,
    }).done(res => {
        res = JSON.parse(res);
        switch (res.status) {
            case 'success':
                displayNotify('success', `Cảm ơn bạn đã đánh giá sản phẩm của chúng tôi!`);
                removeNotify(res.id);
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
    let data = $('#comment-form').serialize()+"&method=comment";
    $.ajax({
        url: 'https://dsgobruh.000webhostapp.com/Controller/CommentController.php',
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
                location.reload();
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
        url: 'https://dsgobruh.000webhostapp.com/Controller/CommentController.php',
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
                location.reload();
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
        url: 'https://dsgobruh.000webhostapp.com/Controller/CommentController.php',
        method: 'POST',
        data: data,
    }).done(res => {
        res = JSON.parse(res);
        switch (res.status) {
            case 'success':
                displayNotify('success', `Xoá bình luận thành công!`);
                location.reload();
                break;
            default:
                break;
        }
    })
}
function searching(event) {
    event.preventDefault();
    let data = $('#main-search').serialize();
    $.ajax({
        url: 'https://dsgobruh.000webhostapp.com/Controller/SearchController.php',
        method: 'POST',
        data: data
    }).done(res => {
        res = JSON.parse(res);
        switch (res.status) {
            case 'success':
                $('#paginition').pagination({
                    dataSource: res.products,
                    pageSize: 8,
                    callback: function(data, pagination) {
                        $('#search-page').empty();
                        $.each(data, (index, element) => {
                            $('#search-page').append(
                                `<article class="product-box">
                                <a class="product-box__thumbnail" href="./product.php?id=${element.id}">
                                    <img src="${element.image}" alt="product thumbnail">
                                </a>
                                <div class="product-box__detail">
                                    <div class="product-box__desc">
                                        <div class="product-box__title">
                                            <a title="" href="./product.php?id=${element.id}">${element.name}</a>
                                            <div class="tag sale-tag">
                                                -${element.sale}%
                                            </div>
                                        </div>
                                        <div class="product-box__price">
                                            <p class="product-box__totalprice">${moneyFormat(element.price)}</p>
                                            <p class="product-box__fullprice">${moneyFormat(element.fullprice)}</p>
                                        </div>
                                    </div>
                                    <a class="product-box__add" onclick="addProductToCart(${element.id})">
                                        <i class="fal fa-cart-arrow-down"></i>
                                    </a>
                                </div>
                            </article>`
                            )
                        })
                    }
                })            
            break;
            case 'fail': 
                $('#search-page').empty();
                $('#search-page').append(
                    "<h2 style='margin: auto;'>Không tìm thấy sản phẩm bạn yêu cầu</h2>"
                )
            break; 
        }
    })
}
function headerSearch(cate, sort) {
    console.log(cate, sort);
    let data = `keyword=&category=${cate}&min=0&max=50000000&sort=${sort}`
    $.ajax({
        url: 'https://dsgobruh.000webhostapp.com/Controller/SearchController.php',
        method: 'POST',
        data: data
    }).done(res => {
        res = JSON.parse(res);
        switch (res.status) {
            case 'success':
                $('#paginition').pagination({
                    dataSource: res.products,
                    pageSize: 8,
                    callback: function(data, pagination) {
                        $('#search-page').empty();
                        $.each(data, (index, element) => {
                            $('#search-page').append(
                                `<article class="product-box">
                                <a class="product-box__thumbnail" href="./product.php?id=${element.id}">
                                    <img src="${element.image}" alt="product thumbnail">
                                </a>
                                <div class="product-box__detail">
                                    <div class="product-box__desc">
                                        <div class="product-box__title">
                                            <a title="" href="./product.php?id=${element.id}">${element.name}</a>
                                            <div class="tag sale-tag">
                                                -${element.sale}%
                                            </div>
                                        </div>
                                        <div class="product-box__price">
                                            <p class="product-box__totalprice">${moneyFormat(element.price)}</p>
                                            <p class="product-box__fullprice">${moneyFormat(element.fullprice)}</p>
                                        </div>
                                    </div>
                                    <a class="product-box__add" onclick="addProductToCart(${element.id})">
                                        <i class="fal fa-cart-arrow-down"></i>
                                    </a>
                                </div>
                            </article>`
                            )
                        })
                    }
                })            
            break;
            case 'fail': 
                $('#search-page').empty();
                $('#search-page').append(
                    "<h2 style='margin: auto;'>Không tìm thấy sản phẩm bạn yêu cầu</h2>"
                )
            break; 
        }
    })
}
function deposit(event) {
    event.preventDefault();
    let data = $('#currency-modal .form-edit').serialize()+"&method=deposit";
    $.ajax({
        url: 'https://dsgobruh.000webhostapp.com/Controller/CurrencyController.php',
        method: 'POST',
        data: data,
    }).done(res => {
        res = JSON.parse(res);
        switch (res.status) {
            case 'success':
                displayNotify('success', `Nạp tiền thành công!`);
                document.querySelector('#currency').innerText  = moneyFormat(res.money);
                closeCurrencyPanel();
                break;
            case 'fail':
                displayNotify('warning', `Nạp tiền thất bại!`);
                break;
            case 'low-than-zero':
                displayNotify('warning', `Số tiền cần nạp lớn hơn 0!`);
                break;
            case 'user':
                displayNotify('warning', `Không tồn tại khách hàng!`);
                
                break;
            default:
                break;
        }
    })
}