<?php
// require 'dbconfig.php';
// function checkuser($fuid,$ffname,$femail){
//     	$check = mysql_query("select * from Users where Fuid='$fuid'");
// 	$check = mysql_num_rows($check);
// 	if (empty($check)) { // if new user . Insert a new record		
// 	$query = "INSERT INTO User (Fuid,Ffname,Femail) VALUES ('$fuid','$ffname','$femail')";
// 	mysql_query($query);	
// 	} else {   // If Returned user . update the user record		
// 	$query = "UPDATE Users SET Ffname='$ffname', Femail='$femail' where Fuid='$fuid'";
// 	mysql_query($query);
// 	}
// }

function readMoreHelper($longDescription, $chars = 100){
   $story_desc = substr($longDescription,0,$chars);
   $story_desc = substr($story_desc,0,strpos($story_desc,'.'));
   $story_desc = $story_desc."<a href='#'>Read More</a>";
   return $story_desc;    
} 


?>