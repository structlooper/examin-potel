<?php 
require_once '../includes/config.php';
require_once 'includes/functions.php';

//fetch the package details and fill the edit form fields when update package button will be clicked on packages.php page and send that form back....

if(isset($_POST['blog_id'])){

  $blog_id = mysqli_real_escape_string($conn,$_POST['blog_id']);
  $blogData_arr = array();

   //fetch data from package table related to this package id..
  $sql = $conn->prepare("SELECT * FROM `blog` WHERE `id`=?");
  $sql->bind_param('i', $blog_id);
  $sql->execute();
  $result = $sql->get_result();
  while($blogData = $result->fetch_assoc()){

    $blogData_arr[] = $blogData;
  }

  //print_r($questionData_arr);
  //encode array to json format
  echo json_encode($blogData_arr);

    }
?>