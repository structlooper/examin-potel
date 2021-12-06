<?php 
require_once '../includes/config.php';
require_once '../includes/functions.php';

//fetch the package details and fill the edit form fields when update package button will be clicked on packages.php page and send that form back....

if(isset($_POST['category_id'])){

  $category_id = mysqli_real_escape_string($conn,$_POST['category_id']);
  $catData_arr = array();

   //fetch data from package table related to this package id..
  $sql = $conn->prepare("SELECT * FROM `blog_category` WHERE `id`=?");
  $sql->bind_param('i', $category_id);
  $sql->execute();
  $result = $sql->get_result();
  while($catData = $result->fetch_assoc()){

    $catData_arr[] = $catData;
  }

  //print_r($questionData_arr);
  //encode array to json format
  echo json_encode($catData_arr);

    }
?>