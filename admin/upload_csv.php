<?php
require_once '../includes/config.php';
$web = web; //path of the root folder..

$msg=null;
if(isset($_POST['submit'])){
    $class_id = $_POST['class'];
    //bring class name
    $selClassName = $conn->query("SELECT class_name FROM classes WHERE id='$class_id'");
    $class_Name = $selClassName->fetch_assoc();
    $className = $class_Name['class_name'];

    $subject_id = $_POST['subject'];
    //bring subject name 
    $selSubName = $conn->query("SELECT subject_name FROM subject WHERE id='$subject_id'");    
    $sub_Name = $selSubName->fetch_assoc();    
    $subjectName = $sub_Name['subject_name'];

    $chapter_id = $_POST['chapter'];
    //bring chapter name
    $selchapName = $conn->query("SELECT chapter_name FROM chapter WHERE id='$chapter_id'");
    $chapter_Name = $selchapName->fetch_assoc();
    $chapterName = $chapter_Name['chapter_name'];

    $data_name = $_POST['data_name'];
    $date_created = date('Y-m-d H:s:i');
    //$date_modified = date('Y-m-d H:s:i');
    // file_csv 1
    $file = $_FILES['file_csv']['name'];

    if(empty($_FILES['file_csv']['tmp_name'])) {
      $final_file_csv = "";
    }
    else {
      if (($_FILES['file_csv']['type'] == "text/csv")
      || ($_FILES['file_csv']['type'] == "application/vnd.ms-excel")
      || ($_FILES['file_csv']['type'] == "text/tsv")
      || ($_FILES['file_csv']['type'] == "text/plain")) {
      
        $cat_image = preg_replace('/\s+/', '-', $file);

        //If file exists change the name Start
        if(file_exists('../uploads/questionCsvfiles/'.$file)){
          $actual_name = pathinfo($file,PATHINFO_FILENAME);
          $original_name = $actual_name;
          $extension = pathinfo($file, PATHINFO_EXTENSION);
          
          $i = 1;
          while(file_exists('../uploads/questionCsvfiles/'.$actual_name.".".$extension))
          {           
            $actual_name = (string)$original_name.$i;
            $csvFile = $actual_name.".".$extension;
            $i++; 
          } 
          $final_file_csv=$csvFile; 
        }
        else {
          $final_file_csv=$file;
        }
        //If file exists change the name End
        
        move_uploaded_file($_FILES['file_csv']['tmp_name'],'../uploads/questionCsvfiles/'.$final_file_csv);
      }
      else
      {
        $msg = "<div class='alert alert-danger'><button type='button' class='close' data-dismiss='alert'>×</button>Image must be in CSV or Excel Format.</div>";
      }
    }

    $sql=$conn->prepare("INSERT INTO data_upload SET data_name=?, file=?,class_id=?,class_name=?,subject_id=?,subject_name=?,chapter_id=?,chapter_name=?, date_created=?");

    $sql->bind_param("ssisisiss", $data_name, $final_file_csv,$class_id,$className,$subject_id,$subjectName,$chapter_id,$chapterName, $date_created);
    $sql->execute();
    if($conn->affected_rows==1){
        $msg="<div class='alert alert-success'><button type='button' class='close' data-dismiss='alert'>×</button>Record Added Successfully.</div>";
    }

   	
    //Import .CSV file data to candidate table..

    //GET the id of last inserted record from the candidate to concatenate it with URL_KEY..
   /* $stmt = $conn->query("SELECT LAST_INSERT_ID() FROM candidates");
	$stmt->execute();
	echo $id = $stmt->last_id();
	die;*/

	$last_id_query = $conn->query("SELECT id FROM questions ORDER BY id DESC LIMIT 1");
	$last_id_data = $last_id_query->fetch_assoc();
	$last_id_value = $last_id_data['id'];

    //$file = $_FILES['file_csv']['tmp_name'];
    $file = "../uploads/questionCsvfiles/".$final_file_csv;
    $handle = fopen($file,"r");
    $c = 0;
    while(($filesop = fgetcsv($handle, 1000, ",")) !== false)
    {
    	if($c != 0){

    		$last_id_value = $last_id_value + 1;
            $status = 1;

    	    $question_type = $filesop[1];
    	    $question = $filesop[2];

    		$option_1 = $filesop[3];
    		$option_2 = $filesop[4];    		
    		$option_3 = $filesop[5];
    		$option_4 = $filesop[6];

    		$image = $filesop[7];
    		$correct_answer = $filesop[8];
    		$is_true_or_false = $filesop[9];

    		$fill_in_the_blanks = $filesop[10];
    		$explanation = $filesop[11];

    		$hint = $filesop[12];
    		$marks = $filesop[13];
    		$negative_marks = $filesop[14];
    		$difficulty_level = $filesop[15];

    		$date_created = date('Y-m-d H:i:s');

        
    		$sql = $conn->prepare("INSERT INTO questions SET question_type=?, question=?, option_1=?, option_2=?, option_3=?, option_4=?, image=?,correct_answer=?, is_true_or_false=?, fill_in_the_blanks=?, explanation=?, class_id=?, class_name=?, subject_id=?, subject_name=?, chapter_id=?, chapter_name=?, hint=?, marks=?, negative_marks=?, difficulty_level=?, status=?");

    		$sql->bind_param("ssssssssissisisissiisi", $question_type,$question, $option_1, $option_2, $option_3, $option_4, $image, $correct_answer, $is_true_or_false, $fill_in_the_blanks, $explanation, $class_id, $className, $subject_id, $subjectName, $chapter_id, $chapterName, $hint, $marks, $negative_marks, $difficulty_level, $status);
    		$sql->execute();
            		
    	}

    	$c = $c + 1;
    }
    $c = $c - 1;

    if($sql){
    	// $msg = "<div class='alert alert-success'><button type='button' class='close' data-dismiss='alert'>×</button>Your data has imported successfully. You have inserted ". $c ." records</div>";
        echo $web;
        header("location:".$web."admin/add_question.php?msg=fileuploaded");
    }else{
		$msg = "<div class='alert alert-danger'><button type='button' class='close' data-dismiss='alert'>×</button>Sorry! There is some problem.</div>";
	}


}

?>