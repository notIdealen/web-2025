function createPassword(n) {
    const p = document.createElement('p');
    p.style.fontSize = 24;
    let rand;
    let upper = lower = sym = digit = true;
    for (let index = 0; index < n; index++) {
        do
        {
            rand = String.fromCharCode(Math.floor(Math.random() * 1000 / 4 + 33));
            if (rand.search(/[A-ZА-Я]/) === 0 && upper) upper = false; else 
            if (rand.search(/[a-zа-я]/) === 0 && lower) lower = false; else
            if (rand.search(/[!@#$%&()]/) === 0 && sym) sym = false; else 
            if (rand.search(/\d/) === 0 && digit) digit = false;
            else rand = -1;
            
            if (!upper && !lower && !sym && !digit) upper = lower = sym = digit = true; 
        }
        while (rand === -1);
        p.textContent = p.textContent + rand;
    }
    document.body.append(p);
}

createPassword(10);