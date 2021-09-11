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
 * Complete the 'pickingNumbers' function below.
 *
 * The function is expected to return an INTEGER.
 * The function accepts INTEGER_ARRAY a as parameter.
 */

function pickingNumbers(a) {
    // Write your code here
    var elements = {};
    var maxLength = 0;
    for (const element of a) {
        elements[element] = elements[element] ? elements[element]+1 : 1;
    }
    for (const element of a) {
        let left = elements[element-1] ? elements[element]+elements[element-1] : elements[element];
        let right = elements[element+1] ? elements[element]+elements[element+1] : elements[element];
        if (left > maxLength) {
            maxLength = left;
        }
        if (right > maxLength) {
            maxLength = right;
        }
    }        
    return maxLength;
}

function main() {
    const ws = fs.createWriteStream(process.env.OUTPUT_PATH);

    const n = parseInt(readLine().trim(), 10);

    const a = readLine().replace(/\s+$/g, '').split(' ').map(aTemp => parseInt(aTemp, 10));

    const result = pickingNumbers(a);

    ws.write(result + '\n');

    ws.end();
}
