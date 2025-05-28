/**
 * Модальное окно из DIV
 * @returns {Object} - контейнер содержащий модальное окно. Класс "modal-window"
 */
export function initModalWindowDiv(){
    const modalWindow = document.createElement('div');
    modalWindow.className = 'modal-window';
    modalWindow.style.display = 'flex';

    function escPress(e) {
        if (e.key === 'Escape') {
            mwCloseButton.click();
        }
    }  
    document.addEventListener('keydown', escPress);

    const mwButtonContainer = document.createElement('div');
    mwButtonContainer.className = 'modal-window__close-button-container'; 
    
    const mwCloseButton = document.createElement('button');
    mwCloseButton.className = 'modal-window__close-button';
    mwCloseButton.addEventListener('click', () => {
        document.removeEventListener('keydown', escPress);
        modalWindow.remove();
        document.body.style.overflow = 'visible';
    })
    mwButtonContainer.appendChild(mwCloseButton);
    
    const mwViewport = document.createElement('div');
    mwViewport.className = 'modal-window__viewport';
    
    const mwCounter = document.createElement('p');
    mwCounter.className = 'modal-window__image-counter';

    modalWindow.append(mwButtonContainer, mwViewport, mwCounter);
    return modalWindow;
}

/**
 * Модальное окно из DIALOG
 * @returns {Object} - контейнер содержащий модальное окно. Класс "modal-window-container"
 */
export function initModalWindowDialog(){
    const modalWindow = document.createElement('dialog');
    modalWindow.className = 'modal-window-container';
    modalWindow.style.display = 'flex';
    return modalWindow;
}