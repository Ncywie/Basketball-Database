<?php include "scripts/connection.php"; ?> <head>
  <link rel="stylesheet" type="text/css" href="css/puta.css">
  <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
  <br>
  <title>Table Display Menu</title>
  <h1>Basketball Database Homepage</h1>
  <!-- Latest compiled and minified CSS -->
</head>
<body>
  <fieldset style="width: 500px; margin:  0px auto; font-size: 16px; ">
    <legend style="font-size: 16px; font-weight: bold;" class="styled-text">Choose a table to display</legend>
    <form name="frmContact" class="needs-validation " method="post" action="display.php">
      <b style="color:white">View data</b>
      <p>
        <select name="table" id="table" class='styled-button'>
          <option value="teams">Teams</option>
          <option value="players">Players</option>
          <option value="leagues">Leagues</option>
          <option value="games">Games</option>
          <option value="sponsors">Sponsors</option>
          <option value="sponsor_team_history">Sponsorship Contracts</option>
      </p>
      <br>
      <p>
        <input type="checkbox" style="color:white" name="infinite" value="1" id="infinite" />Check to View all lines </label>
      </p>
      <p>
        <input type="number" class="styled-text" name="lines" id="lines" placeholder="Number of lines" value="">
        <label> or select a limited number of Lines</label>
      </p>
      <p>
        <input type="submit" name="Submit" id="Submit" value="Click to Display" class='styled-button'>
      </p>
      <br>
      <b style="color:white">View explanatory Tables</b>
      <br>
      <br>
      <input type="button" class='styled-button' value="Game Events Types" onclick="location='simpleTables/events.php'" />
      <input type="button" class='styled-button' value="Stages" onclick="location='simpleTables/stages.php'" />
      <input type="button" class='styled-button' value="Countrys" onclick="location='simpleTables/countrys.php'" />
    </form>
  </fieldset>
  <br>
  <fieldset style="width: 500px; margin:  0px auto; font-size: 16px; ">
    <legend style="font-size: 16px; font-weight: bold;" class="styled-text">Add data</legend>
    <form name="frmContact" class="needs-validation " method="post" action="add.php">
      <b style="color:white">Choose the type of data to add</b>
      <p>
        <select name="table" id="table" class='styled-button'>
          <option value="teams">Add a Team</option>
          <option value="players">Add a Player</option>
          <option value="leagues">Add a League</option>
          <option value="games">Add a Game</option>
          <option value="sponsors">Add a Sponsor</option>
          <option value="sponsor_team_history">Add a Sponsorship Contract</option>
		  <option value="players_history">Add a Player Contract</option>
      </p>
      <p>
        <br>
        <input type="submit" name="Submit" id="Submit" value="Click to Choose" class='styled-button'>
      </p>
    </form>
  </fieldset>
</body>