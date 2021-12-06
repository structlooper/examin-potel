<?php 
   include "../includes/config.php";
    // if($_SESSION["user_role"] == '0'){
    //  header("location:{$hostname}/admin/post.php");
    //  }
      
	       if(isset($_POST['gems_e_agriedu_save'])){
             
          if(isset($_FILES['upload_image'])){
            $errors = array();
            
            $file_name = $_FILES['upload_image']['name'];
            $file_size = $_FILES['upload_image']['size'];
            $file_tmp = $_FILES['upload_image']['tmp_name'];
            $file_type = $_FILES['upload_image']['type'];
            $file_ext = end(explode(".",$file_name));
            $extensions = array("jpeg","jpg","png");
            if(in_array($file_ext,$extensions) === false)
             {
            $errors[] = "This extension file not allowed, Please choose a JPG or PNG file.";
             }
            if($file_size > 2097152){
              $rerrors[] = "File size must be 2mb or lower.";
              $_SESSION['status'] = "File size must be 10mb or lower!";
              $_SESSION['status_code'] = "error";
              header("location:{$hostname}/admin/gems_of_e_AgriEdu.php");
              }
              if(empty($errors) == true){
                move_uploaded_file($file_tmp,"latest_news/gems_e_agriedu/".$file_name);
              }else{
              print_r($errors);
              header("location:{$hostname}/admin/gems_of_e_AgriEdu.php");
              die();
              }
              

        $Gems_e_AgriEdu = mysqli_real_escape_string($conn,$_POST['Gems_e_AgriEdu']);
        $postion_title = mysqli_real_escape_string($conn,$_POST['postion_title']); 

        $status = 1;
        date_default_timezone_set("Asia/Kolkata");
        $create_date = Date('Y-m-d H:i:s');

         $sql = "SELECT * FROM gems_e_agriedu WHERE gems_e_agriedu_title = '$Gems_e_AgriEdu'";

          $result = mysqli_query($conn, $sql) or die("Query Failed.");

          if(mysqli_num_rows($result) > 0){
            $_SESSION['status'] = "This Image Name already Exists!";
            $_SESSION['status_code'] = "error";
            header("location:{$hostname}/admin/gems_e_agriedu.php");
            // echo "<p style='color:red;text-align:center;margin:10px 0px;'>Class Name already Exists.</p>";
           }else {
                    $sql1 = "INSERT INTO gems_e_agriedu (gems_e_agriedu_title, position, created_date, update_date, gems_e_agriedu_file, status) VALUES ('$Gems_e_AgriEdu','$postion_title','$create_date','$create_date','$file_name','$status')";
                    if(mysqli_query($conn,$sql1)){
                      $_SESSION['status'] = "Image Details Add Successfully";
                      $_SESSION['status_code'] = "success";
                      header("location:{$hostname}/admin/gems_of_e_AgriEdu.php");
                    }
          }
        }
        // end of file upload funtion

      }


    // Edit & Update Image Details 

      if(isset($_POST['hidden_Gems_e_AgriEdu_id'])){
 
        if(empty($_FILES['update_upload_image']['name'])){
          $file_name = $_POST['old_image'];
        }else{
          $errors = array();
          
          $file_name = $_FILES['update_upload_image']['name'];
          $file_size = $_FILES['update_upload_image']['size'];
          $file_tmp = $_FILES['update_upload_image']['tmp_name'];
          $file_type = $_FILES['update_upload_image']['type'];
          $file_ext = end(explode(".",$file_name));
          $extensions = array("jpeg","jpg","png");
            if(in_array($file_ext,$extensions) === false)
             {
            $errors[] = "This extension file not allowed, Please choose a JPG or PNG file.";
             }
            if($file_size > 2097152){
            $rerrors[] = "File size must be 2mb or lower.";
            $_SESSION['status'] = "File size must be 2mb or lower!";
            $_SESSION['status_code'] = "error";
            header("location:{$hostname}/admin/gems_of_e_AgriEdu.php");
            }
            if(empty($errors) == true){
              move_uploaded_file($file_tmp,"latest_news/gems_e_agriedu/".$file_name);
            }else{
            print_r($errors);
            header("location:{$hostname}/admin/gems_of_e_AgriEdu.php");
            die();
            }
          }
      
        $hidden_Gems_e_AgriEdu_id = mysqli_real_escape_string($conn,$_POST['hidden_Gems_e_AgriEdu_id']); 
        $update_Gems_e_AgriEdu = mysqli_real_escape_string($conn,$_POST['update_Gems_e_AgriEdu']);
        $update_position_title = mysqli_real_escape_string($conn,$_POST['update_postion_title']);
  
        date_default_timezone_set("Asia/Kolkata");
        $update_date = Date('Y-m-d H:i:s');

      //Update old class name with the new one in this id...
      $query = "UPDATE gems_e_agriedu SET gems_e_agriedu_title = '$update_Gems_e_AgriEdu', position= '$update_position_title', update_date ='$update_date', gems_e_agriedu_file ='$file_name' WHERE id = '$hidden_Gems_e_AgriEdu_id'";
      $update = mysqli_query($conn,$query);
      if($conn->affected_rows == 1){
        $_SESSION['status'] = "Data Update Successfully";
        $_SESSION['status_code'] = "success";
        echo "Data Updated Successfully";
        header("location:{$hostname}/admin/gems_of_e_AgriEdu.php");
      }else{
        // $_SESSION['status'] = "Data not updated";
        // $_SESSION['status_code'] = "error";
        header("location:{$hostname}/admin/gems_of_e_AgriEdu.php");
      }

    }
    
?>