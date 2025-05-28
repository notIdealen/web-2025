import { addNewImage } from './add_new_image.js';
import { initCarousel } from './carousel.js';

window.onload = function() {
    const MAXIMAGES = 10;
    const carousel = initCarousel({
        container : 'content-container__image-container', 
        counter   : 'content-container__image-counter',
        images    : 'content-container__images',
        separator : '/'
    });
    let coord = 0;
    let validImageInput = false,
        validTextInput  = false;
    const hiddenDiv = document.createElement('div');
    const images = document.createElement('div');
          images.className = 'content-container__images';
    const counter = document.querySelector('.content-container__image-counter');
    const imageContainer = document.querySelector('.content-container__image-container');
    const fullCageAlert = document.querySelector('.create-post-form__full-cage-text');
    /*изменение размера поля ввода*/
    const tArea = document.querySelector('textarea');
    tArea.addEventListener('keyup', (e) => {
        if (coord < tArea.scrollTop) {
            tArea.rows++;
            coord = tArea.scrollTop;
            window.scrollBy(0, 50)
        }
        if (tArea.selectionStart > 0) {
            validTextInput = true;
        } else {
            validTextInput = false;
        }
        validInput(validImageInput, validTextInput);
    })
    
    /*добавление изображения*/
    const addImage = function(e) {
        
        if (images.hasChildNodes()) {
            if (images.children.length < MAXIMAGES) {
                const img = addNewImage(e.target);
                img.hidden = 'true';
                images.append(img); 
                if (images.children.length > 1 && counter.hidden) {
                    imageContainer.insertBefore(carousel, images);
                    counter.hidden = false;   
                } else if (images.children.length <= 1) {
                    counter.hidden = true;
                }
                if (images.children.length === MAXIMAGES) {
                    fullCageAlert.hidden = false;
                    e.target.disabled = true;
                }
            }  
        } else {
            const defCon = document.querySelector('.content-container__def-content');
            hiddenDiv.appendChild(defCon);
            images.appendChild(addNewImage(e.target));
            imageContainer.appendChild(images);
            validImageInput = true;
            validInput(validImageInput, validTextInput);
        }
        counter.textContent = counter.textContent.split('/')[0] + '/' + images.children.length;
    }//addImage()

    const imgInputWindow = document.querySelector('.create-post-form__select-image-input');
          imgInputWindow.addEventListener('change', addImage);
    const imgInputButton = document.querySelector('.create-post-form__select-more-image-input');
          imgInputButton.addEventListener('change', addImage);
    const submitButton = document.querySelector('.create-post-form__submit-button');

    /*активация отправки*/
    function validInput(vi, vt) {
        submitButton.classList.add('button_disabled');
        submitButton.disabled = true;
        if (vi === true && vt === true) {
            submitButton.classList.toggle('button_disabled');
            submitButton.disabled = false;
        } 
    }//validInput()

    /*вывод в консоль данных отправки*/
    document.forms[0].addEventListener('submit', (e) => {
        e.preventDefault();
        let formData = new FormData(e.target);
        console.log(Array.from(formData));
        console.log(e.target.querySelector('[name="img"]').value);
        console.log(e.target.querySelector('[name="text"]').value);
    })
}
