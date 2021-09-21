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
 * Complete the 'saveThePrisoner' function below.
 *
 * The function is expected to return an INTEGER.
 * The function accepts following parameters:
 *  1. INTEGER n
 *  2. INTEGER m
 *  3. INTEGER s
 */

function saveThePrisoner(n, m, s) {
        /*
         * Variables initialization.
         * INTEGER numOfPrisoners: the number of prisoners.
         * INTEGER numOfSweets: the number of sweets.
         * INTEGER startingSeat: the chair number to start passing out treats at.
        */
        const numOfPrisoners = n;
        const numOfSweets = m;
        const startingSeat = s;        
        
        /*
         * To determine the chair number to warn, determine the remaining sweets of the iteration before the last iteration.
         * The remainder of sweets will indicate which prisoner to be warned.
         * If remainder of sweets is 0, set the number to the last chair number since index 0 is not exist.
        */    
        var seatToWarn = (startingSeat - 1 + numOfSweets) % numOfPrisoners;
        if (seatToWarn == 0) {
            seatToWarn = numOfPrisoners;
        }
        
        return seatToWarn;
}

function main() {
    const ws = fs.createWriteStream(process.env.OUTPUT_PATH);

    const t = parseInt(readLine().trim(), 10);

    for (let tItr = 0; tItr < t; tItr++) {
        const firstMultipleInput = readLine().replace(/\s+$/g, '').split(' ');

        const n = parseInt(firstMultipleInput[0], 10);

        const m = parseInt(firstMultipleInput[1], 10);

        const s = parseInt(firstMultipleInput[2], 10);

        const result = saveThePrisoner(n, m, s);

        ws.write(result + '\n');
    }

    ws.end();
}
