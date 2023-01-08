<?php
function showTable($table, $resultBig)
{
    error_reporting(0);
    include "scripts/connection.php";
    
    if ($table == "teams") {
        
        while ($row = mysqli_fetch_array($resultBig)) {
            echo "<tr>";
            echo "<td>" . $row["CODE_TEAM"] . "</td>";
            echo "<td>" . $row["NAME"] . "</td>";
            echo "<td>" . $row["CITY"] . "</td>";

            $sql2 =
                "SELECT NAME FROM COUNTRYS WHERE CODE_COUNTRY_NUM=" .
                $row["CODE_COUNTRY_NUM"];
            $result2 = $con->query($sql2);
            $row2 = mysqli_fetch_array($result2);
            echo "<td>" .
                $row["CODE_COUNTRY_NUM"] .
                " - " .
                $row2["NAME"] .
                "</td>";
            echo "<td>" . $row["NATIONAL_TEAM"] . "</td>";
            echo "<td>";
            echo "<a href='scripts/delete.php?choice=search&tab=" .
                urlencode($table) .
                "&val=" .
                urlencode($row["CODE_TEAM"]) .
                "&type=" .
                urlencode("CODE_TEAM") .
                "'> Delete </a>";
        }
        echo "</table>";
        
    }
    
    if ($table == "players") {
        while ($row = mysqli_fetch_array($resultBig)) {
            echo "<tr>";
            echo "<td>" . $row["LASTNAME"] . "</td>";
            echo "<td>" . $row["NAME"] . "</td>";
            echo "<td>" . $row["BIRTH_DATE"] . "</td>";

            $sql2 =
                "SELECT NAME FROM COUNTRYS WHERE CODE_COUNTRY_NUM=" .
                $row["CODE_COUNTRY_NUM"];
            $result2 = $con->query($sql2);
            $row2 = mysqli_fetch_array($result2);
            echo "<td>" .
                $row["CODE_COUNTRY_NUM"] .
                " - " .
                $row2["NAME"] .
                "</td>";
            echo "<td>" . $row["CODE_PLAYER"] . "</td>";
            echo "<td>" . $row["HEIGHT"] . "</td>";
            echo "<td>";
            echo "<a href='scripts/delete.php?choice=search&tab=" .
                urlencode($table) .
                "&val=" .
                urlencode($row["CODE_PLAYER"]) .
                "&type=" .
                urlencode("CODE_PLAYER") .
                "'> Delete </a>";
            echo "&nbsp; &nbsp;";
            echo "<a href='viewPlays.php?choice=search&tab=" .
                urlencode($table) .
                "&val=" .
                urlencode($row["CODE_PLAYER"]) .
                "&type=" .
                urlencode("CODE_PLAYER") .
                "&var=" .
                urlencode("player") .
                "'>View Plays</a>";
            echo "&nbsp; &nbsp;";
            echo "<a href='viewPlayerHistory.php?choice=search&tab=" .
                urlencode($table) .
                "&val=" .
                urlencode($row["CODE_PLAYER"]) .
                "&type=" .
                urlencode("CODE_PLAYER") .
                "&var=" .
                urlencode("player") .
                "'><br>Team History</a>";
        }
        echo "</table>";
    }

    if ($table == "leagues") {
        while ($row = mysqli_fetch_array($resultBig)) {
            echo "<tr>";
            echo "<td>" . $row["CODE_LEAGUE"] . "</td>";
            echo "<td>" . $row["NAME"] . "</td>";
            echo "<td>" . $row["NATIONAL_TEAM"] . "</td>";

            $sql2 =
                "SELECT NAME FROM COUNTRYS WHERE CODE_COUNTRY_NUM=" .
                $row["CODE_COUNTRY_NUM"];
            $result2 = $con->query($sql2);
            $row2 = mysqli_fetch_array($result2);
            echo "<td>" .
                $row["CODE_COUNTRY_NUM"] .
                " - " .
                $row2["NAME"] .
                "<td>";
            echo "<a href='scripts/delete.php?choice=search&tab=" .
                urlencode($table) .
                "&val=" .
                urlencode($row["CODE_LEAGUE"]) .
                "&type=" .
                urlencode("CODE_LEAGUE") .
                "'>Delete </a>";
        }
        echo "</table>";
    }

    if ($table == "games") {
        while ($row = mysqli_fetch_array($resultBig)) {
            echo "<tr>";
            $sql2 =
                "SELECT NAME FROM LEAGUES WHERE CODE_LEAGUE=" .
                $row["CODE_LEAGUE"];
            $result2 = $con->query($sql2);
            $row2 = mysqli_fetch_array($result2);
            echo "<td>" . $row["CODE_LEAGUE"] . " - " . $row2["NAME"] . "</td>";

            $sql2 = "SELECT NAME FROM TEAMS WHERE CODE_TEAM=" . $row["TEAM_1"];
            $result2 = $con->query($sql2);
            $row2 = mysqli_fetch_array($result2);
            echo "<td>" . $row2["NAME"] . "</td>";

            $sql2 = "SELECT NAME FROM TEAMS WHERE CODE_TEAM=" . $row["TEAM_2"];
            $result2 = $con->query($sql2);
            $row2 = mysqli_fetch_array($result2);
            echo "<td>" . $row2["NAME"] . "</td>";
            echo "<td>" . $row["GAME_DATE"] . "</td>";
            echo "<td>" . $row["CODE_GAME"] . "</td>";

            $sql2 =
                "SELECT NAME FROM STAGES WHERE CODE_STAGE=" .
                $row["CODE_STAGE"];
            $result2 = $con->query($sql2);
            $row2 = mysqli_fetch_array($result2);
            echo "<td>" . $row["CODE_STAGE"] . " - " . $row2["NAME"] . "</td>";

            echo "<td>" . $row["SEASON"] . "</td>";
            echo "<td>";
            echo "<a href='scripts/delete.php?choice=search&tab=" .
                urlencode($table) .
                "&val=" .
                urlencode($row["CODE_GAME"]) .
                "&type=" .
                urlencode("CODE_GAME") .
                "'> Delete</a>";
            echo "&nbsp; &nbsp;";
            echo "<a href='viewPlays.php?choice=search&tab=" .
                urlencode($table) .
                "&val=" .
                urlencode($row["CODE_GAME"]) .
                "&type=" .
                urlencode("CODE_GAME") .
                "&var=" .
                urlencode("game") .
                "'>View Plays</a>";
        }
        echo "</table>";
    }

    if ($table == "games_events") {
        while ($row = mysqli_fetch_array($resultBig)) {
            echo "<tr>";
            echo "<td>" . $row["CODE_GAME"] . "</td>";
            echo "<td>" . $row["CODE_EVENT"] . "</td>";
            echo "<td>" . $row["CODE_PLAYER"] . "</td>";
            echo "<td>" . $row["VALUE_"] . "</td>";
            echo "<td>";
            echo "<a href='scripts/delete.php?choice=search&tab=" .
                urlencode($table) .
                "&val=" .
                urlencode($row["CODE_EVENT"]) .
                "&type=" .
                urlencode("CODE_EVENT") .
                "'> Delete </a>";
        }
        echo "</table>";
    }

    if ($table == "sponsors") {
        while ($row = mysqli_fetch_array($resultBig)) {
            echo "<tr>";
            echo "<td>" . $row["CODE_SPONSOR"] . "</td>";
            echo "<td>" . $row["NAME"] . "</td>";
            echo "<td>" . $row["CITY"] . "</td>";
            echo "<td>";
            echo "<a href='scripts/delete.php?choice=search&tab=" .
                urlencode($table) .
                "&val=" .
                urlencode($row["CODE_SPONSOR"]) .
                "&type=" .
                urlencode("CODE_SPONSOR") .
                "'> Delete </a>";
        }
        echo "</table>";
    }

    if ($table == "sponsor_team_history") {
        while ($row = mysqli_fetch_array($resultBig)) {
            echo "<tr>";
            $sql2 =
                "SELECT NAME FROM TEAMS WHERE CODE_TEAM=" . $row["CODE_TEAM"];
            $result2 = $con->query($sql2);
            $row2 = mysqli_fetch_array($result2);
            echo "<td>" . $row["CODE_TEAM"] . " - " . $row2["NAME"] . "</td>";

            $sql2 =
                "SELECT NAME FROM SPONSORS WHERE CODE_SPONSOR=" .
                $row["CODE_SPONSOR"];
            $result2 = $con->query($sql2);
            $row2 = mysqli_fetch_array($result2);
            echo "<td>" .
                $row["CODE_SPONSOR"] .
                " - " .
                $row2["NAME"] .
                "</td>";

            //echo "<td>" . $row['CODE_SPONSOR'] . "</td>";
            echo "<td>" . $row["AMOUNT"] . "</td>";
            echo "<td>" . $row["FROM_DATE"] . "</td>";
            echo "<td>" . $row["TO_DATE"] . "</td>";
            echo "<td>" . $row["CODE_SPONSOR_TEAM"] . "</td>";
            echo "<td>";
            echo "<a href='scripts/delete.php?choice=search&tab=" .
                urlencode($table) .
                "&val=" .
                urlencode($row["CODE_SPONSOR_TEAM"]) .
                "&type=" .
                urlencode("CODE_SPONSOR_TEAM") .
                "'> Delete </a>";
        }
        echo "</table>";
    }
}
?>
