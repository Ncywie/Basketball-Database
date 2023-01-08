<?php
function getTeams($value)
{
    include "connection.php";

    $sql2 = "SELECT TEAM_1, TEAM_2 FROM GAMES WHERE CODE_GAME=" . $value;
    $result2 = $con->query($sql2);
    $row2 = mysqli_fetch_array($result2);

    $sqlTeam1 = "SELECT NAME FROM TEAMS WHERE CODE_TEAM =" . $row2["TEAM_1"];
    $resultTeam1 = $con->query($sqlTeam1);
    $rowTeam1 = mysqli_fetch_array($resultTeam1);

    $sqlTeam2 = "SELECT NAME FROM TEAMS WHERE CODE_TEAM =" . $row2["TEAM_2"];
    $resultTeam2 = $con->query($sqlTeam2);
    $rowTeam2 = mysqli_fetch_array($resultTeam2);

    return [$rowTeam1, $rowTeam2];
}
?>
  