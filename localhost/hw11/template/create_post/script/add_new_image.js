export function addNewImage(inp) {
    // console.log('addNewImage function')
    const img = document.createElement('img');
    const fr = new FileReader();
    fr.readAsDataURL(inp.files[0]);
    fr.onload = function() {
        img.className = 'content-container__image';
        img.src = fr.result;
    }
    fr.onerror = function() {
        console.log(fr.error)
    }
    return img;
}