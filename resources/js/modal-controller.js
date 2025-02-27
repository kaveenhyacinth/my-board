function openModal(id) {
    const modal = document.getElementById(id);
    modal?.classList.remove('hidden');
    modal?.classList.add('flex');
}

function closeModal(id) {
    const modal = document.getElementById(id);
    modal?.classList.remove('flex');
    modal?.classList.add('hidden');
}

function listenModalOpen() {
    document.querySelectorAll('[data-modal-open]').forEach(element => {
        element.addEventListener('click', event => {
            const modalId = event.target.getAttribute('data-modal-open');
            openModal(modalId);
        })
    })
}

function listenModalClose() {
    document.querySelectorAll('[data-modal-close]').forEach(element => {
        element.addEventListener('click', event => {
            const modalId = event.target.getAttribute('data-modal-close');
            closeModal(modalId);
        })
    })
}

document.addEventListener('DOMContentLoaded', () => {
    listenModalOpen();
    listenModalClose();
})
