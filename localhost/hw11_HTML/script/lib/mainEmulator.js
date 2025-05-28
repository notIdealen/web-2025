import { initCarousel } from './carousel.js';
import { initModalWindowDiv } from './modalWindow.js';

window.onload = function(){
    const carousel = initCarousel({
        container : 'content-container__image-container', 
        counter   : 'content-container__image-counter',
        images    : 'content-container__images',
        separator : '/'
    });
    const contentFeed = document.querySelector('.content-feed');// получаю доступ к ленте
    contentFeed.addEventListener('mouseover', (e) => {
        if (e.target.className === 'content-container__image' && e.target.parentNode.children.length > 1) {
            e.target.parentNode.parentNode.insertBefore(carousel, e.target.parentNode);// вставляю кнопки над изображениями
        }
    })
    
    contentFeed.addEventListener('click', (e) => {
        // console.log(e.target)
        if (e.target.className === 'carousel-container' || e.target.className === 'content-container__image') {
            const modalWindow = initModalWindowDiv();
            const imgContainer = e.target.closest('.content-container__image-container');
            for (const el of imgContainer.children) {
                switch(el.className) {
                    case 'content-container__image-counter' : 
                        modalWindow.querySelector('.modal-window__image-counter').textContent = el.textContent.split('/')[0] + ' из ' + el.textContent.split('/')[1];
                        modalWindow.querySelector('.modal-window__viewport').appendChild(initCarousel({
                            container : 'modal-window',
                            counter   : 'modal-window__image-counter',
                            images    : 'content-container__images',
                            separator : ' из '
                        })); 
                    break;
                    case 'content-container__images' : 
                        modalWindow.querySelector('.modal-window__viewport').appendChild(el.cloneNode(true));
                        break;
                }

            }

            document.body.appendChild(modalWindow);
            document.body.style.overflow = 'hidden';
        }

    })
    
}