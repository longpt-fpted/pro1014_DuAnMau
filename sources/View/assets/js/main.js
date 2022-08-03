function updateCurrency() {
    cartQuantity = 0;
    currency.fullPrice = 0;
    currency.left = 0;
    currency.total = 0;
    currency.discount = 0;
    carts.forEach((element) => {
        cartQuantity += (element.quantity);
        currency.fullPrice += element.price;
        currency.left = currency.fullPrice - currency.userMoney > 0 ? currency.fullPrice - currency.userMoney : 0;
        currency.total = currency.fullPrice - currency.discount;
    })
}
const quantity = document.querySelector('#cart-modal--total-quantity');

function displayNotify(type, msg) {
    let article = document.createElement('article');
    article.classList.add('notify-box');
    switch (type) {
        case 'danger':
            article.classList.add('notify-danger')
            break;
        case 'info':
            article.classList.add('notify-info')
            break;
        case 'success':
            article.classList.add('notify-success')
            break;
        case 'warning':
            article.classList.add('notify-warning')
            break;
    }

    let div = document.createElement('div');
    let check = document.createElement('i');
    let icon = 'fa-check';
    switch (type) {
        case 'danger':
            icon = 'fa-times-circle';
            break;
        case 'info':
            icon = 'fa-exclamation-circle'
            break;
        case 'success':
            icon = 'fa-check';
            break;
        case 'warning':
            icon = 'fa-times-circle';
            break;
    }
    check.classList.add('fal', icon);
    let times = document.createElement('i');
    times.classList.add('fal', 'fa-times');
    let state = document.createElement('div');
    let title = document.createElement('div');
    let close = document.createElement('div');


    state.classList.add('state');
    state.appendChild(check);
    
    title.classList.add('title');
    title.innerText = msg;

    close.classList.add('close');
    close.appendChild(times);
    close.addEventListener('click', () => {
        article.style.animation = "blur 0.25s forwards";
    })

    article.append(state, title, close);
    document.querySelector('body').appendChild(article);
    // console.log(article);    
    setTimeout(function() {
        article.style.animation = "blur 0.25s forwards";
    }, 2500)
}
function moneyFormat(price) {
    return price.toLocaleString('it-IT', {style : 'currency', currency : 'VND'});
}
function displayCart() {
    updateCurrency();
    document.querySelector('#cart-modal--total-quantity').innerText = `(${cartQuantity})`;
    document.querySelector('#cart-modal__body').innerHTML = '';
    
    for(let i = 0; i < carts.length; i++) {
        let element = carts[i];
        document.querySelector('#cart-modal__body').innerHTML += `<article class="product-box">
        <a class="product-box__thumbnail" href="#">
            <img src="${element.img}" alt="product thumbnail">
        </a>
        <div class="product-box__detail">
            <div class="product-box__desc">
                <div class="product-box__title" href="#">
                    <a href="./product.php?id=${element.id}">${element.name}</a>
                    <a onclick="removeProductFromCart(${element.id})"><i class="fal fa-trash"></i></a>
                </div>
                <div class="product-box__quantity">
                    <form>
                        <button type="button" name="minus" id="minus" onclick="minusProductFromCart(${element.id})">
                            <i class="far fa-minus"></i>
                        </button>
                        <input type="number" name="product-quantity" value="${element.quantity}">
                        <button type="button" name="plus" id="plus" onclick="addProductToCart(${element.id})">
                            <i class="far fa-plus"></i>
                        </button>
                    </form>
                </div>
                <div class="product-box__price">
                    <p class="product-box__totalprice">
                        ${moneyFormat(element.price)}
                    </p>
                    <p class="product-box__fullprice">
                        ${moneyFormat(element.fullprice)}
                    </p>
                </div>
            </div>
        </div>
    </article>`;
    }
    document.querySelector('#cart-modal__footer').innerHTML = `
        <li class="cart-modal-price-item">
            <p>
                Tổng giá:
            </p>
            <p>
                ${moneyFormat(currency.fullPrice)}
            </p>
        </li>
        <li class="cart-modal-price-item">
            <p>
                Giảm giá:
            </p>
            <p>
                ${moneyFormat(currency.discount)}
            </p>
        </li>
        <li class="cart-modal-price-item">
            <p>
                Số tiền trong tài khoản:
            </p>
            <p>
                ${moneyFormat(currency.userMoney)}
            </p>
        </li>
        <li class="cart-modal-price-item">
            <p>
                Còn thiếu:
            </p>
            <p>
                ${moneyFormat(currency.left)}
            </p>
        </li>
        <li class="cart-modal-price-item">
            <p>
                Tổng thanh toán:
            </p>
            <p>
                ${moneyFormat(currency.total)}
            </p>
        </li>`
    
}
function loadCart() {
    updateCurrency();
    document.querySelector('#cart-wrapper__quantity').innerText = `(${cartQuantity})`;
    document.querySelector('#cart-detail').innerHTML = '';
    document.querySelector('#cart-desc--fullprice').innerText = moneyFormat(currency.fullPrice);
    document.querySelector('#cart-desc--userMoney').innerText = moneyFormat(currency.userMoney);
    document.querySelector('#cart-desc--left').innerText = moneyFormat(currency.left);
    document.querySelector('#cart-desc--discount').innerText = moneyFormat(currency.discount);
    document.querySelector('#cart-desc--total').innerText = moneyFormat(currency.total);
    for(let i = 0; i < carts.length; i++) {
        let element = carts[i];
        let sale = 100 * (((element.fullprice / element.quantity) - (element.price / element.quantity)))/element.fullprice * element.quantity;
        document.querySelector('#cart-detail').innerHTML += `
        <div class="row">
            <div class="col">
                <div class="product-thumbnail">
                    <img src="${element.img}" alt="Elden-ring">
                    <a href="./product.php?id=${element.id}" class="product-title">
                        ${element.name}
                    </a>
                </div>
            </div>
            <div class="col">
                <div class="product-price">
                    <div class="price">${moneyFormat(element.price / element.quantity)}</div>
                    <div class="fullprice">
                        ${moneyFormat(element.fullprice / element.quantity)}    
                        <span class="sale-tag">
                            -${sale}%
                        </span>
                    </div>
                </div>
            </div>
            <div class="col">
                <div class="product-quantity">
                    <button type="button" name="minus" id="minus" onclick="minusProductFromCart(${element.id}); loadCart();">
                        <i class="fal fa-minus"></i>
                    </button>
                    <input type="number" name="product-quantity" value="${element.quantity}">
                    <button type="button" name="plus" id="plus" onclick="addProductToCart(${element.id}); loadCart();">
                        <i class="fal fa-plus"></i>
                    </button>
                </div>
            </div>
            <div class="col">
                <div class="product-totalprice">${moneyFormat(element.price)}</div>
            </div>
            <div class="col">
                <div class="product-remove">
                    <a onclick="removeProductFromCart(${element.id}); ">
                        <i class="fal fa-trash"></i>
                    </a>
                </div>
            </div>
        </div>`;
    }
    
}
function loadFavorite() {
    document.querySelector('#favorite').innerHTML = '';
    
    favorites.forEach(element => {
        document.querySelector('#favorite').innerHTML += `
            <article class="news-box">
                <div class="news-box__head">
                    <i class="fal fa-calendar"></i>
                    <div class="date">
                        ${element.date}
                    </div>
                </div>
                <div class="news-box__body">
                    <div class="news-thumbnail">
                        <img src="${element.img}" alt="news">
                    </div>
                    <div class="news-detail">
                        <h4 class="news-title">
                            ${element.name}
                        </h4>
                        <div class="news-desc">
                            <p class="price">
                                ${moneyFormat(element.totalPrice)}</p>
                            <p class="sale">
                                ${moneyFormat(element.price)}</p>
                        </div>
                    </div>
                </div>
                <div class="news-box__foot">
                    <a href="./product.php?id=${element.pid}" class="method">Xem chi tiết</a>
                    <a onclick="removeProductFromFavorite(${element.uid}, ${element.pid})" class="method">Xoá</a>
                </div>
            </article>`;
    });
}