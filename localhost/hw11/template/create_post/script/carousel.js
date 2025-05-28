/**
 * Инициализирую карусель, создаю контейнер, помещаю в него кнопки. Контейнер размещаю между указателем количества и контейнером с изображениями.
 * @param {object} data - классы для встраивания карусели и разделитель для счетчика 
 * Контейнер для карусели, 
 * контейнер изображений, 
 * указатель количества,
 * разделитель.
 * @returns {Object} - контейнер содержащий кнопки прокрутки. Класс "carousel-container"
 */
export function initCarousel(cls) {
    let counter    = null;
    let counterArr = null;

    const carouselContainer = document.createElement('div');
          carouselContainer.className = 'carousel-container';

    const leftScrollBtn  = document.createElement('button');
          leftScrollBtn.className = 'post-scroll-button show-prev-image-button';
          leftScrollBtn.type = "button";

    const rightScrollBtn = document.createElement('button');
          rightScrollBtn.className = 'post-scroll-button show-next-image-button';
          rightScrollBtn.type = "button";

    const scrollButtonEvent = function (e) {
        counter       = e.target.closest('.' + cls.container).querySelector('.' + cls.counter);//счетчик
        counterArr    = counter.textContent.split(cls.separator);
        counterArr[0] = +counterArr[0] - 1;
        counterArr[1] = +counterArr[1] - 1;
        
        e.target.closest('.' + cls.container).querySelector('.' + cls.images).children[counterArr[0]].hidden = true;
        if (e.target.classList.contains('show-prev-image-button')) {
            counterArr[0] = counterArr[0] - 1;
            if (counterArr[0] < 0) {
                counterArr[0] = counterArr[1];
            } 
        }
        if (e.target.classList.contains('show-next-image-button')) {
            counterArr[0] = counterArr[0] + 1;
            if (counterArr[0] > counterArr[1]) {
                counterArr[0] = 0;
            }
        }   
        e.target.closest('.' + cls.container).querySelector('.' + cls.images).children[counterArr[0]].hidden = false;
        counter.textContent = (counterArr[0] + 1) + cls.separator + (counterArr[1] + 1);
    }

    leftScrollBtn.addEventListener('click', scrollButtonEvent);
    rightScrollBtn.addEventListener('click', scrollButtonEvent);

    carouselContainer.append(leftScrollBtn, rightScrollBtn);
    return carouselContainer;
} 
