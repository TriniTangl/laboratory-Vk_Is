import javafx.application.Application;
import javafx.event.ActionEvent;
import javafx.event.EventHandler;
import javafx.print.Collation;
import javafx.scene.Node;
import javafx.scene.control.Button;
import javafx.scene.layout.GridPane;
import javafx.scene.web.WebEngine;
import javafx.scene.web.WebView;
import javafx.stage.Stage;
import javafx.scene.Scene;
import javafx.scene.*;
import javafx.scene.Group;
import javafx.scene.text.Text;

import java.io.BufferedReader;
import java.io.IOException;
import java.io.InputStreamReader;
import java.net.HttpURLConnection;
import java.net.URL;
import java.util.ArrayList;
import java.util.EventListener;

public class lab5 extends Application{

    public static void main(String[] args) {

        Application.launch(args);
    }

    @Override
    public void start(Stage stage){
        Text text = new Text("Time ");
        text.setLayoutY(10);
        text.setLayoutX(10);

        Text text2 = new Text("Date");
        text.setLayoutY(20);
        text.setLayoutX(10);

        // установка надписи
        Text text3 = new Text("Time and date");
        text.setLayoutY(30);
        text.setLayoutX(10);
        GridPane gridpane = new GridPane();
        /*Button button = new Button();
        button.setText("update");
        button.setOnAction((EventHandler<ActionEvent>) e -> {
             try {
                text.setText("Time: "+getUpdates("http://localhost:5000/getTime"));
            } catch (IOException ex) {
                ex.printStackTrace();
            }
             text2.setText("sfdsfsdfs");
             text3.setText("sadad");

         });
        gridpane.add(button,1,4);
        gridpane.add(text,1,1);
        gridpane.add(text2,1,2);
        gridpane.add(text3,1,3);*/

        WebView browser = new WebView();

// Get WebEngine via WebView
        WebEngine webEngine = browser.getEngine();

// Load page
        webEngine.load("http://eclipse.com");

        Scene scene = new Scene(gridpane);
        stage.setScene(scene);
        stage.setTitle("First Application");
        stage.setWidth(300);
        stage.setHeight(250);
        stage.show();
    }

    public String getUpdates(String url) throws IOException {
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
        return response.toString();
    }
}