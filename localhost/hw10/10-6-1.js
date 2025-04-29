let mul2 = num => num * 2;

function mapObject(nums, cbfunc) {
    for (const key in nums) {
        nums[key] = cbfunc(nums[key]);
    }
}

const nums = { a: 1, b: 2, c: 3 };
mapObject(nums, mul2);
console.log(nums)