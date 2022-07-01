const formBtns = document.querySelectorAll('.form-edit-btn');
const formDialog = document.querySelectorAll('.form-edit');
const modal = document.querySelector('#form-modal');
const modalCloseBtn = document.querySelector('#modal-close');


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
})