// Include WiFi
#include <WiFi.h>
#include <HTTPClient.h>

// Pin Definitions
#define MQ135_3V3_PIN_AOUT  34 // A0 on ESP32
#define MQ7_3V3_PIN_AOUT  35  // A1 on ESP32

// Initiate WiFi
const char* ssid = "YOUR_WIFI_SSID";
const char* password = "YOUR_WIFI_PASSWORD";

//Inisialisasi host untuk IP address server (sesuaikan dengan WiFi)
const char* server = "YOUR_IPvADDRESS";

void setup() 
{
    Serial.begin(9600);
    while (!Serial) ; // wait for serial port to connect. Needed for native USB
    Serial.println("start");

    //Inisiasi hostname
    WiFi.hostname("ESP32");
    //koneksi ke WiFi
    WiFi.begin(ssid,password);

    //cek koneksi
    while(WiFi.status() != WL_CONNECTED){
      // coba konek ke
      Serial.println(".");
      delay(1000);
    }

    //koneksi berhasil
    Serial.println("Berhasil connect ke WiFi");
}

void loop() 
{
    int analogValueCO2 = analogRead(MQ135_3V3_PIN_AOUT);
    int analogValueCO = analogRead(MQ7_3V3_PIN_AOUT);
    Serial.println( "Kadar CO: " + String(analogValueCO) + " ppm" );
    Serial.println( "Kadar CO2: " + String(analogValueCO2) + " ppm" );
    Serial.println();

    //Kirim data
    WiFiClient client;
    const int httpPort = 80;
    //cek koneksi esp32 ke web server
    if(!client.connect(server, httpPort)){
      Serial.println("Gagal terkoneksi ke server");
      return;
    }

    HTTPClient http;
    String Link = "http://" + String(server) + "/grafikSensor/kirimdata.php?co=" + String(analogValueCO) + "&co2=" + String(analogValueCO2) ;
    //eksekusi url
    http.begin(Link);
    http.GET();
    // tangkap response
    String respon = http.getString();
    Serial.println(respon);
    
    delay(5000);
}
