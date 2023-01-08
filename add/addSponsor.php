<link rel="stylesheet" type="text/css" href="../css/puta.css">

<?php
include "../scripts/connection.php";

$txtName = $_POST["txtName"];
$txtCity = $_POST["txtCity"];

$sql = "SELECT max(CODE_SPONSOR) as max FROM sponsors";
$result = $con->query($sql);
$row = mysqli_fetch_array($result);
$eid = $row["max"];

// database insert SQL code
$stmt = $con->prepare(
    "INSERT INTO `sponsors` (CODE_SPONSOR, NAME, CITY) VALUES ($eid+1 , ? , ? )"
);

try {
    $stmt->execute([$txtName, $txtCity]);
    echo "<p>&nbsp;</p>Sponsor added";
} catch (Throwable $e) {
    echo "<p>&nbsp;</p>Unknown Error, please contact Admin";
}
?>

<br>
<p>&nbsp;</p>
<input type="button" class='styled-button' value="Back to Display Menu" onclick="location='../dataForm.php'" />
