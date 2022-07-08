
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
    check.classList.add('fal', 'fa-check');
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
function displayCart() {
    document.querySelector('#cart-modal--total-quantity').innerText = `(${cartQuantity})`;
    document.querySelector('#cart-modal__body').innerHTML = '';
    console.log(document.querySelector('#cart-modal__body').innerHTML);
    for(let i = 0; i < carts.length; i++) {
        let element = carts[i];
        document.querySelector('#cart-modal__body').innerHTML += `<article class="product-box">
        <a class="product-box__thumbnail" href="#">
            <img src="./assets/images/elden-ring.jpg" alt="product thumbnail">
        </a>
        <div class="product-box__detail">
            <div class="product-box__desc">
                <div class="product-box__title" href="#">
                    <a href="./product.php?id=${element.id}">${element.name}</a>
                    <a href="./product.php?id=${element.id}"><i class="fal fa-trash"></i></a>
                </div>
                <div class="product-box__quantity">
                    <form>
                        <button type="button" name="minus" id="minus">
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
                        ${element.price}
                    </p>
                    <p class="product-box__fullprice">
                        ${element.fullprice}
                    </p>
                </div>
            </div>
        </div>
    </article>`;
    }
}