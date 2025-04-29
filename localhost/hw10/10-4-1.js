// function mergeObjects(obj, mObj) {
//     for (const key in obj) 
//         if (!mObj[key])
//             mObj[key] = obj[key];
// }

let mergeObjects = (obj, mObj) => {for (const key in obj) if (!mObj[key]) mObj[key] = obj[key];}

const obj1 = { a: 1, b: 2 },
      obj2 = { b: 3, c: 4 };

mergeObjects(obj1, obj2);
console.log(obj2);