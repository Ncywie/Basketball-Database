<link rel="stylesheet" type="text/css" href="../css/puta.css">

<p>&nbsp;</p>
<input type="button" class='styled-button' value="Back to Display Menu" onclick="location='../dataForm.php'" />
<p>&nbsp;</p>

<?php include "../scripts/connection.php"; ?>
<?php
$table = 'stages';

$sql = "SELECT COUNT(*) FROM ".$table;
$result = mysqli_query($con,$sql);
$result = $result->fetch_array();
$lines = intval($result[0]);

$sql = "SHOW COLUMNS FROM ".$table;
$result = mysqli_query($con,$sql);


echo "<table class='styled-table' border='1'>
<thead><tr>";
while($row = mysqli_fetch_array($result)){
  echo "<th>";
  echo $row['Field']."</th>";    
}

echo "</tr></thead>";

$resultBig = $con->query('SELECT * FROM '.$table.' LIMIT '.$lines);


while($row = mysqli_fetch_array($resultBig))
{
echo "<tr>";
echo "<td>" . $row['CODE_STAGE'] . "</td>";
echo "<td>" . $row['NAME'] . "</td>";
echo "</tr>";
}
echo "</table>";

?>