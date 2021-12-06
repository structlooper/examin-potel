<?php
require_once '../includes/config.php';
require_once 'includes/functions.php';
$web = web; 


 $student_id = $_SESSION['student']['id'];    
 

if(isset($_POST['update']) && $_POST['update'] != ""){

	$fname = get_safe_value($conn,$_POST['fname']);
	$lname = get_safe_value($conn,$_POST['lname']);
	 // echo $username = get_safe_value($conn,$_POST['username']);
  // echo $email = get_safe_value($conn,$_POST['email']);

	// echo $mobile = get_safe_value($conn,$_POST['mobile']);
	$dob = get_safe_value($conn,$_POST['dob']);
	$gender = get_safe_value($conn,$_POST['gender']);
	$address = get_safe_value($conn,$_POST['address']);

	$country = get_safe_value($conn,$_POST['country']);
	$state = get_safe_value($conn,$_POST['state']);
	$city = get_safe_value($conn,$_POST['city']);

	$date_modified = date("Y-m-d H:i:s");
  //File Processing
  $image = $_FILES['profile_pic']['name'];

  if(empty($_FILES['profile_pic']['tmp_name']))
    {
      // $profile_image = $info['photo'];
      $profile_image = "";
    }
  else
  {
    if(($_FILES['profile_pic']['type'] == "image/jpeg")
    ||($_FILES['profile_pic']['type'] == "image/jpg")
    ||($_FILES['profile_pic']['type'] == "image/gif")
    ||($_FILES['profile_pic']['type'] == "image/png"))
    {
        $job_image = preg_replace('/\s+/','-',$image);

        //If file exist change the name start
        if(file_exists('../uploads/student-profile_pic/'.$image))
        {

          $actual_name = pathinfo($image,PATHINFO_FILENAME);
          $original_name = $actual_name;
          $extension = pathinfo($image,PATHINFO_EXTENSION);
        
          $i = 1;
          while(file_exists('../uploads/student-profile_pic/'.$actual_name.".".$extension))
          {
              $actual_name = (string)$original_name."(".$i.")";
              $img_name = $actual_name.".".$extension;
              $i++;
          }
           $profile_image = $img_name;
           
        }
        else{
           $profile_image = $image;
        }
          //If file exist change the name end

          move_uploaded_file($_FILES['profile_pic']['tmp_name'],'../uploads/student-profile_pic/'.$profile_image);
      }
      else{
          $msg = "<div class='alert alert-danger'><button type='button' class='close' data-dismiss='alert'>×</button>Image must be in JPG, GIF or PNG Format.</div>";
      }
    }        
      //File Processing End.

    // echo "UPDATE student_details SET student_fname=?,student_lname=?, username=?,student_email=?, username=?,student_email=?, student_photo=?, contact=?,	student_address=?, country=?, state=?, city=?,date_modified=? WHERE id = '$student_id'";
    // die;
    $sql = $conn->prepare("UPDATE student_details SET student_fname=?,student_lname=?, student_dob=?, gender=?, student_photo=?, student_address=?, country=?, state=?, city=?,date_modified=? WHERE id = '$student_id'");

    $sql->bind_param("ssssssssss",$fname,$lname,$dob,$gender, $profile_image, $address,$country,$state,$city,$date_modified);

    $sql->execute();

   if($conn->affected_rows ==1){
   	header('location:'.$web.'student/profile.php?msg=success');
   }else{
   	echo "Query failed";
   }

  //   if($conn->affected_row == 1){
  //   echo "data updated";
	 // }else{
	 //     echo "Query Failed";
	 // }
}

?>