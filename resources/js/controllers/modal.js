function setPersistentModal(id) {
    sessionStorage.setItem('persistentModal', id);
}

function getPersistentModal() {
    return sessionStorage.getItem('persistentModal');
}

function removePersistentModal() {
    sessionStorage.removeItem('persistentModal');
}

function resetModalForm(id) {
    document.querySelectorAll(`#${id} form`)?.forEach(form => {
        if (form) form.reset();
    })

    document.querySelectorAll(`#${id} form #form-error`)?.forEach(formError => {
        if (formError) formError.innerHTML = '';
    })
}

function openModal(id) {
    const modal = document.getElementById(id);
    if (modal) {
        setPersistentModal(id)
        modal?.classList.remove('hidden');
        modal?.classList.add('flex');
    }
}

function closeModal(id) {
    const modal = document.getElementById(id);
    if (modal) {
        removePersistentModal()
        modal?.classList.remove('flex');
        modal?.classList.add('hidden');
        resetModalForm(id);
    }
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

function persistModal() {
    document.querySelectorAll('[data-app-modal]').forEach(modal => {
        if (getPersistentModal() === modal.id) {
            modal?.classList.remove('hidden');
            modal?.classList.add('flex');
        }
    })
}

document.addEventListener('DOMContentLoaded', () => {
    persistModal();
    listenModalOpen();
    listenModalClose();
})
