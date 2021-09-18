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
 * Complete the 'angryProfessor' function below.
 *
 * The function is expected to return a STRING.
 * The function accepts following parameters:
 *  1. INTEGER k
 *  2. INTEGER_ARRAY a
 */

function angryProfessor(k, a) {    
    /* Initialize variables.
     *  1. INTEGER threshold : threshold of mininum attendess.
     *  2. ARRAY INTEGER arrivalTimes : arrival time of each student.
     *  3. INTEGER onTimeStudent : amount of on time student.
    */
    const threshold = k;
    const arrivalTimes = a;
    var onTimeStudent = 0;    
        
    /* Iterate through each student arrival time and count how many student are on time.
     * Check if threshold is fulfilled. Return "YES if threshold fulfilled."
    */
    for (let i=0; i<arrivalTimes.length; i++) {
        if (arrivalTimes[i] <= 0) {
            onTimeStudent++;
        }
        if (onTimeStudent == threshold) {
            return "NO";
        }
    }
    return "YES";
}

function main() {
    const ws = fs.createWriteStream(process.env.OUTPUT_PATH);

    const t = parseInt(readLine().trim(), 10);

    for (let tItr = 0; tItr < t; tItr++) {
        const firstMultipleInput = readLine().replace(/\s+$/g, '').split(' ');

        const n = parseInt(firstMultipleInput[0], 10);

        const k = parseInt(firstMultipleInput[1], 10);

        const a = readLine().replace(/\s+$/g, '').split(' ').map(aTemp => parseInt(aTemp, 10));

        const result = angryProfessor(k, a);

        ws.write(result + '\n');
    }

    ws.end();
}
