/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
package parcial_final;

import com.panamahitek.ArduinoException;
import com.panamahitek.PanamaHitek_Arduino;
import java.util.logging.Level;
import java.util.logging.Logger;
import jssc.SerialPortEvent;
import jssc.SerialPortEventListener;
import jssc.SerialPortException;
import java.io.IOException;
/**
 *
 * @author Carlos
 */
public class Parcial_Final {

private static PanamaHitek_Arduino ino = new PanamaHitek_Arduino();
 private static final SerialPortEventListener listener = new SerialPortEventListener() {
    @Override
    public void serialEvent(SerialPortEvent spe) {
    try {
        if (ino.isMessageAvailable()) {
            String mensaje=ino.printMessage();
            System.out.print(mensaje);
            //Pub client = new Pub(mensaje);
           Post client = new Post(mensaje);

    }
    } catch (SerialPortException | ArduinoException ex) {
        Logger.getLogger(Parcial_Final.class.getName()).log(Level.SEVERE, null, ex);
   
    }   catch (IOException ex) {
            Logger.getLogger(Parcial_Final.class.getName()).log(Level.SEVERE, null, ex);
        }
    }
 };
    /**
     * @param args the command line arguments
     */
    public static void main(String[] args) {
        try {
            ino.arduinoRX("COM1", 9600, listener);
        } catch (ArduinoException | SerialPortException ex) {
            Logger.getLogger(Parcial_Final.class.getName()).log(Level.SEVERE, null, ex);
        }
    }
    
}
