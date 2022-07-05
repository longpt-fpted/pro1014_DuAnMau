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
    console.log(article);    
}