function reverseNumberInBinary(num) {
    // validate if it is number in the argument of the function
    if (!Number.isInteger(num)) {
        throw new Error("Parameter is not a number!");
    }
    // num to binary
    let binary = (num).toString(2);
    // reverse that binary
    let reversed = binary.split('').reverse().join('');
    // convert reversed binary to number
    let int = parseInt(reversed, 2);

    return int;
}

// How to use this function:
// console.log(reverseNumberInBinary(13));
