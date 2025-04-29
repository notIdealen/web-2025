function uniqueElements(arr) {
    const obj = {};
    for (const el of arr) {
        (!obj[el])
            ? obj[el] = 1
            : obj[el]++;
    }
    return obj;
}

console.log(uniqueElements(['привет', 'hello', 1, '1', 'привет']));