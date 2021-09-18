<?php

/*
 * Complete the 'designerPdfViewer' function below.
 *
 * The function is expected to return an INTEGER.
 * The function accepts following parameters:
 *  1. INTEGER_ARRAY h
 *  2. STRING word
 */

function designerPdfViewer($h, $word) {
    // Write your code here
    $alphabets = "abcdefghijklmnopqrstuvwxyz";
    $charsOfWord = str_split($word);
    $maxHeight = 0;
    foreach ($charsOfWord as $char) {
        $index = strpos($alphabets, $char);
        if ($h[$index] > $maxHeight) {
            $maxHeight = $h[$index];
        }
    }
    $area = $maxHeight*count($charsOfWord);
    return $area;
}

$fptr = fopen(getenv("OUTPUT_PATH"), "w");

$h_temp = rtrim(fgets(STDIN));

$h = array_map('intval', preg_split('/ /', $h_temp, -1, PREG_SPLIT_NO_EMPTY));

$word = rtrim(fgets(STDIN), "\r\n");

$result = designerPdfViewer($h, $word);

fwrite($fptr, $result . "\n");

fclose($fptr);
