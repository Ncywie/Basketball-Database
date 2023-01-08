<link rel="stylesheet" type="text/css" href="../css/puta.css">

<p>&nbsp;</p>
<input type="button" class='styled-button' value="Back to Display Menu" onclick="location='../dataForm.php'" />
<p>&nbsp;</p>

<?php include "connection.php"; ?>

<?php
$value = $_GET["val"];
$column = $_GET["type"];
$table = $_GET["tab"];

$sql = "DELETE FROM " . $table . " WHERE " . $column . " = " . $value;
$result = mysqli_query($con, $sql);
    
try {
    $result = mysqli_query($con, $sql);
    echo "Deletion completed";
} catch (Throwable $e) {
    echo "Sorry but this element may not be deleted.";
}


?>
