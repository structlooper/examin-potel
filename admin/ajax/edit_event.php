<?php 
require_once '../../includes/config.php';
require_once '../includes/functions.php';

//fetch the package details and fill the edit form fields when update package button will be clicked on packages.php page and send that form back....

if(isset($_POST['event_id'])){

  $event_id = mysqli_real_escape_string($conn,$_POST['event_id']);
  $eventData_arr = array();

   //fetch data from tbl_event table related to this event id..
  $sql = $conn->prepare("SELECT * FROM `tbl_events` WHERE `id`=?");
  $sql->bind_param('i', $event_id);
  $sql->execute();
  $result = $sql->get_result();
  while($eventData = $result->fetch_assoc()){

    $eventData_arr[] = $eventData;
  }

  //print_r($questionData_arr);
  //encode array to json format
  echo json_encode($eventData_arr);

    }
?>