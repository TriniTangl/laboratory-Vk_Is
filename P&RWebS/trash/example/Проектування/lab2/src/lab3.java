import org.json.*;

import java.io.BufferedReader;
import java.io.IOException;
import java.io.InputStreamReader;
import java.net.HttpURLConnection;
import java.net.URL;

public class lab3 {

    public static void main(String[] args) throws IOException {
        String []arr = {"btcuah", "ethrub","xrpuah","usdtuah","wavesuah","ptiuah"};
        for(String s:arr){
            sendRequest(s);
        }

    }
    private static void sendRequest(String currency) throws IOException {
        String url = "https://kuna.io/api/v2/tickers/"+currency;
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

        JSONObject body = new JSONObject(response.toString());
        JSONObject ticker = body.getJSONObject("ticker");
        System.out.println("Валюта: "+currency+" = "+ticker.getString("buy"));
    }

}
