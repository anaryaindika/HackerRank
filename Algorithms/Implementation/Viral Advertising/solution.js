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
 * Complete the 'viralAdvertising' function below.
 *
 * The function is expected to return an INTEGER.
 * The function accepts INTEGER n as parameter.
 */

function viralAdvertising(n) {
    /*
     * Variables initialization.
     * INTEGER endDay: the day number to report.
     * INTEGER people: amount of people who receive the advertisement each day.
     * INTEGER likes: amount of likes each day.
     * INTEGER cumulativeLikes: cumulative amount of likes each day.
    */
    const endDay = n;        
    var people = 5, likes = Math.floor(people/2), cumulativeLikes = likes;
    
    /*
     * Iterate each day.
     * Detemine the amount of people who receive the advertisement each day based one amount of likes the day before.
     * Determine likes on each day based on the amount of people previously determined.
     * Count cumulative likes based on the amount of likes each day.
    */
    for (let day=2; day<=endDay; day++) {
        people = likes*3;
        likes = Math.floor(people/2);
        cumulativeLikes += likes;
    }
        
    return cumulativeLikes;
}

function main() {
    const ws = fs.createWriteStream(process.env.OUTPUT_PATH);

    const n = parseInt(readLine().trim(), 10);

    const result = viralAdvertising(n);

    ws.write(result + '\n');

    ws.end();
}
