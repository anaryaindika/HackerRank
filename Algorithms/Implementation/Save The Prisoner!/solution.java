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
     * Complete the 'saveThePrisoner' function below.
     *
     * The function is expected to return an INTEGER.
     * The function accepts following parameters:
     *  1. INTEGER n
     *  2. INTEGER m
     *  3. INTEGER s
     */

    public static int saveThePrisoner(int n, int m, int s) {
        /*
         * Variables initialization.
         * INTEGER numOfPrisoners: the number of prisoners.
         * INTEGER numOfSweets: the number of sweets.
         * INTEGER startingSeat: the chair number to start passing out treats at.
        */
        int numOfPrisoners = n;
        int numOfSweets = m;
        int startingSeat = s;        
        
        /*
         * To determine the chair number to warn, determine the remaining sweets of the iteration before the last iteration.
         * The remainder of sweets will indicate which prisoner to be warned.
         * If remainder of sweets is 0, set the number to the last chair number since index 0 is not exist.
        */    
        int seatToWarn = (startingSeat - 1 + numOfSweets) % numOfPrisoners;
        if (seatToWarn == 0) {
            seatToWarn = numOfPrisoners;
        }
        
        return seatToWarn;
    }

}

public class Solution {
    public static void main(String[] args) throws IOException {
        BufferedReader bufferedReader = new BufferedReader(new InputStreamReader(System.in));
        BufferedWriter bufferedWriter = new BufferedWriter(new FileWriter(System.getenv("OUTPUT_PATH")));

        int t = Integer.parseInt(bufferedReader.readLine().trim());

        IntStream.range(0, t).forEach(tItr -> {
            try {
                String[] firstMultipleInput = bufferedReader.readLine().replaceAll("\\s+$", "").split(" ");

                int n = Integer.parseInt(firstMultipleInput[0]);

                int m = Integer.parseInt(firstMultipleInput[1]);

                int s = Integer.parseInt(firstMultipleInput[2]);

                int result = Result.saveThePrisoner(n, m, s);

                bufferedWriter.write(String.valueOf(result));
                bufferedWriter.newLine();
            } catch (IOException ex) {
                throw new RuntimeException(ex);
            }
        });

        bufferedReader.close();
        bufferedWriter.close();
    }
}
