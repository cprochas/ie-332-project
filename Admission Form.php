<!DOCTYPE html PUBLIC "-//W3C//DTD HTML 4.01//EN">
<html>
   <head>
      <title>Admission Form</title>
     <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/js/bootstrap.min.js"></script>	    
</head>

<body background= "giraffe.jpg";> <!-- style="background-color:lime;"> -->
<div id="main">
	
<?php
$name = $id = $doa = $age = $village = $parish = $auth_name = $opd_ipd_no = ""; 
$nameErr = $idErr = $doa = $ageErr = $villageErr = $parishErr = $auth_nameErr = $opd_ipd_noErr = "";
		
if ($_SERVER["REQUEST_METHOD"] == "POST") {
  if (empty($_POST["name"])) {
    $nameErr = "Sorry, this answer is required. If not applicable please write N/A.";
  } else {
    $name = test_input($_POST["name"]);
    // check if name only contains letters and whitespace
    if (!preg_match("/^[a-zA-Z ]*$/",$name)) {
      $nameErr = "Only letters and white space allowed"; 
    }
  }
  
if ($_SERVER["REQUEST_METHOD"] == "POST") {
  if (empty($_POST["village"])) {
    $villageErr = "Sorry, this answer is required. If not applicable please write N/A.";
  } else {
    $village = test_input($_POST["village"]);
    // check if name only contains letters and whitespace
    if (!preg_match("/^[a-zA-Z ]*$/",$village)) {
      $villageErr = "Only letters and white space allowed"; 
    }
  }
    
	
if ($_SERVER["REQUEST_METHOD"] == "POST") {
  if (empty($_POST["parish"])) {
    $parishErr = "Sorry, this answer is required. If not applicable please write N/A.";
  } else {
    $parish = test_input($_POST["parish"]);
    // check if name only contains letters and whitespace
    if (!preg_match("/^[a-zA-Z ]*$/",$parish)) {
      $parishErr = "Only letters and white space allowed"; 
    }
  }
	
if ($_SERVER["REQUEST_METHOD"] == "POST") {
  if (empty($_POST["auth_name"])) {
    $auth_nameErr = "Sorry, this answer is required. If not applicable please write N/A.";
  } else {
    $auth_name = test_input($_POST["auth_name"]);
    // check if name only contains letters and whitespace
    if (!preg_match("/^[a-zA-Z ]*$/",$auth_name)) {
      $auth_nameErr = "Only letters and white space allowed"; 
    }
  }
	
if ($_SERVER["REQUEST_METHOD"] == "POST") {
  if (empty($_POST["opd_ipd_no"])) {
    $opd_ipd_noErr = "Sorry, this answer is required. If not applicable please write N/A.";
  } else {
    $opd_ipd_no = test_input($_POST["opd_ipd_no"]);
    // check if name only contains letters and whitespace
    if (!preg_match("/^[a-zA-Z0-9 ]*$/",$opd_ipd_no)) {
      $opd_ipd_noErr = "Invalid input."; 
    }
  }
	
if ($_SERVER["REQUEST_METHOD"] == "POST") {
  if (empty($_POST["id"])) {
    $idErr = "Sorry, this answer is required. If not applicable please write N/A.";
  } else {
    $id = test_input($_POST["id"]);
    // check if name only contains letters and whitespace
    if (!preg_match("/^[a-zA-Z0-9 ]*$/",$id)) {
      $idErr = "Invalid input."; 
    }
  }
	
  if (empty($_POST["doa"])) {
    $doaErr = "Sorry, this answer is required.";
  } else {
    $doa = test_input($_POST["doa"]);
  }
}

  if (empty($_POST["age"])) {
    $ageErr = "Sorry, this answer is required.";
  } else {
    $age = test_input($_POST["age"]);
  }
}

function test_input($data) {
  $data = trim($data);
  $data = stripslashes($data);
  $data = htmlspecialchars($data);
  return $data;
}
?>

<h2>Admission Form</h2>
<p><span class="error">* required field</span></p>
<form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">  
  Authority Name: <input type="text" name="auth_name" value="<?php echo $auth_name;?>">
  <span class="error">* <?php echo $auth_nameErr;?></span>
  <br><br>
  Patient Name: <input type="text" name="name" value="<?php echo $name;?>">
  <span class="error">* <?php echo $nameErr;?></span>
  <br><br>
  Patient ID: <input type="text" name="id" value="<?php echo $id;?>">
  <span class="error">* <?php echo $idErr;?></span>
  <br><br>
  OPD/IPD no.: <input type="text" name="opd_ipd_no" value="<?php echo $opd_ipd_no;?>">
  <span class="error">* <?php echo $opd_ipd_noErr;?></span>
  <br><br>
  Village Name: <input type="text" name="village" value="<?php echo $village;?>">
  <span class="error">* <?php echo $villageErr;?></span>
  <br><br>
  Parish Name: <input type="text" name="parish" value="<?php echo $parish;?>">
  <span class="error">* <?php echo $parishErr;?></span>
  <br><br>
  Today's Date: <input type="date" name="doa">* <br><br>
  Age:
  <input type="radio" name="age" <?php if (isset($age) && $age=="10-19 yrs") echo "checked";?> value="10-19 yrs">10-19 yrs
  <input type="radio" name="age" <?php if (isset($age) && $age=="20-24 yrs") echo "checked";?> value="20-24 yrs">20-24 yrs
  <input type="radio" name="age" <?php if (isset($age) && $age==">=25 yrs") echo "checked";?> value=">=25 yrs">>=25 yrs
  <span class="error">* <?php echo $genderErr;?></span>
  <br><br>
  <input type="submit" name="submit" value="Submit">  
</form>

<?php
echo "<h2>Your Input:</h2>";
echo $name;
echo "<br>";
echo $email;
echo "<br>";
echo $website;
echo "<br>";
echo $comment;
echo "<br>";
echo $gender;
?>
	
</div>
</body>
</html>

