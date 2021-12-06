<?php 
   include "../includes/config.php";
    // if($_SESSION["user_role"] == '0'){
    //  header("location:{$hostname}/admin/post.php");
    //  }
      
	      if(isset($_POST['add_study_mat'])){
             
          if(isset($_FILES['upload_pdf'])){
            $errors = array();
            
            $file_name = $_FILES['upload_pdf']['name'];
            $file_size = $_FILES['upload_pdf']['size'];
            $file_tmp = $_FILES['upload_pdf']['tmp_name'];
            $file_type = $_FILES['upload_pdf']['type'];
            $file_ext = end(explode(".",$file_name));
            $extensions = array("pdf","PDF");
            if(in_array($file_ext,$extensions) === false)
             {
            $errors[] = "This extension file not allowed, Please choose a PDF file.";
             }
            if($file_size > 10485760){      //2097152
              $rerrors[] = "File size must be 10mb or lower.";
              $_SESSION['status'] = "File size must be 10mb or lower!";
              $_SESSION['status_code'] = "error";
              header("location:{$hostname}/admin/study_material.php");
              }
              if(empty($errors) == true){
                move_uploaded_file($file_tmp,"study_material/".$file_name);
              }else{
              print_r($errors);
              header("location:{$hostname}/admin/study_material.php");
              die();
              }
              

        $study_material = mysqli_real_escape_string($conn,$_POST['study_material']);
        $select_category_id = mysqli_real_escape_string($conn,$_POST['select_category']);
        $class_id = mysqli_real_escape_string($conn,$_POST['className']);
        $subject_id = mysqli_real_escape_string($conn,$_POST['subjectName']); 

        $sql3 = "SELECT * FROM category WHERE category_id = '$select_category_id'";
        $result3 = mysqli_query($conn, $sql3) or die("Query Failed.");
         $row3 = mysqli_fetch_assoc($result3);
          $category_name = $row3['category_name'];

          $sql6 = "SELECT * FROM subject WHERE classs_id = '$class_id' AND id = '$subject_id'";
          $result6 = mysqli_query($conn, $sql6) or die("Query Failed.");
           $row6 = mysqli_fetch_assoc($result6);
            $class_name = $row6['class_name'];
            $subject_name = $row6['subject_name'];

            
          date_default_timezone_set("Asia/Kolkata");
          $posting_date = Date('Y-m-d h:i:s');
          $status = 1;

         $sql = "SELECT * FROM study_material WHERE study_material_name = '$news_name' AND class_id = '$class_id' AND subject_id = '$subject_id' AND category_id = '$select_category_id'";
		
          $result = mysqli_query($conn, $sql) or die("Query Failed.");

          if(mysqli_num_rows($result) > 0){
            $_SESSION['status'] = "This news already Exists!";
            $_SESSION['status_code'] = "error";
            header("location:{$hostname}/admin/study_material.php");
            // echo "<p style='color:red;text-align:center;margin:10px 0px;'>Class Name already Exists.</p>";
           }else {
                    $sql1 = "INSERT INTO study_material (study_material_name, class_id, class_name, subject_id, subject_name, category_id, category_name, study_file,created_date,status) VALUES ('$study_material','$class_id','$class_name','$subject_id','$subject_name','$select_category_id','$category_name','$file_name','$posting_date','$status')";
                    if(mysqli_query($conn,$sql1)){
                      $_SESSION['status'] = "Study Material Add Successfully";
                      $_SESSION['status_code'] = "success";
                      header("location:{$hostname}/admin/study_material.php");
                    }
          }
        }
        // end of file upload funtion

      }


    // Edit & Update Product Details 

      if(isset($_POST['hidden_study_material_id'])){

        if(empty($_FILES['update_upload_pdf']['name'])){
          $file_name = $_POST['old_pdf'];
        }else{
          $errors = array();
          
          $file_name = $_FILES['update_upload_pdf']['name'];
          $file_size = $_FILES['update_upload_pdf']['size'];
          $file_tmp = $_FILES['update_upload_pdf']['tmp_name'];
          $file_type = $_FILES['update_upload_pdf']['type'];
          $file_ext = end(explode(".",$file_name));
          $extensions = array("pdf","PDF");
          if(in_array($file_ext,$extensions) === false)
          {
            $errors[] = "This extension file not allowed, Please choose a PDF file.";
          }
          if($file_size > 10485760){
            $rerrors[] = "File size must be 10mb or lower.";
            $_SESSION['status'] = "File size must be 2mb or lower!";
            $_SESSION['status_code'] = "error";
            header("location:{$hostname}/admin/study_material.php");
            }
            if(empty($errors) == true){
              move_uploaded_file($file_tmp,"study_material/".$file_name);
            }else{
            print_r($errors);
            header("location:{$hostname}/admin/study_material.php");
            die();
            }
          }
          
        $hidden_study_material_id = mysqli_real_escape_string($conn,$_POST['hidden_study_material_id']); 
        $update_study_material = mysqli_real_escape_string($conn,$_POST['update_study_material']); 
        $update_category_id = mysqli_real_escape_string($conn,$_POST['update_select_category']); 
        $update_class_id = mysqli_real_escape_string($conn,$_POST['update_className']); 
        $update_subject_id = mysqli_real_escape_string($conn,$_POST['update_subjectName']); 

        $sql4 = "SELECT * FROM category WHERE category_id = '$update_category_id'";
        $result4 = mysqli_query($conn, $sql4) or die("Query Failed.");
         $row4 = mysqli_fetch_assoc($result4);
          $update_category_name = $row4['category_name'];

          $sql7 = "SELECT * FROM subject WHERE id = '$update_subject_id' AND classs_id = '$update_class_id'";
          $result7 = mysqli_query($conn, $sql7) or die("Query Failed.");
           $row7 = mysqli_fetch_assoc($result7);
            $update_class_name = $row7['class_name'];
            $update_subject_name = $row7['subject_name'];

      //Update old class name with the new one in this id...
      $query = "UPDATE study_material SET study_material_name = '$update_study_material', category_id ='$update_category_id', category_name = '$update_category_name', study_file ='$file_name', class_id = '$update_class_id', class_name = '$update_class_name', subject_id = '$update_subject_id', subject_name = '$update_subject_name' WHERE id = '$hidden_study_material_id'";
      $update = mysqli_query($conn,$query);
      if($conn->affected_rows == 1){
        $_SESSION['status'] = "Data Update Successfully";
        $_SESSION['status_code'] = "success";
        echo "Data Updated Successfully";
        header("location:{$hostname}/admin/study_material.php");
      }else{
        // $_SESSION['status'] = "Data not updated";
        // $_SESSION['status_code'] = "error";
        header("location:{$hostname}/admin/study_material.php");
      }

    }
    
?>