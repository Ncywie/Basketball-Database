<link rel="stylesheet" type="text/css" href="css/puta.css">

<p>&nbsp;</p>
<input type="button" class='styled-button' value="Back to Display Menu" onclick="location='dataForm.php'" />
<p>&nbsp;</p>

<?php include "scripts/connection.php"; ?>

<?php
require "scripts/getTeams.php";

$value = $_GET["val"];
$column = $_GET["type"];
$table = $_GET["tab"];
$class = $_GET["var"];

if ($class == "player") {
    $sql = "SHOW COLUMNS FROM PLAYERS_HISTORY";
    $result = mysqli_query($con, $sql);

    echo "<table class='styled-table' border='1'>
<thead><tr>";
    while ($row = mysqli_fetch_array($result)) {
        echo "<th>";
        echo $row["Field"] . "</th>";
    }
    echo "<th></th></tr></thead>";
    $sql = "SELECT * FROM PLAYERS_HISTORY WHERE CODE_PLAYER = " . $value;
    $resultBig = mysqli_query($con, $sql);
    while ($row = mysqli_fetch_array($resultBig)) {
        echo "<tr>";

        $sql2 =
            "SELECT LASTNAME, NAME FROM PLAYERS WHERE CODE_PLAYER=" .
            $row["CODE_PLAYER"];
        $result2 = $con->query($sql2);
        $row2 = mysqli_fetch_array($result2);
        echo "<td>" .
            $row["CODE_PLAYER"] .
            " - " .
            $row2["NAME"] .
            " " .
            $row2["LASTNAME"] .
            "</td>";
        

        $sql2 = "SELECT NAME FROM TEAMS WHERE CODE_TEAM=" . $row["CODE_TEAM"];
        $result2 = $con->query($sql2);
        $row2 = mysqli_fetch_array($result2);
        echo "<td>" . $row2["NAME"] . "</td>";
        
        echo "<td>" . $row["FROM_DATE"] . "</td>";
        echo "<td>" . $row["TO_DATE"] . "</td>";
        echo "<td>" . $row["CODE_PLAYER_HISTORY"] . "</td>";
        
        echo "<td>";
        echo "<a href='scripts/delete.php?choice=search&tab=" .
            urlencode("players_history") .
            "&val=" .
            urlencode($row["CODE_PLAYER_HISTORY"]) .
            "&type=" .
            urlencode("CODE_PLAYER_HISTORY") .
            "'> Delete </a>";
    }
    echo "</table>";
}


?>
