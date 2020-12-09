import org.json.*;

import java.io.BufferedReader;
import java.io.IOException;
import java.io.InputStreamReader;
import java.lang.reflect.Array;
import java.net.HttpURLConnection;
import java.net.URL;

public class Main {

    public static void main(String[] args) throws IOException {
        String url = "https://api.privatbank.ua/p24api/pubinfo?json&exchange&coursid=5";

        URL obj = new URL(url);
        HttpURLConnection connection = (HttpURLConnection) obj.openConnection();

        connection.setRequestMethod("GET");

        BufferedReader in = new BufferedReader(new InputStreamReader(connection.getInputStream()));
        String inputLine;
        StringBuffer response = new StringBuffer();

        while ((inputLine = in.readLine()) != null) {
            response.append(inputLine);
        }
        in.close();
        System.out.println("Успішний запит");
        System.out.println(response.toString());

         url = "https://api.privatbank.ua/p24api/pubinfo";

         obj = new URL(url);
         connection = (HttpURLConnection) obj.openConnection();

        connection.setRequestMethod("GET");

         in = new BufferedReader(new InputStreamReader(connection.getInputStream()));

         response = new StringBuffer();

        while ((inputLine = in.readLine()) != null) {
            response.append(inputLine);
        }
        in.close();
        System.out.println("Неуспішний запит");
        System.out.println(response.toString());
    }
}
