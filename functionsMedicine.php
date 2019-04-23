<?php 
	session_start();
	$errors = array();
	$sqlNameResults = array();
	

// determines whether or not a user is logged into the system
function isLoggedIn()
{
	if (isset($_SESSION['user'])) {
		return true;
	}else{
		return false;
	}
}
	
	
	function MedicineForm(){

	// call these variables with the global keyword to make them available in function
	global $conn, $errors;
    // defined below to escape form values\
	$patient_id  	  =  ($_POST['patient_id']);
	$request_date 	  =  ($_POST['request_date']);
	$request_form      =  ($_POST['request_form']);
	$health_unit_name =  ($_POST['health_unit_name']);
	$district  		  =  ($_POST['district']);
	//$section          =  ($_POST['section']);
	//$category         =  ($_POST['category']);
	$item_name  	  =  ($_POST['item_name']);
	$prescribed_qty   =  ($_POST['prescribed_qty']);
	$dispensed_qty    =  ($_POST['dispensed_qty']);
	$authority_name   =  ($_POST['authority_name']);
	
	
	// form validation: ensure that the form is correctly filled
	if (empty($patient_id)) { 
		array_push($errors, "Sorry, Today's Date is required."); 
	}
	if (empty($request_date)) { 
		array_push($errors, "Sorry, Patient ID is required. If not applicable please write N/A."); 
	} 
	if (empty($request_form)) { 
		array_push($errors, "Sorry, Hemoglobin is required. If not applicable please write N/A."); 
	}
	if (empty($health_unit_name)) { 
		array_push($errors, "Sorry, Blood-Grouping is required."); 
	}
	if (empty($district)) { 
		array_push($errors, "Sorry, Blood-Grouping Others is required. If not applicable please write N/A."); 
	}
	if (empty($section)) { 
		array_push($errors, "Sorry, Lab Test is required."); 
	}
	if (empty($category)) { 
		array_push($errors, "Sorry, Lab Test Results is required."); 
	}
	if (empty($item_name)) { 
		array_push($errors, "Sorry, Syphilis Test for Women is required."); 
	}
	if (empty($prescribed_qty)) { 
		array_push($errors, "Sorry, Syphilis Test for Partner is required."); 
	}
	if (empty($dispensed_qty)) { 
		array_push($errors, "Sorry, TB Status is required."); 
	}
	if (empty($authority_name)) { 
		array_push($errors, "Sorry, Authority Name is required."); 
	}
	
	


	}
	
	
	if (isset($_POST['next_btn'])) {
		//$district  		  =  ($_POST['district']);
		$section          =  ($_POST['section']);
		$category         =  ($_POST['category']);
		get_item_names();
	}

	
	function get_item_names () {
		global $section, $category;
		
		$sqlNameResults =  "SELECT item_name 
							FROM item_list 
							WHERE item_section = '$section' AND item_category = '$category'";
	
		$num_items = count($sqlNameResults);
		for($i = 0; $i < $num_items; $i++) {
			echo "<option value = '$sqlNameResults[i]'>$sqlNameResults[i]</option>";
		}
	}

		// receive item id for back end calculations (qty/inventory)
		"SELECT itemID FROM item_list WHERE item_name = '$item_name'"


// call the LabForm() function if LabForm_btn is clicked
if (isset($_POST['MedicineForm_btn'])) {
	MedicineForm();
}


function display_error() {
	global $errors;

	if (count($errors) != 0){
		echo '<div class="error">';
			foreach ($errors as $error){
				echo $error .'<br>';
			}
		echo '</div>';
	}
}	


	
	$servername = "mydb.ics.purdue.edu";
	$username = "g1100782";
	$password = "Team2Website";
	$dbname = "g1100782";

	// Create connection
	$conn = mysqli_connect($servername, $username, $password, $dbname);
	// Check connection
	if (!$conn) {
		die("Connection failed: " . mysqli_connect_error());
	}


	$patient_id = mysqli_real_escape_string($conn, $_REQUEST['patient_id']);
	$request_date = mysqli_real_escape_string($conn, $_REQUEST['request_date']);
	$request_form = mysqli_real_escape_string($conn, $_REQUEST['request_form']);
	$health_unit_name = mysqli_real_escape_string($conn, $_REQUEST['health_unit_name']);
	$district = mysqli_real_escape_string($conn, $_REQUEST['district']);
	$section = mysqli_real_escape_string($conn, $_REQUEST['section']);
	$category = mysqli_real_escape_string($conn, $_REQUEST['category']);
	$item_name = mysqli_real_escape_string($conn, $_REQUEST['item_name']);
	$prescribed_qty = mysqli_real_escape_string($conn, $_REQUEST['prescribed_qty']);
	$dispensed_qty = mysqli_real_escape_string($conn, $_REQUEST['dispensed_qty']);
	$authority_name = mysqli_real_escape_string($conn, $_REQUEST['authority_name']);



	
	if (isset($_POST['MedicineForm_btn'])) {
	if (count($errors == 0)) {
		$sql = "INSERT INTO medicineForm (patient_id, request_date, request_form, health_unit_name, district, section, 
		category, item_name, prescribed_qty, dispensed_qty, authority_name)
		VALUES ('$patient_id', '$request_date', '$request_form', '$health_unit_name', '$district', '$section', 
		'$category', '$item_name', '$prescribed_qty', '$dispensed_qty', '$authority_name')";
		
		if (mysqli_query($conn, $sql)) {
			echo "New record created successfully";
		} else {
			echo "Error: " . $sql . "<br>" . mysqli_error($conn);
		}
	
	}
	}
		mysqli_close($conn);
		
		
	
?>


