<link rel="stylesheet" type="text/css" href="../css/puta.css">

<?php
include "../scripts/connection.php";

$txtTeam = $_POST["txtTeam"];
$txtSponsor = $_POST["txtSponsor"];
$txtVal = $_POST["txtVal"];
$txtDateYS = $_POST["txtDateYS"];
$txtDateMS = $_POST["txtDateMS"];
$txtDateDS = $_POST["txtDateDS"];
$txtDateYE = $_POST["txtDateYE"];
$txtDateME = $_POST["txtDateME"];
$txtDateDE = $_POST["txtDateDE"];

$txtStart = $txtDateYS."-".$txtDateMS."-".$txtDateDS;
$txtEnd = $txtDateYE."-".$txtDateME."-".$txtDateDE;


$sql = "SELECT max(CODE_SPONSOR_TEAM) as max FROM SPONSOR_TEAM_HISTORY";
$result = $con->query($sql);
$row = mysqli_fetch_array($result);
$eid = $row["max"];

// database insert SQL code
$stmt = $con->prepare(
    "INSERT INTO `SPONSOR_TEAM_HISTORY` (CODE_TEAM, CODE_SPONSOR, AMOUNT, FROM_DATE, TO_DATE, CODE_SPONSOR_TEAM) VALUES (?,?,?,?,?,$eid+1)"
);

try {
    $stmt->execute([$txtTeam, $txtSponsor, $txtVal, $txtStart, $txtEnd]);
    echo "<p>&nbsp;</p>Sponsorship added";
} catch (Throwable $e) {
    echo "<p>&nbsp;</p>Unknown Error, please contact Admin";
}
?>

<br>
<p>&nbsp;</p>
<input type="button" class='styled-button' value="Back to Display Menu" onclick="location='../dataForm.php'" />