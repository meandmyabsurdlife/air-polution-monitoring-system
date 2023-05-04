# Air Polution Monitoring System - II3240 Rekayasa Sistem dan Teknologi Informasi
Sistem ini merupakan *source code* prototipe sistem pemantauan polusi udara dengan menggunakan ESP32, MQ-7 Gas Sensor, dan MQ-135 Gas Sensor.
## Komponen sistem
1. ESP32
2. MQ-7 Gas Sensor
3. MQ-135 Gas Sensor
4. HTTP Web server
5. MySQL Database (XAMPP Control Panel)
## Cara menjalankan program
1. Buat *database* baru pada XAMPP dengan nama `resti`
2. Buat tabel dengan nama `tb_co` pada database `resti`
3. Clone *repository* ini
4. Pindahkan folder `grafiksensor` ke *directory* `C:\xampp\htdocs`
5. Hubungkan ESP32 yang sudah terhubung dengan sensor MQ-7 Gas Sensor dan MQ-135 Gas Sensor ke PC/laptop dengan kabel USB
6. Ubah *value* dari `ssid`, `password`, dan `server` sesuai dengan koneksi Wi-Fi yang terhubung ke PC/laptop
7. Jalankan *file* `GrafikSensor.ino`
8. Matikan *firewall* untuk *public network*
9. Buka browser, lalu ketikkan `http://localhost/grafiksensor/` untuk menjalankan web
