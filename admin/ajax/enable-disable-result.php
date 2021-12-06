<?php 
require_once '../includes/config.php';


//Getting checked box ids to Enable/Disable Results from  table by ajax call..
	if(isset($_POST['id'])){
		$check_ids = $_POST['id'];
		$examID = $_POST['examID'];
		$table_name = $_POST['tableName'];

		foreach($check_ids as $id){
		//Disable Checked Records..
		

		echo $query = "UPDATE $table_name SET result_enable_disable_status='' WHERE student_id ='$id' AND exam_id ='$examID'";

		//echo $query;
		$result = mysqli_query($conn,$query);
		if(!$result){
			echo "error found ".mysqli_error($conn);
		}
	}
	}
	//Getting checked box ids to Enable/Disable Results from  table by ajax call..

?>