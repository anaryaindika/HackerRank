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
 * Complete the 'climbingLeaderboard' function below.
 *
 * The function is expected to return an INTEGER_ARRAY.
 * The function accepts following parameters:
 *  1. INTEGER_ARRAY ranked
 *  2. INTEGER_ARRAY player
 */

function climbingLeaderboard(ranked, player) {
    // Write your code here                
    const rankedScoresSet = new Set(ranked);    
    const rankedScoresArray = [...rankedScoresSet];
    var playersRanks = [];    
    player.forEach(function(playerScore) {        
        playersRanks.push(insertionPoint(rankedScoresArray, playerScore)+1);
    });        
    return playersRanks;
}

function insertionPoint(leaderboard, playerScore) {
    var start = 0, end = leaderboard.length-1, point = Math.floor((end-start)/2)+start;
    if (playerScore < leaderboard[leaderboard.length-1]) {                
        point = leaderboard.length;        
    } else {                
        while (start < end) {
            var rankedScore = leaderboard[point];            
            if (playerScore == rankedScore) {
                break;
            } else if (playerScore < rankedScore) {
                start = point+1;                
            } else {
                end = point;
            }            
            point = Math.floor((end-start)/2)+start;
        }
    }
    return point;
}

function main() {
    const ws = fs.createWriteStream(process.env.OUTPUT_PATH);

    const rankedCount = parseInt(readLine().trim(), 10);

    const ranked = readLine().replace(/\s+$/g, '').split(' ').map(rankedTemp => parseInt(rankedTemp, 10));

    const playerCount = parseInt(readLine().trim(), 10);

    const player = readLine().replace(/\s+$/g, '').split(' ').map(playerTemp => parseInt(playerTemp, 10));

    const result = climbingLeaderboard(ranked, player);

    ws.write(result.join('\n') + '\n');

    ws.end();
}
