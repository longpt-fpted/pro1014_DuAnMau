const mobile = {

    handleShowModalMobile() {
        const btnSidebar = document.querySelector('.sidebar-mobile');
        const modal = document.querySelector('.sidebar-mobile-modal');
        const btnClose = document.querySelector('.sidebar-mobile-close');
        const authModal = document.querySelector('.sidebar-mobile-list');
        const overlayModal = document.querySelector('.sidebar-mobile-overlay');
        function handleShow() {
            modal.classList.add('active');
        }

        function handleHide() {
            modal.classList.remove('active');
        }

        btnSidebar.addEventListener('click', handleShow);
        btnClose.addEventListener('click', handleHide);
        overlayModal.addEventListener('click', handleHide);
        modal.addEventListener('click', handleHide);
        authModal.addEventListener('click', e => e.stopPropagation());
    },

    handleMenuChildren() {
        const liHasChildrenList = document.querySelectorAll('.sidebar-mobile-item.has-children');

        Array.from(liHasChildrenList).forEach((parent) => {
            const menuChildren = parent.querySelector('.menu-has-children');
            const btnShowChild = parent.querySelector('.sidebar-mobile-link');
            const iconHasChild = parent.querySelector('.sidebar-mobile-link-has-child-icon');

            btnShowChild.onclick = function() {
                menuChildren.classList.toggle('active');
                iconHasChild.classList.toggle('active');
            }
        })
    }
}

mobile.handleShowModalMobile();
mobile.handleMenuChildren();