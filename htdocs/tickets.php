<?php
$children = filter_input(INPUT_POST, 'children');
$adults = filter_input(INPUT_POST, 'adults');
$youths = filter_input(INPUT_POST, 'youths');
$seniors = filter_input(INPUT_POST, 'seniors');
$tandc = filter_input(INPUT_POST, 'tandc');
if ($children && !($adults || $seniors)) {
  $message = 'Children cannot travel alone';
}
if ($adults || $seniors || $youths) {
  if ($tandc) {
    header('Location: /prices.php');
    exit;
  }
  else {
    $message = 'You must accept the terms and conditions';
  }
}
?>
<html>
<body>
<h1>Easy Air</h1>
<h2>Book tickets</h2>
<?php 
if (!empty($message)) {
  print "<h3>{$message}</h3>";
}
?>
<form action="/tickets.php" method="post" style="border: 1px solid red" id="search-form">
<label for="origin">Origin</label>
<select name="origin">
<option value="heathrow">Heathrow</option>
<option value="gatwick">Gatwick</option>
</select> 
<br/>
<label for="destination">Destination</label>
<select name="destination">
<option value="new-york">New York</option>
<option value="chicago">Chicago</option>
</select> 
<br/>
<label for="adults">Adults</label>
<select name="adults">
<option value="0">0</option>
<option value="1">1</option>
<option value="2">2</option>
</select> 
<br/>
<label for="children">Children</label>
<select name="children">
<option value="0">0</option>
<option value="1">1</option>
<option value="2">2</option>
</select> 
<br/>
<label for="youths">Youths</label>
<select name="youths">
<option value="0">0</option>
<option value="1">1</option>
<option value="2">2</option>
</select> 
<br/>
<label for="seniors">Seniors</label>
<select name="seniors">
<option value="0">0</option>
<option value="1">1</option>
<option value="2">2</option>
</select> 
<br/>
<input type="checkbox" name="tandc" value="tanc">I accept the terms and conditions<br/>
<input type="submit" value="Search for tickets"></input>
</form>
</div>
</body>
</html>
