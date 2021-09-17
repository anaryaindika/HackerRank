<?php

/*
 * Complete the 'climbingLeaderboard' function below.
 *
 * The function is expected to return an INTEGER_ARRAY.
 * The function accepts following parameters:
 *  1. INTEGER_ARRAY ranked
 *  2. INTEGER_ARRAY player
 */

function climbingLeaderboard($ranked, $player) {
    // Write your code here
    // Remove duplicate values from ranked player scores and reindex the array    
    $leaderboard = array_unique($ranked);
    $leaderboard = array_combine(range(0,count($leaderboard)-1),$leaderboard);
    
    // Set alice ranks based on each alice score rank on leaderboard
    $playerRanks = [];
    foreach ($player as $aliceScore) {
        array_push($playerRanks, insertionPoint($leaderboard, $aliceScore)+1);
    }
    return $playerRanks;
}

// Function to get insertion point using binary search
function insertionPoint($leaderboard, $aliceScore) {
    $leaderboardLength = count($leaderboard);
    $start = 0;
    $end = $leaderboardLength-1;
    $point = floor(($end-$start)/2)+$start;    
    if ($aliceScore < $leaderboard[$end]) {
        $point = $leaderboardLength;
    } else {
        while ($start < $end) {
            $rankedScore = $leaderboard[$point];
            if ($aliceScore == $rankedScore) {
                break;
            } else if ($aliceScore < $rankedScore) {
                $start = $point+1;
            } else {
                $end = $point;
            }
            $point = floor(($end-$start)/2)+$start;
        }
    }
    return $point;
}

$fptr = fopen(getenv("OUTPUT_PATH"), "w");

$ranked_count = intval(trim(fgets(STDIN)));

$ranked_temp = rtrim(fgets(STDIN));

$ranked = array_map('intval', preg_split('/ /', $ranked_temp, -1, PREG_SPLIT_NO_EMPTY));

$player_count = intval(trim(fgets(STDIN)));

$player_temp = rtrim(fgets(STDIN));

$player = array_map('intval', preg_split('/ /', $player_temp, -1, PREG_SPLIT_NO_EMPTY));

$result = climbingLeaderboard($ranked, $player);

fwrite($fptr, implode("\n", $result) . "\n");

fclose($fptr);
