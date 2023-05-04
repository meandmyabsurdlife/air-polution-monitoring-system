<?php
	$connection = mysqli_connect("localhost", "root", "", "resti");
	
	//tangkap parameter yg dikirim esp32
	$co = $_GET['co'];
	$co2 = $_GET['co2'];

	//simpan ke tabel tb_co
	//atur id-nya selalu mulai dari 1 ketika dikosongkan
	mysqli_query($connection, "ALTER TABLE tb_co AUTO_INCREMENT=1");
	//simpan nilai CO dan CO2 ke tb_co
	$simpan = mysqli_query($connection, "INSERT INTO tb_co(co, co2) VALUES ('$co', '$co2')");

	//berikan response ke esp32
	if($simpan)
		echo "Berhasil disimpan";
	else
		echo "Gagal disimpan";
?>