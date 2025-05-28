const modWindow = document.querySelector('.modal-window');
const contentContainer = document.querySelector('.content-container');

const imageCunterMW = document.querySelector('.modal-window__image-counter');

const escPress = function (e) {
    if (e.key === 'Escape') {
        closeModWindowBtn.click();
    }
}  

contentContainer.addEventListener('click', (e) => {
    const imageContainer = e.target.parentElement; 
    if (imageContainer.className === 'content-container__image-container') {
        document.body.style.overflow = 'hidden';
        modWindow.style.display = 'flex';
        const imageContainerClone = imageContainer.cloneNode(true);
        modWindow.children[1].appendChild(imageContainerClone);
        
        modWindow.children[1].firstElementChild.className = 'modal-window__image-container';
        const counterArr = modWindow.children[1].firstElementChild.firstElementChild.textContent.split('/');
        counterArr[0] = +counterArr[0] - 1;
        counterArr[1] = +counterArr[1] - 1;
        imageCunterMW.textContent = (counterArr[0] + 1) + ' из ' + (counterArr[1] + 1);
        
        modWindow.children[1].firstElementChild.firstElementChild.style.display = 'none';
        
        
        modWindow.children[1].firstElementChild.children[1].firstElementChild.className = 'modal-window__left-scroll-button scroll-button';
        modWindow.children[1].firstElementChild.children[1].lastElementChild.className = 'modal-window__right-scroll-button scroll-button';;
        
        const leftBtn  = document.querySelector('.modal-window__left-scroll-button');
        const rightBtn = document.querySelector('.modal-window__right-scroll-button');
        
        leftBtn.addEventListener('click', (e) => {
            images = e.target.parentElement.nextElementSibling;
                images.children[counterArr[0]].hidden = true;
                counterArr[0] = counterArr[0] - 1;
                if (counterArr[0] < 0) {
                    counterArr[0] = counterArr[1];
                }
                images.children[counterArr[0]].hidden = false;
                imageCunterMW.textContent = (counterArr[0] + 1) + ' из ' + (counterArr[1] + 1);  
            });

        rightBtn.addEventListener('click', (e) => {
                images = e.target.parentElement.nextElementSibling;
                images.children[counterArr[0]].hidden = true;
                counterArr[0] = counterArr[0] + 1;
                if (counterArr[0] > counterArr[1]) {
                    counterArr[0] = 0;
                }
                images.children[counterArr[0]].hidden = false;
                imageCunterMW.textContent = (counterArr[0] + 1) + ' из ' + (counterArr[1] + 1);   
            });  
              
        document.addEventListener('keydown', escPress);
    }
})

const closeModWindowBtn = document.querySelector('.modal-window__close-button')
closeModWindowBtn.addEventListener('click', () => {
    modWindow.style.display = 'none';
    modWindow.children[1].innerHTML = '';
    document.body.style.overflow = 'visible';
    document.removeEventListener('keydown', escPress);
})
