<?php
	$connection = mysqli_connect("localhost", "root", "", "resti");
	$sql = mysqli_query($connection, "SELECT * FROM tb_co ORDER BY id DESC LIMIT 1");
	$data = mysqli_fetch_array($sql);
	$nilai_co2 = $data["co2"];
	
	//uji bila nilai suhu belom ada maka = 0
	if ($nilai_co2 == "") $nilai_co2 = 0;

	// cetak nilai suhu
	echo $nilai_co2;
?>