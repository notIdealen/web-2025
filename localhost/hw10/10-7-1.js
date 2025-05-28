function createPassword(n) {
    const p = document.createElement('p');
    p.style.fontSize = 24;
    if (n < 4) {
        p.textContent = `Вы ввели ${n}. Длина пародя должна быть минимум 4 символа`; 
    } else {
        const upperKit = "АБВГДЕЁЖЗИЙКЛМНОПРСТУФХЦЧШЩЭЮЯABCDEFGHIJKLMNOPQRSTUVWXYZ";
        const lowerKit = "абвгдеёжзийклмнопрстуфхцчшщъыьэюяabcdefghijklmnopqrstuvwxyz";
        const symbolKit = "!@#$%&()";
        const digitKit = "0123456789";
        let kitArr = [];
        let rand, kit, symbol;
        for (let index = 0; index < n; index++) {
            if (!kitArr.length) {
                kitArr.push(upperKit);
                kitArr.push(lowerKit);
                kitArr.push(symbolKit);
                kitArr.push(digitKit);
            }
            rand = Math.floor(Math.random() * 1000) % kitArr.length;
            kit = kitArr[rand];
            symbol = kit[Math.floor(Math.random() * kit.length)];
            p.textContent = p.textContent + symbol;
            kitArr.splice(rand, 1);
        }
    }
    document.body.append(p);
}

createPassword(20);