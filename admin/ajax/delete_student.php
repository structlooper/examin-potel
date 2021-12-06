<?php
require_once '../../includes/config.php';
require_once '../includes/functions.php';

//fetch the package details and fill the edit form fields when update package button will be clicked on packages.php page and send that form back....

if(isset($_POST['delete_student'])){
    $student_id = mysqli_real_escape_string($conn,$_POST['student_id']);
    $eventData_arr = array();

    //fetch data from tbl_event table related to this event id..
    $query = "DELETE FROM student_details WHERE id ='$student_id'";

    //echo $query;
    $result = mysqli_query($conn,$query);
    if(!$result){
        echo "error found ".mysqli_error($conn);
    }
    echo json_encode($result);
}
