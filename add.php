<!DOCTYPE html>
<html lang="en">
  <head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <title>Contact Form - PHP/MySQL Demo Code</title>
    <!-- Latest compiled and minified CSS -->
    <link rel="stylesheet" type="text/css" href="css/puta.css">
    <p>&nbsp;</p>
    <input type="button" class='styled-button' value="Back to Display Menu" onclick="location='dataForm.php'" />
    <p>&nbsp;</p>
    </div>
    <div class="container">
      <fieldset style="width: 500px; margin:  0px auto; font-size: 16px;">
        <p style="color:white">Please fill in the required attributes:</p>

<?php
include "scripts/connection.php"; 
$type = $_POST['table'];

if($type=="teams"){
  
  echo '<form name="frmContact" class="needs-validation " method="post" action="add/addTeam.php">
  <p>

    <input type="text" class="styled-text" name="txtName" id="txtName" placeholder="Name" value="" required>
  </p>
  <p>

    <input type="text"  class="styled-text"  name="txtCity" id="txtCity" placeholder="City" value="" required>
  </p>
  <p>
     <select  class="styled-button" name="txtCountry" id="txtCountry" value="" required >';
     $resultBig = $con->query('SELECT * FROM COUNTRYS ORDER BY NAME');

        while($row = mysqli_fetch_array($resultBig))
        {
        echo "<option value=".$row['CODE_COUNTRY_NUM'].">".$row['NAME']."</option>";
        }
        echo '</select>
        </p>
        
        <p>
          <select  class="styled-button" name="txtNat" id="txtNat" value="" required >
            <option value="0">Club</option>
            <option value="1">National Team</option>
          </select>
        </p>
        <p>&nbsp;</p>
        <p>
          <input type="submit" name="Submit" id="Submit" value="Add Team"  class="styled-button">
        </p>
      </form>';
}

if($type=="players"){

  echo '<form name="frmContact" class="needs-validation " method="post" action="add/addPlayer.php">
  <p>

    <input type="text" class="styled-text" name="txtLName" id="txtLName" placeholder="Last Name" value="" required>
  </p>
  <p>

    <input type="text" class="styled-text" name="txtName" id="txtName" placeholder="Name" value="" required>
  </p>

  <p style="color:white">
    Date of birth : 
    <input type="number"  style="width: 80px;" class="styled-text"  name="txtDateY" id="txtDateY" placeholder="YYYY" value="" required>
    <input type="number"  style="width: 50px;" class="styled-text"  name="txtDateM" id="txtDateM" placeholder="MM" value="" required>
    <input type="number"  style="width: 50px;" class="styled-text"  name="txtDateD" id="txtDateD" placeholder="DD" value="" required>
  </p>
  <p>
     <select  class="styled-button" name="txtCountry" id="txtCountry" value="" required >';
     $resultBig = $con->query('SELECT * FROM COUNTRYS ORDER BY NAME');

        while($row = mysqli_fetch_array($resultBig))
        {
        echo "<option value=".$row['CODE_COUNTRY_NUM'].">".$row['NAME']."</option>";
        }
        echo '</select>
        </p>
        <p style="color:white">
        Height: ex 1.98
    <input type="number"  style="width: 35px;" class="styled-text"  name="txtHeightM" id="txtHeightM" placeholder="1" value="" required>
    (meters)
    <input type="number"  style="width: 50px;" class="styled-text"  name="txtHeightCM" id="txtHeightCM" placeholder="98" value="" required>
    (centimeters)    
    </p>
        <p>&nbsp;</p>
        <p>
          <input type="submit" name="Submit" id="Submit" value="Add Player"  class="styled-button">
        </p>
      </form>';
}

if($type=="leagues"){

  echo '<form name="frmContact" class="needs-validation " method="post" action="add/addLeague.php">
  <p>

    <input type="text" class="styled-text" name="txtName" id="txtName" placeholder="Name" value="" required>
  </p>
  <p>
          <select  class="styled-button" name="txtNat" id="txtNat" value="" required >
            <option value="0">Clubs</option>
            <option value="1">National Teams</option>
          </select>
        </p>
  <p>
     <select  class="styled-button" name="txtCountry" id="txtCountry" value="" required >';
     $resultBig = $con->query('SELECT * FROM COUNTRYS ORDER BY NAME');
     //echo "<option value=0>International</option>";
        while($row = mysqli_fetch_array($resultBig))
        {
        echo "<option value=".$row['CODE_COUNTRY_NUM'].">".$row['NAME']."</option>";
        }
        echo '</select>
        </p>
        
        <p>&nbsp;</p>
        <p>
          <input type="submit" name="Submit" id="Submit" value="Add League"  class="styled-button">
        </p>
      </form>';
}

if($type=="games"){

  echo '<form name="frmContact" class="needs-validation " method="post" action="add/addGame.php">
  <p>
  <p class="styled-text2"> League</p>
     <select  class="styled-button" name="txtLeague" id="txtLeague" value="" required >';
     $resultBig = $con->query('SELECT * FROM leagues ORDER BY NAME');
        while($row = mysqli_fetch_array($resultBig))
        {
        echo "<option value=".$row['CODE_LEAGUE'].">".$row['NAME']."</option>";
        }
        echo '</select>
        </p>
  <p>
  <p class="styled-text2"> Home Team</p>
  <p>
     <select  class="styled-button" name="txtTeam1" id="txtTeam1" value="" required >';
     $resultBig = $con->query('SELECT * FROM teams ORDER BY NAME');
        while($row = mysqli_fetch_array($resultBig))
        {
        echo "<option value=".$row['CODE_TEAM'].">".$row['NAME']."</option>";
        }
        echo '</select>
        </p>
  <p>
  <p class="styled-text2">Away Team</p>
  <p>
     <select  class="styled-button" name="txtTeam2" id="txtTeam2" value="" required >';
     $resultBig = $con->query('SELECT * FROM teams ORDER BY NAME');
        while($row = mysqli_fetch_array($resultBig))
        {
        echo "<option value=".$row['CODE_TEAM'].">".$row['NAME']."</option>";
        }
        echo '</select>
        </p>
        <p class="styled-text2">Game Date</p>
        <p>

        <input type="number"  style="width: 80px;" class="styled-text"  name="txtDateY" id="txtDateY" placeholder="YYYY" value="" required>
    <input type="number"  style="width: 50px;" class="styled-text"  name="txtDateM" id="txtDateM" placeholder="MM" value="" required>
    <input type="number"  style="width: 50px;" class="styled-text"  name="txtDateD" id="txtDateD" placeholder="DD" value="" required>

      </p>
      <p class="styled-text2">Competition stage</p>
      <p>

     <select class="styled-button" name="txtStage" id="txtStage" value="" required >';
     $resultBig = $con->query('SELECT * FROM stages ORDER BY NAME');
        while($row = mysqli_fetch_array($resultBig))
        {
        echo "<option value=".$row['CODE_STAGE'].">".$row['NAME']."</option>";
        }
        echo '</select>
        </p>

        <p class="styled-text2">Season</p>
        <p>

        <input type="number"  class="styled-text"  name="txtSeason" id="txtSeason" placeholder="YYYY" value="" required>
      </p><br>
      <p>
          <input type="submit" name="Submit" id="Submit" value="Add Game"  class="styled-button">
        </p>
  
      </form>';
}

if($type=="sponsors"){

  echo '<form name="frmContact" class="needs-validation " method="post" action="add/addSponsor.php">
  <p>
    <input type="text" class="styled-text" name="txtName" id="txtName" placeholder="Sponsor Name" value="" required>
  </p>
  <p>
    <input type="text" class="styled-text" name="txtCity" id="txtCity" placeholder="City" value="" required>
  </p>
  <p>&nbsp;</p>
  <p>
    <input type="submit" name="Submit" id="Submit" value="Add Sponsor" class="styled-button">
  </p>
</form>';
}

if($type=="sponsor_team_history"){

  
  echo '<form name="frmContact" class="needs-validation " method="post" action="add/addSponsorship.php">
  <p class="styled-text2">Sponsored Team</p>
  <p>
     <select  class="styled-button" name="txtTeam" id="txtTeam" value="" required >';
     $resultBig = $con->query('SELECT * FROM teams ORDER BY NAME');
        while($row = mysqli_fetch_array($resultBig))
        {
        echo "<option value=".$row['CODE_TEAM'].">".$row['NAME']."</option>";
        }
        echo '</select>
        </p>
        <p class="styled-text2">Sponsor Name</p>
  <p>
     <select  class="styled-button" name="txtSponsor" id="txtSponsor" value="" required >';
     $resultBig = $con->query('SELECT * FROM sponsors ORDER BY NAME');
        while($row = mysqli_fetch_array($resultBig))
        {
        echo "<option value=".$row['CODE_SPONSOR'].">".$row['NAME']."</option>";
        }
        echo '</select>
        </p>
        <p class="styled-text2">Sponsorship Amount</p>
  <p>
    <input type="number" class="styled-text" name="txtVal" id="txtVal" placeholder="" value="" required>
  </p>
  <p class="styled-text2">Sponsorship Start</p>
        <p>

        

        <input type="number"  style="width: 80px;" class="styled-text"  name="txtDateYS" id="txtDateY" placeholder="YYYY" value="" required>
    <input type="number"  style="width: 50px;" class="styled-text"  name="txtDateMS" id="txtDateM" placeholder="MM" value="" required>
    <input type="number"  style="width: 50px;" class="styled-text"  name="txtDateDS" id="txtDateD" placeholder="DD" value="" required>

      
        </p>
  <p class="styled-text2">Sponsorship End (0000-00-00 if unknown is a problem, so invent)</p>
      <p>

      
      <input type="number"  style="width: 80px;" class="styled-text"  name="txtDateYE" id="txtDateY" placeholder="YYYY" value="" required>
  <input type="number"  style="width: 50px;" class="styled-text"  name="txtDateME" id="txtDateM" placeholder="MM" value="" required>
  <input type="number"  style="width: 50px;" class="styled-text"  name="txtDateDE" id="txtDateD" placeholder="DD" value="" required>
    </p>
      </p>
  <p>
        <p>&nbsp;</p>
        <p>
          <input type="submit" name="Submit" id="Submit" value="Add Sponsorship"  class="styled-button">
        </p>
      </form>';
}

if($type=="players_history"){

  
  echo '<form name="frmContact" class="needs-validation " method="post" action="add/addPlayerContract.php">
  <p class="styled-text2">Player</p>
  <p>
     <select  class="styled-button" name="txtPlayer" id="txtPlayer" value="" required >';
     $resultBig = $con->query('SELECT * FROM players ORDER BY NAME');
        while($row = mysqli_fetch_array($resultBig))
        {
        echo "<option value=".$row['CODE_PLAYER'].">".$row['LASTNAME']." ".$row['NAME']."</option>";
        }
        echo '</select>
        </p>
        <p class="styled-text2">Team</p>
        <p>
        <select  class="styled-button" name="txtTeam" id="txtTeam" value="" required >';
        $resultBig = $con->query('SELECT * FROM teams ORDER BY NAME');
           while($row = mysqli_fetch_array($resultBig))
           {
           echo "<option value=".$row['CODE_TEAM'].">".$row['NAME']."</option>";
           }
           echo '</select>
           </p>
    
  <p class="styled-text2">Contract Start</p>
        <p>

        

        <input type="number"  style="width: 80px;" class="styled-text"  name="txtDateYS" id="txtDateY" placeholder="YYYY" value="" required>
    <input type="number"  style="width: 50px;" class="styled-text"  name="txtDateMS" id="txtDateM" placeholder="MM" value="" required>
    <input type="number"  style="width: 50px;" class="styled-text"  name="txtDateDS" id="txtDateD" placeholder="DD" value="" required>

      
        </p>
  <p class="styled-text2">Contract End (0000-00-00 if unknown is a problem, so invent)</p>
      <p>

      
      <input type="number"  style="width: 80px;" class="styled-text"  name="txtDateYE" id="txtDateY" placeholder="YYYY" value="" required>
  <input type="number"  style="width: 50px;" class="styled-text"  name="txtDateME" id="txtDateM" placeholder="MM" value="" required>
  <input type="number"  style="width: 50px;" class="styled-text"  name="txtDateDE" id="txtDateD" placeholder="DD" value="" required>
    </p>
      </p>
  <p>
        <p>&nbsp;</p>
        <p>
          <input type="submit" name="Submit" id="Submit" value="Add Player Contract"  class="styled-button">
        </p>
      </form>';
}
?>
  
</fieldset>
</div>


</html>