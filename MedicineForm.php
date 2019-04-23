<?php

//Includes the functionsMedicine file
include('functionsMedicine.php');

//Redirected to Login page if not logged in
if (!isLoggedIn()) {
	$_SESSION['msg'] = "You must log in first";
	header('location: multi_login/login.php');
}

// destroys session on logout and redirects to login page after inactivity 
if (isset($_SESSION['LAST_ACTIVITY']) && (time() - $_SESSION['LAST_ACTIVITY'] > 503)) {
    session_destroy();
	unset($_SESSION['user']);
	header("location: multi_login/login.php");
}

// updates last activity time-stamp
$_SESSION['LAST_ACTIVITY'] = time(); 
?>

<!DOCTYPE html PUBLIC "-//W3C//DTD HTML 4.01//EN">
<html oncontextmenu="return false"> <!-- Disables right click ability -->
<head>
    <title>Medicine Form</title>
    <meta charset="utf-8">
	<link rel='icon' href='favicon.ico' type='image/x-icon'>
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/css/bootstrap.min.css">
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/js/bootstrap.min.js"></script>	

<!-- css customization for body and form input -->
<style>
body {
	font-size: 120%;
	font-family: Arial;
}
	form, .content {
	width: 40%;
	margin: 0px auto;
	padding: 20px;
	border: 1px solid #000000;
	background: #A9A9A9;
	border-radius: 0px 0px 10px 10px;
}
.input-group {
	margin: 10px 0px 10px 0px;
}
.input-group label {
	display: block;
	text-align: left;
	margin: 3px;
}
.input-group input {
	height: 30px;
	width: 93%;
	padding: 5px 10px;
	font-size: 16px;
	border-radius: 5px;
	border: 1px solid gray;
}
.input-group select {
	height: 30px;
	width: 93%;
	padding: 5px 10px;
	font-size: 16px;
	border-radius: 5px;
	border: 1px solid gray;
}
#user_type {
	height: 40px;
	width: 98%;
	padding: 5px 10px;
	background: white;
	font-size: 16px;
	border-radius: 5px; 
	border: 1px solid gray;
}
.btn {
	padding: 10px;
	font-size: 15px;
	color: white;
	background: #2F4F4F;
	border: none;
	border-radius: 5px;
}
.btn:hover{
	opacity: 0.8;
}
</style>
</head>
<body background= "giraffe.jpg";> 
	<div class="header">
		<center><h2>Medicine Form</h2></center>
	</div>
	<p><center>* required field</center></p>
	<form method="post" action="MedicineForm.php">

		
		
		
		<h4>Please answer the questions to provide medicine order information.</h5>
		<div class="input-group">
			<label>Patient ID</label>
			<input type="text" name="patient_id" value="<?php echo $patient_id; ?>" required> *
		</div>
		<div class="input-group" >
			<label>Request Date</label>
			<input type="date" name="request_date" value="<?php echo $request_date; ?>" required> *
		</div>
		<div class="input-group">
			<label>Request Form</label>
			<select name="request_form" id="request_form" required> *
				<option value=""></option>
				<option value="MCH">MCH</option>
				<option value="Others">Others</option>
				<option value="N/A">N/A (not applicable)</option>
			</select>
		</div>
		<div class="input-group">
			<label>Health Unit Name</label>
			<input type="text" name="health_unit_name" value="<?php echo $health_unit_name; ?>" required> *
		</div>
		<div class="input-group">
			<label>District </label>
			<select name="district" id="district" required> *
				<option value=""></option>
				<option value="Mukono">Mukono</option>
			</select>
		</div>
		<div class="input-group">
			<label>Section</label>
			<select name="section" id="section" required> *
				<option value=""></option>
				<option value="EMHS">EMHS</option>
				<option value="Lab_reagents_consumables">Lab Reagents & Consumables</option>
			</select> 
		</div>
		<div class="input-group">
			<label>Category</label>
			<select name="category" id="category" required> *
				<option value=""></option>
				<option value="Antibiotic">Antibiotic</option>
				<option value="ANTI-MICROBIAL DISCS (SENSITIVITY DISCS) ">ANTI-MICROBIAL DISCS (SENSITIVITY DISCS) </option>
				<option value="AUTO-IMMUNE TESTS ">AUTO-IMMUNE TESTS </option>
				<option value="Blood">Blood</option>
				<option value="BLOOD GROUPING & CROSS MATCH">BLOOD GROUPING & CROSS MATCH</option>
				<option value="CD4/CD8-FACSCALIBUR">CD4/CD8-FACSCALIBUR</option>
				<option value="CD4/CD8-FACSCOUNT">CD4/CD8-FACSCOUNT</option>
				<option value="CD4/CD8-PARTEC CYFLOW">CD4/CD8-PARTEC CYFLOW</option>
				<option value="CD4/CD8-PIMA">CD4/CD8-PIMA</option>
				<option value="CHEMICALS AND STAIN POWDERS ">CHEMICALS AND STAIN POWDERS </option>
				<option value="Child Health">Child Health</option>
				<option value="CLINICAL CHEMISTRY-COBAS c311">CLINICAL CHEMISTRY-COBAS c311</option>
				<option value="CLINICAL CHEMISTRY-HUMASTAR, HUMALYZER & HUMALYTE ">CLINICAL CHEMISTRY-HUMASTAR, HUMALYZER & HUMALYTE </option>
				<option value="CONSUMABLES FOR MICROSCOPY ">CONSUMABLES FOR MICROSCOPY </option>
				<option value="CRYPTOCOCCAL TESTS ">CRYPTOCOCCAL TESTS </option>
				<option value="CSF ANALYSIS ">CSF ANALYSIS </option>
				<option value="CULTURE MEDIA ">CULTURE MEDIA </option>
				<option value="DBS SUPPLIES ">DBS SUPPLIES </option>
				<option value="Diabete">Diabete</option>
				<option value="Family Planning">Family Planning</option>
				<option value="FEBRILE ANTIGEN TESTS ">FEBRILE ANTIGEN TESTS </option>
				<option value="FIXATIVES ">FIXATIVES </option>
				<option value="GENERAL LABORATORY SUPPLIES ">GENERAL LABORATORY SUPPLIES </option>
				<option value="GRAM STAINING ">GRAM STAINING </option>
				<option value="HAEMOPARASITE DIAGNOSTICS ">HAEMOPARASITE DIAGNOSTICS </option>
				<option value="Heart Disease">Heart Disease</option>
				<option value="HIV">HIV</option>
				<option value="Hypertension">Hypertension</option>
				<option value="INFECTION CONTROL AND WASTE MANAGEMENT ">INFECTION CONTROL AND WASTE MANAGEMENT </option>
				<option value="LABORATORY GLASS/PLASTIC WARE & GENERAL EQUIPMENTS ">LABORATORY GLASS/PLASTIC WARE & GENERAL EQUIPMENTS </option>
				<option value="LABORATORY HMIS TOOLS ">LABORATORY HMIS TOOLS </option>
				<option value="Malaria">Malaria</option>
				<option value="MANUAL HAEMOGLOBIN ESTIMATION AND WBC COUNTING">MANUAL HAEMOGLOBIN ESTIMATION AND WBC COUNTING</option>
				<option value="Maternal">Maternal</option>
				<option value="Others">Others</option>
				<option value="PREGNANCY TESTS ">PREGNANCY TESTS </option>
				<option value="Prenatal Care">Prenatal Care</option>
				<option value="RAPID MALARIA TESTING ">RAPID MALARIA TESTING </option>
				<option value="REAGENTS & CONSUMABLES FOR AUTOMATED HEMATOLOGY ANALYSERS ">REAGENTS & CONSUMABLES FOR AUTOMATED HEMATOLOGY ANALYSERS </option>
				<option value="SAMPLE COLLECTION SUPPLIES/ACCESSORIES ">SAMPLE COLLECTION SUPPLIES/ACCESSORIES </option>
				<option value="SYPHILLIS TESTS ">SYPHILLIS TESTS </option>
				<option value="TB">TB</option>
				<option value="TB MICROSCOPY ">TB MICROSCOPY </option>
				<option value="TRANSPORT MEDIA ">TRANSPORT MEDIA </option>
				<option value="URINE STRIPS">URINE STRIPS </option>
				
			</select> 
		</div>
		
		
		

		
		
		
		
		<div class="input-group">
			<label>Item Name</label>
			<select name="item_name" id="item_name" > *
				<option value=""></option>
				<?php echo get_item_names(); ?>
			</select> 
		</div>
		<div class="input-group">
			<label>Prescribed Quantity</label>
			<input type="number" name="prescribed_qty" value="<?php echo $prescribed_qty; ?>" required> *
		</div>
		<div class="input-group">
			<label>Dispensed Quantity</label>
			<input type="number" name="required_qty" value="<?php echo $required_qty; ?>" required> *
		</div>
		<div class="input-group">
			<label>Authority Name</label>
			<input type="text" name="authority_name" value="<?php echo $authority_name; ?>" required> *
		</div>
		<div class="input-group">
			<button type="submit" class="btn" name="MedicineForm_btn"> Submit </button>
		</div>
	</form>
</body>
<!-- css style for displaying clock in top right corner of screen -->
<style>
.topcorner{
	position:absolute;
	top:0;
	right:0;
	font-size: 16px;
	color: white;
}
</style>

<!-- Function to create an auto-updating clock -->
<script type="text/javascript">
function updateClock ( )
{
  var currentTime = new Date ( );

  var currentHours = currentTime.getHours ( );
  var currentMinutes = currentTime.getMinutes ( );
  var currentSeconds = currentTime.getSeconds ( );

  // Pad the minutes and seconds with leading zeros, if required
  currentMinutes = ( currentMinutes < 10 ? "0" : "" ) + currentMinutes;
  currentSeconds = ( currentSeconds < 10 ? "0" : "" ) + currentSeconds;

  // Choose either "AM" or "PM" as appropriate
  var timeOfDay = ( currentHours < 12 ) ? "AM" : "PM";

  // Convert the hours component to 12-hour format if needed
  currentHours = ( currentHours > 12 ) ? currentHours - 12 : currentHours;

  // Convert an hours component of "0" to "12"
  currentHours = ( currentHours == 0 ) ? 12 : currentHours;

  // Compose the string for display
  var currentTimeString = currentHours + ":" + currentMinutes + ":" + currentSeconds + " " + timeOfDay;

  // Update the time display
  document.getElementById("clock").firstChild.nodeValue = currentTimeString;
}
</script>

<!-- create an updating clock on page -->
<body onload="updateClock(); setInterval('updateClock()', 1000 )">
<div class="topcorner">
  <span id="clock">&nbsp;</span>
</div>
</body>

<head>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
<!-- blocks access to source code -->
<script language="JavaScript">
    window.onload = function () {
		document.addEventListener("contextmenu", function (e) {
           e.preventDefault();
}, false);
        document.addEventListener("keydown", function (e) {
				{
				// "I" key
				if (e.ctrlKey && e.shiftKey && e.keyCode == 73) {
                   disabledEvent(e);
				}
				// "J" key
				if (e.ctrlKey && e.shiftKey && e.keyCode == 74) {
                   disabledEvent(e);
				}
				// "S" key + macOS
				if (e.keyCode == 83 && (navigator.platform.match("Mac") ? e.metaKey : e.ctrlKey)) {
                   disabledEvent(e);
				}
				// "U" key
				if (e.ctrlKey && e.keyCode == 85) {
                   disabledEvent(e);
				}
				// "F12" key
				if (event.keyCode == 123) {
					disabledEvent(e);
				}
				}, false);
           function disabledEvent(e) {
               if (e.stopPropagation) {
                   e.stopPropagation();
               } else if (window.event) {
                   window.event.cancelBubble = true;
               }
               e.preventDefault();
               return false;
           }
       }
</script>
</head>
</html>
