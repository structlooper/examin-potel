<?php
require_once '../../includes/config.php';

header('Content-Type: application/json');

if(isset($_GET['exam_id'])){
	$examID = $_GET['exam_id'];
	$data_points = array();
    
    $result = mysqli_query($con, "SELECT * FROM top_scores where exam_id='$examID' ORDER BY score desc limit 10");
    
    while($row = mysqli_fetch_array($result))
    {        
        $point = array("label" => $row['student_name'] , "y" => $row['score']);
        
        array_push($data_points, $point);        
    }
    
    echo json_encode($data_points, JSON_NUMERIC_CHECK);

mysqli_close($con);
}


?>