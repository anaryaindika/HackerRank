'use strict';

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
 * Complete the 'plusMinus' function below.
 *
 * The function accepts INTEGER_ARRAY arr as parameter.
 */

function plusMinus(arr) {
    // Write your code here
    const n = arr.length;
    var elements = [0,0,0];
    for (let i=0; i<n; i++) {
        if (arr[i] > 0) {
            elements[0]++;
        } else if (arr[i] < 0) {
            elements[1]++;
        } else {
            elements[2]++;
        }
    }
    for (let i=0; i<elements.length; i++) {
        elements[i] /= n;
        console.log(elements[i].toPrecision(6));
    }
}

function main() {
    const n = parseInt(readLine().trim(), 10);

    const arr = readLine().replace(/\s+$/g, '').split(' ').map(arrTemp => parseInt(arrTemp, 10));

    plusMinus(arr);
}
