'use strict';

const fs = require('fs');

process.stdin.resume();
process.stdin.setEncoding('utf-8');

let inputString = '';
let currentLine = 0;

process.stdin.on('data', function(inputStdin) {
    inputString += inputStdin;
});

process.stdin.on('end', function() {
    inputString = inputString.split('\n');

    main();
});

function readLine() {
    return inputString[currentLine++];
}

/*
 * Complete the 'beautifulDays' function below.
 *
 * The function is expected to return an INTEGER.
 * The function accepts following parameters:
 *  1. INTEGER i
 *  2. INTEGER j
 *  3. INTEGER k
 */

function beautifulDays(i, j, k) {
    /* Variables.
     * INTEGER startingDay : starting day in number.
     * INTEGER endingDay : ending day in number.
     * INTEGER divisor : the divisor.
     * INTEGER beautifulNumberAmount : amount of beautiful number (the absolute difference of the day in number and it's reverse divisible by the divisor).          
     * INTEGER absDifference : the absolute difference of the day in number and it's reverse.
    */
    const startingDay = i;
    const endingDay = j;
    const divisor = k;
    var beautifulNumberAmount = 0;
    
    for (let day=startingDay; day<=endingDay; day++) {
        /* Function to reverse number of the day. 
         * @param INTEGER number of the day.
         * @return FLOAT reversed number of the day.
        */
        const reverseDay = day => parseFloat(day.toString().split('').reverse().join('')) * Math.sign(day);
        // Determine the absolute difference.
        let absDifference = Math.abs(day-reverseDay(day));
        /* Check if number is beautiful (absolute difference divisible by divisor).
         * Add the beautiful number amount if number is beautiful.
        */
        if (absDifference%divisor == 0) {
            beautifulNumberAmount++;
        }
    }
    return beautifulNumberAmount;
}

function main() {
    const ws = fs.createWriteStream(process.env.OUTPUT_PATH);

    const firstMultipleInput = readLine().replace(/\s+$/g, '').split(' ');

    const i = parseInt(firstMultipleInput[0], 10);

    const j = parseInt(firstMultipleInput[1], 10);

    const k = parseInt(firstMultipleInput[2], 10);

    const result = beautifulDays(i, j, k);

    ws.write(result + '\n');

    ws.end();
}
