  
   <?php
     include "../includes/config.php";
     
    $news_id = $_GET['id'];
    
    $sql = "DELETE FROM gems_e_agriedu WHERE id = {$news_id}";
    
    
     if(mysqli_query($conn, $sql)){
       
        $_SESSION['status'] = "Data Deleted Successfully";
        $_SESSION['status_code'] = "success";
       header("location:{$hostname}/admin/gems_of_e_AgriEdu.php");
       }else{
              // echo "<p style='color:red;text-align:center;margin:10px 0px;'>Can't Delete the User Record.</p>";
              $_SESSION['status'] = "Can't Delete the User Record.";
              $_SESSION['status_code'] = "error";
              header("location:{$hostname}/admin/gems_of_e_AgriEdu.php");
          }
      mysqli_close($conn);
    ?>
    
    
    