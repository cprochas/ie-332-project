<!DOCTYPE html PUBLIC "-//W3C//DTD HTML 4.01//EN">
<html>
   <head>
      <title>Forms</title>
     <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/js/bootstrap.min.js"></script>	    
</head>

<body background= "giraffe.jpg";> <!-- style="background-color:lime;"> -->


<div id="main">
<br>
<br>
<br>
<br>
<br>
<br>
<center><font size="6"> Forms  </center>
<br>
<br>
<br>
<br>
	<form action="https://web.ics.purdue.edu/~g1100782/Admission_form.php?" style="text-align: center;">
	<input type="submit" class="btn btn-primary" value="Admission Form" />
	</form>
	<br>
	<form action="https://web.ics.purdue.edu/~g1100782/Lab_form.php?" style="text-align: center;">
	<input type="submit" class="btn btn-primary" value="Lab Form" />
	</form>
	<br>
	<form action="https://web.ics.purdue.edu/~g1100782/RegisterMedicine_form.php?" style="text-align: center;">
	<input type="submit" class="btn btn-primary" value="RegisterMedicine_form" />
	</form>
	<br>
	<form action="https://web.ics.purdue.edu/~g1100782/Diagnosis_form.php?" style="text-align: center;">
	<input type="submit" class="btn btn-primary" value="Diagnosis Form" />
	</form>
	<br>
	<form action="https://web.ics.purdue.edu/~g1100782/Delivery_form.php?" style="text-align: center;">
	<input type="submit" class="btn btn-primary" value="Delivery Form" />
	</form>
<?php
$servername = "mydb.ics.purdue.edu";
$username = "g1100782";
$password = "Team2Website";
$dbname = "g1100782";

$conn = mysqli_connect($servername, $username, $password, $dbname);
if (!$conn) {
	die("Connection failed: " . mysqli_connect_error());
}
echo "Connected successfully";
	

?>
	
<?php
$page = $_GET["page"];
if ( $page=="Admission" || !isset($page) ) {
//echo home content
} else if ( $page=="Lab" ) {
//echo about me content
} else if ( $page=="RegisterMedicine" ) {
//echo portfolio content
} else if ( $page=="Diagnosis" ) {
//echo contact content
} else if ( $page=="Delivery" ) {
//echo contact content
}
?>
		
		
	
</div>
</body>
</html>
