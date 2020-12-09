import java.net.ServerSocket;
import java.net.Socket;
import java.io.InputStream;
import java.io.OutputStream;
import java.io.InputStreamReader;
import java.io.BufferedReader;
import java.util.Random;

public class HttpServer {

    public static void main(String[] args) throws Throwable {
        ServerSocket ss = new ServerSocket(8080);
        while (true) {
            Socket s = ss.accept();
            System.err.println("Client accepted");
            new Thread(new SocketProcessor(s)).start();
        }
    }

    private static class SocketProcessor implements Runnable {

        private Socket s;
        private InputStream is;
        private OutputStream os;
	private int randomnumber;
	private int number;

        private SocketProcessor(Socket s) throws Throwable {
            this.s = s;
            this.is = s.getInputStream();
            this.os = s.getOutputStream();
		Random r = new Random();
	    this.randomnumber = r.nextInt((5 - 0) + 1) + 0;
		System.out.println("random number:"+this.randomnumber);
	    this.number = -1;
		
        }

        public void run() {
            try {
                readInputHeaders();
		if(number == randomnumber){
                	writeResponse("<html><body><h1>You guessed the number!</h1></body></html>");
                } else {
			writeResponse("<html><body><h1>Number "+number+" is incorrect</h1></body></html>");		
		}
            } catch (Throwable t) {
                /*do nothing*/
            } finally {
                try {
                    s.close();
                } catch (Throwable t) {
                    /*do nothing*/
                }
            }
            System.err.println("Client processing finished");
        }

        private void writeResponse(String s) throws Throwable {
            String response = "HTTP/1.1 200 OK\r\n" +
                    "Server: YarServer/2009-09-09\r\n" +
                    "Content-Type: text/html\r\n" +
                    "Content-Length: " + s.length() + "\r\n" +
                    "Connection: close\r\n\r\n";
            String result = response + s;
            os.write(result.getBytes());
            os.flush();
        }

        private void readInputHeaders() throws Throwable {
            BufferedReader br = new BufferedReader(new InputStreamReader(is));
            while(true) {
                String s = br.readLine();
                System.out.println(s);
		int index = s.lastIndexOf("GET /number");
		if(index >= 0){
		String url = s.split(" ")[1];
		 System.out.println("url parameter:"+url.split("/")[2]);
		 this.number = Integer.parseInt(url.split("/")[2]);
	        }
                if(s == null || s.trim().length() == 0) {
		    System.out.println(s);
                    break;
                }
            }
        }
    }
}