<?php

  include("config.php");
  session_start();

  if(!isset($_SESSION['active_user_id']) && !isset($_SESSION['active_user_username'])){
    session_unset();
    session_destroy(); // destroy any other existing sessions
    header("location: index.php"); // redirect users back to login page
  }
  if(isset($_POST['oname']) && isset($_POST['cname']) && isset($_POST['sub_id'])){
  	$course = $_POST['oname'];
  	$code = $_POST['cname'];
  	$id = $_POST['sub_id'];
  	echo $course;
  	echo $code;
  	echo $id;
	$update_class = "UPDATE subject SET subject_name='".$course."', subject_code='".$code."' WHERE subject_id=".$id;
	echo mysqli_query($conn, $update_class) ? header("location: class.php") : "Failed to update database";
    // change true value of above ternary operation to redirect to previous class
  }else{
  	echo "No parameter is passed";
  }
?>
