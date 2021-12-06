<?php 
require_once '../../includes/config.php';
require_once '../includes/functions.php';

//fetch the package details and fill the edit form fields when update package button will be clicked on packages.php page and send that form back....

if(isset($_POST['comming_soon_id'])){

  $id = mysqli_real_escape_string($conn,$_POST['comming_soon_id']);
  $commingSoonData_arr = array();

   //fetch data from tbl_event table related to this event id..
  $sql = $conn->prepare("SELECT * FROM `comming_soon` WHERE `id`=?");
  $sql->bind_param('i', $id);
  $sql->execute();
  $result = $sql->get_result();
  while($commingsoonData = $result->fetch_assoc()){

    $commingSoonData_arr[] = $commingsoonData;
  }

  //print_r($commingSoonData_arr);
  //encode array to json format
  echo json_encode($commingSoonData_arr);

    }
?>