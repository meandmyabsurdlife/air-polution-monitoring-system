<?php 
	// koneksi database
	$connection = mysqli_connect("localhost", "root", "", "resti");

	// baca data dari tabel tb_co

	// baca data ID tertiggi
	$sql_ID = mysqli_query($connection, "SELECT MAX(id) FROM tb_co");
	// tangkap data
	$data_ID = mysqli_fetch_array($sql_ID);
	// ambil ID terakhir
	$last_ID = $data_ID['MAX(id)'];
	$first_ID = $last_ID - 9;

	// Pembatasan Jumlah Data ke 10 - data terakhir
	// WHERE id>='$first_ID' and id<='$last_ID', tadi di last_ID kurang tanda $
	// sumbu x
	$waktu = mysqli_query($connection, "SELECT waktu FROM tb_co WHERE id>='$first_ID' and id<='$last_ID' ORDER BY id ASC");
	// sumbu y - co
	$co = mysqli_query($connection, "SELECT co FROM tb_co WHERE id>='$first_ID' and id<='$last_ID' ORDER BY id ASC");
	// sumbu y - co2
	$co2 = mysqli_query($connection, "SELECT co2 FROM tb_co WHERE id>='$first_ID' and id<='$last_ID' ORDER BY id ASC");
 ?>

 <!-- tampilan grafik -->
 <div class="panel panel-primary">
 	<div class="panel-heading">
 		Grafik Kadar CO dan CO2
 	</div>

	<div class="panel-body">
		<!-- canvas grafik -->
		<canvas id="coChart"></canvas>
		<!-- gambar grafik -->
		<script type="text/javascript">
			// baca ID canvas
			var canvasCO = document.getElementById('coChart');
			// letakkan data untuk grafik
			var dataCO = {
				labels : [
					<?php 
						while($data_waktu = mysqli_fetch_array($waktu))
						{
							echo '"'. $data_waktu['waktu']. '",' ;
						}
					?>
				] ,
				datasets : [{
					label : 'Kadar CO',
					fill : true,
					backgroundColor : "rgba(245, 209, 66, .15)",
					borderColor : "rgba(245, 209, 66, 1)",
					lineTension : 0.5,
					pointRadius : 3,
					data : [
						<?php 
							while($data_co = mysqli_fetch_array($co))
							{
								echo '"'. $data_co['co']. '",' ;
							}
						?>
					]
				} ,
				{
					label : 'Kadar CO2',
					fill : true,
					backgroundColor : "rgba(160, 109, 242, .15)",
					borderColor : "rgba(160, 109, 242, 1)",
					lineTension : 0.5,
					pointRadius : 3,
					data : [
						<?php 
							while($data_co2 = mysqli_fetch_array($co2))
							{
								echo '"'. $data_co2['co2']. '",' ;
							}
						?>
					]
				}


				]
			};

			// option grafik
			var optionGrafik = {
				showLines : true,
				animation : {duration : 0}
			} ;

			// cetak ke dalam canvas
			var chartLineCO = Chart.Line(canvasCO, {
				data : dataCO,
				option : optionGrafik
			}) ;

			// 

		</script>
	</div>

 </div>