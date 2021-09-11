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
 * Complete the 'dayOfProgrammer' function below.
 *
 * The function is expected to return a STRING.
 * The function accepts INTEGER year as parameter.
 */

function dayOfProgrammer(year) {
    // Write your code here        
    var date = new Date();
    if (year < 1918) {
        if (year%4 == 0) {            
            date.setFullYear(year,8,12);            
        } else {            
            date.setFullYear(year,0,0);
            date.setDate(date.getDate()+256);
        }
    } else if (year == 1918) {
        date.setFullYear(year,1,14);
        date.setDate(date.getDate()+224);
    } else {
        date.setFullYear(year,0,0);
        date.setDate(date.getDate()+256);        
    }    
    let month = date.getMonth() < 10 ? "0"+(date.getMonth()+1) : date.getMonth()+1;    
    return date.getDate()+"."+month+"."+year;
}

function main() {
    const ws = fs.createWriteStream(process.env.OUTPUT_PATH);

    const year = parseInt(readLine().trim(), 10);

    const result = dayOfProgrammer(year);

    ws.write(result + '\n');

    ws.end();
}
