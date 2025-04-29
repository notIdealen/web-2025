function isPrimeNumber(primes) {
    let arr = [], s = [], ns = [];
    let str;
    (typeof primes == 'number')
        ? arr.push(primes)
        : arr = primes;
    for (let prime of arr) {
        for (let j = 2; j < prime; j++) {
            if (prime % j === 0) {
                ns.push(prime);
                prime = 0;
                break;
            }
        }
        if (prime) {
            s.push(prime);
        }
    }
    str = 'Результат: ';
    if (s.length) {
        str = (s.length > 1)
            ? str + s + ' простые числа'
            : str + s + ' простое число';
    } 
    if (ns.length) {
        str = (ns.length > 1)
            ? str + ', ' + ns + ' не простые числа'
            : str + ns + ' не простое число';
    }
    console.log(str);
}

isPrimeNumber([3,4,5,6,7,8,9,10,11]);
isPrimeNumber(7);
isPrimeNumber(6);
