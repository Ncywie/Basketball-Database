<link rel="stylesheet" type="text/css" href="../css/puta.css">

<?php include "../scripts/connection.php"; ?>

<?php
$txtLName = $_POST["txtLName"];
$txtName = $_POST["txtName"];
$txtDateY = $_POST["txtDateY"];
$txtDateM = $_POST["txtDateM"];
$txtDateD = $_POST["txtDateD"];
$txtCountry = $_POST["txtCountry"];
$txtHeightM = $_POST["txtHeightM"];
$txtHeightCM = $_POST["txtHeightCM"];

$txtDate = $txtDateY."-".$txtDateM."-".$txtDateD;
$txtHeight = $txtHeightM.".".$txtHeightCM;

$sql = "SELECT max(CODE_PLAYER) as max FROM players";
$result = $con->query($sql);
$row = mysqli_fetch_array($result);
$eid = $row["max"];

// database insert SQL code
$stmt = $con->prepare(
    "INSERT INTO `players` (LASTNAME, NAME, BIRTH_DATE, CODE_COUNTRY_NUM, CODE_PLAYER, HEIGHT) VALUES (?,?,?,?,$eid+1,?)"
);

try {
    $stmt->execute([$txtLName, $txtName, $txtDate, $txtCountry, $txtHeight]);
    echo "<p>&nbsp;</p>Player added";
} catch (Throwable $e) {
    echo "<p>&nbsp;</p>Unknown Error, please contact Admin";
}
?>

<br>
<p>&nbsp;</p>
<input type="button" class='styled-button' value="Back to Display Menu" onclick="location='../dataForm.php'" />