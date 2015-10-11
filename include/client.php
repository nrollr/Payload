<!DOCTYPE html>
<html>
  <meta charset="utf-8">
  <body>
    <?php
    //header("Content-type: text/html; charset=utf-8");
    include ('db_connect.php');

    $qry = intval($_GET['qry']);
    $sql= "SELECT S.* , I.* FROM Sensors S, Inventory I WHERE S.sensor_id = I.sensor_id AND S.client_id = '".$qry."'";
    $result = mysqli_query($db,$sql);

    while($row = mysqli_fetch_array($result)) {
        echo "<input type='hidden' id='sensor_id' name='sensor_id' value='". $row['sensor_id'] ."'>";

        echo "Identification <strong>customer</strong> :</br>";
        echo "</br>";
        echo "<blockquote>";
        echo "<strong>" . $row['client_name'] . "</strong></br>";
        echo "<div class='gray'>". $row['client_address'] . "</small></div>";
        echo "</blockquote></br>";

        echo "Identification <strong>inventory</strong> :</br>";
        echo "</br>";
        echo "<blockquote>";
        echo "Tap identifier :<strong> " . $row['id_tap'] . "</strong></br>";
        echo "Type of beer : <mark>". $row['id_beer'] . "</mark></br>";
        echo "Brewery : ". $row['id_brewery'] . "";
        echo "</blockquote>";
        }
        
    mysqli_close($db);
    ?>
  </body>
</html>