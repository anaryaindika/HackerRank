import java.io.*;
import java.math.*;
import java.security.*;
import java.text.*;
import java.util.*;
import java.util.concurrent.*;
import java.util.function.*;
import java.util.regex.*;
import java.util.stream.*;
import static java.util.stream.Collectors.joining;
import static java.util.stream.Collectors.toList;

class Result {

    /*
     * Complete the 'viralAdvertising' function below.
     *
     * The function is expected to return an INTEGER.
     * The function accepts INTEGER n as parameter.
     */

    public static int viralAdvertising(int n) {
        /*
         * Variables initialization.
         * INTEGER endDay: the day number to report.
         * INTEGER people: amount of people who receive the advertisement each day.
         * INTEGER likes: amount of likes each day.
         * INTEGER cumulativeLikes: cumulative amount of likes each day.
        */
        int endDay = n;
        int people = 5, likes = people/2, cumulativeLikes = likes;
        /*
         * Iterate each day.
         * Detemine the amount of people who receive the advertisement each day based one amount of likes the day before.
         * Determine likes on each day based on the amount of people previously determined.
         * Count cumulative likes based on the amount of likes each day.
        */
        for (int day=2; day<=endDay; day++) {
            people = likes*3;
            likes = people/2;
            cumulativeLikes += likes;
        }
            
        return cumulativeLikes;
    }

}

public class Solution {
    public static void main(String[] args) throws IOException {
        BufferedReader bufferedReader = new BufferedReader(new InputStreamReader(System.in));
        BufferedWriter bufferedWriter = new BufferedWriter(new FileWriter(System.getenv("OUTPUT_PATH")));

        int n = Integer.parseInt(bufferedReader.readLine().trim());

        int result = Result.viralAdvertising(n);

        bufferedWriter.write(String.valueOf(result));
        bufferedWriter.newLine();

        bufferedReader.close();
        bufferedWriter.close();
    }
}
