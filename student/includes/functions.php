<?php 

function get_safe_value($conn,$data){
	$data = trim($data);
	return mysqli_real_escape_string($conn,$data);
}

?>