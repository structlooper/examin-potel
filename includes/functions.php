<?php 

 //define("web","http://localhost/softonic/examin/");

 //sanitize inputs....
 function get_safe_value($conn,$data){
	$data = trim($data);
	return mysqli_real_escape_string($conn,$data);
}


?>