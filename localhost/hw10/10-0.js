let n = 10;
let isPrime;
for (let i = 2; i < n; i++) {
    isPrime = true;
    for (let j = 2; j < i; j++) {
        if (i % j === 0) {
            isPrime = false;
            break;
        }
    }
    if (isPrime) {
        answer.innerText = answer.innerText + ' ' + i;
    }
}