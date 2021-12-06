<?php 
	require_once '../../includes/config.php';

	//Getting checked box ids to Delete subject from subject table by ajax call..
	if(isset($_POST['id'])){
		$check_ids = $_POST['id'];
		$table_name = $_POST['tableName'];

		foreach($check_ids as $id){
		//Delete Checked Records..
		$query = "DELETE FROM $table_name WHERE id ='$id'";

		//echo $query;
		$result = mysqli_query($conn,$query);
		if(!$result){
			echo "error found ".mysqli_error($conn);
		}
	}
	}
	//Getting checked box ids to Delete subject from subject table by ajax call END..


	if(isset($_POST['classid'])){
		$class_id = $_POST['classid'];
		$className = $_POST['className'];
		$subject_id = $_POST['update_subject_id'];
		$subject_name = $_POST['subject_name'];
		$table_name = $_POST['tableName'];
		

		//before update check if the classname and subject name already exist or not..
		$selexistingData = "SELECT * FROM subject WHERE class_name='$className' AND subject_name='$subject_name'";
		$res = mysqli_query($conn,$selexistingData);
		if($count = mysqli_num_rows($res) > 0){			
			$getData = mysqli_fetch_assoc($res);
			if($subject_id == $getData['id']){
				echo 1;
			}else{
				echo 0;
			}
		}else{
			//Update subject by getting id from edit box modal...
			$query = "UPDATE $table_name SET subject_name = '$subject_name', class_name='$className',classs_id='$class_id' WHERE id = '$subject_id'";
			
			$update = mysqli_query($conn,$query);
			if(!$update){
				echo "error found ".mysqli_error($conn);
			}

			if($conn->affected_rows == 1){
				echo 1;
			}
		}
		

		// //Update subject by getting id from edit box modal...
		// $query = "UPDATE $table_name SET subject_name = '$subject_name', class_name='$className',classs_id='$class_id' WHERE id = '$subject_id'";
		
		// $update = mysqli_query($conn,$query);
		// if(!$update){
		// 	echo "error found ".mysqli_error($conn);
		// }

		// if($conn->affected_rows == 1){
		// 	echo "Subject Updated";
		// }
	}


	//Update Chapter Details START.....
	if(isset($_POST['chapter_id'])){
		$class_id = $_POST['update_classid'];
		$className = $_POST['className'];
		$subject_id = $_POST['subject1_id'];
		$subject_name = $_POST['subject_name'];
		$chapter_id = $_POST['chapter_id'];
		$chapter_name = $_POST['chapter_name'];
		$table_name = $_POST['tableName'];

		//Update subject by getting id from edit box modal...
		$query = "UPDATE $table_name SET chapter_name = '$chapter_name', class_name='$className',class_id='$class_id', subject_name ='$subject_name',subject_id='$subject_id' WHERE id = '$chapter_id'";
		
		$update = mysqli_query($conn,$query);
		if(!$update){
			echo "error found ".mysqli_error($conn);
		}

		if($conn->affected_rows == 1){
			echo "Chapter Updated ";
		}
	}
	//Update Chapter Details END.....

	//This code is used in creating exam to run ajax on selecting class and according to class  subject and chapter name apears in dropdown START..
	if(isset($_POST["class_id"])){
    //Get all subject data
	$class_id= $_POST['class_id'];
    $query = "SELECT * FROM subject WHERE classs_id = '$class_id' 
	ORDER BY subject_name ASC";
	$run_query = mysqli_query($conn,$query);
    
    //Count total number of rows
    $count = mysqli_num_rows($run_query);
    
    //Display class list
    if($count > 0){
        echo '<option value="" selected disabled>Select Subject</option>';
        while($row = mysqli_fetch_array($run_query)){
		$subject_id=$row['id'];
		$subject_name=$row['subject_name'];
        echo "<option value='$subject_id'>$subject_name</option>";
        }
    }else{
        echo '<option value="" selected disabled>Subject not available</option>';
    }
}

if(isset($_POST["subject_id"])){
	$subject_id= $_POST['subject_id'];
    //Get all chapter data
    $query = "SELECT * FROM chapter WHERE subject_id = '$subject_id' 
	ORDER BY chapter_name ASC";
    $run_query = mysqli_query($conn, $query);
    //Count total number of rows
    $count = mysqli_num_rows($run_query);
    
    //Display chapter list
    if($count > 0){
        echo '<option value="" selected disabled>Select chapter</option>';
        while($row = mysqli_fetch_array($run_query)){
		$chapter_id=$row['id'];
		$chapter_name=$row['chapter_name']; 
        echo "<option value='$chapter_id'>$chapter_name</option>";
        }
    }else{
        echo '<option value="">Chapter not available</option>';
    }
}

//This code is used in creating exam to run ajax on selecting class and according to class  subject and chapter name apears in dropdown END.. 


//When user will select the chapter then fetch all questions related to that chapter START.
if(isset($_POST["chapterID"])){
	$chapter_id= $_POST['chapterID'];
    //Get all Questions chapter wise..
    $query = "SELECT * FROM questions WHERE chapter_id = '$chapter_id' AND status = 1
	ORDER BY id ASC";
    $run_query = mysqli_query($conn, $query);
    //Count total number of rows
    $count = mysqli_num_rows($run_query);
    
    //Display chapter list
    if($count > 0){
    	$data = [];
        //echo '<option disabled>Select questions</option>';
        while($question_list = mysqli_fetch_array($run_query)){
         $question;

        //Find and seperate contactnated question and image coming from database..
        $find = "img-";  
            if(strpos($question_list['question'],$find) !== false){
              
              $last_space = strrpos($question_list['question'],'img-');
              $last_word = substr($question_list['question'], $last_space);
              $question = substr($question_list['question'], 0, $last_space);

              $img_pos =  strrpos($last_word,'-');
              $img_pos = $img_pos+1;
              $img_name = substr($last_word, $img_pos);
            }else{
              $question = strip_tags($question_list['question']);
            }	
		$question_id=$question_list['id']; 
         //echo "<input type='checkbox' value='$question_id'><option value='$question_id'>$question</option>";
		 array_push($data,json_encode(['question'=>$question,'questionId' => $question_id]));
        }
        echo json_encode($data);
    }else{
        echo "No Questions Found";
    }
}
//When user will select the chapter then fetch all questions related to that chapter END.

//Code Section to bring the questions related to the IDs provided in Ajax call on edit exam module inside fetch_question jquery function START..
if(isset($_POST['question_IDs'])){
	$question_IDs = $_POST['question_IDs'];
	
	//Get Question based on the IDS coming in $question_IDs variable.
	$query = "SELECT * FROM questions WHERE id IN($question_IDs)";
	$run_query = mysqli_query($conn, $query);
    //Count total number of rows
    $count = mysqli_num_rows($run_query);
    if($count>0){
    //echo '<option disabled>Select questions</option>';
        while($question_list = mysqli_fetch_array($run_query)){
        $question_id=$question_list['id']; 
        $question = $question_list['question'];
         //echo "<input type='checkbox' value='$question_id'><option value='$question_id'>$question</option>";
		echo "<label class='DropDownContainer'>$question
              <input class='ItemsCheckBox ClearCheckBox check' DropDownId='$question_id' value='$question' type='checkbox' name='question_chkbx' id='$question_id' checked><span class='checkmark'></span>             
            </label> ";
        }
    }else{
    	echo "No Questions Found";
    }
}
?>