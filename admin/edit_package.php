<?php 
//require_once 'includes/config.php';
require_once '../includes/config.php';
require_once 'includes/functions.php';

//fetch the package details and fill the edit form fields when update package button will be clicked on packages.php page and send that form back....

if(isset($_POST['package_id'])){

  $package_id = mysqli_real_escape_string($conn,$_POST['package_id']);
  $packageData_arr = array();

   //fetch data from package table related to this package id..
  $sql = $conn->prepare("SELECT * FROM `exam_packages` WHERE `package_id`=?");
  $sql->bind_param('i', $package_id);
  $sql->execute();
  $result = $sql->get_result();
  while($packageData = $result->fetch_assoc()){

    $packageData_arr[] = $packageData;
  }

  //print_r($questionData_arr);
  //encode array to json format
  echo json_encode($packageData_arr);

    }
?>