<?php 
ob_start();
error_reporting(0);
// require_once 'includes/config.php';
require_once '../includes/config.php';
require_once 'includes/functions.php';
$web = web; //path of the root folder..

if(isset($_POST['add_event'])){
    $event_name = get_safe_value($conn,$_POST['event_name']);
    $description = get_safe_value($conn,$_POST['description']);

	$event_time = get_safe_value($conn,$_POST['event_time']);
    $event_date = get_safe_value($conn,$_POST['event_date']);
    $evnt_location = get_safe_value($conn,$_POST['evnt_location']);    // echo "</br>"; 


	$status = 1; 

    //File Processing
        $event_img = $_FILES['image']['name'];
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
                $evet_image = preg_replace('/\s+/','-',$event_img);
                $image_name = time()."_".$evet_image;
                  

                move_uploaded_file($_FILES['image']['tmp_name'],'../uploads/event-img/'.$image_name);
            }
            else{
                $msg = "<div class='alert alert-danger'><button type='button' class='close' data-dismiss='alert'>×</button>Image must be in JPG, GIF or PNG Format.</div>";
            }
        }        
        //File Processing End.   
        //echo "INSERT INTO blog(blog_cat_id,title,short_desc,long_desc,image,post_date,status)VALUES('$blog_cat_id','$blog_title','$short_description','$long_description','$image_name','$post_date','$status')";

    $sql = "INSERT INTO tbl_events(title,description,image,event_date,event_time,event_location,status)VALUES('$event_name','$description','$image_name','$event_date', '$event_time','$evnt_location','$status')";

	 if(mysqli_query($conn,$sql)){

		header("location:".$web."admin/events.php?msg=success");
	}else{

       echo "Error: " . $sql . "<br>" . mysqli_error($conn);
		//header("location".$web."/admin/blog.php?msg=error");
	}

}



if(isset($_POST['update_event'])){
	$event_id = get_safe_value($conn,$_POST['event_id']);
    $event_name = get_safe_value($conn,$_POST['update_eventName']);
	$description = get_safe_value($conn,$_POST['update_description']);
	$start_time = get_safe_value($conn,$_POST['update_start_time']);
	$start_date = get_safe_value($conn,$_POST['update_start_date']);
    $event_location = get_safe_value($conn,$_POST['update_event_location']);

	//$date_modified = date("Y-m-d H:i:s");

	//File Processing
        $event_img = $_FILES['image']['name'];
        
        if(empty($_FILES['image']['tmp_name']))
        {
            //$package_image = "";
            echo $image_name = $_POST['hidden_image'];
            
        }
        else
        {
            if(($_FILES['image']['type'] == "image/jpeg")
            ||($_FILES['image']['type'] == "image/jpg")
            ||($_FILES['image']['type'] == "image/gif")
            ||($_FILES['image']['type'] == "image/png"))
            {
                $evet_image = preg_replace('/\s+/','-',$event_img);
                $image_name = time()."_".$evet_image;
               
            

                move_uploaded_file($_FILES['image']['tmp_name'],'../uploads/event-img/'.$image_name);
            }
            else{
                $msg = "<div class='alert alert-danger'><button type='button' class='close' data-dismiss='alert'>×</button>Image must be in JPG, GIF or PNG Format.</div>";
            }
        }        
        //File Processing End.
        $sql = "UPDATE  tbl_events SET title='$event_name',description='$description',image='$image_name',event_date='$start_date',event_time='$start_time',event_location='$event_location'WHERE id='$event_id'";

         if(mysqli_query($conn,$sql)){

        header("location:".$web."admin/events.php?msg=updated");
    }else{

       echo "Error: " . $sql . "<br>" . mysqli_error($conn);
       header("location".$web."/admin/events.php?msg=error");
    }

}

?>