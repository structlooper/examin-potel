<?php 

function get_safe_value($conn,$data){
	$data = trim($data);
	return mysqli_real_escape_string($conn,$data);
}


function getData($table){
	global $conn;
	//Fetch classes from database;
	$query = "SELECT * FROM $table WHERE status = '1' ORDER BY id ASC";
	
	$result = mysqli_query($conn,$query);
	if($result->num_rows >0){
		$data = array();
		while($row = $result->fetch_assoc()){
			$data[] = $row;
		}
		return $data;
	}else{
		return 0;
	}  	
}

function addData($table,$data){

	global $conn;

	$key = array_keys($data); //Get key(Column Name)
	$value = array_values($data); //get values (values to be inserted)


	$query = "INSERT INTO $table(".implode(',',$key).")VALUES('".implode("','",$value)."')";

	$result = mysqli_query($conn,$query);
	if(!$result){
		echo "Error :".mysqli_error($conn);
	}

	if($conn->affected_rows == 1){
		//$msg = "Data added";
		return true;
	}else{
		return false;
	}
	//return $msg;
	//Check if the category is already registered in database or not..
  //   $select_category = mysqli_query($conn,"SELECT * FROM $table WHERE class_name = '$'");
  //   if($check = mysqli_num_rows($select_category) > 0){
  //     $msg = "Category already registerd";
  //   }else{
  //     $insert = mysqli_query($conn,"INSERT INTO categories(category_name,status) VALUES('$category_name','1')");
  //     if($conn->affected_rows == 1){
  //       $msg = "Category registerd successfully";
  //     }
  //   }
  // }

}

function deleteData($table,$id){
	global $conn;

	$query = "DELETE FROM $table WHERE id = '$id'";
	$sql = mysqli_query($conn,$query);
	if($sql){
		// echo "<script>location.href='add_class.php'</script>";
		// //echo "<script>location.href=".$page_name."</script>";
		return "Data delete";
	}else{
		return "data not deleted try again";
	}

}

?>