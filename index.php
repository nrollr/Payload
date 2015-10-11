
<?php include ('include/db_connect.php'); ?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" 
	"http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <link rel="stylesheet" type="text/css" href="assets/css/bootstrap.css">
    <link rel="stylesheet" type="text/css" href="assets/css/bootstrap-select.css">
    <link rel="stylesheet" type="text/css" href="assets/css/font-awesome.css">
</head>

<body>
<?php 
	if($_POST['submit'] == 1) {
		if($_POST['sensor_id'] == '') {
			echo ''.$warning.'';
			$error = true;
		}
		if($_POST['time'] == '') {
			echo ''.$warning.'';
			$error = true;
		}
		if($_POST['volume'] == '') {
			echo ''.$warning.'';
			$error = true;
		}
		if($error != true) {
	
	$query = "INSERT INTO Data (sensor_id, time, volume) VALUES ('$_POST[sensor_id]', '$_POST[time]', '$_POST[volume]')";
	$result = mysqli_query($db, $query); 
		}
	}
?>
<!-- Begin Container -->
<div class="container"> 

	<!-- Begin Input section -->
	<div class="page-header">
		<p class="lead">Basic interface to generate <strong>sensor data</strong>
		<a href="index.php" id="refresh"><sup><i class="fa fa-refresh"></i></sup></a></p>
	</div>
  
  	<div class="row">
  	<form method="post" action="index.php" role="form" id="data">
	<div class="col-md-4">
		<p>Select <b>sensor</b> :</p>
		
			<?php
			//header("Content-type: text/html; charset=utf-8");
			 
			$sql = "SELECT * FROM Sensors";
			$query = mysqli_query($db, $sql);
				echo '<select onchange="showClient(this.value)" id="dropdown" class="selectpicker" data-width="100%">';
				echo '<option value="">Available Sensors</option>';
					while($sensor = mysqli_fetch_assoc($query)){
					echo "<option value='" . $sensor['client_id'] ."'>" . $sensor['sensor_id'] . "</option>";
					}
				echo '</select>';
			?>
		</br>
		</br>
			<?php 
				$date = date_create();
				$stamp = date_timestamp_get($date);
			?>
		<input type="hidden" id="time" name="time" value="<?php echo ''.$stamp.''; ?>" />
		<div class="row">
			<div class="col-md-12">
				<input class="form-control" type="text" id="volume" name="volume" placeholder="Enter flowmeter value"/></br>
				<button name="submit" type="submit" class="btn btn-default" value="1">Generate payload</button>
			</div>
		</div>		
	</div>

	<div class="col-md-4 col-md-offset-4">
		<div id="info"></div>
	</div>
  	</form>	
	</div>
 	<!-- End Input section -->

  <!-- Begin Output section -->	
  
  <div class="footer">
  	<div class="row">
	<div class="col-md-9">
  	<table class="table table-hover">
    <thead>
        <tr>
            <th>Sensor ID</th>
            <th>Timestamp</th>
            <th>Flowmeter output</th>
        </tr>
    </thead>
    <tbody>    
		<?php 
		$sql = "SELECT * FROM Data";
		$query = mysqli_query($db, $sql);
				while($rawdata = mysqli_fetch_assoc($query)){
				echo "<tr><td>". $rawdata['sensor_id'] ."</td><td>". $rawdata['time'] ."</td><td>". $rawdata['volume'] ."</td></tr>";
				}
		?>
	</tbody>	
	</table>
	</div>	
	</div>	
  </div>	
  <!-- End Output section -->

</div>
<!-- End Container -->
	<script type="text/javascript" src="assets/javascript/jquery.js"></script>
	<script type="text/javascript" src="assets/javascript/bootstrap.js"></script>
	<script type="text/javascript" src="assets/javascript/bootstrap-select.js"></script>

	<script language="javascript"> $('.selectpicker').selectpicker('refresh'); </script> 
	<script language="javascript">
	function showClient(str)
		{ if (str=="")
	  		{document.getElementById("info").innerHTML="";
		  	return;}
		if (window.XMLHttpRequest)
	  		{xmlhttp=new XMLHttpRequest();}
		else
	  		{xmlhttp=new ActiveXObject("Microsoft.XMLHTTP");}
			xmlhttp.onreadystatechange=function()
			  {if (xmlhttp.readyState==4 && xmlhttp.status==200)
	    		{document.getElementById("info").innerHTML=xmlhttp.responseText;}}
			xmlhttp.open("GET","include/client.php?qry="+str,true);
			xmlhttp.send();
		}
	</script>

	<script language="javascript">
	$(window).load(function(){
	$(document).ready(function(){
	    $('#refresh').click(function(){
	        $('#dropdown').prop('selectedIndex',0);
	    	})
		});
	}); 
	</script>
</body>
</html>