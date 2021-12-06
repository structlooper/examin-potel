<?php 
error_reporting(1);
// require_once 'includes/config.php';
require_once '../includes/config.php';
require_once 'includes/functions.php';


//Posting data through ajax fro add_class.php page...
if(isset($_POST['class_id'])){
	$class_id = $_POST['class_id'];
	$class_name = $_POST['class_name'];

	//Update old class name with the new one in this id...
	$query = "UPDATE classes SET class_name = '$class_name' WHERE id = '$class_id'";
	$update = mysqli_query($conn,$query);
	if($conn->affected_rows == 1){
		echo "Class Updated";
	}
}



?>