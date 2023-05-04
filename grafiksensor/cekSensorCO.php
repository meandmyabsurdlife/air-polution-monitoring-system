<?php
	$connection = mysqli_connect("localhost", "root", "", "resti");
	$sql = mysqli_query($connection, "SELECT * FROM tb_co ORDER BY id DESC LIMIT 1");
	$data = mysqli_fetch_array($sql);
	$nilai_co = $data["co"];
	
	//uji bila nilai suhu belom ada maka = 0
	if ($nilai_co == "") $nilai_co = 0;

	// cetak nilai suhu
	echo $nilai_co;
?>