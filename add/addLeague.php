<link rel="stylesheet" type="text/css" href="../css/puta.css">

<?php
include "../scripts/connection.php";

$txtName = $_POST["txtName"];
$txtNat = $_POST["txtNat"];
$txtCountry = $_POST["txtCountry"];

$sql = "SELECT max(CODE_LEAGUE) as max FROM leagues";
$result = $con->query($sql);
$row = mysqli_fetch_array($result);
$eid = $row["max"];

// database insert SQL code
$stmt = $con->prepare(
    "INSERT INTO `leagues` (CODE_LEAGUE, NAME, NATIONAL_TEAM, CODE_COUNTRY_NUM) VALUES ($eid+1,?,?,?)"
);

try {
    $stmt->execute([$txtName, $txtNat, $txtCountry]);
    echo "<p>&nbsp;</p>League added";
} catch (Throwable $e) {
    echo "<p>&nbsp;</p>Unknown Error, please contact Admin";
}
?>

<br>
<p>&nbsp;</p>
<input type="button" class='styled-button' value="Back to Display Menu" onclick="location='../dataForm.php'" />
