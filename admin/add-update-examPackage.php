<?php 
ob_start();
error_reporting(1);
//require_once 'includes/config.php';
require_once '../includes/config.php';
require_once '../includes/functions.php';
$web = web; //path of the root folder..

if(isset($_POST['add_package'])){
	$package_name = get_safe_value($conn,$_POST['package_name']);
	$featured_exam_ids = get_safe_value($conn,$_POST['exam_ids']);
	$package_amount = get_safe_value($conn,$_POST['package_amount']);
	$package_validity = get_safe_value($conn,$_POST['package_validity']);
	$description = get_safe_value($conn,$_POST['description']);
    $class_id = get_safe_value($conn,$_POST['class_list']);


    //Get class name..
    $sql = $conn->query("SELECT * FROM classes WHERE id = '$class_id'");
    $selClass = $sql->fetch_assoc();
    $className = $selClass['class_name'];


	$status = 1;
	$date_created = date("Y-m-d");
	$date_modified = date("Y-m-d H:i:s");


	//File Processing
        // $package_img = $_FILES['image']['name'];
        // if(empty($_FILES['image']['tmp_name']))
        // {
        //     $package_image = "";
        // }
        // else
        // {
        //     if(($_FILES['image']['type'] == "image/jpeg")
        //     ||($_FILES['image']['type'] == "image/jpg")
        //     ||($_FILES['image']['type'] == "image/gif")
        //     ||($_FILES['image']['type'] == "image/png"))
        //     {
        //         $package_image = preg_replace('/\s+/','-',$package_img);

        //         //If file exist change the name start
        //         if(file_exists('../uploads/package-img/'.$package_img))
        //         {
        //             $actual_name = pathinfo($package_img,PATHINFO_FILENAME);
        //             $original_name = $actual_name;
        //             $extension = pathinfo($package_img,PATHINFO_EXTENSION);

        //             $i = 1;
        //             while(file_exists('../uploads/package-img/'.$actual_name.".".$extension))
        //             {
        //                 $actual_name = (string)$original_name."(".$i.")";
        //                 $img_name = $actual_name.".".$extension;
        //                 $i++;
        //             }
        //             $package_image = $img_name;
        //         }
        //         else{
        //             $package_image = $package_img;
        //         }
        //         //If file exist change the name end

        //         move_uploaded_file($_FILES['image']['tmp_name'],'../uploads/package-img/'.$package_image);
        //     }
        //     else{
        //         $msg = "<div class='alert alert-danger'><button type='button' class='close' data-dismiss='alert'>×</button>Image must be in JPG, GIF or PNG Format.</div>";
        //     }
        // }        
        //File Processing End.    

    //File Processing
        $package_img = $_FILES['image']['name'];
        if(empty($_FILES['image']['tmp_name']))
        {
            $image_name = "";
        }
        else
        {
            if(($_FILES['image']['type'] == "image/jpeg")
            ||($_FILES['image']['type'] == "image/jpg")
            ||($_FILES['image']['type'] == "image/gif")
            ||($_FILES['image']['type'] == "image/png"))
            {
                $package_image = preg_replace('/\s+/','-',$package_img);
                $image_name = time()."_".$package_image;    

                move_uploaded_file($_FILES['image']['tmp_name'],'../uploads/package-img/'.$image_name);
            }
            else{
                $msg = "<div class='alert alert-danger'><button type='button' class='close' data-dismiss='alert'>×</button>Image must be in JPG, GIF or PNG Format.</div>";
            }
        }        
        //File Processing End.   



	$sql = $conn->prepare("INSERT INTO exam_packages SET package_name=?, amount=?,validity=?,image=?,featured_exams=?,discription=?,class_id=?, class_name=?, status=?,date_created=?,date_modified=?");
	$sql->bind_param("siisssisiss",$package_name,$package_amount,$package_validity,$image_name,$featured_exam_ids,$description,$class_id,$className,$status,$date_created,$date_modified);
	$sql->execute();

	if($conn->affected_rows == 1){

		header("location:".$web."admin/packages.php?msg=success");
	}else{
		//header("location".$web."/admin/packages.php?msg=error");
	}

}



if(isset($_POST['update_package'])){
	$package_id = $package_name = get_safe_value($conn,$_POST['package_id']);
	$package_name = get_safe_value($conn,$_POST['update_packageName']);
	$featured_exam_ids = get_safe_value($conn,$_POST['updateExam_ids']);
	$package_amount = get_safe_value($conn,$_POST['update_package_amount']);
	$package_validity = get_safe_value($conn,$_POST['update_package_validity']);
	$description = get_safe_value($conn,$_POST['update_description']);
    $class_id = get_safe_value($conn,$_POST['upd_class_list']);

    //Get class name..
    $sql = $conn->query("SELECT * FROM classes WHERE id = '$class_id'");
    $selClass = $sql->fetch_assoc();
    $className = $selClass['class_name'];		
    


	$date_modified = date("Y-m-d H:i:s");

	//File Processing
        $package_img = $_FILES['image']['name'];
        
        if(empty($_FILES['image']['tmp_name']))
        {
            //$package_image = "";
            $image_name = $_POST['hidden_image'];
            
        }
        else
        {
            if(($_FILES['image']['type'] == "image/jpeg")
            ||($_FILES['image']['type'] == "image/jpg")
            ||($_FILES['image']['type'] == "image/gif")
            ||($_FILES['image']['type'] == "image/png"))
            {
                $package_image = preg_replace('/\s+/','-',$package_img);
                $image_name = time()."_".$package_image;
            

                move_uploaded_file($_FILES['image']['tmp_name'],'../uploads/package-img/'.$image_name);
            }
            else{
                $msg = "<div class='alert alert-danger'><button type='button' class='close' data-dismiss='alert'>×</button>Image must be in JPG, GIF or PNG Format.</div>";
            }
        }        
        //File Processing End.


	$sql = $conn->prepare("UPDATE exam_packages SET package_name=?, amount=?,validity=?,image=?,featured_exams=?,discription=?,class_id=?, class_name=?,date_modified=? WHERE package_id ='$package_id'");
	$sql->bind_param("siisssiss",$package_name,$package_amount,$package_validity,$image_name,$featured_exam_ids,$description,$class_id,$className,$date_modified);
	$sql->execute();

	if($conn->affected_rows == 1){
		header("location:".$web."admin/packages.php?msg=updated");
    }else{
        echo "Query Failed".$sql->error;
		//header("location".$web."/admin/packages.php?msg=error");
	}

}

?>