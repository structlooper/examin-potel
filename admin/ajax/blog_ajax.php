<?php 
require_once '../includes/config.php';

//Getting checked box ids to Delete Packages from exam_package table by ajax call..
	if(isset($_POST['blogid'])){

		$check_ids = $_POST['blogid'];
		$table_name = $_POST['tableName'];
		
		foreach($check_ids as $id){
		//Delete Checked Records..
		$query = "DELETE FROM $table_name WHERE id ='$id'";

		//echo $query;
		$result = mysqli_query($conn,$query);
		if(!$result){
			echo "error found ".mysqli_error($conn);
		}
	}
	}

	//Getting checked box ids to Delete packages from exam_package table by ajax call END..


?>