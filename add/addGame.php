<link rel="stylesheet" type="text/css" href="../css/puta.css">

<?php
include "../scripts/connection.php";

$txtLeague = $_POST["txtLeague"];
$txtTeam1 = $_POST["txtTeam1"];
$txtTeam2 = $_POST["txtTeam2"];
$txtDateY = $_POST["txtDateY"];
$txtDateM = $_POST["txtDateM"];
$txtDateD = $_POST["txtDateD"];
$txtStage = $_POST["txtStage"];
//$txtSeason = $_POST["txtSeason"];

$txtSeason = $txtDateY;
$txtDate = $txtDateY."-".$txtDateM."-".$txtDateD;

$sql = "SELECT max(CODE_GAME) as max FROM games";
$result = $con->query($sql);
$row = mysqli_fetch_array($result);
$eid = $row["max"];

// database insert SQL code
$stmt = $con->prepare(
    "INSERT INTO `games` (CODE_LEAGUE, TEAM_1, TEAM_2, GAME_DATE, CODE_GAME, CODE_STAGE, SEASON) VALUES (?,?,?,?,$eid+1,?,?)"
);

try {
    $stmt->execute([
        $txtLeague,
        $txtTeam1,
        $txtTeam2,
        $txtDate,
        $txtStage,
        $txtSeason,
    ]);
    echo "<p>&nbsp;</p>Game added";
} catch (Throwable $e) {
    echo "<p>&nbsp;</p>Unknown Error, please contact Admin";
}
?>

<br>
<p>&nbsp;</p>
<input type="button" class='styled-button' value="Back to Display Menu" onclick="location='../dataForm.php'" />
