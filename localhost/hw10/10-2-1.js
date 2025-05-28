function countVowels(str) {
    const vowels = ['а', 'е', 'ё', 'и', 'о', 'у', 'ы', 'э', 'ю', 'я'];
    let   arr    = [];
    for (let i = 0; i < str.length; i++) {
        if (vowels.indexOf(str[i].toLowerCase()) !== -1) {
            arr.push(str[i]);
        }
    }
    console.log(arr.length + ' (' + arr + ')');
}

countVowels("Привет здасте!Ё");