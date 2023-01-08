<link rel="stylesheet" type="text/css" href="../css/puta.css">

<?php
include "../scripts/connection.php";

$txtName = $_POST["txtName"];
$txtCity = $_POST["txtCity"];
$txtCountry = $_POST["txtCountry"];
$txtNat = $_POST["txtNat"];

$sql = "SELECT max(CODE_TEAM) as max FROM teams";
$result = $con->query($sql);
$row = mysqli_fetch_array($result);
$eid = $row["max"];

// database insert SQL code
$stmt = $con->prepare(
    "INSERT INTO `teams` (CODE_TEAM, name, city, code_country_num, national_team) VALUES ($eid+1,?,?,?,?)"
);

try {
    $stmt->execute([$txtName, $txtCity, $txtCountry, $txtNat]);
    echo "<p>&nbsp;</p>Team added";
} catch (Throwable $e) {
    echo "Unknown Error, please contact Admin";
}
?>

<br>
<p>&nbsp;</p>
<input type="button" class='styled-button' value="Back to Display Menu" onclick="location='../dataForm.php'" />
