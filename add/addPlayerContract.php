<link rel="stylesheet" type="text/css" href="../css/puta.css">

<?php
include "../scripts/connection.php";

$txtPlayer = $_POST["txtPlayer"];
$txtTeam = $_POST["txtTeam"];
$txtDateYS = $_POST["txtDateYS"];
$txtDateMS = $_POST["txtDateMS"];
$txtDateDS = $_POST["txtDateDS"];
$txtDateYE = $_POST["txtDateYE"];
$txtDateME = $_POST["txtDateME"];
$txtDateDE = $_POST["txtDateDE"];

$txtStart = $txtDateYS."-".$txtDateMS."-".$txtDateDS;
$txtEnd = $txtDateYE."-".$txtDateME."-".$txtDateDE;


$sql = "SELECT max(CODE_PLAYER_HISTORY) as max FROM PLAYERS_HISTORY";
$result = $con->query($sql);
$row = mysqli_fetch_array($result);
$eid = $row["max"];

// database insert SQL code
$stmt = $con->prepare(
    "INSERT INTO `PLAYERS_HISTORY` (CODE_PLAYER, CODE_TEAM, FROM_DATE, TO_DATE, CODE_PLAYER_HISTORY) VALUES (?,?,?,?,$eid+1)"
);

try {
    $stmt->execute([$txtPlayer, $txtTeam, $txtStart, $txtEnd]);
    echo "<p>&nbsp;</p>Player contract added";
} catch (Throwable $e) {
    echo "<p>&nbsp;</p>Unknown Error, please contact Admin";
}
?>

<br>
<p>&nbsp;</p>
<input type="button" class='styled-button' value="Back to Display Menu" onclick="location='../dataForm.php'" />