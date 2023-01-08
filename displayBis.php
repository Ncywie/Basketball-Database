<link rel="stylesheet" type="text/css" href="css/puta.css">
<p>&nbsp;</p>
<input style="width: 500px; margin:  0px auto;" type="button" class='styled-button' value="Back to Display Menu" onclick="location='dataForm.php'" />
<p>&nbsp;</p>

<?php
include "scripts/connection.php";
//error_reporting(0);

$table = $_POST["table"];
$infinite = $_POST["infinite"];
$lines = $_POST["lines"];
$sorter = $_POST["sorter"];
$descend = $_POST["descending"];

$sql = "SHOW COLUMNS FROM " . $table;
$result = mysqli_query($con, $sql);

echo "<table class='styled-table' border='1'>
<thead><tr>";
while ($row = mysqli_fetch_array($result)) {
    echo "<th>";
    echo $row["Field"] . "</th>";
}

echo "<th></th></tr></thead>";

/*
if (!empty($infinite)) {
    $resultBig = $con->query("SELECT * FROM " . $table);
} else {
    $resultBig = $con->query("SELECT * FROM " . $table . " LIMIT " . $lines);
}*/


if ($descend == 1) {
    if (!empty($infinite)) {
        $resultBig = $con->query(
            "SELECT * FROM " .
                $table .
                " ORDER BY " .
                $sorter .
                " DESC "
        );
    } else {
        $resultBig = $con->query(
            "SELECT * FROM " . $table . " ORDER BY " . $sorter . " DESC LIMIT " .
            $lines
        );
    }
} else {
    if (!empty($infinite)) {
        $resultBig = $con->query(
            "SELECT * FROM " . $table . " ORDER BY " . $sorter
        );
    } else {
        $resultBig = $con->query(
            "SELECT * FROM " .
                $table .
                " ORDER BY " .
                $sorter .
                " LIMIT " .
                $lines
        );
    }
}

require "scripts/showTables.php";

showTable($table, $resultBig);

$num_rows = mysqli_num_rows($resultBig);


echo "$num_rows Rows\n";

?>
