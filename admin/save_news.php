<?php 
   include "../includes/config.php";
    // if($_SESSION["user_role"] == '0'){
    //  header("location:{$hostname}/admin/post.php");
    //  }
      
	       if(isset($_POST['add_news'])){
             
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
              header("location:{$hostname}/admin/add_news.php");
              }
              if(empty($errors) == true){
                move_uploaded_file($file_tmp,"latest_news/".$file_name);
              }else{
              print_r($errors);
              header("location:{$hostname}/admin/add_news.php");
              die();
              }
              

        $news_title = mysqli_real_escape_string($conn,$_POST['news_title']); 
        $description = mysqli_real_escape_string($conn,$_POST['description']);
        
        $status = 1;
        date_default_timezone_set("Asia/Kolkata");
        $news_created = Date('Y-m-d H:i:s');

         $sql = "SELECT * FROM latest_news WHERE news_title = '$news_title'";

          $result = mysqli_query($conn, $sql) or die("Query Failed.");

          if(mysqli_num_rows($result) > 0){
            $_SESSION['status'] = "This Image Name already Exists!";
            $_SESSION['status_code'] = "error";
            header("location:{$hostname}/admin/add_news.php");
            // echo "<p style='color:red;text-align:center;margin:10px 0px;'>Class Name already Exists.</p>";
           }else {
                    $sql1 = "INSERT INTO latest_news (news_title, description, news_file, created_date,status) VALUES ('$news_title','$description','$file_name','$news_created','$status')";
                    if(mysqli_query($conn,$sql1)){
                      $_SESSION['status'] = "Image Details Add Successfully";
                      $_SESSION['status_code'] = "success";
                      header("location:{$hostname}/admin/add_news.php");
                    }
          }
        }
        // end of file upload funtion

      }


    // Edit & Update Image Details 

      if(isset($_POST['hidden_news_id'])){
 
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
            header("location:{$hostname}/admin/add_news.php");
            }
            if(empty($errors) == true){
              move_uploaded_file($file_tmp,"latest_news/".$file_name);
            }else{
            print_r($errors);
            header("location:{$hostname}/admin/add_news.php");
            die();
            }
          }
      
        $hidden_news_id = mysqli_real_escape_string($conn,$_POST['hidden_news_id']); 
        $update_news_title = mysqli_real_escape_string($conn,$_POST['update_news_title']);
        $update_description = mysqli_real_escape_string($conn,$_POST['update_description']); 

      //Update old class name with the new one in this id...
      $query = "UPDATE latest_news SET news_title = '$update_news_title', description ='$update_description', news_file ='$file_name' WHERE id = '$hidden_news_id'";
      $update = mysqli_query($conn,$query);
      if($conn->affected_rows == 1){
        $_SESSION['status'] = "Data Update Successfully";
        $_SESSION['status_code'] = "success";
        echo "Data Updated Successfully";
        header("location:{$hostname}/admin/add_news.php");
      }else{
        // $_SESSION['status'] = "Data not updated";
        // $_SESSION['status_code'] = "error";
        header("location:{$hostname}/admin/add_news.php");
      }

    }
    
?>