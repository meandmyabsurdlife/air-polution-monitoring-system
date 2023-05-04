<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Air Polution Monitoring System</title>

	<!-- import Bootstrap -->
	<link rel="stylesheet" type="text/css" href="assets/css/bootstrap.min.css">
	<script type="text/javascript" src="assets/js/jquery-3.4.0.min.js"></script>
	<script type="text/javascript" src="assets/js/mdb.min.js"></script>
	<script type="text/javascript" src="jquery-latest.js"></script>

	<!-- memanggil nilai sensor -->
	<script type="text/javascript">
        $(document).ready( function() {
            setInterval( function() {
                $("#cekSensorCO").load("cekSensorCO.php");
            }, 1000);
        });
    </script>

    <script type="text/javascript">
        $(document).ready( function() {
            setInterval( function() {
                $("#cekSensorCO2").load("cekSensorCO2.php");
            }, 1000);
        });
    </script>

    <!-- mengubah status polusi udara -->
    <script type="text/javascript">
    $(document).ready(function() {
        setInterval(function() {
            // Get the values of CO and CO2 sensors
            var co = parseInt($("#cekSensorCO").text());
            var co2 = parseInt($("#cekSensorCO2").text());

            // Set the status text based on the sensor values
            if (co > 30 || co2 > 1000) {
                $("#statusPolusi").text("Danger");
            } else if (co > 20 || co2 < 750) {
                $("#statusPolusi").text("Warning");
            } else {
                $("#statusPolusi").text("Aman");
            }
        }, 1000);
    });
	</script>

	<!-- memanggil data grafik -->
	<script type="text/javascript">
		var refreshCO = setInterval(function(){
			$('#gCO_CO2_container').load('dataCO_CO2.php');
		}, 1000);
	</script>


</head>

<body>
	<!-- menampilkan nilai -->
	<div style="display: flex;">
		<!-- nilai sensor CO dan CO2-->
		<div class="container" style="text-align: center; width: 80%">
			<h4>Kadar CO (ppm)</h4>
			<div class="panel panel-default">
				<div class="panel-body">
					<h1> <span id="cekSensorCO"> 0 </span> </h1>
				</div>
			</div>
		</div>

		<div class="container" style="text-align: center; width: 80%">
			<h4>Kadar CO2 (ppm)</h4>
			<div class="panel panel-default">
				<div class="panel-body">
					<h1> <span id="cekSensorCO2"> 0 </span> </h1>
				</div>
			</div>
		</div>

		<!-- status udara -->
		<div class="container" style="text-align: center; width: 80%">
			<h4>Status Polusi</h4>
			<div class="panel panel-default">
				<div class="panel-body">
					<h1> <span id="statusPolusi"> - </span> </h1>
				</div>
			</div>
		</div>
	</div>



	<!-- tempat grafik -->
	<div class="container" style="text-align: center;">
		<h3>Grafik Kadar CO dan CO2</h3>
		<p>(Data yang ditampilkan adalah 10 data terakhir)</p>
	</div>

	<!-- grafik CO dan CO2 (karena dinamis perlu ID) -->
	<div class="container">	
		<div class="container" id="gCO_CO2_container" style="width: 80%;">
		</div>
	</div>

</body>

</html>