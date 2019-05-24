<?php 

  include("config.php");

  if(isset($_GET['id'])){
  	$id = $_GET['id'];

  	echo $id;
  	$sql = "DELETE FROM subject WHERE subject_id=".$id ; 
	$conn->query($sql) === TRUE ? header("location: class.php") : "Error deleting record: " . $conn->error;
  }else{
  	echo "No parameter is passed";
  }
?>