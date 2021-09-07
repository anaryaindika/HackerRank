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
 * Complete the 'staircase' function below.
 *
 * The function accepts INTEGER n as parameter.
 */

function staircase(n) {
    // Write your code here
    var string = "";
    for (let i=0; i<n; i++) {
        for (let j=0; j<(n-1)-i; j++) {
            string += " ";
        }
        for (let j=0; j<i+1; j++) {
            if (j == i) {
                string += "#\n";                
            } else {
                string += "#";
            }
        }
    }
    console.log(string);
}

function main() {
    const n = parseInt(readLine().trim(), 10);

    staircase(n);
}
