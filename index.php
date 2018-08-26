
<?php
	include ("include/db_connect.php");
	$warning = '<div class="ui negative message"><i class="close icon"></i><div class="header">Warning!</div><p>A required field is missing, please try again!</p></div>';
?>

<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1">

	<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/semantic-ui@2.3.3/dist/semantic.min.css">
	<link rel="stylesheet" href="assets/css/style.css">
</head>
<body>
<br>
<div class="ui grid">
<div class="five wide column"></div>
<div class="six wide column">
<?php
	if($_POST['submit'] == 1) {
		if($_POST['sensor_id'] == '') {
			echo ''.$warning.'';
			$error = true;
		}
		elseif($_POST['volume'] == '') {
			echo ''.$warning.'';
			$error = true;
		}
		if($error != true) {
	$query = "INSERT INTO Data (sensor_id, time, volume) VALUES ('$_POST[sensor_id]', '$_POST[time]', '$_POST[volume]')";
	$result = mysqli_query($db, $query);
		}
	}
?>
<br>
<h1 class="ui dividing header">Payload generator
	<div class="sub header">
		Basic interface to generate <strong>sensor data</strong>&nbsp;
		<a href="index.php"><i class="sync alternate icon grey"></i></a>
	</div>
</h1>
	<form method="POST" action="index.php" class="ui form">
	<div class="ui grid">
		<div class="six wide column">
			<p>Select <b>sensor</b> :</p>
			<div class="field">
				<select name="Folder" class="ui fluid dropdown" onchange="showClient(this.value)">
					<option value="">Available Sensors</option>
					<?php
					$sql = "SELECT * FROM Sensors";
					$query = mysqli_query($db, $sql);
						while($sensor = mysqli_fetch_assoc($query)){
						echo "<option value='" . $sensor['client_id'] ."'>" . $sensor['sensor_id'] . "</option>";
						};
					$date = date_create();
					$timestamp = date_timestamp_get($date);
					?>
				</select>
				<input type="hidden" name="time" value="<?php echo ''.$timestamp.'';?>">
			</div>
			<div class="field">
				<input type="text" name="volume" placeholder="Enter flowmeter value"><br><br>
				<button class="ui basic button" name="submit" type="submit" value="1">Generate payload</button>
			</div>
		</div>
		<div class="ten wide column" id="info"></div>
	</div>
	</form>
<br>
<br>
<br>
<br>
<br>
<table class="ui celled striped very compact table">
	<thead>
		<tr>
			<th class="">Sensor ID</th>
			<th class="">Timestamp</th>
			<th class="collapsing center aligned">Recorded value</th>
		</tr>
	</thead>
	<tbody>
		<?php
		$sql = "SELECT * FROM Data";
		$query = mysqli_query($db, $sql);
			while($rawdata = mysqli_fetch_assoc($query)){
			echo "<tr>";
			echo "<td class=''>".$rawdata['sensor_id']."</td>";
			echo "<td class=''>".$rawdata['time']."</td>";
			echo "<td class='disabled collapsing center aligned'>".$rawdata['volume']."</td>";
			echo "</tr>";
			}
		?>
	</tbody>
</table>
</div>
<div class="five wide column"></div>
</div>
<script src="https://code.jquery.com/jquery-3.1.1.min.js" ></script>
<script src="https://cdn.jsdelivr.net/npm/semantic-ui@2.3.3/dist/semantic.min.js"></script>
<script type="text/javascript">
$('.ui.dropdown').dropdown();
$('.message .close').on('click', function() {
	$(this).closest('.message').transition('fade');
});
</script>
<script type="text/javascript">
	function showClient(str){
		if (str==""){
			document.getElementById("info").innerHTML="";
			return;
		}
		if (window.XMLHttpRequest){
			xmlhttp=new XMLHttpRequest();
		}
		else {
			xmlhttp=new ActiveXObject("Microsoft.XMLHTTP");
		}
			xmlhttp.onreadystatechange=function(){
				if (xmlhttp.readyState==4 && xmlhttp.status==200){
					document.getElementById("info").innerHTML=xmlhttp.responseText;
				}
			}
			xmlhttp.open("GET","include/client.php?qry="+str,true);
			xmlhttp.send();
	}
</script>
</body>
</html>