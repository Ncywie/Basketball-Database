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

if ($class == "game") {
    $sql = "SHOW COLUMNS FROM GAMES_EVENTS";
    $result = mysqli_query($con, $sql);

    echo "<table class='styled-table' border='1'>
<thead><tr>";
    while ($row = mysqli_fetch_array($result)) {
        echo "<th>";
        echo $row["Field"] . "</th>";
    }
    $row = mysqli_fetch_array($result);
    echo "<th></th></tr></thead>";
    $sql = "SELECT * FROM GAMES_EVENTS WHERE CODE_GAME = " . $value;
    $resultBig = mysqli_query($con, $sql);

    [$rowTeam1, $rowTeam2] = getTeams($value);

    while ($row = mysqli_fetch_array($resultBig)) {
        echo "<tr>";
        echo "<td>" . $rowTeam2["NAME"] . " @ " . $rowTeam1["NAME"] . "</td>";

        $sql2 =
            "SELECT NAME FROM EVENTS WHERE CODE_EVENT=" . $row["CODE_EVENT"];
        $result2 = $con->query($sql2);
        $row2 = mysqli_fetch_array($result2);
        echo "<td>" . $row["CODE_EVENT"] . " - " . $row2["NAME"] . "</td>";

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

        echo "<td>" . $row["VALUE_"] . "</td>";
        echo "<td>";
        echo "<a href='delete.php?choice=search&tab=" .
            urlencode($table) .
            "&val=" .
            urlencode($row["CODE_EVENT"]) .
            "&type=" .
            urlencode("CODE_EVENT") .
            "'> Delete </a>";
    }
    echo "</table>";
}

if ($class == "player") {
    $sql = "SHOW COLUMNS FROM GAMES_EVENTS";
    $result = mysqli_query($con, $sql);

    echo "<table class='styled-table' border='1'>
<thead><tr>";
    while ($row = mysqli_fetch_array($result)) {
        echo "<th>";
        echo $row["Field"] . "</th>";
    }
    echo "<th></th></tr></thead>";
    $sql = "SELECT * FROM GAMES_EVENTS WHERE CODE_PLAYER = " . $value;
    $resultBig = mysqli_query($con, $sql);
    while ($row = mysqli_fetch_array($resultBig)) {
        echo "<tr>";

        [$rowTeam1, $rowTeam2] = getTeams($row["CODE_GAME"]);
        echo "<td>" . $rowTeam2["NAME"] . " @ " . $rowTeam1["NAME"] . "</td>";

        //echo "<td>" . $row['CODE_GAME'] . "</td>";
        $sql2 =
            "SELECT NAME FROM EVENTS WHERE CODE_EVENT=" . $row["CODE_EVENT"];
        $result2 = $con->query($sql2);
        $row2 = mysqli_fetch_array($result2);
        echo "<td>" . $row["CODE_EVENT"] . " - " . $row2["NAME"] . "</td>";
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
        echo "<td>" . $row["VALUE_"] . "</td>";
        echo "<td>";
        echo "<a href='delete.php?choice=search&tab=" .
            urlencode($table) .
            "&val=" .
            urlencode($row["CODE_EVENT"]) .
            "&type=" .
            urlencode("CODE_EVENT") .
            "'> Delete </a>";
    }
    echo "</table>";
}


?>
