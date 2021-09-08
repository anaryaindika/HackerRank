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
 * Complete the 'timeConversion' function below.
 *
 * The function is expected to return a STRING.
 * The function accepts STRING s as parameter.
 */

function timeConversion(s) {
    // Write your code here    
    const convertTime = s => {
        let [hours,minutes,seconds,meridiem] = s.match(/[a-zA-Z]+|[0-9]+/g);
        if (hours == '12') {
            hours = '00';
        }
        if (meridiem == 'PM') {
            hours = parseInt(hours,10)+12;
        }
        return `${hours}:${minutes}:${seconds}`;
    }
    return convertTime(s);    
}

function main() {
    const ws = fs.createWriteStream(process.env.OUTPUT_PATH);

    const s = readLine();

    const result = timeConversion(s);

    ws.write(result + '\n');

    ws.end();
}
