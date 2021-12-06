<?php 
ob_start();
error_reporting(0);
require_once '../includes/config.php';
require_once '../includes/functions.php';
$web = web; //path of the root folder..

if(isset($_POST['add_blog'])){
	echo "title" .$title = get_safe_value($conn,$_POST['title']);
    echo "</br>";
	echo "short desc" .$description = get_safe_value($conn,$_POST['description']);
    echo "</br>";

	$status = 1; 

    $sql = "INSERT INTO blog_category(title,description)VALUES('$title','$description')";

	 if(mysqli_query($conn,$sql)){

		header("location:".$web."admin/blog_category.php?msg=success");
	}else{

       echo "Error: " . $sql . "<br>" . mysqli_error($conn);
		//header("location".$web."/admin/blog.php?msg=error");
	}

}



if(isset($_POST['update_category'])){
	$cat_id = $package_name = get_safe_value($conn,$_POST['cat_id']);
	$title = get_safe_value($conn,$_POST['update_categoryTitle']);
	$description = get_safe_value($conn,$_POST['update_description']);
$query = "UPDATE blog_category SET title='$title', description='$description' WHERE id ='$cat_id'";

	$sql = $conn->prepare($query);
	$sql->bind_param("ss",$title,$description);
	$sql->execute();

	if($conn->affected_rows == 1){
		header("location:".$web."admin/blog_category.php?msg=updated");
    }else{
        echo "Query Failed".$sql->error;
		//header("location".$web."/admin/packages.php?msg=error");
	}

}

?>