<?php 
    session_start();
    // $hostname = "http://localhost/exam";
    // $conn= mysqli_connect('localhost','root','','examin')or die("Could not connect to mysql".mysqli_error($conn));
	// define("web","http://localhost/exam/");
	// date_default_timezone_set('Asia/Kolkata');

	$hostname = "https://influencorp.com/exam";
	$conn = mysqli_connect("localhost","influanco_ExaminDatabase","fM9PjqKFTj","influanco_ExaminDatabase") or die("Connection Faild :". mysqli_connect_error());
	define('web','https://influencorp.com/exam/');
    define('from_mail','deepaksoftonicsolutions@gmail.com');
	date_default_timezone_set('Asia/Kolkata');

?>