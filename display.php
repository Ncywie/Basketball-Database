<link rel="stylesheet" type="text/css" href="css/puta.css">

<p>&nbsp;</p>
<input type="button" class='styled-button' value="Back to Display Menu" onclick="location='dataForm.php'" />
<p>&nbsp;</p>

<?php include "scripts/connection.php"; 
error_reporting(0);
$table = $_POST["table"];
$infinite = $_POST["infinite"];
$lines = $_POST["lines"];
$sql = "SHOW COLUMNS FROM " . $table;
$result = mysqli_query($con, $sql);
?>

<form style="width: 600px; margin:  0px auto;" name="frmContact" class="needs-validation " method="post" action="displayBis.php">
  <p> Sort by : <select name="sorter" id="sorter" class='styled-button'> <?php while ($row = mysqli_fetch_array($result)) {
          echo "
			<option value=";
          echo $row["Field"] . ">" . $row["Field"] . "</option>";
          echo $row["Field"] . "
		</option>";
      } ?> </select>
    <select name="descending" id="descending" class='styled-button'>
      <option value="0">Ascending</option>
      <option value="1">Descending</option>
    </select>
  </p>
  <input type="checkbox" style="color:white" name="infinite" value="1" id="infinite" />Check to View all lines</label><p>
    <input type="number" class="styled-text" name="lines" id="lines" placeholder="Number of lines" value="">
    <label for="email">Or select a limited number of Lines</label>
  <div>
    <br>
    <input type="checkbox" name="table" value="<?php echo $table;?>" id="table" /> View sorted <?php echo $table; ?> (NEEDS TO BE CHECKED) </label>
  </div>
  <p>
    <br>
    <input type="submit" name="table2" id="table2" value=Sort&nbsp; <?php echo $table; ?> class='styled-button'>
    <input type="button" class='styled-button' value="Or go back to Display Menu to select another Table" onclick="location='dataForm.php'" />
  </p>
  <br>
</form>

<?php
$sql = "SHOW COLUMNS FROM " . $table;
$result = mysqli_query($con, $sql);
echo "<table class='styled-table' border='1'>
<thead><tr>";
while ($row = mysqli_fetch_array($result)) {
    echo "<th>";
    echo $row["Field"] . "</th>";
}

echo "<th></th></tr></thead>";

if(!empty($infinite)){
  $resultBig = $con->query("SELECT * FROM " . $table);}
  else
  {$resultBig = $con->query("SELECT * FROM " . $table . " LIMIT " . $lines);
  }


require "scripts/showTables.php";

showTable($table, $resultBig);
 ?>
