function insertString(arr, str) {
    return (arr.length)
                ? (arr.length > 1)
                    ? arr + str + ' простые числа'
                    : arr + str + ' простое число'
                : '';
}

function isPrimeNumber(primes) {
    let arr = [], notSimples = [], simples = [];
    let str, str1, str2;
    (typeof primes == 'number')
        ? arr.push(primes)
        : arr = primes;

    arr.sort((a, b) => (a > b) ? 1 : -1);

    notSimples = arr.filter((num) => {
        for (let j = 2; j <= num; j++) {
            if (num === j) {
                simples.push(num);
            } else if (num % j === 0) {
                return num;
            }
        }
    })

    str = 'Результат: ';
    str1 = insertString(simples, '');
    str2 = insertString(notSimples, ' не');
    str = (str1 !== '' && str2 !== '') 
            ? str + str1 + ', '+ str2
            : str + str1 + str2;

    console.log(str);
}

isPrimeNumber([13,18,3,4,5,6,7,8,9,10,11]);
isPrimeNumber(7);
isPrimeNumber(6);
isPrimeNumber([10,6,8,12]);
isPrimeNumber([2,17,23,47]);
