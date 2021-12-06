<?php 
ob_start();
error_reporting(0);
// require_once 'includes/config.php';
require_once '../includes/config.php';
require_once '../includes/functions.php';
$web = web; //path of the root folder..

if(isset($_POST['add_comingSoon'])){
    $title = get_safe_value($conn,$_POST['comingSoontitle']);

	$time = get_safe_value($conn,$_POST['comingSoontime']);
    $date = get_safe_value($conn,$_POST['comingSoonDate']);
	$status = 1; 

    //File Processing
        $comingsoon_img = $_FILES['image']['name'];
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
                $comingsoon_image = preg_replace('/\s+/','-',$comingsoon_img);
                $image_name = time()."_".$comingsoon_image;
                  

                move_uploaded_file($_FILES['image']['tmp_name'],'../uploads/coming_soon/'.$image_name);
            }
            else{
                $msg = "<div class='alert alert-danger'><button type='button' class='close' data-dismiss='alert'>×</button>Image must be in JPG, GIF or PNG Format.</div>";
            }
        }        
        //File Processing End.   
        //echo "INSERT INTO blog(blog_cat_id,title,short_desc,long_desc,image,post_date,status)VALUES('$blog_cat_id','$blog_title','$short_description','$long_description','$image_name','$post_date','$status')";

    $sql = "INSERT INTO comming_soon(title,coming_date,comming_time,image,status)VALUES('$title','$date','$time','$image_name','$status')";

	 if(mysqli_query($conn,$sql)){

		header("location:".$web."admin/coming-soon.php?msg=success");
	}else{

       echo "Error: " . $sql . "<br>" . mysqli_error($conn);
		//header("location".$web."/admin/blog.php?msg=error");
	}

}



if(isset($_POST['update_comningsoon'])){
	$id = get_safe_value($conn,$_POST['event_id']);
    $title = get_safe_value($conn,$_POST['comingSoontitle']);
	$time = get_safe_value($conn,$_POST['update_time']);
	$date = get_safe_value($conn,$_POST['update_date']);

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
               
            

                move_uploaded_file($_FILES['image']['tmp_name'],'../uploads/coming_soon/'.$image_name);
            }
            else{
                $msg = "<div class='alert alert-danger'><button type='button' class='close' data-dismiss='alert'>×</button>Image must be in JPG, GIF or PNG Format.</div>";
            }
        }        
        //File Processing End.
        $sql = "UPDATE  comming_soon SET title='$title',coming_date='$date',comming_time='$time',image='$image_name' WHERE id='$id'";

         if(mysqli_query($conn,$sql)){

        header("location:".$web."admin/coming-soon.php?msg=updated");
    }else{

       echo "Error: " . $sql . "<br>" . mysqli_error($conn);
       header("location".$web."/admin/coming-soon.php?msg=error");
    }

}

?>