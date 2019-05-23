<?php
  // notes: include checking if user is already logged in or not -- do that later
  // notes: replace SESSION data with POST data
  //no sessioning yet

  include("config.php");

  //if(isset($_POST['class_name']) && isset($_POST['class_code']) && isset($_SESSION['user_id'])){
  if(isset($_POST['cname']) && isset($_POST['ccode']) && isset($_POST['tname'])){

    $insert_class = "INSERT INTO subject(subject_name, subject_code, teacher_id) VALUES ('".$_POST['cname']."',".$_POST['ccode'].",1)";
    mysqli_query($conn, $insert_class) ? header("location: class.php"): "Failed to update database";
  }
?>
