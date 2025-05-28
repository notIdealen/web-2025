const text = document.querySelector('.content-container__text');
let shortText = '', hiddenText = '';

if (text.textContent.length > 30) {
    hiddenText = text.textContent.slice(30, text.textContent.length);
    shortText = text.textContent.slice(0, 30);
    text.textContent = shortText + '...';
}

const moreButton = document.querySelector('.content-container__more-button');
moreButton.addEventListener('click', function() {
    if (this.textContent === 'more') {
        this.textContent = 'less';
        text.textContent = shortText + hiddenText;
    } else {
        this.textContent = 'more';
        text.textContent = shortText + '...';
    }
})