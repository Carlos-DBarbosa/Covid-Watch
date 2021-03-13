/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
package parcial_final;

import java.io.IOException;
import java.io.OutputStream;
import java.net.HttpURLConnection;
import java.net.MalformedURLException;
import java.net.URL;

/**
 *
 * @author Carlos
 */
public class Post {
    Post(String mensaje) throws MalformedURLException, IOException {
        //System.out.println(mensaje);
        //URL url = new URL("https://things.ubidots.com/api/v1.6/devices/nodo1/?token=BBFF-xrbsHfcbZmpO83O6FSLmfzMan8y2WE");
        URL url = new URL("http://api.thingspeak.com/update.json?api_key=6BDT2EUX6K07J0HL");
        //URL url = new URL("http://api.thingspeak.com/channels/1244913/bulk_update.json");
        HttpURLConnection conn = (HttpURLConnection) url.openConnection();
        conn.setDoOutput(true);
        conn.setRequestMethod("POST");
        conn.setRequestProperty("Content-Type", "application/json");
        
        String input = mensaje;
        
        OutputStream os = conn.getOutputStream();
        os.write(input.getBytes());
        os.flush();
        if (conn.getResponseCode() != 200) {
            throw new RuntimeException("Failed : HTTP error code : "
            + conn.getResponseCode());
        }
        conn.disconnect();
        System.out.println(mensaje);
    }
}
