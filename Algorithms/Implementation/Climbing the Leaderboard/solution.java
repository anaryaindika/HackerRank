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
     * Complete the 'climbingLeaderboard' function below.
     *
     * The function is expected to return an INTEGER_ARRAY.
     * The function accepts following parameters:
     *  1. INTEGER_ARRAY ranked
     *  2. INTEGER_ARRAY player
     */            
    
    public static List<Integer> climbingLeaderboard(List<Integer> ranked, List<Integer> player) {                
        // Write your code here        
        // Initialization        
        LinkedHashSet<Integer> linkedHashSet = new LinkedHashSet<Integer>(ranked);
        List<Integer> playersRanks = new ArrayList<>();
        HashMap<Integer, Integer> leaderboard = new HashMap<>();
        int rank = 1;
        // Remove duplicate score in ranked player scores        
        ranked.clear();
        ranked.addAll(linkedHashSet);
        // Set ranked player leaderboard
        for (int i=0; i<ranked.size(); i++) {
            if (!leaderboard.containsKey(ranked.get(i))) {
                leaderboard.put(ranked.get(i),rank++);
            }
        }
        // Get player's rankings
        for (int score : player) {
            if (leaderboard.containsKey(score)) {
                playersRanks.add(leaderboard.get(score));
            } else {
                int index = Collections.binarySearch(ranked, score, Collections.reverseOrder());
                playersRanks.add(Math.abs(index));
            }
        }                
        return playersRanks;                
    }

}

public class Solution {
    public static void main(String[] args) throws IOException {
        BufferedReader bufferedReader = new BufferedReader(new InputStreamReader(System.in));
        BufferedWriter bufferedWriter = new BufferedWriter(new FileWriter(System.getenv("OUTPUT_PATH")));

        int rankedCount = Integer.parseInt(bufferedReader.readLine().trim());

        List<Integer> ranked = Stream.of(bufferedReader.readLine().replaceAll("\\s+$", "").split(" "))
            .map(Integer::parseInt)
            .collect(toList());

        int playerCount = Integer.parseInt(bufferedReader.readLine().trim());

        List<Integer> player = Stream.of(bufferedReader.readLine().replaceAll("\\s+$", "").split(" "))
            .map(Integer::parseInt)
            .collect(toList());

        List<Integer> result = Result.climbingLeaderboard(ranked, player);

        bufferedWriter.write(
            result.stream()
                .map(Object::toString)
                .collect(joining("\n"))
            + "\n"
        );

        bufferedReader.close();
        bufferedWriter.close();
    }
}
