# Air Polution Monitoring System - II3240 Rekayasa Sistem dan Teknologi Informasi
Sistem ini merupakan *source code* prototipe sistem pemantauan polusi udara dengan menggunakan ESP32, MQ-7 Gas Sensor, dan MQ-135 Gas Sensor.
## Komponen sistem
1. ESP32
2. MQ-7 Gas Sensor
3. MQ-135 Gas Sensor
4. HTTP Web server
5. MySQL Database (XAMPP Control Panel)
## Cara menjalankan program
1. Buka XAMPP, tekan `start` untuk **Apache** dan **MySQL**
2. Buat *database* baru dengan nama `resti`
3. Buat tabel dengan nama `tb_co` pada database `resti` dengan nama kolom **id**, **co**, **co2**, dan **waktu**
4. Clone *repository* ini
5. Pindahkan folder `grafiksensor` ke *directory* `C:\xampp\htdocs`
6. Hubungkan ESP32 yang sudah terhubung dengan sensor MQ-7 Gas Sensor dan MQ-135 Gas Sensor ke PC/laptop dengan kabel USB
7. Ubah *value* dari `ssid`, `password`, dan `server` pada file `GrafikSensor.ino` sesuai dengan koneksi Wi-Fi yang terhubung ke PC/laptop
8. Matikan *firewall* untuk *public network*
9. Jalankan *file* `GrafikSensor.ino`
10. Buka browser, lalu ketikkan `http://localhost/grafiksensor/` untuk menjalankan web
## Created by : Kelompok 15 - K02
- Khafifanisa (18220056)
- Siti Adira Ramadhani (18220094)
- Muhammad Furqan Alfuady (18220108)
