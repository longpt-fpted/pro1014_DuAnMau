const formBtns = document.querySelectorAll('.form-edit-btn');
const formDialog = document.querySelectorAll('.form-edit');
const modal = document.querySelector('#form-modal');
const modalCloseBtn = document.querySelector('#modal-close');

const feedbackModal = document.querySelector('#feedback-modal');
const feedbackBox = document.querySelector('#feedback-modal .form-edit');
const feedbackCloseBtn = document.querySelector('#feedback-modal--close');
function hideForm() {
    formDialog.forEach((element) => {
        element.style.display = 'none';
    })
}

hideForm();
modalCloseBtn.addEventListener('click', (event) => {
    if(modal.style.display != '') {
        modal.style.display = 'none';
        hideForm();
    }
})
formBtns.forEach((element, index) => {
    element.addEventListener('click', (event) => {
        if(formDialog[index].style.display == 'none' && (modal.style.display == 'none' || modal.style.display == '')) {
            hideForm();
            modal.style.display = 'flex';
            formDialog[index].style.display = 'flex';
        }
    });
})

window.addEventListener('click', (event) => {
    if(event.target == modal) {
        modal.style.display = 'none';
        hideForm();
    } 
    if(event.target == feedbackModal) {
        feedbackModal.style.display = 'none';
        feedbackBox.style.display = 'none';
    }
})

function displayFeedbackBox(name, img, pid) {
    document.querySelector('#feedback-form').innerHTML = '';
    document.querySelector('#feedback-form').innerHTML += `
    <input type="text" name="pid" value="${pid}" hidden>
    <div class="product-feedback__thumbnail">
        <img src="${img}" alt="product thumbnail">
    </div>
    <div class="product-feedback__details">
        <p class="product-feedback--title">
            ${name}
        </p>
        <div class="product-feedback__input">
            <div class="product-feedback__input-box">
                <label for="feedback-score">
                    Đánh giá sản phẩm theo thang điểm:
                </label>
                <select name="score" id="feedback-score">
                    <option value="0" selected>0</option>
                    <option value="1">1</option>
                    <option value="2">2</option>
                    <option value="3">3</option>
                    <option value="4">4</option>
                    <option value="5">5</option>
                </select>
            </div>
            <div class="product-feedback__input-box">
                <label for="content">Nội dung</label>
                <textarea name="content" id="content"></textarea>
            </div>
        </div>
    </div>`;
feedbackModal.style.display = 'flex';
feedbackBox.style.display = 'flex'; 

}
function closeFeedbackPanel() {
    feedbackModal.style.display = 'none';
    feedbackBox.style.display = 'none';
}
feedbackCloseBtn.addEventListener('click', e => {
    feedbackModal.style.display = 'none';
    feedbackBox.style.display = 'none';
})