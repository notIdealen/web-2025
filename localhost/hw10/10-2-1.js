function countVowels(str) {
    const vowels = ['а', 'е', 'ё', 'и', 'о', 'у', 'ы', 'э', 'ю', 'я'];
    let   counter = 0;
    let   arr = [];
    str = str.toLowerCase();
    for (let i = 0; i < str.length; i++) {
        for (const el of vowels) {
            if (el === str[i]) {
                counter++;
                arr.push(str[i]);
            }
        }
    }
    console.log(counter + ' (' + arr + ')');
}

countVowels("Привет здасте!Ё");