window.onload = function () {
    const contentContainer = document.querySelector('.content-container');
    
    const leftScrollBtn  = document.createElement('button');
    leftScrollBtn.classList.add('content-container__scroll-button');
    // leftScrollBtn.classList.add('delthisclass');
    // console.log(leftScrollBtn.className == 'content-container__scroll-button delthisclass')
    // console.log(leftScrollBtn.classList.contains('delthisclass'))
    leftScrollBtn.style.backgroundImage = "url('./image/Arrow_left_10.png')";
    
    const rightScrollBtn = document.createElement('button');
    rightScrollBtn.classList.add('content-container__scroll-button');
    rightScrollBtn.style.backgroundImage = "url('./image/Arrow_right_10.png')";

    contentContainer.addEventListener('mouseover', (e) => {
        // console.log(e.target)
        if (e.target.className === 'content-container__image-scroller-container') {
            e.target.appendChild(leftScrollBtn);
            e.target.appendChild(rightScrollBtn);
        }
    });

    let imageCounterValue = null;
    let images = null; 
    let currImg = null;
    leftScrollBtn.addEventListener('click', (e) => {
        imageCounterValue = e.target.parentElement.previousElementSibling;
        images = e.target.parentElement.nextElementSibling;
        // console.log(images.children.length)
        // console.log(images.childNodes)
        currImg = +imageCounterValue.textContent.substring(0, imageCounterValue.textContent.indexOf('/')) - 1;
        images.children[currImg].hidden = true;
        currImg = currImg - 1;
        if (currImg < 0) {
            currImg = images.children.length - 1;
        }
        images.children[currImg].hidden = false;
        imageCounterValue.textContent = (currImg + 1) + '/' + images.children.length;   
    });

    rightScrollBtn.addEventListener('click', (e) => {
        imageCounterValue = e.target.parentElement.previousElementSibling;
        images = e.target.parentElement.nextElementSibling;
        currImg = +imageCounterValue.textContent.substring(0, imageCounterValue.textContent.indexOf('/')) - 1;
        images.children[currImg].hidden = true;
        currImg = currImg + 1;
        if (currImg > images.children.length - 1) {
            currImg = 0;
        }
        images.children[currImg].hidden = false;
        imageCounterValue.textContent = (currImg + 1) + '/' + images.children.length; 
    })
};