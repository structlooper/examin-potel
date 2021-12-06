<?php
  session_start();
  include "../includes/config.php";
     $student_id = $_SESSION['student_login']["id"];

     if(isset($_GET['study_id']) && $_GET['study_id']!=''){   
            $study_id = $_GET['study_id'];
            $category_id = $_GET['category_id'];

        $query = "SELECT * FROM study_material WHERE id = '$study_id' AND category_id = '$category_id'";
        $result = mysqli_query($conn, $query);

        if(mysqli_num_rows($result) > 0){
            while($all_book_details = mysqli_fetch_assoc($result)){
            $book_pdf = $all_book_details['study_file'];
            }
            $_SESSION['status'] = "You Can Download it";
            $_SESSION['status_code'] = "success";
            header("location:{$hostname}/student/study_material.php?book_pdf=$book_pdf&category_id=$category_id");
            }else{
             echo "No Data Found";
            }  
        }
   ?>