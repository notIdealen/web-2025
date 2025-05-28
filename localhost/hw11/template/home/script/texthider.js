const text = document.querySelectorAll('.content-container__text');
let shortText = '', hiddenText = '';

if (text.textContent.length > 148) {
    hiddenText = text.textContent.slice(145, text.textContent.length);
    shortText = text.textContent.slice(0, 145);
    text.textContent = shortText + '...';
}

const moreButton = document.querySelector('.content-container__more-button');
moreButton.addEventListener('click', function() {
    if (this.textContent === 'Ещё') {
        this.textContent = 'Свернуть';
        text.textContent = shortText + hiddenText;
    } else {
        this.textContent = 'Ещё';
        text.textContent = shortText + '...';
    }
})